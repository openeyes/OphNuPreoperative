<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophnupreoperative_patientstatus".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $patient_status_id
 * @property string $res_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuPreoperative_PatientStatus_PatientStatus $patient_status
 * @property Element_OphNuPreoperative_PatientStatus_Cancel_Assignment $cancels
 */

class Element_OphNuPreoperative_PatientStatus  extends  BaseEventTypeElement
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophnupreoperative_patientstatus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, patient_status_id, res_comments, ', 'safe'),
			array('patient_status_id, res_comments, ', 'required'),
			array('id, event_id, patient_status_id, res_comments, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'patient_status' => array(self::BELONGS_TO, 'OphNuPreoperative_PatientStatus_PatientStatus', 'patient_status_id'),
			'cancels' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PatientStatus_Cancel_Assignment', 'element_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'patient_status_id' => 'Patient Status',
			'cancel' => 'Reason for cancelation',
			'res_comments' => 'Comments',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('patient_status_id', $this->patient_status_id);
		$criteria->compare('cancel', $this->cancel);
		$criteria->compare('res_comments', $this->res_comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}


	public function getophnupreoperative_patientstatus_cancel_defaults() {
		$ids = array();
		foreach (OphNuPreoperative_PatientStatus_Cancel::model()->findAll('`default` = ?',array(1)) as $item) {
			$ids[] = $item->id;
		}
		return $ids;
	}

	protected function afterSave()
	{
		if (!empty($_POST['MultiSelect_cancel'])) {

			$existing_ids = array();

			foreach (Element_OphNuPreoperative_PatientStatus_Cancel_Assignment::model()->findAll('element_id = :elementId', array(':elementId' => $this->id)) as $item) {
				$existing_ids[] = $item->ophnupreoperative_patientstatus_cancel_id;
			}

			foreach ($_POST['MultiSelect_cancel'] as $id) {
				if (!in_array($id,$existing_ids)) {
					$item = new Element_OphNuPreoperative_PatientStatus_Cancel_Assignment;
					$item->element_id = $this->id;
					$item->ophnupreoperative_patientstatus_cancel_id = $id;

					if (!$item->save()) {
						throw new Exception('Unable to save MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}

			foreach ($existing_ids as $id) {
				if (!in_array($id,$_POST['MultiSelect_cancel'])) {
					$item = Element_OphNuPreoperative_PatientStatus_Cancel_Assignment::model()->find('element_id = :elementId and ophnupreoperative_patientstatus_cancel_id = :lookupfieldId',array(':elementId' => $this->id, ':lookupfieldId' => $id));
					if (!$item->delete()) {
						throw new Exception('Unable to delete MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}
		}

		return parent::afterSave();
	}
}
?>