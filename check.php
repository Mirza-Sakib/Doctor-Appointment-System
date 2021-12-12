<?php
session_start();
	include 'connection.php';


$uname = $_POST["Username"];
$pass = $_POST["Password"];
	
	$data = Array();
        $sql = "SELECT * FROM doctor where Doc_Id='$uname'";
        $result = $conn->query($sql);
     
      if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data["Username"] = $row["Doc_Id"];
        $data["Password"] = $row["password"];
    }
      }

if(isset($data["Password"]) && $data["Password"] == $pass){
    echo "done";
    $_SESSION["name"] = $data["Username"];
    header("Location: index.php");
}else {
    echo "Incorrect user ID or password";
    
    ?>
    <a href="Registerlog.php"><label>Login</label></a>
        <?php
}
	

?>