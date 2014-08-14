<?php //[ORB-361]

class m140814_135919_volume_given_free_text extends OEMigration
{
	public function up()
	{
		// Add a "volume_given" "free text" column to the element table
		$this->addColumn('et_ophnupreoperative_iv_inserted','volume_given','varchar(255) not null');

		// Add all existing volume given types into the volume_given column
		$inserted = $this->dbConnection->createCommand()
			->select('e.*, v.name as volume_given_name')
			->from('et_ophnupreoperative_iv_inserted e')
			->join('ophnupreoperative_baseline_volume_given v', 'e.volume_given_id = v.id')
			->queryAll();

		foreach($inserted as $item) {
			$this->update('et_ophnupreoperative_iv_inserted', array(
				'volume_given' => str_replace(' mL', '', $item['volume_given_name'])
			), 'id = '.$item['id']);
		}

		// Drop old lookup relation and table
		$this->dropForeignKey('et_ophnupreoperative_iv_inserted_volumegiven_fk','et_ophnupreoperative_iv_inserted');
		$this->dropTable('ophnupreoperative_baseline_volume_given');
		$this->dropColumn('et_ophnupreoperative_iv_inserted','volume_given_id');

		$this->refreshTableSchema('et_ophnupreoperative_iv_inserted');
	}

	public function down()
	{
		$this->dropColumn('et_ophnupreoperative_iv_inserted','volume_given');

		// Add back the lookup table and relation
		$this->addColumn('et_ophnupreoperative_iv_inserted', 'volume_given_id', 'int(10) unsigned null');

		$this->createTable('ophnupreoperative_baseline_volume_given', array(
			'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
			'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
			'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'PRIMARY KEY (`id`)',
			'KEY `ophnupreoperative_baseline_volume_given_lmui_fk` (`last_modified_user_id`)',
			'KEY `ophnupreoperative_baseline_volume_given_cui_fk` (`created_user_id`)',
			'CONSTRAINT `ophnupreoperative_baseline_volume_given_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `ophnupreoperative_baseline_volume_given_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_volume_given',array('name'=>'250 mL','display_order'=>1));
		$this->insert('ophnupreoperative_baseline_volume_given',array('name'=>'500 mL','display_order'=>2));
		$this->insert('ophnupreoperative_baseline_volume_given',array('name'=>'1000 mL','display_order'=>3));

		$this->addForeignKey('et_ophnupreoperative_iv_inserted_volumegiven_fk','et_ophnupreoperative_iv_inserted','volume_given_id','ophnupreoperative_baseline_volume_given','id');

		$this->refreshTableSchema('et_ophnupreoperative_iv_inserted');
	}
}