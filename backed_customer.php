<?php
session_start();
include("connect/connectdb.php");
require_once("function/pagination_function.php");

$sql_pv = "SELECT * FROM provinces";
$query_pv = mysqli_query($conn, $sql_pv);

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_customer.css">
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

<body>
    <button data-toggle="modal" href="#register" type="button" class="add">+ เพิ่มลูกค้า</button>

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
            <a class="menu-active" href="backed_customer.php"><i class="bi bi-people-fill"></i><span class="dpn"> ลูกค้า</span></a>
            <a class="menu" href="backed_purchaseSendback.php?pn=0"><i class="bi bi-chat-text-fill"></i><span class="dpn"> การตอบกลับ</span></a>
            <a class="menu" href="backed_store.php"><i class="bi bi-shop-window"></i><span class="dpn"> ตกแต่งร้านค้า</span></a>
            <a class="btn_logout" onclick="window.location='./logout.php'" href="#"> <span>ออกจากระบบ</span></a>
        </div>

        <div class="center">
            <div class="search">
                <h2 class="title-cus">ข้อมูลลูกค้า</h2>
                <input type="text" id="search" onkeyup="search()" placeholder="ค้นหาชื่อลูกค้า" title="กรอกชื่อลูกค้า">
            </div>
            <?php $date_current = date("Y-m-d");?>

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
                            if ($row["user_status"] == 1) { ?>
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
                                    <td><a href="./backed_view_order.php?user_username=<?php echo $row["user_username"] ?>"> <button class="btn_edit">ดูข้อมูลการใช้บริการ </button></a></td>
                                    <a href=""></a>
                                </tr>
                                <tr class="space"></tr>
                        <?php
                            }
                        } ?>

                    </tbody>
                </table>
                <?php
                page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page);
                ?>
            </div>

        </div>
        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="color:gray" class="modal-title" id="exampleModalLabel" class="header">ลงทะเบียนลูกค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img class="x" src="img/close.png" width="20" alt="">                          
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="connect/con_registercus2.php" enctype="multipart/form-data" method="POST">

                            <div class="input_regis">

                                <div class="input-sub">
                                    <label for="user_img">รูปโปรไฟล์</label>
                                    <input type="file" class="form-login-img form-control" name="user_img" id="user_img" accept="image/*" onchange="loadFile1(event)">
                                </div>
                            </div>
                            <div class="input-sub">
                                <label for="username">ชื่อผู้ใช้</label>
                                <input class="form-login form-control" type="text" name="username" id="username" placeholder="username" required>
                            </div>
                            <div class="input-sub">
                                <label for="fname">ชื่อ</label>
                                <input class="form-login form-control" type="text" name="fname" id="fname" placeholder="firstname" required>
                            </div>
                            <div class="input-sub">
                                <label for="lname">นามสกุล</label>
                                <input class="form-login form-control" type="text" name="lname" id="lname" placeholder="lastname" required>
                            </div>
                            <div class="input-sub">
                                <label for="lname">รหัสผ่าน</label>
                                <input class="form-login form-control" type="password" name="password" id="password" placeholder="password" required>
                            </div>
                            <div class="input-sub">
                                <label for="repassword">ยืนยันรหัสผ่าน</label>
                                <input class="form-login form-control" type="password" id="repassword" placeholder="password again" required>
                            </div>
                            <div class="input-sub">
                                <label for="email">อีเมล</label>
                                <input class="form-login form-control" type="email" name="email" id="email" placeholder="email" required>
                            </div>
                            <div class="input-sub">
                                <label for="tel">เบอร์โทร</label>
                                <input class="form-login form-control" type="tel" name="tel" id="tel" placeholder="tel" maxlength="10" required>
                            </div>
                            <div class="input-sub">
                                <label for="BOD">วันเกิด</label>
                                <input class="form-login form-control" type="date" name="BOD" id="BOD" placeholder="birthday" required>
                            </div>
                            <div class="input-sub">
                                <label for="BOD">เพศ</label>
                                <div class="radio_sex">
                                    <input class="regis btnn" type="radio" name="gender" id="gender1" value="1" checked> <label for="gender1">เพศชาย</label>
                                    <input class="regis btnn" type="radio" name="gender" id="gender2" value="2"> <label for="gender2">เพศหญิง</label>
                                    <input class="regis btnn" type="radio" name="gender" id="gender3" value="3"> <label for="gender3">อื่น ๆ</label>
                                </div>
                            </div>
                            <div class="input-sub">
                                <label for="province_id">จังหวัด</label>
                                <select name="province_id" id="province" class="form-control">
                                    <option hidden value="">ค้นหาจังหวัด</option>
                                    <?php while ($result_pv = mysqli_fetch_assoc($query_pv)) : ?>
                                        <option value="<?= $result_pv['id'] ?>"><?= $result_pv['name_th'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="input-sub">
                                <label for="amphure">อำเภอ</label>
                                <select name="amphure_id" id="amphure" class="form-control">
                                    <option hidden value="">เลือกอำเภอ</option>
                                </select>
                            </div>
                            <div class="input-sub">
                                <label for="district">ตำบล</label>
                                <select name="district_id" id="district" class="form-control">
                                    <option hidden value="">เลือกตำบล</option>
                                </select>
                            </div>
                            <div class="input-sub">
                                <label for="sub_add">ที่อยู่</label>
                                <input class="form-login form-control" type="text" name="sub_add" id="sub_add" placeholder="ที่อยู่" required>
                            </div>
                            <div class="input-sub">
                                <label for="postcode">รหัสไปรษณีย์</label>
                                <input class="form-login form-control" type="text" name="postcode" id="postcode" placeholder="รหัสไปรษณีย์" required>
                            </div>
                    </div>
                    <input class="btn-signup" type="submit" value="ลงทะเบียน" name="register">

                    </form>
                </div>
            </div>
        </div>
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
                td = tr[i].getElementsByTagName("td")[2];
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
</body>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="assets/jquery.min.js"></script>
<script src="assets/script.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>
<?php
mysqli_close($conn);
