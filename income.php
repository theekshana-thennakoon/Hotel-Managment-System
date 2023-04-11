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

h1{color:#fff;text-align:center;padding:1%;background:#212529;width:100%;}
body{background-image: url('dashboardw1.jpg');size: cover; repeat:no-repeat;}
.daily{float:left;width:30%;margin-left:105px;margin-top:0.5%;}

.monthly{float:right;width:30%;margin-right:110px;margin-top:0.5%;}

table{width:100%;}

th,td{text-align:center;padding:4%;width:17%;}

th{background:#212529;color:#fff;border-bottom:0.5px solid #000;}

td{border:1px solid #212529;background:#fff;}

tr:first-child th:first-child { border-top-left-radius: 1em;overflow: hidden;}

tr:first-child th:last-child { border-top-right-radius: 1em;overflow: hidden;}


</style>
<title>Welcome</title>
</head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<body>
<?php
$date = date("Y-m-d");
$month = date("Y-m");


//Daily income find start


$one = 0;
$two = 0;
$three = 0;
$four = 0;
$five = 0;
$sql = "SELECT SUM(advance) as income,rno FROM book where cdate = '$date' group by rno";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$income = $row['income'];
		$rno = $row['rno'];
		if($rno == 1){$one = $income;}
		if($rno == 2){$two = $income;}
		if($rno == 3){$three = $income;}
		if($rno == 4){$four = $income;}
		if($rno == 5){$five = $income;}
	}
}

$sqli = "SELECT SUM(balance) as income,rno FROM terminate where gdate = '$date' and cdate != '$date' group by rno";
$resulti = $conn->query($sqli);
if ($resulti->num_rows > 0){
	while($rowi = $resulti->fetch_assoc()){
		$incomei = $rowi['income'];
		$rnoi = $rowi['rno'];
		if($rnoi == 1){$one = $one + $incomei;}
		if($rnoi == 2){$two = $two + $incomei;}
		if($rnoi == 3){$three = $three + $incomei;}
		if($rnoi == 4){$four = $four + $incomei;}
		if($rnoi == 5){$five = $five + $incomei;}
	}
}

$sqlt = "SELECT * FROM terminate where gdate = '$date' and cdate = '$date'";
$resultt = $conn->query($sqlt);
if ($resultt->num_rows > 0){
	while($rowt = $resultt->fetch_assoc()){
		$rnot = $rowt['rno'];
		$advancet = $rowt['advance'];
		$balancet = $rowt['balance'];
		
		if($rnot == 1){$one = $one + $advancet + $balancet;}
		if($rnot == 2){$two = $two + $advancet + $balancet;}
		if($rnot == 3){$three = $three + $advancet + $balancet;}
		if($rnot == 4){$four = $four + $advancet + $balancet;}
		if($rnot == 5){$five = $five + $advancet + $balancet;}
	}
}


$incomewithoutcost = $one + $two + $three + $four + $five;


$sqlcost = "SELECT SUM(price) as sumprice FROM cost where date = '$date'";
$resultcost = $conn->query($sqlcost);
if ($resultcost->num_rows > 0){
	while($rowcost = $resultcost->fetch_assoc()){
		$cost = $rowcost['sumprice'];
	}
}
else{
	$cost = 0;
}

$sqlsalary = "SELECT SUM(salary) as sumsalary FROM salary where date = '$date'";
$resultsalary = $conn->query($sqlsalary);
if ($resultsalary->num_rows > 0){
	while($rowsalary = $resultsalary->fetch_assoc()){
		$salary = $rowsalary['sumsalary'];
	}
}
else{
	$salary = 0;
}

$cost = $cost + $salary;

$income = $incomewithoutcost - $cost;


$sqlresturent = "SELECT SUM(price) as income FROM resturent where date = '$date'";
$resultresturent = $conn->query($sqlresturent);
if ($resultresturent->num_rows > 0){
	while($rowresturent = $resultresturent->fetch_assoc()){
		$incomeresturent = $rowresturent['income'];
	}
}
else{$incomeresturent = 0;}

$income = $income + $incomeresturent;

//Daily income find end

//Monthly Income Find Start


$onem = 0;
$twom = 0;
$threem = 0;
$fourm = 0;
$fivem = 0;

$sqlm = "SELECT SUM(advance) as income,rno FROM book where month = '$month' group by rno";
$resultm = $conn->query($sqlm);
if ($resultm->num_rows > 0){
	while($rowm = $resultm->fetch_assoc()){
		$incomem = $rowm['income'];
		$rnom = $rowm['rno'];
		if($rnom == 1){$onem = $incomem;}
		if($rnom == 2){$twom = $incomem;}
		if($rnom == 3){$threem = $incomem;}
		if($rnom == 4){$fourm = $incomem;}
		if($rnom == 5){$fivem = $incomem;}
	}
}


$sqltm = "SELECT SUM(balance) as incomemonth,SUM(advance) as advancemonth,rno FROM terminate where gmonth = '$month' group by rno";
$resulttm = $conn->query($sqltm);
if ($resulttm->num_rows > 0){
	while($rowtm = $resulttm->fetch_assoc()){
		$rnotm = $rowtm['rno'];
		$advancetm = $rowtm['advancemonth'];
		$balancetm = $rowtm['incomemonth'];
		
		if($rnotm == 1){$onem = $onem + $advancetm + $balancetm;}
		if($rnotm == 2){$twom = $twom + $advancetm + $balancetm;}
		if($rnotm == 3){$threem = $threem + $advancetm + $balancetm;}
		if($rnotm == 4){$fourm = $fourm + $advancetm + $balancetm;}
		if($rnotm == 5){$fivem = $fivem + $advancetm + $balancetm;}
	}
}

$incomemonthwithoutcost = $onem + $twom + $threem + $fourm + $fivem;


$sqlmonthcost = "SELECT SUM(price) as sumprice FROM cost where month = '$month'";
$resultmonthcost = $conn->query($sqlmonthcost);
if ($resultmonthcost->num_rows > 0){
	while($rowmonthcost = $resultmonthcost->fetch_assoc()){
		$costmonth = $rowmonthcost['sumprice'];
	}
}
else{
	$costmonth = 0;
}

$sqlmonthsalary = "SELECT SUM(salary) as sumsalary FROM salary where month = '$month'";
$resultmonthsalary = $conn->query($sqlmonthsalary);
if ($resultmonthsalary->num_rows > 0){
	while($rowmonthsalary = $resultmonthsalary->fetch_assoc()){
		$salarymonth = $rowmonthsalary['sumsalary'];
	}
}
else{
	$salarymonth = 0;
}

$costmonth = $costmonth + $salarymonth;

$incomemonth = $incomemonthwithoutcost - $costmonth;

$sqlmonthresturent = "SELECT SUM(price) as income FROM resturent where month = '$month'";
$resultmonthresturent = $conn->query($sqlmonthresturent);
if ($resultmonthresturent->num_rows > 0){
	while($rowmonthresturent = $resultmonthresturent->fetch_assoc()){
		$incomemonthresturent = $rowmonthresturent['income'];
	}
}
else{$incomemonthresturent = 0;}

$incomemonth = $incomemonth + $incomemonthresturent;


?>
<h1>Financial Details</h1>
<center>
<?php
if ($_SESSION['username'] == 'admin'){
			echo "<button id = 'download' style = 'background:#fff;color:#212529;padding:1%;border:none;border-radius:30px;cursor:pointer;'>Download Report</button>";
		}
?>
<br><br>
<div id='invoice'>
<div class = 'daily'>
	<table>
		<th colspan = '2'>Daily</th></tr>
		<tr><th>State</th><th>price</th></tr>
		<tr><th>Room 1</th><td><?php echo "Rs. ". $one . " /=" ?></td></tr>
		<tr><th>Room 2</th><td><?php echo "Rs. ". $two . " /=" ?></td></tr>
		<tr><th>Room 3</th><td><?php echo "Rs. ". $three . " /=" ?></td></tr>
		<tr><th>Upper Room 1</th><td><?php echo "Rs. ". $four . " /=" ?></td></tr>
		<tr><th>Upper Room 2</th><td><?php echo "Rs. ". $five . " /=" ?></td></tr>
		<tr><th>Luncheonette</th><td><?php echo "Rs. ". $incomeresturent . " /=" ?></td></tr>
		<tr><th>Costs</th><td><?php echo "Rs. ". $cost . " /=" ?></td></tr>
		<tr><th>Income</th><td><?php echo "Rs. ". $income . " /=" ?></td></tr>
	</table>
</div>
<div class = 'monthly'>
	<table>
		<th colspan = '2'>Monthly</th></tr>
		<tr><th>State</th><th>price</th></tr>
		<tr><th>Room 1</th><td><?php echo "Rs. ". $onem . " /=" ?></td></tr>
		<tr><th>Room 2</th><td><?php echo "Rs. ". $twom . " /=" ?></td></tr>
		<tr><th>Room 3</th><td><?php echo "Rs. ". $threem . " /=" ?></td></tr>
		<tr><th>Upper Room 1</th><td><?php echo "Rs. ". $fourm . " /=" ?></td></tr>
		<tr><th>Upper Room 2</th><td><?php echo "Rs. ". $fivem . " /=" ?></td></tr>
		<tr><th>Luncheonette</th><td><?php echo "Rs. ". $incomemonthresturent . " /=" ?></td></tr>
		<tr><th>Costs</th><td><?php echo "Rs. ". $costmonth . " /=" ?></td></tr>
		<tr><th>Income</th><td><?php echo "Rs. ". $incomemonth . " /=" ?></td></tr>
	</table>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<center>
<a href = 'cost.php' style = 'padding:1%;padding-right:6%;padding-left:6%;border-radius:50px;color:#fff;background:#212529;'>
Add Cost</a>
<script>
	window.onload = function () {
            document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                console.log(invoice);
                console.log(window);
                var opt = {
                    margin: 0.2,
                    filename: 'Income_Report.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
                };
                html2pdf().from(invoice).set(opt).save();
            })
        }
</script>