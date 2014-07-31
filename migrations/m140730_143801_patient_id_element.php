<?php

class m140730_143801_patient_id_element extends OEMigration
{
	public function up()
	{
		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :cn",array(":cn" => "OphNuPreoperative"))->queryRow();

		$this->insert('element_type',array(
			'event_type_id' => $et['id'],
			'name' => 'Patient identification',
			'class_name' => 'Element_OphNuPreoperative_PatientID',
			'display_order' => 5,
			'default' => 1,
			'required' => 1,
		));

		$this->createTable('ophnupreoperative_patientid_translatorpresent', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_patientid_tp_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_patientid_tp_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_patientid_tp_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientid_tp_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnupreoperative_patientid_translatorpresent');

		$this->initialiseData(dirname(__FILE__));

		$this->createTable('ophnupreoperative_patientid_wristband', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_patientid_wristband_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_patientid_wristband_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wristband_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wristband_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnupreoperative_patientid_wristband');

		foreach ($this->dbConnection->createCommand()->select("*")->from("ophnupreoperative_preoperative_wristband")->order("id asc")->queryAll() as $w) {
			$this->insert('ophnupreoperative_patientid_wristband',array(
				'id' => $w['id'],
				'name' => $w['name'],
				'display_order' => $w['display_order'],
			));
		}

		$this->createTable('et_ophnupreoperative_patientid', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_id_verified' => 'tinyint(1) unsigned not null',
				'translator_present_id' => 'int(10) unsigned null',
				'translator_name' => 'varchar(255) not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_patientid_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_patientid_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_patientid_ev_fk` (`event_id`)',
				'KEY `et_ophnupreoperative_patientid_tp_fk` (`translator_present_id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_tp_fk` FOREIGN KEY (`translator_present_id`) REFERENCES `ophnupreoperative_patientid_translatorpresent` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('et_ophnupreoperative_patientid');

		$this->createTable('ophnupreoperative_patientid_wristband_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'wristband_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_patientid_wa_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_patientid_wa_cui_fk` (`created_user_id`)',
				'KEY `ophnupreoperative_patientid_wa_ele_fk` (`element_id`)',
				'KEY `ophnupreoperative_patientid_wa_wi_fk` (`wristband_id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wa_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wa_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wa_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_patientid` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wa_wi_fk` FOREIGN KEY (`wristband_id`) REFERENCES `ophnupreoperative_patientid_wristband` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnupreoperative_patientid_wristband_assignment');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_preoperative")->order("id asc")->queryAll() as $row) {
			$this->insert('et_ophnupreoperative_patientid',array(
				'id' => $row['id'],
				'event_id' => $row['event_id'],
				'patient_id_verified' => $row['patient_verified'],
				'translator_present_id' => $row['translator_present_id'],
				'translator_name' => $row['name_of_translator'],
				'created_date' => $row['created_date'],
				'created_user_id' => $row['created_user_id'],
				'last_modified_date' => $row['last_modified_date'],
				'last_modified_user_id' => $row['last_modified_user_id'],
			));

			foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_preoperative_version")->where("id = {$row['id']}")->order("version_id asc")->queryAll() as $v) {
				$this->insert('et_ophnupreoperative_patientid_version',array(
					'id' => $row['id'],
					'version_id' => $v['version_id'],
					'version_date' => $v['version_date'],
					'event_id' => $v['event_id'],
					'patient_id_verified' => $v['patient_verified'],
					'translator_present_id' => $v['translator_present_id'],
					'translator_name' => $v['name_of_translator'],
					'created_date' => $v['created_date'],
					'created_user_id' => $v['created_user_id'],
					'last_modified_date' => $v['last_modified_date'],
					'last_modified_user_id' => $v['last_modified_user_id'],
				));
			}
		}

		foreach ($this->dbConnection->createCommand()->select("*")->from("ophnupreoperative_preoperative_wristband_assignment")->order("id asc")->queryAll() as $a) {
			$this->insert('ophnupreoperative_patientid_wristband_assignment',array(
				'id' => $a['id'],
				'element_id' => $a['element_id'],
				'wristband_id' => $a['wristband_id'],
				'created_date' => $a['created_date'],
				'created_user_id' => $a['created_user_id'],
				'last_modified_date' => $a['last_modified_date'],
				'last_modified_user_id' => $a['last_modified_user_id'],
			));
		}

		$this->dropTable('ophnupreoperative_preoperative_wristband_assignment_version');
		$this->dropTable('ophnupreoperative_preoperative_wristband_assignment');

		$this->dropTable('ophnupreoperative_preoperative_wristband_version');
		$this->dropTable('ophnupreoperative_preoperative_wristband');

		$this->dropColumn('et_ophnupreoperative_preoperative','patient_verified');
		$this->dropForeignKey('ophnupreoperative_preoperative_translator_present_fk','et_ophnupreoperative_preoperative');
		$this->dropColumn('et_ophnupreoperative_preoperative','translator_present_id');
		$this->dropColumn('et_ophnupreoperative_preoperative','name_of_translator');

		$this->dropColumn('et_ophnupreoperative_preoperative_version','patient_verified');
		$this->dropColumn('et_ophnupreoperative_preoperative_version','translator_present_id');
		$this->dropColumn('et_ophnupreoperative_preoperative_version','name_of_translator');

		$this->dropTable('ophnupreoperative_preoperative_translator_present_version');
		$this->dropTable('ophnupreoperative_preoperative_translator_present');

		$this->dropTable('ophnupreoperative_preoperative_identifier_assignment_version');
		$this->dropTable('ophnupreoperative_preoperative_identifier_assignment');

		$this->dropTable('ophnupreoperative_preoperative_identifier_version');
		$this->dropTable('ophnupreoperative_preoperative_identifier');
	}

	public function down()
	{
		$this->execute("CREATE TABLE `ophnupreoperative_preoperative_identifier` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) COLLATE utf8_bin NOT NULL,
	`display_order` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnupreoperative_preoperative_identifier_lmui_fk` (`last_modified_user_id`),
	KEY `ophnupreoperative_preoperative_identifier_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnupreoperative_preoperative_identifier_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnupreoperative_preoperative_identifier_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnupreoperative_preoperative_identifier');

		$this->execute("CREATE TABLE `ophnupreoperative_preoperative_identifier_assignment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`identifier_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnupreoperative_preoperative_identifier_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `ophnupreoperative_preoperative_identifier_assignment_cui_fk` (`created_user_id`),
	KEY `ophnupreoperative_preoperative_identifier_assignment_ele_fk` (`element_id`),
	KEY `ophnupreoperative_preoperative_identifier_assignment_idi_fk` (`identifier_id`),
	CONSTRAINT `ophnupreoperative_preoperative_identifier_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnupreoperative_preoperative_identifier_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnupreoperative_preoperative_identifier_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_preoperative` (`id`),
	CONSTRAINT `ophnupreoperative_preoperative_identifier_assignment_idi_fk` FOREIGN KEY (`identifier_id`) REFERENCES `ophnupreoperative_preoperative_identifier` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnupreoperative_preoperative_identifier_assignment');

		$this->execute("CREATE TABLE `ophnupreoperative_preoperative_translator_present` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnupreoperative_preoperative_translator_present_lmui_fk` (`last_modified_user_id`),
	KEY `ophnupreoperative_preoperative_translator_present_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnupreoperative_preoperative_translator_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnupreoperative_preoperative_translator_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnupreoperative_preoperative_translator_present');

		$this->insert('ophnupreoperative_preoperative_translator_present',array('id'=>1,'name'=>'Yes','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_translator_present',array('id'=>2,'name'=>'No','display_order'=>2));
		$this->insert('ophnupreoperative_preoperative_translator_present',array('id'=>3,'name'=>'N/A','display_order'=>3));

		$this->addColumn('et_ophnupreoperative_preoperative','patient_verified','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_preoperative','translator_present_id','int(10) unsigned null');
		$this->addForeignKey('ophnupreoperative_preoperative_translator_present_fk','et_ophnupreoperative_preoperative','translator_present_id','ophnupreoperative_preoperative_translator_present','id');
		$this->addColumn('et_ophnupreoperative_preoperative','name_of_translator','varchar(255) not null');

		$this->addColumn('et_ophnupreoperative_preoperative_version','patient_verified','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_preoperative_version','translator_present_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_preoperative_version','name_of_translator','varchar(255) not null');

		$this->execute("CREATE TABLE `ophnupreoperative_preoperative_wristband` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`default` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnupreoperative_preoperative_wristband_lmui_fk` (`last_modified_user_id`),
	KEY `ophnupreoperative_preoperative_wristband_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnupreoperative_preoperative_wristband_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnupreoperative_preoperative_wristband_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnupreoperative_preoperative_wristband');

		$this->execute("CREATE TABLE `ophnupreoperative_preoperative_wristband_assignment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`wristband_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnupreoperative_preoperative_wristband_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `ophnupreoperative_preoperative_wristband_assignment_cui_fk` (`created_user_id`),
	KEY `ophnupreoperative_preoperative_wristband_assignment_ele_fk` (`element_id`),
	KEY `ophnupreoperative_preoperative_wristband_assignment_lku_fk` (`wristband_id`),
	CONSTRAINT `ophnupreoperative_preoperative_wristband_assignment_lku_fk` FOREIGN KEY (`wristband_id`) REFERENCES `ophnupreoperative_preoperative_wristband` (`id`),
	CONSTRAINT `ophnupreoperative_preoperative_wristband_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnupreoperative_preoperative_wristband_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_preoperative` (`id`),
	CONSTRAINT `ophnupreoperative_preoperative_wristband_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnupreoperative_preoperative_wristband_assignment');

		foreach ($this->dbConnection->createCommand()->select("*")->from("ophnupreoperative_patientid_wristband_assignment")->order("id asc")->queryAll() as $a) {
			$this->insert('ophnupreoperative_preoperative_wristband_assignment',array(
				'id' => $a['id'],
				'element_id' => $a['element_id'],
				'wristband_id' => $a['wristband_id'],
				'created_date' => $a['created_date'],
				'created_user_id' => $a['created_user_id'],
				'last_modified_date' => $a['last_modified_date'],
				'last_modified_user_id' => $a['last_modified_user_id'],
			));
		}

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_patientid")->order("id asc")->queryAll() as $row) {
			$this->update('et_ophnupreoperative_preoperative',array(
					'patient_verified' => $row['patient_id_verified'],
					'translator_present_id' => $row['translator_present_id'],
					'name_of_translator' => $row['translator_name'],
				),"id = {$row['id']}");

			foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_patientid_version")->where("id = {$row['id']}")->order("version_id asc")->queryAll() as $v) {
				$this->update('et_ophnupreoperative_preoperative_version',array(
						'patient_verified' => $v['patient_id_verified'],
						'translator_present_id' => $v['translator_present_id'],
						'name_of_translator' => $v['translator_name'],
					),"id = {$v['id']} and version_id = {$v['id']}");
			}
		}

		$this->dropTable('ophnupreoperative_patientid_wristband_assignment_version');
		$this->dropTable('ophnupreoperative_patientid_wristband_assignment');

		$this->dropTable('et_ophnupreoperative_patientid_version');
		$this->dropTable('et_ophnupreoperative_patientid');

		foreach ($this->dbConnection->createCommand()->select("*")->from("ophnupreoperative_patientid_wristband")->order("id asc")->queryAll() as $w) {
			$this->insert('ophnupreoperative_preoperative_wristband',array(
				'id' => $w['id'],
				'name' => $w['name'],
				'display_order' => $w['display_order'],
			));
		}

		$this->dropTable('ophnupreoperative_patientid_wristband_version');
		$this->dropTable('ophnupreoperative_patientid_wristband');

		$this->dropTable('ophnupreoperative_patientid_translatorpresent_version');
		$this->dropTable('ophnupreoperative_patientid_translatorpresent');

		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :cn",array(":cn" => "OphNuPreoperative"))->queryRow();

		$this->delete('element_type',"event_type_id = {$et['id']} and class_name = 'Element_OphNuPreoperative_PatientID'");
	}
}
