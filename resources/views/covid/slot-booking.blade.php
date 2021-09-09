@extends('layouts.default')

@section('title', 'Book Vaccine Slot')

@section('nav-ul-covid-slot-booking', 'active')

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

@livewire('covid.slot-booking')

@endsection