<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel=”shortcut icon” href="img/icon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/outsite.css">
<link rel="stylesheet" href="css/navbar.css">

    <title>Document</title>
</head>
<body>
    <div class="contain--fluid">

      <section id="navbar">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"> 
                  <img src="img/logo.jpg" alt="" width="80">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#เบเกอรี่" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      เบเกอรี่</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="bakery_cake.php">เค้ก</a></li>
                        <li><a class="dropdown-item" href="bakery_roll.php">โรล</a></li>
                        <li><a class="dropdown-item" href="bakery_thai.php">ขนมไทย</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="set.php">ชุดส่งสุดคุ้ม</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="outsite.php">ชุดนอกสถานที่</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">ติดต่อเรา</a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link" href="#ตะกร้าของฉัน"> 
                  <img class="icon_cart" src="img/cart.png" alt="" width="25">
                </a>
                  </li>
                  <li id="cart" class="nav-item">
                   <a id="cart_text" class="nav-link"  href="#ตะกร้าของฉัน">ตะกร้าของฉัน</a>
                   </li>
                  <li class="nav-item">
                   <a class="nav-link" href="profile.php"> 
                    <img class="icon_user" src="img/user.png" alt="" width="25">
                  </a>
                  <li id="user" class="nav-item">
                     <a id="user_text" class="nav-link"  href="profile.php">โปรไฟล์</a>
                  </li>
                </ul>
              </div>  
            </div>
          </nav> <!-- //nav// -->
        </section> <!--  navbar  -->

        
        <div class="row">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="bakery_cake.php">เบเกอรี่</a></li>
              <li class="breadcrumb-item active" aria-current="page">เค้ก</li>
            </ol>
          </nav>
        </div>
        
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12 col-12">
              <div class="row">
              <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12">
                <button id="choice" type="button" class="btn btn-dark">ขนม</button>
                <button id="choice" type="button" class="btn btn-dark">เครื่องดื่ม</button>   
              </div>
            </div>
            <div class="col-md-2"></div>            
          </div><!--  row2  -->
          
          <div class="left">
              <div class="container">
                <div class="row">
                  <div class="col order-last">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col order-first">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>   
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col order-last">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col order-first">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col order-last">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col order-first">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col order-last">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col order-first">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>

          

          <div class="right">
            
            <div class="container">
                <h2>ชุดที่ 1</h2>
                <div class="row">
                  <div class="col order-last">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                  <div class="col order-first">
                    <div class="card">
                        <img src="img/nong.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <span class="card-text">เค้กช็อคหน้านิ่ม</span><p class="card-text" style="float: right;">45.-</p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <table>
                <tr>
                    <td class="float">จำนวน</td>
                    <td class="float">:</td>
                    <td class="td">
                      <form name=form1>                             
                        <input type=button value=" - " onclick="document.form1.input1.value--">
                        <input name=input1 value="1" size=4 style="text-align: center;" onfocus="buffer=this.value" 
                        onchange="if (isNaN(this.value)) {this.value=buffer}">
                        <input type=button value=" + " onclick="document.form1.input1.value++">
                      </form>                          
                    </td>
                    <td class="float"> ชุด </td>
                </tr>
              </table>
              
              <button id="btn2" class="input_add">เพิ่ม</button>
              <br>

                <button type="button" class="btn btn-outline-secondary btn-sm" style="margin: 3em 2em; padding: 10px;"><img src="img/cart.png" alt="" width="20"> เพิ่มไปยังรถเข็น</button>
                <button type="button" class="btn btn-outline-dark btn-sm" style="padding: 10px;" >ซื้อสินค้า</button>
        </div>


         
</section> <!--  navbar  -->
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
