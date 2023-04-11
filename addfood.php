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

h1{color:#fff;text-align:center;padding:1%;background:#1a2a43;width:100%;}

button{cursor:pointer;background:#fff;font-size:20px;color:#1a2a43;width:50%;border:none;border-radius:50px;}
button:hover{background:#1a2a43;color:#fff;width:80%;border:2px solid #fff;}

</style>
</head>
<body>
<h1>Add New Food</h1>
<center>
<form action = 'addfood.php' method = 'post' style = 'width:80%;margin:10px;'>
<br><br><br>
<select class="form-control" id="inputdrug" name = 'dname[]' multiple data-live-search="true" style = 'width:50%;'>
  <option value = '#'>Select Foods Type</option>
  <option value = 'Breakfirst'>Breakfirst</option>
  <option value = 'Lunch'>Lunch</option>
  <option value = 'Dinner'>Dinner</option>
  <option value = 'Fruit'>Fruit</option>
  <option value = 'Fruit Juice'>Fruit Juice</option>
  <option value = 'Drain'>Drain</option>
</select>
	
<br><br><br>
<input type = 'text' name = 'food' Placeholder = 'Enter Food Name'  style = 'width:40%;padding:1%;font-size:16px;'>
<input type = 'text' name = 'price' Placeholder = 'Enter Price'  style = 'width:20%;padding:1%;font-size:16px;'>
<input type = 'submit' name = 'add' value = 'Add' style = 'width:35%;padding:1%;font-size:16px;background:#1a2a43;color:#fff;font-weight:bold;'>
</form>

<br>
<?php

if(isset($_POST['add'])){
	  if (!empty($_POST['dname'])) {
        $type = '';
        $food = $_POST['food'];
        $price = $_POST['price'];

        foreach ($_POST['dname'] as $type){
        	$sqli = "insert into food(food,price,type) values('$food',$price,'$type')";
        	if($conn->query($sqli) === TRUE){
        	}
        }
      }
}
?>
   </body>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="js/scripts.js"></script>
<script src="scripts.js"></script>
</html>
