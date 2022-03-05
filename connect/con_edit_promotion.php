<?php
include('connectdb.php');
$promotion_id = $_GET['promotion_id'];
$promotion_status = $_POST['active'];


mysqli_query($conn,"UPDATE promotion SET promotion_status='$promotion_status' where promotion_id='$promotion_id'");	
	header('location:../backed_promotion.php');

?>

