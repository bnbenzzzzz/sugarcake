<?php
include('connectdb.php');

// $pd_id=$_POST['pd_id'];
$pd_id = $_GET["pd_id"];
$qty = $_POST['invent_qty'];

   
	mysqli_query($conn,"UPDATE product set pd_inventory='$qty' where pd_id='$pd_id'");


header('location:../backed_product.php');
 ?>

