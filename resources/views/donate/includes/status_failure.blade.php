
<div class="status_container" style="margin-left: auto; margin-right: auto; margin-bottom: 8%;">
        <img src="{{ asset('assets/img/txn_failed.png') }}" alt="Thank You!" style="width: 100%;"> 
        <h1 style="color: #d82213; font-weight: 700; text-align: center;">Oops...</h1> 
        <h3 style="color: grey; font-weight: 700; text-align: center;">Dear, <font color="#474747">{{ $db['donor_name'] }}</font></h3> 
        <h4 style="color: grey; font-weight: 700; text-align: center;">Your Donation Of <font color="#474747">{{ $db['amount'] . ' ' . $db['currency'] }}</font></h4> 
        <h4 style="color: grey; font-weight: 700; text-align: center;">Could Not Be Processed.</h4><br>
        <h4 style="color: grey; font-weight: 700; text-align: center;">Your Donation ID</h4>
        <h4 style="color: grey; font-weight: 700; text-align: center;"><font color="#474747">{{ $db['donation_id'] }}</font></h4>
        <br>
        <p style="color: grey; font-weight: 700; text-align: center; font-size: 20px;">As per the information received from the payment gateway,<br>we haven't received your donation.<br>If any amount got deducted from your account please raise your query at <a href="https://contact.garibpathshala.in" target="_blank">contact.garibpathshala.in</a></p>

        <p style="color: grey; font-weight: 600; text-align: center; font-size: 17px;">We'll look into that matter at the earliest.<br>Sorry for the inconvenience.</p>


        <a style="width: 100%;" class="btn btn-danger" href="{{ route('/donate')}}"><i class="fa fa-home" aria-hidden="true"></i></i> Return</a>
             
    </div>