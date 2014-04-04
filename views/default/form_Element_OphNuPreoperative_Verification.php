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

<section class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name; ?></h3>
	</header>

		<div class="element-fields">
			<?php echo $form->radioButtons($element, 'surgical_id', 'ophnupreoperative_verification_surgical')?>
	<?php echo $form->radioBoolean($element, 'iol_verified')?>
	<?php echo $form->textField($element, 'iol_type', array('size' => '10'))?>
	<?php echo $form->textField($element, 'iol_size', array('size' => '10'))?>
	<?php echo $form->radioBoolean($element, 'metal_in_body')?>
	<?php echo $form->textArea($element, 'metal_comments', array('rows' => 6, 'cols' => 80))?>
	<?php echo $form->radioBoolean($element, 'removable_dental')?>
	<?php echo $form->checkBox($element, 'full_uppers')?>
	<?php echo $form->checkBox($element, 'full_uppers_removed')?>
	<?php echo $form->checkBox($element, 'full_lowers')?>
	<?php echo $form->checkBox($element, 'full_lowers_removed')?>
	<?php echo $form->checkBox($element, 'other')?>
	<?php echo $form->radioBoolean($element, 'dental_comments')?>
	<?php echo $form->radioBoolean($element, 'hearing_aid_present')?>
	<?php echo $form->checkBox($element, 'right')?>
	<?php echo $form->radioBoolean($element, 'right_removed')?>
	<?php echo $form->checkBox($element, 'left')?>
	<?php echo $form->radioBoolean($element, 'left_removed')?>
	<?php echo $form->radioBoolean($element, 'patient_belongings')?>
	<?php echo $form->checkBox($element, 'glasses')?>
	<?php echo $form->checkBox($element, 'jewelery')?>
	<?php echo $form->checkBox($element, 'clothing')?>
	<?php echo $form->checkBox($element, 'other')?>
	<?php echo $form->radioBoolean($element, 'belongings_comments')?>
	</div>
	
</section>
