@extends('layouts.default')

@section('title', 'Download')

@section('nav-ul-download-donation-certificate', 'active')

@section('top-includes')
    <link rel="stylesheet" href="{{ asset('css/Bootstrap-Image-Uploader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Features-Boxed.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Features-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/donate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/radio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/svg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/img-slider.css') }}">
    
    <style>
    body{
      background-color: #ffffff;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg stroke='%23CCC' stroke-width='0' %3E%3Crect fill='%23F5F5F5' x='-60' y='-60' width='110' height='240'/%3E%3C/g%3E%3C/svg%3E");
    }
    </style>
@endsection



@section('content')



<form action="{{ route('/donate/download')}}" method="post" class="donation_form" style="margin-top: 250px;">

<div class="header_wrapper">
<h1 style="text-align: center; font-weight: 700;" class="section_header">Download Receipt</h1>
</div>

@csrf
<br>

@if(session()->has('flash'))
<div class="alert alert-danger" role="alert" style="text-align: center;">
  No donations found with this Email ID,<br>Please enter correct Email ID.
</div>
@endif


<div class="form-group">
    <label for="EMAIL_ID" class="col-form-label-lg">Email ID <font color="red">*</font></label>
    <input type="text" class="form-control @error('EMAIL_ID') {{ 'is-invalid' }} @enderror form-control-lg" id="EMAIL_ID" name="EMAIL_ID" placeholder="Email Address" value="{{old('EMAIL_ID')}}">
    <div class="invalid-feedback">
        Invalid Email ID
    </div>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert" style="text-align: center;">
    Email sent with all the details and download links to the given Email Address.
</div>
@else
<button class="btn btn-success btn-lg btn-block" type="submit">Proceed</button><br><br>
@endif

    <li>Please provide the same email id, that you uesd while donating.</li>
    <li>We'll send you a email with all your donations and download links.</li>
    <li>If you forgot the email, or need any other help. <br> Feel free to <a href="https://contact.garibpathshala.in">contact us</a></li>

</form>

@endsection