<?php
include('connectdb.php');

$promotion_name = $_POST['promotion_name'];
$type_use = $_POST['type_use'];
$type_pro = $_POST['type_pro'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$product1 = $_POST['product1'];
$product2 = $_POST['product2'];
$product3 = $_POST['product3'];
$product4 = $_POST['product4'];
$product5 = $_POST['product5'];
$product6 = $_POST['product6'];
$sumprice = $_POST['promotion_price'];
$promotion_price = $_POST['promotion_price'];
$file = pathinfo(basename($_FILES['promotion_img']['name']), PATHINFO_EXTENSION);
$promotion_img = "img/pp.png";
if ($file != "") {
	$new_image_name = 'img' . uniqid() . "." . $file;
	//echo $new_image_name;
	$image_path = "../img";
	$upload_path = $image_path . "/" . $new_image_name;
	//echo $upload_path;

	//uploading
	$upload = move_uploaded_file($_FILES['promotion_img']['tmp_name'], $upload_path);
	if ($upload == FALSE) {
		echo "ไม่สามารถ UPLOAD รูปภาพได้";
		exit();
	}
	$pro_image = $new_image_name;
	$promotion_img = "img/" . $pro_image;
}



$sql = "INSERT INTO promotion(promotion_name,promotion_start,promotion_end,total_price,promotion_type,promotion_status,promotion_img) values ('$promotion_name','$date_start','$date_end','$sumprice','$type_pro','$type_use','$promotion_img')";
$reult = mysqli_query($conn, $sql);
$sqlPro = "SELECT * FROM promotion WHERE promotion_name = '$promotion_name' LIMIT 1";
$resultPro = mysqli_query($conn, $sqlPro);
$fetchPro = mysqli_fetch_array($resultPro);
$ProID = $fetchPro["promotion_id"];

if ($product1 != "" && $product2 != "" ) {
	$sqlDetail1 = "INSERT INTO promotion_detail(promotion_id, pd_id) VALUES('$ProID','$product1')";
	$resultDetail1 = mysqli_query($conn, $sqlDetail1);
	$sqlDetail2 = "INSERT INTO promotion_detail(promotion_id, pd_id) VALUES('$ProID','$product2')";
	$resultDetail2 = mysqli_query($conn, $sqlDetail2);

} else if ($product3 != "" && $product4 != "" ) {
	$sqlDetail1 = "INSERT INTO promotion_detail(promotion_id, pd_id) VALUES('$ProID','$product3')";
	$resultDetail1 = mysqli_query($conn, $sqlDetail1);
	$sqlDetail2 = "INSERT INTO promotion_detail(promotion_id, pd_id) VALUES('$ProID','$product4')";
	$resultDetail2 = mysqli_query($conn, $sqlDetail2);
	$sqlDetail3 = "INSERT INTO promotion_detail(promotion_id, pd_id) VALUES('$ProID','$product5')";
	$resultDetail3 = mysqli_query($conn, $sqlDetail3);
} else {
	$sqlDetail1 = "INSERT INTO promotion_detail(promotion_id, pd_id) VALUES('$ProID','$product6')";
	$resultDetail1 = mysqli_query($conn, $sqlDetail1);
	
}
header('location:../backed_promotion.php');
