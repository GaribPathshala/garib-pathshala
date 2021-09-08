<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donation History</title>
  <style>
  html{
    background-color: #c7c7c7;
  }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
  padding-top: 20px;
  padding-bottom: 20px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.btn-warning,.btn-success{
  display: block;
  width: 100%;
  height: 30px;
  text-decoration: none;
  border-radius: 5px;
  color: black;
  text-align: center;
}
.btn-warning{
  background-color: #fca103;
}
.btn-success{
  background-color: #00bd03;
}
</style>
</head>
<body style="width: 768px; margin-left: auto; margin-right: auto; background-color: white;">

<br>
<h1 style="color: grey; font-weight: 700; text-align: center;">Donation History</h1>
<br>

<table style="text-align: center; width: 90%">
  <thead>
    <tr>
      <th scope="col">Donation ID</th>
      <th scope="col">Date & Time</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
@foreach($DonationHistory as $DonationHistory)
    <tr>
    <td>{{ $DonationHistory['donation_id'] }}</td>
    <td>{{ $DonationHistory['txn_date'] }}</td>
    <td>{{ $DonationHistory['amount'] }} {{ $DonationHistory['currency'] }}</td>
    <td><a class="btn-warning" href="{{ config('app.url', '') }}/donate/download/acknowledgement/{{$DonationHistory['donation_id']}}/{{$DonationHistory['download_key']}}" target="_blank"><b>Receipt</b></a><br><a class="btn-success" href="{{ config('app.url', '') }}/donate/download/certificate/{{$DonationHistory['donation_id']}}/{{$DonationHistory['download_key']}}" target="_blank"><b><i class="fa fa-download" aria-hidden="true"></i>Certificate</b></a></td>
    </tr>
@endforeach
  </tbody>
</table>

<br><br><br><br>
<p style="text-align: left; font-weight: 700;">Regards,</p>
<p style="text-align: left;">Team Garib Pathshala<br>121/5E/1F Satin Sen Sarani, Kolkata<br>West Bengal, 700054, IN<br>Telephone: <a href="tel:+918902984277">+91 8902 984 277</a> | <a href="mailto:contact@garibpathshala.in"></a>contact@garibpathshala.in</p>
  
</body>
</html>


































