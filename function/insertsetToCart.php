<?php
session_start();
include('../connect/connectdb.php');
if (isset($_GET['save']) ) {

$qty = $_GET['qty'];
$set_id = $_GET['set_id'];
$total_price = $_GET['total_price'];
$set_price = $_GET['set_price'];
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
    $setbox_id = array();
    $sqlFetchId = "SELECT * FROM purchaseorder WHERE user_username = '$username' ORDER BY purchase_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $rowID = mysqli_fetch_array($resultID);
    $rowPurchaseID = $rowID["purchase_id"];
    $sqlCheckDetail = "SELECT * FROM orderdetail WHERE purchase_id = '$rowPurchaseID'";
    $result = mysqli_query($conn, $sqlCheckDetail);
    while ($row1 = mysqli_fetch_array($result)) {
        if ($row1["set_id"] == $set_id) {
            $setbox_id[] = $row1["set_id"]; 
            // $rowQty = $row1["qty"] ;
        } else if ($row1["pd_id"] != $product_id) {
            $setbox_id[] = '';
            // $sql = "INSERT INTO orderdetail(pd_id,qty,price,purchase_id) VALUES($product_id,$qty,'$product_price','$rowPurchaseID')";
            // $result1 = mysqli_query($conn, $sql);
        }
    }
    if (in_array($set_id, $setbox_id)) {
             
             $sql = "UPDATE orderdetail SET qty = $qty WHERE set_id = '$set_id'AND purchase_id = '$rowPurchaseID'";
                $result1 = mysqli_query($conn, $sql);
        } else {
            // $set_id[] = '';
           $sql = "INSERT INTO orderdetail(set_id,purchase_id,qty) VALUES($set_id,'$rowPurchaseID','$qty')";
            $result1 = mysqli_query($conn, $sql);
           
        }
    // if(in_array($set_id, $set_id)){
    //     $sql = "UPDATE orderdetail SET qty = $qty WHERE set_id = '$set_id'AND purchase_id = '$rowPurchaseID'";
    //     $result1 = mysqli_query($conn, $sql);
    // }else{
    //         $sql = "INSERT INTO orderdetail(set_id,price,purchase_id) VALUES($set_id,'$total_price','$rowPurchaseID')";
    //         $result1 = mysqli_query($conn, $sql);
    // }
} else {
    $sqlCreateOrder = "INSERT INTO purchaseorder(user_username,purchase_type,purchase_status) VALUES ('$username','$purchase_type','$purchase_status')";
    mysqli_query($conn, $sqlCreateOrder);
    $sqlFetchId = "SELECT * FROM purchaseorder WHERE user_username = '$username' ORDER BY purchase_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $rowID = mysqli_fetch_array($resultID);
    $rowPurchaseID = $rowID["purchase_id"];
    $sql = "INSERT INTO orderdetail(set_id,qty,purchase_id) VALUES($set_id,$qty,'$rowPurchaseID')";
    mysqli_query($conn, $sql);
}



// for ($i = 0; $i < count($list_product); $i++) {
//     $prod = $list_product[$i];
//     $sub_qty = $list_qty[$i];
//     $sqlPrice = "SELECT * FROM product WHERE pd_id = '$prod'";
//     $resultPrice = mysqli_query($conn, $sqlPrice);
//     $rowPrice = mysqli_fetch_array($resultPrice);
//     $qty_amount = $rowPrice["pd_qty"];
//     $rowPrice = $rowPrice["pd_price"];
//     $sqlDetail = "INSERT INTO orderdetail(pd_id,qty,purchase_id,price) VALUES('$prod','$sub_qty','$rowID',$rowPrice)";
//     $resultDetail = mysqli_query($conn, $sqlDetail);
//     $totalqty = $qty_amount - $sub_qty;
//     $sqlUpdate = "UPDATE product SET pd_qty = $totalqty WHERE pd_id = '$prod'";
//     mysqli_query($conn, $sqlUpdate);
//     echo "<script>console.log('" . $sub_qty . "')</script>";
//     echo "<script>console.log('" . $qty_amount . "')</script>";
// }



// if (mysqli_num_rows($result) == 0) {
//     $sql = "INSERT INTO cart(pd_id,qty,user_username) VALUES($product_id,$qty,'$username')";
//     $result = mysqli_query($conn, $sql);
//     if (!$result) {
//         exit();
//     }
//     echo 'insert success';
// } else {
//     $oldData = mysqli_fetch_assoc($result);
//     $newQty = $oldData['qty'] + $qty;
//     $sql = "UPDATE cart SET qty = $newQty WHERE user_username = '$username' and pd_id = $product_id";
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         echo 'update success';
//     }
// }
}