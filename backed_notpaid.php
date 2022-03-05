<?php
session_start();
include("./connect/connectdb.php");
require_once("./function/pagination_function.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_notpaid.css">
    <link rel="stylesheet" href="css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unpaid</title>
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
            <a class="menu-active" href="backed_purchaseorder.php"><i class="bi bi-clipboard-data"></i> <span class="dpn">ข้อมูลการสั่งซื้อสินค้า</span></a>
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
                        <a class="active" href="backed_notpaid.php"> <span> รอการชำระ</span></a>

                        <?php $qrynew_ord = "SELECT * FROM purchaseorder  WHERE (purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' OR purchaseorder.purchase_status='ออเดอร์ผิดพลาด') AND  payment_state !=''";
                        $resultneworder = mysqli_query($conn, $qrynew_ord);
                        $rowneworder = mysqli_num_rows($resultneworder);
                        if ($rowneworder > 0) { ?>
                            <a class="manage" href="backed_purchaseorder.php">
                                <span> การแจ้งโอนใหม่ <?php echo '<span class="shownum">' . $rowneworder . '</span>' ?></span></a>
                        <?php  } else { ?>
                            <a class="manage" href="backed_purchaseorder.php">
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
                                                } ?>>วันที่สั่งเก่าสุดไปใหม่สุด</option>
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
                            <th >วันที่สั่ง</th>
                            <th>หมายเลขคำสั่งซื้อ</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>ราคา</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $queryRate = "SELECT * FROM purchaseorder WHERE (purchase_status='สั่งซื้อแล้วรอการอนุมัติ'AND payment_state='' )";
                        $resultRate = mysqli_query($conn, $queryRate);

                        while ($rowRate = mysqli_fetch_array($resultRate)) {
                            $purchase_ID = $rowRate['purchase_id'];
                        ?>
                            <tr class="detail-pur tr-shadow">
                                <td>
                                    <p> <?php echo date('d-m-Y', strtotime($rowRate['created_at'])) . '<br>' . date('H:i', strtotime($rowRate['created_at']));
                                        ?></p>
                                </td>
                                <?php
                                $queryUser = "SELECT * FROM purchaseorder JOIN user ON purchaseorder.user_username = user.user_username 
            WHERE  purchaseorder.purchase_id='$purchase_ID'";
                                $resultUser = mysqli_query($conn, $queryUser);
                                $rowUser = mysqli_fetch_array($resultUser);
                                ?>
                                <td>
                                    <?php echo $rowRate['purchase_number'] ?>
                                </td>
                                <td>
                                    <?php echo '<span class="namecus">' . $rowUser['user_fname'] . ' ' .  $rowUser['user_lname'] . '</span></br>' . $rowUser['user_username']; ?></td>
                                </td>

                                <td class="price">
                                    <?php echo number_format($rowRate['purchase_price']) ?> ฿</p>
                                </td>
                                <td>
                                    <a href="#show<?php echo $purchase_ID ?>" data-toggle="modal" class="btn_detail"><i class="bi bi-file-text-fill"></i></a>
                                    <a class="btn-review-hide" href="#cancel_order<?php echo $purchase_ID ?>" data-toggle="modal" class="btn_cancel">ยกเลิกออเดอร์</a>
                                    <?php include('modal/modal_cancel_order.php'); ?>
                                </td>

                            </tr>
                            <tr class="space"></tr>
                    </tbody>

                <?php } ?>
                </table>
                <?php
                // page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page);
                ?>

            </div><!-- row3 -->
        </div>
    </div>



    <!-- </div> -->

    <?php include("cnd.php") ?>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>