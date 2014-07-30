<?php

class m140730_123120_iol_field_changes extends OEMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophnupreoperative_preoperative_iol_size_fk','et_ophnupreoperative_preoperative');
		$this->renameColumn('et_ophnupreoperative_preoperative','iol_size_id','left_iol_size');
		$this->alterColumn('et_ophnupreoperative_preoperative','left_iol_size','varchar(64) not null');

		$this->renameColumn('et_ophnupreoperative_preoperative_version','iol_size_id','left_iol_size');
		$this->alterColumn('et_ophnupreoperative_preoperative_version','left_iol_size','varchar(64) not null');

		$this->addColumn('et_ophnupreoperative_preoperative','iol_side_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_preoperative_version','iol_side_id','int(10) unsigned null');
		$this->addForeignKey('et_ophnupreoperative_preoperative_iol_side_id_fk','et_ophnupreoperative_preoperative','iol_side_id','eye','id');

		$this->dropTable('ophnupreoperative_preopassessment_iol_size_version');
		$this->dropTable('ophnupreoperative_preopassessment_iol_size');

		$this->addColumn('et_ophnupreoperative_preoperative','right_iol_size','varchar(64) not null');
		$this->addColumn('et_ophnupreoperative_preoperative_version','right_iol_size','varchar(64) not null');

		$this->dropForeignKey('et_ophnupreoperative_preoperative_iol_type_fk','et_ophnupreoperative_preoperative');
		$this->renameColumn('et_ophnupreoperative_preoperative','iol_type_id','left_iol_type_id');
		$this->renameColumn('et_ophnupreoperative_preoperative_version','iol_type_id','left_iol_type_id');
		$this->addForeignKey('et_ophnupreoperative_preoperative_left_iol_type_fk','et_ophnupreoperative_preoperative','left_iol_type_id','ophnupreoperative_preopassessment_iol_type','id');

		$this->addColumn('et_ophnupreoperative_preoperative','right_iol_type_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_preoperative_version','right_iol_type_id','int(10) unsigned null');
		$this->addForeignKey('et_ophnupreoperative_preoperative_right_iol_type_fk','et_ophnupreoperative_preoperative','right_iol_type_id','ophnupreoperative_preopassessment_iol_type','id');

		$this->update('et_ophnupreoperative_preoperative',array('left_iol_type_id' => null));

		$this->delete('ophnupreoperative_preopassessment_iol_type');

		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
		$this->dropForeignKey('et_ophnupreoperative_preoperative_right_iol_type_fk','et_ophnupreoperative_preoperative');
		$this->dropColumn('et_ophnupreoperative_preoperative_version','right_iol_type_id');
		$this->dropColumn('et_ophnupreoperative_preoperative','right_iol_type_id');

		$this->dropForeignKey('et_ophnupreoperative_preoperative_left_iol_type_fk','et_ophnupreoperative_preoperative');
		$this->renameColumn('et_ophnupreoperative_preoperative','left_iol_type_id','iol_type_id');
		$this->renameColumn('et_ophnupreoperative_preoperative_version','left_iol_type_id','iol_type_id');
		$this->addForeignKey('et_ophnupreoperative_preoperative_iol_type_fk','et_ophnupreoperative_preoperative','iol_type_id','ophnupreoperative_preopassessment_iol_type','id');

		$this->dropColumn('et_ophnupreoperative_preoperative_version','right_iol_size');
		$this->dropColumn('et_ophnupreoperative_preoperative','right_iol_size');

		$this->execute("CREATE TABLE `ophnupreoperative_preopassessment_iol_size` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnupreoperative_preopassessment_iol_size_lmui_fk` (`last_modified_user_id`),
	KEY `ophnupreoperative_preopassessment_iol_size_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnupreoperative_preopassessment_iol_size_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnupreoperative_preopassessment_iol_size_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnupreoperative_preopassessment_iol_size');

		$this->dropForeignKey('et_ophnupreoperative_preoperative_iol_side_id_fk','et_ophnupreoperative_preoperative');
		$this->dropColumn('et_ophnupreoperative_preoperative_version','iol_side_id');
		$this->dropColumn('et_ophnupreoperative_preoperative','iol_side_id');

		$this->alterColumn('et_ophnupreoperative_preoperative_version','left_iol_size','int(10) unsigned null');
		$this->renameColumn('et_ophnupreoperative_preoperative_version','left_iol_size','iol_size_id');

		$this->alterColumn('et_ophnupreoperative_preoperative','left_iol_size','int(10) unsigned null');
		$this->renameColumn('et_ophnupreoperative_preoperative','left_iol_size','iol_size_id');
		$this->addForeignKey('et_ophnupreoperative_preoperative_iol_size_fk','et_ophnupreoperative_preoperative','iol_size_id','ophnupreoperative_preopassessment_iol_size','id');
	}
}
