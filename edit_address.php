<?php
session_start();
include("connect/connectdb.php");
include("./function/getNumOfCart.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel=”shortcut icon” href="img/icon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js" integrity="sha256-2JRzNxMJiS0aHOJjG+liqsEOuBb6++9cY4dSOyiijX4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/edit_address.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="./navbar/styles.css" />
    <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>
</head>

<body>
    <header id="nav-desktop">
        <div id="brand"><a href="index.php"><img class="img-logo" src="img/logo.png" alt="logo"></a></div>
        <nav>
            <ul>
                <li><a href="index.php">หน้าแรก</a></li>
                <li><a href="contact.php">ร้านค้า</a></li>
                <li><a class="cart" href="bakery_myorder.php">
                        <?php if ($numOrder > 0) { ?>
                            <span class="num"><?php echo $numOrder ?></span>ออเดอร์ของฉัน
                        <?php } else { ?>
                            ออเดอร์ของฉัน <?php } ?>
                    </a></li>
                <li><a class="cart" href="bakery_mycart.php">
                        <?php if ($numOfCart > 0) { ?>
                            <span class="num"><?php echo $numOfCart ?></span>ตะกร้าของฉัน
                        <?php } else { ?>
                            ตะกร้าของฉัน <?php } ?>
                    </a></li>
                <li><a href="profile.php">
                        <?php

                        if (isset($_SESSION['user_username'])) {
                            $sqlUser = "SELECT * FROM user WHERE user_username = '$username' ";
                            $resultUser = mysqli_query($conn, $sqlUser);
                            $numUser =  mysqli_fetch_array($resultUser); ?>
                            <img class="img-profile" src="<?php echo $numUser['user_img'] ?>" alt="profile">
                        <?php } else { ?>
                            <img class="img-profile" src="img/user1.png" alt="profile">
                        <?php } ?>
                    </a></li>
            </ul>
        </nav>
    </header>

    <header id="hamburger-icon">
        <div class="mobile-menu">
            <a class="menu-home " href="index.php">
                <i class="bi bi-house-door-fill"></i>
                <p class="p-text">หน้าแรก</p>
            </a>
            <a class="menu-chat" href="./contact.php">
                <i class="bi bi-shop"></i>
                <p class="p-text">ร้านค้า</p>
            </a>
            <a class="menu-order cart" href="./bakery_myorder.php">
                <?php if ($numOrder > 0) { ?>
                    <span class="num2"><?php echo $numOrder ?></span>
                <?php } else { ?>
                <?php } ?>
                <i class="bi bi-clipboard-check-fill"></i>
                <p class="p-text">ออเดอร์</p>
            </a>
            <a class="menu-cart cart" href="./bakery_mycart.php">
                <?php if ($numOfCart > 0) { ?>
                    <span class="num2"><?php echo $numOfCart ?></span>
                <?php } else { ?>
                <?php } ?>
                <i class="bi bi-basket2-fill"></i>
                <p class="p-text">ตะกร้าของฉัน</p>
            </a>
            <a class="menu-profile menu-activenow" href="profile.php">
                <i class="bi bi-person-fill"></i>
                <p class="p-text">โปรไฟล์</p>
            </a>
        </div>
    </header>
    <?php
    $edit = mysqli_query($conn, "SELECT * FROM user JOIN address_tbl ON user.user_username = address_tbl.user_username where user.user_username='" . $username . "'");
    $address_cus = mysqli_fetch_array($edit);
    ?>
    <div class="sub-menu">
        <h4>ข้อมูลส่วนตัว</h4>
        <i class="bi bi-person"></i><a class="detail_user" href="edit_profile.php"> รายละเอียดบัญชี</a><br>
        <i class="bi bi-archive"></i><a class="detail_address" href="edit_address.php"> ที่อยู่จัดส่ง</a>

    </div>

    <div class="modal-input">
        

        <form method="POST" enctype="multipart/form-data" action="./connect/con_edit_profile_user.php?user_username=<?php echo $address_cus["user_username"] ?>">
            <p class="head_form">ที่อยู่จัดส่ง</p>

            <?php  // $rownewaddress = $row["address_id"];
        $num = 0;
        $user_username = $_SESSION['user_username'];
        $queryadddress = "SELECT * FROM user JOIN address_tbl on user.user_username = address_tbl.user_username WHERE user.user_username = '$user_username' ";
        $resultnewaddress = mysqli_query($conn, $queryadddress);
        ?>

        <section class="content">
            <a href="#add_address<?php echo $user_username ?>" data-toggle="modal" class="btn_add"><i class="bi bi-plus"></i> เพิ่มที่อยู่</a>

            <article class="address" id="address">
                <!-- <p class="p-des">ที่อยู่ของฉัน </p> -->
                <?php

                while ($rownewaddress = mysqli_fetch_array($resultnewaddress)) {
                    $num++;
                    // $address_id = $rownewaddress['address_id'];
                ?>

                    <div class="row">
                        <!-- <div class="column0">
                            <?php echo '<span class="number"> '. $num .'</span>';?>
                        </div> -->

                        <div class="column1">
                            <label>ชื่อ-นามสกุล</label> <br>
                            <label>เบอร์โทร</label><br>
                            <label>ที่อยู่</label>
                        </div>
                        <div class="column2">
                            <div class="a">
                            <?php
                            $queryProvince = "SELECT * FROM provinces ";
                            $resultProvince = mysqli_query($conn, $queryProvince);
                            $queryAmphures = "SELECT * FROM amphures ";
                            $resultAmphures = mysqli_query($conn, $queryAmphures);
                            $queryDistricts = "SELECT * FROM districts ";
                            $resultDistricts = mysqli_query($conn, $queryDistricts);
                            ?>
                            <label class="info-address"><?php echo $rownewaddress['user_fname'] . ' ' . $rownewaddress['user_lname'] ?></label>
                            <br>
                            <label class="info-address"><?php echo $rownewaddress['user_tel'] ?></label>
                            <br>
                            <label class="info-address"><?php echo $rownewaddress['address_descript'] ?></label>
                            <label class="info-address"><?php while ($rowDistricts = mysqli_fetch_assoc($resultDistricts)) {
                                                            if ($rownewaddress['sub_district'] == $rowDistricts['id']) {
                                                                echo "ต." . $rowDistricts["name_th"];
                                                            }
                                                        } ?></label>
                            <br>
                            <label class="info-address"><?php while ($rowAmphures = mysqli_fetch_assoc($resultAmphures)) {
                                                            if ($rownewaddress['district'] == $rowAmphures['id']) {
                                                                echo " อ." . $rowAmphures["name_th"];
                                                            }
                                                        }  ?></label></div>
                            <label class="info-address"><?php while ($rowProvinces = mysqli_fetch_assoc($resultProvince)) {
                                                            if ($rownewaddress['province'] == $rowProvinces['id']) {
                                                                echo " จ." . $rowProvinces["name_th"];
                                                            }
                                                        } ?></label>
                            <br>
                            <label class="info-address"><?php echo $rownewaddress['postcode'] ?></label>

                        </div>

                        <div class="column3">
                            <?php if($rownewaddress['address_type'] == 1){
                                echo "<span class = 'pickup' >ที่อยู่จัดส่งสินค้า<span>";
                            }else{
                                echo '';
                            }
                          ?>
                        </div>

                        <div class="column4"> 
                             <?php
                            if ($rownewaddress['address_type'] == 1) {
                            ?>
                                <a href="./connect/con_defult_address.php?address_id=<?php echo $rownewaddress["address_id"]; ?>" class="default">ค่าเริ่มต้น </a>
                            <?php } else { ?>
                                <a href="./connect/con_defult_address.php?address_id=<?php echo $rownewaddress["address_id"]; ?>" class="non-default">ตั้งเป็นค่าเริ่มต้น</a>

                            <?php } ?>
<div class="grid">
                            <a href="#edit_address<?php echo $rownewaddress["user_username"]; ?>" data-toggle="modal" class="btn_edit">แก้ไข</a>
                            <a href="#del_address<?php echo $rownewaddress["user_username"]; ?>" data-toggle="modal" class="btn_del">ลบ</a>
                      </div>  </div>

                        <?php include('modal/modal_newaddress.php'); ?>

                      

                    </div>  <hr class="btm">
                <?php } ?>
            </article>
        </section>



            <label for="province">จังหวัด :</label>
            <select name="province_id" id="province" class="form-control">
                <?php
                $sql_province = "SELECT * from provinces";
                $select_province = mysqli_query($conn, $sql_province);
                while ($result_province = mysqli_fetch_assoc($select_province)) : ?>
                    <!-- <option hidden value="">ค้นหาจังหวัด</option> -->
                    <option <?php echo ($address_cus['province'] == $result_province['id']) ? 'selected' : ''; ?> value="<?= $result_province['id'] ?>"><?= $result_province['name_th'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="amphure">อำเภอ :</label>
            <select name="amphure_id" id="amphure" class="form-control">
                <?php
                $sql_amphure = "SELECT * from amphures";
                $select_amphure = mysqli_query($conn, $sql_amphure);
                while ($result_amphure = mysqli_fetch_assoc($select_amphure)) : ?>
                    <!-- <option hidden value="">ค้นหาจังหวัด</option> -->
                    <option <?php echo ($address_cus['district'] == $result_amphure['id']) ? 'selected' : ''; ?> value="<?= $result_amphure['id'] ?>"><?= $result_amphure['name_th'] ?></option>
                <?php endwhile; ?>
            </select>


            <label for="district">ตำบล :</label>
            <select name="district_id" id="district" class="form-control">
                <?php
                $sql_district = "SELECT * from 	districts";
                $select_district = mysqli_query($conn, $sql_district);
                while ($result_district = mysqli_fetch_assoc($select_district)) : ?>
                    <option <?php echo ($address_cus['sub_district'] == $result_district['id']) ? 'selected' : ''; ?> value="<?= $result_district['id'] ?>"><?= $result_district['name_th'] ?></option>
                <?php endwhile; ?>
                <!-- <option hidden value="">เลือกตำบล</option> -->
            </select>

            <label for="sub_add">ที่อยู่ :</label>
            <textarea name="sub_add" id="sub_add" rows="2" class="form-control">
                            <?php echo $address_cus['address_descript']; ?>
                        </textarea>

            <label for="postcode">รหัสไปรษณีย์ :</label>
            <input type="text" name="postcode" class="form-control" value="<?php echo $address_cus['postcode']; ?>">

            <div class="modal-btn-footer">
                <button type="button" class="btn btn-yl" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                <button type="submit" class="btn btn-bt">บันทึก</button>
            </div>
        </form>
    </div>


</body>

</html>