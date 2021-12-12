<?php
session_start();
if ($_SESSION['admin']=="") {
?>
<script type="text/javascript">
window.location="login.php";
</script>
<?php
}
include("connection.php");
$id=$_GET["id"];
mysqli_query($conn,"delete from doctor where Doc_Id=$id");
?>

<script type="text/javascript">
	window.location="doctor_details.php";
</script>