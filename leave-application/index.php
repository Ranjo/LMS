<?php
require '../resources/config/sessions.php';
include '../db.php';
$sqli = "SELECT LeaveType FROM leaves";
$sqli2 = "SELECT * FROM staff";
$ddown = mysqli_query($con, $sqli);
$ddown2 = mysqli_query($con, $sqli2);
$aids= $_SESSION['User_ID'];
$leavedays = mysqli_query($con, "SELECT * FROM staff WHERE StaffId = '$aids'");
	
if (isset($_POST['submitl'])) {
	$aids= $_SESSION['User_ID'];
	$status = "Pending";
    $enteredby = "admin";
	$leavetype =$_POST['leavetype'];
	$ldays =$_POST['ldays'];
	$sdate =$_POST['sdate'];
	$edate =$_POST['edate'];
	$releiver =$_POST['releiver'];
	$res1=mysqli_query($con, "INSERT INTO leaveapplication(applicantID, LeaveType, DaysRequested, StartDate, EndDate, Releiver, LeaveStatus, enteredby) values('$aids', '$leavetype', '$ldays','$sdate', '$edate', '$releiver', 
		'$status', '$enteredby' )");
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
<link rel="stylesheet" type="text/css" href="../resources/jquery-ui.css">
<script src="../resources/jquery.js"></script>
<script src="../resources/jquery-ui.js"></script>
<!-- <script src="../resources/jquery.js"></script> -->
<script type="text/javascript">
jQuery(document).ready(function($) {
$('#StartDate').datepicker();
$('#StartDate').bind('change', function() {
	var days = $('#ldays').val() * 1;
var endDate = new Date($(this).val());
endDate.setDate(endDate.getDate() + days);
$('#endDate').val( (endDate.getMonth() + 1)+ '/' +    endDate.getDate() + '/' + endDate.getFullYear() );
 });
});
</script>
<body>
	<?php
require '../resources/nav.php';
require '../resources/aside.php';
	?>
	<div class="forml">

		<form method="POST" action="">
			<div class="panel panel-default">
				<div class="panel-heading" align="center"> <b>Leave application</b></div>
				<div class="panel-body">
					<div class="formp">
						<label class="col-md-3">Applicant ID:</label>
						<input type="text" value="<?php echo $_SESSION['User_ID']; ?>" name="applicantID" disabled>
					</div>
					<div class="formp">
						<label class="col-md-3">Leave Type:</label>
						<select name="leavetype" id="leavetype" oninput="checkValue()" >
							<option >Select</option>
							<?php 


							while ($row = mysqli_fetch_array($ddown)) {
					 		# code...
								echo '<option value="'.$row['LeaveType'].'">'.$row['LeaveType'].'</option>';
							}	
							?>
						</select>
					</div>
					<div class="formp">
						<label class="col-md-3">Leave Days</label>
						<input type="number" min="1" name="ldays" id="ldays" required placeholder="Enter Leave days">
					</div>
					<div class="formp">
						<label class="col-md-3">Start date</label>
						<input type="text" name="sdate" id="StartDate" required>
					</div>
					<div class="formp">
						<label class="col-md-3">End date</label>
						<input type="text" id="endDate" name="edate" required >
					</div>
					<div class="formp">
						<label class="col-md-3">Releiver</label>
						<select name="releiver" >
							<?php 
							while ($row = mysqli_fetch_array($ddown2)) {
								echo '<option value="'.$row['FirstName'].''.$row['LastName'].'">';
								echo $row['FirstName']; echo " "; echo $row['LastName'];
								echo '</option>';
							}	
							?>
						</select>

					</div>
					<input class="btn btn-lg btn-success" style="margin-left: 25%; " type="submit" name="submitl" value="Apply">
					<!-- 	<input type="submit" name="cancell" value="Cancel"> -->
				</div>
			</div>
		</form>
		<div id="desc1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Leave description</strong>
			</div>
				<div id="panel-body">
					<div id="sickl1" hidden class="alert alert-info">
						<hr>
						When an employee falls sick,  Leave is granted for recuperative purposes immediately following an illness. An employee shall be granted paid sick leave in the first 2 months on full pay.
						<hr>
					</div>
					<div id="sickl2" hidden class="alert alert-info">
						<hr>
						An employee shall be granted the subsequent 2 months on half pay
						<hr>
					</div>
					<div id="sickl3" hidden class="alert alert-info">
						<hr>
						An employee shall be granted  sick leave without pay to a max of additional 2 months
						<hr>
					</div>
					<div id="annuall" hidden class="alert alert-info">

						<hr>
						Annual leave shall be granted to an employee after the completion of twelve (12) months continuous service with the society. This will be 21 working days
						<hr>
					</div>
					<div id="martenityl1" hidden class="alert alert-info"> 
						<hr>
						A female employee shall be entitled to ninety (90) Calendar days‟ leave with full pay provided that such an employee shall forfeit her annual leave for the calendar year 
						Staff Policy Manual   Page 21 of 31 
						within which the maternity leave is taken.
						<hr>
					</div>
					<div id="martenityl2" hidden class="alert alert-info">
						<hr>
						Any female employee, who has proceeded for the provided ninety (90) days maternity leave but requires additional leave days other than for medical reasons so prescribed by a qualified medical practitioner, may on application be granted a further leave, subject to a maximum of fifteen (15) days but without pay.  
						<hr>
					</div>
					<div id="unpaidl" hidden class="alert alert-info">
						<hr>
						Where an employee has exhausted his/her annual leave days and a need arises which requires him/her to be absent from duty, but the reason(s) necessitating such absenteeism does not qualify for other types of leaves e.g. compassionate leave, such an employee shall only qualify for leave without pay unless the employer, through his own discretion decides otherwise.  Such unpaid leave is subject to a maximum of one‟s annual leave entitlement. 
						<hr>
					</div>
					<div id="paternityl" hidden class="alert alert-info">
						<hr>
						A male employee shall be entitled to paternity leave as per the Act( 2 weeks with full pay)
						<hr> 
					</div>
					<div id="compasionatel" hidden class="alert alert-info">
						<hr>
						In the event that an employee has already exhausted his/her annual leave days and a situation, which touches on him/herself or his/her second degree of consanguinity (i.e. spouse, children, parents and siblings) relative(s) which merits consideration for leave, a seven working days compassionate leave will be granted by the CEO. 
						<hr>
					</div>
					<div id="compulsoryl" hidden class="alert alert-info" >
						<hr>
						The employer may request any employee to proceed to fully paid compulsory leave on either to enable official investigation be carried out on the specific employee‟s activities or as a disciplinary measure 
						<hr>
					</div>
				</div>
		</div>
		</div>
	</div>
	<div id="leavedetails">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Leave Details</strong>
			</div>
			<div class="panel-body">
				<strong align="center"><u>Remaining Leave Days</u></strong>
			<div class="form control">
				<label>Annual Leave: </label>
				<span>
					<?php 
						while ($row = mysqli_fetch_array($leavedays)) {
						echo $row['AL'];
					
					?>					
				</span>
			</div>		
			<div class="form control">
				<label>Sick Leave: </label>
				<span>
					<?php 

						echo $row['SL'];
					
					?>					
				</span>
			</div>							
			<div class="form control">
				<label>Martenity Leave: </label>
				<span>
					<?php 

						echo $row['ML'];

					?>					
				</span>
			</div>
				<div class="form control">
				<label>Parternity Leave: </label>
				<span>
					<?php 

						echo $row['PL'];
					}
					?>					
				</span>
			</div>		
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function checkValue(){

		var martenityl1 = 'Maternity Leave';
		var martenityl2 = 'Martenity Leave L2'
		var paternityl = 'Paternity Leave';
		var sickl1 = 'Sick Leave';
		var sickl2 = 'Sick Leave Level 2' ;
		var sickl3 = 'Sick Leave Level 3';
		var compulsoryl = 'Compulsory Leave' ;
		var compasionatel = 'Compasionate Leave' ;
		var annuall = 'Annual Leave';
		var unpaidl = 'Unpaid Leave';
		var leavetype= document.getElementById('leavetype').value;
		var ltype = document.getElementById('leavetype'); 

		if(leavetype == paternityl){
				document.getElementById('leavetype').addEventListener('change', function () {
			    var style = this.value == paternityl ? 'block' : 'none';
			    document.getElementById('paternityl').style.display = style;
					});
					//document.getElementById('paternityl').style.display = "block";
					document.getElementById('ldays').max="14";
	}
		else if(leavetype == martenityl1){
				ltype.addEventListener('change', function () {
			    var style = this.value == martenityl1 ? 'block' : 'none';
			    document.getElementById('martenityl1').style.display = style;
			   
					});
					//document.getElementById('martenityl1').style.display = "block";
					document.getElementById('ldays').max="90";
	}
		else if(leavetype == sickl1){

				ltype.addEventListener('change', function () {
			    var style = this.value == sickl1 ? 'block' : 'none';
			    document.getElementById('sickl1').style.display = style;
			   
					});
					//document.getElementById('sickl1').style.display = "block";
					document.getElementById('ldays').max="14";
	}
		else if(leavetype == annuall){
				ltype.addEventListener('change', function () {
			    var style = this.value == annuall ? 'block' : 'none';
			    document.getElementById('annuall').style.display = style;
			   
					});
					//document.getElementById('annuall').style.display = "block";
					document.getElementById('ldays').max="21";
	}
		else if(leavetype == sickl2){
				ltype.addEventListener('change', function () {
			    var style = this.value == sickl2 ? 'block' : 'none';
			    document.getElementById('sickl2').style.display = style;
			   
					});
					//document.getElementById('sickl2').style.display = "block";
					document.getElementById('ldays').max="60";
	}
		else if(leavetype == sickl3){
				ltype.addEventListener('change', function () {
			    var style = this.value == sickl3 ? 'block' : 'none';
			    document.getElementById('sickl3').style.display = style;
			   
					});
					//document.getElementById('sickl3').style.display = "block";
					document.getElementById('ldays').max="60";
	}
		else if(leavetype == compasionatel){
				ltype.addEventListener('change', function () {
			    var style = this.value == compasionatel ? 'block' : 'none';
			    document.getElementById('compasionatel').style.display = style;
			   
					});			
					//document.getElementById('compasionatel').style.display = "block";
					document.getElementById('ldays').max="7";
	}
		else if(leavetype == martenityl2){
				ltype.addEventListener('change', function () {
			    var style = this.value == martenityl2 ? 'block' : 'none';
			    document.getElementById('martenityl2').style.display = style;
			   
					});	
					//document.getElementById('martenityl2').style.display = "block";
					document.getElementById('ldays').max="15";
	}
		else if(leavetype == compulsoryl){
				ltype.addEventListener('change', function () {
			    var style = this.value == compulsoryl ? 'block' : 'none';
			    document.getElementById('compulsoryl').style.display = style;
			   
					});	
					//document.getElementById('compulsoryl').style.display = "block";
					document.getElementById('ldays').max="100";
	}
			else if(leavetype == unpaidl){
				ltype.addEventListener('change', function () {
			    var style = this.value == unpaidl ? 'block' : 'none';
			    document.getElementById('unpaidl').style.display = style;
			   
					});	
					//document.getElementById('unpaidl').style.display = "block";
					document.getElementById('ldays').max="100";
	}

		else{
			document.getElementById('desc1').style.display = "block";
	}
	}
	</script>
	

</body>
</html>