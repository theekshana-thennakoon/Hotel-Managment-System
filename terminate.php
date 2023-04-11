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
body{background-image: url('dashboardw1.jpg');size: cover; repeat:no-repeat;}
input[type=date]{outline:none;background:#fff;border:2px solid #1a2a43; padding:0.5%;color:#000;
width:30%;margin:10px;}

button,input[type=submit]{border:none;outline:none;cursor:pointer;
	background:#212529;width:30%;color:#fff;padding:0.84%;
}

a{text-decoration:none;padding:1%;color:#fff;margin:2px;background:#1a2a43;}
a:hover{text-decoration:none;color:#fff;}
button{background:#212529;}

input[type=submit]{background:#009e9e;}

table{margin-top:2%;width:98%;}

tr:first-child th:first-child { border-top-left-radius: 1em;overflow: hidden;}

tr:first-child th:last-child { border-top-right-radius: 1em;overflow: hidden;}

th,td{text-align:center;padding:1%;width:15%;}

td{border:0.5px solid #1a2a43;background:#fff;}

th{background:#212529;color:#fff;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
<center>
<h1>Previous Records</h1>
<form action = 'terminate.php' method = 'post'>
<input type = 'date' name = 'date'>
<input type = 'submit' name = 'search' value = 'Search'>
<button onClick='windows.location.reload();'>Refresh</button>
</form>
<div class = 'links'>
</div>
<br>
<table>
<tr>
<th>NIC</th>
<th>Full Name</th>
<th>Phone</th>
<th>Address</th>
<th>Checked in</th>
<th>Checked out</th>
</tr>
<?php
$sqlc = "SELECT COUNT(id) as cou FROM terminate";
$resultc = $conn->query($sqlc);
if ($resultc->num_rows > 0){
	while($rowc = $resultc->fetch_assoc()){
		$total_rows = $rowc['cou'];
	}
}
	if(isset($_POST['search'])){
		$date = $_POST['date'];
		$sql = "SELECT * FROM terminate where cdate = '$date'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$nic = $row['nic'];
				$name = $row['name'];
				$phone = $row['phone'];
				$address = $row['address'];
				$cdate = $row['cdate'];
				$gdate = $row['gdate'];
				echo "<tr>";
				echo "<td>" . $nic . "</td>" . "<td>" . $name . "</td>" . "<td>" . $phone . "</td>" . "<td>" . $address . "</td>" . "<td>" . $cdate . "</td>" . "<td>" . $gdate . "</td>";
				echo "</tr>";
			}
		}
	}
	else{
		
		$rows_per_page = 8;
		
		if(isset($_GET['p'])){
			$page_no = $_GET['p'];
		}
		else{
			$page_no = 1;
		}
		$start = ($page_no - 1) * $rows_per_page;
		
		$sql = "SELECT * FROM terminate order by id DESC limit {$start},{$rows_per_page}";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$nic = $row['nic'];
				$name = $row['name'];
				$phone = $row['phone'];
				$address = $row['address'];
				$cdate = $row['cdate'];
				$gdate = $row['gdate'];
				echo "<tr>";
				echo "<td>" . $nic . "</td>" . "<td>" . $name . "</td>" . "<td>0" . $phone . "</td>" . "<td>" . $address . "</td>" . "<td>" . $cdate . "</td>" . "<td>" . $gdate . "</td>";
				echo "</tr>";
			}
		}
		$first = "<a href = 'terminate.php?p=1'>First</a>";

		$last_page_no = ceil($total_rows / $rows_per_page);

		if($page_no >= $last_page_no){
			$next = "<a> <font color = red> >> </font></a>";
		}
		else{
			$next_page_no = $page_no + 1;
			$next = "<a href = 'terminate.php?p={$next_page_no}'> >> </a>";
		}
		
		if($page_no <= 1){
			$previous = "<a> <font color = red> << </font></a>";
		}
		else{
			$previous_page_no = $page_no - 1;
			$previous = "<a href = 'terminate.php?p={$previous_page_no}'> << </a>";
		}
		
		$last = "<a href = 'terminate.php?p={$last_page_no}'>Last</a>";

		echo $first . ' | ' . $previous . ' | ' . $next. ' | ' . $last;
	}

?>

<script>
const reloadtButton = document.querySelector("#reload");
// Reload everything:
function reload() {
    reload = location.reload();
}
// Event listeners for reload
reloadButton.addEventListener("click", reload, false);
</script>