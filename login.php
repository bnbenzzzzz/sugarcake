<!-- <link rel="stylesheet" href="css/login.css">

<div class="modal fade " id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content card_login modal_login">
          <div class="div-login">
                <h5  class="modal-title" id="exampleModalLabel">LOGIN</h5>
            </div>
            <div class="bobo" style="margin-top: 3em;">
                <form action="connect/con_login.php" method="post">                  
                    <input style="width: 85%;" class="form-control log" type="text" name="user_username" id="user_username" placeholder="username" required><br>
                    <input style="width: 85%;" class="form-control log" type="password" name="user_pass" id="user_pass" placeholder="password" required>      <br>    
                    <input class="btn btn-lg btn-success btn-block btn_login" type="submit" value="เข้าสู่ระบบ" name="login">
            </div>

            <div class="modal-body">
                <hr>
                <a class="register-link btn_register" class="close" data-dismiss="modal" aria-label="Close" style="text-decoration: underline;float:left;" data-toggle="modal" href="#con_register.php"><span aria-hidden="true">ลงทะเบียน</span></a>
                <a class="login-link btn_register" class="close" data-dismiss="modal" aria-label="Close" style="text-decoration: underline;float:right;" data-toggle="modal" href="#forgot.php"><span aria-hidden="true">ลืมรหัสผ่าน?</span></a>
            </div>
            </form>
        </div>
    </div>
</div> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel=”shortcut icon” href="img/icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="card-login">
        <div class="left">
            <div class="box-content">
                <h1 class="hello-text">ยินดีต้อนรับ</h1>

                <p class="descript-text">
                    ยินดีต้อนรับเข้าสู่เว็บไซต์ร้าน Sugar cake เข้าสู่ระบบเพื่อเลือกซื้อสินค้าจากทางร้าน
                </p>
                <a class="btn-signin" href="./register.php">สมัครสมาชิก</a>
                <a class="btn-visit bi bi-shop-window" href="./index.php"> เข้าชมเว็บไซต์</a>
            </div>
        </div>

        <div class="right">
            <div class="box-content2">
                <img class="img-login" src="./img/logo.png" alt="รูปภาพlogin">
                <!-- <h3 class="hello-text2">เข้าสู่ระบบ</h3> -->
                <form class="form-signin" action="connect/con_login.php" method="post">
                    <input class="form-login" type="text" name="user_username" id="user_username" placeholder="username" required>
                    <input class="form-login" type="password" name="user_pass" id="user_pass" placeholder="password" required>
                    <!-- <a class="forgot-pass" href="#">ลืมรหัสผ่าน</a> -->
                    <input class="btn-signup" type="submit" value="เข้าสู่ระบบ" name="login">
                    <a class="btn-signin nonenone" href="./register.php">สมัครสมาชิก</a>
                <a class="btn-visit bi bi-shop-window nonenone" href="./index.php"> เข้าชมเว็บไซต์</a>
                </form>
            </div>

        </div>
        </div>
    </section>



</body>

</html>