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
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/navbar.css">
<!-- <link rel="stylesheet" href="css/modal.css"> -->

    <title>Document</title>
</head>
<body>

    <div class="contain--fluid">

      <section id="navbar">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="home.php"> 
                  <img src="img/logo.jpg" alt="" width="80">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                       <a class="nav-link nav_menu" data-toggle="modal" href="#login">เข้าสู่ระบบ </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav_menu" data-toggle="modal" href="#register">ลงทะเบียน </a>
                    </li>
                   </li>
                </ul>
              </div>  
            </div>
          </nav> <!-- //nav// -->
        </section> <!--  navbar  -->     
</section> <!--  navbar  -->
</div>


<div class="row">
<div class="left">
    <div class="col-md-6">
        
            <img src="img/pancake.png" height="900" width="800">
            
        </div>
    </div>

<div class="right">
    <div class="col-md-6" style="margin:0px auto;">
            <h1 class="textja" style="text-align: center; margin-top: 6em;">Sugar cake</h1>
            <h3 class="textja" style="text-align: center;">( Homemade bakery )</h3>
            <p  class="textja"style="text-align: center;">เค้กหลากหลายความอร่อย สไตล์ Homemade
                พร้อมทาน ให้คุณได้สัมผัสกับเมนูของความหวาน
                รังสรรค์จากวัตถุดิบชั้นดี ขนมปังสดใหม่
                แซนวิซและขนมอบ ขนมเค้ก คุ้กกี้แสนอร่อย
            </p>

            <button type="button" id="but" class="btn btn-outline-dark btn-lg btn_show"><a href="index.php" style="color: rgb(255, 255,255);">รายละเอียดสินค้า</a> </button>
        </div>
        
    </div>
    
</div>



<?php   
    include('login.php'); 
    include('register.php'); 
?>
     </body>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
