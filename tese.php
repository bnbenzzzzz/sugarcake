<!--Modal โชว์ออเดอร์ที่สั่งเข้ามา -->
<div class="modal fade ee" id="showHtr<?php echo $row['purchase_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header title-modal">
                <?php
                $purchase_id  = $row['purchase_id'];
                $query0 = "SELECT * FROM purchaseorder INNER JOIN user ON purchaseorder.user_username=user.user_username 
                                WHERE purchaseorder.purchase_status='สั่งซื้อแล้วรอการอนุมัติ' AND purchaseorder.purchase_id = $purchase_id ORDER BY purchaseorder.purchase_id ";
                $result4 = mysqli_query($conn, $query0); ?>
                <div class="modal-body">

                    <div class="tabledetail">
                        <p class="tp-modal">รายละเอียดคำสั่งซื้อ</p>
                        <div class="row">
                            <div class="col-12 ">
                                <div class="list_pd">

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

                                        <?php
                                        $total = 0;
                                        $purchase_id = $row["purchase_id"];
                                        $sql2 = "SELECT * FROM purchaseorder 
                                            INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                                            INNER JOIN product ON orderdetail.pd_id=product.pd_id WHERE purchaseorder.purchase_id=$purchase_id ";

                                        $result2 = mysqli_query($conn, $sql2);
                                        $num = 1;
                                        while ($row2 = mysqli_fetch_array($result2)) {
                                            $total = $row2['pd_price'] * $row2['qty'];
                                        ?>

                                            <tr>
                                                <td class="td0"> <?php echo $row2['pd_name']; ?></td>
                                                <td class="td1"><?php echo $row2['pd_price'] ?></td>
                                                <td class="td1"><?php echo $row2['qty']; ?></td>
                                                <td class="td1"><?php echo $total ?></td>
                                            </tr>
                                            <?php $num++ ?>
                                        <?php } ?>
                                        <?php
                                        $total1 = 0;
                                        $purchase_id = $row["purchase_id"];
                                        $sql3 = "SELECT * FROM purchaseorder 
                                        INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                                        INNER JOIN setbox ON orderdetail.set_id=setbox.set_id WHERE purchaseorder.purchase_id=$purchase_id ";

                                        $result5 = mysqli_query($conn, $sql3);
                                        $num = 1;
                                        while ($row4 = mysqli_fetch_array($result5)) {
                                            $total1 = $row4['set_price'] * $row4['qty'];
                                        ?>

                                            <tr>
                                                <td class="td0"> <?php echo $row4['set_name']; ?></td>
                                                <td class="td1"><?php echo $row4['set_price'] ?></td>
                                                <td class="td1"><?php echo $row4['qty']; ?></td>
                                                <td class="td1"><?php echo $total1 ?></td>
                                            </tr>
                                            <?php $num++ ?>
                                        <?php } ?>
                                    </table>
                                    <div>


                                    </div>


                                </div>
                                <div class="sumpriceall">
                                    <?php
                                    $del = mysqli_query($conn, "select * FROM purchaseorder WHERE purchaseorder.purchase_id=$purchase_id ");
                                    $row = mysqli_fetch_array($del);

                                    ?>
                                    <table class="table-detail">

                                        <tr>
                                            <td class="td-title">ราคาสินค้า</td>
                                            <td class="td-title1"><?php echo $row['sumprice_pd']; ?>&nbsp฿ </td>
                                        </tr>
                                        <tr>
                                            <td class="td-title">ค่าจัดส่ง</td>
                                            <td class="td-title1"><?php echo $row['shipping']; ?> ฿</td>
                                        </tr>
                                        <tr>
                                            <td class="td-title">ส่วนลด</td>
                                            <td class="td-title1" style="color: #FF5151;">- <?php echo $row['discount']; ?> ฿</td>
                                        </tr>
                                        <tr>
                                            <td class="td-title">ราคาสุทธิ</td>
                                            <td class="remain"><?php echo $row['purchase_price']; ?> ฿</td>
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


<!--Modal ออเดอร์ผิดพลาด -->
<div class="modal fade " id="showerror<?php echo $row['purchase_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content mistake">
            <div class="modal-header title-modal">

                <h4>ออเดอร์ผิดพลาด</h4>

                <button type="button" class="close" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i></button>
            </div>
            <div class="modal-body mistake-body">


                <div class="tabledetail">


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
                        $sql2 = "SELECT * FROM purchaseorder 
                                            INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                                            INNER JOIN product ON orderdetail.pd_id=product.pd_id WHERE purchaseorder.purchase_id=$purchase_id ";

                        $result2 = mysqli_query($conn, $sql2);
                        $num = 1;
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $total = $row2['pd_price'] * $row2['qty'];
                        ?>

                            <tr>
                                <td class="td0"> <?php echo $row2['pd_name']; ?></td>
                                <td class="td1"><?php echo $row2['pd_price'] ?></td>
                                <td class="td1"><?php echo $row2['qty']; ?></td>
                                <td class="td1"><?php echo $total ?></td>
                            </tr>
                            <?php $num++ ?>
                        <?php } ?>
                        <?php
                        $total1 = 0;
                        $purchase_id = $row["purchase_id"];
                        $sql3 = "SELECT * FROM purchaseorder 
                                        INNER JOIN orderdetail ON purchaseorder.purchase_id=orderdetail.purchase_id 
                                        INNER JOIN setbox ON orderdetail.set_id=setbox.set_id WHERE purchaseorder.purchase_id=$purchase_id ";

                        $result5 = mysqli_query($conn, $sql3);
                        $num = 1;
                        while ($row4 = mysqli_fetch_array($result5)) {
                            $total1 = $row4['set_price'] * $row4['qty'];
                        ?>

                            <tr>
                                <td class="td0"> <?php echo $row4['set_name']; ?></td>
                                <td class="td1"><?php echo $row4['set_price'] ?></td>
                                <td class="td1"><?php echo $row4['qty']; ?></td>
                                <td class="td1"><?php echo $total1 ?></td>
                            </tr>
                            <?php $num++ ?>
                        <?php } ?>
                    </table>
                </div>

                <?php
                $del = mysqli_query($conn, "select * FROM purchaseorder WHERE purchaseorder.purchase_id=$purchase_id ");
                $row = mysqli_fetch_array($del);

                ?>
                <section class="sumprice">
                    <p class="p-first">ราคารวมบิล</p>
                    <p class="p-last"><?php echo $row['purchase_price']; ?> บาท</p>
                </section>
                <section class="section-form">
                    <form action="./connect/con_add_error.php?purchase_id=<?php echo $row['purchase_id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="row-big">
                            <label for="descript">อธิบายข้อผิดพลาด</label>
                            <textarea class="form-error" name="descript" id="descript" placeholder="อธิบายข้อผิดพลาด" required></textarea>
                            <label for="price_dis">ส่วนลด</label>
                            <input class="form-error" id="price_dis" name="price_dis" min="0" max="<?php echo $row['purchase_price']; ?>" type="number" placeholder="ราคาส่วนลด" required>
                            <label for="pass">รหัสเจ้าของร้าน</label>
                            <input class="form-error" id="pass" name="pass" type="password" placeholder="กรอกรหัสเจ้าของร้าน" required>

                        </div>
                        <div class="modal-btn-pd">
                            <button type="reset" class="btn btn-cancel" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-add-cat">บันทึก</button>
                        </div>
                    </form>

                </section>


            </div>
        </div>
    </div>
</div>
