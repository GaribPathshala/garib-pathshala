@extends('layouts.default')

@section('nav-ul-covid-center-locator', 'active')
@section('title', 'Vaccine Locator')

@section('content')
<div style="" class="livewire-wrapper">

    @livewire('covid.center-locator')

</div>
@endsection