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
 * @property string $spo2
 * @property string $blood_sugar
 * @property integer $bloodsugar_na
 * @property integer $urine_passed
 * @property string $time
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
 * @property integer $iv_inserted
 * @property string $iv_location
 * @property integer $size_id
 * @property integer $fluid_type_id
 * @property string $rate
 * @property string $volume_given
 *
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
 * @property OphNuPreoperative_BaselineObservations_Obs_Assignment $obss
 * @property OphNuPreoperative_BaselineObservations_Size $size
 * @property OphNuPreoperative_BaselineObservations_FluidType $fluid_type
 */

class Element_OphNuPreoperative_IVInserted  extends  BaseEventTypeElement
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
		return 'et_ophnupreoperative_iv_inserted';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('iv_inserted, iv_location_id, iv_size_id, fluid_type_id, rate, iv_side_id, iv_fluid_started, volume_given', 'safe'),
			array('rate, volume_given', 'numerical'),
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
			'iv_size' => array(self::BELONGS_TO, 'OphNuPreoperative_BaselineObservations_Size', 'iv_size_id'),
			'fluid_type' => array(self::BELONGS_TO, 'OphNuPreoperative_BaselineObservations_FluidType', 'fluid_type_id'),
			'iv_location' => array(self::BELONGS_TO, 'OphNuPreoperative_IVInserted_Location', 'iv_location_id'),
			'iv_side' => array(self::BELONGS_TO, 'OphNuPreoperative_IVInserted_Side', 'iv_side_id'),
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
			'iv_inserted' => 'IV inserted',
			'iv_size_id' => 'IV size',
			'fluid_type_id' => 'IV fluid type',
			'volume_given' => 'IV volume given',
			'rate' => 'IV rate',
			'iv_location_id' => 'IV location',
			'iv_side_id' => 'IV side',
			'iv_fluid_started' => 'IV fluid started',
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

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeValidate()
	{
		if ($this->iv_inserted) {
			foreach (array('iv_location','iv_side_id','iv_size_id','iv_fluid_started') as $field) {
				if (is_null($this->$field) || $this->$field === '') {
					$this->addError($field,$this->getAttributeLabel($field).' cannot be blank.');
				}
			}
		}

		if ($this->iv_fluid_started) {
			foreach (array('fluid_type_id','volume_given','rate') as $field) {
				if (!$this->$field) {
					$this->addError($field,$this->getAttributeLabel($field).' cannot be blank.');
				}
			}
		}

		return parent::beforeValidate();
	}
}
?>
