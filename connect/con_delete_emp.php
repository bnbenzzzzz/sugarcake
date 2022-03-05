<?php 
include('connectdb.php');
$pd_id=$_GET['pd_id'];
mysqli_query($conn,"UPDATE product set pd_status= 1 where pd_id='$pd_id'");
header('location:../backed_product.php')
?>

