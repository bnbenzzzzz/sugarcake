<?php
session_start();
include "./connect/connectdb.php";
include "./function/getNumOfCart.php";

// $username = $_SESSION['user_username'];
// $sql = "SELECT * FROM cart JOIN product on cart.pd_id = product.pd_id WHERE user_username = '$username'";
// $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel=”shortcut icon” href="img/icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bakery_checkout.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $("input[name='deli1']").click(function() {
                if ($("#radi-store").is(":checked")) {
                    $("#edit").hide();
                    $("#texarea").hide();
                    $("#texareashow").show();
                    $("#radi-sale").show();
                } else if ($("#radi-deli").is(":checked")) {
                    $("#edit").show();
                    $("#texarea").show();
                    $("#texareashow").hide();
                    $("#radi-sale").hide();

                }

            });
        });
    </script>

</head>

<body>
    <div class="contain--fluid">
        <section id="navbar">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="img/logo.png" alt="" width="80">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active nav_menu" aria-current="page" href="index.php">หน้าหลัก</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle nav_menu" href="#เบเกอรี่" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ประเภทสินค้า</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * from category ");
                                    while ($row = mysqli_fetch_array($sql)) { ?>
                                        <li><a class="dropdown-item nav_menu" href="bakery_cake.php?type_pd=<?php echo $row["cat_id"] ?>"><?php echo $row["cat_name"] ?></a></li>

                                    <?php  }
                                    ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_menu" href="set.php">ชุดส่งสุดคุ้ม</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_menu" href="outsite.php">ชุดนอกสถานที่</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_menu" href="contact.php">ติดต่อเรา</a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="bakery_mycart.php">
                                    <div class="box-noti">
                                        <div class="noti">
                                            <?php echo $numOfCart ?>
                                        </div>
                                        <div> <i class="fas fa-shopping-cart"></i><img class="icon_cart" src="img/cart.png" alt="" width="25"> </div>
                                    </div>
                                </a>

                            </li>
                            <li id="cart" class="nav-item">
                                <a id="cart_text" class="nav-link nav_menu" href="#ตะกร้าของฉัน">ตะกร้าของฉัน</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">
                                    <img class="icon_user" src="img/user.png" alt="" width="25">
                                </a>
                            <li id="user" class="nav-item">
                                <a id="user_text" class="nav-link nav_menu" href="profile.php">โปรไฟล์</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> <!-- //nav// -->
        </section> <!--  navbar  -->

        <h3 class="text_title">Checkout</h3>

        <?php

        $user_username = $_SESSION['user_username'];
        include './connect/connectdb.php';
        $query = "SELECT * FROM orderdetail JOIN product on orderdetail.pd_id = product.pd_id WHERE purchase_id = '$rowPurchaseID' ";
        $result = mysqli_query($conn, $query);

        ?>
        <div class="box-detail">
            <h3 class="text1">รายการสินค้าทั้งหมด
                <span>
                    <h3 style="float: right; margin-right:1em;"> <?php echo mysqli_num_rows($result) ?> รายการ</h3>
                </span>
            </h3>

            <!-- <hr style="width: 95%; margin:0% auto; margin-top:-10px"> -->
            <div class="left">
                <div class="row">

                    <div class="col">
                        <table style="width:100%;padding:15px;">
                            <thead>
                                <td style="width: 20em;text-align:center;">สินค้า</td>
                                <td style="width: 7em;text-align:center;">จำนวน</td>
                                <td style="width: 7em;text-align:center;">ราคา/ชิ้น</td>
                                <td style="width: 7em;text-align:center;">รวม</td>
                            </thead>

                            <tbody>
                                <?php

                                $total = 0;
                                $query = "SELECT * FROM orderdetail JOIN product on orderdetail.pd_id = product.pd_id WHERE purchase_id = '$rowPurchaseID' ";
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_array($result)) {
                                    $total += $row['pd_price'] * $row['qty'];
                                ?>
                                    <tr>
                                        <td style="padding: 10px;"><img class="img-pd" src="<?php echo $row['pd_img'] ?>" width="100" height="100" alt=""> <b><?php echo $row['pd_name'] ?></b></td>
                                        <td style="text-align:center;"><b><?php echo $row['qty'] ?></b></td>
                                        <td style="text-align:center;"><b><?php echo number_format($row['pd_price'], 2); ?> บาท</b></td>
                                        <td style="text-align:center;"><b><?php echo number_format($row['pd_price'] * $row['qty'], 2); ?> บาท</b></td>
                                    </tr>

                                <?php }
                                ?>
                            </tbody>

                        </table>

                        <p class="total">รวมทั้งสิ้น <?php echo number_format($total, 2) ?> บาท</p>


                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="box-address">
            <h3 class="text1">การจัดส่ง</h3>
            <!-- <hr style="width: 95%; margin:0% auto; margin-top:-10px"> -->
            <div class="box-form">
                <?php
                $user_username = $_SESSION['user_username'];
                $query = "SELECT * FROM user WHERE user_username='$user_username'  ";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <?php
                    $deli = (isset($fetch['deliver_status'])) ? $fetch['deliver_status'] : '';
                    ?>
                    <form class="radio1" name="form1" action="">
                        <div class="radi">
                            <input type="radio" name="deli1" value="take" require id="radi-store"> <label for="">รับที่ร้าน</label>
                            <input type="radio" name="deli1" value="delivery" id="radi-deli" style="margin-left: 20px;"> <label for="">จัดส่ง</label>
                        </div>

                        <textarea id="texarea" class="textarea-address" cols="50" rows="3" placeholder="<?php echo $row['user_fname'] . " " . $row['user_lname'] . "\n" . $row['user_address'] . "\n" . $row['user_tel'] ?>"></textarea>
                        <textarea style="display: none;" id="texareashow" class="textarea-address" cols="50" rows="3" placeholder="โปรดมารับสินค้าในวันที่มีการนัดหมาย"></textarea>
                    </form>
                    <?php include('modal/modal_update_address.php'); ?>
                <?php } ?>
                <div id="edit" tyle="display: none;">
                    <button id="btn-edit" class="add" href="#addaddress" data-toggle="modal" s>แก้ไข</button>
                </div>
            </div>
        </div>


        <div class="box-pay">
            <h3 class="text1">ชำระเงิน</h3>
            <!-- <hr style="width: 95%; margin:0% auto; margin-top:-10px"> -->
            <div class="box-pay2">
                <div class="box-left">
                    <img class="QR" src="img/QR.jpg" width="250" alt="">
                </div>

                <div class="box-right">
                    <div class="box-form2">
                        <form class="radio2" action="">
                            <div id="radi-sale" class="radi1">
                                <input id="payhalf" type="radio" name="radi-pay" value="1" onclick="Test()"> <label for="">จ่ายมัดจำ 50%</label>
                            </div>
                            <div class="radi1">
                                <input id="payfull" type="radio" name="radi-pay" value="2" style="margin-left: 20px;" onclick="Test()" checked> <label for="">จ่ายทั้งหมด</label>
                            </div>
                        </form>
                    </div>
                    <hr style="width: 95%; margin:0% auto; margin-top:-15px">
                    <div>
                        <form method="GET" enctype="multipart/form-data" action="./connect/con_add_purchase.php?purchase_id=<?php echo $rowPurchaseID ?>">

                            <table class="table1">
                                <tr>
                                    <td>รวมสินค้า</td>
                                    <td><?php echo number_format($total, 2) ?> บาท </td>
                                </tr>
                                <tr>
                                    <?php
                                    $shipping = 0;
                                    $sumqty = 0;
                                    $query1 = "SELECT * FROM orderdetail JOIN product on orderdetail.pd_id = product.pd_id WHERE purchase_id = '$rowPurchaseID' ";
                                    $result1 = mysqli_query($conn, $query1);
                                    while ($row1 = mysqli_fetch_array($result1)) {
                                        $qty = $row1['qty'];
                                        $sumqty = $sumqty + $qty;
                                    }
                                    ?>
                                    <?php

                                    if ($sumqty >= 1 && $sumqty < 100) {
                                        $shipping = 50;
                                    } elseif ($sumqty >= 101 && $sumqty < 200) {
                                        $shipping = 100;
                                    } elseif ($sumqty >= 201 && $sumqty < 300) {
                                        $shipping = 150;
                                    } elseif ($sumqty >= 301 && $sumqty < 400) {
                                        $shipping = 200;
                                    } else {
                                        $shipping = 300;
                                    }
                                    ?>
                                    <td>ค่าจัดส่ง</td>
                                    <td> <?php echo number_format($shipping, 2) ?> บาท</td>
                                </tr>
                                <tr>
                                    <?php $price = $shipping + $total; ?>
                                    <p style="display: none;" id="total"><?php echo $price ?></p>
                                    <td>รวมทั้งหมด</td>
                                    <td><?php echo number_format($shipping + $total, 2) ?> บาท</td>
                                </tr>
                                <tr>

                                    <td class="td1">ยอดที่ต้องชำระ</td>
                                    <td class="td1">
                                        <p id="td1">โปรดเลือกประเภทการจ่าย</p>
                                    </td>
                                </tr>
                                <script>
                                    function Test() {
                                        sumprice = document.getElementById("total").innerHTML;
                                        var payhalf = document.getElementById("payhalf");
                                        var payfull = document.getElementById("payfull");
                                        if (payhalf.checked) {
                                            num = parseInt(sumprice) / 2;
                                            document.getElementById("td1").innerHTML = num.toFixed(2) + ' บาท';
                                        } else if (payfull.checked) {
                                            numm = parseInt(sumprice);
                                            document.getElementById("td1").innerHTML = numm.toFixed(2) + ' บาท';

                                        } else {
                                            document.getElementById("td1").innerHTML = '0 บาท';
                                        }
                                    }
                                </script>
                                <tr>
                                    <td style="width: 35%;">แนบไฟล์สลิปการโอน</td>
                                    <td>
                                        <input style="width: 70%;" type="file" class="form-control" name="payment_state" id="customFile" />

                                    </td>
                                </tr>
                            </table>
                            <!-- <input class="checkout" type="submit" value="checkout" > -->

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <?php
        //   $purchase_id = $_GET["purchase_id"];
        include "./function/getNumOfCart.php";
        $del = mysqli_query($conn, "select * FROM purchaseorder WHERE purchase_id = $rowPurchaseID");
        $row1 = mysqli_fetch_array($del);
        ?>

        <a class="back-choose" href="function/confirmOrder.php?purchase_id=<?php echo $row1["purchase_id"] ?> & purchase_price=<?php echo number_format($shipping + $total, 2) ?> ">CHECKOUT</a>
        <!-- <div class="modal fade bd-example-modal-xl" id="success" style="width: 40%;margin-left:30%;margin-top:10em;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <img class="img-modal" src="img/modal-cart.png" width="80" alt=""> <br>
                            <h2 class="text-modal" style="font-family: 'Prompt', sans-serif !important;">เพิ่มสินค้าลงตะกร้าแล้ว</h2>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->



     


        <script>
            function addcart(purchase_id) {
                const purchase_id = purchase_id

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // document.getElementById("page5").click();
                        console.log(xhttp.responseText)
                    }
                };
                xhttp.open("GET", "./function/confirmOrder.php?purchase_id=" + purchase_id, true);
                xhttp.send();
            }
        </script>


        <footer class="footer">
            <h6 style="text-align: center; color: white; font-weight: bold; padding-top: 2%;"> ©2021 Sugar Cake All right reserved </h6>
        </footer>


    </div><!--  contain--fluid -->

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

</html>