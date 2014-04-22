<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<section class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name; ?></h3>
	</header>

		<div class="element-fields">
			<?php echo $form->radioButtons($element, 'translator_present_id', 'ophnupreoperative_preoperative_translator_present')?>
	<?php echo $form->textField($element, 'name_of_translator', array('size' => '10'))?>
	<?php echo $form->checkBox($element, 'patient_verified')?>
	<?php echo $form->multiSelectList($element, 'MultiSelect_wristband', 'wristbands', 'ophnupreoperative_preoperative_wristband_id', CHtml::listData(OphNuPreoperative_PreoperativeAssessment_Wristband::model()->findAll(array('order'=>'display_order asc')),'id','name'), $element->ophnupreoperative_preoperative_wristband_defaults, array('empty' => '- Please select -', 'label' => 'Special Attention Wristband attached?'))?>
	<?php echo $form->textField($element, 'time_last_ate', array('size' => '10'))?>
	<?php echo $form->textField($element, 'time_last_drank', array('size' => '10'))?>
	<?php echo $form->checkBox($element, 'consent_signed')?>
	<?php echo $form->checkBox($element, 'surgical_site_verified')?>
	<?php echo $form->checkBox($element, 's_right')?>
	<?php echo $form->checkBox($element, 's_left')?>
	<?php echo $form->checkBox($element, 's_both')?>
	<?php echo $form->radioButtons($element, 'iol_verified_id', 'ophnupreoperative_preoperative_iol_verified')?>
	<?php echo $form->textField($element, 'iol_type', array('size' => '10'))?>
	<?php echo $form->textField($element, 'iol_size', array('size' => '10'))?>
	<?php echo $form->radioBoolean($element, 'metal_in_body')?>
	<?php echo $form->textField($element, 'm_comments', array('size' => '10'))?>
	<?php echo $form->radioBoolean($element, 'falls_mobility')?>
	<?php echo $form->multiSelectList($element, 'MultiSelect_falls', 'fallss', 'ophnupreoperative_preoperative_falls_id', CHtml::listData(OphNuPreoperative_PreoperativeAssessment_Falls::model()->findAll(array('order'=>'display_order asc')),'id','name'), $element->ophnupreoperative_preoperative_falls_defaults, array('empty' => '- Please select -', 'label' => 'Falls / Mobility'))?>
	<?php echo $form->radioBoolean($element, 'removable_dental_work_present')?>
	<?php echo $form->multiSelectList($element, 'MultiSelect_dental', 'dentals', 'ophnupreoperative_preoperative_dental_id', CHtml::listData(OphNuPreoperative_PreoperativeAssessment_Dental::model()->findAll(array('order'=>'display_order asc')),'id','name'), $element->ophnupreoperative_preoperative_dental_defaults, array('empty' => '- Please select -', 'label' => 'Items'))?>
	<?php echo $form->textField($element, 'd_comments', array('size' => '10'))?>
	<?php echo $form->radioBoolean($element, 'hearing_aid_present')?>
	<?php echo $form->multiSelectList($element, 'MultiSelect_hearing_aid', 'hearing_aids', 'ophnupreoperative_preoperative_hearing_aid_id', CHtml::listData(OphNuPreoperative_PreoperativeAssessment_HearingAid::model()->findAll(array('order'=>'display_order asc')),'id','name'), $element->ophnupreoperative_preoperative_hearing_aid_defaults, array('empty' => '- Please select -', 'label' => 'Hearing Aid'))?>
	<?php echo $form->radioBoolean($element, 'patient_belongings')?>
	<?php echo $form->dropDownList($element, 'belong_id', CHtml::listData(OphNuPreoperative_PreoperativeAssessment_Belong::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->textField($element, 'b_comments', array('size' => '10'))?>
	</div>
	
</section>
