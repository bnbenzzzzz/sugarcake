<!--Modal โชว์ออเดอร์ที่สั่งเข้ามา -->
<div class="modal fade ee" id="showpc_a<?php echo $row3['purchase_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header title-modal">
                <?php
                $total = 0;
                $purchase_id = $row3['purchase_id'];
                $sql2 = "SELECT * FROM purchaseorder INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                                            INNER JOIN product ON orderdetail.pd_id=product.pd_id WHERE purchaseorder.purchase_id=$purchase_id ";

                $result2 = mysqli_query($conn, $sql2);
                $num = 1;
                while ($row2 = mysqli_fetch_array($result2)) {
                    $total = $row2['pd_price'] * $row2['qty'];
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
                                <tr>
                                    <td class="td0"><?php echo $row2['pd_name']; ?></td>
                                    <td class="td1"><?php echo $row2['pd_price'] ?></td>
                                    <td class="td1"><?php echo $row2['qty']; ?></td>
                                    <td class="td1"><?php echo $total ?></td>
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
                                        <p class="address2"> <?php $date_pick = $row3['date_pickup'];
                                                                echo date('d/m/Y', strtotime($date_pick));
                                                                $time_pick = $row3['time_pickup'];
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
                                <td class="td-title1 money_cus"><?php if ($row3['payment_status'] == '1') {
                                                                    echo $row3['purchase_price'] * 1;
                                                                } elseif ($row3['payment_status'] == '2') {
                                                                    echo $row3['purchase_price'] / 2;
                                                                } else {
                                                                    echo "อื่นๆ";
                                                                } ?> ฿</td>
                            </tr>
                            <tr>
                                <td class="td-title">ราคารวมสินค้า</td>
                                <td class="td-title1"><?php echo $row3['sumprice_pd']; ?> ฿</td>
                            </tr>
                            <tr>
                                <td class="td-title">ค่าจัดส่ง</td>
                                <td class="td-title1"><?php echo $row3['shipping']; ?> ฿</td>
                            </tr>
                            <tr>
                                <td class="td-title">ส่วนลด</td>
                                <td class="td-title1"><?php echo $row3['discount']; ?>฿</td>
                            </tr>
                            <tr>
                                <td class="td-title">ชำระวันรับสินค้า</td>
                                <td class="remain"><?php
                                                    if ($row3['payment_status'] == '1') {
                                                        echo $row3['purchase_price'] * 0;
                                                    } elseif ($row3['payment_status'] == '2') {
                                                        echo $row3['purchase_price'] / 2;
                                                    } else {
                                                        echo "อื่นๆ";
                                                    }
                                                    ?> ฿</td>
                            </tr>

                        </table>
                        <div class="modal-footer">
                            <!-- <a href="./backed_purchaseSendback.php?purchase_id=<?php echo $purchase_id ?>"><button class="btn-cancel">แจ้งกลับลูกค้า</button></a> -->
                            <a href="./connect/con_edit_purchase_status.php?purchase_id=<?php echo $purchase_id ?>"><button data-toggle="modal" data-target="#success" class="btn-accept">เสร็จสิ้น</button></a>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>


</div>
</div>
</div>
