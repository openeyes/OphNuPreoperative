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
	<div class="element-fields">
		<div id="Element_OphCiPatientadmission_NpoStatus_date_last_ate" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphCiPatientadmission_NpoStatus_date_last_ate_0">
					<?php echo $element->getAttributeLabel('date_last_ate')?>:
				</label>
			</div>
			<div class="large-4 column end">
				<?php echo $form->datePicker($element, 'date_last_ate', array('maxDate' => 'today'), array('null'=>true,'style'=>'width: 110px; display: inline-block;','nowrapper' => true))?>
				<?php echo $form->timePicker($element, 'date_last_ate_time', array(), array('nowrapper' => true, 'style' => 'width: 50px; display: inline-block;'))?>
				<span class="metric">Time</span>
			</div>
		</div>
		<div id="Element_OphCiPatientadmission_NpoStatus_date_last_drank" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphCiPatientadmission_NpoStatus_date_last_drank_0">
					<?php echo $element->getAttributeLabel('date_last_drank')?>:
				</label>
			</div>
			<div class="large-4 column end">
				<?php echo $form->datePicker($element, 'date_last_drank', array('maxDate' => 'today'), array('null'=>true,'style'=>'width: 110px; display: inline-block;','nowrapper' => true))?>
				<?php echo $form->timePicker($element, 'date_last_drank_time', array(), array('nowrapper' => true, 'style' => 'width: 50px; display: inline-block;'))?>
				<span class="metric">Time</span>
			</div>
		</div>
		<?php echo $form->radioBoolean($element, 'consent_signed', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'surgical_site_verified', array('class' => 'linked-fields', 'data-linked-fields' => 'site_id', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'site_id', 'OphNuPreoperative_PreoperativeAssessment_Site',null,false,!$element->surgical_site_verified==1,false,false,array(),array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'iol_verified_id', 'OphNuPreoperative_PreoperativeAssessment_IolVerified', null, false, false, false, false, array('class' => 'linked-fields', 'data-linked-fields' => 'iol_side_id', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'iol_side_id', 'eye', null, false, !$element->iol_verified_id || $element->iol_verified->name != 'Yes', false, false, array(), array('label' => 3, 'field' => 4))?>
		<div id="div_Element_OphNuPreoperative_PreoperativeAssessment_right_iol_type_id" class="row field-row"<?php if (!$element->iol_side) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphCiPatientadmission_NpoStatus_right_iol_type_id">
					IOL type:
				</label>
			</div>
			<div class="IOLright"<?php if (!$element->iol_side || $element->iol_side->name == 'Left') {?> style="display: none"<?php }?>>
				<div class="large-1 column">
					<label>Right:</label>
				</div>
				<div class="large-2 column end">
					<?php echo $form->dropDownList($element, 'right_iol_type_id', CHtml::listData(OphNuPreoperative_PreopAssessment_IOL_Type::model()->findAll(array('order'=>'display_order asc')),'id','name'), array('nowrapper' => true, 'empty' => '- Please select -'),!$element->iol_verified_id || $element->iol_verified->name == 'N/A',array('label' => 3, 'field' => 4))?>
				</div>
			</div>
			<div class="IOLleft"<?php if (!$element->iol_side || $element->iol_side->name == 'Right') {?> style="display: none"<?php }?>>
				<div class="large-1 column">
					<label>Left:</label>
				</div>
				<div class="large-2 column end">
					<?php echo $form->dropDownList($element, 'left_iol_type_id', CHtml::listData(OphNuPreoperative_PreopAssessment_IOL_Type::model()->findAll(array('order'=>'display_order asc')),'id','name'), array('nowrapper' => true, 'empty' => '- Please select -'),!$element->iol_verified_id || $element->iol_verified->name == 'N/A',array('label' => 3, 'field' => 4))?>
				</div>
			</div>
		</div>
		<div id="div_Element_OphNuPreoperative_PreoperativeAssessment_right_iol_size" class="row field-row"<?php if (!$element->iol_side) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphCiPatientadmission_NpoStatus_right_iol_size">
					IOL size:
				</label>
			</div>
			<div class="IOLright"<?php if (!$element->iol_side || $element->iol_side->name == 'Right') {?> style="display: none"<?php }?>>
				<div class="large-1 column">
					<label>Right:</label>
				</div>
				<div class="large-2 column end">
					<?php echo $form->textField($element, 'right_iol_size', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				</div>
			</div>
			<div class="IOLleft"<?php if (!$element->iol_side || $element->iol_side->name == 'Left') {?> style="display: none"<?php }?>>
				<div class="large-1 column">
					<label>Left:</label>
				</div>
				<div class="large-2 column end">
					<?php echo $form->textField($element, 'left_iol_size', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				</div>
			</div>
		</div>
		<?php echo $form->radioBoolean($element, 'metal_in_body',array('class' => 'linked-fields', 'data-linked-fields' => 'm_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'm_comments', array('hide' => !$element->metal_in_body), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'falls_mobility',array('class' => 'linked-fields', 'data-linked-fields' => 'falls', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'falls', 'falls', 'fall_id', CHtml::listData(OphNuPreoperative_PreoperativeAssessment_Falls::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Falls / mobility items'), !$element->falls_mobility, false,null,false,false,array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'removable_dental_work_present', array('class' => 'linked-fields', 'data-linked-fields' => 'dentals,removable_dental_work_present_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'dentals', 'dentals', 'dental_id', CHtml::listData(OphNuPreoperative_PreoperativeAssessment_Dental::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => $element->getAttributeLabel('dental'), 'class' => 'linked-fields', 'data-linked-fields' => 'd_comments', 'data-linked-values' => 'Other (please specify)'),!$element->removable_dental_work_present, false,null,false,false,array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'd_comments', array('hide' => !$element->hasMultiSelectValue('dentals','Other (please specify)')), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'removable_dental_work_present_comments', array('hide' => !$element->removable_dental_work_present), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'hearing_aid_present', array('class' => 'linked-fields', 'data-linked-fields' => 'hearing_aids', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'hearing_aids', 'hearing_aids', 'hearing_id', CHtml::listData(OphNuPreoperative_PreoperativeAssessment_HearingAid::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Hearing aid'), !$element->hearing_aid_present, false,null,false,false,array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'patient_belongings', array('class' => 'linked-fields', 'data-linked-fields' => 'belongings', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'belongings', 'belongings', 'belong_id', CHtml::listData(OphNuPreoperative_PreoperativeAssessment_Belong::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array(),array('empty' => '- Please select -', 'label' => 'Belonging items','class'=>'linked-fields','data-linked-fields'=>'b_comments','data-linked-values'=>'Other (please specify)'), !$element->patient_belongings, false,null,false,false,array('label'=>3,'field'=>4))?>
		<?php echo $form->textField($element, 'b_comments', array('hide' => !$element->hasMultiSelectValue('belongings','Other (please specify)')), array(), array('label' => 3, 'field' => 4))?>
	</div>
