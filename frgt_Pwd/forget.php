<?php
session_start();
?>
<?php
include('database.php');
?>
<?php
include('head.php');
?>
<html>
<head>
<style>
*{margin:0;padding:0;}

body{background:#0082e6;}

input{outline:none;font-size:20px;color:#fff;padding:2%;width:100%;margin-bottom:5px;}

input[type=text],input[type=email]{background:transparent;border:none;border-bottom:2px solid #fff;
margin-top:20px;margin-bottom:0px;text-align:center}

input[type=submit]{border:none;border:2px solid #fff;margin-top:20px;cursor:pointer;
background:#0082e6;width:104%;}

button{width:21%;padding:0.5%;background:#f00;color:#fff;
font-size:20px;border:none;border:2px solid #fff;cursor:pointer;}

form{width:20%;}

p{text-align:left; color:#fff;}
a{color:#fff; text-decoration:none;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>

<br><br><br>
<center>
<form action = "otp.php" method = "post">
<p>Username</p>
<input type = "text" name = "user"><br><br>
<p>Email Address</p>
<input type = "email" name = "email"><br><br>
<input type = "submit" name = "sendotp" value = "Send OTP">
</form>
<br>
<p style = "text-align:center;">I Already Have Account.!</p>
<a href = "index.php"><button>Login</button></a><br><br>