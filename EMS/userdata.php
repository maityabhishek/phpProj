<?php

include('includes/config.php');
	$emp_id=0;
	$emp_name=0;
	$email=0;
	$privilege=0;
if(isset($_REQUEST['empid']))
{
$emp_id = $_REQUEST['empid'];
$result=mysqli_query($conn,"select * from employee where emp_id='".$emp_id."'");
$userinfo = mysqli_fetch_assoc($result);

$emp_name=$userinfo['emp_name'];
$email=$userinfo['email'];
$privilege=0;

echo $emp_id;
echo $emp_name;
echo $email;

}

			
?>
