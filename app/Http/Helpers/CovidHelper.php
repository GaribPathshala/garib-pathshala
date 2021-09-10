<?php

namespace App\Http\Helpers;


class CovidHelper{

    
    static public function fetchStates() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://cdn-api.co-vin.in/api/v2/admin/location/states',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'accept: application/json',
            'Accept-Language: hi_IN',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        $response = json_decode($response);
        return $response;
    }
    

    static public function verifyOtp($data)
    {
        $otp    = hash("sha256", $data['otp']);
        $txnId  = $data['txnId'];

        $curl = curl_init();

        if (env('COWIN_ENV') == 'local') {
            $url = 'https://cdndemo-api.co-vin.in/api/v2/auth/confirmOTP';
        } 
        else {
            $url = 'https://cdn-api.co-vin.in/api/v2/auth/confirmOTP';
        }

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://cdndemo-api.co-vin.in/api/v2/auth/confirmOTP',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{"otp":"'.$otp.'","txnId":"'.$txnId.'"}',
        CURLOPT_HTTPHEADER => array(
            'accept: application/json',
            'x-api-key: 3sjOr2rmM52GzhpMHjDEE1kpQeRxwFDr4YcBEimi',
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);
        return $response;
    }

    static public function generateOtp($data) {
        $mobile_number = $data['mobile_number'];
        $curl = curl_init();

        if (env('COWIN_ENV') == 'local') {
            $url = 'https://cdndemo-api.co-vin.in/api/v2/auth/generateOTP';
        } 
        else {
            $url = 'https://cdn-api.co-vin.in/api/v2/auth/generateOTP';
        }

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{"mobile":"'.$mobile_number.'"}',
        CURLOPT_HTTPHEADER => array(
            'accept: application/json',
            'x-api-key: 3sjOr2rmM52GzhpMHjDEE1kpQeRxwFDr4YcBEimi',
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36'
        ),
        ));
      
        $response = curl_exec($curl);
        
        curl_close($curl);
        $response = json_decode($response);
        return $response;
    }
    
    static public function fetchDistrictsByStateId($data) {
        
        $curl = curl_init();
        $url = 'https://cdn-api.co-vin.in/api/v2/admin/location/districts/'.$data['state_id'];

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'accept: application/json',
            'Accept-Language: hi_IN',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        return $response;
    }

    
    static public function calenderByDistrictId($data) {
        $curl = curl_init();
        $url = 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByDistrict?district_id='.$data["district_id"].'&date='.$data["date"];
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'accept: application/json',
            'Accept-Language: hi_IN',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        return $response;
    }


    static public function calenderByPin($data) {
        $curl = curl_init();
        $url = 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByPin?pincode='.$data["postal_code"].'&date='.$data['date'];
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'accept: application/json',
            'Accept-Language: hi_IN',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        return $response;
    }


    static public function searchByPin($data) {
        $curl = curl_init();

        $url = 'https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/findByPin?pincode='.$data["postal_code"].'&date='.$data['date'];

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'accept: application/json',
            'Accept-Language: hi_IN',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        return $response;
    }




}