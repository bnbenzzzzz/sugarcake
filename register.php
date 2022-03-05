<?php
include('./connect/connectdb.php');
$sql = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel=”shortcut icon” href="img/icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <!-- <link href="assets/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>

    <!-- ที่อยู่ -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

    <link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

</head>

<body>
    <section class="card-login">
        <div class="left">
            <div class="box-content">
                <!-- <h1 class="hello-text">ยินดีต้อนรับ</h1> -->
                <img class="img-login" src="./img/logo.png" alt="รูปภาพlogin">

                <p class="descript-text">
                    ลงทะเบียนบัญชีผู้ใช้เพื่อการจัดส่งสินค้า
                </p>
                <a class="btn-signin" href="./login.php">เข้าสู่ระบบ</a>
                <a class="btn-visit bi bi-shop-window" href="./index.php"> เข้าชมเว็บไซต์</a>
            </div>
        </div>
        <?php $date_current = date("Y-m-d"); ?>


        <div class="right">
            <div class="box-content2">
                <h3 class="hello-text2">ลงทะเบียน</h3>
                <form class="form-input" enctype="multipart/form-data" action="connect/con_registercus1.php" method="post">

                    <div class="sub-input">

                        <div class="input-sub">
                            <label for="user_img">รูปโปรไฟล์</label>
                            <input type="file" class="form-login-img" name="user_img" id="user_img" accept="image/*" onchange="loadFile1(event)">
                        </div>
                        <div class="input-sub">
                            <label for="username">ชื่อผู้ใช้</label>
                            <input class="form-login" type="text" name="username" id="username" placeholder="username" required>
                        </div>
                        <div class="input-sub">
                            <label for="fname">ชื่อ</label>
                            <input class="form-login" type="text" name="fname" id="fname" placeholder="firstname" required>
                        </div>
                        <div class="input-sub">
                            <label for="lname">นามสกุล</label>
                            <input class="form-login" type="text" name="lname" id="lname" placeholder="lastname" required>
                        </div>
                        <div class="input-sub">
                            <label for="lname">รหัสผ่าน</label>
                            <input class="form-login" type="password" name="password" id="password" placeholder="password" required>
                        </div>
                        <div class="input-sub">
                            <label for="repassword">ยืนยันรหัสผ่าน</label>
                            <input class="form-login" type="password" id="repassword" placeholder="password again" required>
                        </div>
                        <div class="input-sub">
                            <label for="email">อีเมล</label>
                            <input class="form-login" type="email" name="email" id="email" placeholder="email" required>
                        </div>
                        <div class="input-sub">
                            <label for="tel">เบอร์โทร</label>
                            <input class="form-login" type="tel" name="tel" id="tel" placeholder="tel" maxlength="10" required>
                        </div>
                        <div class="input-sub">
                            <label for="BOD">วันเกิด</label>
                            <input class="form-login" type="date" name="BOD" id="BOD" placeholder="birthday" required>
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
                            <label for="sub_add">ที่อยู่</label>
                            <input class="form-login" type="text" name="sub_add" id="sub_add" placeholder="ที่อยู่" required>
                        </div>


                            <div class="form-control">
                                <span>ตำบล/แขวง</span>
                                <inpu id="sub_district" type="text" class="txt" placeholder="ตำบล">
                            </div>
                            <div class="form-control">
                                <span>อำเภอ/เขต</span>
                                <input id="district" type="text" class="txt" placeholder="อำเภอ">
                            </div>
                            <div class="form-control">
                                <span>จังหวัด</span>
                                <input id="province" type="text" class="txt" placeholder="จังหวัด">
                            </div>
                            <div class="form-control">
                                <span>รหัสไปรษณีย์</span>
                                <input id="postcode" type="text" class="txt" placeholder="รหัสไปรษณีย์">
                            </div>                
                        <div class="input-sub">
                            <label for="province_id">จังหวัด</label>
                            <select name="province_id" id="province" class="form-control">
                                <option hidden value="">ค้นหาจังหวัด</option>
                                <?php while ($result = mysqli_fetch_assoc($query)) : ?>
                                    <option value="<?= $result['id'] ?>"><?= $result['name_th'] ?></option>
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
                            <label for="postcode">รหัสไปรษณีย์</label>
                            <input class="form-login" type="text" name="postcode" id="postcode" placeholder="รหัสไปรษณีย์" required>
                        </div>
                    </div>

                    <input class="btn-signup" type="submit" value="ลงทะเบียน" name="register">
                    <a class="btn-signin nonenone" href="./login.php">เข้าสู่ระบบ</a>
                    <a class="btn-visit nonenone bi bi-shop-window " href="./index.php"> เข้าชมเว็บไซต์</a>
                </form>


            </div>
        </div>
    </section>
    <!-- 
    <script src="assets/jquery.min.js"></script>
    <script src="assets/script.js"></script> -->
    <script>
        $.Thailand({
            $district: $("#sub_district"), // input ของตำบล
            $amphoe: $("#district"), // input ของอำเภอ
            $province: $("#province"), // input ของจังหวัด
            $zipcode: $("#postcode") // input ของรหัสไปรษณีย์
        });
    </script>
</body>

</html>