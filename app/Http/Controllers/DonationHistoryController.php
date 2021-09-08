<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Mail\DonationHistoryMail;
use Illuminate\Support\Facades\Mail;


class DonationHistoryController extends Controller
{
    public function EmailDonationHistory(Request $request)
    {

        $request->validate([
            'EMAIL_ID' => 'required|email',
        ]);

        if (Donation::where('email_id', '=', $request->EMAIL_ID)->exists()) {
            
            $DonationHistory = Donation::
            where(['txn_status' => 'TXN_SUCCESS', 'email_id' => $request->EMAIL_ID])->
            orderBy('id','desc')
            ->get();  

            mail::to($request->EMAIL_ID)->send(new DonationHistoryMail($DonationHistory));  
            
            return redirect('/donate/download')->with('success', 'Email sent with all the details and download links to the given email address.');

         } else {
            return redirect('/donate/download')->with('flash', 'No donations found with this Email ID');
         }
 

    }
}
