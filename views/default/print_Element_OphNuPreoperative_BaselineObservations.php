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
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('mmhg'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->mmhg)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('heart_rate_pulse'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->heart_rate_pulse)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('temperature'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->temperature)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('respiratory_rate'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->respiratory_rate)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('sao2'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->sao2)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blood_sugar'))?></td>
			<td><span class="big"><?php echo $element->blood_sugar ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blood_sugar_comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->blood_sugar_comments)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('urine_passed'))?>:</td>
			<td><span class="big"><?php echo $element->urine_passed ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('urine_passed_time'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->urine_passed_time)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('avpu'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->avpu)?></span></td>
		</tr>
	</tbody>
</table>

