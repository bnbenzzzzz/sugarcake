<?php
include('connectdb.php');
$user_id = $_GET["user_id"];
$user_username = $_POST['user_username'];
$user_fname = $_POST['user_fname'];
$user_lname = $_POST['user_lname'];
// $user_pass = $_POST['user_pass'];
$user_email = $_POST['user_email'];
$user_tel = $_POST['user_tel'];
$user_birth = $_POST['user_birth'];
$user_gender = $_POST['user_gender'];
$user_address = $_POST['user_address'];
$user_status = 2;



mysqli_query($conn,"UPDATE user SET user_username='$user_username',user_fname='$user_fname', user_lname='$user_lname',user_email='$user_email',user_tel='$user_tel',user_birth='$user_birth', user_gender='$user_gender', user_address='$user_address' where user_id='$user_id'");	
	header('location:../backed_staff.php');





