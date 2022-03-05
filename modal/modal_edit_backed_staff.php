<!--Modal แก้ไขข้อมูลส่วนตัวuser -->
<div class="modal fade" id="editbtn<?php echo $row['user_username'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $edit = mysqli_query($conn, "SELECT * from user where user_username='" . $row['user_username'] . "'");
                $row = mysqli_fetch_array($edit);
                // $type_user = $row["user_status"];
                ?>
                <div class="modal-input">
                    <h1 class="text-h1">แก้ไขข้อมูลพนักงาน</h1>
                    <form method="POST" enctype="multipart/form-data" action="./connect/con_edit_profile_staff.php?user_username=<?php echo $row["user_username"] ?>">

                        <!-- <div style="height:10px;"></div>
                        <input type="file" id="pic_index" name="pic_index">
                        <div style="height:5px;"></div> -->

                        <label>รูปภาพส่วนตัว:</label>
                        <input type="file" class="form-control regis" id="pic_index" name="pic_index">

                        <label>ชื่อผู้ใช้ :</label>
                        <input type="text" name="user_username" disabled class="form-control" value="<?php echo $row['user_username']; ?>">

                        <label>ชื่อ :</label>
                        <input type="text" name="user_fname" class="form-control" value="<?php echo $row['user_fname']; ?>">

                        <label>สกุล :</label>
                        <input type="text" name="user_lname" class="form-control" value="<?php echo $row['user_lname']; ?>">

                        <label>อีเมล :</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo $row['user_email']; ?>">

                        <label>วันเกิด :</label>
                        <input type="date" name="user_birth" class="form-control" value="<?php echo $row['user_birth']; ?>">

                        <label>เพศ :</label>
                        <input type="text" name="user_gender" class="form-control" value="<?php
                                                                                            if ($row['user_gender'] == '1') {
                                                                                                echo "ชาย";
                                                                                            } elseif ($row['user_gender'] == '2') {
                                                                                                echo "หญิง";
                                                                                            } else {
                                                                                                echo "อื่นๆ";
                                                                                            }
                                                                                            ?>" disabled>


                        <label>ที่อยู่ :</label>
                        <textarea type="date" cols="35" rows="3" name="user_address" class="form-control"><?php echo $row['user_address']; ?></textarea>

                        <div class="modal-btn-footer">
                            <button type="button" class="btn btn-yl" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                            <button type="submit" class="btn btn-bt">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>