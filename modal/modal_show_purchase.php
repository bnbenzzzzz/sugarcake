<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!--Modal โชว์ออเดอร์ที่สั่งเข้ามา -->
<div class="modal fade ee" id="showpc<?php echo $purchase_id  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header title-modal">
                <?php
                $total = 0;
                // $purchase_id = $row3['purchase_id'];
                $sql2 = "SELECT * FROM purchaseorder INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                                            INNER JOIN product ON orderdetail.pd_id=product.pd_id WHERE purchaseorder.purchase_id=$purchase_id ";

                $result2 = mysqli_query($conn, $sql2);
                $num = 1;
                ?>
                <h3>รายละเอียดการสั่งซื้อ</h3>
                <button type="button" class="close" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i></button>
            </div>

            <div class="modal-body">

                <div class="row row-big">
                    <div class="col-8 ">
                        <div class="list_pd">

                            <table class="table-product">

                                <tr class="modal-tr">
                                    <!-- <th>ชิ้นที่</th> -->
                                    <th class="th1 th-radius1">สินค้า</th>
                                    <th class="th1">ราคาต่อชิ้น (บาท)</th>
                                    <th class="th1">จำนวน (ชิ้น)</th>
                                    <th class="th1 th-radius2">ราคา (บาท)</th>
                                </tr>
                                <?php
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    $total = $row2['pd_price'] * $row2['qty'];
                                ?>
                                    <tr>
                                        <td class="td0"><?php echo $row2['pd_name']; ?></td>
                                        <td class="td1"><?php echo $row2['pd_price'] ?></td>
                                        <td class="td1"><?php echo $row2['qty']; ?></td>
                                        <td class="td1"><?php echo $total ?></td>
                                    </tr>
                                    <?php $num++ ?>
                                <?php } ?>
                                <?php
                                $total1 = 0;
                                $sqlSet = "SELECT * FROM purchaseorder 
                                        INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                                        INNER JOIN setbox ON orderdetail.set_id=setbox.set_id WHERE purchaseorder.purchase_id=$purchase_id ";

                                $resultSet = mysqli_query($conn, $sqlSet);
                                $num = 1;
                                while ($rowSet = mysqli_fetch_array($resultSet)) {
                                    $totalSet = $rowSet['set_price'] * $rowSet['qty'];
                                ?>

                                    <tr>
                                        <td class="td0"> <?php echo $rowSet['set_name']; ?></td>
                                        <td class="td1"><?php echo $rowSet['set_price'] ?></td>
                                        <td class="td1"><?php echo $rowSet['qty']; ?></td>
                                        <td class="td1"><?php echo $totalSet ?></td>
                                    </tr>
                                    <?php $num++ ?>
                                <?php } ?>
                            </table>
                        </div>
                        <div>
                            <div class="row detail">
                                <!-- <div class="col-3 type_deli">
                                            <?php
                                            $purchase_id = $row3['purchase_id'];
                                            $type_deli = mysqli_query($conn, "select * FROM purchaseorder WHERE purchaseorder.purchase_id=$purchase_id ");
                                            $row_deli = mysqli_fetch_array($type_deli);
                                            $username = $row_deli['user_username'];
                                            $rowAddress = $row_deli['address_id'];
                                            if ($row_deli['deliver_type'] == 'take') {
                                                echo "<h3> รับสินค้าเอง</h3>";
                                            } elseif ($row_deli['deliver_type'] == 'delivery') {
                                                echo "<h3>ทางร้านจัดส่ง</h3>";
                                            } else {
                                                echo "อื่นๆ";
                                            }
                                            ?>
                                        </div> -->
                                <div class=" address">
                                    <?php if ($row_deli['deliver_type'] == 'take') { ?>
                                        <p class="address1">(รับเอง) ลูกค้าจะเข้ารับสินค้าในวันที่ </p>
                                        <p class="address2"> <?php $date_pick = $row_deli['date_pickup'];
                                                                echo date('d/m/Y', strtotime($date_pick));
                                                                $time_pick = $row_deli['time_pickup'];
                                                                echo date(' (H:i)', strtotime($time_pick));  ?></p>
                                    <?php } else {
                                        $sqlAddress = "SELECT * FROM purchaseorder 
                                           INNER JOIN address_tbl ON address_tbl.address_id = purchaseorder.address_id
                                           INNER JOIN user ON address_tbl.user_username = user.user_username   WHERE user.user_username = '$username' AND purchaseorder.address_id = '$rowAddress' LIMIT 1";
                                        $resultAddress = mysqli_query($conn, $sqlAddress);
                                        $rowAddress = mysqli_fetch_array($resultAddress);
                                        $queryProvince = "SELECT * FROM provinces ";
                                        $resultProvince = mysqli_query($conn, $queryProvince);
                                        $queryAmphures = "SELECT * FROM amphures ";
                                        $resultAmphures = mysqli_query($conn, $queryAmphures);
                                        $queryDistricts = "SELECT * FROM districts ";
                                        $resultDistricts = mysqli_query($conn, $queryDistricts);
                                    ?>
                                        <p class="address1">(จัดส่ง) ที่อยู่จัดส่ง : </p>
                                        <p class="address2">
                                            <?php echo $rowAddress["user_fname"] . " " . $rowAddress["user_lname"] . " " . $rowAddress["user_tel"] . " " . $rowAddress["address_descript"]
                                                . " " ?>
                                            <?php while ($rowDistricts = mysqli_fetch_assoc($resultDistricts)) {
                                                if ($rowAddress['sub_district'] == $rowDistricts['id']) {
                                                    echo "ต." . $rowDistricts["name_th"];
                                                }
                                            } ?>
                                            <?php while ($rowAmphures = mysqli_fetch_assoc($resultAmphures)) {
                                                if ($rowAddress['district'] == $rowAmphures['id']) {
                                                    echo " อ." . $rowAmphures["name_th"];
                                                }
                                            } ?><?php while ($rowProvinces = mysqli_fetch_assoc($resultProvince)) {
                                                    if ($rowAddress['province'] == $rowProvinces['id']) {
                                                        echo " จ." . $rowProvinces["name_th"] . " " . $rowAddress["postcode"];
                                                    }
                                                } ?>
                                        </p>
                                    <?php } ?>




                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 slip">

                        <?php
                        $total = 0;
                        $del = mysqli_query($conn, "select * FROM purchaseorder WHERE purchaseorder.purchase_id=$purchase_id ");
                        $row = mysqli_fetch_array($del);
                        ?>
                        <p onclick="document.getElementById('img-slip2').style.transform = 'none'" class="td-title"></p>
                        <p><img onclick="document.getElementById('img-slip2').style.transform = 'scale(3)'" id="img-slip2" class="img-slip" width="200" height="280" src="<?php echo $row['payment_state'] ?>" alt=""></p>

                        <table class="table-detail">
                            <tr>
                                <td class="td-title">ยอดที่ลูกค้าโอนเข้ามา</td>
                                <td class="td-title1 money_cus"><?php if ($row['payment_status'] == '1') {
                                                                    echo $row['purchase_price'] * 1;
                                                                } elseif ($row['payment_status'] == '2') {
                                                                    echo $row['purchase_price'] / 2;
                                                                } else {
                                                                    echo "อื่นๆ";
                                                                } ?> ฿</td>
                            </tr>
                            <tr>
                                <td class="td-title">ราคารวมสินค้า</td>
                                <td class="td-title1"><?php echo $row['sumprice_pd']; ?> ฿</td>
                            </tr>
                            <tr>
                                <td class="td-title">ค่าจัดส่ง</td>
                                <td class="td-title1"><?php echo $row['shipping']; ?> ฿</td>
                            </tr>
                            <tr>
                                <td class="td-title">ส่วนลด</td>
                                <td class="td-title1"><?php echo $row['discount']; ?> ฿</td>
                            </tr>
                            <tr>
                                <td class="td-title">ชำระวันรับสินค้า</td>
                                <td class="remain"><?php
                                                    if ($row['payment_status'] == '1') {
                                                        echo $row['purchase_price'] * 0;
                                                    } elseif ($row['payment_status'] == '2') {
                                                        echo $row['purchase_price'] / 2;
                                                    } else {
                                                        echo "อื่นๆ";
                                                    }
                                                    ?> ฿</td>
                            </tr>

                        </table>
                        <div class="modal-footer">
                            <!-- <a href="./backed_purchaseSendback.php?purchase_id=<?php echo $purchase_id ?>"><button class="btn-cancel">แจ้งกลับลูกค้า</button></a> -->
                            <a href="./connect/con_edit_purchase_status.php?purchase_id=<?php echo $purchase_id ?>&&pi=<?php $user_username ?>"><button data-toggle="modal" data-target="#success" class="btn-accept">เสร็จสิ้น</button></a>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>


</div>
</div>
</div>


<!-- ตอบกลับหน้า purchaseorder-->
<div class="modal fade bbank" id="sendback<?php echo $purchase_id  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content box-add">
            <div class="modal-header title-modal">

                <h3>แจ้งกลับออเดอร์</h3>
                <button type="button" class="close" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i></button>
            </div>
            <div class="col-input">
                <form action="./connect/con_add_sendback2.php?pi=<?php echo $purchase_id ?>" method="POST" enctype="multipart/form-data">
                    <div class="row-big-input">
                        <div class="input-insert">
                            <label for="logo_img">รูปภาพประกอบการตอบกลับ (ไม่บังคับ)</label>
                            <input type="file" width="2px" class="form-control" id="logo_img" name="pic_index1" accept="image/*" onchange="loadFile1(event)">
                            <label for="embed">กรอกข้อความตอบกลับ</label>
                            <textarea class="form-control" name="embed" id="embed" rows="5" placeholder="กรอกข้อความ"></textarea>
                        </div>
                        <div class="modal-btn-pd">
                            <button type="reset" class="btn btn-can" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-add-cat">ตอบกลับ</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- แจ้งเลขแทรค-->
<div class="modal fade bbank" id="sendtrack<?php echo $purchase_id  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content box-add">
            <div class="modal-header title-modal">


                <h3>แจ้งการจัดส่งคุณ <?php echo $row3['user_fname'] ?></h3>
                <button type="button" class="close" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i></button>
            </div>
            <div class="print">
                <a class="print-a" href="./backed_shippingaddress.php"><i class="bi bi-printer-fill"></i> พิมพ์ที่อยู่จัดส่ง</a>
            </div>

            <div class="col-input">

                <form action="./connect/con_add_track.php?pi=<?php echo $purchase_id ?>" method="POST" enctype="multipart/form-data">
                    <div class="row-big-input">

                        <div class="input-insert">
                            <label for="shipping">เลือกบริษัทขนส่ง</label>
                            <select id="shipping" class="form-control" name="shipping" required>
                                <option hidden value="0" style="color:gray">เลือกบริษัทขนส่ง</option>
                                <option value="ทางร้านจัดส่ง">ทางร้านจัดส่งเอง</option>
                                <?php
                                $sqlShipping = mysqli_query($conn, "SELECT * from shippingcompany ");
                                while ($rowShipping = mysqli_fetch_array($sqlShipping)) {

                                    echo "<option value='" . $rowShipping['company_id'] . "'>" . $rowShipping['company_name'] . "</option>";
                                }
                                ?>
                            </select>

                            <script>
                                $(document).ready(function() {
                                    $('#track_num_label').hide();
                                    $('#track_num').hide();
                                    $("#shipping").change(function() {
                                        var value = $("#shipping option:selected").val();
                                        if (value == "ทางร้านจัดส่ง") {
                                            $('#track_num_label').hide();
                                            $('#track_num').hide();
                                        } else {
                                            $('#track_num_label').show();
                                            $('#track_num').show();
                                        }
                                    });
                                });
                            </script>

                            <label id="track_num_label" for="track_num">กรอกเลขแทรค (หากทางร้านจัดส่งเองไม่ต้องกรอก)</label>
                            <textarea class="form-control track-num" name="track_num" id="track_num" rows="2" placeholder="กรอกเลขแทรค"></textarea>
                        </div>
                        <div class="modal-btn-pd">
                            <button type="reset" class="btn btn-can" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-add-cat">ส่ง</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>