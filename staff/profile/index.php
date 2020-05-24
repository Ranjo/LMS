<?php 
include '../../resources/config/sessions.php';
//$result2 =mysqli_query($con, "SELECT * from staff where StaffId = '$StaffId'");
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
<link rel="stylesheet" type="text/css" href="../../resources/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="../../resources/w3.css">
<body>
<?php require '../../resources/nav.php'; ?>
<?php require '../../resources/aside.php'; ?>

</body>
</html>