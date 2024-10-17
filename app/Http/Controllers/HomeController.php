<?php

namespace App\Http\Controllers;

use App\Events\SendSMSNotification;

use Illuminate\View\View;


class HomeController extends Controller
{
    public function home() : View
    {
        return view('home');
    }
}
