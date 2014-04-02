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
 * @property integer $patient_surgery_id
 * @property integer $anes_related
 * @property integer $equipment_failure
 * @property integer $change_in_patient_condition
 * @property integer $npo_status
 * @property integer $patient_failed_mews
 * @property integer $lack_of_consumables
 * @property integer $staff_sickness
 * @property integer $consent_form
 * @property integer $run_out_of_time
 * @property integer $other
 * @property string $other_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuPreoperative_PatientStatus_PatientSurgery $patient_surgery
 */

class Element_OphNuPreoperative_PatientStatus  extends  BaseEventTypeElement
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
		return 'et_ophnupreoperative_patientstatus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, patient_surgery_id, anes_related, equipment_failure, change_in_patient_condition, npo_status, patient_failed_mews, lack_of_consumables, staff_sickness, consent_form, run_out_of_time, other, other_comments, ', 'safe'),
			array('patient_surgery_id, anes_related, equipment_failure, change_in_patient_condition, npo_status, patient_failed_mews, lack_of_consumables, staff_sickness, consent_form, run_out_of_time, other, other_comments, ', 'required'),
			array('id, event_id, patient_surgery_id, anes_related, equipment_failure, change_in_patient_condition, npo_status, patient_failed_mews, lack_of_consumables, staff_sickness, consent_form, run_out_of_time, other, other_comments, ', 'safe', 'on' => 'search'),
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
			'patient_surgery' => array(self::BELONGS_TO, 'OphNuPreoperative_PatientStatus_PatientSurgery', 'patient_surgery_id'),
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
			'patient_surgery_id' => 'Patient Acceptable for Surgery',
			'anes_related' => 'Anesthesia related problem',
			'equipment_failure' => 'Equipment Failure',
			'change_in_patient_condition' => 'Change in Patient Condition',
			'npo_status' => 'NPO Status',
			'patient_failed_mews' => 'Patient Failed MEWS',
			'lack_of_consumables' => 'Lack of consumables',
			'staff_sickness' => 'Staff sickness',
			'consent_form' => 'Consent form',
			'run_out_of_time' => 'Run out of time',
			'other' => 'Other',
			'other_comments' => 'Other Comments',
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
		$criteria->compare('patient_surgery_id', $this->patient_surgery_id);
		$criteria->compare('anes_related', $this->anes_related);
		$criteria->compare('equipment_failure', $this->equipment_failure);
		$criteria->compare('change_in_patient_condition', $this->change_in_patient_condition);
		$criteria->compare('npo_status', $this->npo_status);
		$criteria->compare('patient_failed_mews', $this->patient_failed_mews);
		$criteria->compare('lack_of_consumables', $this->lack_of_consumables);
		$criteria->compare('staff_sickness', $this->staff_sickness);
		$criteria->compare('consent_form', $this->consent_form);
		$criteria->compare('run_out_of_time', $this->run_out_of_time);
		$criteria->compare('other', $this->other);
		$criteria->compare('other_comments', $this->other_comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}



	protected function afterSave()
	{

		return parent::afterSave();
	}
}
?>