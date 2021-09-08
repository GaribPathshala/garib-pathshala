@extends('layouts.default')

@section('title', 'Donate Us')

@section('nav-ul-donate', 'active')

@section('top-includes')
    <link rel="stylesheet" href="{{ asset('/css/Bootstrap-Image-Uploader.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Features-Boxed.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Features-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/donate.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/radio.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/img-slider.css') }}">
    
    <style>
    body{
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg stroke='%23CCC' stroke-width='0' %3E%3Crect fill='%23F5F5F5' x='-60' y='-60' width='110' height='240'/%3E%3C/g%3E%3C/svg%3E");
    }
    </style>
@endsection

@section('content')

<div class="container-fluid" style="margin-top: 70px;">

<div class="row">
    <div class="col-xl-6 d-flex justify-content-center" >
            <div class="left_donation_container">
            @include('donate.includes.donation_slider')
            @include('donate.includes.features') 
            </div>
    </div>
    
            <div class="col-xl-6" id="donation_form">
                <div class="right_donation_container">
                @include('donate.includes.donation_form')
                </div>
            </div>
</div>

</div>


<div class="pay_using_banner_container">
            <h3>Payment Methods</h3>
            <img class="pay_using_banner" src="{{ asset('assets/img/pg.png')}}">
          </div>


          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00eeff7a" fill-opacity="1" d="M0,192L48,202.7C96,213,192,235,288,218.7C384,203,480,149,576,122.7C672,96,768,96,864,122.7C960,149,1056,203,1152,197.3C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
<div class="donations_container">
<div class="header_wrapper">
<h2 class="section_header">Recent Donations</h2>
</div>


<table id="donations">
<!--Table Hedaer Start-->
    <tr>
        <th>Name</th>
        <th>Mobile Number</th>
        <th>Amount</th>
    </tr>
<!--Table Hedaer End-->
@if(isset($recentDonations))

@foreach($recentDonations as $recentDonations)
    <tr>
        <td>{{$recentDonations['donor_name']}}</td>
        <td>{{$recentDonations['mobile_number']}}</td>
        <td>{{$recentDonations['amount'] .' '. $recentDonations['currency']}}</td>
    </tr>
@endforeach
@endif
</table>

</div>

@endsection

