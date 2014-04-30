<?php

class m140430_120802_field_changes extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophnupreoperative_preopassessment_iol_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preopassessment_iol_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preopassessment_iol_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preopassessment_iol_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preopassessment_iol_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preopassessment_iol_type',array('name'=>'IOL 1','display_order'=>1));
		$this->insert('ophnupreoperative_preopassessment_iol_type',array('name'=>'IOL 2','display_order'=>2));
		$this->insert('ophnupreoperative_preopassessment_iol_type',array('name'=>'IOL 3','display_order'=>3));

		$this->createTable('ophnupreoperative_preopassessment_iol_size', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preopassessment_iol_size_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preopassessment_iol_size_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preopassessment_iol_size_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preopassessment_iol_size_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preopassessment_iol_size',array('name'=>'Size 1','display_order'=>1));
		$this->insert('ophnupreoperative_preopassessment_iol_size',array('name'=>'Size 2','display_order'=>2));
		$this->insert('ophnupreoperative_preopassessment_iol_size',array('name'=>'Size 3','display_order'=>3));

		$this->alterColumn('et_ophnupreoperative_preoperative','iol_type','int(10) unsigned null');
		$this->renameColumn('et_ophnupreoperative_preoperative','iol_type','iol_type_id');
		$this->createIndex('et_ophnupreoperative_preoperative_iol_type_fk','et_ophnupreoperative_preoperative','iol_type_id');
		$this->addForeignKey('et_ophnupreoperative_preoperative_iol_type_fk','et_ophnupreoperative_preoperative','iol_type_id','ophnupreoperative_preopassessment_iol_type','id');

		$this->alterColumn('et_ophnupreoperative_preoperative','iol_size','int(10) unsigned null');
		$this->renameColumn('et_ophnupreoperative_preoperative','iol_size','iol_size_id');
		$this->createIndex('et_ophnupreoperative_preoperative_iol_size_fk','et_ophnupreoperative_preoperative','iol_size_id');
		$this->addForeignKey('et_ophnupreoperative_preoperative_iol_size_fk','et_ophnupreoperative_preoperative','iol_size_id','ophnupreoperative_preopassessment_iol_size','id');

		$this->alterColumn('et_ophnupreoperative_preoperative','belong_id','int(10) unsigned null');

		$this->alterColumn('et_ophnupreoperative_preoperative','time_last_ate','datetime not null');
		$this->alterColumn('et_ophnupreoperative_preoperative','time_last_drank','datetime not null');

		$this->renameColumn('et_ophnupreoperative_preoperative','time_last_drank','date_last_drank');
		$this->renameColumn('et_ophnupreoperative_preoperative','time_last_ate','date_last_ate');
	}

	public function down()
	{
		$this->renameColumn('et_ophnupreoperative_preoperative','date_last_drank','time_last_drank');
		$this->renameColumn('et_ophnupreoperative_preoperative','date_last_ate','time_last_ate');

		$this->alterColumn('et_ophnupreoperative_preoperative','date_last_drank','varchar(255)');
		$this->alterColumn('et_ophnupreoperative_preoperative','date_last_ate','varchar(255)');

		$this->alterColumn('et_ophnupreoperative_preoperative','belong_id','int(10) unsigned not null');

		$this->dropForeignKey('et_ophnupreoperative_preoperative_iol_size_fk','et_ophnupreoperative_preoperative');
		$this->dropIndex('et_ophnupreoperative_preoperative_iol_size_fk','et_ophnupreoperative_preoperative');
		$this->renameColumn('et_ophnupreoperative_preoperative','iol_size_id','iol_size');
		$this->alterColumn('et_ophnupreoperative_preoperative','iol_size','varchar(255)');

		$this->dropForeignKey('et_ophnupreoperative_preoperative_iol_type_fk','et_ophnupreoperative_preoperative');
		$this->dropIndex('et_ophnupreoperative_preoperative_iol_type_fk','et_ophnupreoperative_preoperative');
		$this->renameColumn('et_ophnupreoperative_preoperative','iol_type_id','iol_type');
		$this->alterColumn('et_ophnupreoperative_preoperative','iol_type','varchar(255)');

		$this->dropTable('ophnupreoperative_preopassessment_iol_size');
		$this->dropTable('ophnupreoperative_preopassessment_iol_type');
	}
}
