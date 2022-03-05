<?php
session_start();
include("connect/connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_set.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/modal_add_setbox.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
    <a href="#addsetbox" data-toggle="modal" class="add">+ เพิ่มชุดสินค้า</a>
    <div class="bar">
        <div class="welcome">
            <a class="manage" href="backed_product.php"><span> สินค้า</span></a>
            <a class="manage" href="backed_category.php"><span> หมวดหมู่</span></a>
            <a class="manage-active" href="backed_set.php"><span> ชุดสินค้า</span></a>
            <a class="manage" href="backed_promotion.php"><span> โปรโมชัน</span></a>
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
            <h4 class="row-card-name">เซตลูกค้าจัดเอง (เว็บไซต์)</h4>
            <div class="row-set-cus">
                <?php
                $sqlSet = "SELECT * FROM store WHERE store_no=6";
                $resultSet = mysqli_query($conn, $sqlSet);
                $rowSet = mysqli_fetch_array($resultSet)
                ?>
                <div class="status-set">
                    <p id="on" <?php if ($rowSet['setcus_status'] == 0) { ?> style="display:none" <?php } else { ?> style="display:block" <?php } ?>>เปิดการใช้งานอยู่</p>

                    <p id="off" <?php if ($rowSet['setcus_status'] == 0) { ?> style="display:block" <?php } else { ?> style="display:none" <?php } ?>>ปิดการใช้งานอยู่</p>
                    <a onclick="window.location='./function/set_status.php'">
                        <?php if ($rowSet['setcus_status'] == 0) { ?>
                            <label class="switch-off">
                                <span class="off"></span>
                            </label>
                        <?php } else { ?>
                            <label class="switch-on">
                                <span class="on"></span>
                            </label>
                        <?php } ?>
                    </a>
                </div>

                <section class="detail-buy-set">
                    <div class="show-detail">
                        <div class="detail">
                            <label for="qty">จำนวนสินค้าในเซต</label>
                            <input disabled id="qty" type="text" value="<?php echo $rowSet['setcus_qty'] ?> ชิ้น">
                        </div>
                        <div class="detail">
                            <label for="qty">ส่วนลด (%)</label>
                            <input disabled id="qty" type="text" value="<?php echo $rowSet['setcus_discount'] ?> %">
                        </div>
                    </div>
                    <a href="#editsetcus" data-toggle="modal"><button class="btn-edit-set">แก้ไข</button></a>
                </section>
            </div>

            <script>
                function setStatus() {
                    var checkBox = document.getElementById("myCheck");
                    var on = document.getElementById("on");
                    var off = document.getElementById("off");
                    if (checkBox.checked == true) {
                        on.style.display = "block";
                        off.style.display = "none";
                    } else {
                        on.style.display = "none";
                        off.style.display = "block";
                    }


                }
            </script>
            <h4 class="row-card-name">เซตจากทางร้าน</h4>
            <div class="row-card">


                <?php

                $sql = "SELECT * FROM setbox WHERE set_status!=0";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $n = $row['set_id']; ?>

                    <div class="card-set">

                        <img src="<?php echo $row["set_img"] ?>" class="card-img" alt="...">
                        <div class="card-new">
                            <div class="setheight">


                                <div class="card-name">
                                    <p class="set_name"><?php echo $row["set_name"] ?></p>
                                    <p class="set_price"><?php echo $row["set_price"] ?> ฿</p>
                                </div>
                                <div class="text_box">
                                    <?php
                                    $sql2 = "SELECT * FROM setbox INNER JOIN set_detail ON setbox.set_id=set_detail.set_id 
                          INNER JOIN product ON set_detail.pd_id=product.pd_id WHERE setbox.set_id=$n";
                                    $result2 = mysqli_query($conn, $sql2);
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                    ?>
                                        <p class="pd-name">• <?php echo $row2["pd_name"] ?></p><br>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="div-btn">
                                <a href="#editset<?php echo $row["set_id"]; ?>" data-toggle="modal" class="btn_edit">แก้ไข</a>
                                <a href="#deleteset<?php echo $row["set_id"]; ?>" data-toggle="modal" class="btn_delete">ลบ</a>
                            </div>
                        </div>
                    </div>
                    <?php include('modal/modal_set.php'); ?>



                <?php } ?>
            </div>


        </div>

        <div class="modal fade set-cus" id="editsetcus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <?php
            include('./connect/connectdb.php');
            ?>
            <div class="modal-dialog set-cus-dialog">
                <div class="modal-content set-cus-content">
                    <div class="form-set">
                        <form action="./connect/con_edit_setcus.php" method="POST" enctype="multipart/form-data">
                                        <h1>แก้ไขรายละเอียดเซตหน้าเว็บ</h1>
                            <div class="row-setcus">
                                <label for="setcus_qty">จำนวนชิ้นภายในเซต</label>
                                <input type="number" min="1" name="setcus_qty" id="setcus_qty" value="<?php echo $rowSet['setcus_qty'] ?>" required>
                                <label for="setcus_discount">เลือก หรือ กรอกส่วนลด (%)</label>
                                <div class="list-option">
                                    <input list="numberdiscount" type="number" min="0" max="100" name="setcus_discount" value="<?php echo $rowSet['setcus_discount'] ?>" id="setcus_discount">
                                    <datalist id="numberdiscount">
                                        <option value="5">
                                        <option value="10">
                                        <option value="15">
                                        <option value="20">
                                        <option value="25">
                                        <option value="30">
                                        <option value="35">
                                        <option value="40">
                                        <option value="45">
                                        <option value="50">
                                        <option value="55">
                                        <option value="60">
                                        <option value="65">
                                        <option value="70">
                                        <option value="75">
                                        <option value="80">
                                        <option value="85">
                                        <option value="90">
                                        <option value="95">
                                        <option value="100">
                                    </datalist>
                                </div>
                            </div>
                            <div class="modal-btn-setcus">
                                <button type="reset" class="btn-cancel" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn-edit-setcus">บันทึก</button>
                            </div>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>


    <div class="modal fade ad" id="addsetbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <?php
        include('./connect/connectdb.php');
        ?>
        <div class="modal-dialog">
            <div class="modal-content momo">
                <h2 class="add-name-cat">เพิ่มชุดสินค้า</h2>
                <div class="col ">
                    <form action="./connect/con_add_setbox.php" method="POST" enctype="multipart/form-data">

                        <div class="row-createname">
                            <label class="form-label" for="set_name">ชื่อชุดสินค้า :</label>
                            <input class="form-control form-input" type="text" name="set_name" id="set_name" required>
                            <label class="form-label" for="set_img">ภาพชุดสินค้า :</label>
                            <input type="file" class="form-control form-input-img form-input" name="set_img" id="set_img" accept="image/*" onchange="loadFile1(event)">





                            <label class="form-label" for="group1">จำนวน :</label>


                            <select class="form-control form-input" name="group1" id="group1">
                                <option hidden value=" ">- เลือกจำนวนสินค้าภายในชุด -</option>
                                <option value="2">2 ชิ้น</option>
                                <option value="3">3 ชิ้น</option>
                                <option value="4">4 ชิ้น</option>
                            </select>
                        </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#select1').hide();
                        $('#select2').hide();
                        $('#select3').hide();
                        $('#select4').hide();
                        $('#list1').hide();
                        $('#list2').hide();
                        $('#list3').hide();
                        $('#list4').hide();
                        $('#list5').hide();
                        $('#list6').hide();
                        $('#list7').hide();
                        $('#list8').hide();
                        $('#text_img').hide();
                        $('#price').hide();
                        $('#sumprice').hide();
                        $('#bath').hide();
                        $("#group1").change(function() {
                            var value = $("#group1 option:selected").val();
                            if (value == "2") {
                                $('#select1').show();
                                $('#select2').show();
                                $('#list1').show();
                                $('#list2').show();
                                $('#list3').show();
                                $('#list4').show();
                                $('#select3').hide();
                                $('#select4').hide();
                                $('#list5').hide();
                                $('#list6').hide();
                                $('#list7').hide();
                                $('#list8').hide();
                                $('#text_img').show();
                                $('#price').show();
                                $('#sumprice').show();
                                $('#bath').show();
                            } else if (value == "3") {
                                $('#select1').show();
                                $('#select2').show();
                                $('#select3').show();
                                $('#select4').hide();
                                $('#list1').show();
                                $('#list2').show();
                                $('#list3').show();
                                $('#list4').show();
                                $('#list5').show();
                                $('#list6').show();
                                $('#list7').hide();
                                $('#list8').hide();
                                $('#text_img').show();
                                $('#price').show();
                                $('#sumprice').show();
                                $('#bath').show();
                            } else if (value == "4") {
                                $('#select1').show();
                                $('#select2').show();
                                $('#select3').show();
                                $('#select4').show();
                                $('#list1').show();
                                $('#list2').show();
                                $('#list3').show();
                                $('#list4').show();
                                $('#list5').show();
                                $('#list6').show();
                                $('#list7').show();
                                $('#list8').show();
                                $('#text_img').show();
                                $('#price').show();
                                $('#sumprice').show();
                                $('#bath').show();
                            } else {
                                $('#select1').hide();
                                $('#select2').hide();
                                $('#select3').hide();
                                $('#select4').hide();
                                $('#list1').hide();
                                $('#list2').hide();
                                $('#list3').hide();
                                $('#list4').hide();
                                $('#list5').hide();
                                $('#list6').hide();
                                $('#list7').hide();
                                $('#list8').hide();
                                $('#text_img').hide();
                                $('#price').hide();
                                $('#sumprice').hide();
                                $('#bath').hide();
                            }
                        });
                    });
                </script>

                <div class="row-createname">
                    <label id="select1" for="list1" class="form-label">ชิ้นที่ 1 :</label>
                    <div class="input-select">
                        <select class="form-control form-input" name="list1" id="list1" onchange="myFunction()">
                            <option value=" ">เลือกหมวดหมู่สินค้า</option>
                            <?php
                            $query = "SELECT * FROM category  ";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <option value=" <?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                            <?php } ?>
                        </select>

                        <select class="form-control form-input" name="list2" id="list2" onchange="myFunction()">
                            <option value=" ">สินค้า</option>
                            <?php
                            $query1 = "SELECT * FROM product  ";
                            $result1 = mysqli_query($conn, $query1);
                            while ($row = mysqli_fetch_array($result1)) { ?>
                                <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <div class="row-createname">
                    <label id="select2" for="list3" class="form-label">ชิ้นที่ 2 :</label>
                    <div class="input-select">
                        <select class="form-control form-input" name="list3" id="list3" onchange="myFunction()">
                            <option value=" ">เลือกหมวดหมู่สินค้า</option>
                            <?php
                            $query = "SELECT * FROM category  ";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <option value=" <?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                            <?php } ?>
                        </select>

                        <select class="form-control form-input" name="list4" id="list4" onchange="myFunction()">
                            <option value=" ">สินค้า</option>
                            <?php
                            $query1 = "SELECT * FROM product  ";
                            $result1 = mysqli_query($conn, $query1);
                            while ($row = mysqli_fetch_array($result1)) { ?>
                                <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>



                <div class="row-createname">
                    <label id="select3" for="list5" class="form-label">ชิ้นที่ 3 :</label>
                    <div class="input-select">
                        <select class="form-control form-input" name="list5" id="list5" onchange="myFunction()">
                            <option value=" ">เลือกหมวดหมู่สินค้า</option>
                            <?php
                            $query = "SELECT * FROM category  ";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <option value=" <?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                            <?php } ?>
                        </select>

                        <select class="form-control form-input" name="list6" id="list6" onchange="myFunction()">
                            <option value=" ">สินค้า</option>
                            <?php
                            $query1 = "SELECT * FROM product  ";
                            $result1 = mysqli_query($conn, $query1);
                            while ($row = mysqli_fetch_array($result1)) { ?>
                                <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>




                <div class="row-createname">
                    <label id="select4" for="list7" class="form-label">ชิ้นที่ 4 :</label>
                    <div class="input-select">
                        <select class="form-control form-input" name="list7" id="list7" onchange="myFunction()">
                            <option value=" " width="70%">เลือกหมวดหมู่สินค้า</option>
                            <?php
                            $query = "SELECT * FROM category  ";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <option value=" <?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                            <?php } ?>
                        </select>

                        <select class="form-control form-input" name="list8" id="list8" onchange="myFunction()">
                            <option value=" ">สินค้า</option>
                            <?php
                            $query1 = "SELECT * FROM product  ";
                            $result1 = mysqli_query($conn, $query1);
                            while ($row = mysqli_fetch_array($result1)) { ?>
                                <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>


                </div>
                <div class="row-createname">
                    <label id="price" for="sumprice" class="form-label">ราคา :</label>
                    <input class="form-control form-input" type="text" name="sumprice" id="sumprice" required>
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