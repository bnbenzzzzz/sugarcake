<?php
include('connectdb.php');

$pi = $_GET['pi'];
$descript = $_POST['embed'];
$file = pathinfo(basename($_FILES['pic_index1']['name']), PATHINFO_EXTENSION);
$pic = "";
if ($file != "") {
	$new_image_name = 'img' . uniqid() . "." . $file;
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
	$pic = "img/" . $pro_image;
}

$selectCheck = mysqli_query($conn, "select * FROM sendback_all WHERE purchase_id=$pi ");
	$rowCheck = mysqli_num_rows($selectCheck);
	if ($rowCheck > 0) {
		$selectNO = mysqli_query($conn, "select * FROM sendback_all WHERE purchase_id=$pi ");
		$rowNO = mysqli_fetch_array($selectNO);
		$pn = $rowNO['sendback_no'];
		$sql = "INSERT INTO sendback(sendback_no,descript,slip_before,sendback_type) values ('$pn','$descript','$pic',1)";
		$reult = mysqli_query($conn, $sql);
	} else {
		$sqlInsert = "INSERT INTO sendback_all(purchase_id,sendback_status) values ('$pi',1)";
		$reultInsert = mysqli_query($conn, $sqlInsert);
		$selectNO = mysqli_query($conn, "select * FROM sendback_all WHERE purchase_id=$pi ");
		$rowNO = mysqli_fetch_array($selectNO);
		$pn = $rowNO['sendback_no'];
		$sql = "INSERT INTO sendback(sendback_no,descript,slip_before,sendback_type) values ('$pn','$descript','$pic',1)";
		$reult = mysqli_query($conn, $sql);
	}
    header("location:../bakery_sendback.php?pi=$pi");