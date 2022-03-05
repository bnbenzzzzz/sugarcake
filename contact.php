<?php
session_start();
include "./connect/connectdb.php";
include "./function/getNumOfCart.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ddd -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
  <link rel=”shortcut icon” href="img/icon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="./navbar/styles.css" />
  <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>

<body>
  <div class="contain--fluid">

    <header id="nav-desktop">
      <div id="brand"><a href="index.php"><img class="img-logo" src="img/logo.png" alt="logo"></a></div>
      <nav>
        <ul>
          <li><a href="index.php">หน้าแรก</a></li>
          <li><a href="contact.php">ร้านค้า</a></li>
          <li><a class="cart" href="bakery_myorder.php">
              <?php if ($numOrder > 0) { ?>
                <span class="num"><?php echo $numOrder ?></span>ออเดอร์ของฉัน
              <?php } else { ?>
                ออเดอร์ของฉัน <?php } ?>
            </a></li>
          <li><a class="cart" href="bakery_mycart.php">
              <?php if ($numOfCart > 0) { ?>
                <span class="num"><?php echo $numOfCart ?></span>ตะกร้าของฉัน
              <?php } else { ?>
                ตะกร้าของฉัน <?php } ?>
            </a></li>
          <li><a href="profile.php">
              <?php

              if (isset($_SESSION['user_username'])) {
                $sqlUser = "SELECT * FROM user WHERE user_username = '$username' ";
                $resultUser = mysqli_query($conn, $sqlUser);
                $numUser =  mysqli_fetch_array($resultUser); ?>
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
        <a class="menu-chat menu-activenow" href="./contact.php">
          <i class="bi bi-shop"></i>
          <p class="p-text">ร้านค้า</p>
        </a>
        <a class="menu-order cart" href="./bakery_myorder.php">
          <?php if ($numOrder > 0) { ?>
            <span class="num2"><?php echo $numOrder ?></span>
          <?php } else { ?>
          <?php } ?>
          <i class="bi bi-clipboard-check-fill"></i>
          <p class="p-text">ออเดอร์</p>
        </a>
        <a class="menu-cart cart" href="./bakery_mycart.php">
          <?php if ($numOfCart > 0) { ?>
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

    <?php
    $queryStore = "SELECT * FROM store WHERE store_no = 6";
    $resultStore = mysqli_query($conn, $queryStore);
    $rowStore = mysqli_fetch_array($resultStore)
    ?>


    <img class="bg1" src="<?php echo $rowStore['main_img_contact'] ?>" alt="">



    <div class="div-title">
      <h2 class="text_title">สามารถติดต่อเราได้ที่</h2>
    </div>




    <section class="icon-contact">
      <a href="<?php echo $rowStore['fb_link'] ?>" target="_blank"><img src="img/icon/fb.png"  alt="facebook logo"></a>
      <a href="<?php echo $rowStore['ig_link'] ?>" target="_blank"><img src="img/icon/ig.png"  alt="instragram logo"></a>
      <a href="<?php echo $rowStore['line_link'] ?>" target="_blank"><img src="img/icon/line.png"  alt="line logo"></a>
    </section>

    <div class="row-address">
      <img src="<?php echo $rowStore['bg_img_contact'] ?>" alt="รูปภาพตกแต่ง" class="bg_img">
      <div class="div-address">
        <h2>ที่อยู่ติดต่อ</h2>
        <h4 class="h4-address"><?php echo $rowStore['address_store'] ?></h4>
      </div>
    </div>

    <div class="map">
    <iframe class="map" src="https://maps.google.com/maps?q=<?php echo $rowStore['latitude']; ?>,<?php echo $rowStore['longitude']; ?>&output=embed"></iframe>
    </div>

    <footer class="footer">
      <p>©2021 Sugar Cake All right reserved</p>
    </footer>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>