<?php

class m140731_114018_remove_dental_work_items extends OEMigration
{
	public function up()
	{
		$removeItems = array(
			'Full Uppers Removed',
			'Full Lowers Removed'
		);

		// First, remove any FK relationships to the items we are about to remove
		foreach($removeItems as $name) {

			$row = $this->dbConnection->createCommand()
				->select("id")
				->from("ophnupreoperative_preoperative_dental")
				->where("name = '{$name}'")
				->queryRow();

			$id = $row['id'];
			$this->delete('ophnupreoperative_preoperative_dental_assignment', "dental_id = {$id}");
		}

		// Now we can remove the items..
		$this->delete('ophnupreoperative_preoperative_dental', array('in', 'name', $removeItems));

		// .. and fix the display order
		foreach(array(
			'Full Uppers',
			'Full Lowers',
			'Other (please specify)'
		) as $i => $name) {
			$this->update('ophnupreoperative_preoperative_dental',array('display_order' => ($i+1)),"name = '{$name}'");
		}

		$this->refreshTableSchema('ophnupreoperative_preoperative_dental');
	}

	public function down()
	{
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Uppers Removed'));
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Lowers Removed'));

		// Fix the display order
		foreach(array(
			'Full Uppers',
			'Full Uppers Removed',
			'Full Lowers',
			'Full Lowers Removed',
			'Other (please specify)'
		) as $i => $name) {
			$this->update('ophnupreoperative_preoperative_dental',array('display_order' => ($i+1)),"name = '{$name}'");
		}

		$this->refreshTableSchema('ophnupreoperative_preoperative_dental');
	}
}