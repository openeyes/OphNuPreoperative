<?php

class m140730_151034_remove_allergies_verified extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnupreoperative_patienthistory', 'allergies_verified');
		$this->dropColumn('et_ophnupreoperative_patienthistory_version', 'allergies_verified');
		$this->refreshTableSchema('et_ophnupreoperative_patienthistory');
		$this->refreshTableSchema('et_ophnupreoperative_patienthistory_version');
	}

	public function down()
	{
		$this->addColumn('et_ophnupreoperative_patienthistory', 'allergies_verified', 'tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_patienthistory_version', 'allergies_verified', 'tinyint(1) unsigned NOT NULL');
		$this->refreshTableSchema('et_ophnupreoperative_patienthistory');
		$this->refreshTableSchema('et_ophnupreoperative_patienthistory_version');
	}
}