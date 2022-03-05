<?php
session_start();
include("./connect/connectdb.php");
require_once("./function/pagination_function.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="stylesheet" href="css/backed_purchaseorder.css">
    <link rel="stylesheet" href="css/modal_backed_purchaseorder.css">
    <link rel="stylesheet" href="css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
</head>

<body>




<div class="tabledetail">
    <div class="row">
        <div class="col-8 ">
            <div class="list_pd">
                <h3>รายละเอียดการสั่งซื้อ</h3>

                <table class="table-product">
                    <tr class="modal-tr">

                        <th class="th1 th-radius1">สินค้า</th>
                        <th class="th1">ราคาต่อชิ้น (บาท)</th>
                        <th class="th1">จำนวน (ชิ้น)</th>
                        <th class="th1 th-radius2">ราคา (บาท)</th>
                    </tr>
                    
                    <?php
                    $total = 0;
                    $purchase_idPD = $_GET['purchase_id'];
                    $sqlShowTR = "SELECT * FROM purchaseorder INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                        INNER JOIN product ON orderdetail.pd_id=product.pd_id WHERE purchaseorder.purchase_id= $purchase_idPD";
                    // comma เกิน
                    $resultShowTR = mysqli_query($conn, $sqlShowTR);
                    $num = 1;
                    while ($rowShowTR = mysqli_fetch_array($resultShowTR)) {
                        $total = $rowShowTR['pd_price'] * $rowShowTR['qty'];
                    ?>
                        <tr>
                            <td class="td0"><?php echo $rowShowTR['pd_name']; ?></td>
                            <td class="td1"><?php echo $rowShowTR['pd_price'] ?></td>
                            <td class="td1"><?php echo $rowShowTR['qty']; ?></td>
                            <td class="td1"><?php echo $total ?></td>
                        </tr>
                        <?php $num++ ?>
                    <?php } ?>
                    <?php
                    $total2 = 0;
                    $sqlShowSet = "SELECT * FROM purchaseorder INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                        INNER JOIN setbox ON orderdetail.set_id=setbox.set_id WHERE purchaseorder.purchase_id= $purchase_idPD ";

                    $resultShowSet = mysqli_query($conn, $sqlShowSet);
                    $num = 1;
                    while ($rowShowSet = mysqli_fetch_array($resultShowSet)) {
                        $total2 = $rowShowSet['set_price'] * $rowShowSet['qty'];
                    ?>
                        <tr>
                            <td class="td0"><?php echo $rowShowSet['set_name']; ?></td>
                            <td class="td1"><?php echo $rowShowSet['set_price'] ?></td>
                            <td class="td1"><?php echo $rowShowSet['qty']; ?></td>
                            <td class="td1"><?php echo $total2 ?></td>
                        </tr>
                        <?php $num++ ?>
                    <?php } ?>
                </table>
            </div>
        </div>

</div>


</div>





<?php include("cnd.php") ?>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>