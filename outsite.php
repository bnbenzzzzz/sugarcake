<?php
session_start();
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
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/outsite.css">
  <link rel="stylesheet" href="./navbar/styles.css" />
  <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

  <title>Document</title>

  <script>
    let num = 0;
    let product = {};
    let qty = 0;

    function addtocart(pd_id) {
      let q = parseInt(document.getElementById("per_qty").value)
      if (num == q) {
        alert("จำนวนสินค้าในชุดครบแล้ว")
        return
      }
      let cart = document.getElementById("inset");
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
      } else {
        xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
      }

      let count = 0;
      xmlhttp.onreadystatechange = function() {

        if (xmlhttp.responseText != "" && count == 0) {
          count++;
          cart.innerHTML += xmlhttp.responseText;
          if (pd_id in product) {
            product[pd_id] = product[pd_id] + 1
            cal()
          } else {
            product[pd_id] = 1;
            cal()
          }
          num++
        }
        // let num = cart.childElementCount + 1;

      }
      
      console.log(product)
      xmlhttp.open("GET", "./setController.php?insert&pd_id=" + pd_id, true);
      xmlhttp.send();
    }


    function delproduct(pd_id) {
      if (confirm("คุณต้องการลบสินค้าใช่หรือไม่ ?")) {
        document.getElementById("div_" + pd_id).remove()
        num--
        delete product[pd_id]
      } else {
        return
      }
      cal()
    }

    function cal() {
      let total = 0;
      let sum = 0;
      let per = parseInt(document.getElementById("per_dis").value)
      for (i in product) {
        let price = parseInt(document.getElementById("price_" + i).innerHTML)
        total += price * product[i]
      }
      number_format = total.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
      });
      sum = total-(total*per)/100;
      sum_format = sum.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
      });
      document.getElementById("price-sum").value = number_format;
      document.getElementById("price-total").value = sum_format;
    }


    function savetocart() {
      let t = parseInt(document.getElementById("per_qty").value)
      if (num != t) {
        alert("กรุณาเลือกสินค้าให้ครบ")
        return
      } else {
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        } else {
          xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
        }

        let count = 0;
        xmlhttp.onreadystatechange = function() {

          if (xmlhttp.responseText != "" && count == 0) {
            count++;
            if (xmlhttp.responseText == "success") {
              location.reload();
            }
          }
          // let num = cart.childElementCount + 1;

        }
        // let qty = document.input1.value
        let qty = document.form1.input1.value

        str_pd = ""
        str_qty = ""
        x = 0
        for (i in product) {
          if (x == 0) {
            str_pd += i
            str_qty += product[i]
          } else {
            str_pd += "," + i
            str_qty += "," + product[i]
          }
          x++
        }
        console.log("./setController.php?save&pd_id=" + str_pd + "&qty=" + str_qty + "&qtyset=" + qty)
        xmlhttp.open("GET", "./setController.php?save&pd_id=" + str_pd + "&qty=" + str_qty + "&qtyset=" + qty, true);
        xmlhttp.send();
        alert("เพิ่มสินค้าลงตะกร้าแล้ว")
        location.reload();

      }
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

  <h3 class="text_title">เลือกจัดชุดสินค้า</h3>
  <img class="tutor" src="img/tutor.jpg" alt="tutorail">


  <?php 
        $sqlChecksetcus = mysqli_query($conn, "SELECT * from store WHERE store_no=6 "); 
        $rowChecksetcus = mysqli_fetch_array($sqlChecksetcus);
        ?>
  <section class="row-allcard">
<input type="text" id="per_dis" style="display: none;" value="<?php echo $rowChecksetcus['setcus_discount'] ?>">
<input type="text" id="per_qty" style="display: none;" value="<?php echo $rowChecksetcus['setcus_qty'] ?>">
    <div class="left">
    <h2 class="set_name">เลือกสินค้า <?php echo $rowChecksetcus['setcus_qty'] ?> ชิ้น</h2>
      <div class="row row-select">

        <?php
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $rowPD = $row["pd_id"];
        ?>
          <div class="col-product" onclick="addtocart(<?php echo $row['pd_id'] ?>)">
            <div class="card_pd">
              <?php
              $sqlImg = "SELECT * FROM product_image WHERE pd_id = '$rowPD' LIMIT 1";
              $result2 = mysqli_query($conn, $sqlImg);
              while ($row2 = mysqli_fetch_array($result2)) {
              ?>
                <img src="<?php echo $row2["img_url"] ?>" height="180" class="card-img-top" alt="...">

              <?php } ?>
              <div class="card-detail">
                <p class="namepd"><?php echo $row["pd_name"] ?></p>
                <p class="namepd"><?php echo $row["pd_price"] ?>฿</p>
              </div>
            </div>
          </div>
        <?php }
        ?>

      </div>

    </div>

    <div class="right">
      <h2 class="set_name">สินค้าที่เลือก</h2>
      <div class="row_pdselect">

        <div class="col-pd-select" id="inset">

        </div>
       
        <div class="showprice">
          <label for="price-sum">ราคารวมปกติ</label>
          <input id="price-sum" type="text" value="" placeholder="0" disabled>
          <label for="price-discount">ส่วนลด</label>
          <input id="price-discount" type="text" value="<?php echo $rowChecksetcus['setcus_discount'] ?>%" disabled>
          <label for="price-total">ราคาสุทธิ</label>
          <input id="price-total" type="text" placeholder="0" disabled>
          </div>

        <div class="col-btn-send">
            
          
          <section class="btn-add">
            <form class="form1" name="form1">
              <input class="btn-de" type="button" value=" - " onclick="(document.form1.input1.value > 1) ? document.form1.input1.value-- : true">
              <input class="btn-num" id="qtyset" name="input1" value="1" size=4 style="text-align: center;" onfocus="buffer=this.value" onchange="if (isNaN(this.value)) {this.value=buffer}">
              <input class="btn-pl" type=button value=" + " onclick="document.form1.input1.value++">
            </form>

            <button type="button" onclick="savetocart()" class="btn-addpd btn-lg"> เพิ่มไปยังรถเข็น</button>

          </section>

        </div>
      </div>
    </div>

  </section>









</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>