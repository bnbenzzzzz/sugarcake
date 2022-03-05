<?php
include('connectdb.php');

$purchase_id = $_GET['purchase_id'];
$description = $_POST['descript'];
$sendback_type = $_POST['sendback_type'];
$select_track = $_POST['select_track'];
$new_status = "ออเดอร์ผิดพลาด";
$sql = "SELECT * FROM purchaseorder WHERE purchase_id = $purchase_id";
if($sendback_type=='1'){
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $slip_before = $row['payment_state'];
    $sqlCreateSB = "INSERT INTO sendback(purchase_id,descript,slip_before,sendback_type) values ('$purchase_id','$description','$slip_before','$sendback_type')";
    $reultSB = mysqli_query($conn, $sqlCreateSB);
    mysqli_query($conn,"UPDATE purchaseorder set purchase_status='$new_status'where purchase_id='$purchase_id'");
    header('location:../backed_purchaseorder.php');
}else {
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $slip_before = $row['payment_state'];
    $sqlCreateSB = "INSERT INTO sendback(purchase_id,descript,slip_before,sendback_type) values ('$purchase_id','$description','$slip_before','$sendback_type')";
    $reultSB = mysqli_query($conn, $sqlCreateSB);
    $queryShipping = "SELECT * FROM sendback WHERE sendback_type = 2 ORDER BY sendback_id DESC LIMIT 1 ";
    $resulShipping = mysqli_query($conn, $queryShipping);
    $rowShipping = mysqli_fetch_array($resulShipping);
    $sbID = $rowShipping['sendback_id'];
    mysqli_query($conn,"UPDATE purchaseorder set deliver_status=2 , track_id = '$description' where purchase_id='$purchase_id'");
    $sqlCreateTrack = "INSERT INTO shipping_detail(company_id,sendback_id) values ('$select_track','$sbID')";
    $reultTrack = mysqli_query($conn, $sqlCreateTrack);

    
    header('location:../backed_purchaseAccepted.php');
}

 ?>

