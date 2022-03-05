<?php
include('connectdb.php');
$user_fname = $_POST['user_fname'];
$user_lname = $_POST['user_lname'];
$user_username = $_POST['user_username'];
$user_email = $_POST['user_email'];
$user_birth = $_POST['user_birth'];
$user_gender = $_POST['user_gender'];
$user_tel = $_POST['user_tel'];
$user_address = $_POST['user_addresss'];


$user_status = 3;


mysqli_query($conn,"UPDATE user SET user_fname='$user_fname', user_lname='$user_lname',user_username='$user_username',user_email='$user_email', user_birth='$user_birth', user_gender='$user_gender', user_tel='$user_tel', user_address='$user_address' where user_username='$user_username'");	
	// header('location:../backed_profile.php');





