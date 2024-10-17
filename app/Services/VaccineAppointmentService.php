<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Models\VaccineAppointment;
use Exception;

class VaccineAppointmentService extends BaseService
{
    public function store(array $data = []) : VaccineAppointment
    {
        try {
            $vaccineAppointmentObj                              = new VaccineAppointment();
            $vaccineAppointmentObj->user_id                     = $data['user_id'];
            $vaccineAppointmentObj->vaccine_center_id           = $data['vaccine_center_id'];
            $vaccineAppointmentObj->vaccine_center_schedule_id  = $data['vaccine_center_schedule_id'];
            $vaccineAppointmentObj->vaccination_date            = $data['vaccination_date'];
            $vaccineAppointmentObj->vaccine_status              = 'Scheduled';
            $vaccineAppointmentObj->save();

            return $vaccineAppointmentObj;
        } catch (Exception $exception) {
            throw new GeneralException(__('There was a technical problem on store vaccine appointment. Please try again.'.$exception->getMessage()));
        }
    }
}
