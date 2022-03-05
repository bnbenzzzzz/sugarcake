<?php
session_start();
include("connect/connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_staff.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/modal.css">
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

    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 class="text-h1" id="exampleModalLabel" class="header-mdinsert">ลงทะเบียนพนักงาน</h1>

                    <form action="connect/con_registerstaff.php" method="post" enctype="multipart/form-data">

                        <label>รูปภาพส่วนตัว :</label>
                        <input type="file" name="pic_index" id="pic_index" class="form-control">

                        <label>ชื่อผู้ใช้ :</label>
                        <input class="form-control regis" type="text" name="username" id="username" placeholder="username" required>

                        <label>ชื่อ :</label>
                        <input class="form-control regis" type="text" name="fname" id="fname" placeholder="ชื่อ" required>

                        <label>สกุล :</label>
                        <input class="form-control regis" type="text" name="lname" id="lname" placeholder="สกุล" required>

                        <label>รหัสผ่าน :</label>
                        <input class="form-control regis" type="password" name="password" id="password" placeholder="password" required>

                        <label>กรอกรหัสผ่านอีกครั้ง :</label>
                        <input class="form-control regis" type="password" name="repassword" id="repassword" placeholder="re-password" required>

                        <label>อีเมล :</label>
                        <input class="form-control regis" type="email" name="email" id="email" placeholder="email" required>

                        <label>วันเกิด :</label>
                        <input class="form-control regis" type="date" name="BOD" id="BOD" placeholder="birthday" required>

                        <label>เบอร์โทรศัพท์ :</label>
                        <input class="form-control regis" type="tel" name="tel" id="tel" placeholder="tel" required>

                        <label>เพศ :</label>
                        <input class="regis btnn" type="radio" name="gender" id="gender" value="1" checked>เพศชาย
                        <input class="regis btnn" type="radio" name="gender" id="gender" value="2">เพศหญิง
                        <input class="regis btnn" type="radio" name="gender" id="gender" value="3">อื่นๆ <br>

                        <label>ที่อยู่ :</label>
                        <input class="form-control regis" type="address" name="address" id="address" placeholder="ที่อยู่" required>

                        <center><input class="btn btn-lg btn-success btn-block" type="submit" value="ลงทะเบียน" name="register" style="text-align:center"></center>
                   
                </div>
                </form>
            </div>
        </div>
    </div>
    <button data-toggle="modal" href="#register" type="button" class="add">+ เพิ่มพนักงาน</button>

    <div class="bar">
        <div class="welcome">
            <a class="manage" href="backed_product.php"><span> สินค้า</span></a>
            <a class="manage" href="backed_category.php"><span> หมวดหมู่</span></a>
            <a class="manage" href="backed_set.php"><span> ชุดสินค้า</span></a>
            <a class="manage" href="backed_promotion.php"><span> โปรโมชัน</span></a>
            <a class="manage" href="backed_profile.php"><span> บัญชีผู้ใช้</span></a>
            <!-- <a class="manage" href="backed_customer.php"><span> ลูกค้า</span></a> -->
            <a class="manage-active" href="backed_staff.php"><span> พนักงาน</span></a>
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
                        <h4 class="username" tyle="margin-top: 15px;"><?php echo $row['user_username'] ?></h4>
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
            <div class="search">
                <h2 class="title-staff">ข้อมูลพนักงาน</h2>
                <input type="text" id="search" onkeyup="search()" placeholder="ค้นหาชื่อพนักงาน" title="กรอกชื่อพนักงาน">
            </div>

            <div class="row row-table">
                <!-- row2 -->

                <table id="table">
                    <thead>
                        <th></th>
                        <th>ชื่อ</th>
                        <th>อีเมล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>วันที่สมัคร</th>

                    </thead>
                    <tbody>
                        <?php
                        include('connect/connectdb.php');
                        $sql = "SELECT * FROM user";
                        $result = mysqli_query($conn, $sql);
                        $total = mysqli_num_rows($result);

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

                        $sql .=   "  LIMIT " . $s_page . ",$e_page";
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row["user_status"] == 2) { ?>

                                <tr class="tr-shadow">
                                    <td><img class="img-user" src="<?php echo $row['user_img'] ?>" width="70" alt=""></td>
                                    <td class="namebold"><?php echo '<span class="namecus">' . $row['user_fname'] . ' ' .  $row['user_lname'] . '</span></br>' . $row['user_username']; ?></td>
                                    <td><span class="email"><?php echo $row['user_email'] ?></span></td>
                                    <td><?php echo $row['user_tel'] ?></td>
                                    <td><?php
                                        $date = $row['date_register'];
                                        echo  date('d-m-Y', strtotime($date)) ;
                                        ?>
                                    </td>
                                    <td class="btn2"><a href="./backed_view_staff.php?user_username=<?php echo $row["user_username"] ?>"><button class="view_sale">ดูข้อมูลการขาย</button></a><button class="btn_edit" href="#editbtn<?php echo $row['user_username'] ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit">แก้ไขข้อมูล</button></td>

                                    <?php include('modal/modal_edit_backed_staff.php'); ?>
                                </tr>
                                <tr class="space"></tr>
                        <?php
                            }
                        } ?>

                    </tbody>
                </table>
                <?php
                // page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page);
                ?>
            </div>
        </div>

    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>