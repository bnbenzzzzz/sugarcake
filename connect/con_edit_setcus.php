<?php
include('connectdb.php');

$setcus_qty = $_POST['setcus_qty'];
$setcus_discount = $_POST['setcus_discount'];

$sql = "UPDATE store SET setcus_qty = '$setcus_qty',setcus_discount = '$setcus_discount' WHERE store_no = 6";
        $result1 = mysqli_query($conn, $sql);

header('location:../backed_set.php');
