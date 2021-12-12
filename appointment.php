<?php
session_start();
    include 'connection.php';
?>
<html> 
<head> 
<title>DR. APPOINTER</title> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head> 
<body background="background.png"> 
<header> 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">DR. APPOINTER</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Doctors <span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li><a href="http://localhost/ad/catagory.php?cat=medicine">Medicine</a></li> 
			<li><a href="http://localhost/ad/catagory.php?cat=ent">E.N.T</a></li>
			<li><a href="http://localhost/ad/catagory.php?cat=eye">Eye Specialist</a></li>
			<li><a href="http://localhost/ad/catagory.php?cat=cardiologist">Cardiologist</a></li>
          </ul>
        </li>
        <li><a href="aboutus.html">ABOUT</a>
          
        </li>
        <li><a href="FAQ.html">FAQ</a></li>
      </ul>
	  <form class="navbar-form navbar-left" action="search.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Doctor's Name" name="go">
      </div>
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </form>
      <ul class="nav navbar-nav navbar-right">
         <?php if(isset($_SESSION["name"])){ 
                ?>
          <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span></a>
            <a href="logout.php"><label>Logout</label></a>
          </li>
     
          <?php
            }else{
    
    ?>   
      <li><a href="Registerlog.php"><span class="glyphicon glyphicon-user"></span></a></li>
     
      <?php
}
          ?>
        
      </ul>
    </div>
  </div>
</nav>
</header> 
	
<div class="container"> 
	<!-- team section -->
	<section class="team" id="team">
		<div class="container">
			<div class="row">
				<div class="team-heading text-center">
					<h2>Appointment Form</h2>
					<h4>Please fill-up the form</h4>
				</div>
                
<form action="saveappoinment.php" method="post">
    <div class="form-group">
    <label for="Pname">Patient Name:</label>
    <input type="pname" class="form-control" id="pname" name="uname">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="number">Phone Number:</label>
    <input type="number" class="form-control" id="number" name=number>
      
  </div>
    <div class="form-group">
    <label for="slot">Slots</label>
     <div class="form-group">
  <label for="sel1">Select Slot:</label>
  <select class="form-control" id="sel1" name="slot">
      
      <?php
      $id = $_GET["doc_id"];
        $sql = "SELECT * FROM slots where doc_id='$id'";
        $result = $conn->query($sql);
     
      if ($result->num_rows > 0) {
          $count=0;
    while($row = $result->fetch_assoc()) {
        
        ?>
        
    <option <?php if($row["avaliabilty"]=="0"){echo "disabled";} ?> ><?php echo $row["time"] ?></option>
    <?php
      }
      }
      ?>
  </select>
</div> 
  </div>
    <div class="form-group">
    <label for="number">Date</label>
    <input type="date" class="form-control" id="number" name="dd">
      
  </div>
    <input type="hidden" name="doc_id" value="<?php echo $id; ?>">
  
  <button type="submit" class="btn btn-default">Submit</button>

                </form>
			</div>
		</div>
	</section><!-- end of team section -->
</div>

</body> 
<footer>
Copyright &copy; All rights reserved by BSAMP,2017
</footer>
</html>