<!-- modal แก้ไขโปรโมชัน  -->
<div class="modal fade de" id="editpro<?php echo $row["promotion_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ct">

            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $delpromotion = mysqli_query($conn, "select * from promotion where promotion_id='" . $row["promotion_id"] . "'");
                $rowgetpromotion = mysqli_fetch_array($delpromotion);

                ?>
                <form enctype="multipart/form-data" action="./connect/con_edit_promotion.php?promotion_id=<?php echo $row["promotion_id"] ?>" method="POST">
                    <div class="container-fluid">
                        <h5 class="text-pro">
                            <?php echo $rowgetpromotion['promotion_name']; ?>
                        </h5>
                        <img class="pro-img" src="<?php echo $rowgetpromotion['promotion_img']; ?>" alt="">
                        <?php if ($rowgetpromotion['promotion_status'] == 0) { ?>
                            <section class="select-close">
                                <h5 class="text-h1"><i class="bi bi-x-circle-fill"></i> ปิดใช้งานอยู่</h5>
                                <div class="open">
                                    <input class="radi-open" type="radio" name="active" value="1" name="open">
                                    <b>เปิดใช้งาน</b>
                                </div>
                               
                            </section>
                        <?php } else { ?>
                            <section class="select-close">
                            <h5 class="text-h2"><i class="bi bi-check-circle-fill"></i> เปิดใช้งานอยู่</h5>
                                <div class="open">
                                    <input class="radi-close" type="radio" name="active" value="0" name="close">
                                    <b>ปิดใช้งาน</b>
                                </div>
                            </section>
                        <?php    } ?>

                    </div>
                    <section class="mix-btn">
                        <p class="btn-dismiss" data-dismiss="modal">ยกเลิก</p>
                        <input class="btn-bun" type="submit" value="บันทึก">
                    </section>
                </form>
            </div>
           
        </div>
    </div>
</div>