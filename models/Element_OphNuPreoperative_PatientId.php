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
 * This is the model class for table "et_ophnupreoperative_patientid".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property Element_OphNuPreoperative_PatientId_WbVerified_Assignment $wb_verifieds
 * @property Element_OphNuPreoperative_PatientId_WristBand_Assignment $wrist_bands
 */

class Element_OphNuPreoperative_PatientId  extends  BaseEventTypeElement
{
	public $service;

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
		return 'et_ophnupreoperative_patientid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, ', 'safe'),
			array('', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'wb_verifieds' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PatientId_WbVerified_Assignment', 'element_id'),
			'wrist_bands' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PatientId_WristBand_Assignment', 'element_id'),
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
			'wb_verified' => 'Wrist band verified with two identifiers',
			'wrist_band' => 'Special Attention wrist band attached',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('wb_verified', $this->wb_verified);
		$criteria->compare('wrist_band', $this->wrist_band);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}


	public function getophnupreoperative_patientid_wb_verified_defaults() {
		$ids = array();
		foreach (OphNuPreoperative_PatientId_WbVerified::model()->findAll('`default` = ?',array(1)) as $item) {
			$ids[] = $item->id;
		}
		return $ids;
	}
	public function getophnupreoperative_patientid_wrist_band_defaults() {
		$ids = array();
		foreach (OphNuPreoperative_PatientId_WristBand::model()->findAll('`default` = ?',array(1)) as $item) {
			$ids[] = $item->id;
		}
		return $ids;
	}

	protected function beforeSave()
	{
		return parent::beforeSave();
	}

	protected function afterSave()
	{
		if (!empty($_POST['MultiSelect_wb_verified'])) {

			$existing_ids = array();

			foreach (Element_OphNuPreoperative_PatientId_WbVerified_Assignment::model()->findAll('element_id = :elementId', array(':elementId' => $this->id)) as $item) {
				$existing_ids[] = $item->ophnupreoperative_patientid_wb_verified_id;
			}

			foreach ($_POST['MultiSelect_wb_verified'] as $id) {
				if (!in_array($id,$existing_ids)) {
					$item = new Element_OphNuPreoperative_PatientId_WbVerified_Assignment;
					$item->element_id = $this->id;
					$item->ophnupreoperative_patientid_wb_verified_id = $id;

					if (!$item->save()) {
						throw new Exception('Unable to save MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}

			foreach ($existing_ids as $id) {
				if (!in_array($id,$_POST['MultiSelect_wb_verified'])) {
					$item = Element_OphNuPreoperative_PatientId_WbVerified_Assignment::model()->find('element_id = :elementId and ophnupreoperative_patientid_wb_verified_id = :lookupfieldId',array(':elementId' => $this->id, ':lookupfieldId' => $id));
					if (!$item->delete()) {
						throw new Exception('Unable to delete MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}
		}
		if (!empty($_POST['MultiSelect_wrist_band'])) {

			$existing_ids = array();

			foreach (Element_OphNuPreoperative_PatientId_WristBand_Assignment::model()->findAll('element_id = :elementId', array(':elementId' => $this->id)) as $item) {
				$existing_ids[] = $item->ophnupreoperative_patientid_wrist_band_id;
			}

			foreach ($_POST['MultiSelect_wrist_band'] as $id) {
				if (!in_array($id,$existing_ids)) {
					$item = new Element_OphNuPreoperative_PatientId_WristBand_Assignment;
					$item->element_id = $this->id;
					$item->ophnupreoperative_patientid_wrist_band_id = $id;

					if (!$item->save()) {
						throw new Exception('Unable to save MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}

			foreach ($existing_ids as $id) {
				if (!in_array($id,$_POST['MultiSelect_wrist_band'])) {
					$item = Element_OphNuPreoperative_PatientId_WristBand_Assignment::model()->find('element_id = :elementId and ophnupreoperative_patientid_wrist_band_id = :lookupfieldId',array(':elementId' => $this->id, ':lookupfieldId' => $id));
					if (!$item->delete()) {
						throw new Exception('Unable to delete MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}
		}

		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		return parent::beforeValidate();
	}
}
?>