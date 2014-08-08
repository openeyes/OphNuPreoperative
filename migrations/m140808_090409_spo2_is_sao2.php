<?php

class m140808_090409_spo2_is_sao2 extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation');

		$this->renameColumn('ophnupreoperative_observation','spo2_m_id','sao2_m_id');
		$this->renameColumn('ophnupreoperative_observation_version','spo2_m_id','sao2_m_id');

		$this->addForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation','sao2_m_id','measurement_sao2','id');
	}

	public function down()
	{
		$this->dropForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation');

		$this->renameColumn('ophnupreoperative_observation','sao2_m_id','spo2_m_id');
		$this->renameColumn('ophnupreoperative_observation_version','sao2_m_id','spo2_m_id');

		$this->addForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation','spo2_m_id','measurement_spo2','id');
	}
}
