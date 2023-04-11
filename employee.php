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

h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;}

.links a{padding:1.2%;padding-left:3%;padding-right:3%;background:#1a2a43;color:#fff;}

.links a:hover{color:#fff;text-decoration:none;}

table{width:98%;}

th,td{text-align:center;padding:1%;width:15%;}

tr:first-child th:first-child { border-top-left-radius: 1em;overflow: hidden;}

tr:first-child th:last-child { border-top-right-radius: 1em;overflow: hidden;}

th,td{text-align:center;padding:1%;width:15%;}

td{border:0.5px solid #1a2a43;}
th{background:#1a2a43;color:#fff;}

.del{background:#f00;padding:4%;color:#fff;border-radius:4px;}

.del:hover{color:#fff;text-decoration:none;}

.edit{background:#0082e6;padding:7%;padding-left:12%;padding-right:12%;color:#fff;border-radius:4px;}
.edit:hover{color:#fff;text-decoration:none;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
<center>
<h1>Employees</h1>
<br><br>
<div class = 'links'>
<a href = 'addEmployee.php'>Add New Employee</a>
<a href = 'paysalary.php'>Pay Salary</a>
</div>
<br><br><br>
<table>
<tr>
<th>NIC</th>
<th>Full Name</th>
<th>Phone</th>
<th>Address</th>
<th>Job Type</th>
<th colspan = '2'>Action</th>
</tr>
<?php
	$sql = "SELECT * FROM employee where wod = 'work'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id = $row['id'];
			$nic = $row['nic'];
			$name = $row['name'];
			$phone = $row['phone'];
			$address = $row['address'];
			$jobtype = $row['jobtype'];
			echo "<tr>";
			echo "<td>" . $nic . "</td>" . "<td>" . $name . "</td>" . "<td>0" . $phone . "</td>" . "<td>" . $address . "</td>" . "<td>" . $jobtype . "</td>" . "<td> <a href = 'deleteemp.php?id=$id' class = 'del'>&#128500; delete</a>" . "</td>" . "<td> <a href = 'editemp.php?id=$id' class = 'edit'>&#128393; Edit</a>" . "</td>";
			echo "</tr>";
		}
	}
?>