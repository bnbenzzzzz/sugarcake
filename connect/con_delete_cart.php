<?php 
include('connectdb.php');
$pd_id=$_GET['pd_id'];
$set_id = $_GET['set_id'];
mysqli_query($conn, "DELETE FROM orderdetail WHERE pd_id='$pd_id'");
header('location:../bakery_mycart.php')
?>

