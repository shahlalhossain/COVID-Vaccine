<?php

namespace App\Http\Controllers;

use App\Models\VaccineAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\select;

class UpdateVaccineAppointments extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
//        $logMessage = "Update Vaccine Appointments By Invokable Class";
//        Log::emergency($logMessage);
//        Log::alert($logMessage);
//        Log::critical($logMessage);
//        Log::error($logMessage);
//        Log::warning($logMessage);
//        Log::notice($logMessage);
//        Log::info($logMessage);
//        Log::debug($logMessage);
        $logMessage = 'Start Process to Update Vaccine Appointments';
        Log::emergency($logMessage);

        $today = date("Y-m-d");
//        $currentVaccineAppointments = VaccineAppointment::where('vaccination_date', '=', $today)
//            ->where('vaccine_status', '=', 'Scheduled')
//            ->get();
//
//        foreach ($currentVaccineAppointments as $appointment) {
//            $appointment->vaccine_status = 'Vaccinated';
//            $appointment->update();
//        }

        DB::select("UPDATE vaccine_appointments
                        SET vaccine_status = 'Vaccinated'
                        WHERE vaccination_date = '$today'
                        AND vaccine_status = 'Scheduled';");

        $logMessage = 'End Process of Update Vaccine Appointments';
        Log::emergency($logMessage);
    }
}
