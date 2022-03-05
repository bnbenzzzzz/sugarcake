<?php
include('connectdb.php');

// $pd_id=$_POST['pd_id'];
$review_id = $_GET["review_id"];

    mysqli_query($conn,"UPDATE review set review_status=3 where review_id='$review_id'");
    header('location:../backed_reviews.php');

 ?>

