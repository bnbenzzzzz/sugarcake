
<?php
session_start();
include('connectdb.php');

$purchase_id = $_GET['purchase_id'];
$user_username = $_SESSION['user_username'];
$purchase_status = "สั่งซื้อแล้วรอการอนุมัติ";
$query = "UPDATE purchaseorder SET purchase_status = $purchase_status WHERE user_username = '$username' AND purchase_id = '$purchase_id'";
$result = mysqli_query($conn, $query);


header('location:../profile.php');  
?>
