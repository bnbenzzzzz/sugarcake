<?php 
include('connectdb.php');
$set_id=$_GET['set_id'];
$set_name = $_POST['set_name'];
$set_price = $_POST['set_price'];
$product1 = $_POST['product1'];
$product2 = $_POST['product2'];
$product3 = $_POST['product3'];
$product4 = $_POST['product4'];
$pic1 = "img/1.png";
$file1 = pathinfo(basename($_FILES['pic_index1']['name']), PATHINFO_EXTENSION);
$sqlFetchIMG = "SELECT * FROM setbox WHERE set_id = '$set_id'";
    $resultIMG = mysqli_query($conn, $sqlFetchIMG);
    $setIMG = mysqli_fetch_array($resultIMG);
    $rowSetIMG = $setIMG["set_img"];
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
    mysqli_query($conn,"UPDATE setbox set set_status=2 where set_id='$set_id'");
    $sqlCreateSet = "INSERT into setbox(set_name,set_price,set_img,set_status) values ('$set_name','$set_price','$pic1',1)";
    mysqli_query($conn, $sqlCreateSet);
    $sqlFetchId = "SELECT * FROM setbox WHERE set_name = '$set_name' ORDER BY set_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $setID = mysqli_fetch_array($resultID);
    $rowSetID = $setID["set_id"];
    $sqlDetail = "SELECT * FROM set_detail WHERE set_id = '$set_id'";
    $resultDetail = mysqli_query($conn, $sqlDetail);
    while ($rowDetail = mysqli_fetch_array($resultDetail)) {
        $old = $rowDetail['pd_id'];
        $sqlCreateImage = "INSERT INTO set_detail(set_id,pd_id) VALUES('$rowSetID','$old')";
        mysqli_query($conn, $sqlCreateImage);
        header('location:../backed_set.php');

    };
    
}else {
    mysqli_query($conn,"UPDATE setbox set set_status=2 where set_id='$set_id'");
    $sqlCreateSet = "INSERT into setbox(set_name,set_price,set_img,set_status) values ('$set_name','$set_price','$rowSetIMG',1)";
    mysqli_query($conn, $sqlCreateSet);
    $sqlFetchId = "SELECT * FROM setbox WHERE set_name = '$set_name' ORDER BY set_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $setID = mysqli_fetch_array($resultID);
    $rowSetID = $setID["set_id"];
    $rowSetIMG = $setID["set_img"];
    $sqlDetail = "SELECT * FROM set_detail WHERE set_id = '$set_id'";
    $resultDetail = mysqli_query($conn, $sqlDetail);
    while ($rowDetail = mysqli_fetch_array($resultDetail)) {
        $old = $rowDetail['pd_id'];
        $sqlCreateImage = "INSERT INTO set_detail(set_id,pd_id) VALUES('$rowSetID','$old')";
        mysqli_query($conn, $sqlCreateImage);
        header('location:../backed_set.php');
    };
};


?>