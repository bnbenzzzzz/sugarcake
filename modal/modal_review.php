<div class="modal fade de" id="dereview<?php echo $rowRate['review_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-review">

            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $del = mysqli_query($conn, "select * from review 
                JOIN purchaseorder ON review.purchase_id = purchaseorder.purchase_id  
                where review.review_id='" . $rowRate['review_id'] . "'");
                $fetch = mysqli_fetch_array($del);

                ?>
                <div class="container-fluid">
                    <h1 class="de-name-pd">ต้องการลบรีวิวจาก</h1>
                    <h1 class="de-name-name"><?php echo $fetch['user_username'] ?></h1>
                    <h1 class="de-name-pd">ใช่หรือไม่</h1>
                </div>
                <div class="modal-btn-pd">
                    <a href="#" data-dismiss="modal" class="btn-delete-can">ยกเลิก</a>
                    <a href="./connect/con_delete_review.php?review_id=<?php echo $rowRate['review_id'] ?>" class="btn-delete-pd">ลบ</a>
                </div>
            </div>

        </div>
    </div>
</div>