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
 * This is the model class for table "et_ophnupreoperative_verification".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $surgical_id
 * @property integer $iol_verified
 * @property string $iol_type
 * @property string $iol_size
 * @property integer $metal_in_body
 * @property string $metal_comments
 * @property integer $removable_dental
 * @property integer $full_uppers
 * @property integer $full_uppers_removed
 * @property integer $full_lowers
 * @property integer $full_lowers_removed
 * @property integer $other
 * @property string $dental_comments
 * @property integer $hearing_aid_present
 * @property integer $right
 * @property integer $right_removed
 * @property integer $left
 * @property integer $left_removed
 * @property integer $patient_belongings
 * @property integer $glasses
 * @property integer $jewelery
 * @property integer $clothing
 * @property integer $other
 * @property string $belongings_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuPreoperative_Verification_Surgical $surgical
 */

class Element_OphNuPreoperative_Verification  extends  BaseEventTypeElement
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
		return 'et_ophnupreoperative_verification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, surgical_id, iol_verified, iol_type, iol_size, metal_in_body, metal_comments, removable_dental, full_uppers, full_uppers_removed, full_lowers, full_lowers_removed, other, dental_comments, hearing_aid_present, right, right_removed, left, left_removed, patient_belongings, glasses, jewelery, clothing, other, belongings_comments, ', 'safe'),
			array('surgical_id, iol_verified, iol_type, iol_size, metal_in_body, metal_comments, removable_dental, full_uppers, full_uppers_removed, full_lowers, full_lowers_removed, other, dental_comments, hearing_aid_present, right, right_removed, left, left_removed, patient_belongings, glasses, jewelery, clothing, other, belongings_comments, ', 'required'),
			array('id, event_id, surgical_id, iol_verified, iol_type, iol_size, metal_in_body, metal_comments, removable_dental, full_uppers, full_uppers_removed, full_lowers, full_lowers_removed, other, dental_comments, hearing_aid_present, right, right_removed, left, left_removed, patient_belongings, glasses, jewelery, clothing, other, belongings_comments, ', 'safe', 'on' => 'search'),
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
			'surgical' => array(self::BELONGS_TO, 'OphNuPreoperative_Verification_Surgical', 'surgical_id'),
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
			'surgical_id' => 'Surgical site verified',
			'iol_verified' => 'IOL Verified',
			'iol_type' => 'IOL Type',
			'iol_size' => 'IOL Size',
			'metal_in_body' => 'Metal in body',
			'metal_comments' => 'Metal in body comments',
			'removable_dental' => 'Removable dental work present',
			'full_uppers' => 'Full uppers',
			'full_uppers_removed' => 'Full uppers removed',
			'full_lowers' => 'Full lowers',
			'full_lowers_removed' => 'Full lowers removed',
			'other' => 'Other',
			'dental_comments' => 'Other comments',
			'hearing_aid_present' => 'Hearing aid present',
			'right' => 'Right',
			'right_removed' => 'Right Removed',
			'left' => 'Left',
			'left_removed' => 'Left Removed',
			'patient_belongings' => 'Patient Belongings',
			'glasses' => 'Glasses',
			'jewelery' => 'Jewelery',
			'clothing' => 'Clothing',
			'other' => 'Other',
			'belongings_comments' => 'Other Comments',
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
		$criteria->compare('surgical_id', $this->surgical_id);
		$criteria->compare('iol_verified', $this->iol_verified);
		$criteria->compare('iol_type', $this->iol_type);
		$criteria->compare('iol_size', $this->iol_size);
		$criteria->compare('metal_in_body', $this->metal_in_body);
		$criteria->compare('metal_comments', $this->metal_comments);
		$criteria->compare('removable_dental', $this->removable_dental);
		$criteria->compare('full_uppers', $this->full_uppers);
		$criteria->compare('full_uppers_removed', $this->full_uppers_removed);
		$criteria->compare('full_lowers', $this->full_lowers);
		$criteria->compare('full_lowers_removed', $this->full_lowers_removed);
		$criteria->compare('other', $this->other);
		$criteria->compare('dental_comments', $this->dental_comments);
		$criteria->compare('hearing_aid_present', $this->hearing_aid_present);
		$criteria->compare('right', $this->right);
		$criteria->compare('right_removed', $this->right_removed);
		$criteria->compare('left', $this->left);
		$criteria->compare('left_removed', $this->left_removed);
		$criteria->compare('patient_belongings', $this->patient_belongings);
		$criteria->compare('glasses', $this->glasses);
		$criteria->compare('jewelery', $this->jewelery);
		$criteria->compare('clothing', $this->clothing);
		$criteria->compare('other', $this->other);
		$criteria->compare('belongings_comments', $this->belongings_comments);

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