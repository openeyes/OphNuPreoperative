<?php

class m140527_082447_remove_na_from_dropdown extends CDbMigration
{
	public function up()
	{
		$this->delete('ophnupreoperative_preoperative_wristband',"name = 'N/A'");
	}

	public function down()
	{
		$this->insert('ophnupreoperative_preoperative_wristband',array('id'=>1,'name'=>'N/A','display_order'=>1));
	}
}
