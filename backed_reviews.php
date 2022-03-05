<?php
session_start();
include("./connect/connectdb.php");
require_once("./function/pagination_function.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_reviews.css">
    <link rel="stylesheet" href="css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
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
            <a class="menu-active" href="backed_reviews.php"><i class="bi bi-star"></i><span class="dpn"> รีวิวร้าน</span></a>
            <a class="menu" href="backed_customer.php"><i class="bi bi-people-fill"></i><span class="dpn"> ลูกค้า</span></a>
            <a class="menu" href="backed_purchaseSendback.php?pn=0"><i class="bi bi-chat-text-fill"></i><span class="dpn"> การตอบกลับ</span></a>
            <a class="menu" href="backed_store.php"><i class="bi bi-shop-window"></i><span class="dpn"> ตกแต่งร้านค้า</span></a>
            <a class="btn_logout" onclick="window.location='./logout.php'" href="#"> <span>ออกจากระบบ</span></a> 
        </div>
        <div class="center">

                <!-- row3 -->

                <h1 style="padding-left:1.2em;margin-top:1em;">รีวิวร้าน</h1>
                <table id="table" class="table1">
                    <thead>

                        <tr class="head">
                            <th class="radius1">วันที่</th>
                            <th>ชื่อ</th>
                            <th>หมายเลขคำสั่งซื้อ</th>
                            <th>คะแนน</th>
                            <th>คอมเมนต์</th>
                            <th></th>
                            <th class="radius2"></th>
                        </tr>
                        <tr class="space"> 

                    </thead>

                    <tbody>
                        <?php
                        $queryRate = "SELECT * FROM review WHERE review_status !=3 ORDER BY review_id DESC";
                        $resultRate = mysqli_query($conn, $queryRate);

                        $total = mysqli_num_rows($resultRate);

                    $num = 0;
                    $e_page = 10;

                    $step_num = 0;
                    if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 1)) {
                        $_GET['page'] = 1;
                        $step_num = 0;
                        $s_page = 0;
                    } else {
                        $s_page = $_GET['page'] - 1;
                        $step_num = $_GET['page'] - 1;
                        $s_page = $s_page * $e_page;
                    }

                    $queryRate .=   "  LIMIT " . $s_page . ",$e_page";

                        while ($rowRate = mysqli_fetch_array($resultRate)) {
                            $purchase_ID = $rowRate['purchase_id'];
                        ?>
                            <tr class="tr-shadow">
                                <td class="date">
                                    <p> <?php 
                                    $rate_date = $rowRate['review_create'];
                                    echo date('d-m-Y', strtotime($rate_date)).'<br>';
                                    $rate_time = $rowRate['review_create'];
                                    echo date('H:i', strtotime($rate_time));
                                     ?></p>
                                </td>
                                <?php
                                $queryUser = "SELECT * FROM purchaseorder JOIN user ON purchaseorder.user_username = user.user_username 
                                WHERE  purchaseorder.purchase_id='$purchase_ID'";
                                $resultUser = mysqli_query($conn, $queryUser);
                                $rowUser = mysqli_fetch_array($resultUser);
                                ?>
                                <td class="cus">
                                    <p ><?php echo $rowUser['user_username'] ?></p>
                                </td>
                                <td class="">
                                    <p><?php echo $rowUser['purchase_number'] ?></p>
                                </td>
                                <td class="rate-bi">
                                    <?php if ($rowRate['review_rate'] == 1) { ?>
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                                    <?php } else if ($rowRate['review_rate'] == 2) { ?>
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                                    <?php } else if ($rowRate['review_rate'] == 3) { ?>
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                                    <?php } else if ($rowRate['review_rate'] == 4) { ?>
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                                    <?php } else if ($rowRate['review_rate'] == 5) { ?>
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <?php } ?>
                                </td>
                                <td class="p-comcom">
                                    <p ><?php echo $rowRate['review_comment']; ?></p>
                                </td>
                                <td class="td-delete"><a class="btn-review-delete" href="#dereview<?php echo $rowRate['review_id'] ?>" data-toggle="modal"><i class="bi bi-trash-fill"></i></a></td>
                                <td class="eye">
                                    <?php if ($rowRate['review_status'] == 0) { ?>
                                        <a class="btn-review-show" href="./connect/con_edit_review.php?review_id=<?php echo $rowRate['review_id'] ?>"><i class="bi bi-eye-fill"></i><p class="show">แสดง</p> </a>
                                    <?php } else { ?>
                                        <a class="btn-review-hide" href="./connect/con_edit_review.php?review_id=<?php echo $rowRate['review_id'] ?>"><i class="bi bi-eye-slash-fill"></i> <p class="hide">ซ่อน</p></a>
                                    <?php } ?><?php include('./modal/modal_review.php'); ?>
                                </td>
                            </tr>
                            <tr class="space"></tr>
                    </tbody>
                    
                <?php } ?>
                </table>
                <?php
                page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page);
                ?>

            </div><!-- row3 -->
    </div>



    <!-- </div> -->

    <?php include("cnd.php") ?>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>