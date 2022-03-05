<?php
session_start();
include('connectdb.php');
$user_username = $_SESSION['user_username'];
$purchase_id = $_GET["purchase_id"];
$purchase_price = $_POST['sumprice'];
$purchase_status = "สั่งซื้อแล้วรอการอนุมัติ";
$payment_type = "promptpay";
$payment_status = $_POST['deli'];
$deliver_type = $_POST['deli1'];
$deliver_status = 1;
$purchase_qty = $_POST['qty'];
$sumprice_pd = $_POST['sumprice_pd'];
$shipping = $_POST['shipping1'];
$date_pickup = $_POST['date-get'];
$time_pickup = $_POST['time-get'];
$old_address = $_POST['old_address'];
$new_fname = $_POST['new_fname'];
$new_lname = $_POST['new_lname'];
$new_tel = $_POST['new_tel'];
$new_email = $_POST['new_email'];
$new_province = $_POST['new_province'];
$new_district = $_POST['new_district'];
$new_subdis = $_POST['new_subdis'];
$new_postcode = $_POST['new_postcode'];
$new_address = $_POST['new_address'];
$address_type=1;
$date1 = "OL";
$date2 = date('Ymd');
$date3 = substr($date2,2,6);
$file = pathinfo(basename($_FILES['pic_index']['name']), PATHINFO_EXTENSION);
$pic = "";
// echo $purchase_price;
$pasepurchase_price = str_replace(",","",$purchase_price);
$pasesumprice_pd = str_replace(",","",$sumprice_pd);

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
	$pic = "img/" . $pro_image;
}

if ($new_province !="") {
	$sqlCreateAddress = "INSERT INTO  address_tbl(address_type,province,district,sub_district,address_descript,postcode,user_username) VALUES('$address_type','$new_province','$new_district','$new_subdis','$new_address','$new_postcode','$user_username')";
	mysqli_query($conn, $sqlCreateAddress);
	$sqlFetchId = "SELECT * FROM address_tbl WHERE user_username = '$user_username' ORDER BY address_id DESC LIMIT 1";
	$resultAddress = mysqli_query($conn, $sqlFetchId);
	$rowAddress = mysqli_fetch_array($resultAddress);
    $rowAddressID = $rowAddress["address_id"];

	$query = "UPDATE purchaseorder SET purchase_price = '$pasepurchase_price', purchase_status = '$purchase_status', payment_type = '$payment_type', payment_status = '$payment_status', payment_state = '$pic', deliver_type ='$deliver_type', deliver_status = '$deliver_status', purchase_qty = '$purchase_qty', sumprice_pd = '$pasesumprice_pd', shipping = '$shipping', date_pickup = '$date_pickup', time_pickup = '$time_pickup', address_id = '$rowAddressID' WHERE user_username = '$user_username' AND purchase_id = '$purchase_id'";
	$result = mysqli_query($conn, $query);
	header('location:../bakery_myorder.php');
} else {
	$query = "UPDATE purchaseorder SET purchase_price = '$pasepurchase_price', purchase_status = '$purchase_status', payment_type = '$payment_type', payment_status = '$payment_status', payment_state = '$pic', deliver_type ='$deliver_type', deliver_status = '$deliver_status', purchase_qty = '$purchase_qty', sumprice_pd = '$pasesumprice_pd', shipping = '$shipping', date_pickup = '$date_pickup', time_pickup = '$time_pickup', address_id = '$old_address', purchase_number = '$date3$date1$purchase_id' WHERE user_username = '$user_username' AND purchase_id = '$purchase_id'";
	$result = mysqli_query($conn, $query);
	header('location:../bakery_myorder.php');
}
