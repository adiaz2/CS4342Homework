<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php if (!isset($_COOKIE['loggedin'])) die("You are not logged in!"); ?>
<html>
  
  <head>
  </head>
  
  <body>
	  <h2>View Single Pet</h2>
	<?php
	  session_start();
  
	  if (isset($_GET['username'])){
		$username=$_GET['username'];
	  }else{
		$username=0;
	  }
	  $conn = new mysqli("ilinkserver.cs.utep.edu","your-username","your-password","your-database");
		if ($conn->connect_error){
				die("fail");
		}
	 
	  else
	  {

		
		$command="SELECT * FROM pet where username=\"".$username."\"";
	
		echo "COMMAND:<br>" . $command . "<br><br>";
		$result = $conn -> query($command);
		if (!$result)
		{
		  echo "Query not executed";
		}
		else
		{

		  while ($row = mysqli_fetch_array($result))
		  {
		    Echo '<br>username: ' . $row['username'] ;
		    Echo '<br>Name: ' . $row['name'];
			Echo '<br>species: ' . $row['species'];
			echo '<br>Owner: ' . $row['owner'];
		
			
		  }  
		}
		
	  }

	?>
	
	<h3><a href="home.php">Back to Menu</a></h3>
  </body>
  
</html>
