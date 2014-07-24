<?php

class m140724_114151_baseline_observations extends OEMigration
{
	public function up()
	{
		$this->createTable('ophnupreoperative_observation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'timestamp' => 'datetime not null',
				'hr_pulse' => 'varchar(64) not null',
				'blood_pressure' => 'varchar(64) not null',
				'rr' => 'varchar(64) not null',
				'spo2' => 'varchar(64) not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_observation_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_observation_cui_fk` (`created_user_id`)',
				'KEY `ophnupreoperative_observation_ele_fk` (`element_id`)',
				'CONSTRAINT `ophnupreoperative_observation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_observation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_observation_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_baseline` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnupreoperative_observation');

		$this->dropColumn('et_ophnupreoperative_baseline','bp_systolic');
		$this->dropColumn('et_ophnupreoperative_baseline','bp_diastolic');
		$this->dropColumn('et_ophnupreoperative_baseline','bpm');
		$this->dropColumn('et_ophnupreoperative_baseline','sao2');
		$this->dropColumn('et_ophnupreoperative_baseline','res_rate');

		$this->dropColumn('et_ophnupreoperative_baseline_version','bp_systolic');
		$this->dropColumn('et_ophnupreoperative_baseline_version','bp_diastolic');
		$this->dropColumn('et_ophnupreoperative_baseline_version','bpm');
		$this->dropColumn('et_ophnupreoperative_baseline_version','sao2');
		$this->dropColumn('et_ophnupreoperative_baseline_version','res_rate');
	}

	public function down()
	{
		$this->addColumn('et_ophnupreoperative_baseline_version','bp_systolic','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline_version','bp_diastolic','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline_version','bpm','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline_version','sao2','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline_version','res_rate','varchar(255) not null');

		$this->addColumn('et_ophnupreoperative_baseline','bp_systolic','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline','bp_diastolic','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline','bpm','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline','sao2','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline','res_rate','varchar(255) not null');

		$this->dropTable('ophnupreoperative_observation_version');
		$this->dropTable('ophnupreoperative_observation');
	}
}
