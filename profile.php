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
</header> 
	
<div class="container"> 
	<!-- team section -->
	<section class="team" id="team">
		<div class="container">
			<div class="row">
				<div class="team-heading text-center">
                    <pre>
                    
					<h2>Doctor's Profile</h2>
					
                    
                    </pre>
				</div>
                
				
       <?php
        $ids = $_SESSION["name"];
        $data = Array();
        $sql = "SELECT * FROM doctor where Doc_Id='$ids'";
        $result = $conn->query($sql);
     
      if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data["doc_id"] = $row["Doc_Id"];
        $data["name"] = $row["Name"];
        $data["degree"] = $row["Degree"];
        $data["email"] = $row["Email"];
        $data["phone_n"] = $row["Phone_n"];
        $data["time"] = $row["Time"];
        $data["address"] = $row["Address"];
        $data["avail"] = $row["avaliabilty"];
        
    }
      }
      ?>
                
                <form action="save.php" method="post">
<table class="table">
                            <tbody>
                                <input type="hidden" value="<?php echo $data["doc_id"];  ?>" name="doc_id">
                            
                            <tr>
                                <td width="30%" style="text-align: right;"><strong> Name:</strong></td>
                                <td><input name="uname" type="text" value="<?php echo $data["name"]; ?>"></td>
                            </tr>
                                <tr>
                                <td width="30%" style="text-align: right;"><strong>Degree:</strong></td>
                                <td><input name="degree" type="text" value="<?php echo $data["degree"]; ?>"></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong> Email:</strong></td>
                                <td><input name="email" type="text" value="<?php echo $data["email"]; ?>"></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong> Phone:</strong></td>
                                <td><input name="phone" type="text" value="<?php echo $data["phone_n"]; ?>"></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong> Address:</strong></td>
                                <td><input name="address" type="text" value="<?php echo $data["address"]; ?>"></td>
                            </tr>
                            
                            
                            
                            
                        
                            </tbody></table>
                    <input type="submit" class="btn btn-success">
                </form>
                
				
			</div>
		</div>
	</section><!-- end of team section -->
</div>

</body> 
<footer>

</footer>
</html>