<?php
	include('connectdb.php');
    $com_id = $_GET['com_id'];
	$com_name=$_POST['com_name'];
	$com_url=$_POST['com_url'];	
	$file1 = pathinfo(basename($_FILES['com_img']['name']), PATHINFO_EXTENSION);
	$editCon = mysqli_query($conn, "SELECT * from shippingcompany where company_id='" . $com_id . "'");
    $rowCon = mysqli_fetch_array($editCon);
    $pic1 = $rowCon['company_img'];
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
	$sqlEditCompany = "UPDATE shippingcompany set company_name='$com_name',company_url='$com_url',company_img='$pic1',company_status=1 WHERE company_id='" . $com_id . "'";
	mysqli_query($conn, $sqlEditCompany);
    header('location:../backed_category.php');
	