<?php

class m140815_122716_allergies_verified_field extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnupreoperative_patienthistory','allergies_verified','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_patienthistory_version','allergies_verified','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnupreoperative_patienthistory','allergies_verified');
		$this->dropColumn('et_ophnupreoperative_patienthistory_version','allergies_verified');
	}
}
