<?php
    session_start();
?>

<?php
    include 'connection.php';
$cat = $_GET["cat"];
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
      <form class="navbar-form navbar-left" action="search.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Doctor's Name" name="go">
      </div>
      <button class="btn btn-default" type="submit" value="search">
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

</nav>
</header> 
	
<div class="container"> 
	<!-- team section -->
	<section class="team" id="team">
		<div class="container">
			<div class="row">
				<div class="team-heading text-center">
					
                    <pre>
                    
                    <h1>Doctor List</h1>
                    
                    
                    
                    </pre>
				</div>
                
				<table class="table table-striped">
  <thead>
     
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Degree</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
       <?php
        $sql = "SELECT * FROM doctor where Type='$cat'";
        $result = $conn->query($sql);
     
      if ($result->num_rows > 0) {
          $count=1;
    while($row = $result->fetch_assoc()) {
        $ids = $row["Doc_Id"];
       ?>
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $row["Name"]; ?></td>
      <td><?php echo $row["Type"]; ?></td>
      <td><?php echo $row["Degree"]; ?></td>
        <td> <a href="showDetails.php?ids=<?php echo $ids; ?>"> <button class="btn btn-success">Details</button> </a> </td>
    </tr>
      
      <?php
        $count++;
    }
      }
      ?>
    
  </tbody>
</table>
				
			</div>
		</div>
	</section><!-- end of team section -->
</div>

</body> 
<footer>

</footer>
</html>