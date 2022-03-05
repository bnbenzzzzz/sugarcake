<?php
include('connectdb.php');
$user_username = $_GET["user_username"];
// $user_username = $_POST['user_username'];
$user_fname = $_POST['user_fname'];
$user_lname = $_POST['user_lname'];
// $user_pass = $_POST['user_pass'];
$user_tel = $_POST['user_tel'];
$user_email = $_POST['user_email'];
$user_birth = $_POST['user_birth'];
$user_gender = $_POST['user_gender'];
$user_address = $_POST['user_address'];
$province_id = $_POST['province_id'];
$amphure_id = $_POST['amphure_id'];
$district_id = $_POST['district_id'];
$sub_add = $_POST['sub_add'];
$postcode = $_POST['postcode'];



if ($user_gender == 'ชาย'){
    $gender_cus = 1;
}else if($user_gender == 'หญิง'){
    $gender_cus = 2;
}else{
    $gender_cus = 3;
}


$user_address = $_POST['user_address'];
$user_status = 1;
$file = pathinfo(basename($_FILES['pic_index']['name']), PATHINFO_EXTENSION);
if ($file != "") {
    $new_image_name = 'img' . uniqid() . "." . $file;
    //echo $new_image_name;
    $image_path = "../img";
    $upload_path = $image_path . "/" . $new_image_name;
    //echo $upload_path;

    //uploading
    $upload = move_uploaded_file($_FILES['pic_index']['tmp_name'], $upload_path);
    if ($upload == FALSE) {
        echo "ไม่สามารถ UPLOAD รูปภาพได้";
        exit();
    }
    $pro_image = $new_image_name;
    $pic = "img/".$pro_image;


mysqli_query($conn,"UPDATE user SET user_img='$pic', user_fname='$user_fname', user_lname='$user_lname', user_tel ='$user_tel',user_email='$user_email',user_birth='$user_birth' where user_username='$user_username'");	

}else {
	mysqli_query($conn,"UPDATE user SET user_fname='$user_fname', user_lname='$user_lname',user_tel ='$user_tel',user_email='$user_email',user_birth='$user_birth' where user_username='$user_username'");	
}

header('location:../edit_profile.php');
?>