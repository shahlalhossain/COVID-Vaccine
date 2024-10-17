<?php

namespace App\Http\Controllers;

use App\Events\SendEmailNotification;
use App\Mail\SendAppointmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        //
    }
}
