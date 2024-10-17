<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $to;
    public string $from;
    public string $subject;
    public string $message;

    /**
     * Create a new job instance.
     */
    public function __construct($to, $from, $subject, $message)
    {
        $this->to       = $to;
        $this->from     = $from;
        $this->subject  = $subject;
        $this->message  = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
//        $logMessage = "Send Email by Job";
//        Log::emergency($logMessage);
//        Log::alert($logMessage);
//        Log::critical($logMessage);
//        Log::error($logMessage);
//        Log::warning($logMessage);
//        Log::notice($logMessage);
//        Log::info($logMessage);
//        Log::debug($logMessage);
        // dd('Job Invoking');
    }
}
