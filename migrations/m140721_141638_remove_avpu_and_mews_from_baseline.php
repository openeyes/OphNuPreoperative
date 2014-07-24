<?php

class m140721_141638_remove_avpu_and_mews_from_baseline extends OEMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnupreoperative_baseline', 'avpu');
		$this->dropColumn('et_ophnupreoperative_baseline', 'mews_score');
	}

	public function down()
	{
		$this->addColumn('et_ophnupreoperative_baseline', 'avpu', 'varchar(255) DEFAULT \'\'');
		$this->addColumn('et_ophnupreoperative_baseline', 'mews_score', 'varchar(255) DEFAULT \'\'');
	}
}