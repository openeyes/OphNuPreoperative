<?php

class m140430_153417_medication_administration extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophnupreoperative_preopmedication_medication', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'drug_id' => 'int(10) unsigned not null',
				'route_id' => 'int(10) unsigned not null',
				'option_id' => 'int(10) unsigned null',
				'frequency_id' => 'int(10) unsigned not null',
				'start_date' => 'date not null',
				'end_date' => 'date default null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preopmedication_medication_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preopmedication_medication_cui_fk` (`created_user_id`)',
				'KEY `ophnupreoperative_preopmedication_medication_element_id_fk` (`element_id`)',
				'KEY `ophnupreoperative_preopmedication_medication_drug_id_fk` (`drug_id`)',
				'KEY `ophnupreoperative_preopmedication_medication_route_id_fk` (`route_id`)',
				'KEY `ophnupreoperative_preopmedication_medication_option_id_fk` (`option_id`)',
				'KEY `ophnupreoperative_preopmedication_medication_frequency_id_fk` (`frequency_id`)',
				'CONSTRAINT `ophnupreoperative_preopmedication_medication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preopmedication_medication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preopmedication_medication_element_id_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_patienthistory` (`id`)',
				'CONSTRAINT `ophnupreoperative_preopmedication_medication_drug_id_fk` FOREIGN KEY (`drug_id`) REFERENCES `drug` (`id`)',
				'CONSTRAINT `ophnupreoperative_preopmedication_medication_route_id_fk` FOREIGN KEY (`route_id`) REFERENCES `drug_route` (`id`)',
				'CONSTRAINT `ophnupreoperative_preopmedication_medication_option_id_fk` FOREIGN KEY (`option_id`) REFERENCES `drug_route_option` (`id`)',
				'CONSTRAINT `ophnupreoperative_preopmedication_medication_frequency_id_fk` FOREIGN KEY (`frequency_id`) REFERENCES `drug_frequency` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->renameColumn('et_ophnupreoperative_preopmedication','pre-operative_medication_administration','comments');
	}

	public function down()
	{
		$this->renameColumn('et_ophnupreoperative_preopmedication','comments','pre-operative_medication_administration');

		$this->dropTable('ophnupreoperative_preopmedication_medication');
	}
}
