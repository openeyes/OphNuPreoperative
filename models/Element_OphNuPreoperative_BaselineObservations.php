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
 * This is the model class for table "et_ophnupreoperative_baselineobservations".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $blood_pressure
 * @property string $mmhg
 * @property string $heart_rate_pulse
 * @property string $temperature
 * @property string $respiratory_rate
 * @property string $sao2
 * @property integer $blood_sugar
 * @property string $blood_sugar_comments
 * @property integer $urine_passed
 * @property string $urine_passed_time
 * @property string $avpu
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphNuPreoperative_BaselineObservations  extends  BaseEventTypeElement
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
		return 'et_ophnupreoperative_baselineobservations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, blood_pressure, mmhg, heart_rate_pulse, temperature, respiratory_rate, sao2, blood_sugar, blood_sugar_comments, urine_passed, urine_passed_time, avpu, ', 'safe'),
			array('blood_pressure, mmhg, heart_rate_pulse, temperature, respiratory_rate, sao2, blood_sugar, blood_sugar_comments, urine_passed, urine_passed_time, avpu, ', 'required'),
			array('id, event_id, blood_pressure, mmhg, heart_rate_pulse, temperature, respiratory_rate, sao2, blood_sugar, blood_sugar_comments, urine_passed, urine_passed_time, avpu, ', 'safe', 'on' => 'search'),
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
			'blood_pressure' => 'Blood Pressure',
			'mmhg' => 'mmHg',
			'heart_rate_pulse' => 'Heart Rate Pulse',
			'temperature' => 'Temperature',
			'respiratory_rate' => 'Respiratory Rate',
			'sao2' => 'SaO2',
			'blood_sugar' => 'Blood Sugar',
			'blood_sugar_comments' => 'Blood Sugar',
			'urine_passed' => 'Urine Passed',
			'urine_passed_time' => 'Urine Passed Time',
			'avpu' => 'AVPU',
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
		$criteria->compare('blood_pressure', $this->blood_pressure);
		$criteria->compare('mmhg', $this->mmhg);
		$criteria->compare('heart_rate_pulse', $this->heart_rate_pulse);
		$criteria->compare('temperature', $this->temperature);
		$criteria->compare('respiratory_rate', $this->respiratory_rate);
		$criteria->compare('sao2', $this->sao2);
		$criteria->compare('blood_sugar', $this->blood_sugar);
		$criteria->compare('blood_sugar_comments', $this->blood_sugar_comments);
		$criteria->compare('urine_passed', $this->urine_passed);
		$criteria->compare('urine_passed_time', $this->urine_passed_time);
		$criteria->compare('avpu', $this->avpu);

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