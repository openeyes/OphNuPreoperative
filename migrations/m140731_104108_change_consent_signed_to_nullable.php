<?php

class m140731_104108_change_consent_signed_to_nullable extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnupreoperative_preoperative', 'consent_signed', 'tinyint(1) unsigned null');
		$this->alterColumn('et_ophnupreoperative_preoperative_version', 'consent_signed', 'tinyint(1) unsigned null');
		$this->refreshTableSchema('et_ophnupreoperative_preoperative');
		$this->refreshTableSchema('et_ophnupreoperative_preoperative_version');
	}

	public function down()
	{
		$this->alterColumn('et_ophnupreoperative_preoperative', 'consent_signed', 'tinyint(1) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_preoperative_version', 'consent_signed', 'tinyint(1) unsigned not null');
		$this->refreshTableSchema('et_ophnupreoperative_preoperative');
		$this->refreshTableSchema('et_ophnupreoperative_preoperative_version');
	}
}