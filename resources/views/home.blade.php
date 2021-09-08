@extends('layouts.default', ['page' => 'home'])

@section('title' , 'Home')

@section('nav-ul-home', 'active')

@section('top-includes')
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
    <style>
      section{
        padding: 0;
      }
      @media screen and (min-width:768px){
        .carousel-item p{
          font-size: 25px;
        }
      }
      @media screen and (max-width:768px){
        .carousel .carousel-item {
        height: 500px;
        }
        .carousel-item h1 {
        font-size: 20px;
        }
      }
    </style>
@endsection


@section('content')

<section id="home">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">



    <div class="carousel-item active">
      <img src="{{ asset('assets/img/slider/home-slider-1.jpg')}}" alt="...">
      <div class="carousel-caption d-md-block align-items-center justify-content-center h-50 ">
        <h1 data-aos="fade-down">A PENNY IS A LOT OF MONEY, IF YOU HAVE NOT GOT A PENNY.</h1>
        <p data-aos="fade-up">YOU CAN MAKE THE DIFFRENCE !</p>
        <a href="{{ route('/donate') }}" data-aos="zoom-in" class="btn btn-outline-light">DONATE NOW</a>
      </div>
    </div>



    <div class="carousel-item">
      <img src="{{ asset('assets/img/slider/home-slider-2.jpg')}}" alt="...">
      <div class="carousel-caption d-md-block align-items-center justify-content-center h-50">
        <h1 data-aos="fade-down">A PENNY IS A LOT OF MONEY, IF YOU HAVE NOT GOT A PENNY.</h1>
        <p data-aos="fade-up">YOU CAN MAKE THE DIFFRENCE !</p>
        <a href="{{ route('/donate') }}" data-aos="zoom-in" class="btn btn-light">DONATE NOW</a>
      </div>
    </div>



    <div class="carousel-item">
      <img src="{{ asset('assets/img/slider/home-slider-3.jpg')}}" alt="...">
      <div class="carousel-caption d-md-block align-items-center justify-content-center h-50">
        <h1 data-aos="fade-down">A PENNY IS A LOT OF MONEY, IF YOU HAVE NOT GOT A PENNY.</h1>
        <p data-aos="fade-up">YOU CAN MAKE THE DIFFRENCE !</p>
        <a href="{{ route('/donate') }}" data-aos="zoom-in" class="btn btn-outline-light">DONATE NOW</a>
      </div>
    </div>


  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</section>




<!--Start Photos Conatiner Section-->
<div data-aos="fade-up" data-aos-duration="300" class="photo_container"> 
  <div class="header_wrapper">
    <p class="section_header">Memorable Moments</p>
  </div>
  <div class="fixed_size_container">
  
    <div class="fixed_size" id="fixed_photo_1"></div>
    <div class="fixed_size" id="fixed_photo_2"></div>
    <div class="fixed_size" id="fixed_photo_3"></div>
    <div class="fixed_size" id="fixed_photo_4"></div>
    <div class="fixed_size" id="fixed_photo_5"></div>
    <div class="fixed_size" id="fixed_photo_6"></div>
    <div class="fixed_size" id="fixed_photo_7"></div>
    <div class="fixed_size" id="fixed_photo_8"></div>
  </div>
  
  </div> <!--End Photos Conatiner Section-->




<!--Projects Section Start-->
<section data-aos="zoom-in-up" data-aos-duration="300" id="projects_section">
  <div class="header_wrapper">
    <p class="section_header">Projects</p>
  </div>


<div class="projects_all-container">

<div class="projects_container">

  <div class="projects_image_container">
    <img class="projects_img pr_img_left" src="{{ asset('assets/img/ph2.jpg')}}" alt="">
  </div>

    <div class="projects_text_container pr_txt_left">
      <h4>Food Distribution In COVID-19 Pandemic Situation</h4>
      <h6><i>Dated: <a style="color: blue;">March,2020 - Still Active.</a></i></h6>
      <p>Garib Pathshala Welfare Foundation has iniciated its Welfare work by distributing food among the
        needy people of our society during the Covid-19 Pandemic Situation. Inspite of shortage of Fund we
        have been successful to carry out this noble task using the pocket money of its Members. This Pandemic
        Situation has taught this Organisation the value of inculcating the welfare work . It also remains our
        Organisation the preaching of Mahavira –“Live And Let Live”.</p>
    </div>

  </div> 

<div class="projects_container" id="pr_btm">

    <div class="projects_text_container pr_txt_right">
      <h4>Ration Distribution Among Effect People During Post Amphan Situation</h4>
      <h6><i>Dated: <a style="color: blue;">May, 2020.</a></i></h6>
      <p>There is no end of human suffering but it can be lessened with our United effort . Once such Situation
        has been noticed by Garib Pathshala Welfare Foundation since its creation . The incident that has been
        stated is nothing but a super cyclone (Amphan).The Entire Community of West Bengal has Experienced it
        with their own senses . So to stand by the side of suffering humanity , our Organisation has once again
        undertaken the nobel task of helping people in the effected area of Wesr Bengal that is Namkhana in
        South 24pgs . This time too they have distributed free Ration among 200 families . So Its to Remember
        that “United We Stand, Divided We Fall”</p>
    </div>
    <div class="projects_image_container">
      <img class="projects_img pr_img_right" src="{{ asset('assets/img/ph4.jpg')}}" alt="">
    </div>

  </div> 


</div>
</section>
<!--Projects Section End-->


<!--Meet The Team Section Start-->
<section id="meet_the_team_section">
  <div class="header_wrapper">
    <p class="section_header">Meet The Team</p>
</div>


<div class="team_container">

    <div class="member_container">
      <img class="member_photo" src="{{ asset('assets/img/subham.jpg')}}" alt="Subham Manna">
        <div class="member_text_container rainbow">
          <h4>Subham Manna</h4>
          <h6><i>Founder, Chairperson</i></h6>
          <p><i><q>As one person I cannot change the world, But I can change the world of one person.</q></i></p>
          <p class="quote_credit">- Tiny Buddha.</p>
        </div>
    </div>


    <div class="member_container">
      <img class="member_photo" src="{{ asset('assets/img/sumitra.jpg')}}" alt="Sumitra Manna">
        <div class="member_text_container">
          <h4>Sumitra Manna</h4>
          <h6>Treasure</h6>
          <p><i><q>Not all of us can do great things, but we can do small things with great love.</q></i></p>
          <p class="quote_credit">- Mother Teresa</p>
        </div>
    </div>


    <div class="member_container">
      <img class="member_photo" src="{{ asset('assets/img/partha.jpg')}}" alt="Subham Manna">
        <div class="member_text_container">
          <h4>Partha Dey</h4>
          <h6>Secretary</h6>
          <p><i><q>You must never be fearful about what you are doing when it is right.</q></i></p>
          <p class="quote_credit">- Rosa Parks</p>
        </div>
    </div>

</div>


</section>
<!--Meet The Team Section End-->








<!--About Us Section Start-->

<section id="about_us_section">
  <svg style="display: block; xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#F29E208A" fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

<abt-us>
<div id="about_us_section_container">
  <div class="header_wrapper about_header_wrapper">
    <p class="section_header about_section_header">About Us</p>
  </div>
<div class="about_bg_img">

<div class="about_card_container_2">
  <div class="about_card">

    <div class="about_txt_container">
      <br><br>
      <h3>Introduction</h3>
      <p><a>G</a>arib Pathshala mean the word 'Garib' represent people who are educational backward and the word 'Pathshala' means teaching those educational backward people through online system. Garib Pathshala Welfare Foundation is a social organisation formed to serve the nation, educationaly and socially. Its main motto is to educate the nation using its educational faculty and social workers who have voluntarily decided to give their services for the betterment of the people of the nation. With is limited fund it has already involved itself in providing education, food to the needy people during COVID-19. Within a short period of time, The organisation has already planned to distribute the raton to the affected people of super cyclone amphan in the Sunderdan areesEven the organisation has a plan to start its activities in the cultural and sports field but due to shortage of fund it can not be initiated.</p>
      </div>

  </div>
  <div class="about_card">

    <div class="about_txt_container">
      <br><br>
      <h3>Objective</h3>
      <p><a>G</a>arib Pathshala Welfare Foundation is an Educational as well as social organisation but its objective are versatile. It is trying to involve more and more people to strenght the organisation and serve the nation even better.n this regart people should know that is non profit sikhing organisation so to raise the sund it has already to well  of citizen of the nation to main the flow the fund among it some objectives are to assist the underprivileged women by providing proper training, knowledge and equipment’s in various technical and non technical fields for generation of revenue and employment with no profit motive.</p>
      <p><a>T</a>he revenue generated in this process will be used to promote education for the children of the underprivileged area. The main focus will be to promote the basic and higher education for the girls and women, old men, poor and needy people. To open school, college, training institute, Shelter home, old age house, Blind school, pg, girls and boys hostel, training center etc. Counselling Unit for all those persons men, women, children for their mind development & personality progress.</p>
      <p><a>H</a>ealth purpose. Like helping poor and needy to get treatment or medicines, helping natural disasters victims, charity like food and shelter to the needy. Help to under privilege children by providing treatment and equipment. To help poor people on their children marriage, national, youth, economical empowerment, To open entertainment & prayer center for different communities people or religions and human rights work, the main object of the foundation will be public welfare and awareness.</p>
  </div>

</div> 

</div> <!--Bg Img-->
</abt-us>


</section>
  
<!--About Us Section End-->

<!--Join Us Section Start-->
<div class="join_us_section">
  <svg style="display: block; xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#77bedf" fill-opacity="1" d="M0,192L48,202.7C96,213,192,235,288,218.7C384,203,480,149,576,122.7C672,96,768,96,864,122.7C960,149,1056,203,1152,197.3C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
<div class="join_ad_comtainer">


    <img class="stairs" src="{{ asset('assets/img/stairs.svg')}}" alt="">

    <div class="join_ad">
    <h3>Join Us Now</h3>
    <p>Join us in our mission in transforming India through volunteering. Garib Pathshala offers a diverse range of volunteering opportunities in causes like education, environment, animal welfare, disability etc.</p>


  <div class="join_btn_container">
    <a href="{{route('/join')}}"><button class="join_btn">Volunteer Now</button></a>
  </div>
  

  </div>

</div>
</div>




<!--Join Us Section End-->



















@endsection



@section('bottom-includes')

@endsection