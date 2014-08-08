<?php

class m140805_161658_measurements extends CDbMigration
{
	public function up()
	{
		$types = array();
		foreach ($this->dbConnection->createCommand()->select("*")->from("measurement_type")->queryAll() as $type) {
			$types[$type['class_name']] = $type['id'];
		}

		$this->addColumn('et_ophnupreoperative_baseline','blood_glucose_m_id','int(10) unsigned null');
		$this->addColumn('et_ophnupreoperative_baseline_version','blood_glucose_m_id','int(10) unsigned null');

		$this->addColumn('ophnupreoperative_observation','hr_pulse_m_id','int(10) unsigned null');
		$this->addColumn('ophnupreoperative_observation','blood_pressure_m_id','int(10) unsigned null');
		$this->addColumn('ophnupreoperative_observation','rr_m_id','int(10) unsigned null');
		$this->addColumn('ophnupreoperative_observation','sao2_m_id','int(10) unsigned null');

		$this->addColumn('ophnupreoperative_observation_version','hr_pulse_m_id','int(10) unsigned null');
		$this->addColumn('ophnupreoperative_observation_version','blood_pressure_m_id','int(10) unsigned null');
		$this->addColumn('ophnupreoperative_observation_version','rr_m_id','int(10) unsigned null');
		$this->addColumn('ophnupreoperative_observation_version','sao2_m_id','int(10) unsigned null');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_baseline")->order("id asc")->queryAll() as $element) {
			$event = $this->getRecord('event',$element['event_id']);
			$episode = $this->getRecord('episode',$event['episode_id']);

			foreach ($this->dbConnection->createCommand()->select("*")->from("ophnupreoperative_observation")->where("element_id = {$element['id']}")->order("id asc")->queryAll() as $vital) {
				foreach (array(
						'MeasurementPulse' => array('hr_pulse','pulse','measurement_pulse'),
						'MeasurementBloodPressure' => array('blood_pressure','bp_systolic','measurement_blood_pressure'),
						'MeasurementRespiratoryRate' => array('rr','rr','measurement_respiratory_rate'),
						'MeasurementSAO2' => array('sao2','sao2','measurement_sao2'),
					) as $class => $fields) {

					$this->insert('patient_measurement',array(
						'patient_id' => $episode['patient_id'],
						'measurement_type_id' => $types[$class],
						'created_user_id' => $vital['created_user_id'],
						'created_date' => $vital['created_date'],
						'last_modified_user_id' => $vital['last_modified_user_id'],
						'last_modified_date' => $vital['last_modified_date'],
						'timestamp' => $vital['timestamp'],
					));

					$pm_id = $this->dbConnection->createCommand()->select("max(id)")->from("patient_measurement")->queryScalar();

					$this->insert($fields[2],array(
						'patient_measurement_id' => $pm_id,
						$fields[1] => $vital[$fields[0]],
					));

					$m_id = $this->dbConnection->createCommand()->select("max(id)")->from($fields[2])->queryScalar();

					$this->update('ophnupreoperative_observation',array($fields[0].'_m_id' => $m_id),"id = {$vital['id']}");

					$this->insert('measurement_reference',array(
						'patient_measurement_id' => $pm_id,
						'event_id' => $event['id'],
						'origin' => 1,
					));
				}
			}

			if ($element['blood_sugar']) {
				$this->insert('patient_measurement',array(
					'patient_id' => $episode['patient_id'],
					'measurement_type_id' => $types['MeasurementGlucoseLevel'],
					'created_user_id' => $element['created_user_id'],
					'created_date' => $element['created_date'],
					'last_modified_user_id' => $element['last_modified_user_id'],
					'last_modified_date' => $element['last_modified_date'],
					'timestamp' => $element['created_date'],
				));

				$pm_id = $this->dbConnection->createCommand()->select("max(id)")->from("patient_measurement")->queryScalar();

				$this->insert('measurement_glucose_level',array(
					'patient_measurement_id' => $pm_id,
					'glucose_level' => $element['blood_sugar'],
				));

				$m_id = $this->dbConnection->createCommand()->select("max(id)")->from("measurement_glucose_level")->queryScalar();

				$this->update('et_ophnupreoperative_baseline',array('blood_glucose_m_id' => $m_id),"id = {$element['id']}");

				$this->insert('measurement_reference',array(
					'patient_measurement_id' => $pm_id,
					'event_id' => $event['id'],
					'origin' => 1,
				));
			}
		}

		$this->addForeignKey('et_ophnupreoperative_baseline_bgmi_fk','et_ophnupreoperative_baseline','blood_glucose_m_id','measurement_glucose_level','id');

		$this->addForeignKey('ophnupreoperative_observation_hpmi_id_fk','ophnupreoperative_observation','hr_pulse_m_id','measurement_pulse','id');
		$this->addForeignKey('ophnupreoperative_observation_bpmi_fk','ophnupreoperative_observation','blood_pressure_m_id','measurement_blood_pressure','id');
		$this->addForeignKey('ophnupreoperative_observation_rrmi_fk','ophnupreoperative_observation','rr_m_id','measurement_respiratory_rate','id');
		$this->addForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation','sao2_m_id','measurement_sao2','id');

		$this->dropColumn('et_ophnupreoperative_baseline','blood_sugar');
		$this->dropColumn('et_ophnupreoperative_baseline_version','blood_sugar');

		$this->dropColumn('ophnupreoperative_observation','hr_pulse');
		$this->dropColumn('ophnupreoperative_observation','blood_pressure');
		$this->dropColumn('ophnupreoperative_observation','rr');
		$this->dropColumn('ophnupreoperative_observation','sao2');

		$this->dropColumn('ophnupreoperative_observation_version','hr_pulse');
		$this->dropColumn('ophnupreoperative_observation_version','blood_pressure');
		$this->dropColumn('ophnupreoperative_observation_version','rr');
		$this->dropColumn('ophnupreoperative_observation_version','sao2');
	}

	public function getRecord($table,$id)
	{
		return $this->dbConnection->createCommand()->select("*")->from($table)->where("id = :id",array(":id" => $id))->queryRow();
	}

	public function down()
	{
		$this->addColumn('ophnupreoperative_observation','hr_pulse','varchar(64) not null');
		$this->addColumn('ophnupreoperative_observation','blood_pressure','varchar(255) not null');
		$this->addColumn('ophnupreoperative_observation','rr','varchar(64) not null');
		$this->addColumn('ophnupreoperative_observation','sao2','varchar(64) not null');

		$this->addColumn('ophnupreoperative_observation_version','hr_pulse','varchar(64) not null');
		$this->addColumn('ophnupreoperative_observation_version','blood_pressure','varchar(255) not null');
		$this->addColumn('ophnupreoperative_observation_version','rr','varchar(64) not null');
		$this->addColumn('ophnupreoperative_observation_version','sao2','varchar(64) not null');

		$this->addColumn('et_ophnupreoperative_baseline_version','blood_sugar','tinyint(1) unsigned null');
		$this->addColumn('et_ophnupreoperative_baseline','blood_sugar','tinyint(1) unsigned null');

		$this->dropForeignKey('ophnupreoperative_observation_hpmi_id_fk','ophnupreoperative_observation');
		$this->dropForeignKey('ophnupreoperative_observation_bpmi_fk','ophnupreoperative_observation');
		$this->dropForeignKey('ophnupreoperative_observation_rrmi_fk','ophnupreoperative_observation');
		$this->dropForeignKey('ophnupreoperative_observation_spmi_fk','ophnupreoperative_observation');

		$this->dropForeignKey('et_ophnupreoperative_baseline_bgmi_fk','et_ophnupreoperative_baseline');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnupreoperative_baseline")->order("id asc")->queryAll() as $element) {
			$event = $this->getRecord('event',$element['event_id']);
			$episode = $this->getRecord('episode',$event['episode_id']);

			foreach ($this->dbConnection->createCommand()->select("*")->from("ophnupreoperative_observation")->where("element_id = {$element['id']}")->order("id asc")->queryAll() as $vital) {
				foreach (array(
						'MeasurementPulse' => array('hr_pulse','pulse','measurement_pulse'),
						'MeasurementBloodPressure' => array('blood_pressure','bp_systolic','measurement_blood_pressure'),
						'MeasurementRespiratoryRate' => array('rr','rr','measurement_respiratory_rate'),
						'MeasurementSAO2' => array('sao2','sao2','measurement_sao2'),
					) as $class => $fields) {

					$mes = $this->getRecord($fields[2],$vital[$fields[0].'_m_id']);

					$this->update('ophnupreoperative_observation',array($fields[0] => $mes[$fields[1]]),"id = {$vital['id']}");

					$this->delete($fields[2],"id = ".$vital[$fields[0].'_m_id']);
				}
			}

			if ($element['blood_glucose_m_id']) {
				$mes = $this->getRecord('measurement_glucose_level',$element['blood_glucose_m_id']);

				$this->update('et_ophnupreoperative_baseline',array('blood_sugar' => $mes['glucose_level']),"id = {$element['id']}");

				$this->delete('measurement_glucose_level',"id = ".$element['blood_glucose_m_id']);
			}
		}

		$this->dropColumn('et_ophnupreoperative_baseline','blood_glucose_m_id');
		$this->dropColumn('et_ophnupreoperative_baseline_version','blood_glucose_m_id');

		$this->dropColumn('ophnupreoperative_observation','hr_pulse_m_id');
		$this->dropColumn('ophnupreoperative_observation','blood_pressure_m_id');
		$this->dropColumn('ophnupreoperative_observation','rr_m_id');
		$this->dropColumn('ophnupreoperative_observation','sao2_m_id');

		$this->dropColumn('ophnupreoperative_observation_version','hr_pulse_m_id');
		$this->dropColumn('ophnupreoperative_observation_version','blood_pressure_m_id');
		$this->dropColumn('ophnupreoperative_observation_version','rr_m_id');
		$this->dropColumn('ophnupreoperative_observation_version','sao2_m_id');
	}
}
