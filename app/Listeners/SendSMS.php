<?php

namespace App\Listeners;

use App\Events\SendSMSNotification;

class SendSMS
{
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
    public function handle(SendSMSNotification $event): void
    {
        //
    }
}
