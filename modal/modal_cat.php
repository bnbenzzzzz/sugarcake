<div class="modal fade de" id="deletecat<?php echo $row['cat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $del = mysqli_query($conn, "select * from category where cat_id='" . $row['cat_id'] . "'");
                $fetch = mysqli_fetch_array($del);

                ?>
                <div class="container-fluid">
                    <h1 class="icon-trash"><i class="bi bi-trash-fill"></i></h1>
                    <h2 class="de-name-pd">ลบ <?php echo $fetch['cat_name']; ?> ใช่หรือไม่</h2>
                </div>
                <div class="modal-btn-pd">
                    <a href="#" data-dismiss="modal" class="btn btn-cancel">ยกเลิก</a>
                    <a href="./connect/con_delete_set.php?set_id=<?php echo $row['set_id']; ?>" class="btn btn-delete-pd">ลบ</a>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- modal edit category  -->
<div class="modal fade ee" id="editcat<?php echo $row['cat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h2 class="de-name-cat">แก้ไขชื่อหมวดหมู่</h2>
                <?php
                $edit = mysqli_query($conn, "SELECT * from category where cat_id='" . $row['cat_id'] . "'");
                $row = mysqli_fetch_array($edit);
                // $type_product = $row["cat_id"];
                ?>
                <div class="container-fluid">
                    <form enctype="multipart/form-data" action="./connect/con_edit_category.php?cat_id=<?php echo $row["cat_id"] ?>" method="POST">

                        <div class="row">

                            <input type="text" name="cat_name" class="input-editcat" value="<?php echo $row['cat_name']; ?>">

                        </div>
                        <div class="modal-btn-pd">
                            <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-edit-cat">บันทึก</button>
                        </div>

                </div>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Add category -->
<div class="modal fade de" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="add-name-cat"><i class="bi bi-plus-lg"></i> เพิ่มชื่อหมวดหมู่</h2>
                <form action="./connect/con_add_category.php" method="POST" enctype="multipart/form-data">
                    <input class="input-editcat1" type="text" placeholder="กรอกชื่อหมวดหมู่ที่ต้องการเพิ่ม" name="cat_name" required>
                    <div class="modal-btn-pd">
                        <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-add-cat">บันทึก</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>