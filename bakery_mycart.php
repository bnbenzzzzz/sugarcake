<?php
session_start();
include './connect/connectdb.php';
include "./function/getNumOfCart.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ddd -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel=”shortcut icon” href="img/icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <title>Mycart</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/mycart.css">
    <link rel="stylesheet" href="./navbar/styles.css" />
    <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js" integrity="sha256-2JRzNxMJiS0aHOJjG+liqsEOuBb6++9cY4dSOyiijX4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>

<body>


    <header id="nav-desktop">
      <div id="brand"><a href="index.php"><img class="img-logo" src="img/logo.png" alt="logo"></a></div>
      <nav>
        <ul>
          <li><a href="index.php">หน้าแรก</a></li>
          <li><a href="contact.php">ร้านค้า</a></li>
          <li><a class="cart" href="bakery_myorder.php">
          <?php if($numOrder>0){ ?>
              <span class="num"><?php echo $numOrder ?></span>ออเดอร์ของฉัน
              <?php } else { ?>
            ออเดอร์ของฉัน <?php } ?>
          </a></li>
          <li><a class="cart" href="bakery_mycart.php">
            <?php if($numOfCart>0){ ?>
              <span class="num"><?php echo $numOfCart ?></span>ตะกร้าของฉัน
              <?php } else { ?>
            ตะกร้าของฉัน <?php } ?>
          </a></li>
          <li><a href="profile.php">
          <?php
         
          if (isset($_SESSION['user_username'])) {  
            $sqlUser = "SELECT * FROM user WHERE user_username = '$username' ";
          $resultUser = mysqli_query($conn, $sqlUser);
          $numUser =  mysqli_fetch_array($resultUser);?>
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
        <?php if($numOrder>0){ ?>
              <span class="num2"><?php echo $numOrder ?></span>
              <?php } else { ?>
                <?php } ?>
          <i class="bi bi-clipboard-check-fill"></i>
          <p class="p-text">ออเดอร์</p>
        </a>
        <a class="menu-cart menu-activenow cart" href="./bakery_mycart.php">
        <?php if($numOfCart>0){ ?>
              <span class="num2"><?php echo $numOfCart ?></span>
              <?php } else { ?>
                <?php } ?>
          <i class="bi bi-basket2-fill"></i>
          <p class="p-text">ตะกร้าของฉัน</p>
        </a>
        <a class="menu-profile" href="profile.php">
          <i class="bi bi-person-fill"></i>
          <p class="p-text">โปรไฟล์</p>
        </a>
      </div>
    </header>

    
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#F7D9D9" fill-opacity="0.4" d="M0,256L6.5,234.7C13,213,26,171,39,170.7C51.9,171,65,213,78,213.3C90.8,213,104,171,117,128C129.7,85,143,43,156,21.3C168.6,0,182,0,195,37.3C207.6,75,221,149,234,197.3C246.5,245,259,267,272,240C285.4,213,298,139,311,112C324.3,85,337,107,350,133.3C363.2,160,376,192,389,224C402.2,256,415,288,428,293.3C441.1,299,454,277,467,229.3C480,181,493,107,506,117.3C518.9,128,532,224,545,218.7C557.8,213,571,107,584,69.3C596.8,32,610,64,623,69.3C635.7,75,649,53,662,48C674.6,43,688,53,701,90.7C713.5,128,726,192,739,218.7C752.4,245,765,235,778,234.7C791.4,235,804,245,817,240C830.3,235,843,213,856,170.7C869.2,128,882,64,895,80C908.1,96,921,192,934,192C947,192,960,96,973,58.7C985.9,21,999,43,1012,80C1024.9,117,1038,171,1051,176C1063.8,181,1077,139,1090,122.7C1102.7,107,1116,117,1129,106.7C1141.6,96,1155,64,1168,85.3C1180.5,107,1194,181,1206,224C1219.5,267,1232,277,1245,240C1258.4,203,1271,117,1284,96C1297.3,75,1310,117,1323,128C1336.2,139,1349,117,1362,117.3C1375.1,117,1388,139,1401,144C1414.1,149,1427,139,1434,133.3L1440,128L1440,0L1433.5,0C1427,0,1414,0,1401,0C1388.1,0,1375,0,1362,0C1349.2,0,1336,0,1323,0C1310.3,0,1297,0,1284,0C1271.4,0,1258,0,1245,0C1232.4,0,1219,0,1206,0C1193.5,0,1181,0,1168,0C1154.6,0,1142,0,1129,0C1115.7,0,1103,0,1090,0C1076.8,0,1064,0,1051,0C1037.8,0,1025,0,1012,0C998.9,0,986,0,973,0C960,0,947,0,934,0C921.1,0,908,0,895,0C882.2,0,869,0,856,0C843.2,0,830,0,817,0C804.3,0,791,0,778,0C765.4,0,752,0,739,0C726.5,0,714,0,701,0C687.6,0,675,0,662,0C648.6,0,636,0,623,0C609.7,0,597,0,584,0C570.8,0,558,0,545,0C531.9,0,519,0,506,0C493,0,480,0,467,0C454.1,0,441,0,428,0C415.1,0,402,0,389,0C376.2,0,363,0,350,0C337.3,0,324,0,311,0C298.4,0,285,0,272,0C259.5,0,246,0,234,0C220.5,0,208,0,195,0C181.6,0,169,0,156,0C142.7,0,130,0,117,0C103.8,0,91,0,78,0C64.9,0,52,0,39,0C25.9,0,13,0,6,0L0,0Z"></path>
        </svg>



        <h3 class="text_title">ตะกร้าสินค้าของฉัน</h3>

        <div class="content">
            <div class="col ">
                <div class="left">
                    <div>
                        <span>
                            <h3 class="text-num" style="text-align:center;">รายการสินค้าทั้งหมด <?php echo $numOfCart ?> รายการ</h3>
                        </span>
                        <div class="cart-box">
                            <?php
                            if ($numOfCart == 0) { ?>
                                <div class="mycart-blank">
                                    <img src="./logo/undraw2.svg" alt="">
                                    <h2>ยังไม่มีสินค้าในตะกร้า </h2>
                                </div>
                                <?php
                            } else {
                                $sqlJoin = "SELECT * FROM orderdetail 
                                INNER JOIN product on orderdetail.pd_id = product.pd_id WHERE purchase_id = '$rowPurchaseID'";
                                $result2 = mysqli_query($conn, $sqlJoin);
                                while ($row = mysqli_fetch_assoc($result2)) {
                                  $pd_delete = $row["pd_id"];

                                ?>
                                    <div class="cart-content">
                                        <div class="cart-item">
                                            <?php
                                            $rowPD = $row["pd_id"];
                                            $sqlImg = "SELECT * FROM product_image WHERE pd_id = '$rowPD' LIMIT 1 ";
                                            $result3 = mysqli_query($conn, $sqlImg);
                                            while ($row3 = mysqli_fetch_array($result3)) {
                                            ?>
                                                <div class="img-pd"><img class="img-pd" src="<?php echo $row3['img_url'] ?>" width="100" height="100" alt=""></div>
                                            <?php } ?>
                                            <div class="name-pd"><b><?php echo $row['pd_name'] ?></b></div>
                                            <div class="qty-pd"><b><?php echo $row['qty'] ?> ชิ้น</b></div>
                                            <div class="price-pd"><b>ชิ้นละ <?php echo $row['pd_price'] ?> บาท</b></div>
                                            <div class="edit-pd"><a href="bakery_product.php?product_id=<?php echo $row['pd_id'] ?>" class="text-edit">แก้ไข</a></div>
                                        </div>
                                        <div class="cart-trash">
                                            <a id="btn_d" href="#deletepdcart<?php echo $pd_delete ?>" data-toggle="modal" class="btn text-delete"><i class="fas fa-trash"></i></a>
                                        
                                      </div><?php include('./modal/modal.php'); ?>
                                    </div>
                                    
                            <?php } ?>
                                
                         <?php   $sqlSet = "SELECT * FROM orderdetail 
                                INNER JOIN setbox on orderdetail.set_id = setbox.set_id WHERE purchase_id = '$rowPurchaseID'";
                                $resultSet = mysqli_query($conn, $sqlSet);
                                while ($rowSet = mysqli_fetch_assoc($resultSet)) {

                                ?>
                                    <div class="cart-content">
                                        <div class="cart-item">
                                            <?php
                                            $rowSetID = $rowSet["set_id"]; ?>
                                           
                                                <div class="img-pd"><img class="img-pd" src="<?php echo $rowSet['set_img'] ?>" width="100" height="100" alt=""></div>
                                           
                                            <div class="name-pd"><b><?php echo $rowSet['set_name'] ?></b></div>
                                            <div class="qty-pd"><b><?php echo $rowSet['qty'] ?> เซต</b></div>
                                            <div class="price-pd"><b>เซตละ <?php echo $rowSet['set_price'] ?> บาท</b></div>
                                            <div class="edit-pd"><a href="set_detail.php?set_id=<?php echo $rowSet['set_id'] ?>" class="text-edit">แก้ไข</a></div>
                                        </div>
                                        <div class="cart-trash">
                                            <a id="btn_d" href="#deletesetcart<?php echo $rowSet['set_id']; ?>" data-toggle="modal" class="btn text-delete"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <?php include('modal/modal.php'); ?>
                            <?php } ?>
                                
                            <?php } ?>
                            
                        </div>

                    </div>

                    <?php
                    if ($numOfCart == 0) { ?>
                        <div class="btn-mix2">
                            <a href="index.php" class="btn_back2">&larr; สั่งสินค้า</a>
                        </div>
                    <?php
                    } else { ?>
                        <div class="btn-mix">
                            <a href="index.php" class="btn_back">&larr; สั่งเพิ่มเติม</a>
                            <a class="btn_submit" href="bakery_checkout.php?purchase_id=<?php echo $rowPurchaseID ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit">ยืนยันการสั่งซื้อ</a>
                        </div>
                    <?php } ?>





                </div>
            </div><!--  col  -->
        </div><!--  row  -->





</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>