<?php 
include '../../resources/config/sessions.php';
require_once '../../db.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>View leaves</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../resources/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="../../resources/w3.css">
<style type="text/css">
	.floatrght{
		position: absolute;
		left: 300px;
		top: 73px;
		float: left;
	}
</style>
<body>
<?php
require '../../resources/nav.php';
require '../../resources/aside.php';
?>
<div class="floatrght">
<?php
if (isset($_GET['msg'])) {

if ($_GET['msg']==1) {
echo "<p  style='color: red'>Hey You Ve Mde it</p>";
}elseif ($_GET['msg']==2) {
echo "<p style='color: green'>Hey You Ve Mde it BUTTTTT</p>";
}
}
?>
<?php
$staffid = $_SESSION['User_ID'];
$result = mysqli_query($con,"SELECT * FROM leaveapplication WHERE approverID='$staffid'");


echo "<table class='table table-stripped'>

<tr>
<th> LeaveNo</th>
<th>ApplicantID</th>
<th>LeaveStatus</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<a href='#'> <tr>";
echo "<td>" . $row['LeaveNo'] . "</td>";
echo "<td>" . $row['applicantID'] . "</td>";
//echo "<td>" . $row['LeaveType'] . "</td>";
//echo "<td>" . $row['DaysRequested'] . "</td>";
//echo "<td>" . $row['StartDate'] . "</td>";
//echo "<td>" . $row['Releiver'] . "</td>";
echo "<td>" . $row['LeaveStatus'] . "</td>";
//echo "<td>" . $row['enteredby'] . "</td>";?>
<!-- <td><a href='approve.php?approve=<?php //echo $row["applicantID"];?>' href="#">Approve</a></td>
<td><a href='reject.php?reject=<?php //echo $row["applicantID"];?>' href="#">Reject</a></td> -->
<?php

echo "</tr> </a>";
}
echo "</table>";

mysqli_close($con);
?>
<!-- <script type="text/javascript">

function myConfirmD() {
//var txt;
var r=confirm('sure');
if (r==true) {
window.location.href='approve.php?approve="<? //echo $row["applicantID"];?>"'
}
else{
txt = "fuck you";
}
document.getElementById("demo").innerHTML = txt;
} 
</script> -->
</div>
</div>
</body>
</html>