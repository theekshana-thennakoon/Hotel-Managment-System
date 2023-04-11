<?php
include('database.php');
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
<head>
<link rel = 'stylesheet' type = 'text/css' href = 'css/bootstrap.min.css'>
<style>

*{margin: 0;padding: 0;}
body{background-image: url('dashboardw1.jpg');size: cover; repeat:no-repeat;}
input[type=submit]{
	width:20%;padding:1.2%;background:#1a2a43;border:none;color:#fff;font-size:20px;
	border-radius:50px;cursor:pointer;margin-top:-25px;
}

input[type=text]{
	width:20%;padding:1.2%;outline:none;border:2px solid #1a2a43;color:#1a2a43;font-size:20px;
	margin-top:-25px;margin-right:7%;float:right;
}

h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;}

table{width:95%;}

th,td{text-align:center;padding:2%;width:19%;}

th{background:#212529;color:#fff;border-bottom:0.5px solid #000;}

td{border:1px solid #212529;background:#fff;}

.del{background:#f00;padding:4%;color:#fff;border-radius:4px;}

.del:hover{color:#fff;text-decoration:none;}

.edit{background:#0082e6;padding:7%;padding-left:12%;padding-right:12%;color:#fff;border-radius:4px;}
.edit:hover{color:#fff;text-decoration:none;}

</style>
</head>
<body>
<h1>Change Price</h1>
<center>
<table border = '1'>
<tr>
<th>Food</th><th>Price</th><th>Type</th><th colspan = '2'>Action</th>
</tr>

<?php

$sqlc = "SELECT COUNT(id) as cou FROM food";
$resultc = $conn->query($sqlc);
if ($resultc->num_rows > 0){
	while($rowc = $resultc->fetch_assoc()){
		$total_rows = $rowc['cou'];
	}
}

$rows_per_page = 6;
		
if(isset($_GET['p'])){
	$page_no = $_GET['p'];
}
else{
	$page_no = 1;
}
$start = ($page_no - 1) * $rows_per_page;

$sql = "SELECT * FROM food limit {$start},{$rows_per_page}";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	echo "<form action = 'changeprice.php' method = 'post'>";
	while($row = $result->fetch_assoc()){
		$id = $row['id'];
		$food = $row['food'];
		$price = $row['price'];
		$type = $row['type'];
		echo "<tr><td>{$food}</td><td>{$price}</td><td>{$type}</td><td><a href = 'deletefood.php?id={$id}' class = 'del'>&#128500; delete</a></td><td><a href = 'editemp.php?id=$id' class = 'edit'>&#128393; Edit</a></td></tr>";
	}
}
$first = "<a href = 'changeprice.php?p=1'>First</a>";

		$last_page_no = ceil($total_rows / $rows_per_page);

		if($page_no >= $last_page_no){
			$next = "<a> <font color = red> >> </font></a>";
		}
		else{
			$next_page_no = $page_no + 1;
			$next = "<a href = 'changeprice.php?p={$next_page_no}'> >> </a>";
		}
		
		if($page_no <= 1){
			$previous = "<a> <font color = red> << </font></a>";
		}
		else{
			$previous_page_no = $page_no - 1;
			$previous = "<a href = 'changeprice.php?p={$previous_page_no}'> << </a>";
		}
		
		$last = "<a href = 'changeprice.php?p={$last_page_no}'>Last</a>";

		echo $first . ' | ' . $previous . ' | ' . $next. ' | ' . $last;
?>
</body>
</html>
