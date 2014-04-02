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
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_surgery_id'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->patient_surgery ? $element->patient_surgery->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('anes_related'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->anes_related ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('equipment_failure'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->equipment_failure ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('change_in_patient_condition'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->change_in_patient_condition ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('npo_status'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->npo_status ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_failed_mews'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->patient_failed_mews ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('lack_of_consumables'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->lack_of_consumables ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('staff_sickness'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->staff_sickness ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('consent_form'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->consent_form ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('run_out_of_time'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->run_out_of_time ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->other ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other_comments'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->other_comments)?></div></div>
		</div>
			</div>
</section>
