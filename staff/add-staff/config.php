<?php
require '../../db.php';

if (isset($_POST['submitl'])) {
	
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$gender =$_POST['gender'];
	$dept =$_POST['dept'];
	$title = $_POST['title'];
	$role = $_POST['role'];
	$sup = $_POST['supervisor'];
	$doe =$_POST['doe'];
	$email = $_POST['email'];
	$phoneno = $_POST['phoneno'];
	$password = $_POST['pass'];


	$res1=mysqli_query($con, "INSERT INTO staff(FirstName, LastName, Department, title, role, supervisorID, Dateofemployment, PhoneNo, Email, Gender, Password) values('$fname', '$lname', '$dept', '$title', '$role', '$sup', '$doe', '$phoneno', '$email', '$gender', '$password')");
	if (!$res1) {
		?>
		<script type="text/javascript">
			alert("Not Successfull");	
		</script>

		<?php
	}
	else{
		echo " <script>
        alert('Successfull');
        window.location.href='index.php'
        </script>";
}
}
?>