<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\SendSMSController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/register', [UsersController::class, 'registerForm'])->name('register');
Route::post('/registration', [UsersController::class, 'registration'])->name('registration');

Route::get('/vaccine-status', [UsersController::class, 'vaccineStatus'])->name('vaccine-status');
Route::post('/vaccine-status-check', [UsersController::class, 'vaccineStatusCheck'])->name('vaccine-status-check');

//Route::get('/sendEmail', [SendEmailController::class, 'sendEmail'])->name('sendEmail');
//Route::get('/sendSMS', [SendSMSController::class, 'sendSMS'])->name('sendSMS');

//Route::get('send-mail', [\App\Http\Controllers\SendAppointmentEmail::class, '__invoke'])->name('send-mail');
//Route::get('send-sms', [\App\Http\Controllers\SendAppointmentSMS::class, '__invoke'])->name('send-sms');
//Route::get('update-appointments', [\App\Http\Controllers\UpdateVaccineAppointments::class, '__invoke'])->name('update-appointments');
