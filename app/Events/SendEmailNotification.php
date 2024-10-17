<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendEmailNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $from;
    public string $to;
    public string $subject;
    public string $message;
    /**
     * Create a new event instance.
     */
    public function __construct($from, $to, $subject, $message, $ccs = null)
    {
        // dd($from, $to, $subject, $emailBody);
        $this->from     = $from;
        $this->to       = $to;
        $this->subject  = $subject;
        $this->message  = $message;
    }
}
