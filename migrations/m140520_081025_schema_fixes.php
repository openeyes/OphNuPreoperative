<?php

class m140520_081025_schema_fixes extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuPreoperative"))->queryRow();
		$this->update('element_type',array('required'=>1),"event_type_id = {$event_type['id']}");
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuPreoperative"))->queryRow();
		$this->update('element_type',array('required'=>null),"event_type_id = {$event_type['id']}");
	}
}
