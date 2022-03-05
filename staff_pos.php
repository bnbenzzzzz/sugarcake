<?php session_start();
include ("connect/connectdb.php"); ?>


<!DOCTYPE html>
<html lang="th">

<head>
  <link rel="stylesheet" href="css/backed_pos.css">
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


  <script>
    let product = {};

    function cal() {
      let total = 0;
      for (i in product) {
        let price = parseInt(document.getElementById("price_" + i).innerHTML)
        total += price * product[i]
      }
      document.getElementById("sumprice").value = total;
      console.log(product)
    }

    function addcart(pd_id) {
      if (document.getElementById("tr_" + pd_id)) {
        let value = document.getElementById("num_" + pd_id);
        value.innerHTML = parseInt(value.innerHTML) + 1;
        product[pd_id] = product[pd_id] + 1;
      } else {
        let cart = document.getElementById("allcart");
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();

        } else {
          xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
        }

        let count = 0;
        xmlhttp.onreadystatechange = function() {

          if (xmlhttp.responseText != "" && count == 0) {
            count++;
            cart.innerHTML += xmlhttp.responseText;
            product[pd_id] = 1;
            cal()
          }

        }
        let num = cart.childElementCount + 1;
        xmlhttp.open("GET", "./CartController.php?addtocart&pd_id=" + pd_id + "&numrow=" + num, true);
        xmlhttp.send();
      }
      cal()
    }

    function delProduct(pd_id) {
      if (document.getElementById("tr_" + pd_id)) {
        let value = document.getElementById("num_" + pd_id);
        if (value.innerHTML == 1) {
          let con = confirm("คุณต้องการลบสินค้าใช่หรือไม่");
          if (con) {
            document.getElementById("tr_" + pd_id).remove();
            delete product[pd_id]
          }
        } else {
          value.innerHTML = parseInt(value.innerHTML) - 1;
          product[pd_id] = product[pd_id] - 1;
        }

      }
      cal()
    }

    function plusProduct(pd_id) {
      if (document.getElementById("tr_" + pd_id)) {
        let value = document.getElementById("num_" + pd_id);
        value.innerHTML = parseInt(value.innerHTML) + 1;
        product[pd_id] = product[pd_id] + 1;
      }
      cal()
    }

    function deleteProduct(pd_id) {
      if (confirm("คุณต้องการลบสินค้าใช่หรือไม่")) {
        document.getElementById("tr_" + pd_id).remove();
        delete product[pd_id]
      }
      cal()
    }

    function callSearch() {


      let select = document.getElementById("cus_info").value;
      if (select == "none") {
        document.getElementById("display").innerHTML = "";
      } else {

        let display = document.getElementById("display");
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();

        } else {
          xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
        }

        let count = 0;
        xmlhttp.onreadystatechange = function() {

          if (xmlhttp.responseText != "" && count == 0) {
            count++;
            console.log(xmlhttp.responseText)
            display.innerHTML = xmlhttp.responseText;
          }

        }

        xmlhttp.open("GET", "./CartController.php?search_cus", true);
        xmlhttp.send();
      }
    }


    function search_info() {
      let data = document.getElementById("search_cus").value;
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();

      } else {
        xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
      }

      let count = 0;
      xmlhttp.onreadystatechange = function() {

        if (xmlhttp.responseText != "" && count == 0) {
          count++;
          document.getElementById("search_table").innerHTML = xmlhttp.responseText;
          // console.log(xmlhttp.responseText)
          // display.innerHTML = xmlhttp.responseText;
          // search_table
        }

      }

      xmlhttp.open("GET", "./CartController.php?search_info&data=" + data, true);
      xmlhttp.send();
    }

    function creatSuccess() {

    }

    function userinfo(args) {
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();

      } else {
        xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
      }

      let count = 0;
      xmlhttp.onreadystatechange = function() {

        if (xmlhttp.responseText != "" && count == 0) {
          count++;
          document.getElementById("userinfo").innerHTML = xmlhttp.responseText;
          // console.log(xmlhttp.responseText)
          // display.innerHTML = xmlhttp.responseText;
          // search_table
        }

      }

      xmlhttp.open("GET", "./CartController.php?getUserinfo&user_username=" + args, true);
      xmlhttp.send();

      // getUserinfo
    }


    function savetocart() {
      let select = document.getElementById("cus_info").value;
      let user_username = "";

      if (select == "none") {
        user_username = "guess";
      } else {
        username = document.getElementById("usernameInfo").value;
      }
      let str_product = "";
      let str_qty = "";
      let num = 0;
      for (i in product) {
        if (num == 0) {
          str_product += i;
          str_qty += product[i];
        } else {
          str_product += "," + i;
          str_qty += "," + product[i];
        }
        num++;
      }
      let total = document.getElementById("sumprice").value;
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();

      } else {
        xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
      }

      let count = 0;
      xmlhttp.onreadystatechange = function() {

        if (xmlhttp.responseText != "" && count == 0) {
          count++;
          console.log(xmlhttp.responseText)
          document.getElementById("dis_button").click();
          document.getElementById("btn_success").click();
          document.getElementById("allcart").innerHTML = "";
          loadData()
        }

      }


      xmlhttp.open("GET", "./CartController.php?savetocart&user=" + user_username + "&product=" + str_product + "&qty=" + str_qty + "&total=" + total, true);
      xmlhttp.send();



    }

    function loadData(){
            console.log(document.getElementById('search').value)
            let search = document.getElementById("search").value;
            if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();

                } else {
                    xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
                }

                let count = 0;
                xmlhttp.onreadystatechange = function() {

                    if (xmlhttp.responseText != "" && count==0) {
                        console.log(xmlhttp.responseText);
                        count++;
                        document.getElementById("result_query").innerHTML = xmlhttp.responseText;               
                    }

                }
                xmlhttp.open("GET", "./CartController.php?search="+search, true);
                xmlhttp.send();
        }


  </script>

</head>
</head>

<body>
<!-- <a href="#addproduct" data-toggle="modal" class="add">+ เพิ่มสินค้า</a>
  <div class="bar">
    <div class="welcome">
    <a class="manage" href="backed_product.php"><span> สินค้า</span></a>
    <a class="manage" href="backed_category.php"><span> หมวดหมู่</span></a>
    <a class="manage" href="backed_set.php"><span> ชุดสินค้า</span></a>
    <a class="manage" href="backed_profile.php"><span> บัญชีผู้ใช้</span></a>
    <a class="manage" href="backed_customer.php"><span> ลูกค้า</span></a>
    <a class="manage" href="#"><span> พนักงาน</span></a>
    </div>
  </div> -->
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
      <a style="background-color: rgb(52, 190, 224);color: white !important;" class="menu" href="staff_pos.php"><span><img src="img/icon_store.png" width="20" alt=""> ขายสินค้า (POS)</span></a>
      <a class="menu" href="staff_purchaseorder.php"><span><img src="img/icon_clipboard.png" width="20" alt=""> ข้อมูลการสั่งซื้อสินค้า</span></a>
      <a class="btn_logout" onclick="window.location='./logout.php'"><span><img src="img/icon_log.png" width="20" alt=""> ออกจากระบบ</span></a>
    </div>

    <div class="center">
      <div class="row">
        <!-- row2 -->

        <div class="col">

        

          <div class="row">



            <div class="col-md-1"></div>
            <div class="col-lg-10 col-xl-10 col-md-12 col-sm-12 col-12">
              <div class="row">

                <?php
                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                  $rowPD = $row["pd_id"];
                ?>
                  <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 col-12" onclick="addcart('<?php echo $row['pd_id'] ?>')">
                    <div class="card">
                    <?php
                      $sqlImg = "SELECT * FROM product_image WHERE pd_id = '$rowPD' ";
                      $result3 = mysqli_query($conn, $sqlImg);
                      while ($row3 = mysqli_fetch_array($result3)) {
                      ?>
                      <img src="<?php echo $row3['img_url1'] ?>" width="430" height="150" class="card-img-top" alt="...">
                      <?php } ?>
                      <div class="card-body">
                        <span style="margin-top: -0.5em;"> <?php echo $row["pd_name"] ?></span><br>
                        <span style="margin-top: -0.5em;">ราคา : <?php echo $row["pd_price"] ?></span>

                        <!-- <div class="row">           
                          <div style="margin-top: 5px;" class="col">
                              <center>
                            <a  href="#deletepd<?php echo $row["pd_id"]; ?>" data-toggle="modal" class="btn_add">เพิ่ม</a>
                          </center>
                          </div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                  <?php include('modal/modal.php'); ?>
                <?php } ?>

              </div> <!-- row  -->
            </div>
            <div class="col-md-1"></div>

          </div><!-- col-md-12 -->



        </div><!-- row2 -->
      </div>


    </div>

    <div class="right">
      <div class="row" id="row_card">
        <!-- row3 -->
        <h6 class="topic" style="margin-top: -1em;">รายการสั่งซื้อสินค้าสินค้า</h6>

        <div class="item1">

          <table class="item2">
            <thead>
              <th class="th1">ลำดับ</th>
              <th class="th2">ชื่อสินค้า</th>
              <th class="th3">จำนวน</th>
              <th class="th4">ราคา</th>
              <th class="th5"></th>
            </thead>
            <tbody id="allcart">

            </tbody>
          </table>


          <div class="sp">
            <span class="sum_price"> ราคารวม : <input class="sum" id="sumprice" type="text" placeholder="0">
              <button type="button" class="btn btn-primary btn_format" style="background-color: #008068; border:0px;box-shadow: #b9b8b8 5px 5px 10px;margin-left:10%" data-toggle="modal" data-target="#exampleModalCenter">ยืนยันการสั่งซื้อ</button></span>
          </div>

        </div>

      </div><!-- row3 -->
    </div>

    <button style="display: none;" id="btn_success" type="button" class="btn btn-primary btn_format" data-toggle="modal" data-target="#success"></button></span>
    <div class="modal fade bd-example-modal-xl" id="exampleModalCenter"style="width: 40%;margin-left:30%;margin-top:3em;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการทำรายการ</h5>
            <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" method="post" enctype="multipart/form-data">
              <p class="lable_info">ข้อมูลลูกค้า</p>
              <!-- <input type="text" id=> -->
              <select onchange="callSearch()" name="" id="cus_info" class="form-control">
                <option value="none">ลูกค้าไม่เป็นสมาชิก</option>
                <option value="yes">เป็นสมาชิก</option>
              </select>
              <br>

              <div id="display">
              </div>
              <div id="search_table">
              </div>
              <div id="userinfo">
              </div>


              <div class="modal-footer" >
                <button type="button" id="dis_button" class="btn btn-secondary" data-dismiss="modal">ยกเลิกการทำรายการ</button>
                <button type="button" class="btn btn-success" onclick="savetocart()">บันทึกข้อมูล</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="success" style="width: 40%;margin-left:30%;margin-top:10em;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle" style="font-family: 'Prompt', sans-serif !important;">สถานะการทำรายการ</h5>
          </div>
          <div class="modal-body" >
            <form action="#" method="post" enctype="multipart/form-data">
              <center><img width="200" src="img/check.png" alt=""> <br>
                <h2 style="font-family: 'Prompt', sans-serif !important; color: #7abf43;">ทำรายการสั่งซื้อสำเร็จ</h2>
              </center>
              <div class="modal-footer">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


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