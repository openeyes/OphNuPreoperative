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
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('is_pain'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->is_pain ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('type_of_pain_id'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->type_of_pain ? $element->type_of_pain->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('pain_score_method'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->pain_score_method)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('back'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->back ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('neck'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->neck ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('arm'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->arm ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('leg'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->leg ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('head'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->head ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->other ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other_comments'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->other_comments)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('right'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->right ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('left'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->left ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('both'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->both ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('comments'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->comments ? 'Yes' : 'No'?></div></div>
		</div>
			</div>
</section>
