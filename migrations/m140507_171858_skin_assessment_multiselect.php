<?php

class m140507_171858_skin_assessment_multiselect extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('ophnupreoperative_baseline_skin_fk','et_ophnupreoperative_baseline');
		$this->dropIndex('ophnupreoperative_baseline_skin_fk','et_ophnupreoperative_baseline');
		$this->dropColumn('et_ophnupreoperative_baseline','skin_id');

		$this->createTable('ophnupreoperative_baseline_skin_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'skin_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_skin_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_skin_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnupreoperative_baseline_skin_assignment_ele_fk` (`element_id`)',
				'KEY `ophnupreoperative_baseline_skin_assignment_ski_fk` (`skin_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_skin_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_skin_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_skin_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_baseline` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_skin_assignment_ski_fk` FOREIGN KEY (`skin_id`) REFERENCES `ophnupreoperative_baseline_skin` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophnupreoperative_baseline_skin_assignment');

		$this->addColumn('et_ophnupreoperative_baseline','skin_id','int(10) unsigned not null');
		$this->createIndex('ophnupreoperative_baseline_skin_fk','et_ophnupreoperative_baseline');
		$this->addForeignKey('ophnupreoperative_baseline_skin_fk','et_ophnupreoperative_baseline','skin_id','ophnupreoperative_baseline_skin','id');
	}
}
