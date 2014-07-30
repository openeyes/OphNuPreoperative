<?php

class m140730_130849_add_removable_dental_work_comments extends OEMigration
{
	public function up()
	{
		$this->addColumn('et_ophnupreoperative_preoperative','removable_dental_work_present_comments','text COLLATE utf8_bin DEFAULT \'\'');
		$this->addColumn('et_ophnupreoperative_preoperative_version','removable_dental_work_present_comments','text COLLATE utf8_bin DEFAULT \'\'');
		$this->refreshTableSchema('et_ophnupreoperative_preoperative');
		$this->refreshTableSchema('et_ophnupreoperative_preoperative_version');
	}

	public function down()
	{
		$this->dropColumn('et_ophnupreoperative_preoperative','removable_dental_work_present_comments');
		$this->dropColumn('et_ophnupreoperative_preoperative_version','removable_dental_work_present_comments');
		$this->refreshTableSchema('et_ophnupreoperative_preoperative');
		$this->refreshTableSchema('et_ophnupreoperative_preoperative_version');
	}
}