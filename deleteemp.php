<?php
include('database.php');
?>
<?php
$id = $_GET['id'];
$sqli = "UPDATE employee set wod = 'delete' where id = $id";
if($conn->query($sqli) === TRUE){
	header('location:emp.php');
}
?>