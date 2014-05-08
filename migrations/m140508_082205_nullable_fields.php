<?php

class m140508_082205_nullable_fields extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnupreoperative_baseline','urine_passed','tinyint(1) unsigned null');
		$this->alterColumn('et_ophnupreoperative_baseline','is_patient_experiencing_pain','tinyint(1) unsigned null');
		$this->alterColumn('et_ophnupreoperative_patienthistory','medical_discrepancy_found','tinyint(1) unsigned null');
		$this->alterColumn('et_ophnupreoperative_patientstatus','patient_status_id','int(10) unsigned null');

		$this->alterColumn('et_ophnupreoperative_preoperative','translator_present_id','int(10) unsigned null');
		$this->alterColumn('et_ophnupreoperative_preoperative','date_last_ate','datetime null');
		$this->alterColumn('et_ophnupreoperative_preoperative','date_last_drank','datetime null');
		$this->alterColumn('et_ophnupreoperative_preoperative','iol_verified_id','int(10) unsigned null');

		foreach (array('surgical_site_verified','metal_in_body','falls_mobility','removable_dental_work_present','hearing_aid_present','patient_belongings') as $field) {
			$this->alterColumn('et_ophnupreoperative_preoperative',$field,'tinyint(1) unsigned null');
		}
	}

	public function down()
	{
		$this->alterColumn('et_ophnupreoperative_baseline','urine_passed','tinyint(1) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_baseline','is_patient_experiencing_pain','tinyint(1) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_patienthistory','medical_discrepancy_found','tinyint(1) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_patientstatus','patient_status_id','int(10) unsigned not null');

		$this->alterColumn('et_ophnupreoperative_preoperative','translator_present_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_preoperative','date_last_ate','datetime not null');
		$this->alterColumn('et_ophnupreoperative_preoperative','date_last_drank','datetime not null');
		$this->alterColumn('et_ophnupreoperative_preoperative','iol_verified_id','int(10) unsigned not null');

		foreach (array('surgical_site_verified','metal_in_body','falls_mobility','removable_dental_work_present','hearing_aid_present','patient_belongings') as $field) {
			$this->alterColumn('et_ophnupreoperative_preoperative',$field,'tinyint(1) unsigned not null');
		}
	}
}
