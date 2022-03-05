<div class="modal fade de" id="deleteset<?php echo $row['set_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content dd">

            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $del = mysqli_query($conn, "select * from setbox where set_id='" . $row['set_id'] . "'");
                $fetch = mysqli_fetch_array($del);

                ?>
                <div class="container-fluid">
                    <h1 class="icon-trash"><i class="bi bi-trash-fill"></i></h1>
                    <h2 class="de-name-pd">ลบ <?php echo $row['set_name']; ?> ใช่หรือไม่</h2>
                </div>
                <div class="modal-btn-pd">
                    <a href="#" data-dismiss="modal" class="btn btn-cancel">ยกเลิก</a>
                    <a href="./connect/con_delete_set.php?set_id=<?php echo $row['set_id']; ?>" class="btn btn-delete-pd">ลบ</a>
                </div>
            </div>

        </div>
    </div>
</div>



<!--Modal แก้ไขสิน set -->
<div class="modal fade " id="editset<?php echo $row['set_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ee">
            <div class="modal-body">
                <h1 class="title-modal">แก้ไขข้อมูลชุดสินค้า</h1>
                <?php
                $set = mysqli_query($conn, "SELECT * from setbox where set_id='" . $row['set_id'] . "'");
                $rowSetID = mysqli_fetch_array($set);
                $setID = $rowSetID["set_id"];
                ?>
                <div class="container-fluid">
                    <form enctype="multipart/form-data" action="./connect/con_edit_set.php?set_id=<?php echo $rowSetID["set_id"] ?>" method="POST">
                        <div class="div-showimg">
                            <img src="<?php echo $rowSetID["set_img"] ?>" class="showsetimg" alt="รูปเซตสินค้า">
                            <label class="custom-file-upload">
                                <input type="file" id="pic_index1" name="pic_index1" />
                                เลือกไฟล์ภาพใหม่
                            </label>

                            <div class="all-box">
                                <div class="name-box">
                                    <label for="set_name">ชื่อชุดสินค้า</label>
                                    <input type="text" name="set_name" value="<?php echo $rowSetID["set_name"] ?>">
                                </div>
                                <div class="name-box">
                                    <label for="set_name">ราคา</label>
                                    <input type="text" name="set_price" value="<?php echo $rowSetID["set_price"] ?>">
                                </div>
                            </div>
                            <div class="div-detail">

                                <?php
                                $No = 1;
                                $sqlDetail = "SELECT * FROM set_detail JOIN product ON set_detail.pd_id = product.pd_id WHERE set_id = '$setID'";
                                $resultDetail = mysqli_query($conn, $sqlDetail);
                                while ($rowDetail = mysqli_fetch_array($resultDetail)) {
                                ?>
                                    <div class="name-box">
                                        <label class="label-detail">สินค้าชิ้นที่ <?php echo $No ?></label>
                                        <input disabled type="text" name="product<?php echo $No ?>" value="<?php echo $rowDetail ["pd_name"] ?>">
                                    </div>

                                <?php $No++; } ?>
                            </div>
                        </div>

                </div>
                <div class="modal-btn-pd">
                    <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-edit-pd">บันทึก</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>