<?php
include('database.php');
?>

<html>
<head>
<link rel = 'stylesheet' type = 'text/css' href = 'css/bootstrap.min.css'>
<style>
*{margin:0;padding:0;}
h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;}
input{outline:none;font-size:22px;color:#000;padding:0.5%;width:100%;margin:10px;}
body{background-image: url('dashboardw1.jpg');size: cover; repeat:no-repeat;}
input[type=text],input[type=password]{background:#fff;border:2px solid #212529;}

input[type=submit]{border:none;border:1px solid #f00;margin-top:5px;cursor:pointer;
	background:#212529;width:60%;color:#fff;border-radius:50px;
}

form{width:45%;margin-top:15%;}
::-webkit-input-placeholder{color:#212529;}

</style>

<title>Welcome</title>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
<h1>Enter Cost</h1>
<center><form action = 'cost.php' method = 'post'>
<input type = 'text' name = 'reason' placeholder = 'Reason'><br><br>
<input type = 'text' name = 'price' placeholder = 'Cost'>
<br><br>
<input type = 'submit' name = 'cost' value = 'Enter Cost '>
</form>
<?php
$date = date("Y-m-d");
$month = date("Y-m");

if (isset($_POST['cost'])){
	$reason = $_POST['reason'];
	$price = $_POST['price'];
	$sqli = "insert into cost values('$reason',$price,'$date','$month')";
	if($conn->query($sqli) === TRUE){
		//header('location:employee.php');
	}
	else{
		echo "error<br><br>" . $sqli . "<br>" . $conn->error;
	}
}
?>