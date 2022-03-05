<?php
include("connect/connectdb.php");
$sql = isset($_GET['selectType']) ? $_GET['selectType'] : false;
$sql = $sql != false ? "SELECT * FROM product WHERE product.cat_id = $sql" : "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $rowPD = $row["pd_id"];
?>

    <div class="col-product-pos" onclick="addcart('<?php echo $row['pd_id'] ?>')">
        <div class="card">
            <?php
            $sqlImg = "SELECT * FROM product_image WHERE pd_id = '$rowPD' LIMIT 1 ";
            $result3 = mysqli_query($conn, $sqlImg);
            while ($row3 = mysqli_fetch_array($result3)) {
            ?>
                <img src="<?php echo $row3["img_url"] ?>" class="img-url img-fluid" alt="รูปภาพสินค้า">
            <?php } ?>
            <div class="card-body">
                <span class="text-name" style="margin-top: -0.5em;"> <?php echo $row["pd_name"] ?></span><br>
                <span class="text-price" style="margin-top: -0.5em;"><?php echo $row["pd_price"] ?> บาท</span>
                
       
            </div>
        </div>
    </div>


<?php } ?>