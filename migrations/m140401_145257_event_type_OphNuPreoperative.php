<?php 
class m140401_145257_event_type_OphNuPreoperative extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperative'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuPreoperative', 'name' => 'PreOperative','event_group_id' => $group['id']));
		}

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperative'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Health History',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Health History','class_name' => 'Element_OphNuPreoperative_HealthHistory', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Health History'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Allergies',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Allergies','class_name' => 'Element_OphNuPreoperative_Allergies', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Allergies'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Medication History',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Medication History','class_name' => 'Element_OphNuPreoperative_MedicationHistory', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Medication History'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Translator',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Translator','class_name' => 'Element_OphNuPreoperative_Translator', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Translator'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient ID',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient ID','class_name' => 'Element_OphNuPreoperative_PatientId', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient ID'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'NPO Status',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'NPO Status','class_name' => 'Element_OphNuPreoperative_NpoStatus', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'NPO Status'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Consent',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Consent','class_name' => 'Element_OphNuPreoperative_Consent', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Consent'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Verification',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Verification','class_name' => 'Element_OphNuPreoperative_Verification', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Verification'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Baseline observations',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Baseline observations','class_name' => 'Element_OphNuPreoperative_BaselineObservations', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Baseline observations'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient Pain',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient Pain','class_name' => 'Element_OphNuPreoperative_PatientPain', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient Pain'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Skin Assessment',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Skin Assessment','class_name' => 'Element_OphNuPreoperative_SkinAssessment', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Skin Assessment'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'MEWS Score',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'MEWS Score','class_name' => 'Element_OphNuPreoperative_MewsScore', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'MEWS Score'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'IV Inserted',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'IV Inserted','class_name' => 'Element_OphNuPreoperative_IvInserted', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'IV Inserted'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Preoperative Medication Administration',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Preoperative Medication Administration','class_name' => 'Element_OphNuPreoperative_PreoperativeMedicationAdministration', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Preoperative Medication Administration'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient Status',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient Status','class_name' => 'Element_OphNuPreoperative_PatientStatus', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient Status'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Comments',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Comments','class_name' => 'Element_OphNuPreoperative_Comments', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Comments'))->queryRow();



		$this->createTable('et_ophnupreoperative_healthhistory', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'health_history_verfied' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'medical_discrepancy_found' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_healthhistory_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_healthhistory_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_healthhistory_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_healthhistory_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_healthhistory_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_healthhistory_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_allergies', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'allergies_verified' => 'tinyint(1) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_allergies_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_allergies_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_allergies_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_allergies_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_allergies_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_allergies_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_medicationhistory', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medication_history_verified' => 'tinyint(1) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_medicationhistory_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_medicationhistory_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_medicationhistory_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_medicationhistory_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_medicationhistory_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_medicationhistory_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnupreoperative_translator_translator_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_translator_translator_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_translator_translator_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_translator_translator_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_translator_translator_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_translator_translator_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnupreoperative_translator_translator_present',array('name'=>'No','display_order'=>2));
		$this->insert('ophnupreoperative_translator_translator_present',array('name'=>'N/A','display_order'=>3));



		$this->createTable('et_ophnupreoperative_translator', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'translator_present_id' => 'int(10) unsigned NOT NULL',

				'name_of_translator' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_translator_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_translator_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_translator_ev_fk` (`event_id`)',
				'KEY `ophnupreoperative_translator_translator_present_fk` (`translator_present_id`)',
				'CONSTRAINT `et_ophnupreoperative_translator_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_translator_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_translator_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnupreoperative_translator_translator_present_fk` FOREIGN KEY (`translator_present_id`) REFERENCES `ophnupreoperative_translator_translator_present` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnupreoperative_patientid_wb_verified', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_patientid_wb_verified_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_patientid_wb_verified_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wb_verified_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wb_verified_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_patientid_wb_verified',array('name'=>'DOB','display_order'=>1));
		$this->insert('ophnupreoperative_patientid_wb_verified',array('name'=>'Patient Name','display_order'=>2));
		$this->insert('ophnupreoperative_patientid_wb_verified',array('name'=>'Parent / Care Giver','display_order'=>3));
		$this->insert('ophnupreoperative_patientid_wb_verified',array('name'=>'Chat Number','display_order'=>4));

		$this->createTable('ophnupreoperative_patientid_wrist_band', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_patientid_wrist_band_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_patientid_wrist_band_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wrist_band_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientid_wrist_band_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_patientid_wrist_band',array('name'=>'N/A','display_order'=>1));
		$this->insert('ophnupreoperative_patientid_wrist_band',array('name'=>'Hypertension','display_order'=>2));
		$this->insert('ophnupreoperative_patientid_wrist_band',array('name'=>'Diabetes','display_order'=>3));
		$this->insert('ophnupreoperative_patientid_wrist_band',array('name'=>'Sickle Cell','display_order'=>4));
		$this->insert('ophnupreoperative_patientid_wrist_band',array('name'=>'Allergies','display_order'=>5));



		$this->createTable('et_ophnupreoperative_patientid', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_patientid_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_patientid_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_patientid_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnupreoperative_patientid_wb_verified_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnupreoperative_patientid_wb_verified_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_patientid_wb_verified_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_patientid_wb_verified_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_patientid_wb_verified_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnupreoperative_patientid_wb_verified_assignment_lku_fk` (`ophnupreoperative_patientid_wb_verified_id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_wb_verified_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_wb_verified_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_wb_verified_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_patientid` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_wb_verified_assignment_lku_fk` FOREIGN KEY (`ophnupreoperative_patientid_wb_verified_id`) REFERENCES `ophnupreoperative_patientid_wb_verified` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnupreoperative_patientid_wrist_band_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnupreoperative_patientid_wrist_band_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_patientid_wrist_band_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_patientid_wrist_band_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_patientid_wrist_band_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnupreoperative_patientid_wrist_band_assignment_lku_fk` (`ophnupreoperative_patientid_wrist_band_id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_wrist_band_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_wrist_band_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_wrist_band_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_patientid` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientid_wrist_band_assignment_lku_fk` FOREIGN KEY (`ophnupreoperative_patientid_wrist_band_id`) REFERENCES `ophnupreoperative_patientid_wrist_band` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_npostatus', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'time_last_ate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'time_last_drank' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_npostatus_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_npostatus_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_npostatus_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_npostatus_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_npostatus_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_npostatus_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_consent', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'consent_signed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_consent_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_consent_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_consent_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_consent_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_consent_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_consent_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnupreoperative_verification_surgical', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_verification_surgical_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_verification_surgical_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_verification_surgical_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_verification_surgical_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_verification_surgical',array('name'=>'Right','display_order'=>1));
		$this->insert('ophnupreoperative_verification_surgical',array('name'=>'Left','display_order'=>2));
		$this->insert('ophnupreoperative_verification_surgical',array('name'=>'Both','display_order'=>3));



		$this->createTable('et_ophnupreoperative_verification', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'surgical_id' => 'int(10) unsigned NOT NULL',

				'iol_verified' => 'tinyint(1) unsigned NOT NULL',

				'iol_type' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'iol_size' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'metal_in_body' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'removable_dental' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'full_uppers' => 'tinyint(1) unsigned NOT NULL',

				'full_uppers_removed' => 'tinyint(1) unsigned NOT NULL',

				'full_lowers' => 'tinyint(1) unsigned NOT NULL',

				'other' => 'tinyint(1) unsigned NOT NULL',

				'other_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'other_removed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_verification_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_verification_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_verification_ev_fk` (`event_id`)',
				'KEY `ophnupreoperative_verification_surgical_fk` (`surgical_id`)',
				'CONSTRAINT `et_ophnupreoperative_verification_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_verification_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_verification_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnupreoperative_verification_surgical_fk` FOREIGN KEY (`surgical_id`) REFERENCES `ophnupreoperative_verification_surgical` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_baselineobservations', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'blood_pressure' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'mmhg' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'heart_rate_pulse' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'temperature' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'respiratory_rate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'sao2' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'blood_sugar' => 'tinyint(1) unsigned NOT NULL',

				'blood_sugar_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'urine_passed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'urine_passed_time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'avpu' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_baselineobservations_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_baselineobservations_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_baselineobservations_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_baselineobservations_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_baselineobservations_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_baselineobservations_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnupreoperative_patientpain_type_of_pain', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_patientpain_type_of_pain_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_patientpain_type_of_pain_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_patientpain_type_of_pain_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientpain_type_of_pain_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_patientpain_type_of_pain',array('name'=>'Dull','display_order'=>1));
		$this->insert('ophnupreoperative_patientpain_type_of_pain',array('name'=>'Aching','display_order'=>2));
		$this->insert('ophnupreoperative_patientpain_type_of_pain',array('name'=>'Throbbing','display_order'=>3));
		$this->insert('ophnupreoperative_patientpain_type_of_pain',array('name'=>'Stabbing','display_order'=>4));
		$this->insert('ophnupreoperative_patientpain_type_of_pain',array('name'=>'Acute','display_order'=>5));
		$this->insert('ophnupreoperative_patientpain_type_of_pain',array('name'=>'Chronic','display_order'=>6));



		$this->createTable('et_ophnupreoperative_patientpain', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'is_pain' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'type_of_pain_id' => 'int(10) unsigned NOT NULL',

				'pain_score_method' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'back' => 'tinyint(1) unsigned NOT NULL',

				'neck' => 'tinyint(1) unsigned NOT NULL',

				'arm' => 'tinyint(1) unsigned NOT NULL',

				'leg' => 'tinyint(1) unsigned NOT NULL',

				'head' => 'tinyint(1) unsigned NOT NULL',

				'other' => 'tinyint(1) unsigned NOT NULL',

				'other_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'right' => 'tinyint(1) unsigned NOT NULL',

				'left' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'both' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'comments' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_patientpain_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_patientpain_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_patientpain_ev_fk` (`event_id`)',
				'KEY `ophnupreoperative_patientpain_type_of_pain_fk` (`type_of_pain_id`)',
				'CONSTRAINT `et_ophnupreoperative_patientpain_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientpain_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientpain_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientpain_type_of_pain_fk` FOREIGN KEY (`type_of_pain_id`) REFERENCES `ophnupreoperative_patientpain_type_of_pain` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_skinassessment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'bruising' => 'tinyint(1) unsigned NOT NULL',

				'warm' => 'tinyint(1) unsigned NOT NULL',

				'cool' => 'tinyint(1) unsigned NOT NULL',

				'dry' => 'tinyint(1) unsigned NOT NULL',

				'moist' => 'tinyint(1) unsigned NOT NULL',

				'other' => 'tinyint(1) unsigned NOT NULL',

				'other_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_skinassessment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_skinassessment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_skinassessment_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_skinassessment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_skinassessment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_skinassessment_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_mewsscore', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'mews_score' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_mewsscore_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_mewsscore_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_mewsscore_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_mewsscore_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_mewsscore_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_mewsscore_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnupreoperative_ivinserted_size', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_ivinserted_size_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_ivinserted_size_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_ivinserted_size_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_ivinserted_size_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_ivinserted_size',array('name'=>'20G','display_order'=>1));
		$this->insert('ophnupreoperative_ivinserted_size',array('name'=>'22G','display_order'=>2));
		$this->insert('ophnupreoperative_ivinserted_size',array('name'=>'24G','display_order'=>3));

		$this->createTable('ophnupreoperative_ivinserted_fluid_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_ivinserted_fluid_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_ivinserted_fluid_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_ivinserted_fluid_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_ivinserted_fluid_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_ivinserted_fluid_type',array('name'=>'Normal Saline','display_order'=>1));

		$this->createTable('ophnupreoperative_ivinserted_volume_given', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_ivinserted_volume_given_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_ivinserted_volume_given_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_ivinserted_volume_given_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_ivinserted_volume_given_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_ivinserted_volume_given',array('name'=>'250 mL','display_order'=>1));
		$this->insert('ophnupreoperative_ivinserted_volume_given',array('name'=>'500 mL','display_order'=>2));
		$this->insert('ophnupreoperative_ivinserted_volume_given',array('name'=>'1000 mL','display_order'=>3));



		$this->createTable('et_ophnupreoperative_ivinserted', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'location' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'size_id' => 'int(10) unsigned NOT NULL',

				'fluid_type_id' => 'int(10) unsigned NOT NULL',

				'volume_given_id' => 'int(10) unsigned NOT NULL',

				'rate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_ivinserted_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_ivinserted_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_ivinserted_ev_fk` (`event_id`)',
				'KEY `ophnupreoperative_ivinserted_size_fk` (`size_id`)',
				'KEY `ophnupreoperative_ivinserted_fluid_type_fk` (`fluid_type_id`)',
				'KEY `ophnupreoperative_ivinserted_volume_given_fk` (`volume_given_id`)',
				'CONSTRAINT `et_ophnupreoperative_ivinserted_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_ivinserted_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_ivinserted_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnupreoperative_ivinserted_size_fk` FOREIGN KEY (`size_id`) REFERENCES `ophnupreoperative_ivinserted_size` (`id`)',
				'CONSTRAINT `ophnupreoperative_ivinserted_fluid_type_fk` FOREIGN KEY (`fluid_type_id`) REFERENCES `ophnupreoperative_ivinserted_fluid_type` (`id`)',
				'CONSTRAINT `ophnupreoperative_ivinserted_volume_given_fk` FOREIGN KEY (`volume_given_id`) REFERENCES `ophnupreoperative_ivinserted_volume_given` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_preoperativemed', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medication' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_preoperativemed_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_preoperativemed_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_preoperativemed_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperativemed_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperativemed_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperativemed_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnupreoperative_patientstatus_patient_surgery', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_patientstatus_patient_surgery_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_patientstatus_patient_surgery_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_patientstatus_patient_surgery_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientstatus_patient_surgery_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_patientstatus_patient_surgery',array('name'=>'Patient Acceptable for Surgery','display_order'=>1));
		$this->insert('ophnupreoperative_patientstatus_patient_surgery',array('name'=>'Case Canceled','display_order'=>2));



		$this->createTable('et_ophnupreoperative_patientstatus', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_surgery_id' => 'int(10) unsigned NOT NULL',

				'anes_related' => 'tinyint(1) unsigned NOT NULL',

				'equipment_failure' => 'tinyint(1) unsigned NOT NULL',

				'change_in_patient_condition' => 'tinyint(1) unsigned NOT NULL',

				'npo_status' => 'tinyint(1) unsigned NOT NULL',

				'patient_failed_mews' => 'tinyint(1) unsigned NOT NULL',

				'lack_of_consumables' => 'tinyint(1) unsigned NOT NULL',

				'staff_sickness' => 'tinyint(1) unsigned NOT NULL',

				'consent_form' => 'tinyint(1) unsigned NOT NULL',

				'run_out_of_time' => 'tinyint(1) unsigned NOT NULL',

				'other' => 'tinyint(1) unsigned NOT NULL',

				'other_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_patientstatus_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_patientstatus_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_patientstatus_ev_fk` (`event_id`)',
				'KEY `ophnupreoperative_patientstatus_patient_surgery_fk` (`patient_surgery_id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientstatus_patient_surgery_fk` FOREIGN KEY (`patient_surgery_id`) REFERENCES `ophnupreoperative_patientstatus_patient_surgery` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_comments', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_comments_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_comments_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_comments_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_comments_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_comments_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_comments_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		$this->dropTable('et_ophnupreoperative_healthhistory');



		$this->dropTable('et_ophnupreoperative_allergies');



		$this->dropTable('et_ophnupreoperative_medicationhistory');



		$this->dropTable('et_ophnupreoperative_translator');


		$this->dropTable('ophnupreoperative_translator_translator_present');

		$this->dropTable('et_ophnupreoperative_patientid_wb_verified_assignment');
		$this->dropTable('et_ophnupreoperative_patientid_wrist_band_assignment');
		$this->dropTable('et_ophnupreoperative_patientid');


		$this->dropTable('ophnupreoperative_patientid_wb_verified');
		$this->dropTable('ophnupreoperative_patientid_wrist_band');

		$this->dropTable('et_ophnupreoperative_npostatus');



		$this->dropTable('et_ophnupreoperative_consent');



		$this->dropTable('et_ophnupreoperative_verification');


		$this->dropTable('ophnupreoperative_verification_surgical');

		$this->dropTable('et_ophnupreoperative_baselineobservations');



		$this->dropTable('et_ophnupreoperative_patientpain');


		$this->dropTable('ophnupreoperative_patientpain_type_of_pain');

		$this->dropTable('et_ophnupreoperative_skinassessment');



		$this->dropTable('et_ophnupreoperative_mewsscore');



		$this->dropTable('et_ophnupreoperative_ivinserted');


		$this->dropTable('ophnupreoperative_ivinserted_size');
		$this->dropTable('ophnupreoperative_ivinserted_fluid_type');
		$this->dropTable('ophnupreoperative_ivinserted_volume_given');

		$this->dropTable('et_ophnupreoperative_preoperativemed');



		$this->dropTable('et_ophnupreoperative_patientstatus');


		$this->dropTable('ophnupreoperative_patientstatus_patient_surgery');

		$this->dropTable('et_ophnupreoperative_comments');




		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperative'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}

