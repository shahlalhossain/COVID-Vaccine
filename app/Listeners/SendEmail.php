<?php

namespace App\Listeners;

use App\Events\SendEmailNotification;
use App\Jobs\SendMail;
use App\Mail\SendAppointmentMail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmail
{
    use DispatchesJobs;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendEmailNotification $event) : void
    {
//        dd('Listener Called');
//        $logMessage = "Send Email By Listener";
//        Log::emergency($logMessage);
//        Log::alert($logMessage);
//        Log::critical($logMessage);
//        Log::error($logMessage);
//        Log::warning($logMessage);
//        Log::notice($logMessage);
//        Log::info($logMessage);
//        Log::debug($logMessage);

        // Invoke to a Job
        // $this->dispatch(new SendMail($event->from, $event->to, $event->subject, $event->message));

        //OR Call Laravel Mailer Class
        $subject = $event->subject;
        $message = $event->message;
        $mailTo = $event->to;
        Mail::to($mailTo)->send(new SendAppointmentMail($subject, $message));
    }
}
