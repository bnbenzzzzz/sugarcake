<link rel="stylesheet" href="css/backed_view_order.css">

<!--Modal โชว์ออเดอร์ที่สั่งเข้ามา -->
<div class="modal fade ee" id="vieword<?php echo $row['purchase_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

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
                                    <h3 class="tp-modal">รายละเอียดการสั่งซื้อ</h3>

                                    <h5>วันที่สั่งซื้อ : <?php $created_at = $row['created_at'];

                                                            echo date('d/m/Y', strtotime($created_at)); ?></h5>
                                    <table class="table-product">
                                        <tr class="modal-tr">
                                            <!-- <th>ชิ้นที่</th> -->
                                            <th class="th1">สินค้า</th>
                                            <th class="th1">ราคาต่อชิ้น (บาท)</th>
                                            <th class="th1">จำนวน (ชิ้น)</th>
                                            <th class="th1">ราคา (บาท)</th>
                                        </tr>
                                        <tr>
                                            <?php
                                            $total = 0;
                                            $purchase_id = $row["purchase_id"];
                                            $sql2 = "SELECT * FROM purchaseorder INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                                            INNER JOIN product ON orderdetail.pd_id=product.pd_id WHERE purchaseorder.purchase_id=$purchase_id ";

                                            $result2 = mysqli_query($conn, $sql2,);
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
                                        <div class="col-3 type_deli">
                                            <?php
                                            $purchase_id = $row["purchase_id"];
                                            $type_deli = mysqli_query($conn, "select * FROM purchaseorder WHERE purchaseorder.purchase_id=$purchase_id ");
                                            $row_deli = mysqli_fetch_array($type_deli);
                                            if ($row_deli['deliver_type'] == 'take') {
                                                echo "<h3> รับสินค้าเอง</h3>";
                                            } elseif ($row_deli['deliver_type'] == 'delivery') {
                                                echo "<h3>ทางร้านจัดส่ง</h3>";
                                            } else {
                                                echo "อื่นๆ";
                                            }
                                            ?>
                                        </div>
                                        <div class="col-8 address">
                                            <p class="address1">ที่อยู่จัดส่ง : </p>
                                            <?php
                                            $address = mysqli_query($conn, "select * FROM purchaseorder JOIN user ON purchaseorder.user_username=user.user_username WHERE purchaseorder.purchase_id=$purchase_id ");
                                            $row2 = mysqli_fetch_array($address);
                                            ?>
                                            <p class="address_cus"><?php echo $row2['user_address']; ?></p>
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
                                        <td class="money_cus">฿&nbsp
                                            <?php echo $row['purchase_price']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-title">ราคารวมสุทธิ</td>
                                        <td class="td-title1">฿&nbsp<?php echo $row['purchase_price']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td class="td-title">ค่าจัดส่ง</td>
                                        <td class="td-title1">฿
                                            <?php
                                            if ($row['deliver_type'] == 'take') {
                                                echo $row['purchase_price'] * 0;
                                            } elseif ($row['deliver_type'] == 'delivery') {
                                                echo "50";
                                            } else {
                                                echo "อื่นๆ";
                                            }
                                            ?> </td>
                                    </tr>
                                    <tr>
                                        <td class="td-title">ส่วนลด</td>
                                        <td class="td-title1">฿ 0 </td>
                                    </tr>
                                    <tr>
                                        <td class="td-title">ยอดที่ต้องชำระ</td>
                                        <td class="remain">฿&nbsp<?php
                                                                    if ($row['payment_status'] == '1') {
                                                                        echo $row['purchase_price'] / 2;
                                                                    } elseif ($row['payment_status'] == '2') {
                                                                        echo $row['purchase_price'] * 0;
                                                                    } else {
                                                                        echo "อื่นๆ";
                                                                    }
                                                                    ?> </td>
                                    </tr>



                                </table>
                                <div class="modal-footer">

                                    <?php

                                    $del1 = mysqli_query($conn, "select * FROM purchaseorder WHERE purchaseorder.purchase_id=$purchase_id ");
                                    $row1 = mysqli_fetch_array($del1);
                                    ?>

                                    <table class="table-detail">
                                        <tr>
                                            <td class="type_delivery">&nbsp<?php
                                                                            if ($row['track_id'] == '') {
                                                                                echo "";
                                                                            } elseif ($row['track_id'] != '') {
                                                                                echo "หมายเลขแทร็ค" . $row['track_id'];
                                                                            } else {
                                                                                echo "อื่นๆ";
                                                                            }
                                                                            ?> </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <?php /* } */


                ?>
            </div>


        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#imageContainer img').each(function(index) {
            if ($(this).attr('onclick') != null) {
                if ($(this).attr('onclick').indexOf("runThis()") == -1) {
                    $(this).click(function() {
                        $(this).attr('onclick');
                        var src = $(this).attr("src");
                        ShowLargeImage(src);
                    });
                }
            } else {
                $(this).click(function() {
                    var src = $(this).attr("src");
                    ShowLargeImage(src);
                });
            }
        });
    });

    function ShowLargeImage(imagePath) {
        alert(imagePath.replace("small", "large"));
    }
</script>
