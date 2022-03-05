<?php
	include('connectdb.php');
	
    $user_fname=$_POST['fname'];
    $user_lname=$_POST['lname'];
    $user_username=$_POST['username'];
    $user_pass=$_POST['password'];
    $user_email=$_POST['email'];
    $user_tel=$_POST['tel'];
    $user_birth=$_POST['BOD'];
    $user_gender=$_POST['gender'];
	$date = date("Y-m-d");
	
    $file = pathinfo(basename($_FILES['pic_index']['name']), PATHINFO_EXTENSION);
    $pic="img/pp.png";
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
	} 		

    $user_address=$_POST['address']; 
    $user_status=2;

    mysqli_query($conn,"INSERT INTO user ( user_fname,user_lname,user_username,user_pass,user_email,user_birth,user_tel,user_gender,user_img,user_address,user_status,date_register) values ('$user_fname','$user_lname','$user_username','$user_pass','$user_email','$user_birth','$user_tel','$user_gender','$pic','$user_address',2,'$date')");

	
	// mysqli_query($conn,"INSERT INTO user ( user_fname, user_lname, user_username, user_pass, user_email, user_tel, user_birth, user_gender,user_address, user_status) values 
    // ('$user_fname', '$user_lname','$user_username', '$user_pass', '$user_email', '$user_tel', '$user_birth', '$user_gender', '$user_address', '$user_status')");
	header('location:../backed_staff.php');

?>