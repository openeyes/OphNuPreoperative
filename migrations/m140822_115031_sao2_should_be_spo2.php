<?php

class m140822_115031_sao2_should_be_spo2 extends CDbMigration
{
	public function up()
	{
		$type = $this->dbConnection->createCommand()->select("*")->from("measurement_type")->where("class_name = :cn",array(":cn" => "MeasurementSPO2"))->queryRow();

		$this->dropForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation');

		foreach ($this->dbConnection->createCommand()->select("*")->from("ophnupreoperative_observation")->order('id asc')->queryAll() as $obs) {
			$sao2 = $this->dbConnection->createCommand()->select("*")->from("measurement_sao2")->where("id = {$obs['sao2_m_id']}")->queryRow();
			$pm = $this->dbConnection->createCommand()->select("*")->from("patient_measurement")->where("id = {$sao2['patient_measurement_id']}")->queryRow();

			$this->update('patient_measurement',array('measurement_type_id' => $type['id']),"id = {$pm['id']}");
			$this->insert('measurement_spo2',array('patient_measurement_id' => $pm['id'],'spo2' => $sao2['sao2']));

			$spo2_id = $this->dbConnection->createCommand()->select('max(id)')->from("measurement_spo2")->queryScalar();

			$this->update('ophnupreoperative_observation',array('sao2_m_id' => $spo2_id),"id = {$obs['id']}");
			$this->delete('measurement_sao2',"id = {$sao2['id']}");
		}

		$this->renameColumn('ophnupreoperative_observation','sao2_m_id','spo2_m_id');
		$this->renameColumn('ophnupreoperative_observation_version','sao2_m_id','spo2_m_id');
		$this->addForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation','spo2_m_id','measurement_spo2','id');
	}

	public function down()
	{
		$type = $this->dbConnection->createCommand()->select("*")->from("measurement_type")->where("class_name = :cn",array(":cn" => "MeasurementSAO2"))->queryRow();

		$this->dropForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation');

		foreach ($this->dbConnection->createCommand()->select("*")->from("ophnupreoperative_observation")->order('id asc')->queryAll() as $obs) {
			$spo2 = $this->dbConnection->createCommand()->select("*")->from("measurement_spo2")->where("id = {$obs['spo2_m_id']}")->queryRow();
			$pm = $this->dbConnection->createCommand()->select("*")->from("patient_measurement")->where("id = {$spo2['patient_measurement_id']}")->queryRow();

			$this->update('patient_measurement',array('measurement_type_id' => $type['id']),"id = {$pm['id']}");
			$this->insert('measurement_sao2',array('patient_measurement_id' => $pm['id'],'sao2' => $spo2['spo2']));

			$sao2_id = $this->dbConnection->createCommand()->select('max(id)')->from("measurement_sao2")->queryScalar();

			$this->update('ophnupreoperative_observation',array('spo2_m_id' => $sao2_id),"id = {$obs['id']}");
			$this->delete('measurement_spo2',"id = {$spo2['id']}");
		} 
		
		$this->renameColumn('ophnupreoperative_observation','spo2_m_id','sao2_m_id');
		$this->renameColumn('ophnupreoperative_observation_version','spo2_m_id','sao2_m_id');
		$this->addForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation','sao2_m_id','measurement_sao2','id');
	}
}
