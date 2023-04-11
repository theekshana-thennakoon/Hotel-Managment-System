<?php
include('database.php');
?>
<html>
<head>
<link rel = 'stylesheet' type = 'text/css' href = 'css/bootstrap.min.css'>
<style>
*{margin:0;padding:0;}

h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;}
body{background-image: url('dashboardw1.jpg');size: cover; repeat:no-repeat;}
.form input{outline:none;font-size:22px;color:#000;padding:0.5%;width:90%;margin:10px;}

input[type=text],input[type=password]{padding-left:2%;background:#fff;;font-size:20px;border:2px solid #212529;}

.form select{background:#transparent;border:2px solid #212529; color:#000;
	outline:none;font-size:22px;padding:0.5%;width:90%;margin:10px;
}
input[type=submit]{border:none;border:2px solid #f00;margin-top:5px;cursor:pointer;
	background:#212529;width:92%;color:#fff;border-radius:50px;
}
.form p{float:left;font-size:16px;margin-left:5%;margin-bottom:-5px;font-weight:bold;color:#1a2a43;}
.form{width:60%;margin-top:4%;}
.form form{width:100%;}
::-webkit-input-placeholder{color:#000;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<body>
<h1>Register New Employee</h1>

<center>
<div class = 'form'>
<form action = 'addEmployee.php' method = 'post'>
<p>NIC No</p>
<input type = 'text' name = 'nicemp' placeholder = 'Nic Number'>
<p>Name</p>
<input type = 'text' name = 'nameemp' placeholder = 'Name'>
<p>Phone</p>
<input type = 'text' name = 'phoneemp' placeholder = 'Phone Number'>
<p>Address</p>
<input type = 'text' name = 'addressemp'  placeholder = 'Address'>
<select name = 'jobemp'>
<option value = '0'>Select Job</option>
<option value = 'Hotel Housekeaper'>Hotel Housekeaper</option>
<option value = 'Room Attendent'>Room Attendent</option>
<option value = 'Night Auditor'>Night Auditor</option>
<option value = 'Front Desk Receptionist'>Front Desk Receptionist</option>
<option value = 'Hotel Maintance Engineer'>Hotel Maintance Engineer</option>
<option value = 'Housingkeeiping Manager'>Housingkeeiping Manager</option>
<option value = 'Hotel Sales Manager'>Hotel Sales Manager</option>
<option value = 'Hotel Manager'>Hotel Manager</option>
<option value = 'Resort Manager'>Resort Manager</option>
</select><br>

<input type = 'submit' name = 'insert' value = 'Register'>
</form>
</div>
<?php
if (isset($_POST['insert'])){
	$nic = $_POST['nicemp'];
	$name = $_POST['nameemp'];
	$phone = $_POST['phoneemp'];
	$address = $_POST['addressemp'];
	$jobtype = $_POST['jobemp'];
	
	if ($jobtype == 'Hotel Housekeaper'){
		$salary = 25000;
	}
	
	if ($jobtype == 'Room Attendent'){
		$salary = 25000;
	}
	
	if ($jobtype == 'Night Auditor'){
		$salary = 35000;
	}
	
	if ($jobtype == 'Front Desk Receptionist'){
		$salary = 25000;
	}
	
	if ($jobtype == 'Hotel Maintance Engineer'){
		$salary = 45000;
	}
	
	if ($jobtype == 'Housingkeeiping Manager'){
		$salary = 50000;
	}
	
	if ($jobtype == 'Hotel Sales Manager'){
		$salary = 55000;
	}
	
	if ($jobtype == 'Hotel Manager'){
		$salary = 80000;
	}
	
	if ($jobtype == 'Resort Manager'){
		$salary = 75000;
	}
	
	//$salary = $_POST['salaryemp'];
	$wod = 'work';
	
	$sqli = "insert into employee(nic,name,phone,address,jobtype,salary,wod) values('$nic','$name',$phone,'$address','$jobtype',$salary,'$wod')";
	if($conn->query($sqli) === TRUE){
		header('location:emp.php');
	}
	else{
		echo "error<br><br>" . $sqli . "<br>" . $conn->error;
	}
}

?>