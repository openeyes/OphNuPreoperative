<?php // [ORB-443]

class m140818_104053_fix_belonging_items_spelling extends OEMigration
{
	public function up()
	{
		$this->update('ophnupreoperative_preoperative_belong', array(
			'name' => 'Jewellery'
		),"name='Jewlery'");
	}

	public function down()
	{
		$this->update('ophnupreoperative_preoperative_belong', array(
			'name' => 'Jewlery'
		), "name='Jewellery'");
	}
}