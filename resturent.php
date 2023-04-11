<?php
include('database.php');
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
<head>
<link rel = 'stylesheet' type = 'text/css' href = 'css/bootstrap.min.css'>
<link href="css/styles.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<style>

*{margin: 0;padding: 0;box-sizing: border-box;user-select: none;}
body{background-image: url('dashboardw1.jpg');size: cover; repeat:no-repeat;}

h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;}

button{cursor:pointer;background:#fff;font-size:20px;color:#212529;width:50%;border:none;border-radius:50px;}
button:hover{background:#212529;color:#fff;width:80%;border:2px solid #fff;}

.table{float:right;width:50%;position: fixed;top: 100px;right: 20px;}

table{width:100%;border:2px solid #212529;}

th,td{text-align:center;padding:4%;width:17%;}

th{background:#212529;color:#fff;border-bottom:0.5px solid #000;}

.del{background:#f00;padding:7%;color:#fff;border-radius:4px;}

.del:hover{color:#fff;text-decoration:none;}

.edit{background:#0082e6;padding:7%;padding-left:12%;padding-right:12%;color:#fff;border-radius:4px;}
.edit:hover{color:#fff;text-decoration:none;}

.addfood,.changeprice{margin-left:10px;background:#1a2a43;width:20%;color:#fff;padding:1%;}
.addfood:hover,.changeprice:hover{width:20%;}
</style>
</head>
<body>
<h1>Luncheonette</h1>
<form action = 'x.php' method = 'post' style = 'width:45%;margin:10px;'>
<br><br><br>
	<select class="form-control" id="inputdrug" name = 'dname[]' multiple data-live-search="true">
         <option value = '#'>Select Foods</option>
         <?php

         //get values from food table
           $sql = "SELECT * FROM food";
         	$result = $conn->query($sql);
            if ($result->num_rows > 0){
            	while($row = $result->fetch_assoc()){
            		$did = $row['id'];
               		$dname = $row['food'];
                 	echo "<option value = '{$did}'>{$dname}</option>";
               }
            }
                                                            
         ?>
      </select>
      <br><br>
<input type = 'text' name = 'qty' Placeholder = 'Enter Qty' style = 'width:49%;padding:1%;font-size:16px;'>
<input type = 'submit' name = 'selectfood' value = 'select' style = 'width:49%;padding:1%;font-size:16px;background:#1a2a43;color:#fff;font-weight:bold;'>

</form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<br>
<div class = 'table'>
<table border = '1'>
<?php

$sqlp = "SELECT SUM(price) as sumprice FROM payfood";
$resultp = $conn->query($sqlp);
if ($resultp->num_rows > 0){
	while($rowp = $resultp->fetch_assoc()){
		$sumprice = $rowp['sumprice'];
	}
}

$sqls = "SELECT * FROM payfood";
$results = $conn->query($sqls);
if ($results->num_rows > 0){
	echo "<tr><th>Food</th><th>QTY</th><th>Price</th><th>action</th></tr>";
	while($rows = $results->fetch_assoc()){
		$ids = $rows['id'];
		$foods = $rows['food'];
		$qtys = $rows['qty'];
		$prices = $rows['price'];
		echo "<tr><td>{$foods}</td><td>{$qtys}</td><td>Rs. {$prices} /=</td><td><a href = 'deletepayfood.php?id={$ids}' class = 'del'>&#128500; Remove</a></td></tr>";
	}
	echo "<tr><th colspan = '2'>Rs. {$sumprice} /=</th>
	<form action = x.php method = 'post'>
	<input type = 'hidden' name = 'sumpay' value = '{$sumprice}'>
	<th colspan = '2'><button type = 'submit' name = 'paybtn'>Pay</button></th></tr>
	</form>";	
}
	
?>
</table>
</div>
-<br><br><br><br><br><br><br>
<a href = 'addfood.php'><button class = 'addfood'>Add New Food</button></a>
<a href = 'changeprice.php'><button class = 'changeprice'>Change Price</button></a>

<script src="js/scripts.js"></script>
<script src="scripts.js"></script>
   </body>
</html>
