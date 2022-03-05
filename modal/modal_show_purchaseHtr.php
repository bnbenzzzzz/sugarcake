<!-- รายละเอียดออเดอร์  -->

<div class="modal fade bd-example-modal-xl modal-detail" id="show<?php echo  $row3["purchase_id"]; ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-modal" action="#">
                    <h4 class="text-modal md-text-title" style="font-family: 'Prompt', sans-serif !important;">รายละเอียดออเดอร์</h4>
                    <table class="md-table">
                        <tr>
                            <th></th>
                            <th>สินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                        </tr>
                        <?php
                        $pi =  $row3["purchase_id"];
                        $total = 0;
                        $query10 = "SELECT * FROM orderdetail 
                                    JOIN product ON orderdetail.pd_id = product.pd_id
                                    WHERE purchase_id = $pi ";
                        $result10 = mysqli_query($conn, $query10);
                        $querySet = "SELECT * FROM orderdetail 
                                    JOIN setbox ON orderdetail.set_id = setbox.set_id
                                    WHERE purchase_id = $pi ";
                        $resultSet = mysqli_query($conn, $querySet);

                        while ($row10 = mysqli_fetch_array($result10)) {
                            $total += $row10['pd_price'] * $row10['qty'];
                            $IMG = $row10['pd_id'];
                        ?>
                            <tr>
                                <?php
                                $queryIMG = "SELECT * FROM product_image WHERE pd_id = '$IMG' LIMIT 1 ";
                                $resultIMG = mysqli_query($conn, $queryIMG);
                                while ($rowIMG = mysqli_fetch_array($resultIMG)) { ?>
                                    <td><img class="img-all-cart" src="<?php echo $rowIMG['img_url'] ?>" width="70" height="70" alt=""></td>
                                <?php } ?>
                                <td><?php echo $row10['pd_name']; ?></td>
                                <td><?php echo $row10['qty']; ?></td>
                                <td><?php echo number_format($total); ?></td>
                            </tr>
                        <?php $total = 0;
                        }

                        while ($rowSet = mysqli_fetch_array($resultSet)) {
                            $total += $rowSet['set_price'] * $rowSet['qty'];
                        ?>
                            <tr>

                                <td><img class="img-all-cart" src="<?php echo $rowSet['set_img'] ?>" width="70" height="70" alt=""></td>
                                <td><?php echo $rowSet['set_name']; ?></td>
                                <td><?php echo $rowSet['qty']; ?></td>
                                <td><?php echo $total; ?></td>
                            </tr>
                        <?php $total = 0;
                        }
                        ?>

                    </table>

                </form>
                <button type="button" class="btn btn-yl" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
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