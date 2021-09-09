<div>
    
    <div class="donation_form mt-5" style="wdith: 325px; padding-top: 0;"> 



        <div class="text-center" >
            <img style="max-height: 200px;" src="{{ asset('assets/img/covid-vaccine.png') }}" alt="">
        </div>


        <div class="header_wrapper">
        <h1 style="text-align: center; font-weight: 700; font-size: 22px;" class=" mb-3">Register or Sign In for Vaccination</h1>
        </div>
        
    @csrf

    <div class="w-100 text-center">
        <p class="mt-2" style="font-size: 14px;">
            @if ($status == 'fresh')
            An OTP will be sent to your mobile number for verification
            @elseif ($status == 'otp_generated')
            Verify the OTP sent to your mobile
            @endif
            
        </p>
    </div>
    

        <div class="form-group">
            <input type="text" class="form-control  @error('mobile_number') is-invalid @enderror" wire:model.lazy="mobile_number" placeholder="Enter your mobile number" autocomplete="nope" @if ($status != 'fresh') readonly @endif >
            @error('mobile_number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        @if ($status == "otp_generated")
        <div class="form-group">
            <input type="text" class="form-control  @error('otp') is-invalid @enderror" wire:model="otp" placeholder="Enter OTP Here" autocomplete="nope">
            @error('otp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        @endif
        

        <div class="text-center text-danger">
            Under Construction! 
        </div>
        @if ($status == 'fresh')
            <button wire:click="mobileNumberSubmit" class="btn btn-block" style="background-color: #002060; color: white;">Generate OTP
                
            </button>
        @elseif ($status = 'otp_generated')
            <button wire:click="otpSubmit" class="btn btn-block" style="background-color: #002060; color: white;">Verify OTP
                
            </button>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger" style="font-size: 15px;">
                {{ session('error') }}
            </div>
        @endif

        

            <div style="font-size: 14px;" class="text-secondary mt-3">
                <li class="mt-2">By Sign In/Registration, I agree to the <strong><a href="https://www.cowin.gov.in/terms-condition">Terms of Service</a> and <a href="">Privacy Policy</a> of <a href="https://www.cowin.gov.in/">cowin.gov.in</a></strong>.</li>
                <li class="mt-2">API provided by <strong><a href="https://apisetu.gov.in">APIsetu.gov.in</a></strong>  </li>
                <li class="mt-2">We are officially registered <strong>Application Service Provider (ASP)</strong> to utilize the Co-WIN APIs.</li>
            </div>
            
        
           
        
    </div>
</div>
