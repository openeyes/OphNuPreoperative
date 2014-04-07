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
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('surgical_id'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->surgical ? $element->surgical->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('iol_verified'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->iol_verified ? 'Yes' : 'No'?></div></div>
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
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('metal_comments'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->metal_comments)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('removable_dental'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->removable_dental ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('full_uppers'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->full_uppers ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('full_uppers_removed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->full_uppers_removed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('full_lowers'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->full_lowers ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('full_lowers_removed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->full_lowers_removed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->other ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('dental_comments'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->dental_comments)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('hearing_aid_present'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->hearing_aid_present ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('right'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->right ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('right_removed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->right_removed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('left'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->left ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('left_removed'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->left_removed ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_belongings'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->patient_belongings ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('glasses'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->glasses ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('jewelery'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->jewelery ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('clothing'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->clothing ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->other ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('belongings_comments'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->belongings_comments)?></div></div>
		</div>
			</div>
</section>
