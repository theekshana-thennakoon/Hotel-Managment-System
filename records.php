<?php
session_start();
?>
<?php
include('database.php');
?>

<html>
<head>
<link rel = 'stylesheet' type = 'text/css' href = 'css/bootstrap.min.css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <noscript>
      <style type='text/css'>
        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }
      </style>
    </noscript>
<style>
*{margin:0;padding:0;}

body{background-image: url('dashboardw1.jpg');size: cover; repeat:no-repeat;}

h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;}

input[type=date]{outline:none;background:transparent;border:2px solid #1a2a43; padding:0.5%;color:#000;
width:50%;margin:10px;}

input[type=submit]{border:none;outline:none;cursor:pointer;
	background:#1a2a43;width:30%;color:#fff;padding:0.7%;
}

table{width:98%;}

th,td{text-align:center;padding:1%;width:15%;}

tr:first-child th:first-child { border-top-left-radius: 1em;overflow: hidden;}

tr:first-child th:last-child { border-top-right-radius: 1em;overflow: hidden;}

th,td{text-align:center;padding:1%;width:15%;}

td{border:0.5px solid #1a2a43;color:#212529;background:#fff;}

th{background:#212529;color:#fff;}

.del{background:#f00;padding:4%;color:#fff;border-radius:4px;}
.del:hover{color:#fff;text-decoration:none;}

.edit{background:#0082e6;padding:7%;padding-left:12%;padding-right:12%;color:#fff;border-radius:4px;}
.edit:hover{color:#fff;text-decoration:none;}
</style>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
<center>
<h1>Booked Rooms</h1>

<div class = 'links'>
</div>
<?php
if ($_SESSION['username'] == 'admin'){
			echo "<button id = 'download' style = 'background:#fff;color:#212529;padding:1%;border:none;border-radius:30px;cursor:pointer;'>Download Report</button>";
		}
?>
<br><br>
<div id='invoice'>
<table>
<tr>

<th>Full Name</th>
<th>Phone</th>
<th>Room No</th>
<!--<th>Address</th>-->
<th>Check in</th>
<th>Check out</th>
<th>Action</th>
</tr>
<?php

	$sql = "SELECT * FROM book order by id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id = $row['id'];
			$nic = $row['nic'];
			$name = $row['name'];
			$phone = $row['phone'];
			$rno = $row['rno'];
			$address = $row['address'];
			$cdate = $row['cdate'];
			$gdate = $row['gdate'];
			echo "<tr>";
			echo "<td>" . $name . "</td>" . "<td>0" . $phone . "</td>" . "<td>Room " . $rno . "</td>" . "<td>" . $cdate . "</td>" . "<td>" . $gdate . "</td>" .  "<td> <a href = 'recorddelete.php?id=$id' class = 'del'>going back &#128500;</a>";
			echo "</tr>";
		}
	}
	
?>
<script>
	window.onload = function () {
            document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                console.log(invoice);
                console.log(window);
                var opt = {
                    margin: 0.2,
                    filename: 'Booked-Rooms.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
                };
                html2pdf().from(invoice).set(opt).save();
            })
        }
</script>