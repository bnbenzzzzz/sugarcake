

<!-- รายละเอียดออเดอร์  -->

<div class="modal fade bd-example-modal-xl modal-detail" id="show<?php echo $row['purchase_id']; ?>" style="width: 40%;margin-left:30%;margin-top:10em;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#">
                    <h4 class="text-modal md-text-title" style="font-family: 'Prompt', sans-serif !important;">รายละเอียดออเดอร์</h4>
                    <table class="md-table">
                        <tr>
                            <th></th>
                            <th>สินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                        </tr>
                        <?php
                        $purchase_id = $row["purchase_id"];
                        $total = 0;
                        $query1 = "SELECT * FROM orderdetail 
                                    JOIN product ON orderdetail.pd_id = product.pd_id
                                    WHERE purchase_id = $purchase_id ";
                        $result1 = mysqli_query($conn, $query1);
                        $querySet = "SELECT * FROM orderdetail 
                                    JOIN setbox ON orderdetail.set_id = setbox.set_id
                                    WHERE purchase_id = $purchase_id ";
                        $resultSet = mysqli_query($conn, $querySet);

                        while ($row1 = mysqli_fetch_array($result1)) {
                            $total += $row1['pd_price'] * $row1['qty'];
                            $IMG = $row1['pd_id'];
                        ?>
                            <tr>
                                <?php
                                $queryIMG = "SELECT * FROM product_image WHERE pd_id = '$IMG' LIMIT 1 ";
                                $resultIMG = mysqli_query($conn, $queryIMG);
                                while ($rowIMG = mysqli_fetch_array($resultIMG)) { ?>
                                    <td><img class="img-all-cart" src="<?php echo $rowIMG['img_url'] ?>" width="70" height="70" alt=""></td>
                                <?php } ?>
                                <td><?php echo $row1['pd_name']; ?></td>
                                <td><?php echo $row1['qty']; ?></td>
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


<!-- รายละเอียดแจ้งกลับออเดอร์  -->
<div class="modal fade bd-example-modal-xl modal-sendback" id="paypay<?php echo $row['purchase_id']; ?>" style="width: 40%;margin-left:30%;margin-top:10em;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="./connect/con_notpaid_cus.php?purchase_id=<?php echo $row["purchase_id"] ?>">
                    <h4 class="text-modal modal-title md-text-title" style="font-family: 'Prompt', sans-serif !important;">ชำระเงิน</h4>

                    <?php
                    ?>
                    <div class="sendback">
                        <p>
                        <?php echo $rowBank['bank_name'] ?> <br> หมายเลข <?php echo $rowBank['bank_no'] ?> <br>
                            ชื่อบัญชี <?php echo $rowBank['bank_cus'] ?>

                        <p style="color: green;">ที่ต้องชำระ <?php echo number_format($row['purchase_price'])  ?> บาท</p>
                        </p>
                    </div>
                    <div class="sendback2">
                        <label for="descript_back">แนบไฟล์</label>
                        <input id="file_indexback" name="file_indexback" class="form-control" type="file">
                    </div>
                    <div class="sendback-btn">
                        <a href="#"><button class="btn-cancel" data-dismiss="modal">ยกเลิก</button></a>
                        <a href="#"><button class="btn-accept">ตกลง</button></a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


