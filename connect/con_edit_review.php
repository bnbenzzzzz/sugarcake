<?php
include('connectdb.php');

// $pd_id=$_POST['pd_id'];
$review_id = $_GET["review_id"];
$queryRate = "SELECT * FROM review WHERE review_id='$review_id'";
$resultRate = mysqli_query($conn, $queryRate);
$rowRate = mysqli_fetch_array($resultRate);

   if($rowRate['review_status']==0){
       mysqli_query($conn,"UPDATE review set review_status=1 where review_id='$review_id'");
       header('location:../backed_reviews.php');
    }else {
    mysqli_query($conn,"UPDATE review set review_status=0 where review_id='$review_id'");
    header('location:../backed_reviews.php');
}
	



 ?>

