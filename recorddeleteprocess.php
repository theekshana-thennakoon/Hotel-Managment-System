<?php
include('database.php');
?>
<?php
if (isset($_POST['pay'])){
	$id = $_POST['id'];
	$balance = $_POST['balance'];
	$nic = $_POST['nic'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$rno = $_POST['rno'];
	$cdate = $_POST['cdate'];
	$gdate = $_POST['gdate'];
	$month = $_POST['month'];
	$period = $_POST['period'];
	$advance = $_POST['advance'];
	$gmonth = $_POST['gmonth'];
	$sqli = "insert into terminate values($id,'$name','$nic',$phone,'$address',$rno,'$cdate','$gdate','$month',$period,$balance,$advance,'$gmonth')";
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
?>