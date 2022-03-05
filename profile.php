<?php
session_start();
include("connect/connectdb.php");
include("./function/getNumOfCart.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
  <link rel=”shortcut icon” href="img/icon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js" integrity="sha256-2JRzNxMJiS0aHOJjG+liqsEOuBb6++9cY4dSOyiijX4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="./navbar/styles.css" />
  <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>

  <title>Document</title>

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
      <a class="menu-home " href="index.php">
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
      <a class="menu-profile menu-activenow" href="profile.php">
        <i class="bi bi-person-fill"></i>
        <p class="p-text">โปรไฟล์</p>
      </a>
    </div>
  </header>

  <?php if (isset($_SESSION['user_username'])) { ?>
    <div>

      <div class="row-card" id="cover">
        <?php
        $user_username = $_SESSION['user_username'];
        include('connect/connectdb.php');
        $query = "SELECT * FROM user WHERE user_username='$user_username'  ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result)
        ?>

        <img class="imgpro" style="object-fit: cover;" src="<?php echo $row['user_img'] ?>" alt="">

        <div class="col-descrip">
          <!-- <a class="btn_edit" href="#editprofile<?php echo $row["user_username"]; ?>" data-toggle="modal"> แก้ไขข้อมูลส่วนตัว</a> -->

          <h2 class="text-username" style="margin-top:-1px;"> <?php echo $row['user_username'] ?></h2>

          <h4 class="start_regis">เป็นสมาชิก Sugar cake ตั้งแต่ 
           
            <?php 
            function ThDate()
            {
            //วันภาษาไทย
            //เดือนภาษาไทย
            $ThMonth = array (null, "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
            
            //กำหนดคุณสมบัติ
            $months = date( "m" )-1; // ค่าเดือน (1-12)
            $years = date( "Y" )+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.
            
            return " 
                $ThMonth[$months] 
                $years";
            }
            
            echo ThDate($row['date_register']); // แสดงวันที่ 
            ?>
         </h4>
          <!-- <p>ชื่อ-สกุล : </p>
          <p class="text-des"> <?php echo $row['user_fname'] . " " . $row['user_lname'] ?></p><br>
         <p>ติดต่อ : </p>
          <p class="text-des"> <?php echo $row['user_email'] ?></p>
          <p class="text-des"><?php echo $row['user_tel'] ?></p><br>
          <p>วันเกิด : </p>
          <p class="text-des"> <?php echo date("d/m/Y", strtotime($row['user_birth']))  ?></p><br>
          <p>เพศ : </p>
          <p class="text-des">
            <?php
            if ($row['user_gender'] == '1') {
              echo "ชาย";
            } elseif ($row['user_gender'] == '2') {
              echo "หญิง";
            } else {
              echo "อื่น ๆ";
            }
            ?></p><br>
          <?php
          $queryAddress = "SELECT * FROM address_tbl WHERE user_username='$user_username' AND address_type = 1  ";
          $resultAddress = mysqli_query($conn, $queryAddress);
          $rowAddress = mysqli_fetch_array($resultAddress);
          $queryProvince = "SELECT * FROM provinces ";
          $resultProvince = mysqli_query($conn, $queryProvince);
          $queryAmphures = "SELECT * FROM amphures ";
          $resultAmphures = mysqli_query($conn, $queryAmphures);
          $queryDistricts = "SELECT * FROM districts ";
          $resultDistricts = mysqli_query($conn, $queryDistricts);
          ?>

          <p>ที่อยู่ : </p>
          <p class="text-des">
            <?php echo $rowAddress['address_descript'] ?>
            <?php
            while ($rowDistricts = mysqli_fetch_assoc($resultDistricts)) {
              if ($rowAddress['sub_district'] == $rowDistricts['id']) {
                echo "ต." . $rowDistricts["name_th"];
              }
            }
            while ($rowAmphures = mysqli_fetch_assoc($resultAmphures)) {
              if ($rowAddress['district'] == $rowAmphures['id']) {
                echo " อ." . $rowAmphures["name_th"];
              }
            }
            while ($rowProvinces = mysqli_fetch_assoc($resultProvince)) {
              if ($rowAddress['province'] == $rowProvinces['id']) {
                echo " จ." . $rowProvinces["name_th"];
              }
            }
            echo " " . $rowAddress['postcode']
            ?>
          </p> -->
        
        </div>
        <div class="btneditprofile">
          <a class="btn_edit_profile" href="edit_profile.php"><i class="bi bi-pencil-square"></i> แก้ไขข้อมูลส่วนตัว</a>
        </div>

      </div>
      <div class="div-btn3">
        <a class="btn_show" href="./bakery_myorder.php"><i class="bi bi-clipboard-check"></i> การสั่งซื้อ</a>
        <a class="btn_edit" href="./bakery_sendback.php?pi=0"><i class="bi bi-chat-fill"></i> คุยกับร้าน</a>
        <a class="btn_logout" href="#" onclick="window.location='./logout.php'" data-toggle="modal"><i class="bi bi-box-arrow-in-left"></i> ออกจากระบบ</a>
        
         <?php 
        //  include('modal/modal_edit_profile.php'); 
         ?> 
      </div>
    </div>

    <section class="card-poin">
      <h5 class="text-history">คำสั่งซื้อล่าสุด</h5>
      <a href="./bakery_myorder.php">
        <h5 class="text-history2">ดูคำสั่งซื้อทั้งหมด</h5>
      </a>
      <?php
      $queryPurchase = "SELECT * FROM purchaseorder WHERE user_username = '$user_username' AND purchase_status != 'ยังไม่สั่งซื้อ' ORDER BY purchase_id DESC LIMIT 1 ";
      $resultPurchase = mysqli_query($conn, $queryPurchase);
      while ($rowPurchase = mysqli_fetch_array($resultPurchase)) {
        $purchase_id = $rowPurchase['purchase_id'];
      ?>
        <div class="row content-box">
          <div class="div-head">
            <p class="p-status1">สั่งซื้อเมื่อ <?php echo date("d/m/Y", strtotime($rowPurchase['created_at'])) ?></p>

            <?php if ($rowPurchase['deliver_status'] == 'รับสินค้าแล้ว') { ?>
              <p class="p-status2"><i class="bi bi-truck"></i> รับสินค้าเสร็จสิ้น</p>
            <?php } else { ?>
              <p class="p-status2"><i class="bi bi-truck"></i> กำลังดำเนินการ</p>
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
                  <td></td>
                  <td>x<?php echo $rowDetail['qty'] ?></td>

                </tr>
              <?php } ?>
              <?php
              $queryDetailSet = "SELECT * FROM orderdetail 
                        JOIN setbox ON orderdetail.set_id = setbox.set_id  
                        WHERE purchase_id = '$purchase_id'";
              $resultDetailSet = mysqli_query($conn, $queryDetailSet);
              while ($rowDetailSet = mysqli_fetch_array($resultDetailSet)) {
              ?>
                <tr>
                  <td><img class="img-pd" src="<?php echo $rowDetailSet['set_img'] ?>" width="50" height="50" alt=""> </td>
                  <td><?php echo $rowDetailSet['set_name'] ?></td>
                  <td></td>
                  <td>x<?php echo $rowDetailSet['qty'] ?></td>

                </tr>
              <?php } ?>
              <tr>
                <td>รวม</td>
                <td></td>
                <td></td>
                <td><?php echo $rowPurchase['sumprice_pd'] ?> ฿</td>
              </tr>
              <tr>
                <td>ค่าจัดส่ง</td>
                <td></td>
                <td></td>
                <td><?php echo $rowPurchase['shipping'] ?> ฿</td>
              </tr>
            </table>
            <section class="div-foot">
              <h2 class="text-sumprice"><?php echo number_format($rowPurchase['purchase_price']) ?> ฿</h2>
            </section>
          </div>
        </div>

      <?php } ?>
    </section>
    </div>
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

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="assets/jquery.min.js"></script>
<script src="assets/scriptedit_cus.js"></script>


</html>
<?php mysqli_close($conn); ?>