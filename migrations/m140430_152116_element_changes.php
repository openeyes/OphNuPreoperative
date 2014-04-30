<?php

class m140430_152116_element_changes extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from('event_type')->where('class_name = :class_name',array(':class_name' => 'OphNuPreoperative'))->queryRow();

		$this->delete('element_type',"event_type_id = {$event_type['id']} and class_name = 'Element_OphNuPreoperative_Comments'");

		$this->dropTable('et_ophnupreoperative_comments');

		$this->update('element_type',array('name'=>'Patient history review'),"class_name = 'Element_OphNuPreoperative_PatientHistoryReview'");
		$this->update('element_type',array('name'=>'Pre-operative assessment'),"class_name = 'Element_OphNuPreoperative_PreoperativeAssessment'");
		$this->update('element_type',array('name'=>'Baseline observations'),"class_name = 'Element_OphNuPreoperative_BaselineObservations'");
		$this->update('element_type',array('name'=>'Pre-operative medication administration'),"class_name = 'Element_OphNuPreoperative_PreOperativeMedicationAdministration'");
		$this->update('element_type',array('name'=>'Patient status'),"class_name = 'Element_OphNuPreoperative_PatientStatus'");

		$this->addColumn('et_ophnupreoperative_patientstatus','comments','text not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnupreoperative_patientstatus','comments');

		$this->update('element_type',array('name'=>'Patient History Review'),"class_name = 'Element_OphNuPreoperative_PatientHistoryReview'");
		$this->update('element_type',array('name'=>'Preoperative Assessment'),"class_name = 'Element_OphNuPreoperative_PreoperativeAssessment'");
		$this->update('element_type',array('name'=>'Baseline Observations'),"class_name = 'Element_OphNuPreoperative_BaselineObservations'");
		$this->update('element_type',array('name'=>'Pre Operative Medication Administration'),"class_name = 'Element_OphNuPreoperative_PreOperativeMedicationAdministration'");
		$this->update('element_type',array('name'=>'Patient Status'),"class_name = 'Element_OphNuPreoperative_PatientStatus'");

		$this->execute("CREATE TABLE `et_ophnupreoperative_comments` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`comments` text COLLATE utf8_bin,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `et_ophnupreoperative_comments_lmui_fk` (`last_modified_user_id`),
	KEY `et_ophnupreoperative_comments_cui_fk` (`created_user_id`),
	KEY `et_ophnupreoperative_comments_ev_fk` (`event_id`),
	CONSTRAINT `et_ophnupreoperative_comments_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `et_ophnupreoperative_comments_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `et_ophnupreoperative_comments_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$event_type = $this->dbConnection->createCommand()->select("*")->from('event_type')->where('class_name = :class_name',array(':class_name' => 'OphNuPreoperative'))->queryRow();

		$this->insert('element_type',array('name' => 'Comments', 'class_name' => 'Element_OphNuPreoperative_Comments', 'display_order'=>6,'default'=>1,'event_type_id'=>$event_type['id']));
	}
}
