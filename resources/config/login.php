<?php
session_start();
include '../../db.php';


$email = mysqli_real_escape_string($con, $_POST['email']);
$pass = $_POST['pass'];
$result = mysqli_query($con,"SELECT * FROM staff WHERE Email = '$email' AND Password = '$pass'");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if($count == 1){
    $_SESSION['User_ID'] =$row['StaffId'];
    $_SESSION['User_Name'] =$row['FirstName'];
    $_SESSION['Department'] =$row['Department'];
    $_SESSION['Role'] =$row['role'];
    /*$_SESSION['User_Name']
    $_SESSION['User_Name']
    $_SESSION['User_Name']
    $_SESSION['User_Name']
    $_SESSION['User_Name']
    $_SESSION['User_Name']
    $_SESSION['User_Name']
    $_SESSION['User_Name']
    $_SESSION['User_Name']
*/
    header("location: ../../staff/profile/index.php");	
}
else{
    	echo " <script>
        alert('Incorrect credentials');
        window.location.href='../../index.php'
        </script>";
}
?>