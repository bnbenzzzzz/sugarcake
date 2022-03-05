<?php
	include('connectdb.php');
	$pd_name=$_POST['pd_name'];
	$pd_price=$_POST['pd_price'];	
	$pd_des=$_POST['pd_des'];	
	$cat_id= $_POST['category'];
	$pd_time = $_POST['pd_time'];
	$type_get = $_POST['type_get'];
	$file1 = pathinfo(basename($_FILES['pic_index1']['name']), PATHINFO_EXTENSION);
	$file2 = pathinfo(basename($_FILES['pic_index2']['name']), PATHINFO_EXTENSION);
	$file3 = pathinfo(basename($_FILES['pic_index3']['name']), PATHINFO_EXTENSION);
	$pic1="img/1.png";
	$pic2="img/1.png";
	$pic3="img/1.png";
	if ($file1 != "") {
		$new_image_name = 'img' . uniqid() . "." . $file1;
		//echo $new_image_name;
		$image_path = "../img";
		$upload_path = $image_path . "/" . $new_image_name;
		//echo $upload_path;
	
		//uploading
		$upload = move_uploaded_file($_FILES['pic_index1']['tmp_name'], $upload_path);
		if ($upload == FALSE) {
			echo "ไม่สามารถ UPLOAD รูปภาพได้";
			exit();
		}
		$pro_image = $new_image_name;
		$pic1 = "img/".$pro_image;
	} 		
	if ($file2 != "") {
		$new_image_name = 'img' . uniqid() . "." . $file2;
		//echo $new_image_name;
		$image_path = "../img";
		$upload_path = $image_path . "/" . $new_image_name;
		//echo $upload_path;
	
		//uploading
		$upload = move_uploaded_file($_FILES['pic_index2']['tmp_name'], $upload_path);
		if ($upload == FALSE) {
			echo "ไม่สามารถ UPLOAD รูปภาพได้";
			exit();
		}
		$pro_image = $new_image_name;
		$pic2 = "img/".$pro_image;
	} 		
	if ($file3 != "") {
		$new_image_name = 'img' . uniqid() . "." . $file3;
		$image_path = "../img";
		$upload_path = $image_path . "/" . $new_image_name;
		$upload = move_uploaded_file($_FILES['pic_index3']['tmp_name'], $upload_path);
		if ($upload == FALSE) {
			echo "ไม่สามารถ UPLOAD รูปภาพได้";
			exit();
		}
		$pro_image = $new_image_name;
		$pic3 = "img/".$pro_image;
	} 		
	$sqlCreateProduct = "INSERT into product(pd_name,pd_price,pd_des,cat_id,pd_time,pickup_type) values ('$pd_name','$pd_price','$pd_des','$cat_id','$pd_time','$type_get')";
	mysqli_query($conn, $sqlCreateProduct);
    $sqlFetchId = "SELECT * FROM product WHERE pd_name = '$pd_name' ORDER BY pd_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $pdID = mysqli_fetch_array($resultID);
    $rowPurchaseID = $pdID["pd_id"];
	if($file1 != "" && $file2 == "" && $file3 == ""){
$sqlCreateImage = "INSERT INTO product_image(pd_id,img_url) VALUES('$rowPurchaseID','$pic1')";
    mysqli_query($conn, $sqlCreateImage);
    header('location:../backed_product.php');
	}else if($file1 != "" && $file2 != "" && $file3 == ""){
		$sqlCreateImage1 = "INSERT INTO product_image(pd_id,img_url) VALUES('$rowPurchaseID','$pic1')";
    mysqli_query($conn, $sqlCreateImage1);
		$sqlCreateImage2 = "INSERT INTO product_image(pd_id,img_url) VALUES('$rowPurchaseID','$pic2')";
    mysqli_query($conn, $sqlCreateImage2);
    header('location:../backed_product.php');
	}else if($file1 != "" && $file2 != "" && $file3 != ""){
		$sqlCreateImage1 = "INSERT INTO product_image(pd_id,img_url) VALUES('$rowPurchaseID','$pic1')";
    mysqli_query($conn, $sqlCreateImage1);
		$sqlCreateImage2 = "INSERT INTO product_image(pd_id,img_url) VALUES('$rowPurchaseID','$pic2')";
    mysqli_query($conn, $sqlCreateImage2);
		$sqlCreateImage3 = "INSERT INTO product_image(pd_id,img_url) VALUES('$rowPurchaseID','$pic3')";
    mysqli_query($conn, $sqlCreateImage3);
    header('location:../backed_product.php');
	}
