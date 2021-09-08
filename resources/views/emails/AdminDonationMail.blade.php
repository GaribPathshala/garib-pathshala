<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message From Garib Pathshala</title>
    <style>
        html, body{
            line-height: 5px;
        }
        p{
        }
    </style>
</head>
<body>
    
<p>Hi <strong>{{$req->donor_name}},</strong></p>
<p>This mail is regarding your donation <strong>{{$req->donation_id}}</strong> on
<br>
Garib Pathshala Welfare Foundation</p>

<p style="white-space: pre-wrap;">{!!$req->MailBody!!}</p>

<p><br><br><strong>Regards,</strong></p>

<p>
    {{Auth()->User()->name}}<br>
    Garib Pathshala<br>
    121/5E/1F Satin Sen Sarani, Kolkata<br>
    West Bengal, 700054, IN<br>
    Telephone: <a href="tel:+918902984277">+91 8902 984 277</a> | <a href="mailto:contact@garibpathshala.in">contact@garibpathshala.in</a> 
</p>

</body>
</html>
