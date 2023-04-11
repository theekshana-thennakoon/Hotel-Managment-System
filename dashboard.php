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
*{margin:0;padding:0;font-family: Arial,Helvetica Neue,Helvetica,sans-serif; }

body{background-image: url('dashboardw1.jpg');size: cover; repeat:no-repeat;}
h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;;height: 10vh;}

#clock{position: fixed;top: 10%;right: 2%;}


</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>

<h1>Welcome To Four Season</h1>
<div id = "clock"></div>
<script type = "text/javascript">
	setInterval(displayclock, 10);
	function displayclock(){
		var time = new Date();
		var hrs = time.getHours();
		var min = time.getMinutes();
		var sec = time.getSeconds();
		
		if(sec < 10){
			sec = '0' + sec;
		}
		
		if(min < 10){
			min = '0' + min;
		}
		
		if(hrs < 10){
			hrs = '0' + hrs;
		}
		
		document.getElementById('clock').innerHTML = "<h4 style = 'color:#fff;font-size:50px;text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black;'>" + hrs + " : " + min + " : " + sec +"</h4>";
	}
	
	
	
</script>
