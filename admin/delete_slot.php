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
$id=$_REQUEST['id'];
$query = "DELETE FROM slots WHERE slot_id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: time_slot.php"); 
?>