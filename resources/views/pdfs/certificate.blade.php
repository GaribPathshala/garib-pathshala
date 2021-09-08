<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
*{
    margin: 0;
    padding: 0;
}
body{
    background-image: url("assets/img/certificate-bg.png");
    background-repeat: no-repeat;
    background-size: cover;
    letter-spacing: 2px;
}
.container1{
    text-align: center;
    margin-top: 200px;
}
.container1 h2{
    color: rgb(82, 82, 82);
}
.container2{
    margin-top: 110px;
    text-align: center;
}
.container2 h1{
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 50px;
    letter-spacing: 7px;
    color: rgb(82, 82, 82);

}
</style>
</head>
<body>

<div class="container1">
    <p>On Behalf of</p>
    <h2>Garib Pathshala Welfare Foundation</h2>
</div>
<div class="container2">
    <p>This Certificate is Awarded To</p>
    <h1>{{ $db['donor_name'] ?? $donor_name }}</h1>
    <p style="line-height: 30px;">In recognition of donating {{ $db['amount'] ?? $amount }} {{ $db['currency'] ?? $currency }}<br>to help Garib Pathshala Welfare Foundation in upcoming projects</p>
</div>
</body>
</html>





