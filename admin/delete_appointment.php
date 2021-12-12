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
$delete_id=$_GET['id'];
$delete_query="delete from appointment WHERE appointment_id='$delete_id'";//delete query
$run=mysqli_query($conn,$delete_query);

if($run)
{
    echo "<script>window.open('appointment_details.php?deleted=appointment has been deleted','_self')</script>";
}
?>

