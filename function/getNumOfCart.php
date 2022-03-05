<?php
include './connect/connectdb.php';
// session_start();
if (isset($_SESSION['user_username'])) {
    $username = $_SESSION['user_username'];
    $sqlCheck = "SELECT * FROM purchaseorder WHERE user_username = '$username' AND purchase_status = 'ยังไม่สั่งซื้อ'";
    $resultCheck = mysqli_query($conn, $sqlCheck);
    $sqlFetchId = "SELECT * FROM purchaseorder WHERE user_username = '$username' ORDER BY purchase_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $rowID = mysqli_fetch_array($resultCheck);

    $sqlOrder = "SELECT * FROM purchaseorder WHERE (user_username = '$username' AND purchase_status = 'สั่งซื้อแล้วรอการอนุมัติ') OR (user_username = '$username' AND purchase_status = 'อนุมัติออเดอร์แล้ว')";
    $resultOrder = mysqli_query($conn, $sqlOrder);
    $numOrder =  mysqli_num_rows($resultOrder);


    $queryNoti = "SELECT * FROM sendback_all 
    INNER JOIN purchaseorder ON sendback_all.purchase_id = purchaseorder.purchase_id
    INNER JOIN user ON purchaseorder.user_username = user.user_username
                    WHERE purchaseorder.user_username = '$username' AND sendback_all.sendback_status = 1";
    $resultNoti = mysqli_query($conn, $queryNoti);
    $numNoti =  mysqli_num_rows($resultNoti);

    if ($rowID >= 1) {
        $rowPurchaseID = $rowID["purchase_id"];
        $sqlCheckDetail = "SELECT * FROM orderdetail WHERE purchase_id = '$rowPurchaseID'";
        $result = mysqli_query($conn, $sqlCheckDetail);
        $numOfCart =  mysqli_num_rows($result);
        // $sqlJoin = "SELECT * FROM orderdetail 
        // INNER JOIN product on orderdetail.pd_id = product.pd_id WHERE purchase_id = '$rowPurchaseID'";
        // $result2 = mysqli_query($conn, $sqlJoin);
    } else {
        $numOfCart = '0';
        $rowPurchaseID = '0';
    }
} else {
    $numOfCart = '0';
    $rowPurchaseID = '0';
    $numOrder = '0';
}
    // Update
