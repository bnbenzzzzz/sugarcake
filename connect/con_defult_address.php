<?php

include('connectdb.php');
$address_id = $_GET['address_id'];
$queryaddress = "SELECT * FROM address_tbl WHERE address_id = $address_id";
$resultaddress = mysqli_query($conn, $queryaddress);
$rowaddress = mysqli_fetch_array($resultaddress);
mysqli_query($conn, "UPDATE address_tbl SET address_type=1 WHERE address_id='$address_id'");

$querynewaddress = "SELECT * FROM address_tbl WHERE address_id != $address_id";
$resultnewaddress = mysqli_query($conn, $querynewaddress);
while ($rownewaddress = mysqli_fetch_array($resultnewaddress)) {
    mysqli_query($conn, "UPDATE address_tbl SET address_type=0 WHERE address_id!='$address_id'");
}

header('location:../bakery_newaddress.php')

?>

