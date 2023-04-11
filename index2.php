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

body{background:#fff;}

h1{color:#1a2a43;text-align:center;}

input{outline:none;font-size:22px;color:#fff;padding:2%;width:100%;margin-bottom:10px;}

input[type=text]{background:transparent;border:none;border:2px solid #1a2a43; color:#000;}
input[type=password]{background:transparent;border:none;border:2px solid #1a2a43; color:#000;}

input[type=submit]{border:none;border:2px solid #1a2a43;margin-top:20px;cursor:pointer;
background:#00f;width:100%;}

button{width:40%;padding:0.5%;background:#990000;color:#fff;
font-size:18px;border:none;border:2px solid #1a2a43;cursor:pointer;}

form{width:40%;}

p{text-align:left; color:#000;}

a{color:#000; text-decoration:none;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>

<br><br><br><h1>Login</h1><br>
<center>
<form action = "index.php" method = "post">
<p>Username</p>
<input type = "text" name = "user"><br>
<p>Password</p>
<input type = "Password" name = "password">
<input type = "submit" name = "login" value = "Login">
</form>
<a href = "register.php"><button>Sign up</button></a><br><br>
<a href = "frgt_Pwd/forget.php">Forget Password</a>

<?php
if(isset($_POST['login'])){
	$user = $_POST['user'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM register WHERE user = '$user' and password = '$password' limit 1";
	$result = $conn->query($sql);
	if ($result->num_rows == 1){
		$_SESSION['user'] = $user;   
		$_SESSION['password'] = $password;
		header('location:homepage.php');
	}
}

?>
