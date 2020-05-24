<?php 
require '../../db.php';
require '../../resources/config/sessions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>add Staff</title>
</head>
<link rel="stylesheet" type="text/css" href="../../resources/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="../../resources/w3.css">
<body>
<?php
require '../../resources/nav.php';
$admin = 'Admin';
$role = $_SESSION['Role'];
if ($role != $admin) {
echo " <script>
        alert('You dont have permission to view this page');
        window.location.href='../profile/index.php'
        </script>";
	//echo "You dont have permission to view this page";
}else{ 
	?>
	<?php require '../../resources/aside.php'; ?>
	<div class="forml">

		<form method="POST" action="config.php">
			<div class="panel panel-default" style="background-color: ghostwhite;">
				<div class="panel-heading" align="center"> <b>add Staff</b></div>
				<div class="panel-body">
					<div class="formp">
						<label class="col-md-3">First Name</label>
						<input type="text" name="fname" placeholder="Enter First Name">
					</div>
					<div class="formp">
						<label class="col-md-3">Last Name</label>
						<input type="text" name="lname" required placeholder="Enter Last name">
					</div>
					<div class="formp">
						<label class="col-md-3">Gender</label>
						<select name="gender">
							<option value="Male">Male</option>							
							<option value="Female">Female</option>						
						</select>
					</div>
					<div class="formp">
						<label class="col-md-3">Department</label>
						<select name="dept">
							<?php 
							$sqli = "SELECT DepartmentName FROM department";
							$ddown = mysqli_query($con, $sqli);
							while ($row = mysqli_fetch_array($ddown)) {
								echo '<option value="'.$row['DepartmentName'].'">'.$row['DepartmentName'].'</option>';
							}	
							?>
						</select>
					</div>
					<div class="formp">
						<label class="col-md-3">Title</label>
						<input type="text" name="title" required placeholder="Title">
					</div>
					<div class="formp">
						<label class="col-md-3" >Role</label>
						<select name="role">
							<option value="Admin">Admininistrator</option>
							<option value="Standard">Standard User</option>
							<option value="HR">Human Resource</option>
						</select>
					</div>
					<div class="formp">
						<label class="col-md-3">Supervisor</label>
						<select name="supervisor">
							<?php
							$sqli2 = "SELECT * FROM staff WHERE role = 'Admin'";
							$ddown2 = mysqli_query($con, $sqli2);
							while ($row = mysqli_fetch_array($ddown2)) {
								echo '<option value="'.$row['StaffId'].'">'.$row['FirstName'].'</option>';
							}	
							?>
						</select>
					</div>

					<div class="formp">
						<label class="col-md-3">Date of Employment</label>
						<input type="date" name="doe" required placeholder="Date of Employment">
					</div>
					<div class="formp">
						<label class="col-md-3">Phone Number</label>
						<input type="text" name="phoneno" required placeholder="Enter phoneno">
					</div>
					<div class="formp">
						<label class="col-md-3">Email</label>
						<input type="email" name="email" required placeholder="Enter email address">
					</div>
					<div class="formp">
						<label class="col-md-3">Password</label>
						<input type="password" name="pass" required placeholder="Enter password">
					</div>
					<div class="formp">
						<label class="col-md-3">Confirm Password</label>
						<input type="password" name="cpass" required placeholder="Confirm password">
					</div>
					<input class="btn btn-lg btn-success" style="margin-left: 25%; " type="submit" name="submitl" value="add">
					<!-- 	<input type="submit" name="cancell" value="Cancel"> -->
				</div>
			</div>
		</form>
	</div>
</div>
<?php
}
?>
	<script type="text/javascript">
	
/*var days= 5;
var leave= "partenity";
if ((leave="partenity") $$ (days>5) {
	console.log("abort");
}*/

</script>
</body>
</html>