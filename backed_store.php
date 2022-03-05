<?php
session_start();
include("connect/connectdb.php");
$sql_pv = "SELECT * FROM provinces";
$query_pv = mysqli_query($conn, $sql_pv);

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_store.css">
    <link rel="stylesheet" href="css/index.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customize</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>

<body>
    <div class="fullscreen">
        <div class="sidenav">
            <?php
            $user_username = $_SESSION['user_username'];
            include('connect/connectdb.php');
            $query = "SELECT * FROM user WHERE user_username='$user_username'  ";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="row" id="row_profile">
                    <div class="col-md-3"><img style="width: 70px;height:70px;border-radius:50%;border:3px solid #80ED99" class="img_profile" src="<?php echo $row['user_img'] ?>" width="70" alt=""></div>
                    <div class="col-md-9">
                        <h4 class="username" style="margin-top: 15px;"><?php echo $row['user_username'] ?></h4>
                        <p class="mailji" style="margin-top: -10px;margin-left: 10px;"><?php echo $row['user_email'] ?></p>
                    </div>
                </div><?php } ?>
                <a class="menu" href="backed_dash.php"><i class="bi bi-graph-up"></i><span class="dpn"> Dashboard</span></a>
            <a class="menu" href="backed_product.php"><i class="bi bi-ui-checks-grid"></i> <span class="dpn">จัดการข้อมูล</span></a>
            <a class="menu" href="backed_pos.php"><i class="bi bi-basket-fill"></i><span class="dpn"> ขายสินค้า (POS)</span></a>
            <a class="menu" href="backed_purchaseorder.php"><i class="bi bi-clipboard-data"></i> <span class="dpn">ข้อมูลการสั่งซื้อสินค้า</span></a>
            <a class="menu" href="backed_notpaid.php"><i class="bi bi-cash-coin"></i><span class="dpn"> ยังไม่ชำระเงิน</span></a>
            <a class="menu" href="backed_reviews.php"><i class="bi bi-star"></i><span class="dpn"> รีวิวร้าน</span></a>
            <a class="menu" href="backed_customer.php"><i class="bi bi-people-fill"></i><span class="dpn"> ลูกค้า</span></a>
            <a class="menu" href="backed_purchaseSendback.php?pn=0"><i class="bi bi-chat-text-fill"></i><span class="dpn"> การตอบกลับ</span></a>
            <a class="menu-active" href="backed_store.php"><i class="bi bi-shop-window"></i><span class="dpn"> จัดการร้านค้า</span></a>
            <a class="btn_logout" onclick="window.location='./logout.php'" href="#"> <span>ออกจากระบบ</span></a> 
        </div>

        <div class="center">
            <h3 class="title-page">รายละเอียดหน้าเว็บ</h3>

            <?php
            $queryStore = "SELECT * FROM store WHERE store_no = 6";
            $resultStore = mysqli_query($conn, $queryStore);
            $rowStore = mysqli_fetch_array($resultStore)
            ?>

            <!-- ธนาคาร  -->
            <?php if ($rowStore['qr_img'] == "") { ?>

                <section class="page-bank-blank">
                    <section class="blank-detail">
                        <a href="#modal_bank_add" class="plus" data-toggle="modal"><i class="bi bi-plus-circle-fill"></i></a>
                        <p>ยังไม่มีข้อมูลบัญชีธนาคาร</p>
                    </section>
                </section>
            <?php } else { ?>
                <section class="page-bank">
                    <section class="page-img2">
                        <h6 class="title-section">รูปภาพ QR รับเงิน</h6>
                        <img src="<?php echo $rowStore['qr_img'] ?>" alt="รูปตกแต่งหน้าเว็บ" class="img-bank img-fluid">
                    </section>
                    <section class="page-img2">
                        <section class="page-img3">
                            <h6 class="title-section">รายละเอียดบัญชี</h6>
                            <?php if ($rowStore['bg_img_home'] != "") { ?>
                                <a href="#modal_bank_add" data-toggle="modal"><i class="bi bi-pencil-fill"></i> แก้ไข</a>
                            <?php } else {
                            } ?>
                        </section>
                        <section class="detail-bank">
                            <section class="detail-bank2">
                                <p class="text-detail1">ธนาคาร</p>
                                <p class="text-detail1">หมายเลขบัญชี</p>
                                <p class="text-detail1">ชื่อบัญชี</p>
                            </section>

                            <section class="detail-bank2">
                                <p class="text-detail2"><?php echo $rowStore['bank_name'] ?></p>
                                <p class="text-detail2"><?php echo $rowStore['bank_no'] ?></p>
                                <p class="text-detail2"><?php echo $rowStore['bank_cus'] ?></p>
                            </section>
                        </section>
                    </section>

                </section>
            <?php } ?>

            <!-- รูป  -->
            <section class="page-img">
                <section class="page-img2">
                    <section class="page-img3">
                        <h6 class="title-section">รูปภาพหลักสำหรับหน้าแรก (แนะนำขนาด 1920x800 px)</h6>
                        <?php if ($rowStore['main_img_home'] != "") { ?>
                            <a href="#main_img_home" data-toggle="modal"><i class="bi bi-pencil-fill"></i> แก้ไข</a>
                        <?php } else {
                        } ?>
                    </section>
                    <?php if ($rowStore['main_img_home'] == "") { ?>
                        <a href="#main_img_home" class="plus" data-toggle="modal"><i class="bi bi-plus-circle-fill"></i></a>
                    <?php } else { ?>
                        <img src="<?php echo $rowStore['main_img_home'] ?>" alt="รูปตกแต่งหน้าเว็บ" class="img-section img-fluid">
                    <?php } ?>
                </section>

                <section class="page-img2">
                    <section class="page-img3">
                        <h6 class="title-section">รูปภาพหลักสำหรับหน้าติดต่อ (แนะนำขนาด 1920x800 px)</h6>
                        <?php if ($rowStore['main_img_contact'] != "") { ?>
                            <a href="#main_img_contact" data-toggle="modal"><i class="bi bi-pencil-fill"></i> แก้ไข</a>
                        <?php } else {
                        } ?>
                    </section>
                    <?php if ($rowStore['main_img_contact'] == "") { ?>
                        <a href="#main_img_contact" class="plus" data-toggle="modal"><i class="bi bi-plus-circle-fill"></i></a>
                    <?php } else { ?>
                        <img src="<?php echo $rowStore['main_img_contact'] ?>" alt="รูปตกแต่งหน้าเว็บ" class="img-section img-fluid">
                    <?php } ?>
                </section>


                <section class="page-img2">
                    <section class="page-img3">
                        <h6 class="title-section">รูปภาพพื้นหลังหน้าหลัก (แนะนำขนาด 1800x800 px)</h6>
                        <?php if ($rowStore['bg_img_home'] != "") { ?>
                            <a href="#bg_img_home" data-toggle="modal"><i class="bi bi-pencil-fill"></i> แก้ไข</a>
                        <?php } else {
                        } ?>
                    </section>
                    <?php if ($rowStore['bg_img_home'] == "") { ?>
                        <a href="#bg_img_home" class="plus" data-toggle="modal"><i class="bi bi-plus-circle-fill"></i></a>
                    <?php } else { ?>
                        <img src="<?php echo $rowStore['bg_img_home'] ?>" alt="รูปตกแต่งหน้าเว็บ" class="img-section img-fluid">
                    <?php } ?>
                </section>

                <section class="page-img2">
                    <section class="page-img3">
                        <h6 class="title-section">รูปภาพพื้นหลังหน้าติดต่อ (แนะนำขนาด 800x800 px)</h6>
                        <?php if ($rowStore['bg_img_contact'] != "") { ?>
                            <a href=""><i class="bi bi-pencil-fill"></i> แก้ไข</a>
                        <?php } else {
                        } ?>
                    </section>
                    <?php if ($rowStore['bg_img_contact'] == "") { ?>
                        <a href="#bg_img_contact" class="plus" data-toggle="modal"><i class="bi bi-plus-circle-fill"></i></a>
                    <?php } else { ?>
                        <img src="<?php echo $rowStore['bg_img_contact'] ?>" alt="รูปตกแต่งหน้าเว็บ" class="img-section img-fluid">
                    <?php } ?>
                </section>
            </section>


            <!-- ติดต่อ  -->

            <?php if ($rowStore['logo_img'] == "") { ?>

                <section class="page-bank-blank">
                    <section class="blank-detail">
                        <a href="#modal_contact_add" class="plus" data-toggle="modal"><i class="bi bi-plus-circle-fill"></i></a>
                        <p>ยังไม่มีข้อมูลบัญชีธนาคาร</p>
                    </section>
                </section>
            <?php } else { ?>
                <section class="page-bank">
                    <section class="page-img2">
                        <h6 class="title-section">โลโก้ร้าน (แนะนำสี่เหลี่ยมผืนผ้า)</h6>
                        <img src="img/logo.png" alt="รูปโลโก้ร้าน" class="img-logo img-fluid">
                    </section>
                    <section class="page-img2">
                        <section class="page-img3">
                            <h6 class="title-section">ข้อมูลติดต่อ</h6>
                            <?php if ($rowStore['fb_link'] != "") { ?>
                                <a href="#modal_contact_add" data-toggle="modal"><i class="bi bi-pencil-fill"></i> แก้ไข</a>
                            <?php } else {
                            } ?>
                        </section>
                        <section class="detail-bank">
                            <section class="detail-bank2">
                                <p class="text-detail3"><img class="img-icon" src="img/icon/fb.png" alt="logo"></p>
                                <p class="text-detail3"><img class="img-icon" src="img/icon/ig.png" alt="logo"></p>
                                <p class="text-detail3"><img class="img-icon" src="img/icon/line.png" alt="logo"></p>
                                <p class="text-detail3">ที่อยู่</p>
                            </section>

                            <section class="detail-bank2">
                                <p class="text-detail2">
                                    <?php if ($rowStore['fb_link'] == "") {
                                        echo "-";
                                    } else {
                                        echo $rowStore['fb_link'];
                                    } ?>
                                </p>
                                <p class="text-detail2">
                                <?php if ($rowStore['ig_link'] == "") {
                                        echo "-";
                                    } else {
                                        echo $rowStore['ig_link'];
                                    } ?>
                                </p>
                                <p class="text-detail2">
                                <?php if ($rowStore['line_link'] == "") {
                                        echo "-";
                                    } else {
                                        echo $rowStore['line_link'];
                                    } ?>
                                </p>
                                <p class="text-detail2"><?php echo $rowStore['address_store'] ?></p>
                                <iframe class="map" src="https://maps.google.com/maps?q=<?php echo $rowStore['latitude']; ?>,<?php echo $rowStore['longitude']; ?>&output=embed"></iframe>
                            </section>
                        </section>
                    </section>

                </section>
            <?php } ?>

            <?php include('./store/modal_img.php'); ?>
        </div>

    </div>
    <!-- </div> -->


</body>

<script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            var lat = position.coords.latitude
            var lnt = position.coords.longitude
            document.getElementById("lat").value = lat
            document.getElementById("lnt").value = lnt

        }
    </script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="assets/jquery.min.js"></script>
<script src="assets/script.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>
<?php
mysqli_close($conn);
