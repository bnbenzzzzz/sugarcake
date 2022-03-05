<?php
include("connect/connectdb.php");
$sql = isset($_GET['selectType']) ? $_GET['selectType'] : false;
$sql = $sql != false ? "SELECT * FROM product WHERE product.cat_id = $sql AND product.pd_status!=1" : "SELECT * FROM product WHERE pd_status!=1";
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
                <?php if ($row["pd_inventory"] != 0) { ?>
                    <span class="text-price2" style="margin-top: -0.5em;">เหลือ <?php echo $row["pd_inventory"] ?> ชิ้น</span>
                <?php } else { ?>
                    <span class="text-price3" style="margin-top: -0.5em;">หมด</span>
                <?php } ?>
                <!-- <div class="row">           
                          <div style="margin-top: 5px;" class="col">
                              <center>
                            <a  href="#deletepd<?php echo $row["pd_id"]; ?>" data-toggle="modal" class="btn_add">เพิ่ม</a>
                          </center>
                          </div>
                        </div> -->
            </div>
        </div>
    </div>


<?php } ?>