<?php
include('database.php');
?>
<?php
$id = $_GET['id'];
$sqli = "delete from payfood where id = $id";
if($conn->query($sqli) === TRUE){
	header('location:resturent.php');
}
?>