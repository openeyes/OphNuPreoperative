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
 * This is the model class for table "et_ophnupreoperative_patientpain".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $is_pain
 * @property integer $type_of_pain_id
 * @property string $pain_score_method
 * @property integer $back
 * @property integer $neck
 * @property integer $arm
 * @property integer $leg
 * @property integer $head
 * @property integer $other
 * @property string $other_comments
 * @property integer $right
 * @property integer $left
 * @property integer $both
 * @property string $comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuPreoperative_PatientPain_TypeOfPain $type_of_pain
 */

class Element_OphNuPreoperative_PatientPain  extends  BaseEventTypeElement
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
		return 'et_ophnupreoperative_patientpain';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, is_pain, type_of_pain_id, pain_score_method, back, neck, arm, leg, head, other, other_comments, right, left, both, comments, ', 'safe'),
			array('is_pain, type_of_pain_id, pain_score_method, back, neck, arm, leg, head, other, other_comments, right, left, both, comments, ', 'required'),
			array('id, event_id, is_pain, type_of_pain_id, pain_score_method, back, neck, arm, leg, head, other, other_comments, right, left, both, comments, ', 'safe', 'on' => 'search'),
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
			'type_of_pain' => array(self::BELONGS_TO, 'OphNuPreoperative_PatientPain_TypeOfPain', 'type_of_pain_id'),
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
			'is_pain' => 'Is the patient experiancing pain',
			'type_of_pain_id' => 'Type of Pain',
			'pain_score_method' => 'Pain Score Method',
			'back' => 'Back',
			'neck' => 'Neck',
			'arm' => 'Arm',
			'leg' => 'Leg',
			'head' => 'Head',
			'other' => 'Other',
			'other_comments' => 'Other Comments',
			'right' => 'Right',
			'left' => 'Left',
			'both' => 'Both',
			'comments' => 'Comments',
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
		$criteria->compare('is_pain', $this->is_pain);
		$criteria->compare('type_of_pain_id', $this->type_of_pain_id);
		$criteria->compare('pain_score_method', $this->pain_score_method);
		$criteria->compare('back', $this->back);
		$criteria->compare('neck', $this->neck);
		$criteria->compare('arm', $this->arm);
		$criteria->compare('leg', $this->leg);
		$criteria->compare('head', $this->head);
		$criteria->compare('other', $this->other);
		$criteria->compare('other_comments', $this->other_comments);
		$criteria->compare('right', $this->right);
		$criteria->compare('left', $this->left);
		$criteria->compare('both', $this->both);
		$criteria->compare('comments', $this->comments);

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