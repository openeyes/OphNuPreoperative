<?php

class m140501_090549_dental_items extends CDbMigration
{
	public function up()
	{
		$this->delete('ophnupreoperative_preoperative_dental');

		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Uppers','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Uppers Removed','display_order'=>2));
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Lowers','display_order'=>3));
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Lowers Removed','display_order'=>4));
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Other (please specify)','display_order'=>5));
	}

	public function down()
	{
		$this->delete('ophnupreoperative_preoperative_dental');

		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Uppers Removed','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Lowers Removed','display_order'=>2));
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Other Removed','display_order'=>3));
	}
}
