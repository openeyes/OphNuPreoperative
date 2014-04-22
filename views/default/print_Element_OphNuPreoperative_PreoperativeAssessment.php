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
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('translator_present_id'))?></td>
			<td><span class="big"><?php echo $element->translator_present ? $element->translator_present->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('name_of_translator'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->name_of_translator)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('patient_verified'))?></td>
			<td><span class="big"><?php echo $element->patient_verified ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('wristband'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->wristbands) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->wristbands as $item) {
									echo $item->ophnupreoperative_preoperative_wristband->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('time_last_ate'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->time_last_ate)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('time_last_drank'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->time_last_drank)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('consent_signed'))?></td>
			<td><span class="big"><?php echo $element->consent_signed ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('surgical_site_verified'))?></td>
			<td><span class="big"><?php echo $element->surgical_site_verified ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('s_right'))?></td>
			<td><span class="big"><?php echo $element->s_right ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('s_left'))?></td>
			<td><span class="big"><?php echo $element->s_left ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('s_both'))?></td>
			<td><span class="big"><?php echo $element->s_both ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('iol_verified_id'))?></td>
			<td><span class="big"><?php echo $element->iol_verified ? $element->iol_verified->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('iol_type'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->iol_type)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('iol_size'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->iol_size)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('metal_in_body'))?>:</td>
			<td><span class="big"><?php echo $element->metal_in_body ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('m_comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->m_comments)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('falls_mobility'))?>:</td>
			<td><span class="big"><?php echo $element->falls_mobility ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('falls'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->fallss) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->fallss as $item) {
									echo $item->ophnupreoperative_preoperative_falls->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('removable_dental_work_present'))?>:</td>
			<td><span class="big"><?php echo $element->removable_dental_work_present ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('dental'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->dentals) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->dentals as $item) {
									echo $item->ophnupreoperative_preoperative_dental->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('d_comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->d_comments)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('hearing_aid_present'))?>:</td>
			<td><span class="big"><?php echo $element->hearing_aid_present ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('hearing_aid'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->hearing_aids) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->hearing_aids as $item) {
									echo $item->ophnupreoperative_preoperative_hearing_aid->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('patient_belongings'))?>:</td>
			<td><span class="big"><?php echo $element->patient_belongings ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('belong_id'))?></td>
			<td><span class="big"><?php echo $element->belong ? $element->belong->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('b_comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->b_comments)?></span></td>
		</tr>
	</tbody>
</table>

