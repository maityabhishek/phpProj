<?php
//include('includes/config.php');

$conn = mysqli_connect("localhost","root","","conferemployee");

if(isset($_POST['submit']))
	
{
	
  //$conn = mysqli_connect("localhost","root","","conferemployee");
  $uid = $_POST['userid'];
  $password = $_POST['password'];
  $password = md5($password);
  $result=mysqli_query($conn,"select * from employee where emp_id='".$uid."' or email ='".$uid."'");
  $userinfo = mysqli_fetch_assoc($result);
  //print_r($userinfo);
  //exit;
  $num = mysqli_num_rows($result);
  if($num > 0){
	  $_SESSION['user']['id'] = $userinfo['emp_id'];
	  $_SESSION['user']['name'] = $userinfo['emp_name'];
  }
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
		<form action="#" method="post">
			<div class="username">
				<span class="username">Email:</span>
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