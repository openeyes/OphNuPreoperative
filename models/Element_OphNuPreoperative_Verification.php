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
 * @property string $comments
 * @property integer $removable_dental
 * @property integer $full_uppers
 * @property integer $full_uppers_removed
 * @property integer $full_lowers
 * @property integer $other
 * @property string $other_comments
 * @property integer $other_removed
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
		return 'et_ophnupreoperative_verification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, surgical_id, iol_verified, iol_type, iol_size, metal_in_body, comments, removable_dental, full_uppers, full_uppers_removed, full_lowers, other, other_comments, other_removed, ', 'safe'),
			array('surgical_id, iol_verified, iol_type, iol_size, metal_in_body, comments, removable_dental, full_uppers, full_uppers_removed, full_lowers, other, other_comments, other_removed, ', 'required'),
			array('id, event_id, surgical_id, iol_verified, iol_type, iol_size, metal_in_body, comments, removable_dental, full_uppers, full_uppers_removed, full_lowers, other, other_comments, other_removed, ', 'safe', 'on' => 'search'),
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
			'comments' => 'Comments',
			'removable_dental' => 'Removable dental work present',
			'full_uppers' => 'Full uppers',
			'full_uppers_removed' => 'Full uppers removed',
			'full_lowers' => 'Full lowers',
			'other' => 'Other',
			'other_comments' => 'Other Comments',
			'other_removed' => 'Other Removed',
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
		$criteria->compare('comments', $this->comments);
		$criteria->compare('removable_dental', $this->removable_dental);
		$criteria->compare('full_uppers', $this->full_uppers);
		$criteria->compare('full_uppers_removed', $this->full_uppers_removed);
		$criteria->compare('full_lowers', $this->full_lowers);
		$criteria->compare('other', $this->other);
		$criteria->compare('other_comments', $this->other_comments);
		$criteria->compare('other_removed', $this->other_removed);

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