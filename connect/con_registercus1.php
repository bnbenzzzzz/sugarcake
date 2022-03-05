<?php
	include('connectdb.php');
	$user_username = $_POST['username'];
	$user_fname = $_POST['fname'];
	$user_lname = $_POST['lname'];
	$user_pass2 = $_POST['password'];
	$user_email = $_POST['email'];
	$user_tel = $_POST['tel'];
	$user_birth = $_POST['BOD'];
	$user_gender = $_POST['gender'];
	// $province_id = $_POST['province_id'];
	// $amphure_id = $_POST['amphure_id'];
	// $district_id = $_POST['district_id'];
	// $sub_add = $_POST['sub_add'];
	// $postcode = $_POST['postcode'];
	$user_pass = md5($user_pass2);
	$date = date("Y-m-d");
    $file = pathinfo(basename($_FILES['user_img']['name']), PATHINFO_EXTENSION);
    $pic="img/pp.png";
	if ($file != "") {
		$new_image_name = 'img' . uniqid() . "." . $file;
		//echo $new_image_name;
		$image_path = "../img";
		$upload_path = $image_path . "/" . $new_image_name;
		//echo $upload_path;
	
		//uploading
		$upload = move_uploaded_file($_FILES['user_img']['tmp_name'], $upload_path);
		if ($upload == FALSE) {
			echo "ไม่สามารถ UPLOAD รูปภาพได้";
			exit();
		}
		$pro_image = $new_image_name;
		$pic = "img/".$pro_image;
	} 		
	$queryCheck = "SELECT * FROM user WHERE user_username='$user_username'  ";
	$resultCheck = mysqli_query($conn, $queryCheck);
	$numuser = mysqli_num_rows($resultCheck);
	if($numuser>0){
		echo "<script>alert('มีชื่อผู้ใช้นี้แล้วโปรดเปลี่ยนชื่อผู้ใช้ของคุณ')</script>";  
		echo "<script>window.location='../register.php'</script>";
	}else {
    $sql = "INSERT INTO user(user_fname,user_lname,user_username,user_pass,user_email,user_birth,user_tel,user_gender,user_img,user_status,date_register) 
    values ('$user_fname','$user_lname','$user_username','$user_pass','$user_email','$user_birth','$user_tel','$user_gender','$pic',1,'$date')";
    $reult=mysqli_query($conn,$sql);

    $sqlAddress = "INSERT INTO address_tbl(address_type,province,district,sub_district,address_descript,postcode,user_username) 
    values (1,'$province_id','$amphure_id','$district_id','$sub_add','$postcode','$user_username')";
    $reultAddress=mysqli_query($conn,$sqlAddress);

	echo "<script>alert('ลงทะเบียนสำเร็จ โปรดทำการเข้าสู่ระบบ')</script>";  
	echo "<script>window.location='../login.php'</script>";
}
?>