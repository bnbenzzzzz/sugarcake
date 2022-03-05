<?php
session_start();
include("connect/connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">


<head>
  <link rel="stylesheet" href="css/backed_pos.css">
  <link rel="stylesheet" href="css/index.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS</title>
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="shortcut icon" href="assets/ico/favicon.png">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

  <script>
    let product = {};
    let promo = {};
    var username = String();
    let typebuy = String();
    let cart_coppy = {}
    var promotionItem = {}
    var promotionActive = []
    var usePromotion = [];
    var usePromotionDetail = [];
    var sumDiscount = 0;
    // let promotion =0;

    $(function() {
      $("input[name='paytype']").click(function() {
        if ($("#rate1").is(":checked")) {
          $("#in2").show();
          $("#in1").hide();
          $("#out2").hide();
          $("#out1").show();
        } else if ($("#rate2").is(":checked")) {
          $("#in1").show();
          $("#in2").hide();
          $("#out1").hide();
          $("#out2").show();
        }

      });

    });

    // let promotion =0;

    function totalPrice() {
      return document.getElementById("sumprice").value;
    }

    async function cal() {
      let total = 0;
      for (i in product) {
        let price = parseInt(document.getElementById("price_" + i).innerHTML)
        total += price * product[i]
      }
      let discount = 0
      for (i in usePromotionDetail) {
        discount += parseFloat(i.totalPrice)
      }
      console.log(discount)
      number_format = total.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
      });
      document.getElementById("sumprice").value = number_format;
      await createTable();
      document.getElementById("showPriceModal").innerText = total;
      return total;
    }

    function unsetPromotion(args) {
      for (let i = 0; i < usePromotion.length; i++) {
        if (usePromotion[i] == args) {
          delete usePromotion[i]
          delete usePromotionDetail[i];
        }
      }
      cart_coppy = JSON.parse(JSON.stringify(product))
      return 'ใช้โปรโมชัน';
    }

    async function createTable() {
      let element = document.getElementById('showPromotion')
      element.innerHTML = null
      for (i in promotionActive) {
        const table = document.createElement('div')
        table.className = "promotion-item-blog"
        const left = document.createElement('div')
        left.className = 'promotion-item-left'
        const img = document.createElement('img')
        img.src = promotionActive[i].promotion_img
        img.className = "promotion-item-img"
        left.appendChild(img)
        const promotionName = document.createElement('span')
        promotionName.innerText = promotionActive[i].promotion_name
        promotionName.className = "promotion-name"
        left.appendChild(promotionName)
        const right = document.createElement('div')
        right.className = 'promotion-item-right'
        const button = document.createElement('button')
        button.innerText = "ใช้โปรโมชัน"
        button.className = 'button-use-promotion'
        button.setAttribute('onclick', `(this.innerText=='ใช้โปรโมชัน') ? this.innerHTML = userUsePromotion(${JSON.stringify(promotionActive[i])}) : this.innerText = unsetPromotion(${promotionActive[i].promotion_id})`)
        right.appendChild(button)
        table.appendChild(left)
        table.appendChild(right)
        element.appendChild(table)
      }
      let div = document.createElement('div')
      div.className = "showprice"
      const div_all_left = document.createElement('div')
      div_all_left.className = "show-all-price-left"
      const div_all_right = document.createElement('div')
      div_all_right.className = "show-all-price-right"
      div_all_left.innerText = "ราคาสินค้ารวม"
      div_all_right.id = "showPriceModal"
      div_all_right.innerText = await document.getElementById('sumprice').value
      div.appendChild(div_all_left)
      div.appendChild(div_all_right)
      const div_final_left = document.createElement('div')
      div_final_left.className = "show-final-price-left"
      const div_final_right = document.createElement('div')
      div_final_right.className = "show-final-price-right"
      const div_show_discount = document.createElement('div')
      div_show_discount.className = "show-discount-blog"
      const div_show_discount_left = document.createElement('div')
      div_show_discount_left.className = "show-discount-left"
      const div_show_discount_right = document.createElement('div')
      div_show_discount_right.className = "show-discount-right"
      div_show_discount_left.innerText = "ส่วนลด"
      div_show_discount_right.id = "show-sum-discount"
      div_show_discount.appendChild(div_show_discount_left)
      div_show_discount.appendChild(div_show_discount_right)
      const finalPrice = document.createElement("div")
      finalPrice.classList = "show-final-blog"
      const finalPriceLeft = document.createElement("div")
      const finalPriceRight = document.createElement("div")
      finalPriceLeft.className = "show-final-left"
      finalPriceRight.className = "show-final-right"
      finalPriceRight.id = "showFinalRight"
      finalPriceLeft.innerText = "ราคาสุทธิ"
      finalPrice.appendChild(finalPriceLeft)
      finalPrice.appendChild(finalPriceRight)
      div.appendChild(div_final_left)
      div.appendChild(div_final_right)
      element.append(div)
      element.append(div_show_discount)
      element.append(finalPrice)
    }

    async function addcart(pd_id) {
      if (usePromotion.length != 0) {
        sumDiscount = 0
      }
      if (document.getElementById("tr_" + pd_id)) {
        let value = document.getElementById("num_" + pd_id);
        value.innerHTML = parseInt(value.innerHTML) + 1;
        product[pd_id] = product[pd_id] + 1;
        cart_coppy = JSON.parse(JSON.stringify(product))
      } else {
        let cart = document.getElementById("allcart");
        if (window.XMLHttpRequest) {
          xmlhttp = await new XMLHttpRequest();

        } else {
          xmlhttp = await new ActiveXOject("Microsoft.XMLHTTP");
        }

        let count = 0;
        xmlhttp.onreadystatechange = async function() {

          if (xmlhttp.responseText != "" && count == 0) {
            count++;
            cart.innerHTML += xmlhttp.responseText;
            product[pd_id] = 1;
            cart_coppy = JSON.parse(JSON.stringify(product))
            await cal()
          }

        }
        console.log(product)
        let num = cart.childElementCount + 1;
        await xmlhttp.open("GET", "./CartController.php?addtocart&pd_id=" + pd_id + "&numrow=" + num, true);
        await xmlhttp.send();
      }
    }


    function usePromo(pro_id) {
      array_push ( $promo, pro_id );
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
          cart_coppy = JSON.parse(JSON.stringify(product))
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

    function userinfo(args, fname, lname) {
      username = args;
      let cus_input = document.getElementById("search_cus")
      cus_input.value = fname + " " + lname
      let InfoElement = document.getElementById("search_table")
      if (InfoElement) {
        InfoElement.innerHTML = null
      }

    }

    // function usePro(pro) {
    //   promo = pro;
    // }


    function savetocart() {
      let select = document.getElementById("cus_info").value;
      let user_username = "";
      let selectbuy = document.getElementById("selectpay").value;
      let type_eat = document.getElementById("type_eat").value;


      if (select == "none") {
        user_username = "guess";
      } else {
        user_username = username;
      }
      let str_product = "";
      // let str_promotion = "";
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
      let promotion = usePromotion.join(",")
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



      // xmlhttp.open("GET", "./CartController.php?savetocart&user=" + user_username + "&product=" + str_product + "&qty=" + str_qty + "&total=" + total + "&promotion=" + promotion + "&typebuy=" + typebuy2, true);
      xmlhttp.open("GET", "./CartController.php?savetocart&user=" + user_username + "&discount=" + sumDiscount + "&product=" + str_product + "&qty=" + str_qty + "&total=" + total + "&selectbuy=" + selectbuy + "&paytype=" + type_eat + "&promotion=" + promotion, true);
      xmlhttp.send();
      alert("ทำรายการสำเร็จ");
      location.reload();


    }

    function clearCart() {
      location.reload();
    }

    function loadData() {
      console.log(document.getElementById('search').value)
      let search = document.getElementById("search").value;
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();

      } else {
        xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
      }

      let count = 0;
      xmlhttp.onreadystatechange = function() {

        if (xmlhttp.responseText != "" && count == 0) {
          console.log(xmlhttp.responseText);
          count++;
          document.getElementById("result_query").innerHTML = xmlhttp.responseText;
        }

      }
      xmlhttp.open("GET", "./CartController.php?search=" + search, true);
      xmlhttp.send();
    }

    async function getPromotionAPI() {
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();

      } else {
        xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
      }

      let count = 0;
      xmlhttp.onreadystatechange = function() {

        if (xmlhttp.responseText != "" && count == 0) {
          // console.log(xmlhttp.responseText);
          count++;
          // document.getElementById("result_query").innerHTML = xmlhttp.responseText;
          // console.log(xmlhttp.responseText)
          promotionItem = JSON.parse(xmlhttp.responseText)[0]
        }

      }
      await xmlhttp.open("GET", "./PromotionController.php", true);
      await xmlhttp.send();
    }

    function userUsePromotion(promotion) {
      let outOfCart = [];
      let check = false
      let promotionHasDetail = [];
      promotionHasDetail = promotion['promotionHasProduct'];
      let messageFalse = "หากต้องการใช้ Promotion"
      for (i in promotionHasDetail) {
        const item = promotionHasDetail[i]
        console.log(item)
        console.log(cart_coppy)
        if (!cart_coppy[item.pd_id]) {
          outOfCart.push(item)
          messageFalse += `\n${item.pd_name}`
          check = true
        }
      }
      if (check) {
        alert(messageFalse)
        return 'ใช้โปรโมชัน'
      } else {
        console.log(promotion.promotion_id in usePromotion)
        if (usePromotion.includes('"' + promotion.promotion_id + '"')) {
          return
        }
        usePromotion.push(promotion.promotion_id)
        // add promotionItem to Object
        usePromotionDetail.push(promotion)
        sumDiscount += parseFloat(promotion.discount)
        const ttotal = document.getElementById("showPriceModal").innerText
        document.getElementById("show-sum-discount").innerText = sumDiscount;
        document.getElementById("showFinalRight").innerHTML = parseFloat(ttotal) - parseFloat(sumDiscount)
        // final Price
        for (i in promotionHasDetail) {
          const item = promotionHasDetail[i]
          console.log(i)
          console.log(item)
          console.log(item.pd_id)
          console.log(cart_coppy[item.pd_id])
          cart_coppy[item.pd_id] = cart_coppy[item.pd_id] - 1;
        }
        return 'ใช้โปรโมชันแล้ว'
      }

    }
  </script>

</head>
</head>

<body onload="getPromotionAPI()">
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
      <a class="menu-active" href="backed_pos.php"><i class="bi bi-basket-fill"></i><span class="dpn"> ขายสินค้า (POS)</span></a>
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

            <script>
              function selectType(args) {
                console.log('Test')
                let showProduct = document.getElementById('showProduct')
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    showProduct.innerHTML = null;
                    showProduct.innerHTML = xhttp.responseText;
                  }
                };
                xhttp.open("GET", `${args !== ''?`./backed_showproduct.php?selectType=${args}`:'./backed_showproduct.php'}`, true);
                xhttp.send();
              }
            </script>



            <!-- <div class="col-md-1"></div> -->
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12">
              <div class="row row-test">
                <div class="tagall-promotion">
                  <?php
                  $sqlType = mysqli_query($conn, "SELECT * from category ");
                  while ($rowType = mysqli_fetch_array($sqlType)) { ?>
                    <p onclick="selectType(<?php echo $rowType['cat_id'] ?>)" class="tag-promotion"><?php echo $rowType["cat_name"] ?></p>
                  <?php  }
                  ?>
                </div>

                <!-- echo product Item -->

                <div class="row">
                  <div id="showProduct"></div>
                  <script>
                    selectType('')
                  </script>
                </div>

              </div> <!-- row  -->
            </div>
            <!-- <div class="col-md-1"></div> -->

          </div><!-- col-md-12 -->



        </div><!-- row2 -->
      </div>


    </div>

    <div class="right">
      <div id="row_card">
        <!-- row3 -->
        <div class="select-cus">

          <div class="btn-all">
            <button onclick="clearCart()" class="btn-select"><i class="bi bi-trash"></i> ลบรายการ</button>
          </div>
        </div>
        <h6 class="topic">Checkout</h6>

        <div class="item1">
          <table class="item3">
            <thead>
              <!-- <th class="th1">ลำดับ</th> -->
              <th class="th2">ชื่อสินค้า</th>
              <th class="th3">จำนวน</th>
              <th class="th4">ราคา</th>
              <th class="th5"></th>

            </thead>
          </table>

          <table class="item2">

            <tbody id="allcart">

            </tbody>
          </table>

        </div>

        <div class="promo-all">
          <p class="promo-title">Promotions</p>
          <?php
          $sqlPromo = "SELECT * FROM promotion
          WHERE promotion.promotion_status = 1  ";
          $resultPromo = mysqli_query($conn, $sqlPromo);
          while ($rowPromo = mysqli_fetch_array($resultPromo)) {
            $promo_id = $rowPromo['promotion_id'];
          ?>
            <div class="promo">
              <img class="promotion-img" src="<?php echo $rowPromo['promotion_img'] ?>" alt="promotion image">
              <section class="promotion-text">
                <p class="promotion-name"><?php echo $rowPromo['promotion_name'] ?>(ลด <?php echo $rowPromo['discount'] ?> บาท)</p>
                <?php
                $sqlPromoDetail = "SELECT * FROM promotion_detail 
          JOIN product ON promotion_detail.pd_id = product.pd_id WHERE promotion_detail.promotion_id = '$promo_id'  ";
                $resultPromoDetail = mysqli_query($conn, $sqlPromoDetail);
                while ($rowPromoDetail = mysqli_fetch_array($resultPromoDetail)) {
                  
                ?>
                  <p class="promotion-detail"><?php echo $rowPromoDetail['pd_name'] ?></p>
                <?php } ?>
              </section>

              <button onclick="usePromo('<?php echo $rowPromo['promotion_id'] ?>')" class="button-use-promotion" >ใช้</button>
              
            </div>
          <?php } ?>


        </div>

        <div class="item4">
          <div class="select-payment">
            <!-- <label for="selectpay" class="text-pament">ประเภทการจ่ายเงิน</label> -->
            <select id="selectpay" name="selectpay" class="select-buy">
              <option class="op-select " hidden selected value="">เลือกการจ่ายเงิน</option>
              <?php
              $sqlPay = "SELECT * FROM payment_tbl ";
              $resultPay = mysqli_query($conn, $sqlPay);
              while ($rowPay = mysqli_fetch_array($resultPay)) { ?>
                <option class="op-select" value="<?php echo $rowPay['payment_type'] ?>"><?php echo $rowPay['payment_type'] ?></option>
              <?php } ?>
            </select>
          </div>




          <div class="select-payment">
            <select id="type_eat" name="type_eat" class="select-buy2">
              <option class="op-select " hidden selected value="0">เลือกการสั่งซื้อ</option>
              <option class="op-select" value="dine-in">สั่งทานที่ร้าน</option>
              <option class="op-select" value="takeout">สั่งกลับบ้าน</option>

            </select>
          </div>
        </div>

        <div class="sp">

          <input class="sum-label form-control" type="text" disabled value="ราคารวม">
          <input class="sum form-control" id="sumprice" type="text" placeholder="0">

          <button type="button" id="btn_next" class="btn-next" data-toggle="modal" data-target="#exampleModalCenter">ดำเนินการต่อ</button>

        </div>

      </div><!-- row3 -->

    </div>
    <button style="display: none;" id="btn_success" type="button" class="btn btn-primary btn_format" data-toggle="modal" data-target="#success"></button></span>


    <div class="modal fade bd-example-modal-xl" id="exampleModalCenter" style="width: 40%;margin-left:30%;margin-top:3em;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h1 class="title-modal">Checkout</h1>
            <!-- <form action="#" method="post" enctype="multipart/form-data"> -->
            <div class="customer-info">
              <!-- <p class="lable_info">ประเภทลูกค้า</p> -->
              <select onchange="callSearch()" name="" id="cus_info" class="form-type">
                <option value="none">ลูกค้าไม่เป็นสมาชิก</option>
                <option value="yes">เป็นสมาชิก</option>
              </select>
            </div>
            <br>

            <div id="display">
            </div>
            <div id="search_table">
            </div>
            <div id="userinfo">
            </div>

            <!-- โปรโมชันเก่า  -->
            <!-- <div id="showPromotion"></div> -->


            <div class="modal-footer">
              <button type="button" id="dis_button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
              <button type="button" id="btn_success" class="btn btn-success" onclick="createTable(),savetocart()">ยืนยันการสั่งซื้อ</button>
            </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
    <!-- 
    <div class="modal fade bd-example-modal-xl" id="success" style="width: 40%;margin-left:30%;margin-top:10em;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle" style="font-family: 'Prompt', sans-serif !important;">สถานะการทำรายการ</h5>
          </div>
          <div class="modal-body">
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
    </div> -->


</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>