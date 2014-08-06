<?php /**
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
 * This is the model class for table "ophnupreoperative_patientstatus_cancel".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property string $name
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class OphNuPreoperative_Observation extends BaseActiveRecordVersioned
{
	public $time;
	public $auto_update_measurements = true;
	public $blood_pressure_m_systolic;
	public $blood_pressure_m_diastolic;

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
		return 'ophnupreoperative_observation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('timestamp, time, hr_pulse_m, blood_pressure_m_systolic, blood_pressure_m_diastolic, rr_m, spo2_m', 'safe'),
			array('timestamp, hr_pulse, blood_pressure, rr, spo2', 'required'),
			array('id, name', 'safe', 'on' => 'search'),
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
			'hr_pulse_m' => array(self::BELONGS_TO, 'MeasurementPulse', 'hr_pulse_m_id'),
			'blood_pressure_m' => array(self::BELONGS_TO, 'MeasurementBloodPressure', 'blood_pressure_m_id'),
			'rr_m' => array(self::BELONGS_TO, 'MeasurementRespiratoryRate', 'rr_m_id'),
			'spo2_m' => array(self::BELONGS_TO, 'MeasurementSPO2', 'spo2_m_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hr_pulse_m' => 'HR / pulse',
			'blood_pressure_m' => 'Blood pressure',
			'rr_m' => 'RR',
			'spo2_m' => 'SpO2',
			'blood_pressure_m_systolic' => 'Blood pressure (systolic)',
			'blood_pressure_m_diastolic' => 'Blood pressure (diastolic)',
		);
	}

	public function getAttributeSuffix($attribute)
	{
		$suffixes = array(
			'hr_pulse_m' => 'bpm',
			'blood_pressure_m' => 'mmHg',
			'rr_m' => 'insp/min',
			'spo2_m' => '%',
		);

		return @$suffixes[$attribute];
	}

	public function afterFind()
	{
		if ($this->timestamp) {
			$this->time = date('H:i',strtotime($this->timestamp));
		}

		return parent::afterFind();
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('name', $this->name, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function getDescription()
	{
		return "Pulse: ".$this->hr_pulse->getValueText().", BP: ".$this->blood_pressure->getValueText().", RR: ".$this->rr->getValueText().", SpO2: ".$this->spo2->getValueText();
	}
}
?>
