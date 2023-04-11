<?php
session_start();
?>
<?php
include('database.php');
?>
<html>
<head>
<style>
*{margin:0;padding:0;}

body{background:#0082e6;}

.head h2{color:#fff;text-align:center;margin-top:15px;}

.footer h3{color:#fff;text-align:center;margin-top:15px;}

.word h1{color:#fff;text-align:center;margin-top:15px;letter-spacing: 8px;}

input{outline:none;font-size:20px;color:#fff;padding:2%;width:100%;margin-bottom:5px;}

input[type=text],input[type=email]{background:transparent;border:none;border-bottom:2px solid #fff;
margin-top:20px;margin-bottom:0px;text-align:center}

input[type=submit]{border:none;border:2px solid #fff;margin-top:20px;cursor:pointer;
background:#0082e6;}

button{width:80%;padding:2%;background:#f00;color:#fff;
font-size:20px;border:none;border:2px solid #fff;cursor:pointer;}

form{width:80%;}

p{text-align:left; color:#fff;}
a{color:#fff; text-decoration:none;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
<div class = "head">
<h2>T Word Game</h2>
<h2>Confirm OTP</h2>
</div>
<br>
<hr><br><br>
<center>
<form action = "confirmotp.php" method = "post">
<p>Enter OTP</p>
<input type = "text" name = "otp"><br><br>
<input type = "submit" name = "confirm" value = "Confirm OTP">
</form>
<br>
<p style = "text-align:center;">I Already Have Account.!</p>
<a href = "index.php"><button>Login</button></a><br><br>

<?php
if(isset($_POST['confirm'])){
	$eotp = $_POST['otp'];
	$secotp = $_SESSION['secotp'];
	$user = $_SESSION['user'];
	if($eotp ==$secotp){
		
		echo "<form action = 'otp.php' method = 'post'>
				<p>Password</p>
				<input type = 'password' name = 'password'><br><br>
				<p>Re Enter Password</p>
				<input type = 'password' name = 'rpassword'><br><br>
				<input type = 'submit' name = 'setpwd' value = 'Send OTP'>
			</form>";
		
		if(isset($_POST['setpwd'])){
			$sqlu = "Update register set password = $password where user = '$user'";
			if($conn->query($sqlu) === TRUE){
				header('location:homepage.php');
			}
		}
	}
	else{
		header('location:forget.php');
	}
}
?>