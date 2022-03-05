<?php
session_start();
include("connect/connectdb.php");
require_once("function/pagination_function.php");

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_view_order.css">
    <link rel="stylesheet" href="css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
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
</head>
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
                        <h4 class="username" style="margin-top: 24px;"><?php echo $row['user_username'] ?></h4>
                    </div>
                </div><?php } ?>
            <a class="menu" href="backed_dash.php"><i class="bi bi-graph-up"></i><span class="dpn"> Dashboard</span></a>
            <a class="menu" href="backed_product.php"><i class="bi bi-ui-checks-grid"></i> <span class="dpn">จัดการข้อมูล</span></a>
            <a class="menu" href="backed_pos.php"><i class="bi bi-basket-fill"></i><span class="dpn"> ขายสินค้า (POS)</span></a>
            <a class="menu" href="backed_purchaseorder.php"><i class="bi bi-clipboard-data"></i> <span class="dpn">ข้อมูลการสั่งซื้อสินค้า</span></a>
            <a class="menu" href="backed_notpaid.php"><i class="bi bi-cash-coin"></i><span class="dpn"> ยังไม่ชำระเงิน</span></a>
            <a class="menu" href="backed_reviews.php"><i class="bi bi-star"></i><span class="dpn"> รีวิวร้าน</span></a>
            <a class="menu-active" href="backed_customer.php"><i class="bi bi-people-fill"></i><span class="dpn"> ลูกค้า</span></a>
            <a class="menu" href="backed_purchaseSendback.php?pn=0"><i class="bi bi-chat-text-fill"></i><span class="dpn"> การตอบกลับ</span></a>
            <a class="menu" href="backed_store.php"><i class="bi bi-shop-window"></i><span class="dpn"> ตกแต่งร้านค้า</span></a>
            <a class="btn_logout" onclick="window.location='./logout.php'" href="#"> <span>ออกจากระบบ</span></a>
        </div>

        <div class="center">

            <a href="./backed_customer.php" class="btn-back"><i class="bi bi-arrow-left"></i> กลับไปหน้าข้อมูลลูกค้า</a>


            <div class="tp">
                <div class="topic">
                    <?php
                    $user_username = $_GET['user_username'];
                    $vieword = "SELECT * FROM purchaseorder JOIN user ON purchaseorder.user_username=user.user_username WHERE (user.user_username = '$user_username') AND  (purchaseorder.purchase_status='รับสินค้าแล้ว') ";
                    $resultord = mysqli_query($conn, $vieword);
                    $row5 = mysqli_fetch_array($resultord); 
                    $numrowcheck =  mysqli_num_rows ( $resultord );
                    if ($numrowcheck == 0){
                        echo '<span class="show"> ไม่พบข้อมูลการใช้บริการ <span>';
                    }else{?>
                                          <h2>ข้อมูลการใช้บริการ : <span class="namecus"> คุณ <?php echo $row5['user_fname'] . ' ' . $row5['user_lname'] ?> </span></h2>
  
                  
                    
                    

                </div>
               

                <table id="table" class="table1">

                    <thead>
                        <tr class="head">
                            <th>วันที่สั่ง</th>
                            <th>หมายเลขคำสั่งซื้อ</th>
                            <th>การสั่งซื้อ</th>
                            <th>การรับสินค้า</th>
                            <th>ราคาสินค้า</th>
                            <th>ส่วนลด</th>
                            <th>ราคาสุทธิ</th>
                            <th>การจ่าย</th>
                            <th>พนักงาน</th>

                        </tr>
                    </thead> 
                   
                    <tbody>

                        <?php

                        $user_username = $_GET['user_username'];
                        $vieword = "SELECT * FROM purchaseorder JOIN user ON purchaseorder.user_username=user.user_username WHERE ((user.user_username = '$user_username') AND  (purchaseorder.purchase_status='รับสินค้าแล้ว')) ORDER BY created_at desc ";
                        $resultord = mysqli_query($conn, $vieword);

                        $total = mysqli_num_rows($resultord);

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

                        $vieword .=   "  LIMIT " . $s_page . ",$e_page";
                        while ($row5 = mysqli_fetch_array($resultord)) { ?>

                            <tr class="tr-shadow">
                                <td><?php
                                    $ord_date = $row5['created_at'];
                                    echo date('d-m-Y', strtotime($ord_date)) . '<br>';
                                    $ord_time = $row5['created_at'];
                                    echo date('H:i', strtotime($ord_time));
                                    ?></td>
                                <td class="p_id"><?php echo $row5['purchase_number'] ?></td>

                                <td><?php 
                                if ($row5['purchase_type' == 'online']) {
                                    echo "ออนไลน์"; 
                                }elseif ($row5['purchase_type' == 'dine-in']){
                                    echo "ทานที่ร้าน";
                                }elseif ($row5['purchase_type' == 'takeout']){
                                    echo "สั่งกลับบ้าน";
                                }
    
                                ?></td>
                                <td><?php
                                    if ( $row5['deliver_type' == 'take']){
                                        echo "นัดรับที่ร้าน";
                                    }elseif ( $row5['deliver_type' == 'delivery']){
                                        echo "จัดส่ง";             
                                     }else {
                                        echo "หน้าร้าน";
                                     }
                                    ?>
                                </td>

                                <td> <?php echo number_format($row5['sumprice_pd']) ?> ฿</td>
                                <td>- <?php echo $row5['discount']; ?> ฿</td>
                                <td><?php echo number_format($row5['purchase_price']) ?> ฿</td>
                                <td>
                                    <?php 
                                    if ($row5['payment_type' == 'cash']){
                                        echo "เงินสด" ;
                                    } elseif ($row5['payment_type' == 'promptpay']) {
                                        echo "พร้อมเพย์";
                                    } elseif ($row5['payment_type' == 'คนละครึ่ง']) {
                                        echo "คนละครึ่ง";
                                    } elseif ($row5['payment_type' == 'เราชนะ']){
                                        echo "เราชนะ";
                                    } elseif ($row5['payment_type' == 'อื่นๆ']) {
                                        echo "อื่นๆ";
                                    }


                                     
                                    ?></td>
                                <td>
                                    <?php
                                    $st = $row5['staff'];
                                    $staffname = "SELECT * FROM user WHERE user_username = '$st' ";
                                    $resultstaff = mysqli_query($conn, $staffname);
                                    $staff = mysqli_fetch_array($resultstaff);
                                    echo $staff['user_fname']; ?>

                                </td>

                            </tr>
                            <tr class="space"></tr>


                    </tbody>

                <?php } ?>
                </table>
                <?php
                page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page);
                ?>
 <?php } ?>
            </div><!-- row3 -->
        </div>


</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>