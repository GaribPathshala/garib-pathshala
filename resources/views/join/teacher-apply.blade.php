@extends('layouts.default')

@section('title' , 'Teacher Application Form')

@section('top-includes')
    <link rel="stylesheet" href="{{ asset('css/Multi-step-form.css')}}">
    <style>
        body{
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg stroke='%23CCC' stroke-width='0' %3E%3Crect fill='%23F5F5F5' x='-60' y='-60' width='110' height='240'/%3E%3C/g%3E%3C/svg%3E");
        }
        form{
            margin-top: 7vh;
            padding: 35px;
            margin-bottom: 10vh;
            border-radius: 5px;
            background-color: white;
            padding: 35px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transition: 200ms;
        }
        .header_wrapper{
    text-align: center;
}
.section_header{
    color: #505050;
    position: relative;
    display: inline-block;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-weight: 700;
    text-decoration: none;
    cursor: default;
    margin-bottom: 0;
    bottom: 0;
    padding-bottom: 10px;
}
.section_header::after{
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    height: 0;
    width: 30%;
    border-bottom: 0.3rem solid #3888ff;
    transition: width 0.3s ease;
}
.section_header:hover:after {
    width: 100%;
}

    </style>
@endsection


@section('nav-ul')
<ul>
    <li><a href="{{ route('/')}}">Home</a></li>
    <li><a href="{{ url('/#projects_section')}}">Projects</a></li>
    <li><a href="{{ url('/#meet_the_team_section')}}">Team</a></li>
    <li><a href="{{ url('/#about_us_section')}}">About</a></li>
    <li><a href="{{ route('/gallery')}}">Gallery</a></li>
    <li><a href="{{ route('/contact')}}">Contact</a></li>
    <li class="drop-down active"><a href="{{ route('/join')}}">Get Involved</a>
        <ul>
        <li><a href="{{ route('/join')}}">Volunteer</a></li>
        <li><a href="{{ route('/donate')}}">Donate</a></li>
        </ul>
    </li>
    
  <li class="drop-down"><a href="{{ route('/donate')}}">Donate</a>
    <ul>
      <li><a href="{{ route('/donate')}}">Donate</a></li>
      <li><a href="{{ route('/donate/download')}}">Download Receipt/Certificate</a></li>
    </ul>
  </li>

</ul>
@endsection
    


@section('content')

<div class="container" style="margin-top: 175px;"> 



<form method="POST" action="{{route('/join/teacher/submit')}}">
@csrf
<input type="text" name="application_id" value="{{'AP'.rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)}}" hidden> 

            <div class="header_wrapper">
                <h3 style="text-align: center; font-weight: 700;" class="section_header">Teacher Registration</h3>
                </div>


            <div class="form-row mt-5">
                <div class="form-group col-md-12 col-sm-12 col-12">
                <label for="name">Full Name <font color="Red">*</font></label>
                <input type="text" class="form-control @error('name'){{'is-invalid'}}@enderror" id="name" name="name" placeholder="What's Your Name?" value="{{old('name')}}">
                    @error('name')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-6 col-6">
                <label for="inputPassword4">Mobile Number <font color="Red">*</font></label>
                <input type="number" class="form-control @error('name'){{'is-invalid'}}@enderror" id="mobile" name="mobile" placeholder="10 Digit Mobile Number" value="{{old('mobile')}}">
                @error('mobile')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
                </div>
                <div class="form-group col-md-6 col-sm-6 col-6">
                <label for="inputPassword4">Email Address <font color="Red">*</font></label>
                <input type="email" class="form-control @error('email'){{'is-invalid'}}@enderror" id="email" name="email" placeholder="yourname@example.com" value="{{old('email')}}">
                @error('email')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-3 col-sm-3 col-6">
                <label for="city">City <font color="Red">*</font></label>
                <input type="text" class="form-control @error('city'){{'is-invalid'}}@enderror" id="city" name="city" placeholder="e.g. Kolkata" value="{{old('city')}}">
                @error('city')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
                </div>
                <div class="form-group col-md-3 col-sm-3 col-6">
                <label for="district">District <font color="Red">*</font></label>
                <input type="text" class="form-control @error('district'){{'is-invalid'}}@enderror" id="district" name="district" placeholder="e.g. Kolkata" value="{{old('district')}}">
                @error('district')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
                </div>
                <div class="form-group col-md-4 col-sm-4 col-6">
                <label for="state">State <font color="Red">*</font></label>
                <input type="text" class="form-control @error('state'){{'is-invalid'}}@enderror" id="state" name="state" placeholder="e.g. West Bengal" value="{{old('state')}}">
                @error('state')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
                </div>
                <div class="form-group col-md-2 col-sm-2 col-6">
                <label for="postal">Postal code <font color="Red">*</font></label>
                <input type="text" class="form-control @error('postal'){{'is-invalid'}}@enderror" id="postal" name="postal" placeholder="e.g. 700054" value="{{old('postal')}}">
                @error('postal')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
                </div>
            </div>

            <div class="form-row mt-4">
                <div class="form-group col-md-6 col-sm-6 col-6">
                <label for="qualification">Qualification <font color="Red">*</font></label>
                <input type="text" class="form-control @error('qualification'){{'is-invalid'}}@enderror" id="qualification" name="qualification" placeholder="Educational Qualification" value="{{old('qualification')}}">
                @error('qualification')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
                </div>
                <div class="form-group col-md-6 col-sm-6 col-6">
                <label for="experience">Experience</label>
                <input type="text" class="form-control @error('experience'){{'is-invalid'}}@enderror" id="experience" name="experience" placeholder="If Any" value="{{old('experience')}}">
                @error('experience')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
                </div>
            </div>


            <button type="submit" class="btn btn-primary mb-4">Submit Form</button>


            <li style="text-align: center; color: grey;">We'll also send a copy of your submission at your given Email ID.</li>

          </form>

        </div>

@endsection



@section('bottom-includes')
<script src="{{ asset('js/Multi-step-form.js') }}"></script>
@endsection