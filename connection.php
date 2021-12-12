<?php
$servername = "localhost";
	$databaseName = "dr";
	$username = "root";
	$pass = "";
	
	$conn = mysqli_connect($servername, $username, $pass,$databaseName);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
?>