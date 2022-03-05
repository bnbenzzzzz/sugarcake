<?php
include('connectdb.php');
$purchase_id = $_GET['purchase_id'];
$descript_back = $_POST['descript_back'];
$purchase_status = "สั่งซื้อแล้วรอการอนุมัติ";
$pic = "";
$file = pathinfo(basename($_FILES['file_index1']['name']), PATHINFO_EXTENSION);
$pic = "img/pp.png";
if ($file != "") {
    $new_image_name = 'img' . uniqid() . "." . $file;
    //echo $new_image_name;
    $image_path = "../img";
    $upload_path = $image_path . "/" . $new_image_name;
    //echo $upload_path;

    //uploading
    $upload = move_uploaded_file($_FILES['file_index1']['tmp_name'], $upload_path);
    if ($upload == FALSE) {
        echo "ไม่สามารถ UPLOAD รูปภาพได้";
        exit();
    }
    $pro_image = $new_image_name;
    $pic = "img/" . $pro_image;
}

// $query = "UPDATE sendback SET slip_after = '$pic', sendback_status = 1 WHERE purchase_id = '$purchase_id' ORDER BY sendback_id DESC";
// $result = mysqli_query($conn, $query);

$query = "INSERT INTO sendback(purchase_id,descript,slip_before,sendback_status) values ('$purchase_id','$descript_back','$pic',1)";
$result = mysqli_query($conn, $query);

echo "<script>alert('ทำการตอบกลับแล้ว รอทางแอดมินตรวจสอบอีกครั้งขอบคุณค่ะ')</script>";  
       echo "<script>window.location='../bakery_myorder.php'</script>";
// header('location:../bakery_myorder.php'); 
?>