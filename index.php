<?php
    session_start();
?>
<html> <head> <title>DR. APPOINTER</title> 	<meta charset="utf-8">	<meta name="viewport" content="width=device-width, initial-scale=1">	<link href="style.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head> 
<body> 
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
        <li><a href="fAQ.html">FAQ</a></li>
      </ul>
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
  </div>
</nav>	
<div class="container"> 
    <marquee><h1><strong> WELCOME TO DR. APPOINTER </strong> </h1></marquee> 
</div> 

</header> 

</body> 
<footer>
Copyright &copy; All rights reserved by BSAMP,2017
</footer>
</html>