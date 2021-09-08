
<div class="status_container" style="margin-left: auto; margin-right: auto; margin-bottom: 8%;">
        <img src="{{ asset('assets/img/thank-you.png') }}" alt="Thank You!" style="width: 100%;"> 
        <h1 style="color: green; font-weight: 700; text-align: center;">Donation Successful</h1> 
        <h3 style="color: grey; font-weight: 700; text-align: center;">Thank You!<br></h3> 
        <h3 style="color: grey; font-weight: 700; text-align: center;"><font color="#474747">{{ $db['donor_name'] }}</font></h3> 
        <h4 style="color: grey; font-weight: 700; text-align: center;">For Donating <font color="#474747">{{ $db['amount'] . ' ' . $db['currency'] }}</font></h4> 
        <h4 style="color: grey; font-weight: 700; text-align: center;">To Garib Pathshala Welfare Foundation</h4><br>
        <h4 style="color: grey; font-weight: 700; text-align: center;">Your Donation ID</h4>
        <h4 style="color: grey; font-weight: 700; text-align: center;"><font color="#474747">{{ $db['donation_id'] }}</font></h4>
        <br>
        <p style="color: grey; font-weight: 700; text-align: center; font-size: 20px;">Your Donation Will Help Thoose Who Really Needs & We Assure That Your Hard Earned Money Goes To The Right People.</p>

        <p style="color: grey; font-weight: 600; text-align: center; font-size: 17px;">You'll also recive a email from us at your given email id.</p>


        <ul class="social-network social-circle">
          <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#" class="icoWhatsapp" title="Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></i></a></li>
        </ul>
        <p style="color: grey; font-weight: 600; text-align: center; font-size: 17px; margin-top: 8px;">Share on Social Media</p>

        <a style="width: 59%;" class="btn btn-success" href="{{ env('APP_URL') }}/donate/download/acknowledgement/{{  $db['donation_id'] }}/{{  $db['download_key'] }}"><i class="fa fa-download" aria-hidden="true"></i> Acknowledgement</button>
        <a style="width: 39%;" class="btn btn-warning" href="{{ env('APP_URL') }}/donate/download/certificate/{{  $db['donation_id'] }}/{{  $db['download_key'] }}"><i class="fa fa-file-text" aria-hidden="true"></i></i> Certificate</a>

    </div>