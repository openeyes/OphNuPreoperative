<?php

class m140430_132920_field_changes extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('et_ophnupreoperative_baseline','blood_pressure','bp_systolic');
		$this->addColumn('et_ophnupreoperative_baseline','bp_diastolic','varchar(255)');
	}

	public function down()
	{
		$this->dropColumn('et_ophnupreoperative_baseline','bp_diastolic');
		$this->renameColumn('et_ophnupreoperative_baseline','bp_systolic','blood_pressure');
	}
}
