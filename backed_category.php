<?php
session_start();
include("connect/connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_category.css">
    <link rel="stylesheet" href="css/index.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
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

</head>
</head>

<body>

    <!-- <a href="#addcategory" data-toggle="modal" class="add">+ เพิ่มหมวดหมู่สินค้า</a> -->

    <div class="bar">
        <div class="welcome">
            <a class="manage" href="backed_product.php"><span> สินค้า</span></a>
            <a class="manage-active" href="backed_category.php"><span> หมวดหมู่</span></a>
            <a class="manage" href="backed_set.php"><span> ชุดสินค้า</span></a>
            <a class="manage" href="backed_promotion.php"><span> โปรโมชัน</span></a>
            <a class="manage" href="backed_profile.php"><span> บัญชีผู้ใช้</span></a>
            <!-- <a class="manage" href="backed_customer.php"><span> ลูกค้า</span></a> -->
            <a class="manage" href="backed_staff.php"><span> พนักงาน</span></a>
        </div>
    </div>
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
            <a class="menu-active" href="backed_product.php"><i class="bi bi-ui-checks-grid"></i> <span class="dpn">จัดการข้อมูล</span></a>
            <a class="menu" href="backed_pos.php"><i class="bi bi-basket-fill"></i><span class="dpn"> ขายสินค้า (POS)</span></a>
            <a class="menu" href="backed_purchaseorder.php"><i class="bi bi-clipboard-data"></i> <span class="dpn">ข้อมูลการสั่งซื้อสินค้า</span></a>
            <a class="menu" href="backed_notpaid.php"><i class="bi bi-cash-coin"></i><span class="dpn"> ยังไม่ชำระเงิน</span></a>
            <a class="menu" href="backed_reviews.php"><i class="bi bi-star"></i><span class="dpn"> รีวิวร้าน</span></a>
            <a class="menu" href="backed_customer.php"><i class="bi bi-people-fill"></i><span class="dpn"> ลูกค้า</span></a>
            <a class="menu" href="backed_purchaseSendback.php?pn=0"><i class="bi bi-chat-text-fill"></i><span class="dpn"> การตอบกลับ</span></a>
            <a class="menu" href="backed_store.php"><i class="bi bi-shop-window"></i><span class="dpn"> ตกแต่งร้านค้า</span></a>
            <a class="btn_logout" onclick="window.location='./logout.php'" href="#"> <span>ออกจากระบบ</span></a> 
        </div>

        <div class="center">



            <p class="catname">ประเภทสินค้า</p>

            <div class="row-cat">
                <div class="card-cat">
                    <section class="plus-cat">
                        <a href="#addcategory" data-toggle="modal"><i class="bi bi-plus-circle-fill"></i></a>
                    </section>
                </div>
                <?php
                $sql = "SELECT * FROM category WHERE cat_status != 1";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>

                    <div class="card-cat">
                        <img class="company-img img-fluid" src="img/car.jpg" alt="โลโก้ขนส่ง">
                        <p class="company-name"><?php echo $row["cat_name"] ?></p>
                        <div class="btn-mixcat">
                            <a href="#editcat<?php echo $row["cat_id"]; ?>" data-toggle="modal" class="btn_edit">แก้ไข</a>
                            <a href="#deletecat<?php echo $row["cat_id"]; ?>" data-toggle="modal" class="btn_delete">ลบ</a>
                        </div>
                    </div>

                    <?php include('modal/modal_cat.php'); ?>
                <?php } ?>
            </div>
            <hr class="hr-line">
            <p class="catname">บริษัทขนส่ง</p>
            <div class="row-cat">
                <div class="card-cat">
                    <section class="plus-cat">
                        <a href="#addcompany" data-toggle="modal"><i class="bi bi-plus-circle-fill"></i></a>
                    </section>
                </div>

                <?php
                $sqlCom = "SELECT * FROM shippingcompany WHERE company_status != 0";
                $resultCom = mysqli_query($conn, $sqlCom);
                while ($rowCom = mysqli_fetch_array($resultCom)) {
                    $rowcomID = $rowCom["company_id"];
                ?>

                    <div class="card-cat">
                        <img class="company-img img-fluid" src="<?php echo $rowCom["company_img"] ?>" alt="โลโก้ขนส่ง">
                        <p class="company-name"><?php echo $rowCom["company_name"] ?></p>
                        <div class="btn-mixcat">
                            <a href="#editcom<?php echo $rowcomID ?>" data-toggle="modal" class="btn_edit">แก้ไข</a>
                            <a href="#deletecom<?php echo $rowcomID ?>" data-toggle="modal" class="btn_delete">ลบ</a>
                        </div>
                    </div>


                    <?php include('modal/modal_company.php'); ?>
                <?php } ?>
            </div>





        </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>