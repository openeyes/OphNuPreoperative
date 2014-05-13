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
 * This is the model class for table "et_ophnupreoperative_baseline".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $blood_pressure
 * @property string $bpm
 * @property string $temperature
 * @property string $res_rate
 * @property string $sao2
 * @property string $blood_sugar
 * @property integer $bloodsugar_na
 * @property integer $urine_passed
 * @property string $time
 * @property string $avpu
 * @property integer $is_patient_experiencing_pain
 * @property integer $location_id
 * @property integer $side_id
 * @property integer $type_of_pain_id
 * @property integer $pain_score_method_id
 * @property string $pain_score
 * @property string $p_comments
 * @property integer $skin_id
 * @property string $comments
 * @property string $o_comments
 * @property string $mews_score
 * @property integer $iv_inserted
 * @property string $iv_location
 * @property integer $size_id
 * @property integer $fluid_type_id
 * @property integer $volume_given_id
 * @property string $rate
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuPreoperative_BaselineObservations_Location $location
 * @property OphNuPreoperative_BaselineObservations_Side $side
 * @property OphNuPreoperative_BaselineObservations_TypeOfPain $type_of_pain
 * @property OphNuPreoperative_BaselineObservations_PainScoreMethod $pain_score_method
 * @property OphNuPreoperative_BaselineObservations_Skin $skin
 * @property Element_OphNuPreoperative_BaselineObservations_Obs_Assignment $obss
 * @property OphNuPreoperative_BaselineObservations_Size $size
 * @property OphNuPreoperative_BaselineObservations_FluidType $fluid_type
 * @property OphNuPreoperative_BaselineObservations_VolumeGiven $volume_given
 */

class Element_OphNuPreoperative_BaselineObservations  extends  BaseEventTypeElement
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
		return 'et_ophnupreoperative_baseline';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, bp_systolic, bp_diastolic, bpm, temperature, res_rate, sao2, blood_sugar, bloodsugar_na, urine_passed, time, avpu, is_patient_experiencing_pain, location_id, side_id, type_of_pain_id, pain_score_method_id, pain_score, p_comments, comments, o_comments, mews_score, iv_inserted, iv_location, size_id, fluid_type_id, volume_given_id, rate, ', 'safe'),
			array('id, event_id, blood_pressure, bpm, temperature, res_rate, sao2, blood_sugar, bloodsugar_na, urine_passed, time, avpu, is_patient_experiencing_pain, location_id, side_id, type_of_pain_id, pain_score_method_id, pain_score, p_comments, comments, o_comments, mews_score, iv_inserted, iv_location, size_id, fluid_type_id, volume_given_id, rate, ', 'safe', 'on' => 'search'),
			array('bp_systolic,bp_diastolic,bpm,temperature,res_rate,sao2,blood_sugar,avpu,rate', 'numerical'),
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
			'location' => array(self::BELONGS_TO, 'OphNuPreoperative_BaselineObservations_Location', 'location_id'),
			'side' => array(self::BELONGS_TO, 'OphNuPreoperative_BaselineObservations_Side', 'side_id'),
			'type_of_pain' => array(self::BELONGS_TO, 'OphNuPreoperative_BaselineObservations_TypeOfPain', 'type_of_pain_id'),
			'pain_score_method' => array(self::BELONGS_TO, 'OphNuPreoperative_BaselineObservations_PainScoreMethod', 'pain_score_method_id'),
			'obss' => array(self::HAS_MANY, 'Element_OphNuPreoperative_BaselineObservations_Obs_Assignment', 'element_id'),
			'size' => array(self::BELONGS_TO, 'OphNuPreoperative_BaselineObservations_Size', 'size_id'),
			'fluid_type' => array(self::BELONGS_TO, 'OphNuPreoperative_BaselineObservations_FluidType', 'fluid_type_id'),
			'volume_given' => array(self::BELONGS_TO, 'OphNuPreoperative_BaselineObservations_VolumeGiven', 'volume_given_id'),
			'skins' => array(self::HAS_MANY, 'OphNuPreoperative_BaselineObservations_Skin_Assignment', 'element_id'),
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
			'bp_systolic' => 'Blood pressure (systolic)',
			'bp_diastolic' => 'Blood pressure (diastolic)',
			'bpm' => 'Heart rate / pulse',
			'temperature' => 'Temperature',
			'res_rate' => 'Respiratory rate',
			'sao2' => 'SaO2',
			'blood_sugar' => 'Blood glucose',
			'bloodsugar_na' => 'N/A',
			'urine_passed' => 'Urine passed',
			'time' => 'Time urine passed',
			'avpu' => 'AVPU',
			'is_patient_experiencing_pain' => 'Is patient experiencing pain',
			'location_id' => 'Pain location',
			'side_id' => 'Pain side',
			'type_of_pain_id' => 'Type of pain',
			'pain_score_method_id' => 'Pain score method',
			'pain_score' => 'Pain score',
			'p_comments' => 'Pain score comments',
			'comments' => 'Skin assessment notes',
			'obs' => 'Pre-op observations',
			'o_comments' => 'Pre-op observation notes',
			'mews_score' => 'MEWS score',
			'iv_inserted' => 'IV inserted',
			'iv_location' => 'IV location',
			'size_id' => 'IV size',
			'fluid_type_id' => 'IV fluid type',
			'volume_given_id' => 'IV volume given',
			'rate' => 'IV rate',
			'skins' => 'Skin assessment',
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
		$criteria->compare('bpm', $this->bpm);
		$criteria->compare('temperature', $this->temperature);
		$criteria->compare('res_rate', $this->res_rate);
		$criteria->compare('sao2', $this->sao2);
		$criteria->compare('blood_sugar', $this->blood_sugar);
		$criteria->compare('bloodsugar_na', $this->bloodsugar_na);
		$criteria->compare('urine_passed', $this->urine_passed);
		$criteria->compare('time', $this->time);
		$criteria->compare('avpu', $this->avpu);
		$criteria->compare('is_patient_experiencing_pain', $this->is_patient_experiencing_pain);
		$criteria->compare('location_id', $this->location_id);
		$criteria->compare('side_id', $this->side_id);
		$criteria->compare('type_of_pain_id', $this->type_of_pain_id);
		$criteria->compare('pain_score_method_id', $this->pain_score_method_id);
		$criteria->compare('pain_score', $this->pain_score);
		$criteria->compare('p_comments', $this->p_comments);
		$criteria->compare('comments', $this->comments);
		$criteria->compare('obs', $this->obs);
		$criteria->compare('o_comments', $this->o_comments);
		$criteria->compare('mews_score', $this->mews_score);
		$criteria->compare('iv_inserted', $this->iv_inserted);
		$criteria->compare('iv_location', $this->iv_location);
		$criteria->compare('size_id', $this->size_id);
		$criteria->compare('fluid_type_id', $this->fluid_type_id);
		$criteria->compare('volume_given_id', $this->volume_given_id);
		$criteria->compare('rate', $this->rate);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeValidate()
	{
		if ($this->is_patient_experiencing_pain) {
			foreach (array('location_id','side_id','type_of_pain_id','pain_score_method_id','pain_score') as $field) {
				if (!$this->$field) {
					$this->addError($field,$this->getAttributeLabel($field).' cannot be blank.');
				}
			}
		}

		if ($this->hasMultiSelectValue('skins','Other (please specify)')) {
			if (!$this->comments) {
				$this->addError('comments',$this->getAttributeLabel('comments').' cannot be blank.');
			}
		}

		if ($this->hasMultiSelectValue('obss','Other (please specify)')) {
			if (!$this->o_comments) {
				$this->addError('o_comments',$this->getAttributeLabel('o_comments').' cannot be blank.');
			}
		}

		if ($this->iv_inserted) {
			foreach (array('iv_location','size_id','fluid_type_id','volume_given_id','rate') as $field) {
				if (!$this->$field) {
					$this->addError($field,$this->getAttributeLabel($field).' cannot be blank.');
				}
			}
		}

		if ($this->urine_passed) {
			if (!$this->time) {
				$this->addError('time',$this->getAttributeLabel('time').' cannot be blank.');
			} else {
				if (!preg_match('/^([0-9]{1,2}):([0-9]{2})$/',$this->time,$m) || $m[1] > 23 || $m[2] > 59) {
					$this->addError('time','Invalid time format for '.$this->getAttributeLabel('time'));
				}
			}
		}

		return parent::beforeValidate();
	}
}
?>
