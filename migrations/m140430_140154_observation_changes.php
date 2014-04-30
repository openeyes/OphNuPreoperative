<?php

class m140430_140154_observation_changes extends CDbMigration
{
	public function up()
	{
		$this->update('ophnupreoperative_baseline_obs',array('name'=>'Other (please specify)'),"id=6");
		$this->update('ophnupreoperative_baseline_skin',array('name'=>'Other (please specify)'),"id=6");

		$this->alterColumn('et_ophnupreoperative_baseline','location_id','int(10) unsigned null');
		$this->alterColumn('et_ophnupreoperative_baseline','side_id','int(10) unsigned null');
		$this->alterColumn('et_ophnupreoperative_baseline','type_of_pain_id','int(10) unsigned null');
		$this->alterColumn('et_ophnupreoperative_baseline','pain_score_method_id','int(10) unsigned null');
		$this->alterColumn('et_ophnupreoperative_baseline','size_id','int(10) unsigned null');
		$this->alterColumn('et_ophnupreoperative_baseline','fluid_type_id','int(10) unsigned null');
		$this->alterColumn('et_ophnupreoperative_baseline','volume_given_id','int(10) unsigned null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnupreoperative_baseline','location_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_baseline','side_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_baseline','type_of_pain_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_baseline','pain_score_method_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_baseline','size_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_baseline','fluid_type_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnupreoperative_baseline','volume_given_id','int(10) unsigned not null');

		$this->update('ophnupreoperative_baseline_obs',array('name'=>'Other'),"id=6");
		$this->update('ophnupreoperative_baseline_skin',array('name'=>'Other'),"id=6");
	}
}
