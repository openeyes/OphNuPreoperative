<?php

class m140725_073743_remove_temp extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnupreoperative_baseline','temperature');
		$this->dropColumn('et_ophnupreoperative_baseline_version','temperature');
	}

	public function down()
	{
		$this->addColumn('et_ophnupreoperative_baseline','temperature','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline_version','temperature','varchar(255) not null');
	}
}
