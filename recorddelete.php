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

h1{color:#fff;text-align:center;padding:1%;background:#223a5e;width:100%;}

input{outline:none;font-size:22px;color:#000;padding:0.5%;width:45%;margin:10px;}

input[type=text],input[type=password]{background:transparent;border:2px solid #223a5e;}

select{background:#transparent;border:2px solid #223a5e; color:#000;
	outline:none;font-size:22px;padding:0.5%;width:45%;margin:10px;
}

input[type=submit]{border:none;border:2px solid #f00;margin-top:5px;cursor:pointer;
	background:#223a5e;width:92%;color:#fff;
}

form{width:50%;}
::-webkit-input-placeholder{color:#000;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<body>
<h1>Pay Your Balance</h1>
<?php
	$id = $_GET['id'];
	$gmonth = date("Y-m");
	$sql = "SELECT * FROM book where id = $id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$nic = $row['nic'];
			$name = $row['name'];
			$phone = $row['phone'];
			$address = $row['address'];
			$rno = $row['rno'];
			$cdate = $row['cdate'];
			$gdate = $row['gdate'];
			$month = $row['month'];
			$period = $row['period'];
			$payment = $row['payment'];
			$advance = $row['advance'];
		}
		$bal = $payment - $advance;
		if ($bal == 0){
			$balance = 0;
			
			$sqli = "insert into terminate values($id,'$name','$nic',$phone,'$address',$rno,'$cdate','$gdate','$month',$period,$balance,'$gmonth')";
			if($conn->query($sqli) === TRUE){
				$sqld = "Delete From book where id = $id";
				if($conn->query($sqld) === TRUE){
					header('location:terminate.php');
				}
			}
			else{
				echo "error<br><br>" . $sqli . "<br>" . $conn->error;
			}
		}
		else{
			$balance = $bal;
			echo "<br><br><br><br><br><br><center>
			<form action = 'recorddeleteprocess.php' method = 'post'>
			<h2> You Want to Pay Rs. " . $balance. " /=</h2>";
			echo "<input type = 'hidden' name = 'nic' value = $nic>";
			echo "<input type = 'hidden' name = 'name' value = $name>";
			echo "<input type = 'hidden' name = 'phone' value = $phone>";
			echo "<input type = 'hidden' name = 'address' value = $address>";
			echo "<input type = 'hidden' name = 'rno' value = $rno>";
			echo "<input type = 'hidden' name = 'cdate' value = $cdate>";
			echo "<input type = 'hidden' name = 'gdate' value = $gdate>";
			echo "<input type = 'hidden' name = 'month' value = $month>";
			echo "<input type = 'hidden' name = 'period' value = $period>";
			echo "<input type = 'hidden' name = 'id' value = $id>";
			echo "<input type = 'hidden' name = 'balance' value = $balance>";
			echo "<input type = 'hidden' name = 'advance' value = $advance>";
			echo "<input type = 'hidden' name = 'gmonth' value = $gmonth><br><br>";
			echo "<input type = 'submit' name = 'pay' value = 'Pay Balance'>";
			echo "</form>";
		}
	}
		
		

	
?>