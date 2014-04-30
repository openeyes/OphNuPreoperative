<?php

class m140430_131321_belongings_multiselect extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophnupreoperative_preoperative_belong_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'belong_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preoperative_belong_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preoperative_belong_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnupreoperative_preoperative_belong_assignment_ele_fk` (`element_id`)',
				'KEY `ophnupreoperative_preoperative_belong_assignment_bel_fk` (`belong_id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_belong_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_belong_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_belong_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_preoperative` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_belong_assignment_bel_fk` FOREIGN KEY (`belong_id`) REFERENCES `ophnupreoperative_preoperative_belong` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->dropForeignKey('ophnupreoperative_preoperative_belong_fk','et_ophnupreoperative_preoperative');
		$this->dropIndex('ophnupreoperative_preoperative_belong_fk','et_ophnupreoperative_preoperative');
		$this->dropColumn('et_ophnupreoperative_preoperative','belong_id');

		$this->update('ophnupreoperative_preoperative_belong',array('name'=>'Other (please specify)'),"id=4");
	}

	public function down()
	{
		$this->update('ophnupreoperative_preoperative_belong',array('name'=>'Other'),"id=4");

		$this->addColumn('et_ophnupreoperative_preoperative','belong_id','int(10) unsigned not null');
		$this->createIndex('ophnupreoperative_preoperative_belong_fk','et_ophnupreoperative_preoperative','belong_id');
		$this->addForeignKey('ophnupreoperative_preoperative_belong_fk','et_ophnupreoperative_preoperative','belong_id','ophnupreoperative_preoperative_belong','id');

		$this->dropTable('ophnupreoperative_preoperative_belong_assignment');
	}
}
