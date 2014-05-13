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

class AdminController extends ModuleAdminController
{
	public function actionEditPatientIdentifiers()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Patient identifiers',
			'model' => 'OphNuPreoperative_PreoperativeAssessment_Identifier',
		));
	}

	public function actionEditWristbands()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Special attention wristbands',
			'model' => 'OphNuPreoperative_PreoperativeAssessment_Wristband',
		));
	}

	public function actionEditIOLTypes()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'IOL types',
			'model' => 'OphNuPreoperative_PreopAssessment_IOL_Type',
		));
	}

	public function actionEditIOLSizes()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'IOL sizes',
			'model' => 'OphNuPreoperative_PreopAssessment_IOL_Size',
		));
	}

	public function actionEditFallsMobilityItems()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Falls / mobility items',
			'model' => 'OphNuPreoperative_PreoperativeAssessment_Falls',
		));
	}

	public function actionEditDentalItems()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Removable dental items',
			'model' => 'OphNuPreoperative_PreoperativeAssessment_Dental',
		));
	}

	public function actionEditHearingAidItems()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Hearing aid items',
			'model' => 'OphNuPreoperative_PreoperativeAssessment_HearingAid',
		));
	}

	public function actionEditBelongingItems()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Patient belongings',
			'model' => 'OphNuPreoperative_PreoperativeAssessment_Belong',
		));
	}

	public function actionEditPainLocations()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Pain locations',
			'model' => 'OphNuPreoperative_BaselineObservations_Location',
		));
	}

	public function actionEditPainSides()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Pain sides',
			'model' => 'OphNuPreoperative_BaselineObservations_Side',
		));
	}

	public function actionEditPainTypes()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Pain types',
			'model' => 'OphNuPreoperative_BaselineObservations_TypeOfPain',
		));
	}

	public function actionEditPainScoreMethods()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Pain score methods',
			'model' => 'OphNuPreoperative_BaselineObservations_PainScoreMethod',
		));
	}

	public function actionEditSkinAssessments()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Skin assessment items',
			'model' => 'OphNuPreoperative_BaselineObservations_Skin',
		));
	}

	public function actionEditPreopObservations()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Pre-op observations',
			'model' => 'OphNuPreoperative_BaselineObservations_Obs',
		));
	}

	public function actionEditIVSizes()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'IV sizes',
			'model' => 'OphNuPreoperative_BaselineObservations_Size',
		));
	}

	public function actionEditIVFluidTypes()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'IV fluid types',
			'model' => 'OphNuPreoperative_BaselineObservations_FluidType',
		));
	}

	public function actionEditVolumeGiven()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Volumes given',
			'model' => 'OphNuPreoperative_BaselineObservations_VolumeGiven',
		));
	}

	public function actionEditPatientStatuses()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Patient statuses',
			'model' => 'OphNuPreoperative_PatientStatus_PatientStatus',
		));
	}

	public function actionEditReasonsForCancellation()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Reasons for cancellation',
			'model' => 'OphNuPreoperative_PatientStatus_Cancel',
		));
	}
}
