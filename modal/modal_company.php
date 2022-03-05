<!-- Add company-->
<div class="modal fade de" id="addcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            <h2 class="add-name-cat"><i class="bi bi-plus-lg"></i> เพิ่มบริษัทขนส่ง</h2>
                <form action="./connect/con_add_company.php" method="POST" enctype="multipart/form-data">
                    <label for="com_name">ชื่อขนส่ง :</label>
                    <input class="input-editcat3" type="text" placeholder="กรอกชื่อบริษัทขนส่ง" id="com_name" name="com_name"  required>
                    <label for="com_url">url ตรวจสอบพัสดุ :</label>
                    <input class="input-editcat3" type="text" placeholder="คัดลอกที่อยู่เว็บไซต์ตรวจสอบพัสดุมาวาง" id="com_url" name="com_url"  required>
                    <label for="com_img" id="com-logo">เพิ่มรูปโลโก้ :</label>
                    <input class="input-editcat3 form-control" type="file" placeholder="คัดลอกที่อยู่เว็บไซต์ตรวจสอบพัสดุมาวาง" id="com_img" name="com_img" >
                    
                    
                    <div class="modal-btn-pd">
                        <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-add-cat">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- modal edit company  -->
<div class="modal fade ee2" id="editcom<?php echo $rowcomID ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h2 class="de-name-cat">แก้ไขบริษัทขนส่ง</h2>
                <?php
                $edit = mysqli_query($conn, "SELECT * from shippingcompany where company_id='" . $rowcomID . "'");
                $row = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">
                    <form enctype="multipart/form-data" action="./connect/con_edit_company.php?com_id=<?php echo $rowcomID ?>" method="POST">

                    <label for="com_name">ชื่อขนส่ง :</label>
                    <input class="input-editcat3" type="text" placeholder="กรอกชื่อบริษัทขนส่ง" id="com_name" name="com_name" value="<?php echo $row['company_name'] ?>"  required>
                    <label for="com_url">url ตรวจสอบพัสดุ :</label>
                    <input class="input-editcat3" type="text" placeholder="คัดลอกที่อยู่เว็บไซต์ตรวจสอบพัสดุมาวาง" id="com_url" name="com_url" value="<?php echo $row['company_url'] ?>"  required>
                    <img class="company-img-modal" src="<?php echo $row['company_img'] ?>" alt="">
                    <label for="com_img" >เพิ่มรูปโลโก้ใหม่ :</label>
                    <input class="input-editcat3 form-control" type="file" placeholder="คัดลอกที่อยู่เว็บไซต์ตรวจสอบพัสดุมาวาง" id="com_img" name="com_img" >
                    
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


<div class="modal fade de" id="deletecom<?php echo $rowcomID ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $delCom = mysqli_query($conn, "select * from shippingcompany where company_id='" . $rowcomID . "'");
                $fetchCom = mysqli_fetch_array($delCom);

                ?>
                <div class="container-fluid">
                    <h1 class="icon-trash"><i class="bi bi-trash-fill"></i></h1>
                    <h2 class="de-name-pd">ลบ <?php echo $fetchCom['company_name']; ?> ใช่หรือไม่</h2>
                </div>
                <div class="modal-btn-pd">
                    <a href="#" data-dismiss="modal" class="btn btn-cancel">ยกเลิก</a>
                    <a href="./connect/con_delete_company.php?com_id=<?php echo $rowcomID ?>" class="btn btn-delete-pd">ลบ</a>
                </div>
            </div>

        </div>
    </div>
</div>