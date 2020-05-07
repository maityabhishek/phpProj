<?php 

include('includes/config.php');

$username="";
$email = '';

if(isset($_POST['submit']))
{
    $username = addslashes($_POST['username']);
	
   $email = addslashes($_POST['email']);
  
   $password = addslashes($_POST['password']);
    
   $password=md5($password);
   
  
  //if($email!='')
  //{
   //$emailQry=mysqli_query($conn,"SELECT id FROM user WHERE email='".$email." ");
   //if(mysqli_num_rows($emailQry)>0){ $errorMsg='Email ID already exists. Kindly try with another email.'; }
  //}
  //if($errorMsg!=''){
    //$_SESSION['error']=$errorMsg;
  //}
  //else{
	 
	 
    mysqli_query($conn,"INSERT INTO user (username,email,password,createdDt,updatedDt) VALUES 
      ('".$username."','".$email."','".$password."',NOW(),NOW())");
      $idId=mysqli_insert_id($conn);

   
    $_SESSION['success']='User created successfully.'; 
	
$username = '';
$email = '';
 }   


  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Confer | Sign Up :: </title>
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
		<h2>Sign Up</h2>
		<form action="#" method="post">
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="username" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Email:</span>
				<input type="text" name="email" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			
			<div class="login-w3">
			  <input   type="submit" name="submit" id="submit"  value="Register Now">
					<!--<input type="submit" class="login" a href="login.html" value="submit"> -->
			</div>
			<div class="clearfix"></div>
		</form>
		<div class="back">
						<a href="index.html">Back to home</a>
				</div>
				<div class="footer">
					<p>&copy; 2016 Pooled . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
				</div>
	</div>
	</div>
	</div>
</body>
</html>