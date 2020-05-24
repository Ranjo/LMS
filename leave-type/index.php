<?php 
require '../resources/config/sessions.php';
if (isset($_POST['submitl'])) {
	include '../db.php';
	$lid =$_POST['lid'];
	$ltype =$_POST['ltype'];
	$ldays =$_POST['ldays'];
	$lpay =$_POST['lpay'];
	$res1=mysqli_query($con, "INSERT INTO leaves(LeaveID, LeaveType, Ldays, Lpay) values('$lid', '$ltype', '$ldays','$lpay')");
if (!$res1) {
	?>
	<script type="text/javascript">
	alert("Not Successfull");	
	</script>

	<?php
}
else{
	echo '<script type="text/javascript">';
	echo 'alert("Successfull")';
	echo '</script>';
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>leave types</title>
</head>
<link rel="stylesheet" type="text/css" href="../resources/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="../resources/w3.css">
<body>
<?php 
require '../resources/nav.php';
require '../resources/aside.php';
 ?>
<div class="forml">
<form method="POST" action="">
	<div class="panel panel-default">
	<div class="panel-heading" align="center"> <b>Add Leave type</b></div>
	<div class="panel-body">
	<div class="formp">
		<label class="col-md-3">Leave ID</label>
		<input type="text" name="lid" placeholder="Enter LeaveId">
	</div>
	<div class="formp">
	<label class="col-md-3">Leave type</label>
	<input type="text" name="ltype" required placeholder="Enter Leave type">
	</div>
	<div class="formp">
		<label class="col-md-3">Leave days</label>
		<input type="text" name="ldays" required placeholder="Enter Leave days">
	</div>
	<div class="formp">
		<label class="col-md-3">Pay</label>
		<input type="text" name="lpay" required placeholder="Enter Pay">
	</div>
	
	<input class="btn btn-lg btn-success" style="margin-left: 25%; " type="submit" name="submitl" value="Submit">
<!-- 	<input type="submit" name="cancell" value="Cancel"> -->
</div>
	</div>
</form>
</div>
</div>
</body>
</html>