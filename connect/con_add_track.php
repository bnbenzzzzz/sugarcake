<?php
	include('connectdb.php');
	$pi=$_GET['pi'];
	$shipping=$_POST['shipping'];
	$track_num=$_POST['track_num'];	
	if($shipping=="ทางร้านจัดส่ง"){
		$sqlCreateTrack = "INSERT into shipping_detail(company_id,purchase_id) values ('$shipping','$pi')";
		mysqli_query($conn, $sqlCreateTrack);
		$sqlUpdateTrack = "UPDATE purchaseorder set track_id = '$shipping', deliver_status=2 WHERE purchase_id = '$pi'";
		mysqli_query($conn, $sqlUpdateTrack);
	   
		header('location:../backed_purchaseAccepted.php');
	}else{
		$sqlCreateTrack = "INSERT into shipping_detail(company_id,purchase_id) values ('$shipping','$pi')";
	mysqli_query($conn, $sqlCreateTrack);
	$sqlUpdateTrack = "UPDATE purchaseorder set track_id = '$track_num', deliver_status=2 WHERE purchase_id = '$pi'";
	mysqli_query($conn, $sqlUpdateTrack);
   
    header('location:../backed_purchaseAccepted.php');
	}
	
	?>
