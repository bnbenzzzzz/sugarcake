<!-- รายละเอียดออเดอร์  -->

<div class="modal fade bd-example-modal-xl modal-detail" id="show<?php echo $pi ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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