<?php
session_start();
include("connect/connectdb.php");
include("./function/getNumOfCart.php");
// if(!isset($_SESSION)){
//     session_start();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
  <link rel=”shortcut icon” href="img/icon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bakery_myorder2.css">
  <link rel="stylesheet" href="css/navbar.css">
  <title>My order - W</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


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
        <div class="btn"><a class="btn-active" href="./bakery_myorder2.php"><i class="bi bi-gift-fill"></i> ยืนยันการชำระเงินสำเร็จ</a></div>
        <div class="btn"><a class="btn-link" href="./bakery_myorder3.php"><i class="bi bi-clock-fill"></i> ประวัติการสั่งซื้อ</a></div>
      </div>
    </div>
    <?php
    $query = "SELECT * FROM purchaseorder WHERE purchase_status = 'อนุมัติออเดอร์แล้ว' AND user_username = '$username' ORDER BY purchase_id DESC ";
    $result = mysqli_query($conn, $query);
    $rowNum = mysqli_num_rows($result);
    if ($rowNum > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $rowAddress = $row['address_id'];
    ?>
        <?php
        if ($row['deliver_type'] == 'take') { ?>
          <section class="order-status">
            <h5 class="status-active"><i class="bi bi-calendar-check-fill"></i> รอวันรับสินค้า</h5>
          </section>

        <?php } elseif ($row['deliver_type'] == 'delivery' && $row['deliver_status'] == 1) { ?>
          <section class="order-status">
            <h5 class="status-active"><i class="bi bi-box-seam"></i> กำลังเตรียมสินค้า</h5> <i class="bi bi-arrow-right"></i>
            <h5 class="status-link"><i class="bi bi-truck"></i> จัดส่งสินค้าแล้ว</h5>
          </section>
        <?php } elseif ($row['deliver_type'] == 'delivery' && $row['deliver_status'] == 2) { ?>
          <section class="order-status">
            <h5 class="status-active"><i class="bi bi-box-seam"></i> กำลังเตรียมสินค้า</h5> <i class="bi bi-arrow-right"></i>
            <h5 class="status-active"><i class="bi bi-truck"></i> จัดส่งสินค้าแล้ว</h5>
            <!-- <a href="#"><h5 class="status-track">เลขพัสดุ : <?php echo $row['track_id']; ?></h5></a> -->
          </section>
        <?php }
        ?>


        <div class="row content-box">
          <div class="col-sm-12 col-md-4 mb col-line">
            <h4 class="title-name">การรับสินค้า (<?php
                                                  if ($row['deliver_type'] == 'take') {
                                                    echo "รับสินค้าเอง";
                                                  } elseif ($row['deliver_type'] == 'delivery') {
                                                    echo "ทางร้านจัดส่ง";
                                                  } else {
                                                    echo "อื่นๆ";
                                                  }
                                                  ?>)</h4>
            <?php
            if ($row['deliver_type'] == 'delivery') { ?>
              <div class="col-address">
                <?php
                // $username = $row["user_username"];
                $sqlAddress = "SELECT * FROM purchaseorder 
                                INNER JOIN address_tbl ON address_tbl.address_id = purchaseorder.address_id
                                INNER JOIN user ON address_tbl.user_username = user.user_username   WHERE user.user_username = '$username' AND purchaseorder.address_id = '$rowAddress' LIMIT 1";
                $resultAddress = mysqli_query($conn, $sqlAddress);
                $rowAddress = mysqli_fetch_array($resultAddress);
                $id_forshipping = $rowAddress['purchase_id'];
                $queryProvince = "SELECT * FROM provinces ";
                $resultProvince = mysqli_query($conn, $queryProvince);
                $queryAmphures = "SELECT * FROM amphures ";
                $resultAmphures = mysqli_query($conn, $queryAmphures);
                $queryDistricts = "SELECT * FROM districts ";
                $resultDistricts = mysqli_query($conn, $queryDistricts);
                ?>
                <p class="p-name"><?php echo $rowAddress['user_fname'] ?> <?php echo $rowAddress['user_lname'] ?></p>
                <p class="p-name"><?php echo $rowAddress['address_descript'] ?> <?php
                                                                                while ($rowDistricts = mysqli_fetch_assoc($resultDistricts)) {
                                                                                  if ($rowAddress['sub_district'] == $rowDistricts['id']) {
                                                                                    echo "ต." . $rowDistricts["name_th"];
                                                                                  }
                                                                                } ?></p>
                <p class="p-name"><?php while ($rowAmphures = mysqli_fetch_assoc($resultAmphures)) {
                                    if ($rowAddress['district'] == $rowAmphures['id']) {
                                      echo " อ." . $rowAmphures["name_th"];
                                    }
                                  } ?><?php while ($rowProvinces = mysqli_fetch_assoc($resultProvince)) {
                      if ($rowAddress['province'] == $rowProvinces['id']) {
                        echo " จ." . $rowProvinces["name_th"];
                      }
                    } ?> <?php echo $rowAddress['postcode'] ?></p>
                <p class="p-name"><?php echo $rowAddress['user_tel'] ?> <?php echo $rowAddress['user_email'] ?></p>
                <?php if ($row['deliver_status'] == 2) { ?> <br>
                  <section class="all-tracking">
                  <p class="status-track">หมายเลขพัสดุ  </p>
                  <input class="status-track3" type="text" value="<?php echo $row['track_id']; ?>" id="myInput">
                  <h5 onclick="myFunction()" class="status-track2"><i class="bi bi-clipboard"></i></h5><br>
                 
                 <?php $queryCom = "SELECT * FROM shippingcompany JOIN shipping_detail ON shippingcompany.company_id = shipping_detail.company_id
                 WHERE shipping_detail.purchase_id='$id_forshipping'";
                  $resultCom = mysqli_query($conn, $queryCom);
                  $rowCom = mysqli_fetch_array($resultCom) ?>
                  <a class="link-company" target="_blank" href="<?php echo $rowCom['company_url'] ?>">ตรวจสอบหมายเลขพัสดุ</a>
</section>
                <?php } else {
                } ?>

              </div>
            <?php } else { ?>
              <div class="col-address">
                <p class="p-name-title">กำหนดการรับสินค้า</p>
                <p class="p-name-1">วันที่ <?php echo $row['date_pickup'] ?></p>
                <p class="p-name-1">เวลา <?php echo $row['time_pickup'] ?> </p>
                <p class="p-name-1">สถานที่ : ร้าน Sugar cake 5 ถนน เกาะแก้ว ตำบลพนัสนิคม อำเภอพนัสนิคม ชลบุรี 20140 </p>
                <iframe class="map-address" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51208650.51623899!2d-8.530294499999998!3d38.4292718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d2fc18297f727%3A0x627e53924ded08f0!2sSugar%20Cake!5e0!3m2!1sen!2sth!4v1633444241214!5m2!1sen!2sth" allowfullscreen="" loading="lazy"></iframe>
              </div>
            <?php } ?>
          </div>
          <div class="col-sm-12 col-md-4 mb col-line">
            <h4 class="title-name">การชำระเงิน</h4>
            <div class="col-price">
              <div class="detail-price">
                <p class="p-price">ธนาคารไทยพานิชย์ จำกัด (มหาชน)</p>
                <p class="p-price bank">6785433800</p>
                <p class="p-price bank-name">Tanarat Arjprakhon</p>
                <p class="p-price bank-price"><?php
                                              if ($row['payment_status'] == '1') {
                                                echo number_format($row['purchase_price'], 2);
                                              } elseif ($row['payment_status'] == '2') {
                                                echo number_format($row['purchase_price'] / 2, 2);
                                              } else {
                                                echo "อื่นๆ";
                                              }
                                              ?> ฿</p>
              </div>
              <div class="img-price">
                <img class="img-fluid img-slip" src="<?php echo $row['payment_state'] ?>" alt="สลิปการแจ้งโอน">
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 mbt">
            <h4 class="title-name">สรุปรายการ <a href="#show<?php echo $row["purchase_id"]; ?>" class="span-btn title-name2" data-toggle="modal">ดูรายละเอียด</a></h4>
            <table class="table table-borderless">
              <tr>
                <td class="p-price">#<?php echo $row['purchase_number'] ?></td>
                <td></td>
              </tr>
              <tr>
                <td class="p-price">ค่าสินค้า</td>
                <td class="p-price p-right"><?php echo number_format($row['sumprice_pd'], 2) ?> ฿</td>
              </tr>
              <tr>
                <td class="p-price">ค่าจัดส่ง</td>
                <td class="p-price p-right"><?php echo number_format($row['shipping'], 2)  ?> ฿</td>
              </tr>
              <tr>
                <td class="p-price">รวมทั้งหมด</td>
                <td class="p-price p-right"><?php echo number_format($row['purchase_price'], 2)  ?> ฿</td>
              </tr>
              <tr>
                <td class="bank-price p-price">ที่ชำระ (<?php
                                                        if ($row['payment_status'] == '1') {
                                                          echo "จ่ายเต็ม";
                                                        } elseif ($row['payment_status'] == '2') {
                                                          echo "มัดจำ 50%";
                                                        } else {
                                                          echo "อื่นๆ";
                                                        }
                                                        ?>)</td>
                <td class="bank-price p-price p-right"><?php
                                                        if ($row['payment_status'] == '1') {
                                                          echo number_format($row['purchase_price'], 2);
                                                        } elseif ($row['payment_status'] == '2') {
                                                          echo number_format($row['purchase_price'] / 2, 2);
                                                        } else {
                                                          echo "อื่นๆ";
                                                        }
                                                        ?> ฿</td>
              </tr>
              <tr>
                <td class="p-price p-red">ที่ต้องชำระเพิ่ม</td>
                <td class="p-price p-right p-red"><?php
                                                  if ($row['payment_status'] == '1') {
                                                    echo number_format($row['purchase_price'] - $row['purchase_price'], 2);
                                                  } elseif ($row['payment_status'] == '2') {
                                                    echo number_format($row['purchase_price'] - ($row['purchase_price'] / 2), 2);
                                                  } else {
                                                    echo "อื่นๆ";
                                                  }
                                                  ?> ฿</td>
              </tr>
            </table>
            <?php include('modal/modal_detailorder.php'); ?>

          </div>
        </div>



      <?php }
    } else { ?>

      <p class="p-empty">ไม่มีรายการ</p>
      <img class="nodata" src="./logo/nodata.svg" alt="No data image">

    <?php } ?>


    <!-- สริปต์การทำงานเกี่ยวกับการคัดลอก Copy text -->
    <script>
      function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("คัดลอกหมายเลขพัสดุ: " + copyText.value);
      }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>