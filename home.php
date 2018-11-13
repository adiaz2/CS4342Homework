<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php if (!isset($_COOKIE['loggedin'])) die("You are not logged in!"); ?>
<html>
  
  <head>
  </head>
  
  <body>
	<h1>CS4342 Database Management Electronic Access - Web Interface</h1>
	<h2>PHP demos </h2>
	<p>Welcome to the Electronic Access Web Interface</p>
	 <br/>
	 <h2>Main Menu</h2>
	<ul>
	  <li><a href="ViewPet.php?username=dornelas">View PET 1</a></li>
	  <li><a href="ViewPets.php">View All Pets - Text</a></li>
	  <li><a href="AddPet.php">Add Pet</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
  </body>
  
</html>
