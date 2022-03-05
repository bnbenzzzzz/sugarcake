<?php
include('connectdb.php');
$address_id = $_GET['address_id'];
$user_fname = $_POST['user_fname'];
$user_lname = $_POST['user_lname'];
$user_tel = $_POST['user_tel'];
$sub_add =$_POST['sub_add'];
$province_id =$_POST['province_id']; 
$amphure_id = $_POST['amphure_id'];
$district_id = $_POST['district_id'];
$postcode = $_POST['postcode'];

// $user_address = $_POST['user_address'];

$user_status = 1;

// $address = "SELECT * FROM address WHERE pd_name = '$pd_name' ORDER BY pd_id DESC LIMIT 1";

// mysqli_query($conn,"UPDATE user SET  where user_username='$user_username'");	
mysqli_query($conn,"UPDATE address_tbl SET address_descript='$sub_add', province='$province_id',district ='$amphure_id', sub_district = '$district_id', postcode='$postcode',fname='$user_fname', lname='$user_lname',tel ='$user_tel' where address_id='$address_id'");	

header('location:../bakery_newaddress.php');
 ?>