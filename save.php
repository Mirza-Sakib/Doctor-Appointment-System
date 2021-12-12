<?php
	include 'connection.php';
	
	$name = $_POST["uname"];
	$email = $_POST["email"];
	$number = $_POST["phone"];
	$address = $_POST["address"];

$id = $_POST["doc_id"];

    $uniqueId= time().'-'.mt_rand();

	$sql = "UPDATE doctor set Name='$name', Email='$email', Phone_n='$number', Address='$address' where Doc_Id='$id'";
	if ($conn->query($sql) === true) {
   
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	header("Location: index.php");
	

?>