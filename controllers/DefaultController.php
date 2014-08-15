<?php

class DefaultController extends BaseEventTypeController
{
	static protected $action_types = array(
		'drugList' => self::ACTION_TYPE_FORM,
		'validateMedication' => self::ACTION_TYPE_FORM,
		'routeOptions' => self::ACTION_TYPE_FORM,
		'addInvestigation' => self::ACTION_TYPE_FORM,
		'riskProphylaxis' => self::ACTION_TYPE_FORM,
		'validateVital' => self::ACTION_TYPE_FORM,
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
		}
	}

	protected function setElementDefaultOptions_Element_OphNuPreoperative_PreoperativeAssessment($element, $action)
	{
		if ($action == 'create') {
			$element->date_last_ate = date('j M Y',strtotime('yesterday'));
			$element->date_last_drank = date('j M Y',strtotime('yesterday'));
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
	}

	protected function saveComplexAttributes_Element_OphNuPreoperative_PatientHistoryReview($element, $data, $index)
	{
		if (empty($data['medication_history_drug_ids'])) {
			$element->updateMedications();
		} else {
			$element->updateMedications($data['medication_history_medication_ids'],$data['medication_history_drug_ids'],$data['medication_history_route_ids'],$data['medication_history_option_ids'],$data['medication_history_frequency_ids'],$data['medication_history_start_dates']);
		}
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

	public function actionValidateVital()
	{
		if (!@$_POST['Element_OphNuPreoperative_BaselineObservations_vitals_editItem'] || !($vital = OphNuPreoperative_Observation::model()->findByPk($_POST['Element_OphNuPreoperative_BaselineObservations_vitals_editItem_id']))) {
			$vital = new OphNuPreoperative_Observation;
		}

		$vital->attributes = $_POST;

		$vital->validate();

		$errors = array();

		foreach ($vital->errors as $field => $error) {
			$errors[$field] = $error[0];
		}

		if (empty($errors)) {
			$vital->timestamp = date('Y-m-d',strtotime($vital->timestamp)).' '.$vital->time.':00';
			$errors['row'] = $this->renderPartial('_vital_row',array('item' => $vital, 'i' => $_POST['i'], 'edit' => true),true);
		}

		echo json_encode($errors);
	}

	protected function setComplexAttributes_Element_OphNuPreoperative_BaselineObservations($element, $data, $index)
	{
		$vitals = array();

		$safe = OphNuPreoperative_Observation::model()->safeAttributeNames;

		if (!empty($data['OphNuPreoperative_Observation'][$safe[0]])) {
			foreach ($data['OphNuPreoperative_Observation'][$safe[0]] as $i => $first) {
				if (!@$data['OphNuPreoperative_Observation']['id'][$i] || !($vital = OphNuPreoperative_Observation::model()->findByPk($data['OphNuPreoperative_Observation']['id'][$i]))) {
					$vital = new OphNuPreoperative_Observation;
					$vital->element_id = $element->id;
				}

				foreach ($safe as $attribute) {
					$vital->$attribute = @$data['OphNuPreoperative_Observation'][$attribute][$i];
				}

				$vital->time = date('H:i',strtotime($vital->timestamp));

				$vitals[] = $vital;
			}
		}

		$element->vitals = $vitals;
	}

	protected function saveComplexAttributes_Element_OphNuPreoperative_BaselineObservations($element, $data, $index)
	{
		$ids = array();

		foreach ($element->vitals as $vital) {
			$vital->element_id = $element->id;

			if (!$vital->save()) {
				throw new Exception("Unable to save vital item: ".print_r($vital->errors,true));
			}

			$ids[] = $vital->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $element->id;

		if (!empty($ids)) {
			$criteria->addNotInCondition('id',$ids);
		}

		$measurements = array();

		foreach (OphNuPreoperative_Observation::model()->findAll($criteria) as $vital) {
			foreach ($vital->relations() as $relation => $def) {
				if ($vital->$relation instanceof Measurement) {
					$measurements[] = $vital->$relation;
				}
			}
		}

		OphNuPreoperative_Observation::model()->deleteAll($criteria);

		foreach ($measurements as $measurement) {
			if ($measurement->isOrigin($element->event)) {
				if (!$measurement->delete()) {
					throw new Exception("Unable to delete measurement: ".print_r($measurement->errors,true));
				}
			}
		}
	}
}
