<?php
include'dbconnect.php';

if(isset($_GET['id'])){
    $empId=$_GET['id'];
    // echo '<pre>';
    // print_r($empId);
    // exit;

    $sql="DELETE FROM `request` WHERE `id` = '$empId'"; 
    $result=mysqli_query($conn,$sql);
    header("location:request.php");
    

}



?>