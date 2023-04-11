<?php
include('database.php');
?>
<?php
$id = $_GET['id'];
$sqli = "DELETE from food where id = $id";
if($conn->query($sqli) === TRUE){
	header('location:changeprice.php');
}
?>