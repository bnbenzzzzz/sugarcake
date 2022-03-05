<?php session_start();
include "./connect/connectdb.php";
include "./function/getNumOfCart.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
  <link rel=”shortcut icon” href="img/icon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./navbar/styles.css" />
  <link rel="stylesheet" href="css/set.css">
  <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js" integrity="sha256-2JRzNxMJiS0aHOJjG+liqsEOuBb6++9cY4dSOyiijX4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <title>Set</title>

  <script>
    let qty = 0;

    function addset(set1_id) {
      let set_id = set1_id
      let qty = document.form1.input1.value
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // document.getElementById("page5").click();
          console.log(xhttp.responseText)
        }
      };
      xhttp.open("GET", "./function/insertsetToCart.php?save&set_id=" + set_id, true);
      xhttp.send();
      alert("เพิ่มสินค้าไปยังตะกร้าแล้ว");
      location.reload();
    }
  </script>


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
        <a class="menu-home menu-activenow" href="index.php">
          <i class="bi bi-house-door-fill"></i>
          <p class="p-text">หน้าแรก</p>
        </a>
        <a class="menu-chat" href="./contact.php">
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

    <h3 class="text_title">ชุดส่งสุดคุ้ม</h3>
    <section class="row-set">
      <?php
      $sqlSet = "SELECT * FROM setbox
         WHERE set_status != 0";
      $resultSet = mysqli_query($conn, $sqlSet);
      while ($rowSet = mysqli_fetch_array($resultSet)) {
        $SetID = $rowSet['set_id'];
      ?>
        <a href="./set_detail.php?set_id=<?php echo $SetID ?>">
          <div class="box-set">

            <div class="left">
              <img class="img-set" src="<?php echo $rowSet['set_img'] ?>" alt="รูปภาพเซต<?php echo $rowSet['set_name'] ?>">
            </div>
            <div class="right">
              <p class="set-name"><?php echo $rowSet['set_name'] ?></p>
              <?php
              $sqlDetail = "SELECT * FROM set_detail 
          JOIN  product ON set_detail.pd_id = product.pd_id 
          WHERE set_detail.set_id = $SetID";
              $resultDetail = mysqli_query($conn, $sqlDetail);
              $i = 1;
              $priceOld = 0;
              while ($rowDetail = mysqli_fetch_array($resultDetail)) {
              ?>
                <p class="product"><i class="bi bi-caret-right-fill"></i> <?php echo $rowDetail['pd_name'] ?> </p>
              <?php
    
               $i++;
               $priceOld += $rowDetail['pd_price'];
        
              } ?>
              <section class="price">
              <i class="bi bi-cash"></i>
                <div class="price-old">
                  <p class="price-little">ราคาซื้อแยก</p>
                <p class="price-big"><?php echo $priceOld ?> บาท</p>
              </div>
                <p class="price-new"><?php echo $rowSet['set_price'] ?> บาท</p>
              </section>
            </div>
          </div>
        </a>
      <?php } ?>

    </section>


  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</html>