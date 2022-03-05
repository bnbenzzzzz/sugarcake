<?php
include('connectdb.php');

$set_name = $_POST['set_name'];
$product1 = $_POST['list2'];
$product2 = $_POST['list4'];
$product3 = $_POST['list6'];
$product4 = $_POST['list8'];
$set_price = $_POST['sumprice'];
$set_qty = $_POST['group1'];
$file = pathinfo(basename($_FILES['set_img']['name']), PATHINFO_EXTENSION);
$set_img = "img/pp.png";
if ($file != "") {
	$new_image_name = 'img' . uniqid() . "." . $file;
	//echo $new_image_name;
	$image_path = "../img";
	$upload_path = $image_path . "/" . $new_image_name;
	//echo $upload_path;

	//uploading
	$upload = move_uploaded_file($_FILES['set_img']['tmp_name'], $upload_path);
	if ($upload == FALSE) {
		echo "ไม่สามารถ UPLOAD รูปภาพได้";
		exit();
	}
	$pro_image = $new_image_name;
	$set_img = "img/" . $pro_image;
}



$sql = "INSERT INTO setbox(set_name,set_qty,set_img,set_price,set_status) values ('$set_name','$set_qty','$set_img','$set_price',1)";
$reult = mysqli_query($conn, $sql);
$sqlSet = "SELECT * FROM setbox WHERE set_name = '$set_name' LIMIT 1";
$resultSet = mysqli_query($conn, $sqlSet);
$fetchSet = mysqli_fetch_array($resultSet);
$setID = $fetchSet["set_id"];

if ($set_qty == 2) {

	$sqlDetail1 = "INSERT INTO set_detail(set_id, pd_id) VALUES('$setID','$product1')";
	$resultDetail1 = mysqli_query($conn, $sqlDetail1);
	$sqlDetail2 = "INSERT INTO set_detail(set_id, pd_id) VALUES('$setID','$product2')";
	$resultDetail2 = mysqli_query($conn, $sqlDetail2);
} else if ($set_qty == 3) {
	$sqlDetail1 = "INSERT INTO set_detail(set_id, pd_id) VALUES('$setID','$product1')";
	$resultDetail1 = mysqli_query($conn, $sqlDetail1);
	$sqlDetail2 = "INSERT INTO set_detail(set_id, pd_id) VALUES('$setID','$product2')";
	$resultDetail2 = mysqli_query($conn, $sqlDetail2);
	$sqlDetail3 = "INSERT INTO set_detail(set_id, pd_id) VALUES('$setID','$product3')";
	$resultDetail3 = mysqli_query($conn, $sqlDetail3);
} else {
	$sqlDetail1 = "INSERT INTO set_detail(set_id, pd_id) VALUES('$setID','$product1')";
	$resultDetail1 = mysqli_query($conn, $sqlDetail1);
	$sqlDetail2 = "INSERT INTO set_detail(set_id, pd_id) VALUES('$setID','$product2')";
	$resultDetail2 = mysqli_query($conn, $sqlDetail2);
	$sqlDetail3 = "INSERT INTO set_detail(set_id, pd_id) VALUES('$setID','$product3')";
	$resultDetail3 = mysqli_query($conn, $sqlDetail3);
	$sqlDetail4 = "INSERT INTO set_detail(set_id, pd_id) VALUES('$setID','$product4')";
	$resultDetail4 = mysqli_query($conn, $sqlDetail4);
}
header('location:../backed_set.php');
