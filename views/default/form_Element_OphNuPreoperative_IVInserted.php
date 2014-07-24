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
		<?php echo $form->checkBox($element, 'iv_inserted', array('text-align'=>'right','class'=>'linked-fields','data-linked-fields'=>'iv_location,iv_size_id,fluid_type_id,volume_given_id,rate','data-linked-values'=>'1'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'iv_location', array('hide' => !$element->iv_inserted), array(), array('label' => 3, 'field' => 1))?>
		<?php echo $form->dropDownList($element, 'iv_size_id', CHtml::listData(OphNuPreoperative_BaselineObservations_Size::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->iv_inserted,array('label'=>3,'field'=>4))?>
		<?php echo $form->dropDownList($element, 'fluid_type_id', CHtml::listData(OphNuPreoperative_BaselineObservations_FluidType::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->iv_inserted,array('label'=>3,'field'=>4))?>
		<?php echo $form->dropDownList($element, 'volume_given_id', CHtml::listData(OphNuPreoperative_BaselineObservations_VolumeGiven::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->iv_inserted,array('label'=>3,'field'=>4))?>
		<div id="div_Element_OphNuPreoperative_IVInserted_rate" class="row field-row"<?php if (!$element->iv_inserted) {?> style="display: none;"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuPreoperative_IVInserted_rate">
					<?php echo $element->getAttributeLabel('rate')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'rate', array('nowrapper'=>true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">mL/hr</span>
			</div>
		</div>
	</div>
