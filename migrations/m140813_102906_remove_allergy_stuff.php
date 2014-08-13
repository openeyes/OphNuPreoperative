<?php

class m140813_102906_remove_allergy_stuff extends OEMigration
{
	public function up()
	{
		$this->dropTable('ophnupreoperative_patienthistory_allergy_version');
		$this->dropTable('ophnupreoperative_patienthistory_allergy');

		$this->dropColumn('et_ophnupreoperative_patienthistory','patient_has_no_allergies');
		$this->dropColumn('et_ophnupreoperative_patienthistory_version','patient_has_no_allergies');
	}

	public function down()
	{
		$this->addColumn('et_ophnupreoperative_patienthistory','patient_has_no_allergies','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_patienthistory_version','patient_has_no_allergies','tinyint(1) unsigned NOT NULL');

		$this->execute("CREATE TABLE `ophnupreoperative_patienthistory_allergy` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`allergy_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnupreoperative_patienthistory_allergy_lmui_fk` (`last_modified_user_id`),
	KEY `ophnupreoperative_patienthistory_allergy_cui_fk` (`created_user_id`),
	KEY `ophnupreoperative_patienthistory_allergy_element_id_fk` (`element_id`),
	KEY `ophnupreoperative_patienthistory_allergy_allergy_id_fk` (`allergy_id`),
	CONSTRAINT `ophnupreoperative_patienthistory_allergy_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnupreoperative_patienthistory_allergy_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnupreoperative_patienthistory_allergy_element_id_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_patienthistory` (`id`),
	CONSTRAINT `ophnupreoperative_patienthistory_allergy_allergy_id_fk` FOREIGN KEY (`allergy_id`) REFERENCES `allergy` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnupreoperative_patienthistory_allergy');
	}
}
