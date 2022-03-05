<?php 
include('connectdb.php');
$cat_id=$_GET['cat_id'];
mysqli_query($conn,"UPDATE category set cat_status=1 where cat_id='$cat_id'");
header('location:../backed_category.php')
?>

