<?php
session_start();
include('../connect/connectdb.php');

$sqlSet = "SELECT * FROM store WHERE store_no = 6";
$resultSet = mysqli_query($conn, $sqlSet);
$rowSet = mysqli_fetch_array($resultSet);
$aa = $rowSet['setcus_status'];
if($rowSet['setcus_status']==0){
    $sql = "UPDATE store SET setcus_status = 1 WHERE store_no = 6";
        $result1 = mysqli_query($conn, $sql);
        echo "<script>window.location = '../backed_set.php'</script>";

}else{
    $sql = "UPDATE store SET setcus_status = 0 WHERE store_no = 6";
    $result1 = mysqli_query($conn, $sql);
    echo "<script>window.location = '../backed_set.php'</script>";

}
?>

