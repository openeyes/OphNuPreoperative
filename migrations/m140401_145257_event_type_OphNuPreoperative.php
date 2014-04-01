<?php 
class m140401_145257_event_type_OphNuPreoperative extends CDbMigration
{
	public function up()
	{
		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperative'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuPreoperative', 'name' => 'PreOperative','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperative'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Health History',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Health History','class_name' => 'Element_OphNuPreoperative_HealthHistory', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Health History'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Allergies',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Allergies','class_name' => 'Element_OphNuPreoperative_Allergies', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Allergies'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Medication History',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Medication History','class_name' => 'Element_OphNuPreoperative_MedicationHistory', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Medication History'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Translator',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Translator','class_name' => 'Element_OphNuPreoperative_Translator', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Translator'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient ID',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient ID','class_name' => 'Element_OphNuPreoperative_PatientId', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient ID'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'NPO Status',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'NPO Status','class_name' => 'Element_OphNuPreoperative_NpoStatus', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'NPO Status'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Consent',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Consent','class_name' => 'Element_OphNuPreoperative_Consent', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Consent'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Verification',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Verification','class_name' => 'Element_OphNuPreoperative_Verification', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Verification'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Baseline observations',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Baseline observations','class_name' => 'Element_OphNuPreoperative_BaselineObservations', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Baseline observations'))->queryRow();



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnupreoperative_healthhistory', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'health_history_verfied' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Health History Verfied
				'medical_discrepancy_found' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Medical discrepancy found
				'comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Comments
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



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnupreoperative_allergies', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'allergies_verified' => 'tinyint(1) unsigned NOT NULL', // Allergies Verified
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



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnupreoperative_medicationhistory', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medication_history_verified_left' => 'tinyint(1) unsigned NOT NULL', // Medication History Verified
				'medication_history_verified_right' => 'tinyint(1) unsigned NOT NULL', // Medication History Verified
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
					'eye_id' => 'int(10) unsigned NOT NULL DEFAULT \'3\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_medicationhistory_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_medicationhistory_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_medicationhistory_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_medicationhistory_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_medicationhistory_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_medicationhistory_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_medicationhistory_eye_id_fk` FOREIGN KEY (`eye_id`) REFERENCES `eye` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// element lookup table ophnupreoperative_translator_translator_present
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



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnupreoperative_translator', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'translator_present_id' => 'int(10) unsigned NOT NULL', // Translator Present
				'name_of_translator' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Name of Translator
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

		// element lookup table ophnupreoperative_patientid_wb_verified
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

		// element lookup table ophnupreoperative_patientid_wrist_band
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



		// create the table for this element type: et_modulename_elementtypename
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



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnupreoperative_npostatus', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'time_last_ate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Time Last Ate
				'time_last_drank' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Time Last Drank
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



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnupreoperative_consent', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'consent_signed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Consent Signed
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

		// element lookup table ophnupreoperative_verification_surgical
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



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnupreoperative_verification', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'surgical_id' => 'int(10) unsigned NOT NULL', // Surgical site verified
				'iol_verified' => 'tinyint(1) unsigned NOT NULL', // IOL Verified
				'iol_type' => 'text COLLATE utf8_bin DEFAULT \'\'', // IOL Type
				'iol_size' => 'text COLLATE utf8_bin DEFAULT \'\'', // IOL Size
				'metal_in_body' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Metal in body
				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'', // Comments
				'removable_dental' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Removable dental work present
				'full_uppers' => 'tinyint(1) unsigned NOT NULL', // Full uppers
				'full_uppers_removed' => 'tinyint(1) unsigned NOT NULL', // Full uppers removed
				'full_lowers' => 'tinyint(1) unsigned NOT NULL', // Full lowers
				'other' => 'tinyint(1) unsigned NOT NULL', // Other
				'other_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Other Comments
				'other_removed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Other Removed
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



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnupreoperative_baselineobservations', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'blood_pressure' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Blood Pressure
				'heart_rate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Heart Rate Pulse
				'temperature' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Temperature
				'respiratory_rate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Respiratory Rate
				'blood_sugar' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Blood Sugar
				'urine_passed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Urine Passed
				'time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Time
				'avpi' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // AVPI
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

	}

	public function down()
	{
		// --- drop any element related tables ---
		// --- drop element tables ---
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




		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperative'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphNuPreoperative does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}

