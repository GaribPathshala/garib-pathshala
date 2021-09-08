@extends('layouts.default')

@section('title' , 'Join Us')

@section('nav-ul-volunteer', 'active')

@section('top-includes')
<style>
body{
  background-color: rgb(224, 224, 224);
}
.banner{
  width: 100%;
}
.join_header{
  font-size: 25px;
}
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body {
  background: #fefefe;
  font-family: sans-serif;
}

.heading {
  text-align: center;
  font-size: 30px;
  margin-bottom: 50px;
}
.row {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  flex-flow: wrap;
}
.card {
  width: 300px;
  background: #fff;
  border: 1px solid #ccc;
  margin-bottom: 50px;
  transition: 0.3s;
}
.card-header {
  text-align: center;
  height: 125px;
  background: linear-gradient(to right, #ff416c, #ff4b2b);
  color: #fff;
  font-size: 40px;
  padding-top: 30px;
}
.card-body {
  padding: 30px 20px;
  text-align: center;
  font-size: 18px;
}
.card-body .btn {
  display: block;
  color: #fff;
  text-align: center;
  background: linear-gradient(to right, #ff416c, #ff4b2b);
  margin-top: 30px;
  text-decoration: none;
  padding: 10px 5px;
}
.card:hover {
  transform: scale(1.05);
  box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.25);
}
.contact_line{
    text-align: center;
}
@media screen and (max-width: 1000px) {
  .card {
    width: 40%;
  }
}
@media screen and (max-width: 620px) {
  .container {
    width: 100%;
  }
  .heading {
    padding: 20px;
    font-size: 20px;
  }
  .card {
    width: 80%;
  }
}
</style>
@endsection






    
@section('content')

<img class="banner" src="{{ asset('assets/img/volunteer.jpg')}}">

<div class="container" id="cards_section">
  <div class="heading">
    <p class="join_header">Join us in our mission in transforming India through volunteering. <b>Garib Pathshala</b> offers a diverse range of volunteering opportunities in causes like education, environment, animal welfare, disability etc.</p>
  </div>
  <div class="row">
    <div class="card">
      <div class="card-header">
        <h1>Teacher</h1>
      </div>
      <div class="card-body">
        <p>
          Teachers encourage minds to think hands to create & hearts to love, spread your knowledge with the world<br><br><br>
        </p>
        <a href="{{ asset('join/teacher')}}" class="btn">Apply Now</a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h1>Video Editor</h1>
      </div>
      <div class="card-body">
        <p>
          We are finding someone who can express our feelings on the timeline...<br><br>Are you the one?<br><br>
        </p>
        <a href="#cards_section" class="btn">Coming Soon</a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h1>Coming Soon</h1>
      </div>
      <div class="card-body">
        <p>
          This card is currently empty, We'll update when we need it :)<br><br><br><br>
        </p>
        <a href="#cards_section" class="btn">Coming Soon</a>
      </div>
    </div>
  </div>
  <p class="contact_line">If you need any help feel free to <a href="{{ route('/contact')}}"><b>contact us</b></a>.</p>
</div>





@endsection