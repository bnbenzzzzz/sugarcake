<!-- add address -->
<div class="modal fade de" id="add_address<?php echo $user_username ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content del">

            <div class="modal-body">
                <!-- <h1 class="icon-trash"><i class="bi bi-trash-fill"></i></h1> -->
                <h3 class="head-add">เพิ่มที่อยู่</h3>

                <form enctype="multipart/form-data" method="POST" action="./connect/con_add_newaddress.php?user_username=<?php echo $user_username ?>">
                    <article class="update-address">
                        <label class="form-head">ชื่อ :</label>
                        <label class="form-head">สกุล :</label>
                    </article>

                    <article class="update-address">
                        <input type="text" name="new_fname" class="form-control">
                        <input type="text" name="new_lname" class="form-control">
                    </article>

                    <label class="form-head">เบอร์โทร :</label>
                    <input type="text" name="new_tel" maxlength=10 class="form-control">

                    <label class="form-head" for="sub_add">ที่อยู่ :</label>
                    <input type="text" name="sub_add" class="form-control">

                    <article class="update-address">
                        <label class="form-head" for="province">จังหวัด :</label>
                        <label class="form-head" for="amphure">อำเภอ :</label>

                    </article>

                    <article class="update-address">

                        <select name="new_province" id="province" class="form-control">
                            <option hidden value="">เลือกจังหวัด</option>
                            <?php
                            $sql_pv = "SELECT * FROM provinces";
                            $query_pv = mysqli_query($conn, $sql_pv);

                            while ($result_pv = mysqli_fetch_assoc($query_pv)) : ?>
                                <option value="<?= $result_pv['id'] ?>"><?= $result_pv['name_th'] ?></option>
                            <?php endwhile; ?>
                        </select>

                        <select name="new_district" id="amphure" class="form-control">
                            <option hidden value="">เลือกอำเภอ</option>
                        </select>

                    </article>

                    <article class="update-address">
                        <label class="form-head" for="district">ตำบล :</label>
                        <label class="form-head" for="postcode">รหัสไปรษณีย์ :</label>
                    </article>

                    <article class="update-address">

                        <select name="district_id" id="district" class="form-control">
                            <option hidden value="">เลือกตำบล</option>
                        </select>

                        <input type="text" name="postcode" class="form-control">

                    </article>

                    <hr class="bd-bottom">

                    <div class="modal-btn-footer">
                        <button type="button" class="btn btn-cancel" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                        <button type="submit" class="btn btn-submit">บันทึก</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

999
<!-- edit_address -->
<div class="modal fade de" id="edit_address<?php echo $rownewaddress['address_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content edit">

            <div class="modal-body">
                <?php include('./connect/connectdb.php');
                $edit = mysqli_query($conn, "SELECT * from user JOIN address_tbl ON user.user_username = address_tbl.user_username where user.user_username='" . $rownewaddress['user_username'] . "'");
                $edit_address = mysqli_fetch_array($edit);
                ?>

                <h3 class="head-edit">แก้ไขที่อยู่</h3>

                <form enctype="multipart/form-data" method="POST" action="./connect/con_edit_newaddress.php?address_id=<?php echo $rownewaddress['address_id'] ?>">
                    <article class="update-address">
                        <label class="form-head">ชื่อ :</label>
                        <label class="form-head">สกุล :</label>
                    </article>

                    <article class="update-address">
                        <input type="text" name="user_fname" class="form-control" value="<?php echo $edit_address['user_fname']; ?>">
                        <input type="text" name="user_lname" class="form-control" value="<?php echo $edit_address['user_lname']; ?>">
                    </article>

                    <label class="form-head">เบอร์โทร :</label>
                    <input type="text" name="user_tel" maxlength=10 class="form-control" value="<?php echo $edit_address['user_tel']; ?>">

                    <label class="form-head" for="sub_add">ที่อยู่ :</label>
                    <input type="text" name="sub_add" class="form-control" value="<?php echo $edit_address['address_descript']; ?>">

                    <article class="update-address">
                        <label class="form-head" for="province">จังหวัด :</label>
                        <label class="form-head" for="amphure">อำเภอ :</label>

                    </article>

                    <article class="update-address">
                        <select name="province_id" id="province" class="form-control">
                            <?php
                            $sql_province = "SELECT * from provinces";
                            $select_province = mysqli_query($conn, $sql_province);
                            while ($result_province = mysqli_fetch_assoc($select_province)) : ?>
                                <!-- <option hidden value="">ค้นหาจังหวัด</option> -->
                                <option <?php echo ($edit_address['province'] == $result_province['id']) ? 'selected' : ''; ?> value="<?= $result_province['id'] ?>"><?= $result_province['name_th'] ?></option>
                            <?php endwhile; ?>
                        </select>

                        <select name="amphure_id" id="amphure" class="form-control">
                            <?php
                            $sql_amphure = "SELECT * from amphures";
                            $select_amphure = mysqli_query($conn, $sql_amphure);
                            while ($result_amphure = mysqli_fetch_assoc($select_amphure)) : ?>
                                <!-- <option hidden value="">ค้นหาจังหวัด</option> -->
                                <option <?php echo ($edit_address['district'] == $result_amphure['id']) ? 'selected' : ''; ?> value="<?= $result_amphure['id'] ?>"><?= $result_amphure['name_th'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </article>

                    <article class="update-address">
                        <label class="form-head" for="district">ตำบล :</label>
                        <label class="form-head" for="postcode">รหัสไปรษณีย์ :</label>
                    </article>

                    <article class="update-address">

                        <select name="district_id" id="district" class="form-control">
                            <?php
                            $sql_district = "SELECT * from 	districts";
                            $select_district = mysqli_query($conn, $sql_district);
                            while ($result_district = mysqli_fetch_assoc($select_district)) : ?>
                                <option <?php echo ($edit_address['sub_district'] == $result_district['id']) ? 'selected' : ''; ?> value="<?= $result_district['id'] ?>"><?= $result_district['name_th'] ?></option>
                            <?php endwhile; ?>
                            <!-- <option hidden value="">เลือกตำบล</option> -->
                        </select>


                        <input type="text" name="postcode" class="form-control" value="<?php echo $edit_address['postcode']; ?>">

                    </article>

                    <hr class="bd-bottom">

                    <div class="modal-btn-footer">
                        <button type="button" class="btn btn-cancel" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                        <button type="submit" class="btn btn-submit">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- delete_address -->
<div class="modal fade de" id="del_address<?php echo $rownewaddress['address_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content del">

            <form enctype="multipart/form-data" method="POST" action="./connect/con_delete_newaddress.php">
                <div class="modal-body">
                    <h3 class="delete_sure">คุณต้องการลบที่อยู่นี้</h3>
                    <hr class="bd-bottom">
                    <div class="modal-btn-footer">
                        <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-submit">ตกลง</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>