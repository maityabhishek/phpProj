<?php
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost","root","","conferemployee");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>