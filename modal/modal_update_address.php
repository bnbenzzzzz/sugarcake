<link rel="stylesheet" href="css/checkout_update_address.css">

<!-- Add address -->
<div class="modal fade ad" id="addaddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header" >
                <h4 class="modal-title" id="myModalLabel">แก้ไขที่อยู่</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>              
            <div class="col ">
                <form action="./connect/con_add_address.php" method="POST" enctype="multipart/form-data">
                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <label style=" float:right">ชื่อ :</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control update1" type="text" placeholder="" name="user_fname" maxlength="20" required>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <label style=" float:right">นามสกุล :</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control update2" type="text" placeholder="" name="user_lname" maxlength="20" required>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <label style=" float:right">ที่อยู่ :</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control update3" type="text" placeholder="" name="user_address" maxlength="70" required>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <label style="float:right">เบอร์โทรศัพท์:</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control update4" type="text" placeholder="" name="user_tel" maxlength="10" required>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row" style="margin-top: 10px;margin-bottom: 20px;">
                        <div class="col-lg-12">
                            <br>

                            <button type="submit" id="submit" class="btn btn-primary">บันทึก</button>
                            <button type="reset" id="reset" class="btn btn-light">รีเซ็ต</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>