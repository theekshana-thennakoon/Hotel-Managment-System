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

.btn{
	float:left;
	width:20%;
	height:100vh;
	background:#212529;
}
.btn h1{
	text-align:center;
	color:#fff;
	font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
	margin-top:20px;
	margin-bottom:15px;
}

.btn form{
	width:100%;
	height:100%
	margin:5px;
}
.btn form img{width:50px;}
.btn form input{
	display-block;
	width:75%;
	padding:3.5%;
	margin-bottom:7%;
	background:#212529;
	border:none;
	border:2px solid #fff;
	color:#fff;
	font-size:18px;
	border-radius:6px;
	cursor:pointer;
}
.btn form input:hover{
	background:#1f0147;
	width:80%;
	padding:3.2%;
	border:2px solid #fff;
	color:#fff;
}
.output{
	float:right;
	width:80%;
	height:95.7%;
	//background:#9900cf;
	padding-top:2%;
}
.output iframe{
	width:100%;
}
</style>

<title>Welcome</title>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
<div class = 'btn'>

<h1>Four Season</h1>
<center>
<form action = 'homepage.php' method = 'post'>
<br>

	<input type = 'submit' name = 'dashboard' id = 'dashboard' value = '&#9883; Dashboard'><br>
	<input type = 'submit' name = 'booking' id = 'booking' value = '&#128393;  Booking'><br>
	<input type = 'submit' name = 'record' id = 'record' value = '&#128449;  Booked Records'><br>
	<?php
		if ($_SESSION['username'] == 'admin'){
			echo "<input type = 'submit' name = 'employee' id = 'employee' value = '&#128822  Staff'><br>";
		}
	?>
	<input type = 'submit' name = 'income' id = 'income' value = '&#36;  Finance'><br>
	<input type = 'submit' name = 'resturent' id = 'resturent' value = '&#127869;  luncheonette'><br>
	<input type = 'submit' name = 'terminate' id = 'terminate' value = '&#128427;  Previous'><br>
	<input type = 'submit' name = 'newcust' id = 'newcust' value = '&#8889;  New Customer'><br>
</form>
</div>

<?php

if(isset($_POST['dashboard'])){
	echo "<iframe src='dashboard.php' style = 'width:80%;height:103vh;outline:none;border:none;'></iframe>";
}

else if(isset($_POST['booking'])){
	echo "<iframe src='booking.php' style = 'width:80%;height:110vh;outline:none;border:none;'></iframe>";
}

else if(isset($_POST['record'])){
	echo "<iframe src='records.php' style = 'width:80%;height:100vh;outline:none;border:none;'></iframe>";
}

else if(isset($_POST['employee'])){
	echo "<iframe src='emp.php' style = 'width:80%;height:105vh;outline:none;border:none;'></iframe>";
}

else if(isset($_POST['income'])){
	echo "<iframe src='income.php' style = 'width:80%;height:107vh;outline:none;border:none;'></iframe>";
}

else if(isset($_POST['resturent'])){
	echo "<iframe src='resturent.php' style = 'width:80%;height:100vh;outline:none;border:none;'></iframe>";
}

else if(isset($_POST['terminate'])){
	echo "<iframe src='terminate.php' style = 'width:80%;height:101vh;outline:none;border:none;'></iframe>";
}

else if(isset($_POST['newcust'])){
	echo "<iframe src='registercustomer.php' style = 'width:80%;height:101vh;outline:none;border:none;'></iframe>";
}

else{
	echo "<iframe src='dashboard.php' style = 'width:80%;height:103vh;outline:none;border:none;'></iframe>";
}
?>
<script src = 'script.js'></script>
</body>