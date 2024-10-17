<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;
use App\Http\Controllers\SendAppointmentEmail;
use App\Http\Controllers\UpdateVaccineAppointments;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
//    ->withSchedule(function (Schedule $schedule) {
//        // Call an Invokable Class
//        $schedule->call(new UpdateVaccineAppointments())->daily()->at('18:00')->timezone('Asia/Dhaka');
        //Or Run a Console Command
//        $schedule->command('app:update-vaccine-appointments')->daily()->at('18:00')->timezone('Asia/Dhaka');

//        // Call an Invokable Class
//        $schedule->call(new SendAppointmentEmail())->daily()->at('21:00')->timezone('Asia/Dhaka');
//        //Or Run a Console Command
//        $schedule->command('app:send-appointment-email')->daily()->at('21:00')->timezone('Asia/Dhaka');
//    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
