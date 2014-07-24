<?php

class m140724_132758_move_iv_fields extends OEMigration
{
	public function up()
	{
		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuPreoperative"))->queryRow();

		$this->insert('element_type',array(
			'event_type_id' => $et['id'],
			'name' => 'IV inserted',
			'class_name' => 'Element_OphNuPreoperative_IVInserted',
			'display_order' => 40,
			'default' => 1,
			'required' => 1,
		));

		$this->update('element_type',array('display_order'=>10),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_PatientHistoryReview'");
		$this->update('element_type',array('display_order'=>20),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_PreoperativeAssessment'");
		$this->update('element_type',array('display_order'=>30),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_BaselineObservations'");
		$this->update('element_type',array('display_order'=>50),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_PreOperativeMedicationAdministration'");
		$this->update('element_type',array('display_order'=>60),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_PatientStatus'");

		$this->createTable('et_ophnupreoperative_iv_inserted', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'iv_inserted' => 'tinyint(1) unsigned not null',
				'iv_location' => 'varchar(255) not null',
				'iv_size_id' => 'int(10) unsigned null',
				'fluid_type_id' => 'int(10) unsigned null',
				'volume_given_id' => 'int(10) unsigned null',
				'rate' => 'varchar(255) not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_iv_inserted_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_iv_inserted_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_iv_inserted_ev_fk` (`event_id`)',
				'KEY `et_ophnupreoperative_iv_inserted_ivsize_fk` (`iv_size_id`)',
				'KEY `et_ophnupreoperative_iv_inserted_fluidtype_fk` (`fluid_type_id`)',
				'KEY `et_ophnupreoperative_iv_inserted_volumegiven_fk` (`volume_given_id`)',
				'CONSTRAINT `et_ophnupreoperative_iv_inserted_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_iv_inserted_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_iv_inserted_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_iv_inserted_ivsize_fk` FOREIGN KEY (`iv_size_id`) REFERENCES `ophnupreoperative_baseline_size` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_iv_inserted_fluidtype_fk` FOREIGN KEY (`fluid_type_id`) REFERENCES `ophnupreoperative_baseline_fluid_type` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_iv_inserted_volumegiven_fk` FOREIGN KEY (`volume_given_id`) REFERENCES `ophnupreoperative_baseline_volume_given` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('et_ophnupreoperative_iv_inserted');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_baseline")->order("id asc")->queryAll() as $row) {
			$this->insert('et_ophnupreoperative_iv_inserted',array(
				'id' => $row['id'],
				'event_id' => $row['event_id'],
				'iv_inserted' => $row['iv_inserted'],
				'iv_location' => $row['iv_location'],
				'iv_size_id' => $row['size_id'],
				'fluid_type_id' => $row['fluid_type_id'],
				'volume_given_id' => $row['volume_given_id'],
				'rate' => $row['rate'],
				'last_modified_user_id' => $row['last_modified_user_id'],
				'last_modified_date' => $row['last_modified_date'],
				'created_user_id' => $row['created_user_id'],
				'created_date' => $row['created_date'],
			));

			foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_baseline_version")->where("id = {$row['id']}")->order('version_id asc')->queryAll() as $v) {
				$this->insert('et_ophnupreoperative_iv_inserted_version',array(
					'id' => $v['id'],
					'event_id' => $v['event_id'],
					'iv_inserted' => $v['iv_inserted'],
					'iv_location' => $v['iv_location'],
					'iv_size_id' => $v['size_id'],
					'fluid_type_id' => $v['fluid_type_id'],
					'volume_given_id' => $v['volume_given_id'],
					'rate' => $v['rate'],
					'last_modified_user_id' => $v['last_modified_user_id'],
					'last_modified_date' => $v['last_modified_date'],
					'created_user_id' => $v['created_user_id'],
					'created_date' => $v['created_date'],
					'version_id' => $v['version_id'],
					'version_date' => $v['version_date'],
				));
			}
		}

		$this->dropForeignKey('ophnupreoperative_baseline_fluid_type_fk','et_ophnupreoperative_baseline');
		$this->dropForeignKey('ophnupreoperative_baseline_size_fk','et_ophnupreoperative_baseline');
		$this->dropForeignKey('ophnupreoperative_baseline_volume_given_fk','et_ophnupreoperative_baseline');
		$this->dropColumn('et_ophnupreoperative_baseline','fluid_type_id');
		$this->dropColumn('et_ophnupreoperative_baseline','size_id');
		$this->dropColumn('et_ophnupreoperative_baseline','volume_given_id');
		$this->dropColumn('et_ophnupreoperative_baseline','iv_inserted');
		$this->dropColumn('et_ophnupreoperative_baseline','iv_location');
		$this->dropColumn('et_ophnupreoperative_baseline','rate');

		$this->dropColumn('et_ophnupreoperative_baseline_version','fluid_type_id');
		$this->dropColumn('et_ophnupreoperative_baseline_version','size_id');
		$this->dropColumn('et_ophnupreoperative_baseline_version','volume_given_id');
		$this->dropColumn('et_ophnupreoperative_baseline_version','iv_inserted');
		$this->dropColumn('et_ophnupreoperative_baseline_version','iv_location');
		$this->dropColumn('et_ophnupreoperative_baseline_version','rate');
	}

	public function down()
	{
		$this->addColumn('et_ophnupreoperative_baseline','fluid_type_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_baseline','size_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_baseline','volume_given_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_baseline','iv_inserted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_baseline','iv_location','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline','rate','varchar(255) not null');
		$this->createIndex('ophnupreoperative_baseline_fluid_type_fk','et_ophnupreoperative_baseline','fluid_type_id');
		$this->createIndex('ophnupreoperative_baseline_size_fk','et_ophnupreoperative_baseline','size_id');
		$this->createIndex('ophnupreoperative_baseline_volume_given_fk','et_ophnupreoperative_baseline','volume_given_id');
		$this->addForeignKey('ophnupreoperative_baseline_fluid_type_fk','et_ophnupreoperative_baseline','fluid_type_id','ophnupreoperative_baseline_fluid_type','id');
		$this->addForeignKey('ophnupreoperative_baseline_size_fk','et_ophnupreoperative_baseline','size_id','ophnupreoperative_baseline_size','id');
		$this->addForeignKey('ophnupreoperative_baseline_volume_given_fk','et_ophnupreoperative_baseline','volume_given_id','ophnupreoperative_baseline_volume_given','id');

		$this->addColumn('et_ophnupreoperative_baseline_version','fluid_type_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_baseline_version','size_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_baseline_version','volume_given_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_baseline_version','iv_inserted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_baseline_version','iv_location','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline_version','rate','varchar(255) not null');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_iv_inserted")->order("id asc")->queryAll() as $row) {
			$this->update('et_ophnupreoperative_baseline',array(
					'iv_inserted' => $row['iv_inserted'],
					'iv_location' => $row['iv_location'],
					'size_id' => $row['iv_size_id'],
					'fluid_type_id' => $row['fluid_type_id'],
					'volume_given_id' => $row['volume_given_id'],
					'rate' => $row['rate'],
				),"id = {$row['id']}");

			foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_iv_inserted_version")->where("id = {$row['id']}")->order('version_id asc')->queryAll() as $v) {
				$this->update('et_ophnupreoperative_baseline_version',array(
						'iv_inserted' => $v['iv_inserted'],
						'iv_location' => $v['iv_location'],
						'size_id' => $v['iv_size_id'],
						'fluid_type_id' => $v['fluid_type_id'],
						'volume_given_id' => $v['volume_given_id'],
						'rate' => $v['rate'],
					),"id = {$row['id']} and version_id = {$v['id']}");
			}
		}

		$this->dropTable('et_ophnupreoperative_iv_inserted_version');
		$this->dropTable('et_ophnupreoperative_iv_inserted');

		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuPreoperative"))->queryRow();

		$this->delete('element_type',"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_IVInserted'");

		$this->update('element_type',array('display_order'=>1),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_PatientHistoryReview'");
		$this->update('element_type',array('display_order'=>2),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_PreoperativeAssessment'");
		$this->update('element_type',array('display_order'=>3),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_BaselineObservations'");
		$this->update('element_type',array('display_order'=>4),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_PreOperativeMedicationAdministration'");
		$this->update('element_type',array('display_order'=>5),"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_PatientStatus'");
	}
}
