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
		<div id="div_Element_OphNuPreoperative_BaselineObservations_bp_systolic" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuPreoperative_BaselineObservations_bp_systolic">
					Blood pressure:
				</label>
			</div>
			<div class="large-4 column end">
				<?php echo $form->textField($element, 'bp_systolic', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				<span class="metric">/</span>
				<?php echo $form->textField($element, 'bp_diastolic', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				<span class="metric">mmHg</span>
			</div>
		</div>
		<div id="div_Element_OphNuPreoperative_BaselineObservations_bpm" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuPreoperative_BaselineObservations_bpm">
					<?php echo $element->getAttributeLabel('bpm')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'bpm', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">bpm</span>
			</div>
		</div>
		<div id="div_Element_OphNuPreoperative_BaselineObservations_bpm" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuPreoperative_BaselineObservations_bpm">
					<?php echo $element->getAttributeLabel('temperature')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'temperature', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">C</span>
			</div>
		</div>
		<div id="div_Element_OphNuPreoperative_BaselineObservations_res_rate" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuPreoperative_BaselineObservations_res_rate">
					<?php echo $element->getAttributeLabel('res_rate')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'res_rate', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">insp/min</span>
			</div>
		</div>
		<div id="div_Element_OphNuPreoperative_BaselineObservations_sao2" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuPreoperative_BaselineObservations_sao2">
					<?php echo $element->getAttributeLabel('sao2')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'sao2', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">%</span>
			</div>
		</div>
		<div id="div_Element_OphNuPreoperative_BaselineObservations_sao2" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuPreoperative_BaselineObservations_sao2">
					<?php echo $element->getAttributeLabel('blood_sugar')?>:
				</label>
			</div>
			<div class="large-1 column">
				<?php echo $form->textField($element, 'blood_sugar', $element->bloodsugar_na ? array('nowrapper' => true,'disabled' => 'disabled') : array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
			</div>
			<div class="large-2 column end">
				<?php echo $form->checkBox($element, 'bloodsugar_na', array('nowrapper' => true))?>
			</div>
		</div>

		<?php echo $form->radioBoolean($element, 'urine_passed', array('class'=>'linked-fields','data-linked-fields'=>'time','data-linked-values'=>'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'time', array('hide' => !$element->urine_passed), array(), array('label' => 3, 'field' => 1))?>
		<?php echo $form->textField($element, 'avpu', array(), array(), array('label' => 3, 'field' => 1))?>
		<?php echo $form->radioBoolean($element, 'is_patient_experiencing_pain', array(), array('label' => 3, 'field' => 4))?>
		<div class="collapse">
			<?php echo $form->dropDownList($element, 'location_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Location::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'),false,array('label'=>3,'field'=>4))?>
			<?php echo $form->dropDownList($element, 'side_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Side::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'),false,array('label'=>3,'field'=>4))?>
			<?php echo $form->dropDownList($element, 'type_of_pain_id', CHtml::listData(OphNuPreoperative_BaselineObservations_TypeOfPain::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'),false,array('label'=>3,'field'=>4))?>
			<?php echo $form->dropDownList($element, 'pain_score_method_id', CHtml::listData(OphNuPreoperative_BaselineObservations_PainScoreMethod::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'),false,array('label'=>3,'field'=>4))?>
			<?php echo $form->textField($element, 'pain_score', array(), array(), array('label' => 3, 'field' => 1))?>
			<?php echo $form->textField($element, 'p_comments', array(), array(), array('label' => 3, 'field' => 4))?>
		</div>
		<?php echo $form->dropDownList($element, 'skin_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Skin::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -','class' => 'linked-fields', 'data-linked-fields' => 'comments', 'data-linked-values' => 'Other (please specify)'),false,array('label'=>3,'field'=>4))?>
		<?php echo $form->textField($element, 'comments', array('hide' => !$element->skin || $element->skin->name != 'Other (please specify)'), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'MultiSelect_obs', 'obss', 'ophnupreoperative_baseline_obs_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Obs::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Pre-op observations', 'class' => 'linked-fields', 'data-linked-fields' => 'o_comments', 'data-linked-values' => 'Other (please specify)'), false, false, null, false, false, array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'o_comments',  array('hide' => !$element->hasMultiSelectValue('obss','Other (please specify)')), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'mews_score', array(), array(), array('label' => 3, 'field' => 1))?>
		<?php echo $form->checkBox($element, 'iv_inserted', array('text-align'=>'right','class'=>'linked-fields','data-linked-fields'=>'iv_location,size_id,fluid_type_id,volume_given_id,rate','data-linked-values'=>'1'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'iv_location', array('hide' => !$element->iv_inserted), array(), array('label' => 3, 'field' => 1))?>
		<?php echo $form->dropDownList($element, 'size_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Size::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->iv_inserted,array('label'=>3,'field'=>4))?>
		<?php echo $form->dropDownList($element, 'fluid_type_id', CHtml::listData(OphNuPreoperative_BaselineObservations_FluidType::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->iv_inserted,array('label'=>3,'field'=>4))?>
		<?php echo $form->dropDownList($element, 'volume_given_id', CHtml::listData(OphNuPreoperative_BaselineObservations_VolumeGiven::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->iv_inserted,array('label'=>3,'field'=>4))?>
		<div id="div_Element_OphNuPreoperative_BaselineObservations_rate" class="row field-row"<?php if (!$element->iv_inserted) {?> style="display: none;"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuPreoperative_BaselineObservations_rate">
					<?php echo $element->getAttributeLabel('rate')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'rate', array('nowrapper'=>true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">mL/hr</span>
			</div>
		</div>
	</div>
</section>
