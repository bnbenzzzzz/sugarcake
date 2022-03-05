<?php
include('connectdb.php');

// $pd_id=$_POST['pd_id'];
$com_id = $_GET["com_id"];
	mysqli_query($conn,"UPDATE shippingcompany set company_status=0 where company_id='$com_id'");


header('location:../backed_category.php');
 ?>

