<?php
session_start();
include('../connect/connectdb.php');
if (!isset($_GET['product_id']) or !isset($_GET['qty'])) {
    exit();
}
$qty = $_GET['qty'];
$product_id = $_GET['product_id'];
$total_price = $_GET['total_price'];
$product_price = $_GET['product_price'];
$username = $_SESSION['user_username'];
$purchase_type = "online";
$purchase_status = "ยังไม่สั่งซื้อ";
$payment_type = "";
$payment_status = 1;
$deliver_type = "";
$deliver_status = 1;
$sqlCheck = "SELECT * FROM purchaseorder WHERE user_username = '$username' AND purchase_status = 'ยังไม่สั่งซื้อ'";
$resultCheck = mysqli_query($conn, $sqlCheck);
print_r($resultCheck);

if (mysqli_num_rows($resultCheck) > 0) {
    $pd_id = array();
    $sqlFetchId = "SELECT * FROM purchaseorder WHERE user_username = '$username' ORDER BY purchase_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $rowID = mysqli_fetch_array($resultID);
    $rowPurchaseID = $rowID["purchase_id"];
    $sqlCheckDetail = "SELECT * FROM orderdetail WHERE purchase_id = '$rowPurchaseID'";
    $result = mysqli_query($conn, $sqlCheckDetail);
    while ($row1 = mysqli_fetch_array($result)) {
        if ($row1["pd_id"] == $product_id) {
            $pd_id[] = $row1["pd_id"]; 
            $rowQty = $row1["qty"] ;
        } else if ($row1["pd_id"] != $product_id) {
            $pd_id[] = '';
            // $sql = "INSERT INTO orderdetail(pd_id,qty,price,purchase_id) VALUES($product_id,$qty,'$product_price','$rowPurchaseID')";
            // $result1 = mysqli_query($conn, $sql);
        }
    }
    if(in_array($product_id, $pd_id)){
        $sql = "UPDATE orderdetail SET qty = $qty WHERE pd_id = '$product_id'AND purchase_id = '$rowPurchaseID'";
        $result1 = mysqli_query($conn, $sql);
    }else{
            $sql = "INSERT INTO orderdetail(pd_id,qty,price,purchase_id) VALUES($product_id,$qty,'$product_price','$rowPurchaseID')";
            $result1 = mysqli_query($conn, $sql);
    }
} else {
    $sqlCreateOrder = "INSERT INTO purchaseorder(purchase_price,user_username,purchase_type,purchase_status,payment_type,payment_status,payment_state,deliver_type,deliver_status) VALUES ($total_price,'$username','$purchase_type','$purchase_status','$payment_type',$payment_status,'$payment_state','$deliver_type',$deliver_status)";
    mysqli_query($conn, $sqlCreateOrder);
    $sqlFetchId = "SELECT * FROM purchaseorder WHERE user_username = '$username' ORDER BY purchase_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $rowID = mysqli_fetch_array($resultID);
    $rowPurchaseID = $rowID["purchase_id"];
    $sql = "INSERT INTO orderdetail(pd_id,qty,price,purchase_id) VALUES($product_id,$qty,'$product_price','$rowPurchaseID')";
    mysqli_query($conn, $sql);
}



for ($i = 0; $i < count($list_product); $i++) {
    $prod = $list_product[$i];
    $sub_qty = $list_qty[$i];
    $sqlPrice = "SELECT * FROM product WHERE pd_id = '$prod'";
    $resultPrice = mysqli_query($conn, $sqlPrice);
    $rowPrice = mysqli_fetch_array($resultPrice);
    $qty_amount = $rowPrice["pd_qty"];
    $rowPrice = $rowPrice["pd_price"];
    $sqlDetail = "INSERT INTO orderdetail(pd_id,qty,purchase_id,price) VALUES('$prod','$sub_qty','$rowID',$rowPrice)";
    $resultDetail = mysqli_query($conn, $sqlDetail);
    $totalqty = $qty_amount - $sub_qty;
    $sqlUpdate = "UPDATE product SET pd_qty = $totalqty WHERE pd_id = '$prod'";
    mysqli_query($conn, $sqlUpdate);
    echo "<script>console.log('" . $sub_qty . "')</script>";
    echo "<script>console.log('" . $qty_amount . "')</script>";
}



if (mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO cart(pd_id,qty,user_username) VALUES($product_id,$qty,'$username')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        exit();
    }
    echo 'insert success';
} else {
    $oldData = mysqli_fetch_assoc($result);
    $newQty = $oldData['qty'] + $qty;
    $sql = "UPDATE cart SET qty = $newQty WHERE user_username = '$username' and pd_id = $product_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'update success';
    }
}
