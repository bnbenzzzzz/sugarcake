<?php
session_start();
include("connect/connectdb.php");
include("./function/getNumOfCart.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
  <link rel=”shortcut icon” href="img/icon.ico" />
  <title>My order - history</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bakery_myorder3.css">
  <link rel="stylesheet" href="css/navbar.css">
  <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>




</head>

<body>
  <div class="container-fluid">

  <section id="navbar">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo.png" alt="" width="80">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active nav_menu" aria-current="page" href="index.php">หน้าหลัก</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav_menu" href="#เบเกอรี่" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ประเภทสินค้า</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
            $sql = mysqli_query($conn, "SELECT * from category ");
            while ($row = mysqli_fetch_array($sql)) { ?>
              <li><a class="dropdown-item nav_menu" href="bakery_cake.php?type_pd=<?php echo $row["cat_id"] ?>"><?php echo $row["cat_name"] ?></a></li>

            <?php  }
            ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_menu" href="./set.php">เซตสุดคุ้ม</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_menu" href="./outsite.php">จัดเซตเอง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_menu" href="./contact.php">ติดต่อเรา</a>
        </li>
        <li class="nav-item">

          <a class="nav-link" href="./bakery_mycart.php">
            <div class="box-noti">
              <p class="noti">
                <?php echo $numOfCart ?>
              </p>
              <p class="icon_cart"><i class="bi bi-cart4"></i></p>
            </div>
          </a>
        </li>
        <li id="mail" class="nav-item">
          <a id="mail_text" class="nav-link nav_menu" href="./bakery_sendback.php?pi=0">การตอบกลับ</a>
        </li>
        <li class="nav-item">
          <?php

          if ($numNoti >= 1) { ?>
            <a id="user_text" class="nav-link " href="./bakery_sendback.php?pi=0"><i class="bi bi-envelope-fill icon_mail2"></i></a>

          <?php } else { ?>
            <a id="user_text" class="nav-link " href="./bakery_sendback.php?pi=0"><i class="bi bi-envelope-fill icon_mail"></i></a>

          <?php }  ?>
        </li>
        <li id="cart" class="nav-item">
          <a id="cart_text" class="nav-link nav_menu" href="./bakery_mycart.php">ตะกร้าของฉัน</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./profile.php">
            <i class="bi bi-person-fill icon_user"></i>
          </a>
        </li>
        <li id="user" class="nav-item">
          <a id="user_text" class="nav-link nav_menu" href="./profile.php">โปรไฟล์</a>
        </li>

      </ul>
    </div>
  </div>
</nav> <!-- //nav// -->
</section> <!--  navbar  -->


    <h3 class="text_title">ออเดอร์ของฉัน</h3>



    <div class="container-fluid">
      <div class="row-btn">
        <?php
        $queryBTN = "SELECT * FROM purchaseorder WHERE user_username = '$username' AND purchase_status = 'ออเดอร์ผิดพลาด' ";
        $resultBTN = mysqli_query($conn, $queryBTN);
        $rowBTN = mysqli_num_rows($resultBTN); ?>
        <?php
        if ($rowBTN < 1) { ?>
          <div class="btn"><a class="btn-link" href="./bakery_myorder.php"><i class="bi bi-cash"></i> รอการยืนยันการชำระเงิน</a></div>
        <?php } else { ?>
          <div class="btn"><a class="btn-link btn-relative" href="./bakery_myorder.php"><i class="bi bi-cash"></i> รอการยืนยันการชำระเงิน <i class="noti1 bi bi-exclamation-circle-fill"></a></i></div>
        <?php } ?>
        <div class="btn"><a class="btn-link" href="./bakery_myorder2.php"><i class="bi bi-gift-fill"></i> ยืนยันการชำระเงินสำเร็จ</a></div>
        <div class="btn"><a class="btn-active" href="./bakery_myorder3.php"><i class="bi bi-clock-fill"></i> ประวัติการสั่งซื้อ</a></div>
      </div>
    </div>
    <?php
    $query = "SELECT * FROM purchaseorder WHERE( user_username = '$username' AND purchase_status = 'รับสินค้าแล้ว') OR
        ( user_username = '$username' AND purchase_status = 'ยกเลิกออเดอร์')
         ORDER BY purchase_id DESC";
    $result = mysqli_query($conn, $query);
    $rowNum = mysqli_num_rows($result);
    if($rowNum>0){
    while ($row = mysqli_fetch_array($result)) {
      $purchase_id = $row['purchase_id'];
    ?>
      <div class="row content-box">
        <div class="div-head">
            <p class="p-status1">สั่งซื้อเมื่อ <?php echo $row['created_at'] ?></p>
          <?php if (($row['deliver_type'] == 'take') && ($row['purchase_status']=='รับสินค้าแล้ว')) { ?>
            <p class="p-status2"><i class="bi bi-truck"></i> รับสินค้าเสร็จสิ้น</p>
          <?php } else if (($row['deliver_type'] == 'delivery') && ($row['purchase_status']=='รับสินค้าแล้ว')) {  ?>
            <p class="p-status2"><i class="bi bi-truck"></i> นำจ่ายสำเร็จ</p>
          <?php } else { ?>
            <p class="p-cancel"><i class="bi bi-x-circle-fill"></i> ยกเลิก</p>
            <?php } ?>
        </div>
        <div class="pd-detail">
          <table>
            <?php
            $queryDetail = "SELECT * FROM orderdetail 
                        JOIN product ON orderdetail.pd_id = product.pd_id  
                        WHERE purchase_id = '$purchase_id'";
            $resultDetail = mysqli_query($conn, $queryDetail);
            while ($rowDetail = mysqli_fetch_array($resultDetail)) {
              $IMG = $rowDetail['pd_id'];
            ?>
              <tr>
                <?php
                $queryIMG = "SELECT * FROM product_image WHERE pd_id = '$IMG' LIMIT 1";
                $resultIMG = mysqli_query($conn, $queryIMG);
                while ($rowIMG = mysqli_fetch_array($resultIMG)) {

                ?>
                  <td><img class="img-pd" src="<?php echo $rowIMG['img_url'] ?>" width="50" height="50" alt=""> </td>
                <?php } ?>
                <td><?php echo $rowDetail['pd_name'] ?></td>
                <td>x<?php echo $rowDetail['qty'] ?></td>
                <td><?php echo $rowDetail['price'] * $rowDetail['qty'] ?> ฿</td>
              </tr>
            <?php } ?>
            <?php
            $querySet = "SELECT * FROM orderdetail 
                        JOIN setbox ON orderdetail.set_id = setbox.set_id  
                        WHERE purchase_id = '$purchase_id'";
            $resultSet = mysqli_query($conn, $querySet);
            while ($rowSet = mysqli_fetch_array($resultSet)) {
            ?>
              <tr>

                <td><img class="img-pd" src="<?php echo $rowSet['set_img'] ?>" width="50" height="50" alt=""> </td>

                <td><?php echo $rowSet['set_name'] ?></td>
                <td>x<?php echo $rowSet['qty'] ?></td>
                <td><?php echo $rowSet['set_price'] * $rowSet['qty'] ?> ฿</td>
              </tr>
            <?php } ?>
          </table>
        </div>

        <div class="div-foot">
          <div class="div-review">
              <?php if($row['purchase_status']=='ยกเลิกออเดอร์'){
                } else { ?>
            <a href="./bakery_review.php?purchase_id=<?php echo $purchase_id; ?>"><button class="btn-review1"><i class="bi bi-chat-right-text-fill"></i> รีวิวร้าน</button></a>
            <?php
            $queryRate = "SELECT * FROM review WHERE purchase_id = '$purchase_id' ";
            $resultRate = mysqli_query($conn, $queryRate);
            $rowRate = mysqli_fetch_array($resultRate);
            $sqlNum = mysqli_num_rows($resultRate);
            if ($sqlNum >= 1) {
            ?>
              <div class="show-rate">
                <?php if ($rowRate['review_rate'] == 1) { ?>
                  <i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                <?php } else if ($rowRate['review_rate'] == 2) { ?>
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                <?php } else if ($rowRate['review_rate'] == 3) { ?>
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                <?php } else if ($rowRate['review_rate'] == 4) { ?>
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                <?php } else if ($rowRate['review_rate'] == 5) { ?>
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                <?php } ?>
              </div>
            <?php } else { ?>
              <b class="b-review">ยังไม่มีการรีวิว</b>
            <?php } ?>
            <?php } ?>


          </div>
          <h2 class="text-sumprice"><?php echo number_format($row['purchase_price']);  ?> ฿</h2>
        </div>
      </div>

      <?php } } else { ?>

<p class="p-empty">ไม่มีรายการ</p>
<img class="nodata" src="./logo/nodata.svg" alt="No data image">

<?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>