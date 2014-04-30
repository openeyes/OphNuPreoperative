<?php

class m140430_191000_site_id_can_be_null extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnupreoperative_preoperative','site_id','int(10) unsigned null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnupreoperative_preoperative','site_id','int(10) unsigned not null');
	}
}
