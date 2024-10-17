<?php

namespace App\Console\Commands;

use App\Mail\SendAppointmentMail;
use App\Models\VaccineAppointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendAppointmentEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-appointment-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send appointment email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $logMessage = "Send Email By Console Command";
//        Log::emergency($logMessage);
//        Log::alert($logMessage);
//        Log::critical($logMessage);
//        Log::error($logMessage);
//        Log::warning($logMessage);
//        Log::notice($logMessage);
//        Log::info($logMessage);
//        Log::debug($logMessage);

        $logMessage = 'Start Process to Send Appointment Email';
        Log::debug($logMessage);

        $tomorrow = date("Y-m-d", strtotime("tomorrow"));
        $vaccineAppointmentedUsers = VaccineAppointment::where('vaccination_date', '=', $tomorrow)
            ->where('vaccine_status', '=', 'Scheduled')
            ->get();

        foreach ($vaccineAppointmentedUsers as $appointment) {
            $subject = 'COVID-19 Vaccine Appointment and Schedule';
            $mailSentTo = $appointment->user->email;
            $message['userName'] = $appointment->user->name;
            $message['vaccineCenterName'] = $appointment->vaccineCenter->name;
            $message['vaccineCenterAddress'] = $appointment->vaccineCenter->address;

            Mail::to($mailSentTo)->send(new SendAppointmentMail($subject, $message));
        }

        $logMessage = 'End Process of Send Appointment Email';
        Log::debug($logMessage);
    }
}
