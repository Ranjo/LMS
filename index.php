
<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
</head>
<link rel="stylesheet" type="text/css" href="resources/style-main.css">
<link rel="stylesheet" type="text/css" href="resources/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="resources/w3.css">


<style type="text/css">

body{
border-image: url(resources/Imgs/13732.jpg);
background-repeat: no-repeat;
background-size:cover;
background-attachment: fixed;

	}
</style>
<body>
	<div class="forml">
		<div class="ht2">
			<div class="panel panel-default">
				<div class="panel-heading" align="center">Login</div>
				<form method="POST" action="resources/config/login.php">
					<div class="ht3 w3-blue-grey">
						<div class="formp">
							<label class="col-md-3">Email</label>
							<input type="email" name="email" style="color:black;" required autocomplete="off" placeholder="Email address">
						</div>
						<div class="formp">
							<label class="col-md-3">Password</label>
							<input type="password" name="pass" style="color:black;" required autocomplete="off" placeholder="Password">
						</div>
						<div class="">
							<p align="center">Forgot password? <a href="forgotpassword.php">reset</a> </p>
							<input type="submit" style="margin-left: 42%;" name="loginbtn" value="Login" class="loginbtn">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>