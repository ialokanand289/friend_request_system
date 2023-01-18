<?php
session_start();
include'dbconnect.php';
$empId=$_GET['id'];
$sql=" UPDATE `request` SET request_status='Confirm' WHERE id='".$empId."'";
$result=mysqli_query($conn,$sql);
header("location:request.php");

?>
