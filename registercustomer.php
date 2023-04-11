<?php
session_start();
?>
<?php
include('database.php');
?>

<html>
<head>
<link rel = 'stylesheet' type = 'text/css' href = 'css/bootstrap.min.css'>
<style>
*{margin:0;padding:0;}
body{background-image: url('dashboardw1.jpg');size: cover; repeat:no-repeat;}
h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;}

.form input{outline:none;font-size:22px;color:#000;padding:0.1%;width:90%;margin:10px;}

input[type=text],input[type=email]{padding-left:2%;background:transparent;font-size:20px;border:2px solid #1a2a43;}

.form select{background:#transparent;border:2px solid #1a2a43; color:#1a2a43;
	outline:none;font-size:22px;padding:0.1%;width:43%;margin:10px;padding-left:1%;
}
input[type=date]{padding-left:2%;background:transparent;border:2px solid #1a2a43; color:#1a2a43;width:42.5%;margin:10px;}

input[type=submit]{border:none;border:2px solid #f00;margin-top:5px;cursor:pointer;
	background:#1a2a43;color:#fff;border-radius:50px;padding:1%;
}

.form p{float:left;font-size:16px;margin-left:5%;margin-bottom:-5px;font-weight:bold;color:#1a2a43;}
.form{width:60%;margin-top:90px;}
.form form{width:100%;}
.form form input{background-color: #fff;}
::-webkit-input-placeholder{color:#000;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
<script src="sweetalert.min.js"></script>
<center>
<h1>Register New Customer</h1>
<div class = 'form'>
<form action = "registercustomer.php" method = "post">
<p></p>
<input type = "text" name = "name" placeholder = 'Full Name'>
<p></p>
<input type = "text" name = "nic" placeholder = 'NIC'>
<p></p>
<input type = "text" name = "phone" placeholder = 'Contact Number'>
<p></p>
<input type = "text" name = "address" placeholder = 'Address'>
<br>
<input type = "email" name = "email" placeholder = 'EmailAddress'>
<input type = "submit" name = "register" value = "Register" style="background: #1a2a43;">
</form>
</div>
<?php
if(isset($_POST['register'])){
	$name = $_POST['name'];
	$nic = $_POST['nic'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	
	$sqli = "insert into customers(name,nic,phone,address,email) values('$name','$nic',$phone,'$address','$email')";
	if($conn->query($sqli) === TRUE){
		echo "<script>
        swal({
          title: 'Register Success!',
          text: 'Successfully Registerd',
          icon: 'success',
        });
        </script>";
	}
	else{
		echo "error<br><br>" . $sqli . "<br>" . $conn->error;
	}
}

?>