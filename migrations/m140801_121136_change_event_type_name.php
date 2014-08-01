<?php

class m140801_121136_change_event_type_name extends OEMigration
{
	public function up()
	{
		$this->update('event_type',
			array('name' => 'Nursing pre-operative assessment'),
			"class_name = 'OphNuPreoperative'"
		);
	}

	public function down()
	{
		$this->update('event_type',
			array('name' => 'Pre-operative nursing assessment'),
			"class_name = 'OphNuPreoperative'"
		);
	}
}