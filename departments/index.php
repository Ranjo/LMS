<?php 
include '../resources/config/sessions.php';
include '../db.php';
$sqli2 = "SELECT * FROM staff WHERE title='Manager'";
$ddown2 = mysqli_query($con, $sqli2);
if (isset($_POST['submitl'])) {
	$depname= $_POST['depname'];
	$hod= $_POST['hod'];
	$res1=mysqli_query($con, "INSERT INTO department(DepartmentName, HOD) values('$depname', '$hod')");
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
	<title>Add Department</title>
</head>
<link rel="stylesheet" type="text/css" href="../resources/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="../resources/w3.css">
<body>
	<?php
	require '../resources/nav.php';
	require '../resources/aside.php';
	?>
	<div class="containers forml">

		<form method="POST" action="">
			<div class="panel panel-default">
				<div class="panel-heading" align="center"> <b>Add Department</b></div>
				<div class="panel-body">
					<div class="formp">
						<label class="col-md-3">Department Name</label>
						<input type="text" name="depname" placeholder="Enter Department Name" required>
					</div>
					<div class="formp">
						<label class="col-md-4">HOD</label>
						<select name="dept">
							<?php 
							while ($row = mysqli_fetch_array($ddown2)) {
								echo '<option value="'.$row['FirstName'].''.$row['LastName'].'">';
								echo $row['FirstName']; echo " "; echo $row['LastName'];
								echo '</option>';
							}	
							?>
						</select>
					</div>


					<input class="btn btn-lg btn-success" style="margin-left: 25%; " type="submit" name="submitl" value="Add">
					<!-- 	<input type="submit" name="cancell" value="Cancel"> -->
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>