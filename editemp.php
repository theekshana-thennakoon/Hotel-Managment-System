<?php
include('database.php');
?>
<html>
<head>
<link rel = 'stylesheet' type = 'text/css' href = 'css/bootstrap.min.css'>
<style>
*{margin:0;padding:0;}

body{
	/* background:rgba(0,0,0,0.05);
	background-blend-mode:darken; */
}

h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;}

input{outline:none;font-size:22px;color:#000;padding:0.5%;width:45%;margin:10px;}

input[type=text],input[type=password]{background:transparent;border:2px solid #212529;}

select{background:#transparent;border:2px solid #212529; color:#000;
	outline:none;font-size:22px;padding:0.5%;width:45%;margin:10px;
}

input[type=submit]{border:none;border:2px solid #f00;margin-top:5px;cursor:pointer;
	background:#212529;width:92%;color:#fff;
}

form{width:100%;margin-top:10%;}
::-webkit-input-placeholder{color:#000;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<body>
<h1>Update Employee Details</h1>
<?php
	$id = $_GET['id'];
	$sql = "SELECT * FROM employee where id = $id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$nic = $row['nic'];
			$name = $row['name'];
			$phone = $row['phone'];
			$address = $row['address'];
			$jobtype = $row['jobtype'];
			$salary = $row['salary'];
		}
	}

?>
<center><form action = 'x.php' method = 'post'>

<input type = 'text' name = 'nicemp' value = <?php echo $nic ?> >
<input type = 'text' name = 'nameemp' value = <?php echo $name ?> ><br><br>
<input type = 'hidden' name = 'id' value = <?php echo $id ?> >

<input type = 'text' name = 'phoneemp' value = <?php echo $phone ?> >
<input type = 'text' name = 'addressemp' value = <?php echo $address ?> ><br><br>
<select name = 'jobemp'>
<option value = <?php echo $jobtype ?> > <?php echo $jobtype ?> </option>
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
<input type = 'text' name = 'salaryemp' value = <?php echo $salary ?> >
</select><br><br><br>

<input type = 'submit' name = 'update' value = 'Update'>
</form>
