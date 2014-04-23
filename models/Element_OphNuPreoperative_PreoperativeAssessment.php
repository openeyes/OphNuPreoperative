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
 * This is the model class for table "et_ophnupreoperative_preoperative".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $translator_present_id
 * @property string $name_of_translator
 * @property integer $patient_verified
 * @property string $time_last_ate
 * @property string $time_last_drank
 * @property integer $consent_signed
 * @property integer $surgical_site_verified
 * @property integer $site_id
 * @property integer $iol_verified_id
 * @property string $iol_type
 * @property string $iol_size
 * @property integer $metal_in_body
 * @property string $m_comments
 * @property integer $falls_mobility
 * @property integer $removable_dental_work_present
 * @property string $d_comments
 * @property integer $hearing_aid_present
 * @property integer $patient_belongings
 * @property integer $belong_id
 * @property string $b_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuPreoperative_PreoperativeAssessment_TranslatorPresent $translator_present
 * @property Element_OphNuPreoperative_PreoperativeAssessment_Wristband_Assignment $wristbands
 * @property OphNuPreoperative_PreoperativeAssessment_Site $site
 * @property OphNuPreoperative_PreoperativeAssessment_IolVerified $iol_verified
 * @property Element_OphNuPreoperative_PreoperativeAssessment_Falls_Assignment $fallss
 * @property Element_OphNuPreoperative_PreoperativeAssessment_Dental_Assignment $dentals
 * @property Element_OphNuPreoperative_PreoperativeAssessment_HearingAid_Assignment $hearing_aids
 * @property OphNuPreoperative_PreoperativeAssessment_Belong $belong
 */

class Element_OphNuPreoperative_PreoperativeAssessment  extends  BaseEventTypeElement
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
		return 'et_ophnupreoperative_preoperative';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, translator_present_id, name_of_translator, patient_verified, time_last_ate, time_last_drank, consent_signed, surgical_site_verified, site_id, iol_verified_id, iol_type, iol_size, metal_in_body, m_comments, falls_mobility, removable_dental_work_present, d_comments, hearing_aid_present, patient_belongings, belong_id, b_comments, ', 'safe'),
			array('translator_present_id, name_of_translator, patient_verified, time_last_ate, time_last_drank, consent_signed, surgical_site_verified, site_id, iol_verified_id, iol_type, iol_size, metal_in_body, m_comments, falls_mobility, removable_dental_work_present, d_comments, hearing_aid_present, patient_belongings, belong_id, b_comments, ', 'required'),
			array('id, event_id, translator_present_id, name_of_translator, patient_verified, time_last_ate, time_last_drank, consent_signed, surgical_site_verified, site_id, iol_verified_id, iol_type, iol_size, metal_in_body, m_comments, falls_mobility, removable_dental_work_present, d_comments, hearing_aid_present, patient_belongings, belong_id, b_comments, ', 'safe', 'on' => 'search'),
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
			'translator_present' => array(self::BELONGS_TO, 'OphNuPreoperative_PreoperativeAssessment_TranslatorPresent', 'translator_present_id'),
			'wristbands' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PreoperativeAssessment_Wristband_Assignment', 'element_id'),
			'site' => array(self::BELONGS_TO, 'OphNuPreoperative_PreoperativeAssessment_Site', 'site_id'),
			'iol_verified' => array(self::BELONGS_TO, 'OphNuPreoperative_PreoperativeAssessment_IolVerified', 'iol_verified_id'),
			'fallss' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PreoperativeAssessment_Falls_Assignment', 'element_id'),
			'dentals' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PreoperativeAssessment_Dental_Assignment', 'element_id'),
			'hearing_aids' => array(self::HAS_MANY, 'Element_OphNuPreoperative_PreoperativeAssessment_HearingAid_Assignment', 'element_id'),
			'belong' => array(self::BELONGS_TO, 'OphNuPreoperative_PreoperativeAssessment_Belong', 'belong_id'),
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
			'translator_present_id' => 'Translator Present?',
			'name_of_translator' => 'Name of Translator',
			'patient_verified' => 'Patient ID / Wristband verified with two identifiers',
			'wristband' => 'Special Attention Wristband attached?',
			'time_last_ate' => 'Time Last Ate',
			'time_last_drank' => 'Time Last Drank',
			'consent_signed' => 'Consent Signed',
			'surgical_site_verified' => 'Surgical Site Verified',
			'site_id' => 'Surgical Site Verified',
			'iol_verified_id' => 'IOL Verified',
			'iol_type' => 'IOL Type',
			'iol_size' => 'IOL Size',
			'metal_in_body' => 'Metal in Body',
			'm_comments' => 'Comments',
			'falls_mobility' => 'Falls / Mobility',
			'falls' => 'Falls / Mobility',
			'removable_dental_work_present' => 'Removable Dental work present?',
			'dental' => 'Items',
			'd_comments' => 'Comments',
			'hearing_aid_present' => 'Hearing Aid Present?',
			'hearing_aid' => 'Hearing Aid',
			'patient_belongings' => 'Patient Belongings',
			'belong_id' => 'Patient Belongings',
			'b_comments' => 'Comments',
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
		$criteria->compare('translator_present_id', $this->translator_present_id);
		$criteria->compare('name_of_translator', $this->name_of_translator);
		$criteria->compare('patient_verified', $this->patient_verified);
		$criteria->compare('wristband', $this->wristband);
		$criteria->compare('time_last_ate', $this->time_last_ate);
		$criteria->compare('time_last_drank', $this->time_last_drank);
		$criteria->compare('consent_signed', $this->consent_signed);
		$criteria->compare('surgical_site_verified', $this->surgical_site_verified);
		$criteria->compare('site_id', $this->site_id);
		$criteria->compare('iol_verified_id', $this->iol_verified_id);
		$criteria->compare('iol_type', $this->iol_type);
		$criteria->compare('iol_size', $this->iol_size);
		$criteria->compare('metal_in_body', $this->metal_in_body);
		$criteria->compare('m_comments', $this->m_comments);
		$criteria->compare('falls_mobility', $this->falls_mobility);
		$criteria->compare('falls', $this->falls);
		$criteria->compare('removable_dental_work_present', $this->removable_dental_work_present);
		$criteria->compare('dental', $this->dental);
		$criteria->compare('d_comments', $this->d_comments);
		$criteria->compare('hearing_aid_present', $this->hearing_aid_present);
		$criteria->compare('hearing_aid', $this->hearing_aid);
		$criteria->compare('patient_belongings', $this->patient_belongings);
		$criteria->compare('belong_id', $this->belong_id);
		$criteria->compare('b_comments', $this->b_comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}


	public function getophnupreoperative_preoperative_wristband_defaults() {
		$ids = array();
		foreach (OphNuPreoperative_PreoperativeAssessment_Wristband::model()->findAll('`default` = ?',array(1)) as $item) {
			$ids[] = $item->id;
		}
		return $ids;
	}
	public function getophnupreoperative_preoperative_falls_defaults() {
		$ids = array();
		foreach (OphNuPreoperative_PreoperativeAssessment_Falls::model()->findAll('`default` = ?',array(1)) as $item) {
			$ids[] = $item->id;
		}
		return $ids;
	}
	public function getophnupreoperative_preoperative_dental_defaults() {
		$ids = array();
		foreach (OphNuPreoperative_PreoperativeAssessment_Dental::model()->findAll('`default` = ?',array(1)) as $item) {
			$ids[] = $item->id;
		}
		return $ids;
	}
	public function getophnupreoperative_preoperative_hearing_aid_defaults() {
		$ids = array();
		foreach (OphNuPreoperative_PreoperativeAssessment_HearingAid::model()->findAll('`default` = ?',array(1)) as $item) {
			$ids[] = $item->id;
		}
		return $ids;
	}

	protected function afterSave()
	{
		if (!empty($_POST['MultiSelect_wristband'])) {

			$existing_ids = array();

			foreach (Element_OphNuPreoperative_PreoperativeAssessment_Wristband_Assignment::model()->findAll('element_id = :elementId', array(':elementId' => $this->id)) as $item) {
				$existing_ids[] = $item->ophnupreoperative_preoperative_wristband_id;
			}

			foreach ($_POST['MultiSelect_wristband'] as $id) {
				if (!in_array($id,$existing_ids)) {
					$item = new Element_OphNuPreoperative_PreoperativeAssessment_Wristband_Assignment;
					$item->element_id = $this->id;
					$item->ophnupreoperative_preoperative_wristband_id = $id;

					if (!$item->save()) {
						throw new Exception('Unable to save MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}

			foreach ($existing_ids as $id) {
				if (!in_array($id,$_POST['MultiSelect_wristband'])) {
					$item = Element_OphNuPreoperative_PreoperativeAssessment_Wristband_Assignment::model()->find('element_id = :elementId and ophnupreoperative_preoperative_wristband_id = :lookupfieldId',array(':elementId' => $this->id, ':lookupfieldId' => $id));
					if (!$item->delete()) {
						throw new Exception('Unable to delete MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}
		}
		if (!empty($_POST['MultiSelect_falls'])) {

			$existing_ids = array();

			foreach (Element_OphNuPreoperative_PreoperativeAssessment_Falls_Assignment::model()->findAll('element_id = :elementId', array(':elementId' => $this->id)) as $item) {
				$existing_ids[] = $item->ophnupreoperative_preoperative_falls_id;
			}

			foreach ($_POST['MultiSelect_falls'] as $id) {
				if (!in_array($id,$existing_ids)) {
					$item = new Element_OphNuPreoperative_PreoperativeAssessment_Falls_Assignment;
					$item->element_id = $this->id;
					$item->ophnupreoperative_preoperative_falls_id = $id;

					if (!$item->save()) {
						throw new Exception('Unable to save MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}

			foreach ($existing_ids as $id) {
				if (!in_array($id,$_POST['MultiSelect_falls'])) {
					$item = Element_OphNuPreoperative_PreoperativeAssessment_Falls_Assignment::model()->find('element_id = :elementId and ophnupreoperative_preoperative_falls_id = :lookupfieldId',array(':elementId' => $this->id, ':lookupfieldId' => $id));
					if (!$item->delete()) {
						throw new Exception('Unable to delete MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}
		}
		if (!empty($_POST['MultiSelect_dental'])) {

			$existing_ids = array();

			foreach (Element_OphNuPreoperative_PreoperativeAssessment_Dental_Assignment::model()->findAll('element_id = :elementId', array(':elementId' => $this->id)) as $item) {
				$existing_ids[] = $item->ophnupreoperative_preoperative_dental_id;
			}

			foreach ($_POST['MultiSelect_dental'] as $id) {
				if (!in_array($id,$existing_ids)) {
					$item = new Element_OphNuPreoperative_PreoperativeAssessment_Dental_Assignment;
					$item->element_id = $this->id;
					$item->ophnupreoperative_preoperative_dental_id = $id;

					if (!$item->save()) {
						throw new Exception('Unable to save MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}

			foreach ($existing_ids as $id) {
				if (!in_array($id,$_POST['MultiSelect_dental'])) {
					$item = Element_OphNuPreoperative_PreoperativeAssessment_Dental_Assignment::model()->find('element_id = :elementId and ophnupreoperative_preoperative_dental_id = :lookupfieldId',array(':elementId' => $this->id, ':lookupfieldId' => $id));
					if (!$item->delete()) {
						throw new Exception('Unable to delete MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}
		}
		if (!empty($_POST['MultiSelect_hearing_aid'])) {

			$existing_ids = array();

			foreach (Element_OphNuPreoperative_PreoperativeAssessment_HearingAid_Assignment::model()->findAll('element_id = :elementId', array(':elementId' => $this->id)) as $item) {
				$existing_ids[] = $item->ophnupreoperative_preoperative_hearing_aid_id;
			}

			foreach ($_POST['MultiSelect_hearing_aid'] as $id) {
				if (!in_array($id,$existing_ids)) {
					$item = new Element_OphNuPreoperative_PreoperativeAssessment_HearingAid_Assignment;
					$item->element_id = $this->id;
					$item->ophnupreoperative_preoperative_hearing_aid_id = $id;

					if (!$item->save()) {
						throw new Exception('Unable to save MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}

			foreach ($existing_ids as $id) {
				if (!in_array($id,$_POST['MultiSelect_hearing_aid'])) {
					$item = Element_OphNuPreoperative_PreoperativeAssessment_HearingAid_Assignment::model()->find('element_id = :elementId and ophnupreoperative_preoperative_hearing_aid_id = :lookupfieldId',array(':elementId' => $this->id, ':lookupfieldId' => $id));
					if (!$item->delete()) {
						throw new Exception('Unable to delete MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}
		}

		return parent::afterSave();
	}
}
?>