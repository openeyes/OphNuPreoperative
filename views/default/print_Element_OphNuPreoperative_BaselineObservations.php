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

<h4 class="elementTypeName"><?php echo $element->elementType->name?></h4>
<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blood_pressure'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->blood_pressure)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('bpm'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->bpm)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('temperature'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->temperature)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('res_rate'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->res_rate)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('sao2'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->sao2)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blood_sugar'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->blood_sugar)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('bloodsugar_na'))?></td>
			<td><span class="big"><?php echo $element->bloodsugar_na ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('urine_passed'))?>:</td>
			<td><span class="big"><?php echo $element->urine_passed ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('time'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->time)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('avpu'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->avpu)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('is_patient_experiencing_pain'))?>:</td>
			<td><span class="big"><?php echo $element->is_patient_experiencing_pain ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('location_id'))?></td>
			<td><span class="big"><?php echo $element->location ? $element->location->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('side_id'))?></td>
			<td><span class="big"><?php echo $element->side ? $element->side->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('type_of_pain_id'))?></td>
			<td><span class="big"><?php echo $element->type_of_pain ? $element->type_of_pain->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pain_score_method_id'))?></td>
			<td><span class="big"><?php echo $element->pain_score_method ? $element->pain_score_method->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pain_score'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->pain_score)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('p_comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->p_comments)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('skin_id'))?></td>
			<td><span class="big"><?php echo $element->skin ? $element->skin->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->comments)?></span></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('obs'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->obss) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->obss as $item) {
									echo $item->ophnupreoperative_baseline_obs->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('o_comments'))?>:</td>
			<td><span class="big"><?php echo $element->o_comments ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('mews_score'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->mews_score)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('iv_inserted'))?></td>
			<td><span class="big"><?php echo $element->iv_inserted ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('iv_location'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->iv_location)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('size_id'))?></td>
			<td><span class="big"><?php echo $element->size ? $element->size->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('fluid_type_id'))?></td>
			<td><span class="big"><?php echo $element->fluid_type ? $element->fluid_type->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('volume_given_id'))?></td>
			<td><span class="big"><?php echo $element->volume_given ? $element->volume_given->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('rate'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->rate)?></span></td>
		</tr>
	</tbody>
</table>

