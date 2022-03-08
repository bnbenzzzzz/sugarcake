<?php
session_start();
include "./connect/connectdb.php";
include "./function/getNumOfCart.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel=”shortcut icon” href="img/icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bakery_newaddress.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="./navbar/styles.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                <a class="menu-cart menu-activenow cart" href="./bakery_mycart.php">
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

        <h3 class="text_title">เปลี่ยนที่อยู่</h3>

        <?php  // $rownewaddress = $row["address_id"];
        $num = 0;
        $user_username = $_SESSION['user_username'];
        $queryadddress = "SELECT * FROM user JOIN address_tbl on user.user_username = address_tbl.user_username WHERE user.user_username = '$user_username' ";
        $resultnewaddress = mysqli_query($conn, $queryadddress);
        ?>

        <section class="content">
            <a href="#add_address<?php echo $user_username ?>" data-toggle="modal" class="btn_add"><i class="bi bi-plus"></i> เพิ่มที่อยู่</a>

            <article class="address" id="address">
                <p class="p-des">ที่อยู่ของฉัน </p>
                <?php

                while ($rownewaddress = mysqli_fetch_array($resultnewaddress)) {
                    $num++;
                    // $address_id = $rownewaddress['address_id'];
                ?>

                    <div class="row">
                        <div class="column0">
                            <?php echo '<span class="number"> '. $num .'</span>';?>
                        </div>
                        <div class="column1">
                            <label>ชื่อ-นามสกุล</label> <br>
                            <label>เบอร์โทร</label><br>
                            <label>ที่อยู่</label>
                        </div>
                        <div class="column2">
                            <div class="a">
                            <?php
                            $address_id = $rownewaddress['address_id'];

                            $queryProvince = "SELECT * FROM provinces ";
                            $resultProvince = mysqli_query($conn, $queryProvince);
                            $queryAmphures = "SELECT * FROM amphures ";
                            $resultAmphures = mysqli_query($conn, $queryAmphures);
                            $queryDistricts = "SELECT * FROM districts ";
                            $resultDistricts = mysqli_query($conn, $queryDistricts);

                            $sql_newaddress = "SELECT * FROM address_tbl WHERE user_username = '$user_username' AND address_id = '$address_id'";
                            $result_newaddress = mysqli_query($conn,$sql_newaddress);
                            $numrowaddress = mysqli_num_rows($result_newaddress);
                            $row_newaddress = mysqli_fetch_array($result_newaddress);
                        
                            
                            ?>
                            <label class="info-address">
                                <?php echo $row_newaddress['fname'] . ' ' . $row_newaddress['lname'] ?>
                            </label>
                            <br>
                            <label class="info-address"><?php echo $rownewaddress['user_tel'] ?></label>
                            <br>
                            <label class="info-address"><?php echo $rownewaddress['address_descript'] ?></label>
                            <label class="info-address"><?php while ($rowDistricts = mysqli_fetch_assoc($resultDistricts)) {
                                                            if ($rownewaddress['sub_district'] == $rowDistricts['id']) {
                                                                echo "ต." . $rowDistricts["name_th"];
                                                            }
                                                        } ?></label>
                            <br>
                            <label class="info-address"><?php while ($rowAmphures = mysqli_fetch_assoc($resultAmphures)) {
                                                            if ($rownewaddress['district'] == $rowAmphures['id']) {
                                                                echo " อ." . $rowAmphures["name_th"];
                                                            }
                                                        }  ?></label></div>
                            <label class="info-address"><?php while ($rowProvinces = mysqli_fetch_assoc($resultProvince)) {
                                                            if ($rownewaddress['province'] == $rowProvinces['id']) {
                                                                echo " จ." . $rowProvinces["name_th"];
                                                            }
                                                        } ?></label>
                            <br>
                            <label class="info-address"><?php echo $rownewaddress['postcode'] ?></label>

                        </div>

                        <div class="column3">
                            <?php if($rownewaddress['address_type'] == 1){
                                echo "<span class = 'pickup' >ที่อยู่จัดส่งสินค้า<span>";
                            }else{
                                echo '';
                            }
                          ?>
                        </div>

                        <div class="column4"> 
                             <?php
                            if ($rownewaddress['address_type'] == 1) {
                            ?>
                                <a href="./connect/con_defult_address.php?address_id=<?php echo $rownewaddress["address_id"]; ?>" class="default">ค่าเริ่มต้น </a>
                            <?php } else { ?>
                                <a href="./connect/con_defult_address.php?address_id=<?php echo $rownewaddress["address_id"]; ?>" class="non-default">ตั้งเป็นค่าเริ่มต้น</a>

                            <?php } ?>
<div class="grid">
                            <a href="#edit_address<?php echo $rownewaddress["address_id"]; ?>" data-toggle="modal" class="btn_edit">แก้ไข</a>
                            <a href="#del_address<?php echo $rownewaddress["address_id"]; ?>" data-toggle="modal" class="btn_del">ลบ</a>
                      </div>  </div>

                        <?php include('modal/modal_newaddress.php'); ?>

                      

                    </div>  <hr class="btm">
                <?php } ?>
            </article>
        </section>

    </div><!--  contain--fluid -->

    <script src="assets/jquery.min.js"></script>
    <script src="assets/script.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

</html>