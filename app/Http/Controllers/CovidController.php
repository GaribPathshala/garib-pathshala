<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CovidController extends Controller
{
    public function centerLocatorPage()
    {
        return view('covid.center-locator');
    }

    public function infoPage()
    {
        return view('covid.info');
    }

    public function slotBookingPage()
    {
        return view('covid.slot-booking');
    }
}
