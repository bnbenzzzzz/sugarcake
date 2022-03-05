<!--Modal โชว์ออเดอร์ที่สั่งเข้ามา -->
<div class="modal fade ee" id="showCancel<?php echo $row['purchase_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header title-modal">
                <h3 class="tp-modal">รายละเอียดคำสั่งซื้อ</h3>
                <button type="button" class="close" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="tabledetail">
                        <div class="row">
                            <div class="col-8 ">
                                <div class="list_pd">
                                    <?php
                                    $purchase_id  = $row['purchase_id'];
                                    $query0 = "SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username 
                                WHERE purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' AND purchaseorder.purchase_id = $purchase_id ORDER BY purchaseorder.purchase_id ";
                                    $result4 = mysqli_query($conn, $query0); ?>

                                    <table class="table-product">
                                        <tr class="modal-tr">
                                            <!-- <th>ชิ้นที่</th> -->
                                            <th class="th1">สินค้า</th>
                                            <th class="th1">ราคาต่อชิ้น (บาท)</th>
                                            <th class="th1">จำนวน (ชิ้น)</th>
                                            <th class="th1">ราคา (บาท)</th>
                                        </tr>
                                        
                                            <?php
                                            $total = 0;
                                            $purchase_id = $row["purchase_id"];
                                            $sql2 = "SELECT * FROM purchaseorder INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                                            INNER JOIN product ON orderdetail.pd_id=product.pd_id WHERE purchaseorder.purchase_id=$purchase_id ";

                                            $result2 = mysqli_query($conn, $sql2);
                                            $num = 1;
                                            while ($row2 = mysqli_fetch_array($result2)) {
                                                $total += $row2['pd_price'] * $row2['qty'];
                                            ?>
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
                                                <p class="address2"> <?php $date_pick = $row['date_pickup'];
                                                                        echo date('d/m/Y', strtotime($date_pick));
                                                                        $time_pick = $row['time_pickup'];
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

                                <table class="table-detail">


                                    <tr>
                                        <td class="td-title">ค่าจัดส่ง</td>
                                        <td class="td-title1">
                                            <?php
                                            if ($row['deliver_type'] == 'take') {
                                                echo $row['purchase_price'] * 0;
                                            } elseif ($row['deliver_type'] == 'delivery') {
                                                echo "50";
                                            } else {
                                                echo "อื่นๆ";
                                            }
                                            ?>&nbsp;฿ </td>
                                    </tr>
                                    <tr>
                                        <td class="td-title">ส่วนลด</td>
                                        <td class="td-title1">- <?php echo $row['discount']; ?>&nbsp;฿ </td>
                                    </tr>
                                    <tr>
                                        <td class="td-title">ราคารวมสุทธิ</td>
                                        <td class="td-title1"><?php echo $row['purchase_price']; ?>&nbsp;฿ </td>
                                    </tr>

                                </table>

                                <div class="modal-footer">

                                    <?php

                                    $del1 = mysqli_query($conn, "select * FROM purchaseorder WHERE purchaseorder.purchase_id=$purchase_id ");
                                    $row1 = mysqli_fetch_array($del1);
                                    ?>

                                    <table class="table-detail">
                                        <tr>
                                            <td class="type_delivery"><?php
                                                                        if ($row['track_id'] == '') {
                                                                            echo "";
                                                                        } elseif ($row['track_id'] != '') {
                                                                            echo "หมายเลขแทร็ค" . $row['track_id'];
                                                                        } else {
                                                                            echo "อื่นๆ";
                                                                        }
                                                                        ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>