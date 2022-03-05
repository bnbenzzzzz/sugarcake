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
  <title>My order - W</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/bakery_myorder.css">
  <link rel="stylesheet" href="./navbar/styles.css" />
  <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>




</head>

<body>


  <header id="nav-desktop">
      <div id="brand"><a href="index.php"><img class="img-logo" src="img/logo.png" alt="logo"></a></div>
      <nav>
        <ul>
          <li><a href="index.php">หน้าแรก</a></li>
          <li><a href="contact.php">ร้านค้า</a></li>
          <li><a class="cart" href="bakery_myorder.php">
          <?php if($numOrder>0){ ?>
              <span class="num"><?php echo $numOrder ?></span>ออเดอร์ของฉัน
              <?php } else { ?>
            ออเดอร์ของฉัน <?php } ?>
          </a></li>
          <li><a class="cart" href="bakery_mycart.php">
            <?php if($numOfCart>0){ ?>
              <span class="num"><?php echo $numOfCart ?></span>ตะกร้าของฉัน
              <?php } else { ?>
            ตะกร้าของฉัน <?php } ?>
          </a></li>
          <li><a href="profile.php">
          <?php
         
          if (isset($_SESSION['user_username'])) {  
            $sqlUser = "SELECT * FROM user WHERE user_username = '$username' ";
          $resultUser = mysqli_query($conn, $sqlUser);
          $numUser =  mysqli_fetch_array($resultUser);?>
            <img class="img-profile" src="<?php echo $numUser['user_img'] ?>" alt="profile">
            <?php } else { ?>
              <img class="img-profile" src="img/user1.png" alt="profile">
              <?php } ?>
          </a></li>
        </ul>
      </nav>
    </header>

    <header id="hamburger-icon">
      <div class="mobile-menu">
        <a class="menu-home " href="index.php">
          <i class="bi bi-house-door-fill"></i>
          <p class="p-text">หน้าแรก</p>
        </a>
        <a class="menu-chat" href="./contact.php">
          <i class="bi bi-shop"></i>
          <p class="p-text">ร้านค้า</p>
        </a>
        <a class="menu-order menu-activenow cart" href="./bakery_myorder.php">
        <?php if($numOrder>0){ ?>
              <span class="num2"><?php echo $numOrder ?></span>
              <?php } else { ?>
                <?php } ?>
          <i class="bi bi-clipboard-check-fill"></i>
          <p class="p-text">ออเดอร์</p>
        </a>
        <a class="menu-cart cart" href="./bakery_mycart.php">
        <?php if($numOfCart>0){ ?>
              <span class="num2"><?php echo $numOfCart ?></span>
              <?php } else { ?>
                <?php } ?>
          <i class="bi bi-basket2-fill"></i>
          <p class="p-text">ตะกร้าของฉัน</p>
        </a>
        <a class="menu-profile" href="profile.php">
          <i class="bi bi-person-fill"></i>
          <p class="p-text">โปรไฟล์</p>
        </a>
      </div>
    </header>

<?php if (isset($_SESSION['user_username'])) { ?>

    <h3 class="text_title">ออเดอร์ของฉัน</h3>

    <div class="container-fluid">
      <section class="row-btn">
        <?php
        $queryBTN = "SELECT * FROM purchaseorder WHERE user_username = '$username' AND purchase_status = 'ออเดอร์ผิดพลาด' ";
        $resultBTN = mysqli_query($conn, $queryBTN);
        $rowBTN = mysqli_num_rows($resultBTN); ?>
        <?php
        if ($rowBTN < 1) { ?>
          <div class="btn"><a class="btn-active" href="./bakery_myorder.php"><i class="bi bi-cash"></i> รอการยืนยันการชำระเงิน</a></div>
        <?php } else { ?>
          <div class="btn"><a class="btn-active btn-relative" href="./bakery_myorder.php"><i class="bi bi-cash"></i> รอการยืนยันการชำระเงิน <i class="noti1 bi bi-exclamation-circle-fill"></a></i></div>
        <?php } ?>
        <div class="btn"><a class="btn-link" href="./bakery_myorder2.php"><i class="bi bi-gift-fill"></i> ยืนยันการชำระเงินสำเร็จ</a></div>
        <div class="btn"><a class="btn-link" href="./bakery_myorder3.php"><i class="bi bi-clock-fill"></i> ประวัติการสั่งซื้อ</a></div>
      </section>
    </div>
    <?php
    if ($rowBTN < 1) { ?>

    <?php } else { ?>
      <?php
      $queryHistory = "SELECT * FROM purchaseorder WHERE user_username = '$username' AND purchase_status = 'ออเดอร์ผิดพลาด' ORDER BY created_at DESC LIMIT 1 ";
      $resultHistory = mysqli_query($conn, $queryHistory);
      $rowHistory = mysqli_fetch_array($resultHistory);
      $rowHID = $rowHistory['purchase_id'];
      ?>
      <div class="div-warn">
        <a class="btn-history" href="#history<?php echo $rowHID ?>" data-toggle="modal"><i class="bi bi-telegram"></i> ดูประวัติตอบกลับ</a>
        <hr class="hr-line">
      </div>
    <?php } ?>

    <?php
    $query = "SELECT * FROM purchaseorder WHERE (user_username = '$username' AND purchase_status = 'สั่งซื้อแล้วรอการอนุมัติ') OR (user_username = '$username' AND purchase_status = 'ออเดอร์ผิดพลาด') ORDER BY purchase_id DESC";
    $result = mysqli_query($conn, $query);
    $rowNum = mysqli_num_rows($result);
    if ($rowNum > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $rowAddress = $row['address_id'];
        $purchase_id = $row['purchase_id'];

    ?>
          <section class="content-box">
            <div class="col-line">
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
                  <p class="p-name">โทร. <?php echo $rowAddress['user_tel'] ?> <br> <?php echo $rowAddress['user_email'] ?></p>

                </div>
              <?php } else { ?>
                <div class="col-address">
                  <section>
                  <p class="p-name-title">กำหนดการรับสินค้า</p>
                  <p class="p-name-1">วันที่ <?php echo $row['date_pickup'] ?></p>
                  <p class="p-name-1">เวลา <?php echo $row['time_pickup'] ?> </p>
                  <p class="p-name-1">สถานที่ : ร้าน Sugar cake 5 ถนน เกาะแก้ว ตำบลพนัสนิคม อำเภอพนัสนิคม ชลบุรี 20140 </p>
                  </section>
                  <iframe class="map-address" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51208650.51623899!2d-8.530294499999998!3d38.4292718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d2fc18297f727%3A0x627e53924ded08f0!2sSugar%20Cake!5e0!3m2!1sen!2sth!4v1633444241214!5m2!1sen!2sth" allowfullscreen="" loading="lazy"></iframe>
                </div>
              <?php } ?>
            </div>
            <?php
            $queryBank = "SELECT * FROM store WHERE store_no=6";
            $resultBank = mysqli_query($conn, $queryBank);
            $rowBank = mysqli_fetch_array($resultBank);
            ?>
            <div class="col-line">
              <h4 class="title-name">การชำระเงิน</h4>
              <?php if ($row['payment_state'] != '') { ?>
                <div class="col-price">

                  <div class="detail-price">

                    <p class="p-price"><?php echo $rowBank['bank_name'] ?></p>
                    <p class="p-price bank"><?php echo $rowBank['bank_no'] ?></p>
                    <p class="p-price bank-name"><?php echo $rowBank['bank_cus'] ?></p>
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
              <?php } else { ?>
                <div class="col-price2">

                  <div class="detail-price">

                  <p class="p-price"><?php echo $rowBank['bank_name'] ?></p>
                    <p class="p-price bank"><?php echo $rowBank['bank_no'] ?></p>
                    <p class="p-price bank-name"><?php echo $rowBank['bank_cus'] ?></p>
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
                  <div class="btn-pay">
                    <a class="btn-pay2" href="#paypay<?php echo $row["purchase_id"]; ?>" data-toggle="modal">ชำระเงิน</a>
                  </div>
                </div>
              <?php } ?>

            </div>
            <div class="col-last">
              <h4 class="title-name">สรุปรายการ <a href="#show<?php echo $row["purchase_id"]; ?>" class="span-btn title-name2" data-toggle="modal">ดูรายละเอียด</a></h4>

              <table class="table table-borderless">
                <tr>
                  <td class="p-price">#<?php echo $row['purchase_number'] ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="p-price">ค่าสินค้า</td>
                  <td class="p-price p-right"><?php echo number_format($row['sumprice_pd'], 2); ?> ฿</td>
                </tr>
                <tr>
                  <td class="p-price">ค่าจัดส่ง</td>
                  <td class="p-price p-right"><?php echo number_format($row['shipping'], 2);  ?> ฿</td>
                </tr>
                <tr>
                  <td class="p-price">รวมทั้งหมด</td>
                  <td class="p-price p-right"><?php echo number_format($row['purchase_price'], 2); ?> ฿</td>
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
                                                      echo $row['purchase_price'] - $row['purchase_price'];
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
          </section>

        <?php }
    } else { ?>

        <p class="p-empty">ไม่มีรายการ</p>
        <img class="nodata" src="./logo/nodata.svg" alt="No data image">

      <?php } ?>

      <?php } else { ?>
  <section class="btn-Gologin">
    <img class="img-buy" src="./logo/buy.svg" alt="รูปให้ลูกค้าเข้าสู่ระบบ">
    <p class="text-warn">กรุณาเข้าสู่ระบบเพื่ออรรถรสในการสั่งสินค้า</p>
    <div class="all-btn">
      <a class="btn-signup" href="./login.php">เข้าสู่ระบบ</a>
      <a class="btn-signin" href="./register.php">ลงทะเบียน</a>
    </div>
  </section>


<?php } ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>