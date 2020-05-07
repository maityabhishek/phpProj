<?php
include('includes/config.php');


if (isset($_POST['submit'])) {
if (empty($_POST['userid']) || empty($_POST['password'])) {
	
$error = "Username or Password is invalid";
}
else
{
	//echo"log in";
//exit();
// Define $username and $password
$username=$_POST['userid'];
$password=$_POST['password'];
$fpassword=md5($password);

$query = mysqli_query($conn,"select * from employee where  email='".$username."' and  password='".$fpassword."' ");
$result = mysqli_fetch_array($query);
//print_r($result);
//exit;
$rows = mysqli_num_rows($query);
if ($rows == 1) {
//$_SESSION['login_user']=$username; // Initializing Session
$_SESSION['login_user']['id']=$result['id'];
$_SESSION['login_user']['name']=$result['emp_name'];
//$_SESSION['login_user']['role']=$result['role'];
//header("location: login.php"); // Redirecting To Other Page
} else {
//$error = "Username or Password is invalid";
echo '<script language="javascript">';
        echo 'alert("Wrong Username or password")';
        echo '</script>';
}
mysqli_close($con); // Closing Connection
}
}

/*
if(isset($_POST['submit']))
	
{
  $uid = $_POST['userid'];
  $password = $_POST['password'];
  $password = md5($password);
  //echo $password;
  //exit;
  $result=mysqli_query($conn,"select * from employee where email='".$uid."' and password ='".$password."'");
  $row = mysqli_fetch_array($result);
  //print_r($row);
  //exit;
  $num = mysqli_num_rows($result);
  //echo $num;
  //exit;
  //$pwd = mysqli_fetch_assoc($result);
		
	if($num == 1)
	{
	 
			$_SESSION['user']['id'] = $row['emp_id'];
			$_SESSION['user']['name'] = $row['emp_name'];

	}
	if(isset($_SESSION['user'])){
		//print_r($_SESSION['user']);
		//exit;
		header('location: dashboard.php');
	}
	
}
  */
?>
