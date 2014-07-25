<?php

class m140527_082447_remove_na_from_dropdown extends CDbMigration
{
	public function up()
	{
		$id = $this->dbConnection->createCommand()->select("id")->from("ophnupreoperative_preoperative_wristband")->where("name = 'N/A'")->queryScalar();

		$this->delete('et_ophnupreoperative_preoperative_wristband_assignment',"ophnupreoperative_preoperative_wristband_id = $id");
		$this->delete('ophnupreoperative_preoperative_wristband',"id = $id");
	}

	public function down()
	{
		$this->insert('ophnupreoperative_preoperative_wristband',array('id'=>1,'name'=>'N/A','display_order'=>1));
	}
}
