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

input{outline:none;font-size:22px;color:#000;padding:0.5%;width:45%;margin:10px;}

input[type=text]{background:#fff;;border:2px solid #212529;}

select{background:#transparent;border:2px solid #1a2a43; color:#000;
	outline:none;font-size:22px;padding:0.5%;width:45%;margin:10px;
}

input[type=submit]{border:none;border:2px solid #f00;margin-top:5px;cursor:pointer;
	background:#212529;width:92%;color:#fff;
}

.form{width:50%;float:left;}

form{width:100%;margin-top:30%;}

::-webkit-input-placeholder{color:#000;}
.table{width:48%;float:right;margin-right:15px;}

.table table{width:100%;}

th,td{text-align:center;}

th{background:#212529;color:#fff;}
td{background:#fff;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<body>
<h1>Pay Salary</h1>
<div class = 'table'>
<table border = '1'>
<tr>
<th>NIC</th>
<th>Full Name</th>
<th>Salary</th>
</tr>
<?php
	$sql = "SELECT * FROM employee where wod = 'work'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$name = $row['name'];
			$nic = $row['nic'];
			$salary = $row['salary'];
			echo "<tr>";
			echo "<td>" . $nic . "</td>" . "<td>" . $name . "</td>" . "<td>" . $salary . "</td>";
			echo "</tr>";
		}
	}
?>
</table>
</div>
<div class = 'form'>
<center><form action = 'paysalary.php' method = 'post'>

<select name = 'nic'>
<option value = '0'>Select Employee</option>

<?php
	$sql = "SELECT * FROM employee where wod = 'work'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id = $row['id'];
			$nic = $row['nic'];
			//$name = $row['name'];
			$salary = $row['salary'];
			echo "<option value = $nic>" . $nic . "</option>";
		}
	}
?>
</select>
<input type = 'text' name = 'salary'  placeholder = 'Salary'>
<br><br><br>

<input type = 'submit' name = 'pay' value = 'Pay'>
</form>
</div>
<?php
if (isset($_POST['pay'])){
	$date = date("Y-m-d");
	$month = date("Y-m");
	$nic = $_POST['nic'];
	$salary = $_POST['salary'];
	$sqli = "insert into salary values('$nic',$salary,'$date','$month')";
	if($conn->query($sqli) === TRUE){
		header('location:paysalary.php');
	}
}

?>