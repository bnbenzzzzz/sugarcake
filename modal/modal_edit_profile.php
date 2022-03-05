<!--Modal แก้ไขข้อมูลส่วนตัวuser -->
<div class="modal fade modal-profile" id="editprofile<?php echo $row['user_username'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-profile2">
        <div class="modal-content">
            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $edit = mysqli_query($conn, "SELECT * from user INNER JOIN address_tbl ON user.user_username = address_tbl.user_username where user.user_username='" . $row['user_username'] . "'");
                $address_cus = mysqli_fetch_array($edit);
                // $type_user = $address_cus["user_status"];
                ?>
                <div class="modal-input">
                    <h1 class="text-h1">แก้ไขข้อมูลส่วนตัว</h1>
                    <form method="POST" enctype="multipart/form-data" action="./connect/con_edit_profile_user.php?user_username=<?php echo $address_cus["user_username"] ?>">

                        <!-- <div style="height:10px;"></div>
                        <input type="file" id="pic_index" name="pic_index">
                        <div style="height:5px;"></div> -->

                        <label>รูปภาพส่วนตัว:</label>
                        <input type="file" class="form-control regis" id="pic_index" name="pic_index">

                        <label>ชื่อผู้ใช้ :</label>
                        <input type="text" name="user_username" disabled class="form-control" value="<?php echo $address_cus['user_username']; ?>">

                        <label>ชื่อ :</label>
                        <input type="text" name="user_fname" class="form-control" value="<?php echo $address_cus['user_fname']; ?>">

                        <label>สกุล :</label>
                        <input type="text" name="user_lname" class="form-control" value="<?php echo $address_cus['user_lname']; ?>">

                        <label>เพศ :</label>
                        <input type="text" name="user_gender" class="form-control" value="<?php
                                                                                            if ($address_cus['user_gender'] == '1') {
                                                                                                echo "ชาย";
                                                                                            } elseif ($address_cus['user_gender'] == '2') {
                                                                                                echo "หญิง";
                                                                                            } else {
                                                                                                echo "อื่นๆ";
                                                                                            }
                                                                                            ?>" readonly>



                        <label>วันเกิด :</label>
                        <input type="date" name="user_birth" class="form-control" value="<?php echo $address_cus['user_birth']; ?>">


                        <label>อีเมล :</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo $address_cus['user_email']; ?>">

                        <label>เบอร์ :</label>
                        <input type="text" name="user_tel" maxlength=10 class="form-control" value="<?php echo $address_cus['user_tel']; ?>">


                        <label for="province">จังหวัด :</label>
                        <select name="province_id" id="province" class="form-control">
                            <?php
                            $sql_province = "SELECT * from provinces";
                            $select_province = mysqli_query($conn, $sql_province);
                            while ($result_province = mysqli_fetch_assoc($select_province)) : ?>
                                <!-- <option hidden value="">ค้นหาจังหวัด</option> -->
                                <option <?php echo ($address_cus['province'] == $result_province['id']) ? 'selected' : ''; ?> value="<?= $result_province['id'] ?>"><?= $result_province['name_th'] ?></option>
                            <?php endwhile; ?>
                        </select>

                        <label for="amphure">อำเภอ :</label>
                        <select name="amphure_id" id="amphure" class="form-control">
                            <?php
                            $sql_amphure = "SELECT * from amphures";
                            $select_amphure = mysqli_query($conn, $sql_amphure);
                            while ($result_amphure = mysqli_fetch_assoc($select_amphure)) : ?>
                                <!-- <option hidden value="">ค้นหาจังหวัด</option> -->
                                <option <?php echo ($address_cus['district'] == $result_amphure['id']) ? 'selected' : ''; ?> value="<?= $result_amphure['id'] ?>"><?= $result_amphure['name_th'] ?></option>
                            <?php endwhile; ?>
                        </select>


                        <label for="district">ตำบล :</label>
                        <select name="district_id" id="district" class="form-control">
                            <?php
                            $sql_district = "SELECT * from 	districts";
                            $select_district = mysqli_query($conn, $sql_district);
                            while ($result_district = mysqli_fetch_assoc($select_district)) : ?>
                                <option <?php echo ($address_cus['sub_district'] == $result_district['id']) ? 'selected' : ''; ?> value="<?= $result_district['id'] ?>"><?= $result_district['name_th'] ?></option>
                            <?php endwhile; ?>
                            <!-- <option hidden value="">เลือกตำบล</option> -->
                        </select>

                        <label for="sub_add">ที่อยู่ :</label>
                        <textarea name="sub_add" id="sub_add" rows="2"  class="form-control">
                            <?php echo $address_cus['address_descript']; ?>
                        </textarea>

                        <label for="postcode">รหัสไปรษณีย์ :</label>
                        <input type="text" name="postcode" class="form-control" value="<?php echo $address_cus['postcode']; ?>">

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