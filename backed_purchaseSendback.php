<?php
session_start();
include("connect/connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_purchaseSendback.css">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                        <h4 style="margin-top: 15px;"><?php echo $row['user_username'] ?></h4>
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
            <a class="menu-active" href="backed_purchaseSendback.php?pn=0"><i class="bi bi-chat-text-fill"></i><span class="dpn"> การตอบกลับ</span></a>
            <a class="menu" href="backed_store.php"><i class="bi bi-shop-window"></i><span class="dpn"> ตกแต่งร้านค้า</span></a>
            <a class="btn_logout" onclick="window.location='./logout.php'" href="#"> <span>ออกจากระบบ</span></a>
        </div>

        <div class="center">
            <!-- <div class="header-purchase">
                <a class="order-no" href="">
                    <p>#220128OL001</p>
                </a>
            </div> -->

            <div class="row-big">

                <div class="chat-people">
                    <?php
                    $queryUsername = "SELECT DISTINCT user_username FROM sendback_all WHERE sendback_status=1 ";
                    $resultUsername = mysqli_query($conn, $queryUsername);

                    while ($rowUsername = mysqli_fetch_array($resultUsername)) {
                        $username = $rowUsername['user_username'];
                        $queryPeople = "SELECT * FROM sendback_all
                        INNER JOIN purchaseorder ON sendback_all.purchase_id = purchaseorder.purchase_id
                        INNER JOIN user ON purchaseorder.user_username = user.user_username
                        WHERE sendback_all.user_username = '$username' ORDER BY  sendback_all.sendback_no DESC ";
                        $resultPeople = mysqli_query($conn, $queryPeople);
                        $rowPeople = mysqli_fetch_array($resultPeople)
                    ?>
                        <a href="backed_purchaseSendback.php?pn=<?php echo $rowPeople['sendback_no'] ?>">
                            <section class="people1">
                                <img src="<?php echo $rowPeople['user_img'] ?>" alt="" class="profile">
                                <div class="p-mix">
                                    <p class="p-people-name"><?php echo $rowPeople['user_fname'] ?> <?php echo $rowPeople['user_lname'] ?></p>
                                    <p class="p-username"><?php echo $rowPeople['user_username'] ?></p>
                                </div>
                            </section>
                        </a>
                    <?php } ?>
                </div>

                <div class="chat-detail">
                    <?php
                    $pn = $_GET['pn'];


                    $queryChat = "SELECT * FROM sendback_all JOIN sendback
                        ON sendback_all.sendback_no = sendback.sendback_no
                        WHERE sendback_all.sendback_no='$pn'  ";
                    $resultChat = mysqli_query($conn, $queryChat);
                    $resultTest = mysqli_query($conn, $queryChat);
                    $rowNumber = mysqli_fetch_array($resultTest);
                    $rowNum = mysqli_num_rows($resultChat);

                  

                    if ($rowNum > 0) {
                        $pi = $rowNumber['purchase_id'];
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
                        <?php if ($pn == 0) { ?>
                            <a href="#"></a>
                        <?php } else {
                            $pi = $rowNumber['purchase_id'];
                            $queryProduct = "SELECT * FROM purchaseorder 
                            JOIN user ON purchaseorder.user_username = user.user_username
                            WHERE purchaseorder.purchase_id='$pi'  ";
                            $resultProduct = mysqli_query($conn, $queryProduct);
                            $rowProduct = mysqli_fetch_array($resultProduct);
                        ?>

                            <a class="btn-view" href="#show<?php echo $pi ?>" data-toggle="modal"><?php echo $rowProduct['user_fname'] . " " . $rowProduct['user_lname'] ?></a>
                        <?php } ?>
                        <section class="btn-all">
                            <?php if ($pn == 0) { ?>
                                <a href="#"></a>
                            <?php } else {
                                $purchase_id = $rowNumber['purchase_id'];
                                $queryProduct = "SELECT * FROM purchaseorder WHERE purchase_id='$pi'  ";
                                $resultProduct = mysqli_query($conn, $queryProduct);
                                $rowProduct = mysqli_fetch_array($resultProduct);

                            ?>

                                <a class="btn-cancel" href="./connect/con_cancel_order.php?purchase_id=<?php echo $purchase_id ?>">ยกเลิกออเดอร์</a>
                                <a class="btn-end" href="./connect/con_edit_sendback.php?pn=<?php echo $pn ?>">จบการตอบกลับ</a>
                            <?php } ?>
                        </section>
                    </div>


                    <section class="select-bill">
                    <?php if ($pn == 0) { ?>

                        <?php } else { ?>
                        <?php
                        $queryGetdetail = "SELECT * FROM sendback_all JOIN purchaseorder
                        ON sendback_all.purchase_id = purchaseorder.purchase_id
                        WHERE sendback_all.sendback_no='$pn'  ";
                        $resultGetdetail = mysqli_query($conn, $queryGetdetail);
                        $rowGetdetail = mysqli_fetch_array($resultGetdetail);
                        $USN = $rowGetdetail['user_username'];
                        ?>
                        <p>#<?php echo $rowGetdetail['purchase_number'] ?></p>
                        <p>ราคาบิล <?php echo $rowGetdetail['purchase_price'] ?> บาท</p>
                        <p><?php if ($rowGetdetail['deliver_type'] == "take") {
                                echo "รับเอง";
                            } else {
                                echo "จัดส่ง";
                            }
                            ?></p>
                        <?php
                        $queryBill = "SELECT * FROM sendback_all JOIN purchaseorder ON  sendback_all.purchase_id = purchaseorder.purchase_id
                         WHERE sendback_all.user_username = '$USN' AND sendback_all.sendback_status = 1  ";
                        $resultBill = mysqli_query($conn, $queryBill);
                        ?>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                เลือกบิล
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <?php while ($rowBill = mysqli_fetch_array($resultBill)) { ?>
                                    <li><a class="dropdown-item" href="backed_purchaseSendback.php?pn=<?php echo $rowBill['sendback_no'] ?>">#<?php echo $rowBill['purchase_number'] ?></a></li>
                                <?php  } ?>
                            </ul>
                        </div>
                        <?php } ?>
                    </section>

                    <div class="div-chat" id="myDiv">
                        <?php
                        if ($rowNum > 0) {
                            while ($rowChat = mysqli_fetch_array($resultChat)) {
                                if ($rowChat['sendback_type'] == 1) { ?>

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
                                        <p class="time1"><?php echo $rowChat['time_create'] ?></p>
                                    </section>

                                <?php } else { ?>
                                    <section class="chat-right">
                                    <?php if ($rowChat['descript'] != "") { ?>
                                        <div class="div-right1"></div>
                                        <div class="div-right2">
                                            <p class="text1"><?php echo $rowChat['descript'] ?></p>
                                        </div>
                                        <?php } else {
                                        } ?>
                                        <?php if ($rowChat['slip_before'] != "") { ?>
                                            <div class="div-right1"></div>
                                            <div class="div-photo">
                                                <img class="img-chat2" src="<?php echo $rowChat['slip_before'] ?>" alt="photo">
                                            </div>
                                        <?php } else {
                                        } ?>
                                        <p class="time2"><?php echo $rowChat['time_create'] ?></p>

                                    </section>

                                <?php } ?>

                            <?php }
                        } else { ?>
                            <h3 class="blank-bill">กรุณาเลือกบิล</h3>

                        <?php } ?>

                    </div>

                    <div class="div-input">

                        <form action="./connect/con_add_sendback.php?pn=<?php echo $pn ?>" method="POST" enctype="multipart/form-data">
                            <div class="row-big-input">
                                <div class="input-insert">
                                    <label for="logo_img">เพิ่มรูปภาพ</label>
                                    <input type="file" width="2px" class="form-control" id="logo_img" name="pic_index1" accept="image/*" onchange="loadFile1(event)">
                                    <label for="embed">กรอกข้อความ</label>
                                    <textarea class="form-control" name="embed" id="embed" placeholder="กรอกข้อความ"></textarea>
                                </div>
                                <button type="submit" class=" btn-send"><i class="bi bi-send-fill"></i></button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>



        </div>
        <?php include('modal/modal_detail_order_sendback.php'); ?>
    </div>
    </div>
    <script>
        var myDiv = document.getElementById("myDiv");
        myDiv.scrollTop = myDiv.scrollHeight;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> <?php include("cnd.php") ?>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>