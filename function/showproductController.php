<?php 
if (isset($_GET['commentByMajor'])) {
    $catID = $_GET['cat_id'];
    $sql = "SELECT * FROM product WHERE cat_id = '$catID' ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    echo '
    <div class="card card_product">  
    <div class="card card_product">
    <img src="'.$row['pd_img'].'" width="800" height="250" class="card-img-top" alt="...">
    <div class="card-body card_name">
      <span>'.$row['pd_name'].'</span>

      <div class="row row-btn1">
        <div class="col col-btn1">
          <a href="#editpd'.$row['pd_id'].'" data-toggle="modal" class="btn_edit">แก้ไข</a>
        </div>
        <div class="col col-btn1">
          <a href="#deletepd'.$row['pd_id'].'" data-toggle="modal" class="btn_delete">ลบ</a>

        </div>
      </div>
    </div>
  </div>';
}
}
?>