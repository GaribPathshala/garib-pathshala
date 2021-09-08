<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="Icon" href="{{ asset('favicon.ico')}}">
    <title>@yield('title') - {{ config('app.name', 'Garib Pathshala') }}</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('bizland/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('bizland/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{ asset('bizland/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('bizland/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{ asset('bizland/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{ asset('bizland/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('bizland/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('css/custom.css')}}" rel="stylesheet">

  <!-- Font Awesome CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  @yield('top-includes')

  @livewireStyles
  @livewireScripts

</head>


  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="topbar d-none d-lg-flex align-items-center fixed-top dynamicTopbar" >
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@garibpathshala.in">contact@garibpathshala.in</a>
        <i class="icofont-phone"></i><a href="tel:+91 8902984277">+91 8902 984 277</a>
      </div>
      <div class="social-links">
        <a href="{{ env('TWITTER_LINK')}}" target="_blank" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="{{ env('FACEBOOK_LINK')}}" target="_blank" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="{{ env('INSTAGRAM_LINK')}}" target="_blank" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="{{ env('WHATSAPP_LINK')}}" target="_blank" class="whatsapp"><i class="icofont-brand-whatsapp"></i></i></a>
        <a href="{{ env('YOUTUBE_LINK')}}" target="_blank" class="youtube"><i class="icofont-youtube-play"></i></a>
      </div>
    </div>
  </div>

  <div id="topbar" style="opacity: 0 !important; position: unset !important;" class="topbar d-none d-lg-flex align-items-center fixed-top dynamicTopbar">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@garibpathshala.in">contact@garibpathshala.in</a>
        <i class="icofont-phone"></i><a href="tel:+91 8902984277">+91 8902 984 277</a>
      </div>
      <div class="social-links">
        <a href="https://twitter.com/GaribPathshala" target="_blank" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="https://www.facebook.com/GaribPathshala" target="_blank" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/garibpathshala" target="_blank" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="https://web.whatsapp.com/send?phone=918902984277&amp;text=Hello," target="_blank" class="whatsapp"><i class="icofont-brand-whatsapp"></i></a>
        <a href="https://www.youtube.com/c/GaribPathshala?sub_confirmation=1" target="_blank" class="youtube"><i class="icofont-youtube-play"></i></a>
      </div>
    </div>
  </div>


  <!-- ======= Header ======= -->
  <header id="header"  class="header fixed-top dynamicHeader" >
    <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="{{route('/')}}"><img src="{{asset('assets/img/logo_txt_black.png')}}" alt=""></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="@yield('nav-ul-home')"><a href=" @if(isset($page) && $page != 'home') {{url('/')}} @endif #home">Home</a></li>
          <li class="@yield('nav-ul-projects')"><a href=" @if(isset($page) && $page != 'home') {{url('/')}} @endif #projects_section">Projects</a></li>
          <li class="@yield('nav-ul-team')"><a href=" @if(isset($page) && $page != 'home') {{url('/')}} @endif #meet_the_team_section">Team</a></li>
          <li class="@yield('nav-ul-about')"><a href=" @if(isset($page) && $page != 'home') {{url('/')}} @endif #about_us_section">About</a></li>
          <li class="@yield('nav-ul-gallery')"><a href="{{ route('/gallery')}}">Gallery</a></li>
          <li class="@yield('nav-ul-contact')"><a href="{{ route('/contact')}}">Contact</a></li>
          <li class="@yield('nav-ul-join') @yield('nav-ul-volunteer') drop-down"><a href="{{ route('/join')}}">Get Involved</a>
            <ul>
              <li class="@yield('nav-ul-volunteer')"><a href="{{ route('/join')}}">Volunteer</a></li>
              <li class="@yield('nav-ul-donate')"><a href="{{ route('/donate')}}">Donate</a></li>
            </ul>
          </li>
          <li class="@yield('nav-ul-covid-center-locator') drop-down"><a href="#">COVID-19</a>
            <ul>
              <li class="@yield('nav-ul-covid-center-locator')"><a href="{{ route('covid-center-locator')}}">Vaccine Locator</a></li>
            </ul>
          </li>
          <li class="drop-down @yield('nav-ul-donate') @yield('nav-ul-download-donation-certificate')"><a href="{{ route('/donate')}}">Donate</a>
            <ul>
              <li class="@yield('nav-ul-donate')"><a href="{{ route('/donate')}}">Donate</a></li>
              <li class="@yield('nav-ul-download-donation-certificate')"><a href="{{ route('/donate/download')}}">Download Receipt/Certificate</a></li>
            </ul>
          </li>
        </ul>
      
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


    <!-- ======= Header ======= -->
    <header id="header" style="opacity: 0 !important; position: unset !important;" class="fixed-top dynamicHeader header" >
      <div class="container d-flex align-items-center">
  
      <h1 class="logo mr-auto"><a href="{{route('/')}}"><img src="{{asset('assets/img/logo_txt_black.png')}}" alt=""></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->
  
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="@yield('nav-ul-home')"><a href=" @if(isset($page) && $page != 'home') {{url('/')}} @endif #home">Home</a></li>
            <li class="@yield('nav-ul-projects')"><a href=" @if(isset($page) && $page != 'home') {{url('/')}} @endif #projects_section">Projects</a></li>
            <li class="@yield('nav-ul-team')"><a href=" @if(isset($page) && $page != 'home') {{url('/')}} @endif #meet_the_team_section">Team</a></li>
            <li class="@yield('nav-ul-about')"><a href=" @if(isset($page) && $page != 'home') {{url('/')}} @endif #about_us_section">About</a></li>
            <li class="@yield('nav-ul-gallery')"><a href="{{ route('/gallery')}}">Gallery</a></li>
            <li class="@yield('nav-ul-contact')"><a href="{{ route('/contact')}}">Contact</a></li>
            <li class="@yield('nav-ul-join') @yield('nav-ul-volunteer') drop-down"><a href="{{ route('/join')}}">Get Involved</a>
              <ul>
                <li class="@yield('nav-ul-volunteer')"><a href="{{ route('/join')}}">Volunteer</a></li>
                <li class="@yield('nav-ul-donate')"><a href="{{ route('/donate')}}">Donate</a></li>
              </ul>
            </li>
            <li class="@yield('nav-ul-covid-center-locator') drop-down"><a href="#">COVID-19</a>
              <ul>
                <li class="@yield('nav-ul-covid-center-locator')"><a href="{{ route('covid-center-locator')}}">Vaccine Locator</a></li>
              </ul>
            </li>
            <li class="drop-down @yield('nav-ul-donate') @yield('nav-ul-download-donation-certificate')"><a href="{{ route('/donate')}}">Donate</a>
              <ul>
                <li class="@yield('nav-ul-donate')"><a href="{{ route('/donate')}}">Donate</a></li>
                <li class="@yield('nav-ul-download-donation-certificate')"><a href="{{ route('/donate/download')}}">Download Receipt/Certificate</a></li>
              </ul>
            </li>
          </ul>
        
        </nav><!-- .nav-menu -->
  
      </div>
    </header><!-- End Header -->





<body>
    
  

@yield('content')




<!-- ======= Footer ======= -->
  <footer id="footer">
    
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Garib Pathshala<span>.</span></h3>
            <p>
              121/5E/1F Satin Sen Sarani <br>
              Kolkata, 700054 <br>
              West Bengal, India <br><br>
              <strong>Phone:</strong> +91 8902 984 277<br>
              <strong>Email:</strong> contact@garibpathshala.in<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="{{route('/')}}">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{route('/team')}}">Team</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('/about')}}">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('/projects')}}">Projects</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('/terms-of-use')}}">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('/privacy-policy')}}">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Quick Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('/donate')}}">Donate</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('/join')}}">Volunteer</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{env('DIRECTIONS_LINK')}}">Directions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{env('REVIEW_LINK')}}">Feedback</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('/contact')}}">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Who We Are</h4>
            <p>Garib Pathshala Welfare Foundation is an Educational as well as social organisation but its objective are versatile. It is trying to involve more and more people to strenght the organisation and serve the nation</p>
            <div class="social-links mt-3">
              <a href="{{ env('TWITTER_LINK')}}" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="{{ env('FACEBOOK_LINK')}}" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="{{ env('INSTAGRAM_LINK')}}" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="{{ env('WHATSAPP_LINK')}}" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
              <a href="{{ env('YOUTUBE_LINK')}}" class="youtube"><i class="bx bxl-youtube"></i></a>
            </div>
          </div>


        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Garib Pathshala Welfare Foundation</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Developed by <a href="mailto:aniket.das.in@gmail.com">Aniket Das</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <div id="preloader"></div>
</body>


  <!-- Vendor JS Files -->
  <script src="{{ asset('bizland/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('bizland/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('bizland/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('bizland/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('bizland/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('bizland/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{ asset('bizland/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('bizland/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('bizland/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{ asset('bizland/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('bizland/assets/js/main.js')}}"></script>

  @yield('bottom-includes')


  {{-- <script>
    $(document).ready(function () {
      cloneHeaderHeight();
    });
    $(document).on('scroll', function () {
      cloneHeaderHeight();
    });

    function cloneHeaderHeight() {
      var Headerheight = $('.dynamicTopbar').height() + $('.dynamicHeader').height() + 50;
      $('.headerBack').css('height', Headerheight)
    }
  </script> --}}

</html>