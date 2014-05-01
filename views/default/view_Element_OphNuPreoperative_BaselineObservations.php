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

<section class="element">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name?></h3>
	</header>

	<div class="element-data">
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label">Blood pressure</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->bp_systolic?> / <?php echo $element->bp_diastolic?> mmHg</div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('bpm'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->bpm)?> bpm</div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('temperature'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->temperature)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('res_rate'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->res_rate)?> insp/min</div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('sao2'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->sao2)?> %</div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('blood_sugar'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->bloodsugar_na ? 'N/A' : CHtml::encode($element->blood_sugar)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('urine_passed'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->urine_passed ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->urine_passed) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('time'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->time)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('avpu'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->avpu)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('is_patient_experiencing_pain'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->is_patient_experiencing_pain ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->is_patient_experiencing_pain) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('location_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->location ? $element->location->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('side_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->side ? $element->side->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('type_of_pain_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->type_of_pain ? $element->type_of_pain->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('pain_score_method_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->pain_score_method ? $element->pain_score_method->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('pain_score'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->pain_score)?></div></div>
			</div>
			<?php if ($element->p_comments) {?>
				<div class="row data-row">
					<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('p_comments'))?></div></div>
					<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->p_comments)?></div></div>
				</div>
			<?php }?>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('skin_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->skin ? $element->skin->name : 'None'?></div></div>
		</div>
		<?php if ($element->skin && $element->skin->name == 'Other (please specify)') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('comments'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->comments)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('obs'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php if (!$element->obss) {?>
							None
						<?php } else {?>
								<?php foreach ($element->obss as $item) {
									echo $item->ophnupreoperative_baseline_obs->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
		<?php if ($element->hasMultiSelectValue('obss','Other (please specify)')) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('o_comments'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->o_comments)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('mews_score'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->mews_score)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('iv_inserted'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->iv_inserted ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->iv_inserted) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('iv_location'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->iv_location)?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('size_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->size ? $element->size->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('fluid_type_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->fluid_type ? $element->fluid_type->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('volume_given_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->volume_given ? $element->volume_given->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('rate'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->rate)?></div></div>
			</div>
		<?php }?>
	</div>
</section>
