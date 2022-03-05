<?php
	include('connectdb.php');
	$com_name=$_POST['com_name'];
	$com_url=$_POST['com_url'];	
	$file1 = pathinfo(basename($_FILES['com_img']['name']), PATHINFO_EXTENSION);
	$pic1="img/car.jpg";
	if ($file1 != "") {
		$new_image_name = 'img' . uniqid() . "." . $file1;
		//echo $new_image_name;
		$image_path = "../img";
		$upload_path = $image_path . "/" . $new_image_name;
		//echo $upload_path;
	
		//uploading
		$upload = move_uploaded_file($_FILES['com_img']['tmp_name'], $upload_path);
		if ($upload == FALSE) {
			echo "ไม่สามารถ UPLOAD รูปภาพได้";
			exit();
		}
		$pro_image = $new_image_name;
		$pic1 = "img/".$pro_image;
	} 		
	$sqlCreateProduct = "INSERT into shippingcompany(company_name,company_url,company_img,company_status) values ('$com_name','$com_url','$pic1',1)";
	mysqli_query($conn, $sqlCreateProduct);
    header('location:../backed_category.php');
	
