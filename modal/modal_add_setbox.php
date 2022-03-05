<link rel="stylesheet" href="css/backed_set.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<div class="modal fade ad" id="addsetbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <?php
    include('./connect/connectdb.php');
    ?>
    <div class="modal-dialog">
        <div class="modal-content momo">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">เพิ่มชุดสินค้า</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col ">
                <form action="./connect/con_add_setbox.php" method="POST" enctype="multipart/form-data">

                    <div class="row mt-3">
                        <div class="col-lg-3"> <label id="set_name" style=" float:right">ชื่อชุดสินค้า :</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control regis" type="text" name="set_name" id="set_name" required>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-5">
                            <label style=" float:right">จำนวนสินค้าภายในชุด :</label>
                        </div>
                        <div class="col-lg-3">
                            <select name="group1" id="group1">
                                <option value=" ">เลือกจำนวนชิ้น</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>

                            <script>
                                $(document).ready(function() {
                                    $('#select1').hide();
                                    $('#select2').hide();
                                    $('#select3').hide();
                                    $('#select4').hide();
                                    $('#list1').hide();
                                    $('#list2').hide();
                                    $('#list3').hide();
                                    $('#list4').hide();
                                    $('#list5').hide();
                                    $('#list6').hide();
                                    $('#list7').hide();
                                    $('#list8').hide();
                                    $('#text_img').hide();
                                    $('#set_img').hide();
                                    $('#price').hide();
                                    $('#sumprice').hide();
                                    $('#bath').hide();
                                    $("#group1").change(function() {
                                        var value = $("#group1 option:selected").val();
                                        if (value == "2") {
                                            $('#select1').show();
                                            $('#select2').show();
                                            $('#list1').show();
                                            $('#list2').show();
                                            $('#list3').show();
                                            $('#list4').show();
                                            $('#select3').hide();
                                            $('#select4').hide();
                                            $('#list5').hide();
                                            $('#list6').hide();
                                            $('#list7').hide();
                                            $('#list8').hide();
                                            $('#text_img').show();
                                            $('#set_img').show();
                                            $('#price').show();
                                            $('#sumprice').show();
                                            $('#bath').show();
                                        } else if (value == "3") {
                                            $('#select1').show();
                                            $('#select2').show();
                                            $('#select3').show();
                                            $('#select4').hide();
                                            $('#list1').show();
                                            $('#list2').show();
                                            $('#list3').show();
                                            $('#list4').show();
                                            $('#list5').show();
                                            $('#list6').show();
                                            $('#list7').hide();
                                            $('#list8').hide();
                                            $('#text_img').show();
                                            $('#set_img').show();
                                            $('#price').show();
                                            $('#sumprice').show();
                                            $('#bath').show();
                                        } else if (value == "4") {
                                            $('#select1').show();
                                            $('#select2').show();
                                            $('#select3').show();
                                            $('#select4').show();
                                            $('#list1').show();
                                            $('#list2').show();
                                            $('#list3').show();
                                            $('#list4').show();
                                            $('#list5').show();
                                            $('#list6').show();
                                            $('#list7').show();
                                            $('#list8').show();
                                            $('#text_img').show();
                                            $('#set_img').show();
                                            $('#price').show();
                                            $('#sumprice').show();
                                            $('#bath').show();
                                        } else {
                                            $('#select1').hide();
                                            $('#select2').hide();
                                            $('#select3').hide();
                                            $('#select4').hide();
                                            $('#list1').hide();
                                            $('#list2').hide();
                                            $('#list3').hide();
                                            $('#list4').hide();
                                            $('#list5').hide();
                                            $('#list6').hide();
                                            $('#list7').hide();
                                            $('#list8').hide();
                                            $('#text_img').hide();
                                            $('#set_img').hide();
                                            $('#price').hide();
                                            $('#sumprice').hide();
                                            $('#bath').hide();
                                        }
                                    });
                                });
                            </script>

                        </div>
                        <div class="col-lg-4"> <label style="float:left"> ชิ้น</label></div>
                    </div>



                    <div class="row mt-3">
                        <div class="col-lg-4"> <label id="text_img" style=" float:right">รูปภาพชุดสินค้า :</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="file" class="form-control regis" name="set_img" id="set_img" accept="image/*" onchange="loadFile1(event)">
                        </div>

                        <div class="col-lg-1"></div>
                    </div>




                    <div class="row mt-3">
                        <div class="col-lg-3"><label id="select1" style=" float:right">ชิ้นที่ 1 :</label> </div>
                        <div class="col-lg-8">
                            <select name="list1" id="list1" onchange="myFunction()">
                                <option value=" ">เลือกหมวดหมู่สินค้า</option>
                                <?php
                                $query = "SELECT * FROM category  ";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <option value=" <?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                <?php } ?>
                            </select>

                            <select name="list2" id="list2" onchange="myFunction()">
                                <option value=" ">สินค้า</option>
                                <?php
                                $query1 = "SELECT * FROM product  ";
                                $result1 = mysqli_query($conn, $query1);
                                while ($row = mysqli_fetch_array($result1)) { ?>
                                    <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-3"><label id="select2" style=" float:right">ชิ้นที่ 2 :</label> </div>
                        <div class="col-lg-8">
                            <select name="list3" id="list3" onchange="myFunction()">
                                <option value=" ">เลือกหมวดหมู่สินค้า</option>
                                <?php
                                $query = "SELECT * FROM category  ";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <option value=" <?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                <?php } ?>
                            </select>

                            <select name="list4" id="list4" onchange="myFunction()">
                                <option value=" ">สินค้า</option>
                                <?php
                                $query1 = "SELECT * FROM product  ";
                                $result1 = mysqli_query($conn, $query1);
                                while ($row = mysqli_fetch_array($result1)) { ?>
                                    <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-3"><label id="select3" style=" float:right">ชิ้นที่ 3 :</label> </div>
                        <div class="col-lg-8">
                            <select name="list5" id="list5" onchange="myFunction()">
                                <option value=" ">เลือกหมวดหมู่สินค้า</option>
                                <?php
                                $query = "SELECT * FROM category  ";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <option value=" <?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                <?php } ?>
                            </select>

                            <select name="list6" id="list6" onchange="myFunction()">
                                <option value=" ">สินค้า</option>
                                <?php
                                $query1 = "SELECT * FROM product  ";
                                $result1 = mysqli_query($conn, $query1);
                                while ($row = mysqli_fetch_array($result1)) { ?>
                                    <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-lg-3"><label id="select4" style=" float:right">ชิ้นที่ 4 :</label> </div>
                        <div class="col-lg-8">
                            <select name="list7" id="list7" onchange="myFunction()">
                                <option value=" " width="70%">เลือกหมวดหมู่สินค้า</option>
                                <?php
                                $query = "SELECT * FROM category  ";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <option value=" <?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                <?php } ?>
                            </select>

                            <select name="list8" id="list8" onchange="myFunction()">
                                <option value=" ">สินค้า</option>
                                <?php
                                $query1 = "SELECT * FROM product  ";
                                $result1 = mysqli_query($conn, $query1);
                                while ($row = mysqli_fetch_array($result1)) { ?>
                                    <option value="<?php echo $row['pd_id'] ?>"><?php echo $row['pd_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-3"><label id="price" style=" float:right">ราคา :</label> </div>
                        <div class="col-lg-7">
                            <input class="form-control regis" type="text" name="sumprice" id="sumprice" required>
                        </div>
                        <div class="col-lg-2" id="bath">บาท</div>
                    </div>


                    <script>
                        function addcart(pd_id, pd_price) {
                            const setbox = setbox_id
                            const product_price = pd_price
                            let qty = document.form1.input1.value
                            let total_price = product_price * qty
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    // document.getElementById("page5").click();
                                    console.log(xhttp.responseText)
                                }
                            };
                            xhttp.open("GET", "./function/insertToCart.php?product_id=" + product_id + "&qty=" + qty + "&product_price=" + product_price + "&total_price=" + total_price, true);
                            xhttp.send();
                        }
                    </script>

                    <div class="row" style="margin-top: 10px;margin-bottom: 20px;">
                        <div class="col-lg-12">
                            <br>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span>บันทึก</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- modal ลบสินค้า  -->
<div class="modal fade de" id="deletepd<?php echo $row['setbox_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="modaldel">
                <h5 class="modal-title" id="myModalLabel">เตือนการลบชุดสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <?php
                include('./connect/connectdb.php');
                $del = mysqli_query($conn, "select * from product where set_id='" . $row['set_id'] . "'");
                $row = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h5>
                        ต้องการลบสินค้า : <span style="color:red; font-size:1.5em"><?php echo $row['set_name']; ?></span>
                    </h5>
                </div>
                <!-- <div class="container-fluid">

                    <h5>
                        <strong><img width="250" height="400" class="card-img-top" src="img/<?php echo $row['set_img']; ?> " /></strong>
                    </h5>
                </div> -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                <a href="./connect/con_add_setbox.php?set_id=<?php echo $row['set_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ</a>
            </div>

        </div>
    </div>
</div>

<!--Modal แก้ไขสินค้า -->
<div class="modal fade ee" id="editpd <?php echo $row['set_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="myModalLabel">แก้ไขข้อมูลชุดสินค้า</h5>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <?php
                $edit = mysqli_query($conn, "SELECT * from setbox where set_id='" . $row['set_id'] . "'");
                $row = mysqli_fetch_array($edit);
                $type_product = $row["set_id"];
                ?>
                <div class="container-fluid">
                    <form enctype="multipart/form-data" action="./connect/con_edit_product.php?pd_id=<?php echo $row["pd_id"]?>" method="POST">

                        <center> <img src="img/<?php echo $row["set_img"] ?>" style="display:inline" id="showpdimg" alt="" width="150px" class="imglogin"></center>

                        <div style="height:10px;"></div>
                        <input type="file" id="pic_index" name="pic_index">
                        <div style="height:5px;"></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="position:relative; top:7px;">ชื่อสินค้า :</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" name="set_name" class="form-control" value="<?php echo $row['set_name']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="position:relative; top:7px;">ราคาต่อชิ้น :</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" name="pd_price" class="form-control" value="<?php echo $row['pd_price']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="position:relative; top:7px; width:200%;">ประเภทสินค้า:</label>
                            </div>
                            <div class="col-lg-7">
                                <select id="category" class="form-control" name="category" required>
                                    <option hidden value="0" style="color:gray">เลือกประเภทสินค้า</option>
                                    <!-- <option value="1">111</option> -->
                                   
                                </select>
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span>บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>