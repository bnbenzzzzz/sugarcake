<?php
include('../connect/connectdb.php');
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$line = $_POST['line'];
$add = $_POST['add'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$file1 = pathinfo(basename($_FILES['pic_index1']['name']), PATHINFO_EXTENSION);
$store_no = 6;
$pic1 = "";
$queryCon = "SELECT * FROM store WHERE store_no = 6";
$resultCon = mysqli_query($conn, $queryCon);
$rowCon = mysqli_fetch_array($resultCon);
if ($rowCon['logo_img'] != "") {
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
    }else {
        $pic1 = $rowCon['logo_img'];
    }
    $sqlInsertIMG = "UPDATE store set logo_img='$pic1',fb_link = '$facebook',ig_link = '$instagram' ,line_link = '$line',address_store = '$add', latitude ='$latitude', longitude = '$longitude'  WHERE store_no ='$store_no' ";
    mysqli_query($conn, $sqlInsertIMG);
    header('location:../backed_store.php');
    

} else {
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
    }
    $sqlInsertIMG = "UPDATE store set logo_img='$pic1',fb_link = '$facebook',ig_link = '$instagram' ,line_link = '$line',address_store = '$add', latitude ='$latitude', longitude = '$longitude'  WHERE store_no ='$store_no'";
    mysqli_query($conn, $sqlInsertIMG);
    header('location:../backed_store.php');
}
