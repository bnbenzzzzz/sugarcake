<?php 
include('connectdb.php');
$address_id=$_GET['address_id'];

mysqli_query($conn,"DELETE FROM address_tbl WHERE address_id='$address_id'");
// header('location:../bakery_newaddress.php')
?>
