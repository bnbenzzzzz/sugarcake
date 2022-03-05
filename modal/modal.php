<!-- modal เพิ่มสินค้าหน้าร้าน  -->
<div class="modal fade de" id="addinven<?php echo $rowProduct["pd_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $addinven = mysqli_query($conn, "select * from product where pd_id='" . $rowProduct['pd_id'] . "'");
                $rowinven = mysqli_fetch_array($addinven);
                ?>
                <form enctype="multipart/form-data" action="./connect/con_edit_invenproduct.php?pd_id=<?php echo $rowProduct['pd_id'] ?>" method="POST">
                    <div class="container-fluid">
                        <h2 class="de-name-pd"><i class="bi bi-patch-plus-fill"></i> <?php echo $rowinven['pd_name']; ?></h2>
                        <div class="qty-inven">
                            
                            <input type="number" min="0" class="invent-qty" name="invent_qty" value="<?php echo $rowinven['pd_inventory']; ?>">
                            <h2 class="de-name-pd">ชิ้น</h2>
                        </div>
                    </div>
                    <div class="modal-btn-pd">
                        <a href="#" data-dismiss="modal" class="btn btn-cancel">ยกเลิก</a>
                        <input type="submit" class="btn btn-add-inven"  value="บันทึก">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- modal ลบสินค้า  -->
<div class="modal fade de" id="deletepd<?php echo $rowProPro ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $del = mysqli_query($conn, "select * from product where pd_id='" . $rowProduct['pd_id'] . "'");
                $row = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h1 class="icon-trash"><i class="bi bi-trash-fill"></i></h1>
                    <h2 class="de-name-pd">ลบ <?php echo $row['pd_name']; ?> ใช่หรือไม่</h2>
                </div>
                <div class="modal-btn-pd">
                    <a href="#" data-dismiss="modal" class="btn btn-cancel">ยกเลิก</a>
                    <a href="./connect/con_delete_emp.php?pd_id=<?php echo $row['pd_id']; ?>" class="btn btn-delete-pd">ลบ</a>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- modal ลบสินค้าในตะกร้า  -->
<div class="modal fade de" id="deletepdcart<?php echo $pd_delete ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $delDelete = mysqli_query($conn, "select * from product where pd_id='" .$pd_delete . "'");
                $rowDelete = mysqli_fetch_array($delDelete);

                ?>
                <div class="container-fluid">
                    <?php
                    $delIMG = mysqli_query($conn, "select * from product_image where pd_id='" . $pd_delete . "'");
                    $rowIMG = mysqli_fetch_array($delIMG);

                    ?>
                    <img class="img-de" src="<?php echo $rowIMG['img_url']; ?>" alt="">
                    <h5 class="text-de">
                        ต้องการลบสินค้า : <span style="color:red;font-size:1.5em"><?php echo $rowDelete['pd_name']; ?></span>
                    </h5>
                </div>
        

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                <a href="./connect/con_delete_cart.php?pd_id=<?php echo $rowDelete['pd_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ</a>
            </div>

        </div>
    </div>
</div>


<!-- modal ลบเซตในตะกร้า  -->
<div class="modal fade de" id="deletesetcart<?php echo $rowSet['set_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="modal-header" id="modaldel">
                <h5 class="modal-title" id="myModalLabel">เตือนการลบสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div> -->
            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $delSet = mysqli_query($conn, "select * from setbox where set_id='" . $rowSet['set_id'] . "'");
                $rowgetSet = mysqli_fetch_array($delSet);

                ?>
                <div class="container-fluid">
                    <img class="img-de" src="<?php echo $rowgetSet['set_img']; ?>" alt="">
                    <h5 class="text-de">
                        ต้องการลบสินค้า : <span style="color:red;font-size:1.5em"><?php echo $rowgetSet['set_name']; ?></span>
                    </h5>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                <a href="./connect/con_delete_cart.php?set_id=<?php echo $rowgetSet['set_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ</a>
            </div>

        </div>
    </div>
</div>


<!--Modal แก้ไขสินค้า -->
<div class="modal fade " id="editpd<?php echo $rowPD ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ee">
            <div class="modal-body">
                <h1 class="title-modal">แก้ไขข้อมูลสินค้า</h1>
                <?php
                $edit = mysqli_query($conn, "SELECT * from product where pd_id='" . $row['pd_id'] . "'");
                $row = mysqli_fetch_array($edit);
                $type_product = $row["cat_id"];
                ?>
                <div class="container-fluid">
                    <form enctype="multipart/form-data" action="./connect/con_edit_product.php?pd_id=<?php echo $row["pd_id"] ?>" method="POST">
                        <div class="div-showimg">
                            <?php
                            $sqlImg = "SELECT * FROM product_image WHERE pd_id = '$rowPD'";
                            $result3 = mysqli_query($conn, $sqlImg);
                            while ($row3 = mysqli_fetch_array($result3)) {
                            ?>
                                <img src="<?php echo $row3["img_url"] ?>" class="showpdimg" alt="" width="100" height="100" class="imglogin">

                            <?php } ?>
                        </div>
                        <div class="div-input">
                            <label for="pic_index1">เพิ่ม/แก้ไขรูปที่ 1 :</label>
                            <input class="form-control" type="file" id="pic_index1" name="pic_index1">
                            <label for="pic_index1">เพิ่ม/แก้ไขรูปที่ 2 :</label>
                            <input class="form-control" type="file" id="pic_index2" name="pic_index2">
                            <label for="pic_index1">เพิ่ม/แก้ไขรูปที่ 3 :</label>
                            <input class="form-control" type="file" id="pic_index3" name="pic_index3">
                            <label for="pd-name">แก้ไขชื่อสินค้า :</label>
                            <input type="text" id="pd-name" name="pd_name" class="form-control" value="<?php echo $row['pd_name']; ?>">
                            <label for="pd_price">แก้ไขราคา :</label>
                            <input type="text" name="pd_price" id="pd_price" class="form-control" value="<?php echo $row['pd_price']; ?>">

                            <label for="pd_des">แก้ไขรายละเอียดสินค้า :</label>

                            <textarea class="form-control" name="pd_des" id="pd_des" cols="30" rows="10"><?php echo $row['pd_des']; ?></textarea>

                            <label for="category">แก้ไขประเภทสินค้า :</label>

                            <select id="category" class="form-control" id="category" name="category">
                                <option hidden value="0" style="color:gray">เลือกประเภทสินค้า</option>
                                <?php
                                $sql = mysqli_query($conn, "SELECT * from category ");
                                while ($row = mysqli_fetch_array($sql)) {
                                    if ($row["cat_id"] == $type_product) {
                                        echo "<option selected value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                </div>
                <div class="modal-btn-pd">
                    <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-save-pd">บันทึก</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>





<!-- Add product -->
<div class="modal fade ad" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content box-add">
            <h2 class="add-name-cat"><i class="bi bi-plus-lg"></i> เพิ่มสินค้า</h2>
            <div class="col col-input">
                <form  action="./connect/con_add_product.php" method="POST" enctype="multipart/form-data">
                    <section class="add-detail">
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style=" float:right">รูปภาพสินค้าที่ 1 :</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="file" width="2px" class="form-control" name="pic_index1" accept="image/*" onchange="loadFile1(event)" required>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style=" float:right">รูปภาพสินค้าที่ 2 :</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="file" width="2px" class="form-control" name="pic_index2" accept="image/*" onchange="loadFile1(event)">
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style=" float:right">รูปภาพสินค้าที่ 3 :</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="file" width="2px" class="form-control" name="pic_index3" accept="image/*" onchange="loadFile1(event)">
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style=" float:right">ชื่อสินค้า :</label>
                        </div>
                        <div class="col-lg-7">
                            <input class="form-control" type="text" placeholder="ex : เค้กส้ม" name="pd_name" maxlength="20" required>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style=" float:right">ราคาต่อชิ้น :</label>
                        </div>
                        <div class="col-lg-7">
                            <input class="form-control" type="text" placeholder="ใส่เฉพาะเลขราคา ex : 50" name="pd_price" maxlength="20" required>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style=" float:right">จำนวนวันในการเตรียม :</label>
                        </div>
                        <div class="col-lg-7">
                            <input class="form-control" type="number" min="1" max="20" placeholder="ใส่เฉพาะเลขเลขจำนวนวัน" name="pd_time"  required>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style="float:right;  ">การรับสินค้า(สั่งออนไลน์):</label>
                        </div>
                        <div class="col-lg-7">
                            <select id="type_get" class="form-control" name="type_get" required>
                                <option hidden value="0" selected style="color:gray">เลือกประเภทการรับ</option>
                                <option value="ร่วมการจัดส่ง" >ร่วมการจัดส่ง</option>
                                <option value="รับที่ร้านเท่านั้น" >รับที่ร้านเท่านั้น</option>
                               
                            </select>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style=" float:right">รายละเอียดสินค้า :</label>
                        </div>
                        <div class="col-lg-7">
                            <textarea name="pd_des" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style="float:right;  ">ประเภทสินค้า:</label>
                        </div>
                        <div class="col-lg-7">
                            <select id="category" class="form-control" name="category" required>
                                <option hidden value="0" style="color:gray">เลือกประเภทสินค้า</option>
                                <!-- <option value="1">111</option> -->
                                <?php
                                $sql = mysqli_query($conn, "SELECT * from category ");
                                while ($row = mysqli_fetch_array($sql)) {
                                        echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";  
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    </section>

                    <div class="row" style="margin-top: 10px;margin-bottom: 20px;">
                        <div class="modal-btn-pd">
                            <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-add-cat">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Add category -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">เพิ่มหมวดหมู่สินค้า</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="col">
                <form action="./connect/con_add_category.php" method="POST" enctype="multipart/form-data">

                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label style=" float:right">ชื่อหมวดหมู่สินค้า :</label>
                        </div>
                        <div class="col-lg-7">
                            <input class="form-control" type="text" placeholder="ex : โรล" name="cat_name" maxlength="20" required>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="reset" class="btn btn-light float-right" style="color:black">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary float-right">เพิ่ม</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>