<?php
session_start();
include('./connect/connectdb.php');
include "./function/getNumOfCart.php";

?>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bakery_product.css">
  <link rel="stylesheet" href="./navbar/styles.css" />
  <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

  <title>Product detail</title>
  <script>
    function addToCart(product_id) {
      const product_id = product_id
      let qty = document.form1.input1.value
      alert(product_id, qty)
    }
  </script>
</head>

<body>
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

    <section class="row-allpd">

      <?php
      $product_id = $_GET['product_id'];
      $sql = "SELECT * FROM product WHERE pd_id = $product_id";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) == 0 or mysqli_num_rows($result) == null) {
        exit;
      }
      $row = mysqli_fetch_assoc($result);
      include './function/getNumOfCart.php';
      ?>
      <div class="card_index" id="box">
        <div class="col-left">
          <section class="card">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">


              <div class="carousel-inner">
                <?php
                $sqlImg = "SELECT * FROM product_image WHERE pd_id = '$product_id' ";
                $result2 = mysqli_query($conn, $sqlImg);
                $row3 = mysqli_fetch_array($result2)
                ?>
                <div class="carousel-item active">
                  <img src="<?php echo $row3['img_url'] ?>" class="d-block w-100 img-slide" alt="รูปสินค้า<?php echo $row['pd_name'] ?>">
                </div>
                <?php
                while ($row2 = mysqli_fetch_array($result2)) { ?>
                  <div class="carousel-item ">
                    <img src="<?php echo $row2['img_url'] ?>" class="d-block w-100 img-slide" alt="รูปสินค้า<?php echo $row['pd_name'] ?>">
                  </div>
                <?php } ?>

              </div>


              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </section>
        </div>
        <div class="col-right">
          <div class="detail">
            <div class="detail-litle">
              <h4 class="pd-name"><?php echo $row['pd_name'] ?></h4>
              <p class="pd-des"><?php echo $row['pd_des'] ?></p>
            </div>
          </div>
          <div class="detail">
            <div class="detail-litle2">
              <p class="pd-price"><i class="bi bi-cash-coin"></i> ชิ้นละ <?php echo $row['pd_price'] ?> บาท</p>
              <p class="pd-price pd-time"><i class="bi bi-clock-history"></i> ใช้เวลาเตรียมสินค้า <?php echo $row['pd_time'] ?> วัน </p>
              <?php if ($row['pickup_type'] == "ร่วมการจัดส่ง") { ?>
                <p class="pd-price shipping"><i class="bi bi-truck"></i></i> สินค้า<?php echo $row['pickup_type'] ?> </p>
              <?php } else { ?>
                <p class="pd-price pickup"><i class="bi bi-shop"></i> สินค้า<?php echo $row['pickup_type'] ?> </p>
              <?php } ?>
            </div>
          </div>
          <?php
          $sql_num = "SELECT * FROM purchaseorder INNER JOIN orderdetail
                  ON purchaseorder.purchase_id = orderdetail.purchase_id WHERE purchaseorder.purchase_id = '$rowPurchaseID' AND pd_id = $product_id";
          $result_num = mysqli_query($conn, $sql_num);
          $numOfCart1 =  mysqli_num_rows($result_num);
          $row_num = mysqli_fetch_array($result_num);
          $numrow = mysqli_num_rows($result_num);

          if ($numrow == 0) {
            $value = 1;
          } else {
            $value = $row_num['qty'];
          }
          ?>
          <section class="btn-add">
            <form class="form1" name=form1>
              <input class="btn-de" type="button" value=" - " onclick="(document.form1.input1.value > 1) ? document.form1.input1.value-- : true">
              <input class="btn-num" name="input1" value="<?php echo $value ?>" size=4 onfocus="buffer=this.value" onchange="if (isNaN(this.value)) {this.value=buffer}">
              <input class="btn-pl" type=button value=" + " onclick="document.form1.input1.value++">
            </form>

            <button type="button" class="btn-addpd btn-lg" data-toggle="modal" data-target="#success" onclick="addcart(<?php echo $row['pd_id'] ?>, <?php echo $row['pd_price'] ?>)"><i class="bi bi-basket2-fill"></i> เพิ่มไปยังตะกร้า</button>
          </section>

          <script>
            function addcart(pd_id, pd_price) {
              const product_id = pd_id
              const product_price = pd_price
              let qty = document.form1.input1.value
              let total_price = product_price * qty
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  // document.getElementById("page5").click();
                  console.log(xhttp.responseText)
                }
              };
              xhttp.open("GET", "./function/insertToCart.php?product_id=" + product_id + "&qty=" + qty + "&product_price=" + product_price + "&total_price=" + total_price, true);
              xhttp.send();
              alert("เพิ่มสินค้าไปยังตะกร้าแล้ว");
              location.reload();
            }
          </script>
        </div>

      </div>

    </section>

    <h5 class="pd-etc">สินค้าอื่น ๆ</h5>

    <section class="pd-ot">
    <?php
          $sqlRan = "SELECT pd_id FROM product WHERE pd_status =0 ORDER BY RAND() LIMIT 4;";
          $resultRan = mysqli_query($conn, $sqlRan);
          while ($rowRan = mysqli_fetch_array($resultRan)) {
            $rowPDRan = $rowRan["pd_id"];
            $queryTopRan = "SELECT * FROM product
        JOIN product_image ON product.pd_id = product_image.pd_id
        WHERE product.pd_id = $rowPDRan 
        ";
         $resultTopRan = mysqli_query($conn, $queryTopRan);
         $ShowDetailPDRan = mysqli_fetch_array($resultTopRan);
          ?>
            <div class="card-pd">
              <a href="bakery_product.php?product_id=<?php echo $rowPDRan ?>">
                <div class="card_index2">
                  <img src="<?php echo $ShowDetailPDRan["img_url"]  ?>" class="card-img-top2" alt="รูปภาพสินค้า">
                  <p class="card-text-name"><?php echo $ShowDetailPDRan["pd_name"]  ?></p>
                  <p class="card-text-price">ราคา <?php echo $ShowDetailPDRan["pd_price"]  ?> บาท/ชิ้น</p>
                  <?php if ($ShowDetailPDRan["pickup_type"] == "ร่วมการจัดส่ง") { ?>
                    <section class="p-text-detail">
                      <p class="card-text-deli">ร่วมการจัดส่ง</p>
                      <p class="card-text-deli"><i class="bi bi-clock-history"></i> <?php echo $ShowDetailPDRan["pd_time"]  ?> วัน</p>
                    </section>
                  <?php } else { ?>
                    <section class="p-text-detail">
                      <p class="card-text-pic">รับที่ร้านเท่านั้น</p>
                      <p class="card-text-pic"><i class="bi bi-clock-history"></i> <?php echo $ShowDetailPDRan["pd_time"]  ?> วัน</p>
                    </section>
                  <?php } ?>
                </div>
              </a>
            </div>
          <?php } ?>
    </section>






</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>