<?php
include('connectdb.php');

$user_username = $_GET['user_username'];
$new_fname = $_POST['new_fname'];
$new_lname = $_POST['new_lname'];
$new_tel = $_POST['new_tel'];
$new_province = $_POST['new_province'];
$new_district = $_POST['new_district'];
$new_subdis = $_POST['district_id'];
$new_postcode = $_POST['postcode'];
$new_address = $_POST['sub_add'];

// echo $new_fname . $new_lname . $new_tel .$new_province .'<br>'.
// $new_district . $new_subdis . $new_postcode ;


// $sqlUser = "INSERT INTO user(user_username,new_fname,new_lname,new_tel) VALUE ('$user_username','$new_fname','$new_lname','$new_tel')";
// $resultUser = mysqli_query($conn,$sqlUser);

$sqlAddress = "INSERT INTO address_tbl(province,district,sub_district,address_descript,postcode,fname,lname,tel,user_username) VALUE 
('$new_province','$new_district','$new_subdis','$new_address','$new_postcode','$new_fname','$new_lname','$new_tel','$user_username')"; 
$resultAddress = mysqli_query($conn,$sqlAddress);

header('location:../bakery_newaddress.php')

?>