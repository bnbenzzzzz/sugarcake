<?php
session_start();
include('../connect/connectdb.php');
if (!isset($_GET['purchase_id']) or !isset($_GET['purchase_price'])) {
    exit();
}
$purchase_id = $_GET['purchase_id'];
$purchase_price = $_GET['purchase_price'];
$username = $_SESSION['user_username'];
$purchase_type = "online";
$purchase_status = "สั่งซื้อแล้วรอการอนุมัติ";
$payment_type = "promptpay";
$payment_status = 1;
$deliver_type = "take";
$deliver_status = 1;
$sqlCheck = "UPDATE purchaseorder SET purchase_status = '$purchase_status' , purchase_price = '$purchase_price' , deliver_type = '$deliver_type', payment_type = '$payment_type' WHERE user_username = '$username' AND purchase_id = '$purchase_id'";
$resultCheck = mysqli_query($conn, $sqlCheck);
echo "<script>window.location='../bakery_myorder.php'</script>";

?>

