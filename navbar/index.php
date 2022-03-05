<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://kit.fontawesome.com/5be396fb17.js" crossorigin="anonymous"></script>

    <title>Navigation bar</title>
  </head>
  <body>
  <header id="nav-desktop">
      <div id="brand"><a href="index.php"><img class="img-logo" src="img/logo.png" alt="logo"></a></div>
      <nav>
        <ul>
          <li><a href="/home">หน้าแรก</a></li>
          <li><a href="/home">สินค้า</a></li>
          <li><a href="/products">ติดต่อเรา</a></li>
          <li><a href="/about">ตะกร้าของฉัน</a></li>
          <li><a href="/login" ><img class="img-profile" src="img/mark.jpg" alt="profile"></a></li>
        </ul>
      </nav>
    </header>

    <header id="hamburger-icon">
      <div class="mobile-menu">
        <a class="menu-home menu-activenow" href="#">
          <i class="bi bi-house-door-fill"></i>
          <p class="p-text">หน้าแรก</p>
        </a>
        <a class="menu-chat" href="./bakery_sendback.php?pi=0">
          <i class="bi bi-chat-square-text-fill"></i>
          <!-- <i class="fa-solid fa-cupcake"></i> -->
          <p class="p-text">สินค้า</p>
        </a>
        <a class="menu-order" href="./bakery_myorder.php">
          <i class="bi bi-clipboard-check-fill"></i>
          <p class="p-text">ติดต่อ</p>
        </a>
        <a class="menu-cart" href="./bakery_mycart.php">
          <i class="bi bi-basket2-fill"></i>
          <p class="p-text">ตะกร้าของฉัน</p>
        </a>
        <a class="menu-profile" href="profile.php">
          <i class="bi bi-person-fill"></i>
          <p class="p-text">โปรไฟล์</p>
        </a>
      </div>
    </header>
  </body>
</html>
