<?php
require '../../resources/config/sessions.php';
require_once '../../db.php';

if (isset($_GET['reject'])) {
	$applicant_id = $_GET['reject'];
	$check_result = mysqli_query($con,"SELECT * FROM leaveapplication");
	while($row = mysqli_fetch_array($check_result)){
		$status= $row['LeaveStatus'];
	}

	if ($status=='Rejected') {
		header("location: Leavelist.php");
	}
	else{
$alter_result= mysqli_query($con, "UPDATE leaveapplication SET LeaveStatus='Rejected' WHERE applicantID=$applicant_id");
if (!$alter_result) {
	
}else{


	header("location: Leavelist.php");
}
}
}


?>