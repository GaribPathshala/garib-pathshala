<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AdminDonationMail;
use Illuminate\Support\Facades\Mail;

class AdminSendMailController extends Controller
{
    public function SendDonationMail(Request $req)
    {
        # code...
        mail::to($req->email)->send(new AdminDonationMail($req));

        return redirect()->back()->with('DonationMailSent', $req->email);
    }
}
