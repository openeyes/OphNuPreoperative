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
 * This is the model class for table "et_ophnupreoperative_patienthistory".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $medical_history_verified
 * @property integer $medical_discrepancy_found
 * @property string $comments
 * @property integer $allergies_verified
 * @property integer $medication_history_verified
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphNuPreoperative_PatientHistoryReview	extends  BaseEventTypeElement
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
		return 'et_ophnupreoperative_patienthistory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, medical_history_verified, medical_discrepancy_found, comments, allergies_verified, medication_history_verified, patient_has_no_allergies', 'safe'),
			array('id, event_id, medical_history_verified, medical_discrepancy_found, comments, allergies_verified, medication_history_verified, ', 'safe', 'on' => 'search'),
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
			'medications' => array(self::HAS_MANY, 'OphNuPreoperative_PatientHistory_Medication', 'element_id'),
			'allergies' => array(self::HAS_MANY, 'OphNuPreoperative_PatientHistory_Allergy', 'element_id'),
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
			'medical_history_verified' => 'Medical history verified',
			'medical_discrepancy_found' => 'Medical history discrepancy found?',
			'comments' => 'Discrepancy notes',
			'allergies_verified' => 'Allergies verified',
			'medication_history_verified' => 'Medication history verified',
			'patient_has_no_allergies' => 'Confirm patient has no allergies',
		);
	}

	public function beforeValidate()
	{
		if ($this->medical_discrepancy_found) {
			if (!$this->comments) {
				$this->addError('comments',$this->getAttributeLabel('comments').' cannot be blank.');
			}
		}

		return parent::beforeValidate();
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
		$criteria->compare('medical_history_verified', $this->medical_history_verified);
		$criteria->compare('medical_discrepancy_found', $this->medical_discrepancy_found);
		$criteria->compare('comments', $this->comments);
		$criteria->compare('allergies_verified', $this->allergies_verified);
		$criteria->compare('medication_history_verified', $this->medication_history_verified);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function updateMedications($medication_ids=array(),$drug_ids=array(),$route_ids=array(),$option_ids=array(),$frequency_ids=array(),$start_dates=array())
	{
		$ids = array();

		foreach ($drug_ids as $i => $drug_id) {
			if (!$medication_ids[$i] || !$medication = OphNuPreoperative_PatientHistory_Medication::model()->findByPk($medication_ids[$i])) {
				$medication = new OphNuPreoperative_PatientHistory_Medication;
				$medication->element_id = $this->id;
			}

			$medication->drug_id = $drug_id;
			$medication->route_id = $route_ids[$i];
			$medication->option_id = $option_ids[$i];
			$medication->frequency_id = $frequency_ids[$i];
			$medication->start_date = $start_dates[$i];

			if (!$medication->save()) {
				throw new Exception("Unable to save medication: ".print_r($medication->getErrors(),true));
			}

			$ids[] = $medication->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $this->id;

		!empty($ids) && $criteria->addNotInCondition('id',$ids);

		OphNuPreoperative_PatientHistory_Medication::model()->deleteAll($criteria);
	}

	public function afterSave()
	{
		if (Yii::app()->getController()->action->id == 'create') {
			$patient = $this->event->episode->patient;

			foreach ($this->medications as $medication) {
				$where = 'patient_id=? and drug_id=? and route_id=? and option_id';
				$whereParams = array($patient->id,$medication->drug_id,$medication->route_id);
				if ($medication->option_id) {
					$where .= '=?';
					$whereParams[] = $medication->option_id;
				} else {
					$where .= ' is null';
				}
				$where .= ' and frequency_id=? and start_date=?';
				$whereParams[] = $medication->frequency_id;
				$whereParams[] = $medication->start_date;

				if (!Medication::model()->find($where,$whereParams)) {
					$_medication = new Medication;
					$_medication->patient_id = $patient->id;

					foreach (array('drug_id','route_id','option_id','frequency_id','start_date') as $field) {
						$_medication->$field = $medication->$field;
					}

					if (!$_medication->save()) {
						throw new Exception("Unable to save medication: ".print_r($_medication->getErrors(),true));
					}
				}
			}

			$ids = array();

			foreach ($this->allergies as $allergy) {
				if (!$paa = PatientAllergyAssignment::model()->find('patient_id=? and allergy_id=?',array($patient->id,$allergy->allergy_id))) {
					$paa = new PatientAllergyAssignment;
					$paa->patient_id = $patient->id;
					$paa->allergy_id = $allergy->allergy_id;

					if (!$paa->save()) {
						throw new Exception("Unable to save allergy assignment: ".print_r($paa->getErrors(),true));
					}
				}

				$ids[] = $paa->id;
			}

			$criteria = new CDbCriteria;
			$criteria->addCondition('patient_id = :patient_id');
			$criteria->params[':patient_id'] = $patient->id;
			!empty($ids) && $criteria->addNotInCondition('id',$ids);

			PatientAllergyAssignment::model()->deleteAll($criteria);

			if (empty($this->allergies) && $this->patient_has_no_allergies) {
				if (!$patient->no_allergies_date) {
					$patient->no_allergies_date = date('Y-m-d H:i:s');

					if (!$patient->save()) {
						throw new Exception("Unable to save patient: ".print_r($patient->getErrors(),true));
					}
				}
			} else if (!empty($this->allergies) && $patient->no_allergies_date) {
				$patient->no_allergies_date = null;

				if (!$patient->save()) {
					throw new Exception("Unable to save patient: ".print_r($patient->getErrors(),true));
				}
			}
		}

		return parent::afterSave();
	}

	public function getAvailableAllergyList()
	{
		$allergy_ids = array();

		foreach ($this->allergies as $allergy) {
			$allergy_ids[] = $allergy->allergy_id;
		}

		$criteria = new CDbCriteria;
		!empty($allergy_ids) && $criteria->addNotInCondition('id',$allergy_ids);
		$criteria->order = 'name asc';

		return CHtml::listData(Allergy::model()->findAll($criteria),'id','name');
	}

	public function updateAllergies($allergy_ids)
	{
		$ids = array();

		foreach ($allergy_ids as $allergy_id) {
			if (!$allergy = OphNuPreoperative_PatientHistory_Allergy::model()->find('element_id=? and allergy_id=?',array($this->id,$allergy_id))) {
				$allergy = new OphNuPreoperative_PatientHistory_Allergy;
				$allergy->element_id = $this->id;
				$allergy->allergy_id = $allergy_id;

				if (!$allergy->save()) {
					throw new Exception("Unable to save allergy: ".print_r($allergy->getErrors(),true));
				}
			}

			$ids[] = $allergy->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $this->id;
		!empty($ids) && $criteria->addNotInCondition('id',$ids);

		OphNuPreoperative_PatientHistory_Allergy::model()->deleteAll($criteria);
	}
}
?>
