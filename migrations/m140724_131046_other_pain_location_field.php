<?php

class m140724_131046_other_pain_location_field extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnupreoperative_baseline','other_pain_location','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline_version','other_pain_location','varchar(255) not null');

		$this->dropColumn('et_ophnupreoperative_baseline_version','avpu');
		$this->dropColumn('et_ophnupreoperative_baseline_version','mews_score');
	}

	public function down()
	{
		$this->addColumn('et_ophnupreoperative_baseline_version','avpu','varchar(255) not null');
		$this->addColumn('et_ophnupreoperative_baseline_version','mews_score','varchar(255) not null');

		$this->dropColumn('et_ophnupreoperative_baseline','other_pain_location');
		$this->dropColumn('et_ophnupreoperative_baseline_version','other_pain_location');
	}
}
