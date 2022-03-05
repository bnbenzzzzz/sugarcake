<?php
session_start();
include("./connect/connectdb.php");
require_once("./function/pagination_function.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_purchaseorder.css">
    <link rel="stylesheet" href="css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รอการอนุมัติ</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="style.css">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        async function changePage(pId) {
            this.window.location.href = `./backed_show_purchase.php?purchase_id=${pId}`;
            return true
        }
    </script>
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
                        <h4 class="username"><?php echo $row['user_username'] ?></h4>
                        <p class="mailji" style="margin-top: -10px;margin-left: 10px;"><?php echo $row['user_email'] ?></p>
                    </div>
                </div><?php } ?>

            <a class="menu" href="backed_dash.php"><i class="bi bi-graph-up"></i><span class="dpn"> Dashboard</span></a>
            <a class="menu" href="backed_product.php"><i class="bi bi-ui-checks-grid"></i> <span class="dpn">จัดการข้อมูล</span></a>
            <a class="menu" href="backed_pos.php"><i class="bi bi-basket-fill"></i><span class="dpn"> ขายสินค้า (POS)</span></a>
            <a class="menu-active" href="backed_purchaseorder.php"><i class="bi bi-clipboard-data"></i> <span class="dpn">ข้อมูลการสั่งซื้อสินค้า</span></a>
            <a class="menu" href="backed_notpaid.php"><i class="bi bi-cash-coin"></i><span class="dpn"> ยังไม่ชำระเงิน</span></a>
            <a class="menu" href="backed_reviews.php"><i class="bi bi-star"></i><span class="dpn"> รีวิวร้าน</span></a>
            <a class="menu" href="backed_customer.php"><i class="bi bi-people-fill"></i><span class="dpn"> ลูกค้า</span></a>
            <a class="menu" href="backed_purchaseSendback.php?pn=0"><i class="bi bi-chat-text-fill"></i><span class="dpn"> การตอบกลับ</span></a>
            <a class="menu" href="backed_store.php"><i class="bi bi-shop-window"></i><span class="dpn"> ตกแต่งร้านค้า</span></a>
            <a class="btn_logout" onclick="window.location='./logout.php'" href="#"> <span>ออกจากระบบ</span></a>
        </div>
        <div class="center">

            <div class="tp">
                <!-- row3 -->

                <div class="bar">
                    <div class="welcome">
                        <a class="manage" href="backed_notpaid.php"> <span> รอการชำระ</span></a>

                        <?php $qrynew_ord = "SELECT * FROM purchaseorder  WHERE (purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' OR purchaseorder.purchase_status='ออเดอร์ผิดพลาด') AND  payment_state !=''";
                        $resultneworder = mysqli_query($conn, $qrynew_ord);
                        $rowneworder = mysqli_num_rows($resultneworder);
                        if ($rowneworder > 0) { ?>
                            <a class="active" href="backed_purchaseorder.php">
                                <span> การแจ้งโอนใหม่ <?php echo '<span class="shownum">' . $rowneworder . '</span>' ?></span></a>
                        <?php  } else { ?>
                            <a class="active" href="backed_purchaseorder.php">
                                <span> การแจ้งโอนใหม่</span></a>
                        <?php  } ?>

                        <?php $qryaccept_ord = "SELECT * FROM purchaseorder WHERE purchaseorder.purchase_status='อนุมัติออเดอร์แล้ว' OR purchaseorder.purchase_status='จัดส่งสินค้าแล้ว' ";
                        $resultacceptord = mysqli_query($conn, $qryaccept_ord);
                        $rowacceptord = mysqli_num_rows($resultacceptord);
                        if ($rowacceptord > 0) { ?>
                            <a class="manage" href="backed_purchaseAccepted.php">
                                <span> ยอมรับออเดอร์แล้ว <?php echo  $rowacceptord; ?></span></a>
                        <?php  } else { ?>
                            <a class="manage" href="backed_purchaseAccepted.php">
                                <span> ยอมรับออเดอร์แล้ว </span></a>
                        <?php  } ?>

                        <a class="manage" href="backed_purchaseHtr.php"> <span> ประวัติการสั่งซื้อ</span></a>
                        <a class="manage" href="backed_purchaseCancel.php"><span> ยกเลิก</span></a>
                    </div>
                </div>

                <!-- stat-filter -->

                <!-- <h5 class="title-filter">ตัวกรอง</h5> -->

                <div class="row filte">
                    <form name="FilterForm" id="FilterForm" action="backed_purchaseorder.php" method="GET">
                        <div>
                            <label class="se-fi" for="ty">สถานะการจ่ายเงิน</label>
                            <select class="js-example-basic-single" name="filter_stt_payment" id="filter_stt_payment" style="width:100%">
                                <option disabled hidden selected>----- เลือก -----</option>
                                <option value="1">จ่ายเต็ม</option>
                                <option value="2">มัดจำ</option>
                            </select>
                        </div>

                        <div>
                            <label class="se-fi">รับสินค้า วันที่เริ่ม</label>
                            <input type="date" class="form-control inputstart" placeholder="Start" name="date1" data-date-format="DD MMMM YYYY" />
                        </div>

                        <div>
                            <label class="txt">—</label>
                        </div>

                        <div>
                            <label class="se-fi">วันที่สิ้นสุด</label>
                            <input type="date" placeholder="dd-mm-yyyy" class="form-control inputend" placeholder="End" name="date2" />
                        </div>

                        <div>
                            <button type="submit" class="submit-fil">ตกลง</button>
                        </div>

                    </form>


                </div>

                <!-- end-filter -->

                <script>
                    function search() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("search");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("table");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[1];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>


                <div class="div-sort">
                    <form method="POST" id="sortform" action="">

                        <label for="select_sort">เรียงลำดับตาม :</label>
                        <select id="select_sort" name="sortby" class="sortby" onchange="this.form.submit();">
                            <option value="1" <?php
                                                if (isset($_POST["sortby"]) && ($_POST["sortby"]) == 1) {
                                                    echo ' selected';
                                                }
                                                ?>>หมายเลขคำสั่งซื้อ</option>
                            <option value="2" <?php
                                                if (isset($_POST["sortby"]) && ($_POST["sortby"]) == 2) {
                                                    echo ' selected';
                                                } ?>>วันที่สั่งซื้อใหม่สุดไปเก่าสุด</option>
                            <option value="3" <?php
                                                if (isset($_POST["sortby"]) && ($_POST["sortby"]) == 3) {
                                                    echo ' selected';
                                                } ?>>วันที่สั่งซื้อเก่าสุดไปใหม่สุด</option>
                        </select>
                    </form>

                    <div class="div-search">
                        <label for="select_sort">ค้นหาชื่อผู้ใช้ :</label>
                        <input type="text" id="search" onkeyup="search()" placeholder="ค้นหาชื่อผู้ใช้ลูกค้า" title="กรอกชื่อลูกค้า">

                        <?php
                        if (isset($_POST["sortby"])) {
                            $sortby = $_POST["sortby"];
                            if ($sortby == 1) {
                                $sql_txt = ' ORDER BY purchaseorder.purchase_id ASC';
                            } else if ($sortby == 2) {
                                $sql_txt = ' ORDER BY purchaseorder.date_pickup DESC';
                            } else if ($sortby == 3) {
                                $sql_txt = ' ORDER BY purchaseorder.date_pickup ASC';
                            } else {
                                $sql_txt = ' ORDER BY purchaseorder.purchase_id';
                            }
                        } else {
                            $sql_txt = ' ORDER BY purchaseorder.created_at';
                        }
                        ?>
                    </div>
                </div>


                <table id="table" class="table1">
                    <thead>

                        <tr class="head">
                            <th>หมายเลขคำสั่งซื้อ</th>
                            <th>ชื่อ</th>
                            <th>การจัดส่ง</th>
                            <th>วันเวลาที่มารับสินค้า</th>
                            <th>การชำระเงิน</th>
                            <th>ราคา</th>
                            <th></th>
                        </tr>
                    </thead>

                    <?php

                    if (isset($_GET['filter_stt_payment'])  && (empty($_GET['date1'])) && (empty($_GET['date2']))) {
                        $filter_stt_payment = $_GET['filter_stt_payment'];
                    ?>
                        <div class="show-filter">
                            <label class="fi"><i class="bi bi-funnel-fill"></i> ตัวกรอง </label> <a href="#" class="fil">สถานะการจ่ายเงิน : <?php if ($filter_stt_payment == 1) {
                                                                                                                                                echo "จ่ายเต็ม";
                                                                                                                                            } elseif ($filter_stt_payment == 2) {
                                                                                                                                                echo "มัดจำ";
                                                                                                                                            }
                                                                                                                                            ?></a>
                            <a class="reset" href="backed_purchaseorder.php"> รีเซ็ตตัวกรอง</a>
                        </div>

                        <!--___-->
                        <tbody>

                            <?php
                            $sql = "SELECT * FROM purchaseorder JOIN user ON purchaseorder.user_username=user.user_username WHERE (purchaseorder. purchase_status='สั่งซื้อแล้วรอการอนุมัติ' AND purchaseorder.payment_status = $filter_stt_payment) OR (purchaseorder. purchase_status='ออเดอร์ผิดพลาด' AND purchaseorder.payment_status = $filter_stt_payment)";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <?php
                                $num = 0;
                                $sql = "SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username WHERE (purchaseorder. purchase_status='สั่งซื้อแล้วรอการอนุมัติ' AND purchaseorder.payment_status = $filter_stt_payment) OR (purchaseorder. purchase_status='ออเดอร์ผิดพลาด' AND purchaseorder.payment_status = $filter_stt_payment)";
                                $result = mysqli_query($conn, $sql);
                                $total = $result->num_rows;

                                $e_page = 10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   

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

                                $sql .=  $sql_txt . "  LIMIT " . $s_page . ",$e_page";
                                $result = mysqli_query($conn, $sql);
                                if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                                    while ($row3 = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                                        $num++;
                                        $purchase_id  = $row3['purchase_id'];
                                        $query3 = "SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username 
                                       WHERE (purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' AND purchaseorder.purchase_id = $purchase_id) OR (purchaseorder.purchase_status='ออเดอร์ผิดพลาด' AND purchaseorder.purchase_id = $purchase_id) ORDER BY purchaseorder.created_at ";
                                        $result4 = mysqli_query($conn, $query3); ?>

                                        <tr class="detail-pur tr-shadow">
                                            <?php
                                            $querySendback = "SELECT * FROM sendback 
                                            INNER JOIN sendback_all ON sendback.sendback_no = sendback_all.sendback_no
                                            INNER JOIN purchaseorder ON sendback_all.purchase_id =  purchaseorder.purchase_id WHERE purchaseorder.purchase_id = $purchase_id ORDER BY sendback_id DESC";
                                            $resultSendback = mysqli_query($conn, $querySendback);
                                            $rowSendback = mysqli_fetch_array($resultSendback);

                                            if ($row3['purchase_status'] == 'สั่งซื้อแล้วรอการอนุมัติ') { ?>
                                                <td class="p_id"><?php echo $row3['purchase_id'] ?></td>
                                            <?php } else if ($row3['purchase_status'] == 'ออเดอร์ผิดพลาด' && $rowSendback['sendback_status'] == '0') { ?>
                                                <td class="p_id"><?php echo $row3['purchase_id'] ?><p class="p-warn2"><i class="bi bi-send-check-fill"></i><span class="sendcus"> ตอบกลับหาลูกค้า</span></p>
                                                </td>

                                            <?php  } else if ($row3['purchase_status'] == 'ออเดอร์ผิดพลาด' && $rowSendback['sendback_status'] = 1) { ?>
                                                <td class="p_id"><?php echo $row3['purchase_id'] ?><p class="p-warn1"><i class="bi bi-envelope-check-fill"></i><span class="cussend"> ลูกค้าตอบกลับมา</span></p>
                                                </td>

                                            <?php  } ?>
                                            <td class="namebold"><?php echo '<span class="namebold">' . $row3['user_fname'] . ' ' .  $row3['user_lname'] . '</span></br>' . $row3['user_username']; ?></td>
                                            <td class="deli_type"><?php
                                                                    if ($row3['deliver_type'] == 'take') {
                                                                        echo "รับสินค้าเอง";
                                                                    } elseif ($row3['deliver_type'] == 'delivery') {
                                                                        echo "ทางร้านจัดส่ง";
                                                                    } else {
                                                                        echo "อื่นๆ";
                                                                    }
                                                                    ?></td>
                                            <td class="date"><?php
                                                                if ($row3['deliver_type'] == 'take') {
                                                                    $date_pickup = $row3['date_pickup'];
                                                                    echo date('d-m-Y', strtotime($date_pickup)) . '<br>';
                                                                    $time_pickup = $row3['time_pickup'];
                                                                    echo date('H:i', strtotime($time_pickup));
                                                                } else if ($row3['deliver_type'] == 'delivery') {
                                                                    echo '-';
                                                                } ?></td>
                                            <td><?php
                                                if ($row3['payment_status'] == '1') {
                                                    echo '<span class="full">' . "จ่ายเต็ม" . "</span>";
                                                } elseif ($row3['payment_status'] == '2') {
                                                    echo '<span class="half">' . "มัดจำ" . "</span>";
                                                } else {
                                                    echo "อื่นๆ";
                                                }
                                                ?></td>
                                            <td class="price"><?php echo number_format($purchase_id) ?> ฿</td>

                                            <td class="check"><a href="#showpc<?php echo $purchase_id ?>" data-toggle="modal" class="btn_detail"><i class="bi bi-file-earmark-text"></i></a>
                                                <a href="#sendback<?php echo $purchase_id ?>" data-toggle="modal" class="btn_mistake"><i class="bi bi-exclamation-triangle-fill"></i></a>
                                                <?php
                                                include('./modal/modal_show_purchase.php'); ?>
                                            </td>
                                        </tr>
                                        <tr class="space"></tr>
                            <?php }
                                }
                            }
                            ?>
                        </tbody>

                    <?php } else if (!isset($_GET['filter_stt_payment'])  && (!empty($_GET['date1'])) && (!empty($_GET['date2']))) {
                        $date1 = date("Y/m/d", strtotime($_GET['date1']));
                        $date2 = date("Y/m/d", strtotime($_GET['date2']));
                    ?>

                        <label class="fi"><i class="bi bi-funnel-fill"></i> ตัวกรอง</label><a href="#" class="fil">ช่วงเวลา : <?php echo date("d-m-Y", strtotime($_GET['date1'])) . ' - ' . date("d-m-Y", strtotime($_GET['date2'])) ?> </a> <a class="reset" href="backed_purchaseorder.php">รีเซ็ตตัวกรอง</a>

                        <tbody>
                            <?php
                            $sql = "SELECT * FROM purchaseorder JOIN user ON purchaseorder.user_username=user.user_username WHERE purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' AND date_pickup BETWEEN '$date1' AND '$date2'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <?php
                                $num = 0;
                                $sql = "SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username WHERE ((purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' OR purchaseorder.purchase_status='ออเดอร์ผิดพลาด') AND purchaseorder.payment_state !='')AND date_pickup BETWEEN '$date1' AND '$date2'";
                                $result = mysqli_query($conn, $sql);
                                $total = $result->num_rows;

                                $e_page = 10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   

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

                                $sql .=  $sql_txt . "  LIMIT " . $s_page . ",$e_page";
                                $result = mysqli_query($conn, $sql);
                                if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                                    while ($row3 = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                                        // $num++;
                                        $purchase_id  = $row3['purchase_id'];
                                        $query3 = "SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username 
                                       WHERE (purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' AND purchaseorder.purchase_id = $purchase_id) OR (purchaseorder.purchase_status='ออเดอร์ผิดพลาด' AND purchaseorder.purchase_id = $purchase_id) ORDER BY purchaseorder.created_at ";
                                        $result4 = mysqli_query($conn, $query3); ?>

                                        <tr class="detail-pur tr-shadow">
                                            <?php
                                            $querySendback = "SELECT * FROM sendback WHERE purchase_id = $purchase_id ORDER BY sendback_id DESC";
                                            $resultSendback = mysqli_query($conn, $querySendback);
                                            $rowSendback = mysqli_fetch_array($resultSendback);
                                            if ($row3['purchase_status'] == 'สั่งซื้อแล้วรอการอนุมัติ') { ?>
                                                <td class="p_id"><?php echo $row3['purchase_id'] ?></td>
                                            <?php } else if ($row3['purchase_status'] == 'ออเดอร์ผิดพลาด' && $rowSendback['sendback_status'] == '0') { ?>
                                                <td class="p_id"><?php echo $row3['purchase_id'] ?><p class="p-warn2"><i class="bi bi-send-check-fill"></i><span class="sendcus"> ตอบกลับหาลูกค้า</span></p>
                                                </td>

                                            <?php  } else if ($row3['purchase_status'] == 'ออเดอร์ผิดพลาด' && $rowSendback['sendback_status'] = 1) { ?>
                                                <td class="p_id"><?php echo $row3['purchase_id'] ?><p class="p-warn1"><i class="bi bi-envelope-check-fill"></i><span class="cussend"> ลูกค้าตอบกลับมา</span></p>
                                                </td>

                                            <?php  } ?>
                                            <td class="namebold"><?php echo '<span class="namebold">' . $row3['user_fname'] . ' ' .  $row3['user_lname'] . '</span></br>' . $row3['user_username']; ?></td>
                                            <td class="deli_type"><?php
                                                                    if ($row3['deliver_type'] == 'take') {
                                                                        echo "รับสินค้าเอง";
                                                                    } elseif ($row3['deliver_type'] == 'delivery') {
                                                                        echo "ทางร้านจัดส่ง";
                                                                    } else {
                                                                        echo "อื่นๆ";
                                                                    }
                                                                    ?></td>
                                            <td class="date"><?php
                                                                if ($row3['deliver_type'] == 'take') {
                                                                    $date_pickup = $row3['date_pickup'];
                                                                    echo date('d-m-Y', strtotime($date_pickup)) . '<br>';
                                                                    $time_pickup = $row3['time_pickup'];
                                                                    echo date('H:i', strtotime($time_pickup));
                                                                } else if ($row3['deliver_type'] == 'delivery') {
                                                                    echo '-';
                                                                } ?></td>
                                            <td><?php
                                                if ($row3['payment_status'] == '1') {
                                                    echo '<span class="full">' . "จ่ายเต็ม" . "</span>";
                                                } elseif ($row3['payment_status'] == '2') {
                                                    echo '<span class="half">' . "มัดจำ" . "</span>";
                                                } else {
                                                    echo "อื่นๆ";
                                                }
                                                ?></td>
                                            <td class="price"><?php echo number_format($row3['purchase_price']) ?> ฿</td>

                                            <td class="check"><a href="#showpc<?php echo $purchase_id ?>" data-toggle="modal" class="btn_detail"><i class="bi bi-file-earmark-text"></i></a>
                                                <a href="#sendback<?php echo $purchase_id ?>" data-toggle="modal" class="btn_mistake"><i class="bi bi-exclamation-triangle-fill"></i></a>
                                                <?php
                                                include('./modal/modal_show_purchase.php'); ?>
                                            </td>

                                        </tr>
                                        <tr class="space"></tr>
                            <?php }
                                }
                            }
                            ?>
                        </tbody>

                    <?php } else if (isset($_GET['filter_stt_payment'])  && (!empty($_GET['date1'])) && (!empty($_GET['date2']))) {
                        $filter_stt_payment = $_GET['filter_stt_payment'];
                        $date1 = date("Y-m-d", strtotime($_GET['date1']));
                        $date2 = date("Y-m-d", strtotime($_GET['date2']));
                    ?>


                        <div class="show-filter">
                            <label class="fi"><i class="bi bi-funnel-fill"></i> ตัวกรอง</label><a href="#" class="fil"><?php if ($filter_stt_payment == 1) {
                                                                                                                            echo "มัดจำ";
                                                                                                                        } elseif ($filter_stt_payment == 2) {
                                                                                                                            echo "จ่ายเต็ม";
                                                                                                                        }
                                                                                                                        ?></a>

                            <a href="#" class="fil">ช่วงเวลา : <?php echo date("d/m/Y", strtotime($_GET['date1'])) . ' - ' . date("d/m/Y", strtotime($_GET['date2'])) ?> </a>
                            <a class="reset" href="backed_purchaseorder.php">รีเซ็ตตัวกรอง</a>
                        </div>

                        <?php
                        $sql = "SELECT * FROM purchaseorder JOIN user ON purchaseorder.user_username=user.user_username WHERE (purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' OR purchaseorder.purchase_status='ออเดอร์ผิดพลาด') AND purchaseorder.payment_status = $filter_stt_payment AND date_pickup BETWEEN '$date1' AND '$date2' ";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <?php
                            $num = 0;
                            $sql = " SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username WHERE (purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' OR purchaseorder.purchase_status='ออเดอร์ผิดพลาด') AND purchaseorder.payment_status = $filter_stt_payment AND date_pickup  BETWEEN '$date1' AND '$date2' ";
                            $result = mysqli_query($conn, $sql);
                            $total = $result->num_rows;
                            $sql .=  $sql_txt;
                            $result = mysqli_query($conn, $sql);
                            if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                                while ($row3 = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                                    $num++;
                                    $purchase_id  = $row3['purchase_id'];
                                    $query3 = "SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username 
                                       WHERE (purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' AND purchaseorder.purchase_id = $purchase_id) OR (purchaseorder.purchase_status='ออเดอร์ผิดพลาด' AND purchaseorder.purchase_id = $purchase_id)  ORDER BY purchaseorder.created_at ";
                                    $result4 = mysqli_query($conn, $query3); ?>

                                    <tr class="detail-pur tr-shadow">
                                        <?php
                                        $querySendback = "SELECT * FROM sendback WHERE purchase_id = $purchase_id ";
                                        $resultSendback = mysqli_query($conn, $querySendback);
                                        $rowSendback = mysqli_fetch_array($resultSendback);
                                        if ($row3['purchase_status'] == 'สั่งซื้อแล้วรอการอนุมัติ') { ?>
                                            <td class="p_id"><?php echo $row3['purchase_id'] ?></td>
                                        <?php } else if ($row3['purchase_status'] == 'ออเดอร์ผิดพลาด' && $rowSendback['sendback_status'] == '0') { ?>
                                            <td class="p_id"><?php echo $row3['purchase_id'] ?><p class="p-warn2"><i class="bi bi-send-check-fill"></i><span class="sendcus"> ตอบกลับหาลูกค้า</span></p>
                                            </td>

                                        <?php  } else if ($row3['purchase_status'] == 'ออเดอร์ผิดพลาด' && $rowSendback['sendback_status'] = 1) { ?>
                                            <td class="p_id"><?php echo $row3['purchase_id'] ?><p class="p-warn1"><i class="bi bi-envelope-check-fill"></i><span class="cussend"> ลูกค้าตอบกลับมา</span></p>
                                            </td>

                                        <?php  } ?>

                                        <td class="namebold"><?php echo '<span class="namebold">' . $row3['user_fname'] . ' ' .  $row3['user_lname'] . '</span></br>' . $row3['user_username']; ?></td>
                                        <td id="dt"><?php
                                                    if ($row3['deliver_type'] == 'take') {
                                                        echo "รับสินค้าเอง";
                                                    } elseif ($row3['deliver_type'] == 'delivery') {
                                                        echo "ทางร้านจัดส่ง";
                                                    } else {
                                                        echo "อื่นๆ";
                                                    }
                                                    ?></td>
                                        <td class="date"><?php
                                                            if ($row3['deliver_type'] == 'take') {
                                                                $date_pickup = $row3['date_pickup'];
                                                                echo date('d-m-Y', strtotime($date_pickup)) . '<br>';
                                                                $time_pickup = $row3['time_pickup'];
                                                                echo date('H:i', strtotime($time_pickup));
                                                            } else if ($row3['deliver_type'] == 'delivery') {
                                                                echo '-';
                                                            } ?></td>
                                        <td><?php
                                            if ($row3['payment_status'] == '1') {
                                                echo '<span class="full">' . "จ่ายเต็ม" . "</span>";
                                            } elseif ($row3['payment_status'] == '2') {
                                                echo '<span class="half">' . "มัดจำ" . "</span>";
                                            } else {
                                                echo "อื่นๆ";
                                            }
                                            ?></td>
                                        <td class="price"><?php echo number_format($row3['purchase_price'])  ?> ฿ </td>

                                        <td class="check"><a href="#showpc<?php echo $purchase_id ?>" data-toggle="modal" class="btn_detail"><i class="bi bi-file-earmark-text"></i></a>
                                            <a href="#sendback<?php echo $purchase_id ?>" data-toggle="modal" class="btn_mistake"><i class="bi bi-exclamation-triangle-fill"></i></a>
                                            <?php
                                            include('./modal/modal_show_purchase.php'); ?>
                                        </td>

                                    </tr>
                                    <tr class="space"></tr>
                        <?php }
                            }
                        }
                        ?>
                        </tbody>

                    <?php } else {
                    ?>
                        <tbody>
                            <?php
                            $num = 0;
                            $sql = "SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username WHERE (purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' OR purchaseorder.purchase_status='ออเดอร์ผิดพลาด') AND purchaseorder.payment_state != ''ORDER BY purchaseorder.created_at DESC";
                            $result = mysqli_query($conn, $sql);
                            $total = $result->num_rows;

                            $e_page = 10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
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

                            $sql .=  $sql_txt . "  LIMIT " . $s_page . ",$e_page";
                            while ($row3 = mysqli_fetch_assoc($result)) {
                                if ($result && $result->num_rows > 0) {
                                    $num++;

                                    $purchase_id  = $row3['purchase_id'];
                                    $query3 = "SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username 
                                       WHERE (purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' AND purchaseorder.purchase_id = $purchase_id) OR (purchaseorder.purchase_status='ออเดอร์ผิดพลาด' AND purchaseorder.purchase_id = $purchase_id) ";
                                    $result4 = mysqli_query($conn, $query3); ?>

                                    <tr class="detail-pur tr-shadow">

                                        <td class="p_id"><?php echo $row3['purchase_number'] ?>
                                        </td>

                                        <td><?php echo '<span class="namecus">' . $row3['user_fname'] . ' ' .  $row3['user_lname'] . '</span></br>' . $row3['user_username']; ?></td>
                                        <td class="deli_type"><?php
                                                                if ($row3['deliver_type'] == 'take') {
                                                                    echo "รับสินค้าเอง";
                                                                } elseif ($row3['deliver_type'] == 'delivery') {
                                                                    echo "ทางร้านจัดส่ง";
                                                                } else {
                                                                    echo "อื่นๆ";
                                                                }
                                                                ?></td>
                                        <td class="date"><?php
                                                            if ($row3['deliver_type'] == 'take') {
                                                                $date_pickup = $row3['date_pickup'];
                                                                echo date('d-m-Y', strtotime($date_pickup)) . '<br>';
                                                                $time_pickup = $row3['time_pickup'];
                                                                echo date('H:i', strtotime($time_pickup));
                                                            } else if ($row3['deliver_type'] == 'delivery') {
                                                                echo '-';
                                                            } ?></td>
                                        <td><?php
                                            if ($row3['payment_status'] == '1') {
                                                echo '<span class="full">' . "จ่ายเต็ม" . "</span>";
                                            } elseif ($row3['payment_status'] == '2') {
                                                echo '<span class="half">' . "มัดจำ" . "</span>";
                                            } else {
                                                echo "อื่นๆ";
                                            }
                                            ?></td>
                                        <td class="price"><?php echo number_format($row3['purchase_price'])  ?> ฿</td>

                                        <!-- <td><a href="./backed_show_purchase.php?purchase_id=<?php echo $purchase_id ?>" class="btn_check">ตรวจสอบ</a>

                                            </td> -->
                                        <td class="check"><a href="#showpc<?php echo $purchase_id ?>" data-toggle="modal" class="btn_detail"><i class="bi bi-file-text-fill"></i></a>
                                            <a href="#sendback<?php echo $purchase_id ?>" data-toggle="modal" class="btn_mistake"><i class="bi bi-chat-dots-fill"></i></a>
                                            <?php
                                            include('./modal/modal_show_purchase.php'); ?>
                                        </td>

                                        <!-- <td><button onclick="changePage(<?php echo $purchase_id ?>)" class="btn_check">ตรวจสอบ</button></td> -->
                                    </tr>
                                    <tr class="space"></tr>
                        <?php }
                            }
                        }
                        ?>
                        </tbody>

                        <?php  ?>
                </table>

                <?php
                page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page);
                ?>

            </div><!-- row3 -->
        </div>
    </div>
    </div>

    <?php include("cnd.php") ?>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>