<?php
session_start();
include("connect/connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_promotion.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/modal_add_setbox.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotion</title>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</head>


<body>
    <a href="#addpro" data-toggle="modal" class="add">+ เพิ่มโปรโมชัน</a>
    <div class="bar">
        <div class="welcome">
            <a class="manage" href="backed_product.php"><span> สินค้า</span></a>
            <a class="manage" href="backed_category.php"><span> หมวดหมู่</span></a>
            <a class="manage" href="backed_set.php"><span> ชุดสินค้า</span></a>
            <a class="manage-active" href="backed_promotion.php"><span> โปรโมชัน</span></a>
            <a class="manage" href="backed_profile.php"><span> บัญชีผู้ใช้</span></a>
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
                    <div class="col-md-3"><img style="width: 70px;height:70px;border-radius:50%;border:3px solid #80ED99" class="img_profile" 
                    src="<?php echo $row['user_img'] ?>" width="70" alt=""></div>
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

            <div class="row-card">
                <?php

                $sql = "SELECT * FROM promotion ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $n = $row['promotion_id']; ?>
                    <div class="card-allset">
                        <div class="card-set">
                            <div class="left-promotion">
                                <!-- <div class="type-promotion"><?php echo $row["promotion_type"] ?></div> -->
                                <img src="<?php echo $row["promotion_img"] ?>" class="card-img" alt="...">
                            </div>

                            <div class="right-promotion">
                                <div class="card-name">
                                    <p class="set_name" title="<?php echo $row["promotion_name"] ?>"><?php echo $row["promotion_name"] ?></p>
                                    <p class="set_price"><?php echo $row["total_price"] ?> ฿</p>
                                </div>

                                <p class="descript-detail">รายละเอียด</p>
                                <div class="text_box"><i class="bi bi-basket3 font-awesome1"></i>
                                    <?php
                                    $sql2 = "SELECT * FROM promotion_detail JOIN product 
                            ON promotion_detail.pd_id=product.pd_id WHERE promotion_detail.promotion_id=$n";
                                    $result2 = mysqli_query($conn, $sql2);
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                    ?>
                                        <p class="pd-name"> <?php echo $row2["pd_name"] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="text_box2">
                                    <p class="pd-name"><i class="bi bi-clock font-awesome2"></i> <?php echo $row["promotion_start"] ?> ถึง <?php echo $row["promotion_end"] ?></p>
                                    <?php if ($row["promotion_status"] == 1) { ?>
                                        <p class="pd-name1"><i class="bi bi-shop"></i> สำหรับใช้หน้าร้าน</p>
                                    <?php  } else if ($row["promotion_status"] == 0) { ?>
                                        <p class="pd-name3"><i class="bi bi-shield-fill-x"></i> ปิดการใช้งาน</p>
                                    <?php } ?>

                                </div>


                            </div>
                        </div>
                        <div class="div-btn">
                            <a href="#editpro<?php echo $row["promotion_id"]; ?>" data-toggle="modal" class="btn_edit"><i class="bi bi-pencil-square"></i> แก้ไขโปรโมชัน</a>
                        </div>
                    </div>
                    <?php include('modal/modal_promotion.php'); ?>



                <?php } ?>
            </div>


        </div>

        <!-- modal add  -->

        <div class="modal fade ad" id="addpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <?php
            include('./connect/connectdb.php');
            ?>
            <div class="modal-dialog">
                <div class="modal-content momo">
                    <h2 class="add-name-cat">เพิ่มโปรโมชัน</h2>
                    <div class="col ">
                        <form action="./connect/con_add_promotion.php" method="POST" enctype="multipart/form-data">

                            <div class="row-createname2">
                                <div class="row-createname3">
                                    <label class="form-label" for="promotion_name">ชื่อโปรโมชัน :</label>
                                    <input type="text" class="form-control form-input-img form-input" required name="promotion_name" id="promotion_name">
                                </div>
                                <div class="row-createname3">
                                    <label class="form-label" for="promo_type">ประเภทที่ใช้ได้ :</label>
                                    <select class="form-control form-input" name="type_use" id="promo_type" required>
                                        <option hidden value=" ">- เลือกประเภทการใช้ -</option>
                                        <option value="1">สำหรับใช้หน้าร้าน</option>


                                    </select>
                                </div>

                            </div>
                            <div class="row-createname2">
                                <div class="row-createname3">
                                    <label class="form-label" for="type_pro">ประเภทโปรโมชัน :</label>
                                    <select class="form-control form-input" name="type_pro" id="group1" required>
                                        <option hidden value=" ">- เลือกประเภทโปรโมชัน -</option>
                                        <option value="จับคู่">จับคู่</option>
                                        <option value="เซต">เซต</option>
                                        <option value="ลดราคา">ลดราคาสินค้า</option>
                                    </select>
                                </div>
                                <div class="row-createname3">
                                    <label class="form-label" for="promotion_img">ภาพปก :</label>
                                    <input type="file" class="form-control form-input-img form-input" name="promotion_img" id="promotion_img" accept="image/*" onchange="loadFile1(event)" required>
                                </div>
                            </div>
                            <div class="row-createname2">
                                <div class="row-createname3">
                                    <label class="form-label" for="date_start">วันเริ่มต้น :</label>
                                    <input class="form-control form-input" type="date" name="date_start" id="date_start" required>
                                </div>
                                <div class="row-createname3">
                                    <label class="form-label" for="date_end">วันสิ้นสุด :</label>
                                    <input class="form-control form-input" type="date" name="date_end" id="date_end" required>
                                </div>
                            </div>

                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#selectduo').hide();
                            $('#selectset').hide();
                            $('#selectdiscount').hide();
                            $("#group1").change(function() {
                                var value = $("#group1 option:selected").val();
                                if (value == "จับคู่") {
                                    $('#selectduo').show();
                                    $('#selectset').hide();
                                    $('#selectdiscount').hide();
                                } else if (value == "เซต") {
                                    $('#selectduo').hide();
                                    $('#selectset').show();
                                    $('#selectdiscount').hide();
                                } else if (value == "ลดราคา") {
                                    $('#selectduo').hide();
                                    $('#selectset').hide();
                                    $('#selectdiscount').show();
                                }
                            });
                        });
                    </script>

                    <div class="row-createname" id="selectduo">
                        <div class="row-createname3">
                            <label class="form-label" for="product1">เลือกสินค้าชิ้นที่ 1 :</label>
                            <div class="row-createname4">
                                <select class="form-control form-input" name="product1" id="product1">
                                    <option value="" hidden>สินค้าชิ้นที่ 1</option>
                                    <?php
                                    $query1 = "SELECT * FROM product  ";
                                    $result1 = mysqli_query($conn, $query1);
                                    while ($row = mysqli_fetch_array($result1)) { ?>
                                        <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" class="textshowprice6"> -->
                            </div>
                        </div>
                        <div class="row-createname3">
                            <label class="form-label" for="product2">เลือกสินค้าชิ้นที่ 2 :</label>
                            <div class="row-createname4">
                                <select class="form-control form-input" name="product2" id="product2">
                                    <option value="" hidden>สินค้าชิ้นที่ 2</option>
                                    <?php
                                    $query1 = "SELECT * FROM product  ";
                                    $result1 = mysqli_query($conn, $query1);
                                    while ($row = mysqli_fetch_array($result1)) { ?>
                                        <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" class="textshowprice6"> -->
                            </div>
                        </div>
                    </div>

                    <div class="row-createname" id="selectset">
                        <div class="row-createname3">
                            <label class="form-label" for="product3">เลือกสินค้าชิ้นที่ 1 :</label>
                            <div class="row-createname4">
                                <select class="form-control form-input" name="product3" id="product3">
                                    <option value="" hidden>สินค้าชิ้นที่ 1</option>
                                    <?php
                                    $query1 = "SELECT * FROM product  ";
                                    $result1 = mysqli_query($conn, $query1);
                                    while ($row = mysqli_fetch_array($result1)) { ?>
                                        <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" class="textshowprice6"> -->
                            </div>
                        </div>
                        <div class="row-createname3">
                            <label class="form-label" for="product4">เลือกสินค้าชิ้นที่ 2 :</label>
                            <div class="row-createname4">
                                <select class="form-control form-input" name="product4" id="product4">
                                    <option value="" hidden>สินค้าชิ้นที่ 2</option>
                                    <?php
                                    $query1 = "SELECT * FROM product  ";
                                    $result1 = mysqli_query($conn, $query1);
                                    while ($row = mysqli_fetch_array($result1)) { ?>
                                        <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" class="textshowprice6"> -->
                            </div>
                        </div>
                        <div class="row-createname3">
                            <label class="form-label" for="product5">เลือกสินค้าชิ้นที่ 3 :</label>
                            <div class="row-createname4">
                                <select class="form-control form-input" name="product5" id="product5">
                                    <option value="" hidden>สินค้าชิ้นที่ 3</option>
                                    <?php
                                    $query1 = "SELECT * FROM product  ";
                                    $result1 = mysqli_query($conn, $query1);
                                    while ($row = mysqli_fetch_array($result1)) { ?>
                                        <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" class="textshowprice6"> -->
                            </div>
                        </div>
                    </div>


                    <div class="row-createname" id="selectdiscount">
                        <div class="row-createname3">
                            <label class="form-label" for="product6">เลือกสินค้า :</label>
                            <div class="row-createname4">
                                <select class="form-control form-input" name="product6" id="product6">
                                    <option value="" hidden>เลือกสินค้า</option>
                                    <?php
                                    $query1 = "SELECT * FROM product ";
                                    $result1 = mysqli_query($conn, $query1);
                                    while ($row = mysqli_fetch_array($result1)) { ?>
                                        <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <input type="text" class="textshowprice6"> -->
                            </div>
                        </div>

                    </div>

                    <div class="row-createname2">
                        <div class="row-createname3">
                            <label class="form-label" for="sumprice">ราคารวม:</label>
                            <!-- <input class="form-control form-input" type="text" name="sumprice" id="sumprice"> -->
                        </div>
                        <div class="row-createname3">
                            <label class="form-label" for="promotion_price">ราคาโปรโมชัน :</label>
                            <input class="form-control form-input" type="text" name="promotion_price" id="promotion_price" required>
                        </div>
                    </div>


                    <script>
                        function addcart(pd_id, pd_price) {
                            const setbox = setbox_id
                            const product_price = pd_price
                            let qty = document.form1.input1.value
                            let total_price = product_price * qty
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    // document.getElementById("page5").click();
                                    console.log(xhttp.responseText)
                                }
                            };
                            xhttp.open("GET", "./function/insertToCart.php?product_id=" + product_id + "&qty=" + qty + "&product_price=" + product_price + "&total_price=" + total_price, true);
                            xhttp.send();
                        }
                    </script>


                    <div class="modal-btn-pd">
                        <button type="reset" class="btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn-save-pd">เพิ่ม</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>

        
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>