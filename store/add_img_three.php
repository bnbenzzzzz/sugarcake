<?php
include('../connect/connectdb.php');
$img_url = $_POST['text_img'];
$file1 = pathinfo(basename($_FILES['pic_index1']['name']), PATHINFO_EXTENSION);
$store_no = 6 ;
$pic1 = "";
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
    $pic1 = "img/" . $pro_image;

    $sqlInsertIMG = "UPDATE store set bg_img_home='$pic1'WHERE store_no ='$store_no'";
    mysqli_query($conn, $sqlInsertIMG);
    header('location:../backed_store.php');
} else if ($file1 == "" && $img_url != "") {
    $pic1 = $img_url;
    $sqlInsertIMG = "UPDATE store set bg_img_home='$pic1'WHERE store_no ='$store_no'";
	mysqli_query($conn, $sqlInsertIMG);
    header('location:../backed_store.php');
} else {
    echo "<script>window.alert('กรุณาเลือกรูปภาพ')</script>";
	echo "<script>window.location='../backed_store.php'</script>";
}
