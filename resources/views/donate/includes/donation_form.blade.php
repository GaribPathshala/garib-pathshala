<form action="{{route("/ProcessDonation")}}" method="post" class="donation_form">

<div class="header_wrapper">
<h1 style="text-align: center; font-weight: 700;" class="section_header">Donate Us</h1>
</div>
    <h5 style="text-align: center; margin-top: 10px;">We assure that your donations<br>to the right hands.</h5>

@error('ORDER_ID')
<div class="alert alert-danger" role="alert">
  There was some technical problem!,<br>Please try again.
</div>
@enderror


@csrf

<div class="form-group" hidden>
    <label for="ORDER_ID" class="col-form-label-lg">Donation ID</label>
    <input type="text" class="form-control @error('ORDER_ID') {{ 'is-invalid' }} @enderror" id="ORDER_ID" name="ORDER_ID" value="DN{{ rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9) }}" readonly>
</div>

<div class="form-group">
    <label for="DONOR_NAME" class="col-form-label-lg">Donor Name <font color="red">*</font></label>
    <input type="text" class="form-control @error('DONOR_NAME') {{ 'is-invalid' }} @enderror form-control-lg" id="DONOR_NAME" name="DONOR_NAME" placeholder="Full Name" value="{{old('DONOR_NAME')}}">
    <div class="invalid-feedback">
        Name is required
    </div>
</div>

<div class="form-group">
    <label for="MOBILE_NUMBER" class="col-form-label-lg">Mobile Number <font color="red">*</font></label>
    <input type="number" class="form-control @error('MOBILE_NUMBER') {{ 'is-invalid' }} @enderror form-control-lg" id="MOBILE_NUMBER" name="MOBILE_NUMBER" placeholder="Mobile Number (10 Digits)" value="{{old('MOBILE_NUMBER')}}">
    <div class="invalid-feedback">
        Mobile Number must be 10 digits
    </div>
</div>

<div class="form-group">
    <label for="EMAIL_ID" class="col-form-label-lg">Email ID <font color="red">*</font></label>
    <input type="text" class="form-control @error('EMAIL_ID') {{ 'is-invalid' }} @enderror form-control-lg" id="EMAIL_ID" name="EMAIL_ID" placeholder="Email Address" value="{{old('EMAIL_ID')}}">
    <div class="invalid-feedback">
        Invalid Email ID
    </div>
</div>


<div class="form-group">
    <label for="TXN_AMOUNT" class="col-form-label-lg">Amount <font color="red">*</font></label>
    <input type="number" class="form-control @error('TXN_AMOUNT') {{ 'is-invalid' }} @enderror form-control-lg" id="TXN_AMOUNT" name="TXN_AMOUNT" placeholder="Indian Rupees (INR)" value="{{old('TXN_AMOUNT')}}">
    <div class="invalid-feedback">
        Amount is required
    </div>
</div>

<div class="form-group">
    <div>
        <label style="font-size: 15px;" class="radio_container"><img width="50px" src="{{ asset('assets/img/paytm.svg')}}" alt=""> (Wallet, UPI, Internet Banking, Debit Card, Credit Card)
        <input class="form-control" type="radio" name="RADIO" value="Paytm">
        <span class="checkmark"></span>
        </label>

        <label style="font-size: 15px;" class="radio_container"><img width="100px" src="{{ asset('assets/img/payumoney.svg')}}" alt=""> (UPI, Internet Banking, Debit Card, Credit Card)
        <input type="radio" checked="checked" name="RADIO" value="PayU">
        <span class="checkmark"></span>
        </label>
        </div>
    </div>

    <button class="btn btn-success btn-lg btn-block" type="submit">DONATE</button>

</form>