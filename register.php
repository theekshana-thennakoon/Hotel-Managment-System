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

body{background:#0082e6;}

body{
	background:rgba(0,0,0,0.6)url("img/signup.jpg");
	background-repeat:no-repeat;
	background-position:center;
	background-size:cover;
	background-blend-mode:darken;
}

h1{color:#fff;text-align:center;}

input{outline:none;font-size:22px;color:#fff;padding:0.5%;width:45%;margin:10px;}

input[type=text],input[type=password]{background:transparent;border:none;border:2px solid #fff; color:#fff;}

select{background:transparent;border:none;border:2px solid #fff; color:#fff;
	outline:none;font-size:22px;color:#fff;padding:0.5%;width:45%;
}

input[type=submit]{border:none;border:2px solid #fff;margin-top:5px;cursor:pointer;
	background:green;width:93%;
}

button{width:74%;padding:0.5%;background:#990000;color:#fff;
	font-size:18px;border:none;border:2px solid #fff;cursor:pointer;}

form{width:80%;margin-top:20px;}

p{text-align:left; color:#fff;}

a{color:#fff; text-decoration:none;}

::-webkit-input-placeholder{color:#fff;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>

<br><h1>Register With Us</h1>
<center>
<form action = "register.php" method = "post">

<input type = "text" name = "fname" placeholder = 'First Name'>
<input type = "text" name = "lname" placeholder = 'Last Name'><br><br>

<input type = "text" name = "user" placeholder = 'Username'>
<input type = "text" name = "phone" placeholder = 'phone'><br><br>

<input type = "text" name = "address" placeholder = 'Address'>
<select name = 'job'>
<option value = 'admin'>Admin</option>
<option value = 'ceo'>CEO</option>
<option value = 'manager'>Manager</option>
</select><br><br>

<input type = "Password" name = "password" placeholder = 'Password'>
<input type = "Password" name = "rpassword" placeholder = 'Re Enter password'style = "margin-bottom:-10px;"><br><br>
<input type = "submit" name = "signup" value = "Create Account">
</form>

<p style = "text-align:center;">I Already Have Account.!</p>
<a href = "index.php"><button>Login</button></a><br>
<a href = "frgt_Pwd/forget.php">Forget Password</a>

<?php
if(isset($_POST['signup'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$user = $_POST['user'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$job = $_POST['job'];
	$password = $_POST['password'];
	$rpassword = $_POST['rpassword'];
	
	$sql = "SELECT * FROM register WHERE user = '$user'";
	$result = $conn->query($sql);
	if ($result->num_rows == 1){
		echo "<br>This User Already Exist..!";
	}
	else{
		if($password == $rpassword){
			
			$sqli = "insert into register values('$fname','$lname','$user',$phone,'$address','$job','$password')";
			if($conn->query($sqli) === TRUE){
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $password;
				header('location:index.php');
			}
		}
		else{
			echo "<br>Password Doesn't Match..!";
		}
	}
}

?>