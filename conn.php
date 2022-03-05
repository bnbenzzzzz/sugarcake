<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","sugarcake");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>