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
    <title>Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bakery_review.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $("input[name='rate']").click(function() {
                if ($("#rate1").is(":checked")) {
                    $("#star_fill1").show();
                    $("#star_fill2").hide();
                    $("#star_fill3").hide();
                    $("#star_fill4").hide();
                    $("#star_fill5").hide();
                    $("#star_blank1").hide();
                    $("#star_blank2").show();
                    $("#star_blank3").show();
                    $("#star_blank4").show();
                    $("#star_blank5").show();
                } else if ($("#rate2").is(":checked")) {
                    $("#star_fill1").show();
                    $("#star_fill2").show();
                    $("#star_fill3").hide();
                    $("#star_fill4").hide();
                    $("#star_fill5").hide();
                    $("#star_blank1").hide();
                    $("#star_blank2").hide();
                    $("#star_blank3").show();
                    $("#star_blank4").show();
                    $("#star_blank5").show();
                } else if ($("#rate3").is(":checked")) {
                    $("#star_fill1").show();
                    $("#star_fill2").show();
                    $("#star_fill3").show();
                    $("#star_fill4").hide();
                    $("#star_fill5").hide();
                    $("#star_blank1").hide();
                    $("#star_blank2").hide();
                    $("#star_blank3").hide();
                    $("#star_blank4").show();
                    $("#star_blank5").show();
                } else if ($("#rate4").is(":checked")) {
                    $("#star_fill1").show();
                    $("#star_fill2").show();
                    $("#star_fill3").show();
                    $("#star_fill4").show();
                    $("#star_fill5").hide();
                    $("#star_blank1").hide();
                    $("#star_blank2").hide();
                    $("#star_blank3").hide();
                    $("#star_blank4").hide();
                    $("#star_blank5").show();
                } else if ($("#rate5").is(":checked")) {
                    $("#star_fill1").show();
                    $("#star_fill2").show();
                    $("#star_fill3").show();
                    $("#star_fill4").show();
                    $("#star_fill5").show();
                    $("#star_blank1").hide();
                    $("#star_blank2").hide();
                    $("#star_blank3").hide();
                    $("#star_blank4").hide();
                    $("#star_blank5").hide();
                }

            });

        });
    </script>

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

        <h3 class="text_title">รีวิวร้าน</h3>


        <?php
        $purchase_id = $_GET['purchase_id'];
        $queryCheck = "SELECT * FROM review WHERE purchase_id = '$purchase_id'";
        $resultCheck = mysqli_query($conn, $queryCheck);
        $rowCheck = mysqli_num_rows($resultCheck);
        if ($rowCheck >= 1) { ?>
            <section class="comment-success">
                <img src="./logo/comment-success.svg" alt="comment-success">
                <h2>ออเดอร์นี้ได้ทำการรีวิวเสร็จสิ้นแล้ว</h2>
                <h4>ขอบคุณสำหรับการรีวิวนะคะ</h4>
            </section>
        <?php } else { ?>


            <div class="comment">
                

                <form class="card-comment" action="./connect/con_add_review.php" method="post">
                    <div class="row-btn">
                        <div class="radi-star">
                            <label id="star1" for="rate1"><i id="star_blank1" class="bi bi-star"></i><i id="star_fill1" style="display: none;" class="bi bi-star-fill"></i></label>
                            <input id="rate1" type="radio" name="rate" value="1">
                        </div>
                        <div class="radi-star">
                            <label id="star2" for="rate2"><i id="star_blank2" class="bi bi-star"></i><i id="star_fill2" style="display: none;" class="bi bi-star-fill"></i></label>
                            <input id="rate2" type="radio" name="rate" value="2">
                        </div>
                        <div class="radi-star">
                            <label id="star3" for="rate3"><i id="star_blank3" class="bi bi-star"></i><i id="star_fill3" style="display: none;" class="bi bi-star-fill"></i></label>
                            <input id="rate3" type="radio" name="rate" value="3">
                        </div>
                        <div class="radi-star">
                            <label id="star4" for="rate4"><i id="star_blank4" class="bi bi-star"></i><i id="star_fill4" style="display: none;" class="bi bi-star-fill"></i></label>
                            <input id="rate4" type="radio" name="rate" value="4">
                        </div>
                        <div class="radi-star">
                            <label id="star5" for="rate5"><i id="star_blank5" class="bi bi-star"></i><i id="star_fill5" style="display: none;" class="bi bi-star-fill"></i></label>
                            <input id="rate5" type="radio" name="rate" value="5">
                        </div>


                    </div>
                    <label class="label-comment" for="comment">เพิ่มความคิดเห็น</label>

                    <input style="display: none;" type="text" name="purchase_id" value="<?php echo $purchase_id ?>">
                    <textarea class="text-comment" name="comment" id="comment"></textarea>
                    <input class="btn-send" type="submit" value="ยืนยัน">
                </form>

                <div class="row-left">
                  <p class="title-detail">รายการที่สั่ง</p>
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
                </div>
            </div>
        <?php } ?>
<a class="back-btn" href="./bakery_myorder3.php"><i class="bi bi-arrow-left"></i> ย้อนกลับ</a>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>