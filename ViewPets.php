<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php if (!isset($_COOKIE['loggedin'])) die("You are not logged in!"); ?>
<html>
  
  <head>
  </head>
  
  <body>
	  <h2>View All Pets</h2>
	<?php
	  session_start();
	  
	  $conn = new mysqli("ilinkserver.cs.utep.edu","your-username","your-password","your-database");
		if ($conn->connect_error){
				die("fail");
		}
	  else
	  {
		
		$command="SELECT * FROM pet";
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
			$line="<br>FFFF LLLL  <a href='ViewPet.php?username=IIII'>View details</a>";
			$line=str_replace('FFFF',$row['name'],$line);
			$line=str_replace('LLLL',$row['owner'],$line);
			$line=str_replace('DDDD',$row['species'],$line);
			$line=str_replace('IIII',$row['username'],$line);
			echo $line;
			
		  }  
		}
	
	  }

	?>
	
	<h3><a href="home.php">Back to Menu</a></h3>
  </body>
  
</html>
