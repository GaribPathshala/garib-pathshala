<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
*{
    padding: 0;
    margin: 0;
}
.invoice_table{
    width: 80%;
    margin: auto;
    margin-top: 30px;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 5px;
    text-align: left;
  }
.invoice_table{
    border-collapse:collapse; 
}
.invoice_table td{ 
    padding:7px; border:grey 2px solid;
}
.invoice_table th{ 
    padding:7px; border:grey 2px solid;
}
.invoice_table tr{
    background: grey;
}
.invoice_table tr:nth-child(odd){ 
    background: #eeeeee;
}
.invoice_table tr:nth-child(even){
    background: #ffffff;
}
.invoice_footer_ty{
    text-align: center;
    margin-top: 30px;
    font-weight: 700;
}
.invoice_footer{
    margin-top: 50px;
    width: 70%;
    margin-left: auto;
    margin-right: auto;
}
</style>
</head>



<title>Invoice</title>

<body>
    <div class="container">
        <br>
        <h3 style="text-align: center;">Donation Acknowledgement</h3><br>
        <div class="row justify-content-between" style="margin-left: 30px;">
                <div class="col-6" style="text-align: center;  float: left;">
                    <div class="alert alert-dark" role="alert">
                        <b>Organization Details</b>
                    </div>
                    <p style="text-align: left;"><b>GARIB PATHSHALA WELFARE FOUNDATION</b><br>
                        121/5E/1F Satin Sen Sarani,<br>
                        Kolkata, West Bengal, 700054, IN<br>
                        <a href="tel:+918902984277">+91 8902-984-277</a><br>
                        <a href="mailto:+contact@garibpathshala.in">contact@garibpathshala.in</a>                    
                  </p>

                </div>

                <div class="col-6" style="text-align: center; float: right;">
                 <img src="assets/img/qr.png" alt="">
                 <a href="https://donate.garibpathshala.in">donate.garibpathshala.in</a>
                </div>
        </div>
    </div>

    <table class="invoice_table" style="margin-top: 250px;">
            <tr>
                <th>Name</th>
                <td>{{ $donor_name ?? $db->donor_name }}</td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td>{{ $mobile_number ?? $db->mobile_number }}</td>
            </tr>
            <tr>
                <th>Email ID</th>
                <td>{{ $email_id ?? $db->email_id }}</td>
            </tr>
            <tr>
                <th>Donation ID</th>
                <td>{{ $donation_id ?? $db->donation_id }}</td>
            </tr>
            <tr>
                <th>Donation Amount</th>
                <td>{{ $amount ?? $db->amount }} {{ $currency ?? $db->currency }}</td>
            </tr>
            <tr>
                <th>Bank Name</th>
                <td>{{ $bank_name ?? $db->bank_name }}</td>
            </tr>
            <tr>
                <th>Bank RRN</th>
                <td>{{ $bank_txn_id ?? $db->bank_txn_id }}</td>
            </tr>
            <tr>
                <th>Gateway Name</th>
                <td>{{ $gateway_name ?? $db->gateway_name }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $txn_status ?? $db->txn_status }}</td>
            </tr>
            <tr>
                <th>Date & Time</th>
                <td>{{ $txn_date ?? $db->txn_date }}</td>
            </tr>
            <tr>
                <th>TXN ID</th>
                <td>{{ $txn_id ?? $db->txn_id }}</td>
            </tr>
        </table>



<h2 class="invoice_footer_ty">Thank You!</h2>


<div class="invoice_footer">
    <ul>
        <li>This is a computer generated acknowledgement and doesn't require any physical certificate.</li>
        <li>You'll receive your donation certificate in your given email id.</li>
        <li>If you have any query please raise your query at <a href="https://contact.garibpathshala.in">contact.garibpathshala.in</a>.</li>
    </ul>
</div>


</body>

</html>