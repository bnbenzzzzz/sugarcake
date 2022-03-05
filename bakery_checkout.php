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
    <link rel="stylesheet" href="css/bakery_checkout.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="./navbar/styles.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <script>
        $(function() {
            $("input[name='deli1']").click(function() {
                if ($("#radi-store").is(":checked")) {
                    $("#show-deli").hide();
                    $("#show-take").show();
                    $("#radi-sale").show();
                } else if ($("#radi-deli").is(":checked")) {
                    $("#show-deli").show();
                    $("#show-take").hide();
                    $("#radi-sale").hide();

                }

            });
            $("input[name='address']").click(function() {
                if ($("#old-address").is(":checked")) {
                    $("#show-address2").hide();
                    $("#show-address1").show();
                } else if ($("#new-address").is(":checked")) {
                    $("#show-address1").hide();
                    $("#show-address2").show();
                }

            });
        });
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


        <h3 class="text_title">ยืนยันการสั่งซื้อ</h3>
        <section class="content">

            <form enctype="multipart/form-data" action="./connect/con_add_purchase_test.php?purchase_id=<?php echo $rowPurchaseID ?>" method="post">
                <h4 class="text_subtitle">รายละเอียดสินค้า</h4>
                <table class="show-all-cart">
                    <tr>
                        <th class="th-all-cart"></th>
                        <th class="th-all-cart">สินค้า</th>
                        <th class="th-all-cart">จำนวน</th>
                        <th class="th-all-cart">ราคาชิ้น/เซต</th>
                        <th class="th-all-cart">ราคารวม</th>
                    </tr>
                    <?php

                    $total = 0;
                    $query = "SELECT * FROM orderdetail JOIN product on orderdetail.pd_id = product.pd_id WHERE purchase_id = '$rowPurchaseID' ";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        $total += $row['pd_price'] * $row['qty'];
                    ?>
                        <tr>
                            <td class="td-all-cart">
                                <?php
                                $rowPD = $row["pd_id"];
                                $sqlImg = "SELECT * FROM product_image WHERE pd_id = '$rowPD'LIMIT 1 ";
                                $result3 = mysqli_query($conn, $sqlImg);
                                while ($row3 = mysqli_fetch_array($result3)) {
                                ?>
                                    <img class="img-all-cart" src="<?php echo $row3['img_url'] ?>" width="100" height="100" alt="">
                                <?php } ?>
                            </td>
                            <td class="td-all-cart">
                                <p class="p-all-cart"><?php echo $row['pd_name'] ?></p>
                            </td>
                            <td class="td-all-cart">
                                <p><?php echo $row['qty'] ?> ชิ้น</p>
                            </td>
                            <td class="td-all-cart">
                                <p><?php echo $row['pd_price'] ?> บาท</p>
                            </td>
                            <td class="td-all-cart">
                                <p><?php echo number_format($total) ?> บาท</p>
                            </td>
                        </tr>

                    <?php $total = 0;
                    }

                    $queryGetSet = "SELECT * FROM orderdetail JOIN setbox on orderdetail.set_id = setbox.set_id WHERE purchase_id = '$rowPurchaseID' ";
                    $resultGetSet = mysqli_query($conn, $queryGetSet);

                    while ($rowGetSet = mysqli_fetch_array($resultGetSet)) {
                        $total += $rowGetSet['set_price'] * $rowGetSet['qty'];
                    ?>
                        <tr>
                            <td class="td-all-cart">
                                <img class="img-all-cart" src="<?php echo $rowGetSet['set_img'] ?>" width="100" height="100" alt="">
                            </td>
                            <td class="td-all-cart">
                                <p class="p-all-cart"><?php echo $rowGetSet['set_name'] ?></p>
                            </td>
                            <td class="td-all-cart">
                                <p><?php echo $rowGetSet['qty'] ?> เซต</p>
                            </td>
                            <td class="td-all-cart">
                                <p><?php echo $rowGetSet['set_price'] ?> บาท</p>
                            </td>
                            <td class="td-all-cart">
                                <p><?php echo $total ?> บาท</p>
                            </td>
                        </tr>

                    <?php $total = 0;
                    }
                    ?>

                </table>
                <h4 class="text_subtitle">เลือกการจัดส่ง</h4>
                <article class="div-deli radio-toolbar">
                    <div>
                        <input class="radi" id="radi-store" checked type="radio" name="deli1" value="take" required onclick="Test2()"> <label for="radi-store" class="label-radio">มารับเองที่ร้าน</label>

                    </div>
                    <div <?php
                            $queryCheckPickup = "SELECT * FROM orderdetail JOIN product on orderdetail.pd_id = product.pd_id WHERE product.pickup_type = 'รับที่ร้านเท่านั้น' AND purchase_id = '$rowPurchaseID' ";
                            $queryCheckdate = "SELECT * FROM orderdetail JOIN product on orderdetail.pd_id = product.pd_id WHERE purchase_id = '$rowPurchaseID' ";
                            $resultCheckPickup = mysqli_query($conn, $queryCheckPickup);
                            $resultCheckdate = mysqli_query($conn, $queryCheckdate);
                            $numPickup = mysqli_num_rows($resultCheckPickup);
                            $Hdate = 0;
                            $date = date('Y-m-d');
                            while($CheckDate = mysqli_fetch_array($resultCheckdate)){
                                if($CheckDate['pd_time']>$Hdate){
                                    $Hdate += $CheckDate['pd_time'];
                                }else{
                                    $Hdate = $Hdate;
                                }
                            }
                            if ($numPickup > 0) { ?> style="display: none;" <?php } else {
                                                                        } ?>>
                        <input class="radi" id="radi-deli" type="radio" name="deli1" value="delivery" onclick="Test2()"> <label for="radi-deli" class="label-radio">จัดส่งสินค้า</label>
                    </div>
                </article>
                <article class="select-take" id="show-take">
                    <p class="p-des">รบกวนเลือกวันและเวลาที่จะเข้ามารับสินค้า </p>
                    <article class="input-date">
                        <input type="date" name="date-get" min="<?php echo date('Y-m-d', strtotime("+$Hdate day", strtotime($date))); ?>" >
                        <!-- <input type="time" name="time-get" min="08:00" max="17:00" id=""> -->
                        <section class="box">
                            <select name="time-get" id="time-get">
                                <option selected hidden value="0">เลือกช่วงเวลา</option>
                                <option value="ช่วงเช้า">ช่วงเช้า</option>
                                <option value="ช่วงบ่าย">ช่วงบ่าย</option>
                            </select>
                        </section>
                        <label class="label-worn">*โปรดเลือกห่างจากวันที่สั่งอย่างน้อย <?php echo $Hdate ?> วัน <br> *ร้านเปิดทำการ 08.00-17.00</label>
                    </article>
                </article>

                <article class="select-take" id="show-deli" style="display: none;">
                    <p class="p-des">ที่อยู่จัดส่ง (ใช้เวลาประมาณ <?php echo $Hdate ?> วันในการเตรียมสินค้าหลังยืนยันออเดอร์) </p>
                    <article class="input-address">
                        <?php
                        $user_username = $_SESSION['user_username'];
                        $queryUser = "SELECT * FROM user  WHERE user.user_username='$user_username'  ";
                        $resultUser = mysqli_query($conn, $queryUser);
                        $rowUser = mysqli_fetch_array($resultUser);

                        $queryAddress = "SELECT * FROM address_tbl WHERE user_username='$user_username' AND address_type = 1  ";
                        $resultAddress = mysqli_query($conn, $queryAddress);
                        $rowAddress = mysqli_fetch_array($resultAddress);
                        ?>
                        <article class="show-address" id="show-address1">
                            <input style="display: none;" type="text" value="<?php echo $rowAddress['address_id'] ?>" name="old_address">
                            <div class="show-sub">
                                <label>ชื่อ-นามสกุล</label><br>
                                <label>เบอร์โทร</label><br>
                                <label>ที่อยู่</label>
                            </div>

                            <?php
                            $queryProvince = "SELECT * FROM provinces ";
                            $resultProvince = mysqli_query($conn, $queryProvince);
                            $queryAmphures = "SELECT * FROM amphures ";
                            $resultAmphures = mysqli_query($conn, $queryAmphures);
                            $queryDistricts = "SELECT * FROM districts ";
                            $resultDistricts = mysqli_query($conn, $queryDistricts);
                            ?>

                            <div class="show-address1">
                                <label><?php echo $rowUser['user_fname'] . ' ' . $rowUser['user_lname'] ?></label><br>
                                <label><?php echo $rowUser['user_tel'] ?></label>
<br>
                                <label><?php echo $rowAddress['address_descript'] ?>
                                    <?php
                                    while ($rowDistricts = mysqli_fetch_assoc($resultDistricts)) {
                                        if ($rowAddress['sub_district'] == $rowDistricts['id']) {
                                            echo "ต." . $rowDistricts["name_th"];
                                        }
                                    } ?>
                                    <?php
                                    while ($rowAmphures = mysqli_fetch_assoc($resultAmphures)) {
                                        if ($rowAddress['district'] == $rowAmphures['id']) {
                                            echo " อ." . $rowAmphures["name_th"];
                                        }
                                    } ?>
                                    <?php while ($rowProvinces = mysqli_fetch_assoc($resultProvince)) {
                                        if ($rowAddress['province'] == $rowProvinces['id']) {
                                            echo " จ." . $rowProvinces["name_th"];
                                        }
                                    } ?>

                                    <?php echo $rowAddress['postcode'] ?> <br>
                                </label>
                               </div>  
                                    <div class="btn-change">
                                    <a href="bakery_newaddress.php" class="btn btn-change-address">เปลี่ยน</a>
                                    </div>
                           
                        </article>



                    </article>
                </article>

                <article class="select-take" id="show-deli" style="display: none;">
                    <p class="p-des">ทางร้านจะจัดส่งสินค้าให้กับคุณลูกค้าหลังจากยืนยันการชำระเงินสำเร็จ ใช้เวลาประมาณ <?php echo $Hdate ?> วัน ในการเตรียมและจัดส่งสินค้าให้กับคุณลูกค้า </p>
                    <article class="input-address ">
                        <!-- <input class="radi2" type="radio" id="old-address" checked name="address" value="old"> <label for="old-address" class="label-radio">ใช้ที่อยู่เริ่มต้น</label>
                        <input class="radi2" type="radio" id="new-address" name="address" value="new"> <label for="new-address" class="label-radio">ใช้ที่อยู่ใหม่</label> -->

                        <?php
                        $user_username = $_SESSION['user_username'];
                        $queryUser = "SELECT * FROM user  WHERE user.user_username='$user_username'  ";
                        $resultUser = mysqli_query($conn, $queryUser);
                        $rowUser = mysqli_fetch_array($resultUser);

                        $queryAddress = "SELECT * FROM address_tbl WHERE user_username='$user_username' AND address_type = 1  ";
                        $resultAddress = mysqli_query($conn, $queryAddress);
                        $rowAddress = mysqli_fetch_array($resultAddress);
                        ?>
                        <article class="show-address" id="show-address1">
                            <input style="display: none;" type="text" value="<?php echo $rowAddress['address_id'] ?>" name="old_address">
                            <div class="show-sub">
                                <label for="fname">ชื่อ</label><br>
                                <input class="input-show" type="text" id="fname" value="<?php echo $rowUser['user_fname'] ?> " name="fname" disabled>
                            </div>
                            <div class="show-sub">
                                <label for="lname">นามสกุล</label><br>
                                <input class="input-show" type="text" id="lname" value="<?php echo $rowUser['user_lname'] ?>" name="lname" disabled>
                            </div>
                            <div class="show-sub">
                                <label for="phone">เบอร์โทร</label><br>
                                <input class="input-show" type="text" id="phone" value="<?php echo $rowUser['user_tel'] ?>" name="phone" disabled>
                            </div>
                            <div class="show-sub">
                                <label for="email">Email</label><br>
                                <input class="input-show" type="text" id="email" value="<?php echo $rowUser['user_email'] ?>" name="email" disabled>
                            </div>

                            <?php
                            $queryProvince = "SELECT * FROM provinces ";
                            $resultProvince = mysqli_query($conn, $queryProvince);
                            $queryAmphures = "SELECT * FROM amphures ";
                            $resultAmphures = mysqli_query($conn, $queryAmphures);
                            $queryDistricts = "SELECT * FROM districts ";
                            $resultDistricts = mysqli_query($conn, $queryDistricts);
                            ?>

                            <div class="show-sub">
                                <label for="district">ที่อยู่</label><br>
                                <textarea class="input-show" name="" id="" cols="30" rows="3" disabled><?php echo $rowAddress['address_descript'] ?></textarea>
                            </div>
                            <div class="show-sub">
                                <label for="district">ตำบล</label><br>
                                <input class="input-show" type="text" id="district" value="<?php
                                                                                            while ($rowDistricts = mysqli_fetch_assoc($resultDistricts)) {
                                                                                                if ($rowAddress['sub_district'] == $rowDistricts['id']) {
                                                                                                    echo "ต." . $rowDistricts["name_th"];
                                                                                                }
                                                                                            } ?>" name="district" disabled>
                            </div>
                            <div class="show-sub">
                                <label for="district">อำเภอ</label><br>
                                <input class="input-show" type="text" id="district" value="<?php while ($rowAmphures = mysqli_fetch_assoc($resultAmphures)) {
                                                                                                if ($rowAddress['district'] == $rowAmphures['id']) {
                                                                                                    echo " อ." . $rowAmphures["name_th"];
                                                                                                }
                                                                                            } ?>" name="district" disabled>
                            </div>
                            <div class="show-sub">
                                <label for="province">จังหวัด</label><br>
                                <input class="input-show" type="text" id="province" value="<?php while ($rowProvinces = mysqli_fetch_assoc($resultProvince)) {
                                                                                                if ($rowAddress['province'] == $rowProvinces['id']) {
                                                                                                    echo " จ." . $rowProvinces["name_th"];
                                                                                                }
                                                                                            } ?>" name="province" disabled>
                            </div>

                            <div class="show-sub">
                                <label for="code">รหัสไปรษณีย์</label><br>
                                <input class="input-show" type="text" id="code" value="<?php echo $rowAddress['postcode'] ?>" name="code" disabled>
                            </div>
                        </article>

                        <article class="show-address" id="show-address2" style="display: none;">
                            <div class="show-sub">
                                <label class="required" for="fname">ชื่อ</label><br>
                                <input class="input-show" type="text" id="fname" name="new_fname">
                            </div>
                            <div class="show-sub">
                                <label class="required" for="lname">นามสกุล</label><br>
                                <input class="input-show" type="text" id="lname" name="new_lname">
                            </div>
                            <div class="show-sub">
                                <label class="required" for="phone">เบอร์โทร</label><br>
                                <input class="input-show" type="tel" maxlength="10" id="phone" name="new_tel">
                            </div>
                            <!-- <div class="show-sub">
                                <label class="required" for="email">Email</label><br>
                                <input class="input-show" type="email" id="email" name="new_email">
                            </div> -->
                            <div class="show-sub">
                                <label class="required" for="province">จังหวัด</label><br>
                                <input class="input-show" type="text" id="province" name="new_province">
                            </div>
                            <div class="show-sub">
                                <label class="required" for="district">อำเภอ</label><br>
                                <input class="input-show" type="text" id="district" name="new_district">
                            </div>
                            <div class="show-sub">
                                <label class="required" for="sub-district">ตำบล</label><br>
                                <input class="input-show" type="text" id="sub-district" name="new_subdis">
                            </div>
                            <div class="show-sub">
                                <label class="required" for="code">รหัสไปรษณีย์</label><br>
                                <input class="input-show" type="text" id="code" name="new_postcode">
                            </div>
                            <div class="show-sub">
                                <label class="required" for="district">ที่อยู่</label><br>
                                <textarea class="input-show" name="new_address" id="" cols="30" rows="3"></textarea>
                            </div>

                        </article>
                    </article>
                </article>

                <h4 class="text_subtitle">การชำระเงิน</h4>
                <article class="payment">
                    <article class="div-deli radio-toolbar">
                        <div>
                            <input class="radi" id="payfull" type="radio" name="deli" value="1" required onclick="Test()"> <label for="payfull" class="label-radio">จ่ายทั้งหมด</label>
                        </div>
                        <div id="radi-sale">
                            <input class="radi" id="payhalf" type="radio" name="deli" value="2" onclick="Test()"> <label for="payhalf" class="label-radio">จ่ายมัดจำ 50%</label>
                        </div>
                    </article>
                    <article class="show-pay">
                        <article class="pay1">
                            <img class="img-slip" src="img/QR.jpg" alt="">
                            <?Php
                            // require_once("./QRgenerator/lib/PromptPayQR.php");
                            // $PromptPayQR = new PromptPayQR(); 
                            // new object
                            // $PromptPayQR->size = 8; 
                            // Set QR code size to 8
                            // $PromptPayQR->id = '0981702726'; 
                            // PromptPay ID
                            // $PromptPayQR->amount = 200.25; 
                            // Set amount (not necessary)
                            // echo '<img src="' . $PromptPayQR->generate() . '" />'; 
                            ?>
                            <p>ธ.ไทยพานิชย์ เลขบัญชี 1234567890 <br> จันมณี ศรีสุข</p>
                        </article>
                        <article class="pay2">
                            <?php
                            $shipping = 0;
                            $sumqty = 0;
                            $sumprice = 0;
                            $sumSet = 0;
                            $sumpriceSet = 0;
                            $sumSetPrice = 0;
                            $sumshipping = 0;
                            $query1 = "SELECT * FROM orderdetail JOIN product on orderdetail.pd_id = product.pd_id WHERE purchase_id = '$rowPurchaseID' ";
                            $result1 = mysqli_query($conn, $query1);
                            while ($row1 = mysqli_fetch_array($result1)) {
                                $qty = $row1['qty'];
                                $price = $row1['price'];
                                $sumqty = $sumqty + $qty;
                                $sumprice += ($row1['pd_price'] * $row1['qty']);
                            };
                            $querySetPrice = "SELECT * FROM orderdetail JOIN setbox on orderdetail.set_id = setbox.set_id WHERE purchase_id = '$rowPurchaseID' ";
                            $resultSetPrice = mysqli_query($conn, $querySetPrice);
                            while ($rowSetPrice = mysqli_fetch_array($resultSetPrice)) {
                                $qtySet = $rowSetPrice['qty'];
                                $priceSet = $rowSetPrice['price'];
                                $sumSet = $sumSet + $qtySet;
                                $sumpriceSet += ($rowSetPrice['set_price'] * $rowSetPrice['qty']);
                            };
                            $sumprice += $sumpriceSet;

                            ?>
                            <?php

                            if ($sumqty >= 1 && $sumqty < 21) {
                                $shipping = 100;
                            } elseif ($sumqty >= 21 && $sumqty < 41) {
                                $shipping = 250;
                            } elseif ($sumqty >= 41 && $sumqty < 80) {
                                $shipping = 350;
                            } elseif ($sumqty >= 80) {
                                $shipping = 400;
                            } else {
                                $shipping = 0;
                            }

                            if ($sumSet >= 1 && $sumSet < 21) {
                                $sumSetPrice = 100;
                            } elseif ($sumSet >= 21 && $sumSet < 41) {
                                $sumSetPrice = 250;
                            } elseif ($sumSet >= 41 && $sumSet < 80) {
                                $sumSetPrice = 350;
                            } elseif ($sumSet <= 0) {
                                $sumSetPrice = 0;
                            } else {
                                $sumSetPrice = 400;
                            }
                            $sumshipping = $shipping + $sumSetPrice;
                            ?>
                            <input style="display: none;" class="show-price" type="text" id="shipping10" name="shipping10" value="<?php echo number_format($sumshipping) ?>">
                            <input style="display: none;" class="show-price" id="sumprice2" type="text" name="sumprice2" value="<?php echo $sumshipping + $sumprice ?>">

                            <label for="qty">จำนวนรายการสินค้า</label>
                            <?php $querySetNum = "SELECT * FROM orderdetail  WHERE purchase_id = '$rowPurchaseID' ";
                            $resultSetNum = mysqli_query($conn, $querySetNum);
                            $rowSetNum = mysqli_num_rows($resultSetNum) ?>
                            <input class="show-price" type="text" id="qty" name="qty" value="<?php echo $rowSetNum ?>"><label for="qty"> รายการ</label>
                            <label for="qty">ราคาสินค้ารวม</label>
                            <input class="show-price" type="text" id="sumprice-pd" name="sumprice_pd" value="<?php echo number_format($sumprice, 2) ?>"><label for="sumprice-pd"> บาท</label>
                            <label for="qty">ค่าจัดส่ง</label>
                            <input class="show-price" type="text" id="shipping1" name="shipping1" value="<?php echo number_format($sumshipping, 2) ?>"><label id="shipping2" for="shipping1"> บาท</label>
                            <label for="qty">ราคารวมทั้งสิ้น</label>
                            <input class="show-price" id="sumprice" type="text" name="sumprice" value="<?php echo number_format($sumshipping + $sumprice, 2)  ?>"><label for="sumprice"> บาท</label>
                        </article>
                    </article>
                    <article class="pay3">
                        <label for="qty">ราคาที่ต้องชำระ</label>
                        <input class="show-price" type="text" id="td1" name="payprice" value="<?php echo number_format($sumprice + $sumshipping, 2)  ?>"><label for="payprice">&nbsp;&nbsp;บาท</label>
                    </article>
                    <article class="pay4">
                        <label for="qty">แนบหลักฐานการชำระเงิน</label>
                        <input class="show-price" type="file" id="qty" name="pic_index">
                    </article>



                </article>
                <button type="submit" class="btn-checkout"><span class="glyphicon glyphicon-check"></span>ยืนยันการสั่งซื้อ</button>
            </form>
        </section>



        <footer class="footer">
            <h6 style="text-align: center; color: white; font-weight: bold; padding-top: 2%;"> ©2021 Sugar Cake All right reserved </h6>
        </footer>
    </div><!--  contain--fluid -->

    <script>
        function Test() {
            sumprice = document.getElementById("sumprice").value;
            sumprice = sumprice.replace(",", "")
            console.log(sumprice);
            var payhalf = document.getElementById("payhalf");
            var payfull = document.getElementById("payfull");
            if (payhalf.checked) {
                num = (parseInt(sumprice) / 2);
                document.getElementById("td1").value = num.toFixed(2).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });;
            } else if (payfull.checked) {
                numm = parseInt(sumprice);
                document.getElementById("td1").value = numm.toFixed(2).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });

            } else {
                document.getElementById("td1").value = '0 บาท';
            }
        }

        function Test2() {
            shipping3 = document.getElementById("shipping10").value;
            sumprice2 = document.getElementById("sumprice2").value;
            var radi_store = document.getElementById("radi-store");
            var radi_deli = document.getElementById("radi-deli");
            if (radi_store.checked) {
                document.getElementById("shipping1").value = 0;
                document.getElementById("sumprice").value = parseInt(sumprice2) - shipping3;
            } else if (radi_deli.checked) {
                num_shipping2 = parseInt(shipping3);
                document.getElementById("shipping1").value = num_shipping2;
                document.getElementById("sumprice").value = parseInt(sumprice2);
            } else {
                document.getElementById("shipping1").value = '0 บาท';
            }
        }
    </script>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

</html>