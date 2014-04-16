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
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('translator_present_id'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->translator_present ? $element->translator_present->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('name_of_translator'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->name_of_translator)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_verified'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->patient_verified ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('wristband'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php if (!$element->wristbands) {?>
							None
						<?php } else {?>
								<?php foreach ($element->wristbands as $item) {
									echo $item->ophnupreoperative_preoperative_wristband->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('time_last_ate'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->time_last_ate)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('time_last_drank'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->time_last_drank)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('consent_signed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->consent_signed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('surgical_site_verified'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->surgical_site_verified ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('s_right'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->s_right ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('s_left'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->s_left ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('s_both'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->s_both ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('iol_verified_id'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->iol_verified ? $element->iol_verified->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('iol_type'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->iol_type)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('iol_size'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->iol_size)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('metal_in_body'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->metal_in_body ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('m_comments'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->m_comments)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('falls_mobility'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->falls_mobility ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('falls'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php if (!$element->fallss) {?>
							None
						<?php } else {?>
								<?php foreach ($element->fallss as $item) {
									echo $item->ophnupreoperative_preoperative_falls->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('removable_dental_work_present'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->removable_dental_work_present ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('full_uppers'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->full_uppers ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('fu_removed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->fu_removed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('full_lowers'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->full_lowers ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('fl_removed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->fl_removed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('d_other'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->d_other ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other_removed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->other_removed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('d_comments'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->d_comments)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('hearing_aid_present'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->hearing_aid_present ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('h_right'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->h_right ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('h_r_removed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->h_r_removed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('h_left'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->h_left ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('h_r_removed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->h_r_removed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_belongings'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->patient_belongings ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('belong_id'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->belong ? $element->belong->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('b_comments'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->b_comments)?></div></div>
		</div>
			</div>
</section>
