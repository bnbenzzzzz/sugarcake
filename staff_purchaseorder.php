<?php session_start();
include ("connect/connectdb.php"); ?>


<!DOCTYPE html>
<html lang="th">

<head>
  <link rel="stylesheet" href="css/backed_purchaseorder.css">
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

</head>
</head>

<body>
  <div class="fullscreen">

    <div class="sidenav">
      <div class="row" id="row_profile">
        <div class="col-md-3"><img class="img_profile" src="img/user1.png" width="70" alt=""></div>
        <div class="col-md-9">
        <?php
        $user_username = $_SESSION['user_username'];
        include('connect/connectdb.php');
        $query = "SELECT * FROM user WHERE user_username='$user_username'  ";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) { 
        ?>
          <span><h6 style="margin-top: 25px;"><?php echo $row['user_username'] ?></h6></span>
                            
          <?php } ?>
        </div>
      </div>
      <a class="menu" href="staff_pos.php"><span><img src="img/icon_store.png" width="20" alt=""> ขายสินค้า (POS)</span></a>
      <a style="background-color: rgb(52, 190, 224);color: white !important;"class="menu" href="staff_purchaseorder.php"><span><img src="img/icon_clipboard.png" width="20" alt=""> ข้อมูลการสั่งซื้อสินค้า</span></a>

      <a class="btn_logout" href="#"><span><img src="img/icon_log.png" width="20" alt=""> ออกจากระบบ</span></a>
    </div>

    <div class="center">
      <div class="row">
        <!-- row2 -->

      
            <!-- Modal AddProduct -->
            <div class="row">
                <div class="col-2">
                    <select onchange="findData()" name="type_search" id="select_type" class="form-control">
                        <option value="all" selected>คำสั่งซื้อทั้งหมด</option>
                        <option value="customer">ค้นหาจากข้อมูลลูกค้า</option>
                    </select>
                </div>

                <div class="col-10">
                    <input onkeyup="loadData()" style="width: 50%;" type="text" name="search" id="search" class="form-control" placeholder="ค้นหาข้อมูลสินค้า">
                </div>
            </div>

            <br>

            <div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มรายการสินค้า</h5>
                            <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./backend_addproduct.php" method="post" enctype="multipart/form-data">
                                <p class="lable_format">ภาพสินค้า</p>
                                <input type="file" name="img_upload" id="img_upload" class="form-control">
                                <br>
                                <p class="lable_format">ประเภทสินค้า</p>
                                <select name="pd_type" id="pd_type" class="form-control" required>
                                    <option value="" disabled>กรุณาเลือกรายการสินค้า</option>
                                    <?php
                                    $sql = "SELECT * FROM type_product";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $row["type_product_id"] . '">' . $row["type_name"] . '</option>';
                                    }
                                    ?>
                                </select>
                                <br>
                                <p class="lable_format">รหัสสินค้า</p>
                                <input onkeyup="checkProductID()" type="text" class="form-control" name="pd_id" id="pd_id" placeholder="PD001" required>
                                <p id="check_id"></p>
                                <br>
                                <p class="lable_format">ชื่อสินค้า</p>
                                <input type="text" class="form-control" name="pd_name" id="pd_name" placeholder="ไก่ตัวโล" required>
                                <br>
                                <p class="lable_format">ราคาสินค้า</p>
                                <input type="number" min="1" class="form-control" name="pd_price" id="pd_price" placeholder="50" required>
                                <br>
                                <p class="lable_format">จำนวนคงเหลือ</p>
                                <input type="number" min="1" class="form-control" name="pd_qty" id="pd_qty" placeholder="1" required>
                                <br>
                                <p class="lable_format">รายละเอียดสินค้า</p>
                                <textarea name="pd_desp" id="pd_desp" cols="20" rows="50"></textarea>
                                <script>
                                    CKEDITOR.replace("pd_desp");
                                </script>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิกการทำรายการ</button>
                                    <button type="submit" class="btn btn-success">บันทึกรายการสินค้า</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="result_query">
            </div>



            <div id="edt_modal">

            </div>



        </div><!-- row2 -->
      </div>


    </div>

    <?php include("cnd.php") ?>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

</html>