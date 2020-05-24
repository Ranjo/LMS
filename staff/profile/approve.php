<?php
include '../../resources/config/sessions.php';
require_once '../../db.php';

if (isset($_GET['approve'])&& isset($_GET['LeavenNo'])) {
	echo $_GET['approve'];
	$LeaveNo = $_GET['LeaveNo'];
	$applicant_id = $_GET['approve'];
	$check_result = mysqli_query($con,"SELECT * FROM leaveapplication WHERE LeaveNo = $LeaveNo AND applicant_id = $applicant_id");
	$row = mysqli_fetch_array($check_result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($check_result);
    if ($count ==1) {
		while($rows){
		$status= $row['LeaveStatus'];
			if ($status=='Approved') {
				header("location: Leavelist.php?msg=1");
			}
			else{
				$alter_result= mysqli_query($con, "UPDATE leaveapplication SET LeaveStatus='Approved' WHERE applicantID=$applicant_id");
				if (!$alter_result) {
					echo "Goodbye";
					}
				else{
					header("location: Leavelist.php?msg=2");
					}
			}
		}
	}
}

?>