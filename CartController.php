<?php
session_start();
include "connect/connectdb.php";
if (isset($_GET["addtocart"])) {
    $pd_id = $_GET["pd_id"];
    $num_row = $_GET["numrow"];
    $sql = "SELECT * FROM product WHERE pd_id = '$pd_id'";
    $result  = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>
    <tr id="tr_<?php echo $row["pd_id"] ?>">
        <!-- <td class="td1"><?php echo $num_row ?></td> -->
        <td class="td2" id="testJS"><?php echo $row["pd_name"] ?></td>
        <td class="td3">
            <span>
                <button onclick="delProduct('<?php echo $row['pd_id'] ?>')" class="btn_d">-</button>
            </span>
            <span class="td-qty" id="num_<?php echo $row["pd_id"] ?>">1</span>
            <!-- <span id="num_<?php echo $row["pd_id"] ?>"><input type="number" name="" id="numofproduct" value="1" max="<?php echo $row['pd_qty'] ?>"></span> -->

            <span>
                <button class="btn_p" onclick="plusProduct('<?php echo $row['pd_id'] ?>')">+</button>
            </span>
        </td>
        <td class="td4" id="price_<?php echo $row["pd_id"] ?>"><?php echo $row["pd_price"] ?></td>
        <td class="td5"><span>
                <button onclick="deleteProduct('<?php echo $row['pd_id'] ?>')" class="btn_delete"><i class="bi bi-trash-fill"></i></button>
            </span>
        </td>
    </tr>
<?php
}


if (isset($_GET["search_cus"])) {
?>
    <div class="row">
        <div class="search-cus">
            <input type="text" autocomplete="off" class="form-cus" id="search_cus" placeholder="ค้นหาจากหมายเลขโทรศัพท์" onkeyup="search_info()">
            <button disabled class="p-search"><i class="fas fa-search"></i></button>
        </div>
    </div>
<?php
}


if (isset($_GET["search_info"])) {
?>
    <table class="table">
        <thead>
            <th>No.</th>
            <th>ชื่อ</th>
            <th>สกุล</th>
            <th>โทรศัพท์</th>
            <th>Email</th>
        </thead>
        <tbody>
            <?php
            $data = $_GET["data"];
            $sql = "SELECT * FROM user WHERE user_tel LIKE '%$data%' ";
            // $sql = "SELECT * FROM user WHERE user_username LIKE '%$data%' OR user_fname LIKE '%$data%' OR user_lname LIKE '%$data%' OR user_tel LIKE '%$data%' OR user_email LIKE '%$data%'";
            $result = mysqli_query($conn, $sql);
            $num = 1;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr class="tr-cus" onclick="userinfo('<?php echo $row['user_username'] ?>','<?php echo $row['user_fname'] ?>','<?php echo $row['user_lname'] ?>')">
                    <td><?php echo $num ?></td>
                    <td><?php echo $row["user_fname"] ?></td>
                    <td><?php echo $row["user_lname"] ?></td>
                    <td><?php echo $row["user_tel"] ?></td>
                    <td><?php echo $row["user_email"] ?></td>
                </tr>
            <?php
                $num++;
            }
            ?>
        </tbody>
    </table>
<?php
}


if (isset($_GET["getUserinfo"])) {
    $user_username = $_GET["user_username"];
    $sql = "SELECT * FROM user WHERE user_username = '$user_username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>
    <div class="row">

        <div class="col-12 mt-6"><b>ข้อมูลผู้ใช้งาน</b></div>
        <br>
        <br>

        <div class="col-2">username</div>
        <div class="col-10"><input type="text" name="" id="usernameInfo" value="<?php echo $row["user_username"] ?>" readonly class="form-control mt-3"></div>
        <br>
        <div class="col-2">ชื่อจริง</div>
        <div class="col-10"><input type="text" name="" id="" value="<?php echo $row["user_fname"] ?>" readonly class="form-control mt-3"></div>
        <br>
        <div class="col-2">นามสกุล</div>
        <div class="col-10"><input type="text" name="" id="" value="<?php echo $row["user_lname"] ?>" readonly class="form-control mt-3"></div>
        <br>
        <div class="col-2">เบอร์โทรศัพท์</div>
        <div class="col-10"><input type="text" name="" id="" value="<?php echo $row["user_tel"] ?>" readonly class="form-control mt-3"></div>
        <br>
        <div class="col-2">Email</div>
        <div class="col-10"><input type="text" name="" id="" value="<?php echo $row["user_email"] ?>" readonly class="form-control mt-3"></div>
    </div>
<?php
}

if (isset($_GET["savetocart"])) {

    $staff = $_SESSION["user_username"];
    $user = $_GET["user"];
    $purchase_type = $_GET["paytype"];
    $payment_type = $_GET["selectbuy"];
    $purchase_status = "รับสินค้าแล้ว";
    $payment_status = 1;
    $deliver_type = "take";
    $deliver_status = 2;
    $product = $_GET["product"];
    $total = $_GET["total"];
    $qty = $_GET["qty"];
    $promotion = $_GET['promotion'];
    $date1 = "ST";
    $date2 = date('Ymd');
    $date3 = substr($date2, 2, 6);
    // $promotion = $_GET["promotion"];
    $list_product = explode(",", $product);
    $list_qty = explode(",", $qty);
    $list_promotion = explode(",", $promotion);
    echo $customer;
    $discount = $_GET['discount'];
    $pprice = $total - $discount;
    for ($i = 0; $i < count($list_product); $i++) {
        $sub_qty += $list_qty[$i];
    }
    $sqlCreateOrder = "INSERT INTO purchaseorder(purchase_price,user_username,staff,purchase_type,purchase_status,payment_type,sumprice_pd,discount,payment_status) VALUES ($pprice,'$user','$staff','$purchase_type','$purchase_status','$payment_type',$total,$discount,'$payment_status')";
    mysqli_query($conn, $sqlCreateOrder);

    $sqlFetchId = "SELECT * FROM purchaseorder WHERE user_username = '$user' ORDER BY purchase_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $rowID = mysqli_fetch_array($resultID);
    $rowID = $rowID["purchase_id"];
    $queryUp = "UPDATE purchaseorder SET purchase_number = '$date3$date1$rowID' WHERE user_username = '$user' AND purchase_id = '$rowID'";
	$resultUp = mysqli_query($conn, $queryUp);
    // echo "\n".$rowID["id"];


    for ($i = 0; $i < count($list_product); $i++) {
        $prod = $list_product[$i];
        $sub_qty = $list_qty[$i];
        $sqlPrice = "SELECT * FROM product WHERE pd_id = '$prod'";
        $resultPrice = mysqli_query($conn, $sqlPrice);
        $rowPrice = mysqli_fetch_array($resultPrice);
        $qty_amount = $rowPrice["pd_inventory"];
        $rowPrice = $rowPrice["pd_price"];
        $sqlDetail = "INSERT INTO orderdetail(pd_id,qty,purchase_id,price) VALUES('$prod','$sub_qty','$rowID',$rowPrice)";
        $resultDetail = mysqli_query($conn, $sqlDetail);
        $totalqty = $qty_amount - $sub_qty;
        $sqlUpdate = "UPDATE product SET pd_inventory = $totalqty WHERE pd_id = '$prod'";
        mysqli_query($conn, $sqlUpdate);
        echo "<script>console.log('" . $sub_qty . "')</script>";
        echo "<script>console.log('" . $qty_amount . "')</script>";
    }

    foreach ($list_promotion as $promotion_id) {
        $sqlPromotion = "INSERT INTO purchaseorder_has_promotion(promotion_id,purchase_id) VALUES ($promotion_id,$rowID)";
        mysqli_query($conn, $sqlPromotion);
    }


    echo "success";
}
