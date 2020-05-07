<?php
include('includes/config.php');
$conn = new mysqli("localhost","root","","conferemployee");
$holid=$_REQUEST['holid'];
$query=mysqli_query($conn,"delete from holiday_lists where id = '".$holid."' ");
echo $query;
header ("Location: holiday.php ");
?>
