<?php

namespace App\Console\Commands;

use App\Models\VaccineAppointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateVaccineAppointments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-vaccine-appointments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update vaccine appointments';

    /**
     * Execute the console command.
     */
    public function handle()
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
