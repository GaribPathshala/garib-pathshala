@extends('layouts.default')

@section('title' , 'Contact Us')

@section('nav-ul-contact', 'active')
  
@section('top-includes')
<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/Contact-Form-Clean.css')}}">
<style>
    *{
    margin: 0;
    padding: 0;
  } 
 
body{
  background-color: #dbdbdb;

}
  
  .connectbanner{
    width: 100%;
  }
  
  #callus,#emailus,#or{
  font-weight: 645;

  }
  .contactdetails{
    font-family: acumin-pro, system-ui, sans-serif;
   text-align: center;
   font-size: 25px;
   
  }

  
.mapembed{
  text-align: center;
  margin-top: 90px;
  margin-bottom: 90px;
  }

  #mmap{
      display: none;
  }
  .company_container{
    margin: 130px 0;
    width: 60%;
  }
  .company_container p{
    font-size: 17px;
    color: #505E6C;

  }
  #f1 input, #f1 textarea{
    background-color: rgba(250, 253, 255, 0.685);
  }

  .head-office-title {
    font-style: normal;
    font-weight: 400;
    color: #ff6d00;
    text-transform: none;
    line-height: 30px;
    border-bottom: 1px solid #ff6d00;
    padding-bottom: 5px;
}
.head-office-address {
  font-size: 15px;
  color: #000;
  font-family: 'Open Sans',sans-serif;
}
  
  @media (max-width: 768px){

    body{
      background-image: none;
      display: inherit;
    }
    .mapembed{
        text-align: center;
        width: inherit;
        }
        #mmap{
            display: inherit;
        }
        #pmap{
            display: none;
        }
        .mapembed{
          text-align: center;
          }
          .company_container{
            width: 90%;
            margin: auto;
          }
          #f1{
            width: 100%;
          }
    }
</style>
@endsection

  
@section('content')





<img  class="connectbanner" src="{{ asset('assets/img/connect.png')}}">
  
<div class="container-fluid">

  <div class="row">

<div class="col-xl-6 justify-content-center">
  <!--Query Raise Form Start-->

<div class="contact-clean bg-transparent" >
<form method="post" action="{{route('/contact')}}" id="f1" name="f1" data-aos="fade" class="bg-transparent" style="box-shadow: none;">
    @csrf      
  <h2 class="text-center">Raise Query</h2>

  @if(isset($tid))
  <div class="alert alert-success">
    Ticket raised successfully with <br>Ticket ID: <strong>{{ $tid }}</strong>, <br>Our Team will contact you shortly :)
  </div>
  @endif

        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
          </div>
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="name" type="text" class="form-control @error('name'){{'is-invalid'}}@enderror" name="name" placeholder="Name" value="{{old('name')}}">
        @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>  
        @enderror
        </div>
        <br>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
          </div>
          <input id="email" type="email" class="form-control @error('email'){{'is-invalid'}}@enderror" name="email" placeholder="Email Address" value="{{old('email')}}">
          @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>  
          @enderror
        </div>
        <br>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-mobile" aria-hidden="true"> </i></div>
          </div>
          <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
        <input id="mobile" type="number" class="form-control @error('mobile'){{'is-invalid'}}@enderror" name="mobile" placeholder="Mobile Number (Optional)" value="{{old('mobile')}}">
          @error('mobile')
          <div class="invalid-feedback">
            {{$message}}
          </div>  
          @enderror
        </div>
        <br>
        <div class="input-group">
        <textarea class="form-control @error('message'){{'is-invalid'}}@enderror" name="message" id="message" rows="14" placeholder="Explain Your Query In Brief To Help Us Understand." style="height: 250px;" value="{{old('message')}}"></textarea>
          @error('message')
          <div class="invalid-feedback">
            {{$message}}
          </div>  
          @enderror
      </div>

      @if(!isset($tid))
        <div class="form-group"><button class="btn btn-primary" id="send_btn" type="submit">SEND</button></div>
      @endif
      </form>

    </div>
</div>

    <!--2nd Col-->
    <div class="col-xl-6 justify-content-center">
        <div class="company_container">
        <h2 class="head-office-title"> <i class="fa fa-building-o"></i> Head Office </h2>
        <p class="head-office-address"> <b>Company Name: </b> <br>Garib Pathshala Welfare Foundation </p>
        <p class="head-office-address"> <b>Registered Office Address: </b> <br>121/5E/1F Satin Sen Sarani, <br>Manicktala Main Rd, <br>Kolkata, 700054 <br>WB, IN</p>
        <p class="head-office-address"> <b>Contact / Query: </b> <br><a href="mailto:contact@garibpathshala.in">contact@garibpathshala.in</a> <br><a href="mailto:query@garibpathshala.in">query@garibpathshala.in</a></p>
        <p class="head-office-address"> <b>Telephone Number: </b> <br><a href="tel:+918902984277">+91 8902984277</a></p>
        <p class="head-office-address"> <b>Tech Team: </b> <br><a href="mailto:web.dev@garibpathshala.in">web.dev@garibpathshala.in</a></p>
        <p class="head-office-address"> <b>CIN: </b><br>U80903WB2020NPL239015 </a></p>
        </div>
    </div>
  </div>

  </div> <!--Row End-->
</div>




</div>
<!--Query Raise Form End-->

  <!--Google Map Embed Start-->
<div class="mapembed">

    <iframe id="mmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17521.879523839412!2d88.40276981066967!3d22.5969960549717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277315f319777%3A0xd415c81875d8da67!2sGarib%20Pathshala!5e0!3m2!1sen!2sin!4v1598455198723!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <iframe id="pmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17521.879523839412!2d88.40276981066967!3d22.5969960549717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277315f319777%3A0xd415c81875d8da67!2sGarib%20Pathshala!5e0!3m2!1sen!2sin!4v1598455198723!5m2!1sen!2sin" width="65%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>
  <!--Google Map Embed End-->     


@endsection