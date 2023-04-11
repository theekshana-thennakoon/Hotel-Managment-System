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

.mdl{background:#fff;width:22%;border-radius:18px;color:#fff;padding:1%;padding-top:5.5%;float:left;height:50%;margin-left:8.5%;border:1px solid #000;}

.mdl h2{font-size:18px;color:#000;}

table{width:98%;}

th,td{text-align:center;padding:1%;width:15%;}

tr:first-child th:first-child { border-top-left-radius: 1em;overflow: hidden;}

tr:first-child th:last-child { border-top-right-radius: 1em;overflow: hidden;}

th,td{text-align:center;padding:1%;width:15%;}

td{border:0.5px solid #1a2a43;}
th{background:#1a2a43;color:#fff;}

.del{background:#f00;padding:4%;color:#fff;border-radius:4px;border:1px solid #fff;}

.del:hover{color:#fff;text-decoration:none;}
.links a{padding:1.2%;padding-left:3%;padding-right:3%;background:#212529;color:#fff;}

.links a:hover{color:#fff;text-decoration:none;}
.edit{background:#0082e6;padding:4%;padding-left:10%;padding-right:10%;color:#fff;border-radius:4px;border:1px solid #fff;}
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

<?php

	$sqlc = "SELECT COUNT(id) as cou FROM employee";
	$resultc = $conn->query($sqlc);
	if ($resultc->num_rows > 0){
		while($rowc = $resultc->fetch_assoc()){
			$total_rows = $rowc['cou'];
		}
	}
	
	$rows_per_page = 3;
		
	if(isset($_GET['p'])){
		$page_no = $_GET['p'];
	}
	else{
		$page_no = 1;
	}
	$start = ($page_no - 1) * $rows_per_page;
	
	$sql = "SELECT * FROM employee where wod = 'work' limit {$start},{$rows_per_page}";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id = $row['id'];
			$nic = $row['nic'];
			$name = $row['name'];
			$phone = $row['phone'];
			$address = $row['address'];
			$jobtype = $row['jobtype'];
			
			echo "
				<div class = 'mdl'>
					<h2>{$name}</h2>
					<h2>{$nic}</h2>
					<h2>0{$phone}</h2>
					<h2>{$address}</h2>
					<h2>{$jobtype}</h2>
					<br>
					<a href = 'deleteemp.php?id=$id' class = 'del'>&#128500; Remove</a>
					 <a href = 'editemp.php?id=$id' class = 'edit'>&#128393; Edit</a>
				</div>
			";
		}
	}
	echo "<br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br>";
	$first = "<a href = 'emp.php?p=1'>First</a>";

	$last_page_no = ceil($total_rows / $rows_per_page);

	if($page_no >= $last_page_no){
		$next = "<a> <font color = red> >> </font></a>";
	}
	else{
		$next_page_no = $page_no + 1;
		$next = "<a href = 'emp.php?p={$next_page_no}'> >> </a>";
	}
	
	if($page_no <= 1){
		$previous = "<a> <font color = red> << </font></a>";
	}
	else{
		$previous_page_no = $page_no - 1;
		$previous = "<a href = 'emp.php?p={$previous_page_no}'> << </a>";
	}
		
	$last = "<a href = 'emp.php?p={$last_page_no}'>Last</a>";

	echo $first . ' | ' . $previous . ' | ' . $next. ' | ' . $last;
?>