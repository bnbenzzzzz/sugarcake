<?php
include('connectdb.php');

$purchase_id = $_GET["purchase_id"];
$new_status1 = "ยกเลิกออเดอร์";

mysqli_query($conn, "UPDATE purchaseorder set purchase_status='$new_status1'where purchase_id='$purchase_id'");
mysqli_query($conn, "UPDATE sendback_all set sendback_status=0 where purchase_id='$purchase_id'");


echo "<script>alert('ยกเลิกออเดอร์แล้ว')</script>";  
echo "<script>window.location='../backed_purchaseSendback.php?pn=0'</script>";

// header('location:../backed_purchaseSendback.php?pn=0');
