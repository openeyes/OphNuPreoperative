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
<div class="element-fields">

	<?php echo $form->checkBox($element, 'iv_inserted', array(
		'text-align'=>'right',
		'class'=>'linked-fields',
		'data-linked-fields'=>'iv_location_id,iv_side_id,iv_size_id,iv_fluid_started',
		'data-linked-values'=>'1'
	))?>

	<?php echo $form->dropDownList($element, 'iv_location_id', CHtml::listData(OphNuPreoperative_IVInserted_Location::model()->findAll(array('order' => 'display_order asc')),'id','name'),array('empty' => '- Please select -'), !$element->iv_inserted)?>
	<?php echo $form->dropDownList($element, 'iv_side_id', CHtml::listData(OphNuPreoperative_IVInserted_Side::model()->findAll(array('order' => 'display_order asc')),'id','name'),array('empty' => '- Please select -'), !$element->iv_inserted)?>
	<?php echo $form->dropDownList($element, 'iv_size_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Size::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->iv_inserted)?>

	<?php echo $form->radioBoolean($element, 'iv_fluid_started', array(
		'class' => 'linked-fields',
		'data-linked-fields' =>
		'fluid_type_id,volume_given,rate',
		'data-linked-values' => 'Yes'
	), array(), !$element->iv_inserted)?>

	<?php echo $form->dropDownList($element, 'fluid_type_id', CHtml::listData(OphNuPreoperative_BaselineObservations_FluidType::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->iv_fluid_started)?>

	<?php echo $form->textField($element, 'volume_given', array(
		'hide' => !$element->iv_fluid_started,
		'append-text' => 'ml'
	));?>
	<?php echo $form->textField($element, 'rate', array(
		'hide' => !$element->iv_fluid_started,
		'append-text' => 'mL/hr'
	));?>
</div>
