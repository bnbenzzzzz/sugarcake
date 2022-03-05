<?php
include('connectdb.php');

$pn = $_GET['pn'];
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



$sql = "INSERT INTO sendback(sendback_no,descript,slip_before,sendback_type) values ('$pn','$descript','$pic',0)";
$reult = mysqli_query($conn, $sql);


header("location:../backed_purchaseSendback.php?pn=$pn");
?>