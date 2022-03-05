<?php
include('connectdb.php');

$purchase_id = $_POST['purchase_id'];
$rate = $_POST['rate'];
$comment = $_POST['comment'];

$sqlReview = "INSERT INTO review(review_rate,review_comment,purchase_id) values ('$rate','$comment','$purchase_id')";
$reultReview = mysqli_query($conn, $sqlReview);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        alert("ส่งรีวิวแล้ว");
        window.location.href="../index.php";
    </script>
</head>
<body>
    
</body>
</html>

<?php 
header('location:../bakery_myorder3.php');
 ?>
