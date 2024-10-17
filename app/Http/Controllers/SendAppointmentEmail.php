<?php

namespace App\Http\Controllers;

use App\Mail\SendAppointmentMail;
use App\Models\VaccineAppointment;
use App\Models\VaccineNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendAppointmentEmail extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
//        $logMessage = "Send Email By Invokable Class";
//        Log::emergency($logMessage);
//        Log::alert($logMessage);
//        Log::critical($logMessage);
//        Log::error($logMessage);
//        Log::warning($logMessage);
//        Log::notice($logMessage);
//        Log::info($logMessage);
//        Log::debug($logMessage);

        $logMessage = 'Start Process to Send Appointment Email';
        Log::emergency($logMessage);

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

            $mailSent = Mail::to($mailSentTo)->send(new SendAppointmentMail($subject, $message));
            if ($mailSent) {
                $logMessage = 'Send Appointment Email to ' . $mailSentTo;
                Log::info($logMessage);

                $userID = $appointment->user_id;
                $vaccineNotification = VaccineNotification::where('user_id', $userID)->first();
                if ($vaccineNotification) {
                    $vaccineNotification->is_sent_mail = 1;
                    $vaccineNotification->mail_send_at = date("Y-m-d H:i:s");
                    $vaccineNotification->update();
                }
            }
        }

        $logMessage = 'End Process of Send Appointment Email';
        Log::emergency($logMessage);
    }
}
