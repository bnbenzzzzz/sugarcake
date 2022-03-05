<?php
include('connectdb.php');

$purchase_id = intval($_GET["purchase_id"]);
$staff = $_GET["pi"];

$sql = "SELECT * FROM purchaseorder WHERE purchase_id = $purchase_id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

if ($row['purchase_status'] == "สั่งซื้อแล้วรอการอนุมัติ") {
    $new_status = 'อนุมัติออเดอร์แล้ว';
    
	mysqli_query($conn,"UPDATE purchaseorder set purchase_status='$new_status',staff= '$staff'where purchase_id='$purchase_id'");
    header('location:../backed_purchaseorder.php');
} 
else if ($row['purchase_status'] != "สั่งซื้อแล้วรอการอนุมัติ") {
    $new_status = 'รับสินค้าแล้ว';
    
	mysqli_query($conn,"UPDATE purchaseorder set purchase_status='$new_status'where purchase_id='$purchase_id'");
    header('location:../backed_purchaseAccepted.php');
} 


 ?>

