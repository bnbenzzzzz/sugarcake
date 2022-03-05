<?php
session_start();
include("connect/connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <link rel="stylesheet" href="css/backed_dash.css">
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

</head>
</head>

<body>

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
    <a class="menu-active" href="backed_dash.php"><i class="bi bi-graph-up"></i><span class="dpn"> Dashboard</span></a>
    <a class="menu" href="backed_product.php"><i class="bi bi-ui-checks-grid"></i> <span class="dpn">จัดการข้อมูล</span></a>
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

    <div class="content1">
      <section class="chart-piroid">
        <canvas id="chartPiroid"></canvas>
      </section>
      <section class="chart-piroid">
        <canvas id="chartTop"></canvas>
      </section>
    </div>
    <div class="content2">
      <section class="chart-piroid">
        <canvas id="chartDay"></canvas>
      </section>
    </div>
    <?php

    $period = array(
      '08:00-10:00' => 0,
      '10:00-12:00' => 0,
      '12:00-14:00' => 0,
      '14:00-16:00' => 0,
      '16:00-18:00' => 0,
      '18:00-20:00' => 0,
      '20:00-08:00' => 0
    );
    $dayTH = array(
      'จันทร์' => 0,
      'อังคาร' => 0,
      'พุธ' => 0,
      'พฤหัสบดี' => 0,
      'ศุกร์' => 0,
      'เสาร์' => 0,
      'อาทิตย์' => 0
    );
    $sql_countbhType = "SELECT * , SUM(purchase_price) FROM purchaseorder
    WHERE purchaseorder.purchase_status='รับสินค้าแล้ว' OR purchaseorder.purchase_status='แก้บิล'
    GROUP BY purchaseorder.purchase_id  ORDER BY SUM(purchase_price)";
    $resultcountbhType = mysqli_query($conn, $sql_countbhType);

    $sqlTopUser = "SELECT * , SUM(purchase_price) FROM purchaseorder 
    WHERE purchase_status='รับสินค้าแล้ว' OR purchase_status='แก้บิล' 
    GROUP BY user_username ORDER BY SUM(purchase_price) DESC LIMIT 10";
    $resultTopUser = mysqli_query($conn, $sqlTopUser);
    while ($rowTopUser = mysqli_fetch_assoc($resultTopUser)) {
      $labels_username[] = $rowTopUser['user_username'];
      $data_user[] = $rowTopUser['SUM(purchase_price)'];
    }

      while ($row_countbhType = mysqli_fetch_assoc($resultcountbhType)) {

        $date = $row_countbhType['created_at'];
        $date = strtotime($date);
        $time = date('H', $date);
        $day = date('D', $date);
        if ($time >= 8 && $time < 10) {
          $period['08:00-10:00'] += $row_countbhType['purchase_price'];
        } else if ($time >= 10 && $time < 12) {
          $period['10:00-12:00'] += $row_countbhType['purchase_price'];
        } else if ($time >= 12 && $time < 14) {
          $period['12:00-14:00'] += $row_countbhType['purchase_price'];
        } else if ($time >= 14 && $time < 16) {
          $period['14:00-16:00'] += $row_countbhType['purchase_price'];
        } else if ($time >= 16 && $time < 18) {
          $period['16:00-18:00'] += $row_countbhType['purchase_price'];
        } else if ($time >= 18 && $time < 20) {
          $period['18:00-20:00'] += $row_countbhType['purchase_price'];
        } else {
          $period['20:00-08:00'] += $row_countbhType['purchase_price'];
        }


        if ($day == 'Mon') {
          $dayTH['จันทร์'] += $row_countbhType['purchase_price'];
        } else if ($day == 'Tue') {
          $dayTH['อังคาร'] += $row_countbhType['purchase_price'];
        } else if ($day == 'Wed') {
          $dayTH['พุธ'] += $row_countbhType['purchase_price'];
        } else if ($day == 'Thu') {
          $dayTH['พฤหัสบดี'] += $row_countbhType['purchase_price'];
        } else if ($day == 'Fri') {
          $dayTH['ศุกร์'] += $row_countbhType['purchase_price'];
        } else if ($day == 'Sat') {
          $dayTH['เสาร์'] += $row_countbhType['purchase_price'];
        } else {
          $dayTH['อาทิตย์'] += $row_countbhType['purchase_price'];
        }

        $data_countbhType[] = $row_countbhType['SUM(purchase_price)'];
      }
    

    ?>
    <script>
      var ctxbar = document.getElementById("chartPiroid").getContext('2d');
      var chartPiroid = new Chart(ctxbar, {
        type: 'line',
        data: {
          labels: <?= json_encode(array_keys($period)) ?>,
          datasets: [{
            borderColor: '#FF005C',
            tension: 0.2,
            fill: false,
            labels: {
              display: true,
              render: 'label',
              fontFamily: 'Prompt'
            },
            data: <?= json_encode(array_values($period), JSON_NUMERIC_CHECK); ?>,
            backgroundColor: ['#FF005C'],
            borderWidth: 0.5
          }]
        },

        options: {
          cutoutPercentage: 70,

          tooltips: {
            enabled: true,
            font: {
              fontFamily: 'Prompt'
            }
          },
          plugins: {
            title: {
              display: true,
              text: 'ยอดขายตามช่วงเวลา',
            },
            legend: {
              display: false,
            },
            datalabels: {
              color: 'red',
              textAlign: 'center',
              font: {
                lineHeight: 1.6,
                fontFamily: 'Prompt'
              },
              formatter: function(value, context) {
                return context.chart.data.labels[context.dataIndex];
              }
            }
          }
        }
      });


      var ctxbar = document.getElementById("chartTop").getContext('2d');
      var chartTop = new Chart(ctxbar, {
        type: 'bar',
        data: {
          labels: <?= json_encode(array_values($labels_username)) ?>,
          datasets: [{
            labels: {
              display: true,
              render: 'label',
              fontFamily: 'Prompt'
            },
            data: <?= json_encode(array_values($data_user), JSON_NUMERIC_CHECK); ?>,
            backgroundColor: ['#22559C'],
            borderWidth: 0.5
          }]
        },

        options: {
          cutoutPercentage: 70,

          tooltips: {
            enabled: true,
            font: {
              fontFamily: 'Prompt'
            }
          },
          plugins: {
            title: {
              display: true,
              text: 'ลูกค้ายอดสั่งซื้อสูงสุด',
            },
            legend: {
              display: false,
            },
            datalabels: {
              color: 'red',
              textAlign: 'center',
              font: {
                lineHeight: 1.6,
                fontFamily: 'Prompt'
              },
              formatter: function(value, context) {
                return context.chart.data.labels[context.dataIndex];
              }
            }
          }
        }
      });

      var ctxbar = document.getElementById("chartDay").getContext('2d');
      var chartDay = new Chart(ctxbar, {
        type: 'pie',
        data: {
          labels: <?= json_encode(array_keys($dayTH)) ?>,
          datasets: [{
            labels: {
              display: true,
              render: 'label',
              fontFamily: 'Prompt'
            },
            data: <?= json_encode(array_values($dayTH), JSON_NUMERIC_CHECK); ?>,
            backgroundColor: ['#F0C929', '#FF677D', '#046582', '#D97642', '#185ADB', '#9145B6', '#91091E'],
            borderWidth: 0
          }]
        },

        options: {
          cutoutPercentage: 70,

          tooltips: {
            enabled: true,
            font: {
              fontFamily: 'Prompt'
            }
          },
          plugins: {
            title: {
              display: true,
              text: 'ยอดขายตามวัน',
            },
            legend: {
              display: true,
              position: 'bottom'
            },
            datalabels: {
              color: 'red',
              textAlign: 'center',
              font: {
                lineHeight: 1.6,
                fontFamily: 'Prompt'
              },
              formatter: function(value, context) {
                return context.chart.data.labels[context.dataIndex];
              }
            }
          }
        }
      });
    </script>




  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
</body>

</html>