<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Mail\DonationHistoryMail;
use Illuminate\Support\Facades\Mail;

class RecentDonationsController extends Controller
{
    public function show()
    {
        return response("We have currently paused donations, Will resume soon!", 401);

        function stars($mobnum)
        {
            for($i=2;$i<7;$i++)
            {
            $mobnum = substr_replace($mobnum,"*",$i,1);
            }
            return $mobnum;
        }

        $recentDonations = Donation::
        where('txn_status','TXN_SUCCESS')->
        orderBy('id','desc')
        ->take(10)
        ->get();  

        foreach($recentDonations as $key){
            $key['mobile_number'] = stars($key['mobile_number']);
        }    

        // Send Data To View
        return view('donate.donate', ['recentDonations' => $recentDonations]);
    }


    public function ShowAdminDonationTable(){

        $donations = Donation::orderBy('id')->get();

        $total = $this->Total($donations);


        return view('admin.donation-table', ['donations' => $donations, 'total' => $total]);
    }

    public function Total($donations)
    {
        $total = 0;

        foreach ($donations as $item){
            if ($item->txn_status == 'TXN_SUCCESS') {
                $temp = floatval($item->amount);
                $total = $temp+$total;
            } else {
                continue;
            }
        }

        $total = number_format($total ,2);

        return $total;
    }
}
 