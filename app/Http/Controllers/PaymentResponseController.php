<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;  
use App\Models\Donation;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;

class PaymentResponseController extends Controller
{
    
public function PaytmResponse(Request $request){
        
        $paytmResponse = Indipay::gateway('paytm')->response($request);

        //Update Database With Txn Details Recived From PayTM
        Donation::where('donation_id', $paytmResponse['ORDERID'])->update([
            'txn_status'        => $paytmResponse['STATUS'],
            'txn_date'          => $paytmResponse['TXNDATE'],
            'resp_code'         => $paytmResponse['RESPCODE'],
            'resp_msg'          => $paytmResponse['RESPMSG'],
            'txn_id'            => $paytmResponse['TXNID'],
            'bank_txn_id'       => $paytmResponse['BANKTXNID'],
            'gateway_name'      => $paytmResponse['GATEWAYNAME'],
            'bank_name'         => $paytmResponse['BANKNAME'],
            'download_key'      => bin2hex(random_bytes(32))
        ]);
        
        //Get Data From Database
        $db = Donation::where('donation_id', $paytmResponse['ORDERID'])->first(); 

        //Send Mail If TXN_SUCCESS
        if ($paytmResponse['STATUS'] == "TXN_SUCCESS") { 
            mail::to($db['email_id'])->send(new InvoiceMail($db));   
        } 
            //Send Data To View 
            return view('donate.paymentResponse', ['db' => $db->toArray()]);              
}

public function PayuResponse(Request $request){

        $payuResponse = Indipay::gateway('payu')->response($request);

        if ($request->status == "success") {
            $txn_status = "TXN_SUCCESS";
            $resp_code = "01";
            $resp_msg = "Txn Success";
        } else if ($request->status == "failure") {
            $txn_status = "TXN_FAILURE";
            $resp_code = "227";
            $resp_msg = "Txn Failure";
        } else {
            $txn_status = "TXN_PENDING";
            $resp_code = "400";
            $resp_msg = "Txn Pending";
        }
        // Update Data In Database
        Donation::where('donation_id', $payuResponse['txnid'])->update([
            'txn_status'        => $txn_status,
            'txn_date'          => $payuResponse['addedon'],
            'resp_code'         => $resp_code,
            'resp_msg'          => $resp_msg,
            'txn_id'            => $payuResponse['payuMoneyId'],
            'bank_txn_id'       => $payuResponse['bank_ref_num'],
            'gateway_name'      => $payuResponse['PG_TYPE'],
            'bank_name'         => $payuResponse['bankcode'],
            'download_key'      => bin2hex(random_bytes(32))
        ]);

        //Get Data From Database
        $db = Donation::where('donation_id', $payuResponse['txnid'])->first();
        
        //Send Mail If TXN_SUCCESS
        if ($request->status == "success") {
            mail::to($db['email_id'])->send(new InvoiceMail($db));   
        }
            //Send Data To View 
            return view('donate.paymentResponse', ['db' => $db->toArray()]);      
    }
}