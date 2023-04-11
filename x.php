<?php
include('database.php');
?>
<?php
if (isset($_POST['update'])){
	$id = $_POST['id'];
	$nicemp = $_POST['nicemp'];
	$namemp = $_POST['nameemp'];
	$phoneemp = $_POST['phoneemp'];
	$addressemp = $_POST['addressemp'];
	$jobtypeemp = $_POST['jobemp'];
	$salaryemp = $_POST['salaryemp'];
	
	$sqlu = "UPDATE employee set nic = '$nicemp',name = '$namemp',phone = $phoneemp , address = '$addressemp',jobtype = '$jobtypeemp',salary = $salaryemp where id = $id";
	if($conn->query($sqlu) === TRUE){
		header('location:emp.php');
	}
}


if(isset($_POST['paybtn'])){
	$sumpay = $_POST['sumpay'];
	$date = date("Y-m-d");
	$month = date("Y-m");
	$sqlir = "insert into resturent(price,date,month) values($sumpay,'$date','$month')";
	if($conn->query($sqlir) === TRUE){
		$sqldr = "delete from payfood";
		if($conn->query($sqldr) === TRUE){
			header('location:resturent.php');
		}
	}
}




if(isset($_POST['selectfood'])){
	if (!empty($_POST['dname'])) {
        $dnme = '';
        $qty = $_POST['qty'];
        foreach ($_POST['dname'] as $dname){
        	$sql = "SELECT * FROM food where id = $dname";
			$result = $conn->query($sql);
			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$food = $row['food'];
					$pricefood = $row['price'];
				}
				$price = $pricefood * $qty;
				$sqli = "insert into payfood(food,qty,price) values('$food',$qty,$price)";
				if($conn->query($sqli) === TRUE){
					header('location:resturent.php');
				}
			}
        }
    }
	
}
?>