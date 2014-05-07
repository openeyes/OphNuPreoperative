<?php

class m140507_171700_module_name extends CDbMigration
{
	public function up()
	{
		$this->update('event_type',array('name' => 'Pre-operative nursing assessment'), "class_name = 'OphNuPreoperative'");
	}

	public function down()
	{
		$this->update('event_type',array('name' => 'Preoperative Nursing Assessment'), "class_name = 'OphNuPreoperative'");
	}
}
