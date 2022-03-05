<?php
include('../connect/connectdb.php');
$p_id = $_GET['purchase_id'];
$descript = $_POST['descript'];
$price_dis = $_POST['price_dis'];
$pass = $_POST['pass'];
$status = "แก้บิล";


$queryCon = "SELECT * FROM user WHERE user_status = 3";
$resultCon = mysqli_query($conn, $queryCon);
$rowCon = mysqli_fetch_array($resultCon);
$queryPer = "SELECT * FROM purchaseorder WHERE purchase_id = $p_id";
$resultPer = mysqli_query($conn, $queryPer);
$rowPer = mysqli_fetch_array($resultPer);
$price1 = $rowPer['purchase_price'];
$username = $rowPer['user_username'];
$price = $price1 - $price_dis;
if ($rowCon['user_pass'] != md5($pass)) {

    echo "<script>window.alert('รหัสผ่านไม่ถูกต้องโปรดลองอีกครั้ง')</script>";
    echo "<script>window.location='../backed_purchaseHtr.php'</script>";
} else {
    $sqlInsertIMG = "UPDATE purchaseorder set purchase_status='$status',purchase_price = '$price',discount = '$price_dis' WHERE purchase_id ='$p_id'";
    mysqli_query($conn, $sqlInsertIMG);
    mysqli_query($conn, "INSERT into ordererrors(purchase_id,price_discount,note) values ('$p_id','$price_dis','$descript')");
    $queryChat = "SELECT * FROM sendback_all WHERE purchase_id='$p_id' ";
    $resultChat = mysqli_query($conn, $queryChat);
    $resultTest = mysqli_query($conn, $queryChat);
    $rowNum = mysqli_num_rows($resultChat);
    $rowPN = mysqli_fetch_array($resultTest);
    if($rowNum>=1){
        $pn = $rowPN['sendback_no'];
        $sqlInsertSB = "INSERT INTO sendback(sendback_no,descript,sendback_type) values ('$pn','$descript',1)";
		$reultInsertSB = mysqli_query($conn, $sqlInsertSB);
    }else {
        $sqlInsert = "INSERT INTO sendback_all(purchase_id,sendback_status,user_username) values ('$p_id',1,'$username')";
		$reultInsert = mysqli_query($conn, $sqlInsert);
		$selectNO = mysqli_query($conn, "select * FROM sendback_all WHERE purchase_id=$p_id ");
		$rowNO = mysqli_fetch_array($selectNO);
		$pn = $rowNO['sendback_no'];
		$sql = "INSERT INTO sendback(sendback_no,descript,sendback_type) values ('$pn','$descript',0)";
		$reult = mysqli_query($conn, $sql);
    }

    
    echo "<script>window.alert('ส่งสำเร็จ')</script>";
    echo "<script>window.location='../backed_purchaseSendback.php?pn=$pn'</script>";
}
