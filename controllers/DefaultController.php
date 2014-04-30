<?php

class DefaultController extends BaseEventTypeController
{
	static protected $action_types = array(
		'drugList' => self::ACTION_TYPE_FORM,
		'validateMedication' => self::ACTION_TYPE_FORM,
		'routeOptions' => self::ACTION_TYPE_FORM,
		'addInvestigation' => self::ACTION_TYPE_FORM,
		'riskProphylaxis' => self::ACTION_TYPE_FORM,
	);

	public function actionCreate()
	{
		parent::actionCreate();
	}

	public function actionUpdate($id)
	{
		parent::actionUpdate($id);
	}

	public function actionView($id)
	{
		parent::actionView($id);
	}

	public function actionPrint($id)
	{
		parent::actionPrint($id);
	}

	/**
	* use the split event type javascript and styling
	*
	* @param CAction $action
	* @return bool
	*/
	protected function beforeAction($action)
	{
		Yii::app()->assetManager->registerScriptFile('js/spliteventtype.js', null, null, AssetManager::OUTPUT_SCREEN);
		return parent::beforeAction($action);
	}

	public function actionDrugList()
	{
		if (Yii::app()->request->isAjaxRequest) {
			$criteria = new CDbCriteria();
			if (isset($_GET['term']) && $term = $_GET['term']) {
				$criteria->addCondition(array('LOWER(name) LIKE :term', 'LOWER(aliases) LIKE :term'), 'OR');
				$params[':term'] = '%' . strtolower(strtr($term, array('%' => '\%'))) . '%';
			}
			$criteria->order = 'name';
			$criteria->params = $params;
			$drugs = Drug::model()->findAll($criteria);
			$return = array();
			foreach ($drugs as $drug) {
				$return[] = array(
						'label' => $drug->tallmanlabel,
						'value' => $drug->tallman,
						'id' => $drug->id,
				);
			}
			echo CJSON::encode($return);
		}
	}

	public function actionValidateMedication()
	{
		$medication = new OphNuPreoperative_PatientHistory_Medication;
		$medication->attributes = Helper::convertNHS2MySQL($_POST);

		$errors = array();

		if (!$medication->validate()) {
			foreach ($medication->getErrors() as $error) {
				$errors[] = $error[0];
			}
		}

		if (!empty($errors)) {
			echo json_encode(array(
				'status' => 'error',
				'errors' => $errors,
			));
		} else {
			echo json_encode(array(
				'status' => 'ok',
				'row' => $this->renderPartial('_medication_row',array('medication' => $medication,'i' => @$_POST['i'], 'edit' => true),true),
			));
		}
	}

	public function actionRouteOptions()
	{
		if (!$route = DrugRoute::model()->findByPk(@$_GET['route_id'])) {
			throw new Exception("Route not found: ".@$_GET['route_id']);
		}

		echo '<option value="">- Select -</option>';

		foreach (DrugRouteOption::model()->findAll(array('order'=>'id asc','condition' => 'drug_route_id=?','params' => array($route->id))) as $option) {
			echo '<option value="'.$option->id.'">'.$option->name.'</option>';
		}
	}

	protected function setElementDefaultOptions_Element_OphNuPreoperative_PatientHistoryReview($element, $action)
	{
		if ($action == 'create') {
			$medications = array();

			foreach ($this->patient->medications as $medication) {
				$_medication = new OphNuPreoperative_PatientHistory_Medication;

				foreach (array('drug_id','route_id','option_id','frequency_id','start_date') as $field) {
					$_medication->$field = $medication->$field;
				}

				$medications[] = $_medication;
			}

			$element->medications = $medications;

			$allergies = array();

			foreach ($this->patient->allergies as $allergy) {
				$_allergy = new OphNuPreoperative_PatientHistory_Allergy;
				$_allergy->allergy_id = $allergy->id;

				$allergies[] = $_allergy;
			}

			$element->allergies = $allergies;
		}
	}

	protected function setComplexAttributes_Element_OphNuPreoperative_PatientHistoryReview($element, $data, $index)
	{
		$medications = array();

		if (!empty($data['medication_history_drug_ids'])) {
			foreach ($data['medication_history_drug_ids'] as $i => $drug_id) {
				$medication = new OphNuPreoperative_PatientHistory_Medication;
				$medication->drug_id = $drug_id;
				$medication->route_id = $data['medication_history_route_ids'][$i];
				$medication->option_id = $data['medication_history_option_ids'][$i];
				$medication->frequency_id = $data['medication_history_frequency_ids'][$i];
				$medication->start_date = $data['medication_history_start_dates'][$i];

				$medications[] = $medication;
			}
		}

		$element->medications = $medications;

		$allergies = array();

		if (!empty($data['allergies'])) {
			foreach ($data['allergies'] as $i => $allergy_id) {
				$allergy = new OphNuPreoperative_PatientHistory_Allergy;
				$allergy->allergy_id = $allergy_id;

				$allergies[] = $allergy;
			}
		}

		$element->allergies = $allergies;
	}

	protected function saveComplexAttributes_Element_OphNuPreoperative_PatientHistoryReview($element, $data, $index)
	{
		if (empty($data['medication_history_drug_ids'])) {
			$element->updateMedications();
		} else {
			$element->updateMedications($data['medication_history_medication_ids'],$data['medication_history_drug_ids'],$data['medication_history_route_ids'],$data['medication_history_option_ids'],$data['medication_history_frequency_ids'],$data['medication_history_start_dates']);
		}

		$element->updateAllergies(empty($data['allergies']) ? array() : $data['allergies']);
	}

	protected function setComplexAttributes_Element_OphNuPreoperative_PreoperativeAssessment($element, $data, $index)
	{
		$wristbands = array();

		if (!empty($data['MultiSelect_wristband'])) {
			foreach ($data['MultiSelect_wristband'] as $wristband_id) {
				$assignment = new Element_OphNuPreoperative_PreoperativeAssessment_Wristband_Assignment;
				$assignment->Element_ophnupreoperative_preoperative_wristband_id = $wristband_id;

				$wristbands[] = $assignment;
			}
		}

		$element->wristbands = $wristbands;

		$falls = array();

		if (!empty($data['MultiSelect_falls'])) {
			foreach ($data['MultiSelect_falls'] as $fall_id) {
				$assignment = new Element_OphNuPreoperative_PreoperativeAssessment_Falls_Assignment;
				$assignment->ophnupreoperative_preoperative_falls_id = $fall_id;

				$falls[] = $assignment;
			}
		}

		$element->fallss = $falls;

		$dentals = array();

		if (!empty($data['MultiSelect_dental'])) {
			foreach ($data['MultiSelect_dental'] as $dental_id) {
				$assignment = new Element_OphNuPreoperative_PreoperativeAssessment_Dental_Assignment;
				$assignment->ophnupreoperative_preoperative_dental_id = $dental_id;

				$dentals[] = $assignment;
			}
		}

		$element->dentals = $dentals;

		$hearing_aids = array();

		if (!empty($data['MultiSelect_hearing_aid'])) {
			foreach ($data['MultiSelect_hearing_aid'] as $hearing_aid_id) {
				$assignment = new Element_OphNuPreoperative_PreoperativeAssessment_HearingAid_Assignment;
				$assignment->ophnupreoperative_preoperative_hearing_aid_id = $hearing_aid_id;

				$hearing_aids[] = $assignment;
			}
		}

		$element->hearing_aids = $hearing_aids;
	}

	protected function saveComplexAttributes_Element_OphNuPreoperative_PreoperativeAssessment($element, $data, $index)
	{
		$element->updateMultiSelectData('Element_OphNuPreoperative_PreoperativeAssessment_Wristband_Assignment',empty($data['MultiSelect_wristband']) ? array() : $data['MultiSelect_wristband'],'ophnupreoperative_preoperative_wristband_id');
		$element->updateMultiSelectData('Element_OphNuPreoperative_PreoperativeAssessment_Falls_Assignment',empty($data['MultiSelect_falls']) ? array() : $data['MultiSelect_falls'],'ophnupreoperative_preoperative_falls_id');
		$element->updateMultiSelectData('Element_OphNuPreoperative_PreoperativeAssessment_Dental_Assignment',empty($data['MultiSelect_dental']) ? array() : $data['MultiSelect_dental'],'ophnupreoperative_preoperative_dental_id');
		$element->updateMultiSelectData('Element_OphNuPreoperative_PreoperativeAssessment_HearingAid_Assignment',empty($data['MultiSelect_hearing_aid']) ? array() : $data['MultiSelect_hearing_aid'],'ophnupreoperative_preoperative_hearing_aid_id');
	}

	protected function setComplexAttributes_Element_OphNuPreoperative_BaselineObservations($element, $data, $index)
	{
		$observations = array();

		if (!empty($data['MultiSelect_obs'])) {
			foreach ($data['MultiSelect_obs'] as $observation_id) {
				$assignment = new Element_OphNuPreoperative_BaselineObservations_Obs_Assignment;
				$assignment->ophnupreoperative_baseline_obs_id = $observation_id;

				$observations[] = $assignment;
			}
		}

		$element->obss = $observations;
	}

	protected function saveComplexAttributes_Element_OphNuPreoperative_BaselineObservations($element, $data, $index)
	{
		$element->updateMultiSelectData('Element_OphNuPreoperative_BaselineObservations_Obs_Assignment',empty($data['MultiSelect_obs']) ? array() : $data['MultiSelect_obs'],'ophnupreoperative_baseline_obs_id');
	}

	protected function setComplexAttributes_Element_OphNuPreoperative_PreoperativeMedicationAdministration($element, $data, $index)
	{
		$medications = array();

		if (!empty($data['administered_medications_drug_ids'])) {
			foreach ($data['administered_medications_drug_ids'] as $i => $drug_id) {
				$medication = new OphNuPreoperative_PreoperativeMedicationAdministration_Medication;
				$medication->drug_id = $drug_id;
				$medication->route_id = $data['administered_medications_route_ids'][$i];
				$medication->option_id = $data['administered_medications_option_ids'][$i];
				$medication->frequency_id = $data['administered_medications_frequency_ids'][$i];
				$medication->start_date = $data['administered_medications_start_dates'][$i];

				$medications[] = $medication;
			}
		}

		$element->medications = $medications;
	}

	protected function saveComplexAttributes_Element_OphNuPreoperative_PreoperativeMedicationAdministration($element, $data, $index)
	{
		if (empty($data['administered_medications_drug_ids'])) {
			$element->updateMedications();
		} else {
			$element->updateMedications($data['administered_medications_medication_ids'],$data['administered_medications_drug_ids'],$data['administered_medications_route_ids'],$data['administered_medications_option_ids'],$data['administered_medications_frequency_ids'],$data['administered_medications_start_dates']);
		}
	}

	protected function setComplexAttributes_Element_OphNuPreoperative_PatientStatus($element, $data, $index)
	{
		$reasons = array();

		if (!empty($data['MultiSelect_cancel'])) {
			foreach ($data['MultiSelect_cancel'] as $reason_id) {
				$assignment = new Element_OphNuPreoperative_PatientStatus_Cancel_Assignment;
				$assignment->ophnupreoperative_patientstatus_cancel_id = $reason_id;

				$reasons[] = $assignment;
			}
		}

		$element->cancels = $reasons;
	}

	protected function saveComplexAttributes_Element_OphNuPreoperative_PatientStatus($element, $data, $index)
	{
		$element->updateMultiSelectData('Element_OphNuPreoperative_PatientStatus_Cancel_Assignment',empty($data['MultiSelect_cancel']) ? array() : $data['MultiSelect_cancel'],'ophnupreoperative_patientstatus_cancel_id');
	}
}
