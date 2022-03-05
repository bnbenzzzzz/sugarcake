<!-- Add img1 -->
<div class="modal fade ad" id="main_img_home" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content box-add">
            <?php if ($rowStore['main_img_home'] == "") { ?>
                <h2 class="add-name-cat">เพิ่มรูปภาพ</h2>
            <?php } else { ?>
                <h2 class="add-name-cat">เปลี่ยนรูปภาพ</h2>
                <img src="<?php echo $rowStore['main_img_home']; ?>" alt="รูปภาพเดิม" class="modal-img">
            <?php } ?>
            <div class="col col-input">
                <form action="./store/add_img_one.php" method="POST" enctype="multipart/form-data">
                    <div class="row-big">
                        <label for="text_img">ใส่ URL</label>
                        <input class="form-control" id="text_img" name="text_img" type="text" placeholder="คัดลอกที่อยู่รูปภาพมาวาง">
                        <p class="line">หรือ</p>
                        <input type="file" width="2px" class="form-control" name="pic_index1" accept="image/*" onchange="loadFile1(event)">
                    </div>
                    <div class="modal-btn-pd">
                        <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-add-cat">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add img2 -->
<div class="modal fade ad" id="main_img_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content box-add">
            <?php if ($rowStore['main_img_contact'] == "") { ?>
                <h2 class="add-name-cat">เพิ่มรูปภาพ</h2>
            <?php } else { ?>
                <h2 class="add-name-cat">เปลี่ยนรูปภาพ</h2>
                <img src="<?php echo $rowStore['main_img_contact']; ?>" alt="รูปภาพเดิม" class="modal-img">
            <?php } ?>
            <div class="col col-input">
                <form action="./store/add_img_two.php" method="POST" enctype="multipart/form-data">
                    <div class="row-big">
                        <label for="text_img">ใส่ URL</label>
                        <input class="form-control" id="text_img" name="text_img" type="text" placeholder="คัดลอกที่อยู่รูปภาพมาวาง">
                        <p class="line">หรือ</p>
                        <input type="file" width="2px" class="form-control" name="pic_index1" accept="image/*" onchange="loadFile1(event)">
                    </div>
                    <div class="modal-btn-pd">
                        <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-add-cat">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add img3 -->
<div class="modal fade ad" id="bg_img_home" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content box-add">
            <?php if ($rowStore['bg_img_home'] == "") { ?>
                <h2 class="add-name-cat">เพิ่มรูปภาพ</h2>
            <?php } else { ?>
                <h2 class="add-name-cat">เปลี่ยนรูปภาพ</h2>
                <img src="<?php echo $rowStore['bg_img_home']; ?>" alt="รูปภาพเดิม" class="modal-img">
            <?php } ?>
            <div class="col col-input">
                <form action="./store/add_img_three.php" method="POST" enctype="multipart/form-data">
                    <div class="row-big">
                        <label for="text_img">ใส่ URL</label>
                        <input class="form-control" id="text_img" name="text_img" type="text" placeholder="คัดลอกที่อยู่รูปภาพมาวาง">
                        <p class="line">หรือ</p>
                        <input type="file" width="2px" class="form-control" name="pic_index1" accept="image/*" onchange="loadFile1(event)">
                    </div>
                    <div class="modal-btn-pd">
                        <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-add-cat">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Add img4 -->
<div class="modal fade ad" id="bg_img_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content box-add">
            <?php if ($rowStore['bg_img_contact'] == "") { ?>
                <h2 class="add-name-cat">เพิ่มรูปภาพ</h2>
            <?php } else { ?>
                <h2 class="add-name-cat">เปลี่ยนรูปภาพ</h2>
                <img src="<?php echo $rowStore['bg_img_contact']; ?>" alt="รูปภาพเดิม" class="modal-img">
            <?php } ?>
            <div class="col col-input">
                <form action="./store/add_img_four.php" method="POST" enctype="multipart/form-data">
                    <div class="row-big">
                        <label for="text_img">ใส่ URL</label>
                        <input class="form-control" id="text_img" name="text_img" type="text" placeholder="คัดลอกที่อยู่รูปภาพมาวาง">
                        <p class="line">หรือ</p>
                        <input type="file" width="2px" class="form-control" name="pic_index1" accept="image/*" onchange="loadFile1(event)">
                    </div>
                    <div class="modal-btn-pd">
                        <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-add-cat">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Add bank -->
<div class="modal fade bbank" id="modal_bank_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content box-add">
            <?php if ($rowStore['qr_img'] == "") { ?>
                <h2 class="add-name-cat">เพิ่มข้อมูลธนาคาร</h2>
            <?php } else { ?>
                <h2 class="add-name-cat">เปลี่ยนข้อมูลธนาคาร</h2>
                <img src="<?php echo $rowStore['qr_img']; ?>" alt="รูปภาพเดิม" class="modal-img2">
            <?php } ?>
            <div class="col col-input">
                <form action="./store/add_bank.php" method="POST" enctype="multipart/form-data">
                    <div class="row-big">
                        <?php if ($rowStore['qr_img'] == "") { ?>

                            <label for="bank_img">รูปภาพ QR Code</label>
                            <input type="file" width="2px" class="form-control" id="bank_img" name="pic_index1" accept="image/*" onchange="loadFile1(event)" required>
                            <label for="bank_name">ชื่อธนาคาร</label>
                            <input class="form-control" id="bank_name" name="bank_name" type="text" placeholder="กรอกชื่อธนาคาร" required>
                            <label for="bank_no">หมายเลขบัญชี</label>
                            <input class="form-control" id="bank_no" name="bank_no" type="text" placeholder="กรอกหมายเลขบัญชี" required>
                            <label for="bank_cus">ชื่อบัญชี</label>
                            <input class="form-control" id="bank_cus" name="bank_cus" type="text" placeholder="กรอกชื่อบัญชี (ผู้รับเงิน)" required>
                        <?php } else { ?>
                            <label for="bank_img">รูปภาพ QR Code</label>
                            <input value="<?php echo $rowStore['qr_img']; ?>" type="file" width="2px" class="form-control" id="bank_img" name="pic_index1" accept="image/*" onchange="loadFile1(event)">
                            <label for="bank_name">ชื่อธนาคาร</label><br>


                            <select name="bank_name" id="bank_name">

                                <?php
                                $querybank = " SELECT * FROM bank WHERE store_no = 6 ";
                                $resultbank = mysqli_query($conn, $querybank);
                                while ($rowbank = mysqli_fetch_array($resultbank)) {

                                    if ($rowbank['bank_status'] == 1) {
                                ?>
                                        <option selected value="<?php echo $rowbank["banklist_name"]; ?>">
                                            <?php echo $rowbank["banklist_name"] ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?php echo $rowbank["banklist_name"]; ?>">
                                            <?php echo $rowbank["banklist_name"] ?>
                                        </option>
                                <?php }
                                } ?>
                                <option value="add_bank">เพิ่มธนาคาร </option>
                            </select>
                            <input type="text" name="add_bank" placeholder="กรอกชื่อธนาคาร" id="add_bank" style="display:none" />

                            <script>
                                $(document).ready(function() {
                                    $("#bank_name").change(function() {
                                        var value = $("#bank_name option:selected").val();
                                        if (value == "add_bank") {
                                            $("#add_bank").show();
                                        } else {
                                            $("#add_bank").hide();
                                        }
                                    });
                                });
                            </script>

                            <!-- <input value="<?php echo $rowStore['bank_name']; ?>" class="form-control" id="bank_name" name="bank_name" type="text" placeholder="กรอกชื่อธนาคาร" required> -->
                            <br>

                            <br>
                            <label for="bank_no">หมายเลขบัญชี</label>
                            <input value="<?php echo $rowStore['bank_no']; ?>" pattern="[0-9]{10,12}" class="form-control" id="bank_no" name="bank_no" type="text" placeholder="กรอกหมายเลขบัญชี" required>
                            <label for="bank_cus">ชื่อบัญชี</label>
                            <input value="<?php echo $rowStore['bank_cus']; ?>" patttern="[A-Za-zก-์\s]{1,}" class="form-control" id="bank_cus" name="bank_cus" type="text" placeholder="กรอกชื่อบัญชี (ผู้รับเงิน)" required>
                        <?php } ?>
                    </div>
                    <div class="modal-btn-pd">
                        <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-add-cat">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Add contact -->
<div class="modal fade bbank" id="modal_contact_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content box-add">
            <?php if ($rowStore['logo_img'] == "") { ?>
                <h2 class="add-name-cat">เพิ่มข้อมูลการติดต่อ</h2>
            <?php } else { ?>
                <h2 class="add-name-cat">เปลี่ยนข้อมูลการติดต่อ</h2>
                <img src="<?php echo $rowStore['logo_img']; ?>" alt="รูปภาพเดิม" class="modal-img2">
            <?php } ?>
            <div class="col col-input">
                <form action="./store/add_contact.php" method="POST" enctype="multipart/form-data">
                    <div class="row-big">
                        <?php if ($rowStore['logo_img'] == "") { ?>

                            <label for="logo_img">รูปภาพ โลโก้ร้าน</label>
                            <input type="file" width="2px" class="form-control" id="logo_img" name="pic_index1" accept="image/*" onchange="loadFile1(event)" required>
                            <label for="facebook">URL Facebook (ไม่บังคับ)</label>
                            <input class="form-control" id="facebook" name="facebook" type="text" placeholder="คัดลอก URL Facebook มาวาง">
                            <label for="instagram">URL Instagram (ไม่บังคับ)</label>
                            <input class="form-control" id="instagram" name="instagram" type="text" placeholder="คัดลอก URL Instagram มาวาง">
                            <label for="line">URL Line (ไม่บังคับ)</label>
                            <input class="form-control" id="line" name="line" type="text" placeholder="คัดลอก URL Line มาวาง">
                            <label for="add">ที่อยู่ร้าน</label>
                            <textarea class="form-control" name="add" id="add" placeholder="ที่อยู่ร้าน"></textarea>
                            <label for="embed">ฝังแผนที่</label>
                            <textarea class="form-control" name="embed" id="embed" placeholder="คัดลอก Embed a map มาวาง"></textarea>
                        <?php } else { ?>
                            <label for="logo_img">รูปภาพ โลโก้ร้าน</label>
                            <input type="file" width="2px" class="form-control" id="logo_img" name="pic_index1" accept="image/*" onchange="loadFile1(event)">
                            <label for="facebook">URL Facebook (ไม่บังคับ)</label>
                            <input value="<?php echo $rowStore['fb_link']; ?>" class="form-control" id="facebook" name="facebook" type="text" placeholder="คัดลอก URL Facebook มาวาง">
                            <label for="instagram">URL Instagram (ไม่บังคับ)</label>
                            <input value="<?php echo $rowStore['ig_link']; ?>" class="form-control" id="instagram" name="instagram" type="text" placeholder="คัดลอก URL Instagram มาวาง">
                            <label for="line">URL Line (ไม่บังคับ)</label>
                            <input value="<?php echo $rowStore['line_link']; ?>" class="form-control" id="line" name="line" type="text" placeholder="คัดลอก URL Line มาวาง">
                            <label for="add">ที่อยู่ร้าน</label>
                            <textarea class="form-control" name="add" id="add" placeholder="ที่อยู่ร้าน"><?php echo $rowStore['address_store']; ?></textarea>
                            <label for="embed">ฝังแผนที่</label>
                            <input type="text" class="form-control lat" name="latitude" id="lat" placeholder="Latitude" required value="<?php echo $rowStore['latitude'] ?>">
                            <input type="text" class="form-control lnt" name="longitude" id="lnt" placeholder="Longitude" required value="<?php echo $rowStore['longitude'] ?>">
                            <button type="button" class="form-control btn-latlnt" onclick="getLocation()"><i class='fas fa-map-marker-alt'></i> ใช้ตำแหน่งปัจจุบัน</button>


                        <?php } ?>
                    </div>
                    <div class="modal-btn-pd">
                        <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-add-cat">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>