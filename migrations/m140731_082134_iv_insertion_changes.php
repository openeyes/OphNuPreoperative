<?php

class m140731_082134_iv_insertion_changes extends OEMigration
{
	public function up()
	{
		$this->createTable('ophnupreoperative_iv_location', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_iv_location_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_iv_location_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_iv_location_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_iv_location_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnupreoperative_iv_location');

		$this->createTable('ophnupreoperative_iv_side', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_iv_side_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_iv_side_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_iv_side_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_iv_side_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnupreoperative_iv_side');

		$this->initialiseData(dirname(__FILE__));

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_iv_inserted")->queryAll() as $row) {
			switch (strtolower($row['iv_location'])) {
				case 'hand':
					$this->update('et_ophnupreoperative_iv_inserted',array('iv_location' => 1),"id = {$row['id']}");
					break;
				case 'arm':
					$this->update('et_ophnupreoperative_iv_inserted',array('iv_location' => 2),"id = {$row['id']}");
					break;
				case 'foot':
					$this->update('et_ophnupreoperative_iv_inserted',array('iv_location' => 3),"id = {$row['id']}");
					break;
				default:
					$this->update('et_ophnupreoperative_iv_inserted',array('iv_location' => 1),"id = {$row['id']}");
					break;
			}
		}

		$this->renameColumn('et_ophnupreoperative_iv_inserted','iv_location','iv_location_id');
		$this->alterColumn('et_ophnupreoperative_iv_inserted','iv_location_id','int(10) unsigned null');
		$this->addForeignKey('et_ophnupreoperative_iv_inserted_ili_fk','et_ophnupreoperative_iv_inserted','iv_location_id','ophnupreoperative_iv_location','id');

		$this->addColumn('et_ophnupreoperative_iv_inserted','iv_side_id','int(10) unsigned null');
		$this->addForeignKey('et_ophnupreoperative_iv_inserted_isi_fk','et_ophnupreoperative_iv_inserted','iv_side_id','ophnupreoperative_iv_side','id');

		$this->renameColumn('et_ophnupreoperative_iv_inserted_version','iv_location','iv_location_id');
		$this->alterColumn('et_ophnupreoperative_iv_inserted_version','iv_location_id','int(10) unsigned null');

		$this->addColumn('et_ophnupreoperative_iv_inserted_version','iv_side_id','int(10) unsigned null');

		$this->insert('ophnupreoperative_baseline_fluid_type',array('id'=>2,'name'=>'LR','display_order'=>2));

		$this->addColumn('et_ophnupreoperative_iv_inserted','iv_fluid_started','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_iv_inserted_version','iv_fluid_started','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnupreoperative_iv_inserted','iv_fluid_started');
		$this->dropColumn('et_ophnupreoperative_iv_inserted_version','iv_fluid_started');

		$this->delete('ophnupreoperative_baseline_fluid_type',"id=2");

		$this->dropColumn('et_ophnupreoperative_iv_inserted_version','iv_side_id');

		$this->alterColumn('et_ophnupreoperative_iv_inserted_version','iv_location_id','varchar(255) not null');
		$this->renameColumn('et_ophnupreoperative_iv_inserted_version','iv_location_id','iv_location');

		$this->dropForeignKey('et_ophnupreoperative_iv_inserted_isi_fk','et_ophnupreoperative_iv_inserted');
		$this->dropColumn('et_ophnupreoperative_iv_inserted','iv_side_id');

		$this->dropForeignKey('et_ophnupreoperative_iv_inserted_ili_fk','et_ophnupreoperative_iv_inserted');
		$this->alterColumn('et_ophnupreoperative_iv_inserted','iv_location_id','varchar(255) not null');
		$this->renameColumn('et_ophnupreoperative_iv_inserted','iv_location_id','iv_location');

		$locations = array();

		foreach ($this->dbConnection->createCommand()->select("*")->from("ophnupreoperative_iv_location")->queryAll() as $location) {
			$locations[$location['id']] = $location['name'];
		}

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_iv_inserted")->queryAll() as $row) {
			$this->update('et_ophnupreoperative_iv_inserted',array('iv_location' => $locations[$row['iv_location']]),"id = {$row['id']}");
		}

		$this->dropTable('ophnupreoperative_iv_side_version');
		$this->dropTable('ophnupreoperative_iv_side');

		$this->dropTable('ophnupreoperative_iv_location_version');
		$this->dropTable('ophnupreoperative_iv_location');
	}
}
