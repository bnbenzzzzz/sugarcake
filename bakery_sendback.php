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
  <title>Chat with store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/bakery_sendback.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="./navbar/styles.css" />
  <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>




</head>

<body>
  <div class="container-fluid">

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
        <a class="menu-order cart" href="./bakery_myorder.php">
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
        <a class="menu-profile menu-activenow" href="profile.php">
          <i class="bi bi-person-fill"></i>
          <p class="p-text">โปรไฟล์</p>
        </a>
      </div>
    </header>


    <h3 class="text_title">การตอบกลับ</h3>



    <div class="row-big">

      <div class="chat-people">
        <?php
        $pi = $_GET['pi'];
        $queryPeople = "SELECT * FROM purchaseorder 
        INNER JOIN user ON purchaseorder.user_username = user.user_username
                    WHERE purchaseorder.user_username = '$username'
                    AND (purchaseorder.purchase_status = 'สั่งซื้อแล้วรอการอนุมัติ' OR purchaseorder.purchase_status = 'ออเดอร์ผิดพลาด' OR purchaseorder.purchase_status = 'แก้บิล') ";
        $resultPeople = mysqli_query($conn, $queryPeople);
        // $queryPeople = "SELECT * FROM sendback_all
        //             INNER JOIN purchaseorder ON sendback_all.purchase_id = purchaseorder.purchase_id
        //             INNER JOIN user ON purchaseorder.user_username = user.user_username
        //             WHERE purchaseorder.user_username = '$username' ";
        // $resultPeople = mysqli_query($conn, $queryPeople);

        while ($rowPeople = mysqli_fetch_array($resultPeople)) {
          $rowActive = $rowPeople['purchase_id'];
          $queryActive = "SELECT * FROM sendback_all WHERE purchase_id = '$rowActive' AND sendback_status = 1";
          $resultActive = mysqli_query($conn, $queryActive);
          $numActive =  mysqli_num_rows($resultActive);
          if ($numActive >= 1) {
        ?>
            <a href="bakery_sendback.php?pi=<?php echo $rowPeople['purchase_id'] ?>">
              <section class="people1">
                <img src="<?php echo $rowPeople['user_img'] ?>" alt="" class="profile">
                <div class="p-mix">
                  <p class="p-people-name"><?php echo $rowPeople['user_fname'] ?> <?php echo $rowPeople['user_lname'] ?></p>
                  <p class="p-username">#<?php echo $rowPeople['purchase_number'] ?></p>
                </div>
              </section>
            </a>
          <?php } else { ?>
            <a href="bakery_sendback.php?pi=<?php echo $rowPeople['purchase_id'] ?>">
              <section class="people2">
                <img src="<?php echo $rowPeople['user_img'] ?>" alt="" class="profile">
                <div class="p-mix">
                  <p class="p-people-name"><?php echo $rowPeople['user_fname'] ?> <?php echo $rowPeople['user_lname'] ?></p>
                  <p class="p-username">#<?php echo $rowPeople['purchase_number'] ?></p>
                </div>
              </section>
            </a>
        <?php }
        } ?>
      </div>

      <div class="chat-detail">
        <?php



        $queryChat = "SELECT * FROM sendback_all JOIN sendback
                        ON sendback_all.sendback_no = sendback.sendback_no
                        WHERE sendback_all.purchase_id='$pi' ";
        $resultChat = mysqli_query($conn, $queryChat);
        $resultTest = mysqli_query($conn, $queryChat);
        $rowNumber = mysqli_fetch_array($resultTest);
        $rowNum = mysqli_num_rows($resultChat);

        if ($rowNum > 0) {
          $pn = $rowNumber['sendback_no'];
          $queryProduct = "SELECT * FROM purchaseorder 
                        INNER JOIN orderdetail ON purchaseorder.purchase_id = orderdetail.purchase_id
                        INNER JOIN product ON orderdetail.pd_id = product.pd_id
                        WHERE purchaseorder.purchase_id='$pi'  ";
          $resultProduct = mysqli_query($conn, $queryProduct);
          $rowProduct = mysqli_fetch_array($resultProduct);
        } else {
        }

        ?>
        <div class="chat-bar">
          <?php if ($rowNum > 0) { ?>
            <?php if ($pi == 0) { ?>
              <a href="#"></a>
            <?php } else {
              $queryProduct = "SELECT * FROM purchaseorder WHERE purchase_id='$pi'  ";
              $resultProduct = mysqli_query($conn, $queryProduct);
              $rowProduct = mysqli_fetch_array($resultProduct);
            ?>

              <a class="btn-view" href="#show<?php echo $pi ?>" data-toggle="modal"><i class="bi bi-eye-fill"></i> #<?php echo $rowProduct['purchase_number'] ?></a>
            <?php  }
          } else { ?>
            <a href="#"></a>
          <?php } ?>
          <section class="btn-all">

          </section>
        </div>

        <section class="div-chat2" id="myDiv">
          <?php
          if ($rowNum > 0) {
            while ($rowChat = mysqli_fetch_array($resultChat)) {
              if ($rowChat['sendback_type'] == 0) { ?>

                <section class="chat-left">
                  <?php if ($rowChat['descript'] != "") { ?>
                    <div class="div-left1">
                      <p class="text1"><?php echo $rowChat['descript'] ?></p>
                    </div>
                    <div class="div-left2"></div>
                  <?php } else {
                  } ?>
                  <?php if ($rowChat['slip_before'] != "") { ?>
                    <div class="div-photo">
                      <img class="img-chat1" src="<?php echo $rowChat['slip_before'] ?>" alt="photo">
                    </div>
                    <div class="div-left2"></div>
                  <?php } else {
                  } ?>

                </section>

              <?php } else { ?>
                <section class="chat-right">
                  <div class="div-right1"></div>
                  <div class="div-right2">
                    <p class="text1"><?php echo $rowChat['descript'] ?></p>
                  </div>
                  <?php if ($rowChat['slip_before'] != "") { ?>
                    <div class="div-right1"></div>
                    <div class="div-photo">
                      <img class="img-chat2" src="<?php echo $rowChat['slip_before'] ?>" alt="photo">
                    </div>
                  <?php } else {
                  } ?>
                </section>

              <?php } ?>

            <?php }
          } else { ?>
            <h3 class="blank-bill">กรุณาเลือกบิล/ยังไม่มีการตอบกลับ</h3>

          <?php } ?>

        </section>

        <section class="div-input">

          <form action="./connect/con_add_sendback_cus.php?pi=<?php echo $pi ?>" method="POST" enctype="multipart/form-data">
            <div class="row-big-input">
              <div class="input-insert">
                <label for="logo_img">เพิ่มรูปภาพ</label>
                <input type="file" width="2px" class="form-control" id="logo_img" name="pic_index1" accept="image/*" onchange="loadFile1(event)">
                <label for="embed">กรอกข้อความ</label>
                <textarea class="form-input" name="embed" id="embed" placeholder="กรอกข้อความ"></textarea>
              </div>
              <button type="submit" class="btn btn-send">ส่ง</button>
            </div>
          </form>

        </section>

      </div>

    </div><?php include('modal/modal_detail_order_sendback.php'); ?>
    <script>
      var myDiv = document.getElementById("myDiv");
      myDiv.scrollTop = myDiv.scrollHeight;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>