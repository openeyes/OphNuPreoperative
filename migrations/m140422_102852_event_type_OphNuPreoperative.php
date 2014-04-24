<?php 
class m140422_102852_event_type_OphNuPreoperative extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperative'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuPreoperative', 'name' => 'Preoperative','event_group_id' => $group['id']));
		}

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperative'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient History Review',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient History Review','class_name' => 'Element_OphNuPreoperative_PatientHistoryReview', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient History Review'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Preoperative Assessment',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Preoperative Assessment','class_name' => 'Element_OphNuPreoperative_PreoperativeAssessment', 'event_type_id' => $event_type['id'], 'display_order' => 2));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Preoperative Assessment'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Baseline Observations',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Baseline Observations','class_name' => 'Element_OphNuPreoperative_BaselineObservations', 'event_type_id' => $event_type['id'], 'display_order' => 3));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Baseline Observations'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Pre Operative Medication Administration',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Pre Operative Medication Administration','class_name' => 'Element_OphNuPreoperative_PreOperativeMedicationAdministration', 'event_type_id' => $event_type['id'], 'display_order' => 4));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Pre Operative Medication Administration'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient Status',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient Status','class_name' => 'Element_OphNuPreoperative_PatientStatus', 'event_type_id' => $event_type['id'], 'display_order' => 5));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient Status'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Comments',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Comments','class_name' => 'Element_OphNuPreoperative_Comments', 'event_type_id' => $event_type['id'], 'display_order' => 6));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Comments'))->queryRow();



		$this->createTable('et_ophnupreoperative_patienthistory', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medical_history_verified' => 'tinyint(1) unsigned NOT NULL',

				'medical_discrepancy_found' => 'tinyint(1) unsigned NOT NULL',

				'comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'allergies_verified' => 'tinyint(1) unsigned NOT NULL',

				'medication_history_verified' => 'tinyint(1) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_patienthistory_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_patienthistory_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_patienthistory_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_patienthistory_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patienthistory_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patienthistory_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnupreoperative_preoperative_translator_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preoperative_translator_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preoperative_translator_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_translator_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_translator_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preoperative_translator_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_translator_present',array('name'=>'No','display_order'=>2));
		$this->insert('ophnupreoperative_preoperative_translator_present',array('name'=>'N/A','display_order'=>3));

		$this->createTable('ophnupreoperative_preoperative_wristband', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preoperative_wristband_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preoperative_wristband_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_wristband_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_wristband_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preoperative_wristband',array('name'=>'N/A','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_wristband',array('name'=>'Hypertension','display_order'=>2));
		$this->insert('ophnupreoperative_preoperative_wristband',array('name'=>'Sickle Cell','display_order'=>3));
		$this->insert('ophnupreoperative_preoperative_wristband',array('name'=>'Allergies','display_order'=>4));
		$this->insert('ophnupreoperative_preoperative_wristband',array('name'=>'Diabetes','display_order'=>5));

		$this->createTable('ophnupreoperative_preoperative_site', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preoperative_site_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preoperative_site_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_site_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_site_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preoperative_site',array('name'=>'Left','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_site',array('name'=>'Right','display_order'=>2));
		$this->insert('ophnupreoperative_preoperative_site',array('name'=>'Both','display_order'=>3));

		$this->createTable('ophnupreoperative_preoperative_iol_verified', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preoperative_iol_verified_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preoperative_iol_verified_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_iol_verified_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_iol_verified_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preoperative_iol_verified',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_iol_verified',array('name'=>'N/A','display_order'=>2));

		$this->createTable('ophnupreoperative_preoperative_falls', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preoperative_falls_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preoperative_falls_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_falls_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_falls_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preoperative_falls',array('name'=>'Unaided','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_falls',array('name'=>'Crutches','display_order'=>2));
		$this->insert('ophnupreoperative_preoperative_falls',array('name'=>'Walker','display_order'=>3));
		$this->insert('ophnupreoperative_preoperative_falls',array('name'=>'Wheelchair','display_order'=>4));
		$this->insert('ophnupreoperative_preoperative_falls',array('name'=>'Cane','display_order'=>5));
		$this->insert('ophnupreoperative_preoperative_falls',array('name'=>'Parents','display_order'=>6));

		$this->createTable('ophnupreoperative_preoperative_dental', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preoperative_dental_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preoperative_dental_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_dental_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_dental_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Uppers Removed','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Full Lowers Removed','display_order'=>2));
		$this->insert('ophnupreoperative_preoperative_dental',array('name'=>'Other Removed','display_order'=>3));

		$this->createTable('ophnupreoperative_preoperative_hearing_aid', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preoperative_hearing_aid_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preoperative_hearing_aid_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_hearing_aid_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_hearing_aid_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preoperative_hearing_aid',array('name'=>'Left Removed','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_hearing_aid',array('name'=>'Right Removed','display_order'=>2));

		$this->createTable('ophnupreoperative_preoperative_belong', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_preoperative_belong_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_preoperative_belong_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_belong_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_belong_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_preoperative_belong',array('name'=>'Glasses','display_order'=>1));
		$this->insert('ophnupreoperative_preoperative_belong',array('name'=>'Jewlery','display_order'=>2));
		$this->insert('ophnupreoperative_preoperative_belong',array('name'=>'Clothing','display_order'=>3));
		$this->insert('ophnupreoperative_preoperative_belong',array('name'=>'Other','display_order'=>4));



		$this->createTable('et_ophnupreoperative_preoperative', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'translator_present_id' => 'int(10) unsigned NOT NULL',

				'name_of_translator' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'patient_verified' => 'tinyint(1) unsigned NOT NULL',

				'time_last_ate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'time_last_drank' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'consent_signed' => 'tinyint(1) unsigned NOT NULL',

				'surgical_site_verified' => 'tinyint(1) unsigned NOT NULL',

				'site_id' => 'int(10) unsigned NOT NULL',

				'iol_verified_id' => 'int(10) unsigned NOT NULL',

				'iol_type' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'iol_size' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'metal_in_body' => 'tinyint(1) unsigned NOT NULL',

				'm_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'falls_mobility' => 'tinyint(1) unsigned NOT NULL',

				'removable_dental_work_present' => 'tinyint(1) unsigned NOT NULL',

				'd_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'hearing_aid_present' => 'tinyint(1) unsigned NOT NULL',

				'patient_belongings' => 'tinyint(1) unsigned NOT NULL',

				'belong_id' => 'int(10) unsigned NOT NULL',

				'b_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_preoperative_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_ev_fk` (`event_id`)',
				'KEY `ophnupreoperative_preoperative_translator_present_fk` (`translator_present_id`)',
				'KEY `ophnupreoperative_preoperative_site_fk` (`site_id`)',
				'KEY `ophnupreoperative_preoperative_iol_verified_fk` (`iol_verified_id`)',
				'KEY `ophnupreoperative_preoperative_belong_fk` (`belong_id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_translator_present_fk` FOREIGN KEY (`translator_present_id`) REFERENCES `ophnupreoperative_preoperative_translator_present` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_site_fk` FOREIGN KEY (`site_id`) REFERENCES `ophnupreoperative_preoperative_site` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_iol_verified_fk` FOREIGN KEY (`iol_verified_id`) REFERENCES `ophnupreoperative_preoperative_iol_verified` (`id`)',
				'CONSTRAINT `ophnupreoperative_preoperative_belong_fk` FOREIGN KEY (`belong_id`) REFERENCES `ophnupreoperative_preoperative_belong` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnupreoperative_preoperative_wristband_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnupreoperative_preoperative_wristband_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_preoperative_wristband_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_wristband_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_wristband_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnupreoperative_preoperative_wristband_assignment_lku_fk` (`ophnupreoperative_preoperative_wristband_id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_wristband_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_wristband_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_wristband_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_preoperative` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_wristband_assignment_lku_fk` FOREIGN KEY (`ophnupreoperative_preoperative_wristband_id`) REFERENCES `ophnupreoperative_preoperative_wristband` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnupreoperative_preoperative_falls_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnupreoperative_preoperative_falls_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_preoperative_falls_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_falls_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_falls_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnupreoperative_preoperative_falls_assignment_lku_fk` (`ophnupreoperative_preoperative_falls_id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_falls_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_falls_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_falls_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_preoperative` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_falls_assignment_lku_fk` FOREIGN KEY (`ophnupreoperative_preoperative_falls_id`) REFERENCES `ophnupreoperative_preoperative_falls` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnupreoperative_preoperative_dental_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnupreoperative_preoperative_dental_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_preoperative_dental_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_dental_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_dental_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnupreoperative_preoperative_dental_assignment_lku_fk` (`ophnupreoperative_preoperative_dental_id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_dental_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_dental_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_dental_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_preoperative` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_dental_assignment_lku_fk` FOREIGN KEY (`ophnupreoperative_preoperative_dental_id`) REFERENCES `ophnupreoperative_preoperative_dental` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnupreoperative_preoperative_hearing_aid_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnupreoperative_preoperative_hearing_aid_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_preoperative_hearing_aid_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_hearing_aid_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_preoperative_hearing_aid_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnupreoperative_preoperative_hearing_aid_assignment_lku_fk` (`ophnupreoperative_preoperative_hearing_aid_id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_hearing_aid_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_hearing_aid_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_hearing_aid_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_preoperative` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preoperative_hearing_aid_assignment_lku_fk` FOREIGN KEY (`ophnupreoperative_preoperative_hearing_aid_id`) REFERENCES `ophnupreoperative_preoperative_hearing_aid` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnupreoperative_baseline_location', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_location_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_location_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_location_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_location_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_location',array('name'=>'Back','display_order'=>1));
		$this->insert('ophnupreoperative_baseline_location',array('name'=>'Neck','display_order'=>2));
		$this->insert('ophnupreoperative_baseline_location',array('name'=>'Arm','display_order'=>3));
		$this->insert('ophnupreoperative_baseline_location',array('name'=>'Leg','display_order'=>4));
		$this->insert('ophnupreoperative_baseline_location',array('name'=>'Head','display_order'=>5));
		$this->insert('ophnupreoperative_baseline_location',array('name'=>'Other','display_order'=>6));

		$this->createTable('ophnupreoperative_baseline_side', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_side_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_side_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_side_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_side_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_side',array('name'=>'Right','display_order'=>1));
		$this->insert('ophnupreoperative_baseline_side',array('name'=>'Left','display_order'=>2));
		$this->insert('ophnupreoperative_baseline_side',array('name'=>'Both','display_order'=>3));

		$this->createTable('ophnupreoperative_baseline_type_of_pain', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_type_of_pain_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_type_of_pain_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_type_of_pain_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_type_of_pain_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_type_of_pain',array('name'=>'Dull','display_order'=>1));
		$this->insert('ophnupreoperative_baseline_type_of_pain',array('name'=>'Aching','display_order'=>2));
		$this->insert('ophnupreoperative_baseline_type_of_pain',array('name'=>'Throbbing','display_order'=>3));
		$this->insert('ophnupreoperative_baseline_type_of_pain',array('name'=>'Stabbing','display_order'=>4));
		$this->insert('ophnupreoperative_baseline_type_of_pain',array('name'=>'Acute','display_order'=>5));
		$this->insert('ophnupreoperative_baseline_type_of_pain',array('name'=>'Chronic','display_order'=>6));

		$this->createTable('ophnupreoperative_baseline_pain_score_method', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_pain_score_method_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_pain_score_method_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_pain_score_method_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_pain_score_method_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_pain_score_method',array('name'=>'Adult','display_order'=>1));
		$this->insert('ophnupreoperative_baseline_pain_score_method',array('name'=>'Pediatric','display_order'=>2));

		$this->createTable('ophnupreoperative_baseline_skin', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_skin_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_skin_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_skin_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_skin_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_skin',array('name'=>'Bruising','display_order'=>1));
		$this->insert('ophnupreoperative_baseline_skin',array('name'=>'Dry','display_order'=>2));
		$this->insert('ophnupreoperative_baseline_skin',array('name'=>'Warm','display_order'=>3));
		$this->insert('ophnupreoperative_baseline_skin',array('name'=>'Cool','display_order'=>4));
		$this->insert('ophnupreoperative_baseline_skin',array('name'=>'Moist','display_order'=>5));
		$this->insert('ophnupreoperative_baseline_skin',array('name'=>'Other','display_order'=>6));

		$this->createTable('ophnupreoperative_baseline_obs', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_obs_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_obs_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_obs_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_obs_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_obs',array('name'=>'Anxious / Restless','display_order'=>1));
		$this->insert('ophnupreoperative_baseline_obs',array('name'=>'Calm','display_order'=>2));
		$this->insert('ophnupreoperative_baseline_obs',array('name'=>'Talkative','display_order'=>3));
		$this->insert('ophnupreoperative_baseline_obs',array('name'=>'Withdrawn','display_order'=>4));
		$this->insert('ophnupreoperative_baseline_obs',array('name'=>'Crying','display_order'=>5));
		$this->insert('ophnupreoperative_baseline_obs',array('name'=>'Other','display_order'=>6));

		$this->createTable('ophnupreoperative_baseline_size', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_size_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_size_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_size_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_size_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_size',array('name'=>'20G','display_order'=>1));
		$this->insert('ophnupreoperative_baseline_size',array('name'=>'22G','display_order'=>2));
		$this->insert('ophnupreoperative_baseline_size',array('name'=>'24G','display_order'=>3));

		$this->createTable('ophnupreoperative_baseline_fluid_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_fluid_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_fluid_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_fluid_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_fluid_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_fluid_type',array('name'=>'Normal Sailine','display_order'=>1));

		$this->createTable('ophnupreoperative_baseline_volume_given', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_baseline_volume_given_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_baseline_volume_given_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_baseline_volume_given_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_volume_given_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_baseline_volume_given',array('name'=>'250 mL','display_order'=>1));
		$this->insert('ophnupreoperative_baseline_volume_given',array('name'=>'500 mL','display_order'=>2));
		$this->insert('ophnupreoperative_baseline_volume_given',array('name'=>'1000 mL','display_order'=>3));



		$this->createTable('et_ophnupreoperative_baseline', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'blood_pressure' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'bpm' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'temperature' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'res_rate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'sao2' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'blood_sugar' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'bloodsugar_na' => 'tinyint(1) unsigned NOT NULL',

				'urine_passed' => 'tinyint(1) unsigned NOT NULL',

				'time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'avpu' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'is_patient_experiencing_pain' => 'tinyint(1) unsigned NOT NULL',

				'location_id' => 'int(10) unsigned NOT NULL',

				'side_id' => 'int(10) unsigned NOT NULL',

				'type_of_pain_id' => 'int(10) unsigned NOT NULL',

				'pain_score_method_id' => 'int(10) unsigned NOT NULL',

				'pain_score' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'p_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'skin_id' => 'int(10) unsigned NOT NULL',

				'comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'o_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'mews_score' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'iv_inserted' => 'tinyint(1) unsigned NOT NULL',

				'iv_location' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'size_id' => 'int(10) unsigned NOT NULL',

				'fluid_type_id' => 'int(10) unsigned NOT NULL',

				'volume_given_id' => 'int(10) unsigned NOT NULL',

				'rate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_baseline_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_baseline_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_baseline_ev_fk` (`event_id`)',
				'KEY `ophnupreoperative_baseline_location_fk` (`location_id`)',
				'KEY `ophnupreoperative_baseline_side_fk` (`side_id`)',
				'KEY `ophnupreoperative_baseline_type_of_pain_fk` (`type_of_pain_id`)',
				'KEY `ophnupreoperative_baseline_pain_score_method_fk` (`pain_score_method_id`)',
				'KEY `ophnupreoperative_baseline_skin_fk` (`skin_id`)',
				'KEY `ophnupreoperative_baseline_size_fk` (`size_id`)',
				'KEY `ophnupreoperative_baseline_fluid_type_fk` (`fluid_type_id`)',
				'KEY `ophnupreoperative_baseline_volume_given_fk` (`volume_given_id`)',
				'CONSTRAINT `et_ophnupreoperative_baseline_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_baseline_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_baseline_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_location_fk` FOREIGN KEY (`location_id`) REFERENCES `ophnupreoperative_baseline_location` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_side_fk` FOREIGN KEY (`side_id`) REFERENCES `ophnupreoperative_baseline_side` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_type_of_pain_fk` FOREIGN KEY (`type_of_pain_id`) REFERENCES `ophnupreoperative_baseline_type_of_pain` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_pain_score_method_fk` FOREIGN KEY (`pain_score_method_id`) REFERENCES `ophnupreoperative_baseline_pain_score_method` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_skin_fk` FOREIGN KEY (`skin_id`) REFERENCES `ophnupreoperative_baseline_skin` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_size_fk` FOREIGN KEY (`size_id`) REFERENCES `ophnupreoperative_baseline_size` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_fluid_type_fk` FOREIGN KEY (`fluid_type_id`) REFERENCES `ophnupreoperative_baseline_fluid_type` (`id`)',
				'CONSTRAINT `ophnupreoperative_baseline_volume_given_fk` FOREIGN KEY (`volume_given_id`) REFERENCES `ophnupreoperative_baseline_volume_given` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnupreoperative_baseline_obs_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnupreoperative_baseline_obs_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_baseline_obs_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_baseline_obs_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_baseline_obs_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnupreoperative_baseline_obs_assignment_lku_fk` (`ophnupreoperative_baseline_obs_id`)',
				'CONSTRAINT `et_ophnupreoperative_baseline_obs_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_baseline_obs_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_baseline_obs_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_baseline` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_baseline_obs_assignment_lku_fk` FOREIGN KEY (`ophnupreoperative_baseline_obs_id`) REFERENCES `ophnupreoperative_baseline_obs` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnupreoperative_preopmedication', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'pre-operative_medication_administration' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_preopmedication_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_preopmedication_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_preopmedication_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_preopmedication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preopmedication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_preopmedication_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnupreoperative_patientstatus_patient_status', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_patientstatus_patient_status_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_patientstatus_patient_status_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_patientstatus_patient_status_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientstatus_patient_status_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_patientstatus_patient_status',array('name'=>'Patient Acceptable for Surgery','display_order'=>1));
		$this->insert('ophnupreoperative_patientstatus_patient_status',array('name'=>'Case Canceled','display_order'=>2));

		$this->createTable('ophnupreoperative_patientstatus_cancel', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_patientstatus_cancel_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_patientstatus_cancel_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnupreoperative_patientstatus_cancel_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientstatus_cancel_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'Anaesthesia related problem','display_order'=>1));
		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'Equipment Failure','display_order'=>2));
		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'Change in patient condition','display_order'=>3));
		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'NPO Status','display_order'=>4));
		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'Patient failed MEWS','display_order'=>5));
		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'Lack of consumables','display_order'=>6));
		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'Staff sickness','display_order'=>7));
		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'Consent form','display_order'=>8));
		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'Run out of time','display_order'=>9));
		$this->insert('ophnupreoperative_patientstatus_cancel',array('name'=>'Other','display_order'=>10));



		$this->createTable('et_ophnupreoperative_patientstatus', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_status_id' => 'int(10) unsigned NOT NULL',

				'res_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_patientstatus_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_patientstatus_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_patientstatus_ev_fk` (`event_id`)',
				'KEY `ophnupreoperative_patientstatus_patient_status_fk` (`patient_status_id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnupreoperative_patientstatus_patient_status_fk` FOREIGN KEY (`patient_status_id`) REFERENCES `ophnupreoperative_patientstatus_patient_status` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnupreoperative_patientstatus_cancel_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnupreoperative_patientstatus_cancel_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_patientstatus_cancel_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_patientstatus_cancel_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_patientstatus_cancel_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnupreoperative_patientstatus_cancel_assignment_lku_fk` (`ophnupreoperative_patientstatus_cancel_id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_cancel_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_cancel_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_cancel_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_patientstatus` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_patientstatus_cancel_assignment_lku_fk` FOREIGN KEY (`ophnupreoperative_patientstatus_cancel_id`) REFERENCES `ophnupreoperative_patientstatus_cancel` (`id`)',
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
		$this->dropTable('et_ophnupreoperative_patienthistory');



		$this->dropTable('et_ophnupreoperative_preoperative_wristband_assignment');
		$this->dropTable('et_ophnupreoperative_preoperative_falls_assignment');
		$this->dropTable('et_ophnupreoperative_preoperative_dental_assignment');
		$this->dropTable('et_ophnupreoperative_preoperative_hearing_aid_assignment');
		$this->dropTable('et_ophnupreoperative_preoperative');


		$this->dropTable('ophnupreoperative_preoperative_translator_present');
		$this->dropTable('ophnupreoperative_preoperative_wristband');
		$this->dropTable('ophnupreoperative_preoperative_site');
		$this->dropTable('ophnupreoperative_preoperative_iol_verified');
		$this->dropTable('ophnupreoperative_preoperative_falls');
		$this->dropTable('ophnupreoperative_preoperative_dental');
		$this->dropTable('ophnupreoperative_preoperative_hearing_aid');
		$this->dropTable('ophnupreoperative_preoperative_belong');

		$this->dropTable('et_ophnupreoperative_baseline_obs_assignment');
		$this->dropTable('et_ophnupreoperative_baseline');


		$this->dropTable('ophnupreoperative_baseline_location');
		$this->dropTable('ophnupreoperative_baseline_side');
		$this->dropTable('ophnupreoperative_baseline_type_of_pain');
		$this->dropTable('ophnupreoperative_baseline_pain_score_method');
		$this->dropTable('ophnupreoperative_baseline_skin');
		$this->dropTable('ophnupreoperative_baseline_obs');
		$this->dropTable('ophnupreoperative_baseline_size');
		$this->dropTable('ophnupreoperative_baseline_fluid_type');
		$this->dropTable('ophnupreoperative_baseline_volume_given');

		$this->dropTable('et_ophnupreoperative_preopmedication');



		$this->dropTable('et_ophnupreoperative_patientstatus_cancel_assignment');
		$this->dropTable('et_ophnupreoperative_patientstatus');


		$this->dropTable('ophnupreoperative_patientstatus_patient_status');
		$this->dropTable('ophnupreoperative_patientstatus_cancel');

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

