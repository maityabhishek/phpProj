<?php
//include 'login.php'; // Includes Login Script

//copied 
include('config.php');


if (isset($_POST['submit']))
	{
		if (empty($_POST['userid']) || empty($_POST['password']))
			{
	
				$error = "Username or Password is invalid";
			}
		else
			{
				
				$username=$_POST['userid'];
				$password=$_POST['password'];
				$fpassword=md5($password);

			
				
				$query = mysqli_query($conn,"select * from employee where ( email='".$username."' or emp_id = '".$username."') and  password='".$fpassword."' ");
				
				$result = mysqli_fetch_array($query);

				$rows = mysqli_num_rows($query);
				if ($rows == 1)
					{
							// Initializing Session
							$_SESSION['login_user']['id']=$result['id'];
							$_SESSION['login_user']['name']=$result['emp_name'];
							$_SESSION['login_user']['emp_id']=$result['emp_id'];
							$_SESSION['login_user']['deisgnation_id']=$result['designation'];
							//$_SESSION['login_user']['role']=$result['role'];
							
							$qry = mysqli_query($conn,"select * from dept_designation where id ='".$result['designation']."'");
							$result2 = mysqli_fetch_array($qry);
							
							$_SESSION['login_user']['designation']=$result2['designation'];
							$_SESSION['login_user']['department']=$result2['dept_name'];
							header("location: home.php"); // Redirecting To Other Page
					}
				else 
					{
						
							//$error = "Username or Password is invalid";
							echo '<script language="javascript">';
							echo 'alert("Wrong Username or password")';
							echo '</script>';
					}
				mysqli_close($con); // Closing Connection
			}
	}





//original code 
if(isset($_SESSION['login_user'])){

header("location: home.php");
}
  
	

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Confer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Sign In</h2>
		<form action="" method="post">
			<div class="username">
				<span class="username">User ID:</span>
				<input type="text" name="userid" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="rem-for-agile">
				<!--<input type="checkbox" name="remember" class="remember">Remember me<br> -->
				<a href="#">Forgot Password</a><br>
			</div>
			<div class="login-w3">
					<input type="submit" name="submit" class="login" value="Sign In">
			</div>
			<div class="clearfix"></div>
		</form>
				<div class="back">
					<a href="signup.php">Register</a>
				</div>
				<div class="footer">
					<p>&copy; 2017 Confer . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
				</div>
	</div>
	</div>
	</div>
</body>
</html>