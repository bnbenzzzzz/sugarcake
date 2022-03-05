<?php
include('connectdb.php');

// $pd_id=$_POST['pd_id'];
$cat_id = $_GET["cat_id"];
$cat_name = $_POST['cat_name'];

   
	mysqli_query($conn,"UPDATE category set cat_name='$cat_name' where cat_id='$cat_id'");


header('location:../backed_category.php');
 ?>

