<?php
include('connectdb.php');

$purchase_id = $_GET["purchase_id"];
$new_status = "ยกเลิกออเดอร์";
  
	mysqli_query($conn,"UPDATE purchaseorder set purchase_status='$new_status'where purchase_id='$purchase_id'");
    header('location:../backed_notpaid.php');

 ?>

