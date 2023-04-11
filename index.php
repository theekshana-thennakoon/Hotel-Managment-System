<?php
include('database.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
    .input-field .fas{
      margin-left:15px;margin-top:18px;
    }
    </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
	<title>Sign in & Sign up Form</title>
  </head>
  <body>
  <div class="container">
    <script src="sweetalert.min.js"></script>
      <div class="forms-container">
        <div style="font-size:16px;color:#000;position:fixed;right:0;top:0;width:50%;height:50px;background:#f7f7f7;text-align:center;padding:1%;line-height: 20px;">
          <i class="fa fa-envelope" aria-hidden="true"></i> tharushinathaliya076@gmail.com |
          <i class="fa fa-mobile" aria-hidden="true"></i> +94760741953
        </div>
        <div class="signin-signup">
          <form action="index.php" method = 'post' class="sign-in-form">
            <h1>Four Seasons Hotels & Resorts </h1>
            <br>
            <h2 >Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name = 'user'>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name = 'password'>
            </div>
            <input type="submit" value="Login" name = 'login' class="btn solid" />
          </form>
          
          <form action="index.php" method = 'post' class="sign-up-form">
            <h2 class="title">Sign up</h2>
			
			      <div class="input-field">
				      <i class="fas fa-user"></i>
              <input type = "text" name = "fname" placeholder = 'Full Name'>
            </div>
			
            
			
            <div class="input-field">
			        <i class="fas fa-user"></i>
              <input type = "text" name = "user" placeholder = 'Username'>
            </div>
			
            <div class="input-field">
			        <i class="fas fa-mobile" aria-hidden="true"></i>
              <input type = "text" name = "phone" placeholder = 'phone'>
            </div>
            <div class="input-field">
              <i class="fas fa-map-marker" aria-hidden="true"></i>
              <input type = "text" name = "address" placeholder = 'Address'>
            </div>
			      <div class="input-field">
			        <i class="fas fa-lock"></i>
              <input type="password" placeholder = "Password" name = 'password'>
            </div>
			      <div class="input-field">
			        <i class="fas fa-lock"></i>
              <input type = "Password" name = "rpassword" placeholder = 'Re Enter password'style = "margin-bottom:-10px;">
            </div>
            <input type="submit" class="btn" name = 'signup' value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content" style="margin-top:20%;">
            <h3>Create Account ?</h3>
            <p>
              If You Dont Have Account? Please Create New Account.!</p>
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="logo1.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content" style="margin-top:20%;margin-right:20%;">
            <h3>One of us ?</h3>
            <p>
              I Already Have an Account. Login Here
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="logo1.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>

  <?php
if(isset($_POST['login'])){
	$user = $_POST['user'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM register WHERE user = '$user' and password = '$password' limit 1";
	$result = $conn->query($sql);
	if ($result->num_rows == 1){
    $_SESSION['username'] = $user;
		header('location:homepage.php');
	}
    else{
        echo "<script>
			swal({
				title: 'Login Failed!',
				text: 'Please Check Your Authentication Details .!',
				icon: 'error',
			});
			</script>";
    }
}


if(isset($_POST['signup'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$user = $_POST['user'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$rpassword = $_POST['rpassword'];
	
	$sql = "SELECT * FROM register WHERE user = '$user'";
	$result = $conn->query($sql);
	if ($result->num_rows == 1){
		echo "<script>
			swal({
				title: 'Login Failed!',
				text: 'This User Already Exits .!',
				icon: 'error',
			});
			</script>";
	}
	else{
		if($password == $rpassword){
			
			$sqli = "insert into register values('$fname','$lname','$user',$phone,'$address','$password')";
			if($conn->query($sqli) === TRUE){
        echo "<script>
        swal({
          title: 'Register Success!',
          text: 'Successfully Registerd',
          icon: 'success',
        });
        </script>";
				//header('location:index.php');
			}
		}
		else{
			echo "<script>
                swal({
                    title: 'Login Failed!',
                    text: 'Passwords Doesnt Match .!',
                    icon: 'error',
                });
                </script>";
			
		}
	}
}

?>

</html>
