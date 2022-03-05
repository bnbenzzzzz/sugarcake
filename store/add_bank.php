<?php
include('../connect/connectdb.php');
$bank_name = $_POST['bank_name'];
$bank_no = $_POST['bank_no'];
$bank_cus = $_POST['bank_cus'];
$file1 = pathinfo(basename($_FILES['pic_index1']['name']), PATHINFO_EXTENSION);
$store_no = 6;
$pic1 = "";
$add_bank = $_POST['add_bank'];
$queryCon = "SELECT * FROM store WHERE store_no = 6";
$resultCon = mysqli_query($conn, $queryCon);
$rowCon = mysqli_fetch_array($resultCon);
if ($rowCon['qr_img'] != "") {
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
    } else {
        $pic1 = $rowCon['qr_img'];
    }
    if ($add_bank != "") {
        mysqli_query($conn, "INSERT into bank(banklist_name,store_no) values ('$add_bank',6)");
        $sqlUpdatebank = "UPDATE bank set bank_status=0";
        mysqli_query($conn, $sqlUpdatebank);
        $sqlSetbank = "UPDATE bank set bank_status=1 WHERE banklist_name = '$add_bank'";
        mysqli_query($conn, $sqlSetbank);
        $sqlInsertIMG = "UPDATE store set qr_img='$pic1',bank_name = '$add_bank',bank_no = $bank_no ,bank_cus = '$bank_cus' WHERE store_no ='$store_no'";
        mysqli_query($conn, $sqlInsertIMG);
        header('location:../backed_store.php');
    } else {
        $sqlUpdatebank = "UPDATE bank set bank_status=0";
        mysqli_query($conn, $sqlUpdatebank);
        $sqlSetbank = "UPDATE bank set bank_status=1 WHERE banklist_name = '$bank_name'";
        mysqli_query($conn, $sqlSetbank);
        $sqlInsertIMG = "UPDATE store set qr_img='$pic1',bank_name = '$bank_name',bank_no = $bank_no ,bank_cus = '$bank_cus' WHERE store_no ='$store_no'";
        mysqli_query($conn, $sqlInsertIMG);
        header('location:../backed_store.php');
    }
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
    if ($add_bank != "") {
        mysqli_query($conn, "INSERT into bank(banklist_name,store_no) values ('$add_bank',6)");
        $sqlUpdatebank = "UPDATE bank set bank_status=0";
        mysqli_query($conn, $sqlUpdatebank);
        $sqlSetbank = "UPDATE bank set bank_status=1 WHERE banklist_name = '$add_bank'";
        mysqli_query($conn, $sqlSetbank);
        $sqlInsertIMG = "UPDATE store set qr_img='$pic1',bank_name = '$add_bank',bank_no = $bank_no ,bank_cus = '$bank_cus' WHERE store_no ='$store_no'";
        mysqli_query($conn, $sqlInsertIMG);
        header('location:../backed_store.php');
    } else {
        $sqlUpdatebank = "UPDATE bank set bank_status=0";
        mysqli_query($conn, $sqlUpdatebank);
        $sqlSetbank = "UPDATE bank set bank_status=1 WHERE banklist_name = '$bank_name'";
        mysqli_query($conn, $sqlSetbank);
        mysqli_query($conn, $sqlSetbank);
        $sqlInsertIMG = "UPDATE store set qr_img='$pic1',bank_name = '$bank_name',bank_no = $bank_no ,bank_cus = '$bank_cus' WHERE store_no ='$store_no'";
        mysqli_query($conn, $sqlInsertIMG);
        header('location:../backed_store.php');
    }
}
