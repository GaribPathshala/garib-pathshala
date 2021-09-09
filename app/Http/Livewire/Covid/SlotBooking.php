<?php

namespace App\Http\Livewire\Covid;

use Livewire\Component;
use App\Http\Helpers\CovidHelper;

class SlotBooking extends Component
{
    public $mobile_number='';
    public $otp='';
    public $txnId='';
    public $token='';
    public $status="fresh";

    protected function rules()
    {
        return [
            'mobile_number' => 'required|digits:10|numeric',
            'otp'           => 'required|numeric',
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function mobileNumberSubmit()
    {
        $response = CovidHelper::generateOtp([
            'mobile_number' => $this->mobile_number,
        ]);
        
        if (isset($response->txnId)) {
            $this->txnId = $response->txnId;
            $this->status = 'otp_generated';
        } else {
            session()->flash('error', 'COWIN Returned error! Try again.');
        }
        
        
    }
    public function otpSubmit()
    {
        $response = CovidHelper::verifyOtp([
            'txnId' => $this->txnId,
            'otp' => $this->otp,
        ]);
     
        if (isset($response)) {
            if (isset($response->token)) {
                $this->token = $response->token;
                $this->status = 'logged_in';
            } else {
                session()->flash('error', 'COWIN returned error! Try again.');
            }
        } 
        else {
            session()->flash('error', 'OTP expired! Try again.');
        }
    }

    public function resetState()
    {
        # code...
    }

    public function render()
    {
        return view('livewire.covid.slot-booking');
    }
}
