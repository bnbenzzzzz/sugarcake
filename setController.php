<?php
include 'connect/connectdb.php';
session_start();
if (isset($_GET["insert"])) {
    $pd_id = $_GET["pd_id"];
    $sql = "SELECT * FROM product WHERE pd_id = '$pd_id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
?>
        <p style="display: none;" id="price_<?php echo $row["pd_id"] ?>"><?php echo $row["pd_price"] ?></p>
        <div class="card_pdselect" id="div_<?php echo $row['pd_id'] ?>">
            <?php
            $sqlImg = "SELECT * FROM product_image WHERE pd_id = '$pd_id' LIMIT 1";
            $result2 = mysqli_query($conn, $sqlImg);
            $row2 = mysqli_fetch_array($result2)
            ?>
            <img src="<?php echo $row2['img_url'] ?>" class="card-img-pd" alt="...">

            <div class="text-detail">
                <p  class="pd-inset-name"><?php echo $row['pd_name'] ?></p>
                <p id="price_<?php echo $row["pd_id"] ?>" class="pd-inset-price">ขายแยกชิ้นละ <?php echo $row['pd_price'] ?> บาท</p>
            </div>

            <button id="cart_text" class="btn_edit" onclick="delproduct(<?php echo $row['pd_id'] ?>)">ลบ</button>

        </div>
<?php
    }
}

if (isset($_GET["save"])) {
    $username =   $_SESSION["user_username"];
    $pd_id = $_GET["pd_id"];
    $qty = $_GET["qty"];
    $qtyset = $_GET["qtyset"];
    $purchase_type = "online";
    $purchase_status = "ยังไม่สั่งซื้อ";
    $price = 0;
    $pd_id = explode(",", $pd_id);
    $qty = explode(",", $qty);
    for ($i = 0; $i < count($pd_id); $i++) {
        $pd = $pd_id[$i];
        $sql = "SELECT * FROM product WHERE pd_id = $pd";
        $result = mysqli_query($conn, $sql);
        $fetch = mysqli_fetch_array($result);
        $y = (int)$qty[$i];
        $x = $fetch["pd_price"] * $y;
        $price += $x;
    }
    $sqlChecksetcus = mysqli_query($conn, "SELECT * from store WHERE store_no=6 "); 
    $rowChecksetcus = mysqli_fetch_array($sqlChecksetcus);
    $discount_per = $rowChecksetcus['setcus_discount'];
    $price = $price - (($price * $discount_per) / 100);
    $set_name = "Create by customer";
    $set_img = "img/setcus.jpg";
    $sql = "INSERT INTO setbox(set_name,set_price,set_img,set_qty,set_status,user_username) VALUES('$set_name',$price,'$set_img',3,0,'$username')";
    mysqli_query($conn, $sql);
    $sqlID = "SELECT * FROM setbox WHERE user_username = '$username' ORDER BY set_id DESC LIMIT 1";
    $resultID = mysqli_query($conn, $sqlID);
    $rowID = mysqli_fetch_array($resultID);
    $id = $rowID["set_id"];

    for ($i = 0; $i < count($pd_id); $i++) {
        $pd = $pd_id[$i];
        $q = $qty[$i];
        $sql = "INSERT INTO set_detail(set_id,pd_id) VALUES ($id,$pd)";
        mysqli_query($conn, $sql);
    }

    $sqlPurchase = "SELECT * FROM purchaseorder WHERE user_username = '$username' AND purchase_status = 'ยังไม่สั่งซื้อ' ";
    $resultPurchase = mysqli_query($conn, $sqlPurchase);
    $resultPurchase2 = mysqli_query($conn, $sqlPurchase);
    if (mysqli_num_rows($resultPurchase2) > 0) {
        $rowPurchase = mysqli_fetch_array($resultPurchase);
        $Purchase = $rowPurchase["purchase_id"];
        $sqlAdd = "INSERT INTO orderdetail(set_id,qty,price,purchase_id) VALUES('$id','$qtyset','$price','$Purchase')";
        mysqli_query($conn, $sqlAdd);
    } else {
        $sqlCreateOrder = "INSERT INTO purchaseorder(user_username,purchase_type,purchase_status) VALUES ('$username','$purchase_type','$purchase_status')";
        mysqli_query($conn, $sqlCreateOrder);
        $sqlFetchId = "SELECT * FROM purchaseorder WHERE user_username = '$username' ORDER BY purchase_id DESC LIMIT 1";
        $resultID = mysqli_query($conn, $sqlFetchId);
        $rowID = mysqli_fetch_array($resultID);
        $rowPurchaseID = $rowID["purchase_id"];
        $sql = "INSERT INTO orderdetail(set_id,qty,purchase_id) VALUES($id,'$qtyset','$rowPurchaseID')";
        mysqli_query($conn, $sql);
    }
    echo "success";
}
?>