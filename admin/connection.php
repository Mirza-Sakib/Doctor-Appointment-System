<?php
$conn=mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "dr");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
	
?>