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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin | Doctor Details</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">DR. APPOINTER</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-user-o"></i>
            <span class="nav-link-text">Doctors</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
			<li>
              <a href="add_doctor.php">Add Doctor</a>
            </li>
			<li>
              <a href="doctor_details.php">Doctors Details</a>
            </li>
          </ul>
		</li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
		    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">
            <i class="fa fa-user-o"></i>
            <span class="nav-link-text">Appointments</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents1">
			<li>
              <a href="appointment_details.php">Appointment Details</a>
			</li>
          </ul>
		</li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-user-o"></i>
            <span class="nav-link-text">Time Slots</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
			<li>
              <a href="add_slot.php">Add Time Slots</a>
            </li>
			<li>
              <a href="time_slot.php">Available Time Slots</a>
            </li>
          </ul>
		</li>
		</ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="logout.php" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">WELCOME __ ADMIN</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Doctors Details</div>
            <div id="content">
       			<div id="rightnow">
				<div class="block">
				<?php
				
				$res=mysqli_query($conn,"select * from doctor");
				echo "<table class='table table-bordered table-hover table-striped' style='table-layout: fixed'>";
				echo "<tr>";
				echo "<th>"; echo "Doctor's Image"; echo "</th>";
				echo "<th>"; echo "Doctor's Name"; echo "</th>";
				echo "<th>"; echo "Doctor's ID"; echo "</th>";
				echo "<th>"; echo "Doctor's Type"; echo "</th>";
				echo "<th>"; echo "Doctor's Degree"; echo "</th>";
				echo "<th>"; echo "Doctor's Email"; echo "</th>";
				echo "<th>"; echo "Doctor's Phone No."; echo "</th>";
				echo "<th>"; echo "Doctor's Address"; echo "</th>";
				echo "<th>"; echo "Available Time"; echo "</th>";
				
				echo "<th>"; echo "Delete"; echo "</th>";
				echo "<th>"; echo "Edit"; echo "</th>";
				echo "</tr>";
				while($row=mysqli_fetch_array($res))
				{
					echo "<tr>";
					echo "<td>"; ?> <img src="<?php echo $row["Image"]; ?>" height="100" weight="100"> <?php echo "</td>";
					echo "<td>"; echo $row["Name"]; echo "</td>";
					echo "<td>"; echo $row["Doc_Id"]; echo "</td>";
					echo "<td>"; echo $row["Type"]; echo "</td>";
					echo "<td>"; echo $row["Degree"]; echo "</td>";
					echo "<td>"; echo $row["Email"]; echo "</td>";
					echo "<td>"; echo $row["Phone_n"]; echo "</td>";
					echo "<td>"; echo $row["Address"]; echo "</td>";
					echo "<td>"; echo $row["Time"]; echo "</td>";
					
					echo "<td>"; ?> <a href="delete_doctor.php?id=<?php echo $row["Doc_Id"]; ?>"><button class="btn btn-danger">Delete</button></a> <?php echo "</td>";
					echo "<td>"; ?> <a href="edit_doctor.php?id=<?php echo $row["Doc_Id"]; ?>"><button class="btn btn-success">Edit</button></a> <?php echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
				?>
				</div>
			  </div>
            </div>
      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
<script>
(function (global) { 

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

        // making sure we have the fruit available for juice (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {            
        noBackPlease();

        // disables backspace on page except on input fields and textarea..
        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };          
    }

})(window);
</script>
</body>

</html>