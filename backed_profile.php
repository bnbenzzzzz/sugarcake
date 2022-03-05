<?php
session_start();
include("connect/connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_profile.css">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>
</head>

<body>
    <!-- <button type="button" class="add">+ เพิ่มหมวดหมู่</button> -->

    <div class="bar">
        <div class="welcome">
            <a class="manage" href="backed_product.php"><span> สินค้า</span></a>
            <a class="manage" href="backed_category.php"><span> หมวดหมู่</span></a>
            <a class="manage" href="backed_set.php"><span> ชุดสินค้า</span></a>
            <a class="manage" href="backed_promotion.php"><span> โปรโมชัน</span></a>
            <a class="manage-active" href="backed_profile.php"><span> บัญชีผู้ใช้</span></a>
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
            <div class="row">
                <!-- row2 -->

                <div class="col">

                    <div class="row">


                        <div class="col-bg">
                            <div class="image">
                                <?php
                                $sql = "SELECT * FROM user WHERE user_status=3";
                                $result = mysqli_query($conn, $sql);
                                $address_admin = mysqli_fetch_array($result); {
                                ?>
                                    <div>
                                        <img src="<?php echo $address_admin['user_img'] ?>" width="100" alt="">
                                    </div>
                                    <div class="name_admin">
                                        <?php echo '<span class="fname_lname">' . $address_admin['user_fname'] . ' ' . $address_admin['user_lname'] . '</span><br><span class="username_admin">' . $address_admin['user_username']; ?>
                                    </div>
                                <?php } ?>
                            </div>


                            <form method="POST" enctype="multipart/form-data" action="./connect/con_edit_profile_user.php?user_username=<?php echo $address_admin["user_username"] ?>">

                                <div class="profilerow">
                                    <div>
                                        <label>รูปภาพส่วนตัว</label>
                                        <input type="file" class="form-control regis" id="pic_index" name="pic_index">
                                    </div>
                                    <div>
                                        <label>ชื่อผู้ใช้</label>
                                        <input type="text" name="user_username" disabled class="form-control" value="<?php echo $address_admin['user_username']; ?>">
                                    </div>
                                    <div>
                                        <label>ชื่อ</label>
                                        <input type="text" name="user_fname" class="form-control" value="<?php echo $address_admin['user_fname']; ?>">
                                    </div>
                                    <div>
                                        <label>สกุล</label>
                                        <input type="text" name="user_lname" class="form-control" value="<?php echo $address_admin['user_lname']; ?>">
                                    </div>
                                    <div>
                                        <label>เพศ</label>
                                        <input type="text" name="user_gender" class="form-control" value="<?php
                                                                                                            if ($address_admin['user_gender'] == '1') {
                                                                                                                echo "ชาย";
                                                                                                            } elseif ($address_admin['user_gender'] == '2') {
                                                                                                                echo "หญิง";
                                                                                                            } else {
                                                                                                                echo "อื่นๆ";
                                                                                                            }
                                                                                                            ?>" readonly>
                                    </div>

                                    <div>
                                        <label>วันเกิด</label>
                                        <input type="date" name="user_birth" class="form-control" data-date-format="DD MMMM YYYY" value="<?php echo $address_admin['user_birth']; ?>">
                                    </div>

                                    <div>
                                        <label>อีเมล</label>
                                        <input type="text" name="user_email" class="form-control" value="<?php echo $address_admin['user_email']; ?>">
                                    </div>
                                    <div>
                                        <label>เบอร์</label>
                                        <input type="text" name="user_tel" maxlength=10 class="form-control" value="<?php echo $address_admin['user_tel']; ?>">
                                    </div>
                                </div>

                                <div class="sub_add">

                                    <label for="sub_add">ที่อยู่</label>
                                    <textarea name="user_address" id="user_address" rows="2" class="form-control">
                                        <?php echo $address_admin['user_address']; ?>
                                    </textarea>
                                </div>
                                                                                                            
                                <div class="modal-btn-footer">
                                    <button type="submit" class="btn btn-bt">บันทึก</button>
                                </div>

                            </form>


                        </div>
                    </div><!-- col-md-12 -->
                </div><!-- row2 -->
            </div>


        </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>