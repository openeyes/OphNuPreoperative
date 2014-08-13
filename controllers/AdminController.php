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
		$this->genericAdmin('Patient identifiers','OphNuPreoperative_PreoperativeAssessment_Identifier');
	}

	public function actionEditWristbands()
	{
		$this->genericAdmin('Special attention wristbands','OphNuPreoperative_PreoperativeAssessment_Wristband');
	}

	public function actionEditIOLTypes()
	{
		$this->genericAdmin('IOL types','OphNuPreoperative_PreopAssessment_IOL_Type');
	}

	public function actionEditIOLSizes()
	{
		$this->genericAdmin('IOL sizes','OphNuPreoperative_PreopAssessment_IOL_Size');
	}

	public function actionEditFallsMobilityItems()
	{
		$this->genericAdmin('Falls / mobility items','OphNuPreoperative_PreoperativeAssessment_Falls');
	}

	public function actionEditDentalItems()
	{
		$this->genericAdmin('Removable dental items','OphNuPreoperative_PreoperativeAssessment_Dental');
	}

	public function actionEditHearingAidItems()
	{
		$this->genericAdmin('Hearing aid items','OphNuPreoperative_PreoperativeAssessment_HearingAid');
	}

	public function actionEditBelongingItems()
	{
		$this->genericAdmin('Patient belongings','OphNuPreoperative_PreoperativeAssessment_Belong');
	}

	public function actionEditPainLocations()
	{
		$this->genericAdmin('Pain locations','OphNuPreoperative_BaselineObservations_Location');
	}

	public function actionEditPainSides()
	{
		$this->genericAdmin('Pain sides','OphNuPreoperative_BaselineObservations_Side');
	}

	public function actionEditPainTypes()
	{
		$this->genericAdmin('Pain types','OphNuPreoperative_BaselineObservations_TypeOfPain');
	}

	public function actionEditPainScoreMethods()
	{
		$this->genericAdmin('Pain score methods','OphNuPreoperative_BaselineObservations_PainScoreMethod');
	}

	public function actionEditSkinAssessments()
	{
		$this->genericAdmin('Skin assessment items','OphNuPreoperative_BaselineObservations_Skin');
	}

	public function actionEditPreopObservations()
	{
		$this->genericAdmin('Pre-op observations','OphNuPreoperative_BaselineObservations_Obs');
	}

	public function actionEditIVSizes()
	{
		$this->genericAdmin('IV sizes','OphNuPreoperative_BaselineObservations_Size');
	}

	public function actionEditIVFluidTypes()
	{
		$this->genericAdmin('IV fluid types','OphNuPreoperative_BaselineObservations_FluidType');
	}

	public function actionEditVolumeGiven()
	{
		$this->genericAdmin('Volumes given','OphNuPreoperative_BaselineObservations_VolumeGiven');
	}

	public function actionEditPatientStatuses()
	{
		$this->genericAdmin('Patient statuses','OphNuPreoperative_PatientStatus_PatientStatus');
	}

	public function actionEditReasonsForCancellation()
	{
		$this->genericAdmin('Reasons for cancellation','OphNuPreoperative_PatientStatus_Cancel');
	}
}
