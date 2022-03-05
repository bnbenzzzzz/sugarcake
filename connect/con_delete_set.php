<?php 
include('connectdb.php');
$set_id=$_GET['set_id'];
mysqli_query($conn,"UPDATE setbox set set_status=0 where set_id='$set_id'");
header('location:../backed_set.php')
?>

