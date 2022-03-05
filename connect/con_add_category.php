<?php
	include('connectdb.php');
	$cat_name=$_POST['cat_name'];
			
	mysqli_query($conn,"INSERT into category(cat_name) values ('$cat_name')");
    
    header('location:../backed_category.php');

    ?>