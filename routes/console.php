<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Http\Controllers\SendAppointmentEmail;
use App\Http\Controllers\UpdateVaccineAppointments;

//Artisan::command('inspire', function () {
//    $this->comment(Inspiring::quote());
//})->purpose('Display an inspiring quote')->everyMinute()->sendOutputTo('inspire_quote.log');

// Run a Console Command
//Schedule::command('app:update-vaccine-appointments')->daily()->at('18:00')->timezone('Asia/Dhaka');
//Or Call an Invokable Class
Schedule::call(new UpdateVaccineAppointments())->daily()->at('18:00')->timezone('Asia/Dhaka');

// Run a Console Command
//Schedule::command('app:send-appointment-email')->daily()->at('21:00')->timezone('Asia/Dhaka');
//Or Call an Invokable Class
Schedule::call(new SendAppointmentEmail())->daily()->at('21:00')->timezone('Asia/Dhaka');

