<?php

class m140815_121430_patient_belongings_comment_box extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnupreoperative_preoperative','patient_belongings_comments','varchar(2048) not null');
		$this->addColumn('et_ophnupreoperative_preoperative_version','patient_belongings_comments','varchar(2048) not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnupreoperative_preoperative','patient_belongings_comments');
		$this->dropColumn('et_ophnupreoperative_preoperative_version','patient_belongings_comments');
	}
}
