<?php
include('connectdb.php');
$pn= $_GET["pn"];    
	mysqli_query($conn,"UPDATE sendback_all set sendback_status=0 where sendback_no='$pn'");
header('location:../backed_purchaseSendback.php?pn=0');
 ?>

