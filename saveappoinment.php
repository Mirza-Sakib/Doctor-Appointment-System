<?php
	include 'connection.php';
	
	$name = $_POST["uname"];
	$email = $_POST["email"];
	$number = $_POST["number"];
	$slot = $_POST["slot"];
	$doc_id = $_POST["doc_id"];
    $date = $_POST["dd"];


    $uniqueId= time().'-'.mt_rand();

	$sql = "INSERT INTO appointment values('$uniqueId', '$doc_id','$slot','$name','$email','$number','$date')";
	if ($conn->query($sql) === true) {
        
     $sql1="UPDATE doctor SET avaliabilty =avaliabilty-1 WHERE Doc_Id='$doc_id'";
        
        if ($conn->query($sql1) === true) {}
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	header("Location: appoinmentconfirmation.html");
	

?>