<?php
include('includes/config.php');
$conn = new mysqli("localhost","root","","conferemployee");
$query=mysqli_query($conn,"delete from dept_designation where id = '".$_GET['del_id']."'");
header ("Location: designation.php ");
?>
