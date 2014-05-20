<?php

class m140520_081607_version_tables extends OEMigration
{
	public $tables = array(
		'et_ophnupreoperative_baseline',
		'et_ophnupreoperative_baseline_obs_assignment',
		'et_ophnupreoperative_patienthistory',
		'et_ophnupreoperative_patientstatus',
		'et_ophnupreoperative_patientstatus_cancel_assignment',
		'et_ophnupreoperative_preoperative',
		'et_ophnupreoperative_preoperative_dental_assignment',
		'et_ophnupreoperative_preoperative_falls_assignment',
		'et_ophnupreoperative_preoperative_hearing_aid_assignment',
		'et_ophnupreoperative_preoperative_wristband_assignment',
		'et_ophnupreoperative_preopmedication',
		'ophnupreoperative_baseline_fluid_type',
		'ophnupreoperative_baseline_location',
		'ophnupreoperative_baseline_obs',
		'ophnupreoperative_baseline_pain_score_method',
		'ophnupreoperative_baseline_side',
		'ophnupreoperative_baseline_size',
		'ophnupreoperative_baseline_skin',
		'ophnupreoperative_baseline_skin_assignment',
		'ophnupreoperative_baseline_type_of_pain',
		'ophnupreoperative_baseline_volume_given',
		'ophnupreoperative_patienthistory_allergy',
		'ophnupreoperative_patienthistory_medication',
		'ophnupreoperative_patientstatus_cancel',
		'ophnupreoperative_patientstatus_patient_status',
		'ophnupreoperative_preopassessment_iol_size',
		'ophnupreoperative_preopassessment_iol_type',
		'ophnupreoperative_preoperative_belong',
		'ophnupreoperative_preoperative_belong_assignment',
		'ophnupreoperative_preoperative_dental',
		'ophnupreoperative_preoperative_falls',
		'ophnupreoperative_preoperative_hearing_aid',
		'ophnupreoperative_preoperative_identifier',
		'ophnupreoperative_preoperative_identifier_assignment',
		'ophnupreoperative_preoperative_iol_verified',
		'ophnupreoperative_preoperative_site',
		'ophnupreoperative_preoperative_translator_present',
		'ophnupreoperative_preoperative_wristband',
		'ophnupreoperative_preopmedication_medication',
	);

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->versionExistingTable($table);
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->dropTable($table.'_version');
		}
	}
}
