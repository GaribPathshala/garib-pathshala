<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Softon\Indipay\Facades\Indipay;  


class DonationProcessController extends Controller
{
    //   
 
    public function saveDonation(Request $req){ 
                
        $req->validate([
            'ORDER_ID' => 'required|unique:donations,donation_id',
            'DONOR_NAME' => 'required',
            'MOBILE_NUMBER' => 'required|digits_between:10,10',
            'EMAIL_ID' => 'required|email',
            'TXN_AMOUNT' => 'required|numeric|min:1',
            'RADIO' => 'required',
        ]);

        $DonorDetail = new Donation;
        $DonorDetail->donation_id = $req->ORDER_ID;
        $DonorDetail->donor_name = $req->DONOR_NAME;
        $DonorDetail->mobile_number = $req->MOBILE_NUMBER;
        $DonorDetail->email_id = $req->EMAIL_ID;
        $DonorDetail->amount = $req->TXN_AMOUNT;
        $DonorDetail->currency = "INR";
        $DonorDetail->txn_status = "Pending";
        $DonorDetail->txn_date = "-";
        $DonorDetail->resp_code = "-";
        $DonorDetail->resp_msg = "-";
        $DonorDetail->txn_id = "-";
        $DonorDetail->bank_txn_id = "-";
        $DonorDetail->gateway_name = "-";
        $DonorDetail->bank_name = "-";
        $DonorDetail->pg = $req->RADIO;
        
        $DonorDetail->save(); //Saved To DataBase

        //Process The Transaction Below
            if ($req->RADIO == "PayU") {                
                $parameters = [
                    'txnid' => $req->ORDER_ID,
                    'order_id' => $req->ORDER_ID,
                    'amount' => $req->TXN_AMOUNT,
                    'firstname' => $req->DONOR_NAME,
                    'email' => $req->EMAIL_ID,
                    'phone' => $req->MOBILE_NUMBER,
                    'productinfo' => "Donated on donate.garibpathshala.in"
                ];
                // gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo / ZapakPay / Paytm / Mocker
                $order = Indipay::gateway('PayUMoney')->prepare($parameters);
                return Indipay::process($order);                        
            }
            
            else if ($req->RADIO == "Paytm") {

                $parameters = [
                    'ORDER_ID' => $req->ORDER_ID,
                    'CUST_ID' => $req->MOBILE_NUMBER,
                    'TXN_AMOUNT' => $req->TXN_AMOUNT,
                ];
                // gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo / ZapakPay / Paytm / Mocker
                $order = Indipay::gateway('Paytm')->prepare($parameters);
                $order->parameters['CHECKSUMHASH'] = $order->checksum;
                return Indipay::process($order);                                                
            } 
    }
} // Classs Close

