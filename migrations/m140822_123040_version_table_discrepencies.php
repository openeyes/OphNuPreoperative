<?php

class m140822_123040_version_table_discrepencies extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnupreoperative_iv_inserted_version','volume_given_id');
		$this->addColumn('et_ophnupreoperative_iv_inserted_version','volume_given','varchar(255) not null');
		$this->dropTable('ophnupreoperative_baseline_volume_given_version');
	}

	public function down()
	{
		$this->execute("CREATE TABLE `ophnupreoperative_baseline_volume_given_version` (
	`id` int(10) unsigned NOT NULL,
	`name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`version_date` datetime NOT NULL,
	`version_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`version_id`),
	KEY `ophnupreoperative_baseline_volume_given_lmui_fk` (`last_modified_user_id`),
	KEY `ophnupreoperative_baseline_volume_given_cui_fk` (`created_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->addColumn('et_ophnupreoperative_iv_inserted_version','volume_given_id','int(10) unsigned null');
		$this->dropColumn('et_ophnupreoperative_iv_inserted_version','volume_given');
	}
}
