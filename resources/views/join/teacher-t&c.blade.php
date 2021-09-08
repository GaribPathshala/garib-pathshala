@extends('layouts.default')

@section('title' , 'Teacher Application')

@section('title' , 'Join Us')

@section('top-includes')
<style>
    body{
    background-color: rgb(221, 221, 221);
  }
  .button_1 {
    display: inline-block;
    border-radius: 4px;
    background-color: #28a745;
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 22px;
    padding: 20px;
    width: 200px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
  }
  
  .button_1 span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
  }
  
  .button_1 span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
  }
  
  .button_1:hover span {
    padding-right: 25px;
  }
  
  .button_1:hover span:after {
    opacity: 1;
    right: 0;
  }

  .legal_container h3{
    font-size: 28px;
  }

  .legal_container h4{
    font-size: 1.5rem;
  }

  .legal_container {
    padding-top: 30px;
    padding-bottom: 75px;
    margin-top: 150px;
    margin-left: 10%;
    margin-right: 10%;
  }

  .legal_container p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

</style>
@endsection



    
@section('content')

    <div class="legal_container">
        <h3>Teacher Registration - Garib Pathshala</h3>
        <br>
        <h4>Terms And Conditions</h4>
        <p>• This is a volunteer service, there would be no salary.</p>
        <p>• You must have at least a decent mobile camera.</p>
        <p>• You have to record the videos in decent lighting and proper background.</p>
        <p>• After submitting this form our team will contact you and help you get on boarded.</p>
        <p>• Our technical team will be always there to help you in any technical problems.</p>
        <p>• We may use your picture on our website <a href="{{ route('/') }}">garibpathshala.in</a></p>
        <p>• You’ll get an appreciation certificate from us after 6 months.</p>
        <p>• You have to give us at least 1 video in a week or 3 videos in a month.</p>
        <p>• You’ll get a professional email id from us (i.e.  yourname@garibpathshala.in).</p>
        <br>
        <a class="btn btn-success btn-lg" href="{{route('/join/teacher/form')}}" role="button">Apply Now ></a>
    
    </div>


@endsection