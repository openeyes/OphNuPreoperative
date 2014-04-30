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
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('translator_present_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->translator_present ? $element->translator_present->name : 'None'?></div></div>
		</div>
		<?php if ($element->translator_present->name == 'Yes') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('name_of_translator'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->name_of_translator)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_verified'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->patient_verified ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('wristband'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php if (!$element->wristbands) {?>
							None
						<?php } else {?>
								<?php foreach ($element->wristbands as $item) {
									echo $item->ophnupreoperative_preoperative_wristband->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('date_last_ate'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->NHSDate('date_last_ate'))?> at <?php echo substr($element->date_last_ate,11,5)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('date_last_drank'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->NHSDate('date_last_drank'))?> at <?php echo substr($element->date_last_drank,11,5)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('consent_signed'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->consent_signed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('surgical_site_verified'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->surgical_site_verified ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->surgical_site_verified) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('site_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->site ? $element->site->name : 'None'?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('iol_verified_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->iol_verified ? $element->iol_verified->name : 'None'?></div></div>
		</div>
		<?php if ($element->iol_verified->name == 'Yes') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('iol_type_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->iol_type ? $element->iol_type->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('iol_size_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->iol_size ? $element->iol_size->name : 'None'?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('metal_in_body'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->metal_in_body ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->metal_in_body) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('m_comments'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->m_comments)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('falls_mobility'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->falls_mobility ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->falls_mobility) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('falls'))?>:</div></div>
				<div class="large-9 column end"><div class="data-value"><?php if (!$element->fallss) {?>
								None
							<?php } else {?>
									<?php foreach ($element->fallss as $item) {
										echo $item->ophnupreoperative_preoperative_falls->name?><br/>
									<?php }?>
							<?php }?>
				</div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('removable_dental_work_present'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->removable_dental_work_present ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->removable_dental_work_present) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('dental'))?>:</div></div>
				<div class="large-9 column end"><div class="data-value"><?php if (!$element->dentals) {?>
								None
							<?php } else {?>
									<?php foreach ($element->dentals as $item) {
										echo $item->ophnupreoperative_preoperative_dental->name?><br/>
									<?php }?>
							<?php }?>
				</div></div>
			</div>
		<?php }?>
		<?php if ($element->hasMultiSelectValue('dentals','Other (please specify)')) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('d_comments'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->d_comments)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('hearing_aid_present'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->hearing_aid_present ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->hearing_aid_present) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('hearing_aid'))?>:</div></div>
				<div class="large-9 column end"><div class="data-value"><?php if (!$element->hearing_aids) {?>
								None
							<?php } else {?>
									<?php foreach ($element->hearing_aids as $item) {
										echo $item->ophnupreoperative_preoperative_hearing_aid->name?><br/>
									<?php }?>
							<?php }?>
				</div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_belongings'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->patient_belongings ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->patient_belongings) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('belongings'))?>:</div></div>
				<div class="large-9 column end"><div class="data-value"><?php if (!$element->belongings) {?>
								None
							<?php } else {?>
									<?php foreach ($element->belongings as $item) {
										echo $item->belong->name?><br/>
									<?php }?>
							<?php }?>
				</div></div>
			</div>
		<?php }?>
		<?php if ($element->hasMultiSelectValue('belongings','Other (please specify)')) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('b_comments'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->b_comments)?></div></div>
			</div>
		<?php }?>
	</div>
</section>
