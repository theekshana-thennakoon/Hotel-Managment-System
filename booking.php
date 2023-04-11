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

input[type=text],input[type=password]{padding-left:2%;background:transparent;font-size:20px;border:2px solid #1a2a43;}

.form select{background:#transparent;border:2px solid #1a2a43; color:#1a2a43;
	outline:none;font-size:22px;padding:0.1%;width:43%;margin:10px;padding-left:1%;
}
input[type=date]{padding-left:2%;background:transparent;border:2px solid #1a2a43; color:#1a2a43;width:42.5%;margin:10px;}

input[type=submit]{border:none;border:2px solid #f00;margin-top:5px;cursor:pointer;
	background:#1a2a43;color:#fff;border-radius:50px;padding:1%;
}

.form p{float:left;font-size:16px;margin-left:5%;margin-bottom:-5px;font-weight:bold;color:#1a2a43;}
.form{width:60%;margin-top:20px;}
.form form{width:100%;}
.form form input{background-color: #fff;}
::-webkit-input-placeholder{color:#000;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
<center>
<h1>Book Your Room</h1>
<div class = 'form'>
<form action = "booking.php" method = "post">
<p></p>
<input type = "text" name = "name" placeholder = 'Full Name'>
<p></p>
<input type = "text" name = "nic" placeholder = 'NIC'>
<p></p>
<input type = "text" name = "phone" placeholder = 'Contact Number'>
<p></p>
<input type = "text" name = "address" placeholder = 'Address'>
<select name = 'rno'>
<option value = '0'>Room Number</option>
<option value = '1'>Room 1</option>
<option value = '2'>Room 2</option>
<option value = '3'>Room 3</option>
<option value = '4'>Upper Room 1</option>
<option value = '5'>Upper Room 2</option>
</select>
<select name = 'ac'>
<option value = '0'>A/C Facility</option>
<option value = '1'>A/C</option>
<option value = '2'>None A/C</option>
</select>
<br>
<input type = "date" name = "cdate">
<input type = "date" name = "gdate">

<input type = "text" name = "advance" placeholder = 'Advace or Full Payment'>
<input type = "submit" name = "book" value = "Book" style="background: #1a2a43;">
</form>
</div>
<?php
if(isset($_POST['book'])){
	$name = $_POST['name'];
	$nic = $_POST['nic'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$rno = $_POST['rno'];
	$ac = $_POST['ac'];
	$cdate = $_POST['cdate'];
	$gdate = $_POST['gdate'];
	$month = date("Y-m");
	
	$perioddate = strtotime($gdate) - strtotime($cdate);
	$period = floor($perioddate/(60*60*24));
	$period = $period + 1;
	
	if($ac == 1){
		$payment = $period * 3000;
	}
	else{
		$payment = $period * 1500;
	}
	$advance = $_POST['advance'];
	
	$sqli = "insert into book(name,nic,phone,address,rno,cdate,gdate,month,period,payment,advance) values('$name','$nic',$phone,'$address',$rno,'$cdate','$gdate','$month',$period,$payment,$advance)";
	if($conn->query($sqli) === TRUE){
		header('location:booking.php');
	}
	else{
		echo "error<br><br>" . $sqli . "<br>" . $conn->error;
	}
}

?>