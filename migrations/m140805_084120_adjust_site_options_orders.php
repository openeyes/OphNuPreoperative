<?php

class m140805_084120_adjust_site_options_orders extends OEMigration
{
	public function up()
	{
		$this->update('ophnupreoperative_preoperative_site', array('display_order' => 1), "name = 'Right'");
		$this->update('ophnupreoperative_preoperative_site', array('display_order' => 2), "name = 'Both'");
		$this->update('ophnupreoperative_preoperative_site', array('display_order' => 3), "name = 'Left'");
	}

	public function down()
	{
		$this->update('ophnupreoperative_preoperative_site', array('display_order' => 1), "name = 'Left'");
		$this->update('ophnupreoperative_preoperative_site', array('display_order' => 2), "name = 'Right'");
		$this->update('ophnupreoperative_preoperative_site', array('display_order' => 3), "name = 'Both'");
	}
}