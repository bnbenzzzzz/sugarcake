<!--Modal แก้ไขข้อมูลส่วนตัวuser -->
<div class="modal fade modal-profile" id="editprofile<?php echo $row['user_username'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-profile2">
        <div class="modal-content">
            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $edit = mysqli_query($conn, "SELECT * from user where user.user_username='" . $row['user_username'] . "'");
                $address_admin = mysqli_fetch_array($edit);
                // $type_user = $address_cus["user_status"];
                ?>
                <div class="modal-input">
                    <h1 class="text-h1">แก้ไขข้อมูลส่วนตัว</h1>
                    <form method="POST" enctype="multipart/form-data" action="./connect/con_edit_profile_user.php?user_username=<?php echo $address_admin["user_username"] ?>">

                        <!-- <div style="height:10px;"></div>
                        <input type="file" id="pic_index" name="pic_index">
                        <div style="height:5px;"></div> -->

                        <label>รูปภาพส่วนตัว:</label>
                        <input type="file" class="form-control regis" id="pic_index" name="pic_index">

                        <label>ชื่อผู้ใช้ :</label>
                        <input type="text" name="user_username" disabled class="form-control" value="<?php echo $address_admin['user_username']; ?>">

                        <label>ชื่อ :</label>
                        <input type="text" name="user_fname" class="form-control" value="<?php echo $address_admin['user_fname']; ?>">

                        <label>สกุล :</label>
                        <input type="text" name="user_lname" class="form-control" value="<?php echo $address_admin['user_lname']; ?>">

                        <label>เพศ :</label>
                        <input type="text" name="user_gender" class="form-control" value="<?php
                                                                                            if ($address_admin['user_gender'] == '1') {
                                                                                                echo "ชาย";
                                                                                            } elseif ($address_admin['user_gender'] == '2') {
                                                                                                echo "หญิง";
                                                                                            } else {
                                                                                                echo "อื่นๆ";
                                                                                            }
                                                                                            ?>" readonly>



                        <label>วันเกิด :</label>
                        <input type="date" name="user_birth" class="form-control" value="<?php echo $address_admin['user_birth']; ?>">


                        <label>อีเมล :</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo $address_admin['user_email']; ?>">

                        <label>เบอร์ :</label>
                        <input type="text" name="user_tel" maxlength=10 class="form-control" value="<?php echo $address_admin['user_tel']; ?>">

                        <label for="sub_add">ที่อยู่ :</label>
                        <textarea name="user_address" id="user_address" rows="2"  class="form-control">
                            <?php echo $address_admin['user_address']; ?>
                        </textarea>


                 






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