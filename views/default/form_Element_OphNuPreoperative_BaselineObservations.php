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
		<?php echo $form->textField($element, 'blood_pressure', array('size' => '10'))?>
		<?php echo $form->textField($element, 'bpm', array('size' => '10'))?>
		<?php echo $form->textField($element, 'temperature', array('size' => '10'))?>
		<?php echo $form->textField($element, 'res_rate', array('size' => '10'))?>
		<?php echo $form->textField($element, 'sao2', array('size' => '10'))?>
		<?php echo $form->textField($element, 'blood_sugar', array('size' => '10'))?>
		<?php echo $form->checkBox($element, 'bloodsugar_na')?>
		<div class="collapse">
			<?php echo $form->radioBoolean($element, 'urine_passed')?>
			<?php echo $form->textField($element, 'time', array('size' => '10'))?>
		</div>
		<?php echo $form->textField($element, 'avpu', array('size' => '10'))?>
		<?php echo $form->radioBoolean($element, 'is_patient_experiencing_pain')?>
		<div class="collapse">
			<?php echo $form->dropDownList($element, 'location_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Location::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
			<?php echo $form->dropDownList($element, 'side_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Side::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
			<?php echo $form->dropDownList($element, 'type_of_pain_id', CHtml::listData(OphNuPreoperative_BaselineObservations_TypeOfPain::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
			<?php echo $form->dropDownList($element, 'pain_score_method_id', CHtml::listData(OphNuPreoperative_BaselineObservations_PainScoreMethod::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
			<?php echo $form->textField($element, 'pain_score', array('size' => '10'))?>
			<?php echo $form->textField($element, 'p_comments', array('size' => '10'))?>
		</div>
		<?php echo $form->dropDownList($element, 'skin_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Skin::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -','class' => 'linked-fields', 'data-linked-fields' => 'comments', 'data-linked-values' => 'Other'))?>
		<?php echo $form->textField($element, 'comments', array('hide' => !$element->skin_id==6))?>
		<?php echo $form->multiSelectList($element, 'MultiSelect_obs', 'obss', 'ophnupreoperative_baseline_obs_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Obs::model()->findAll(array('order'=>'display_order asc')),'id','name'), $element->ophnupreoperative_baseline_obs_defaults, array('empty' => '- Please select -', 'label' => 'Pre-op Observations', 'class' => 'linked-fields', 'data-linked-fields' => 'o_comments', 'data-linked-values' => 'Other'))?>
		<?php echo $form->textField($element, 'o_comments',  array('hide' => !$element->hasMultiSelectValue('obss','Other')))?>
		<?php echo $form->textField($element, 'mews_score', array('size' => '10'))?>
		<?php echo $form->checkBox($element, 'iv_inserted')?>
		<?php echo $form->textField($element, 'iv_location', array('size' => '10'))?>
		<?php echo $form->dropDownList($element, 'size_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Size::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
		<?php echo $form->dropDownList($element, 'fluid_type_id', CHtml::listData(OphNuPreoperative_BaselineObservations_FluidType::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
		<?php echo $form->dropDownList($element, 'volume_given_id', CHtml::listData(OphNuPreoperative_BaselineObservations_VolumeGiven::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
		<?php echo $form->textField($element, 'rate', array('size' => '10'))?>
	</div>

</section>
