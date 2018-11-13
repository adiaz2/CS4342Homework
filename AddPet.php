<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php if (!isset($_COOKIE['loggedin'])) die("You are not logged in!"); //Check that user is logged in ?>
<html>
  
  <head>
  </head>
  
  <body>
	<?php
	  session_start(); 
	  if ($_POST) 
	  {
		// This is a post back from the form
		// So attempt to insert the data
		$conn = new mysqli("ilinkserver.cs.utep.edu","your-username","your-password","your-database");
		if ($conn->connect_error){
				die("fail");
		}
	
			//Creating the query to execute
		  $command="INSERT INTO pet (name, owner, species, username) "
			. " VALUES ('FFFF','LLLL','DDDD','PPPP')";
		  $command = str_replace('FFFF',$_POST['name'],$command);
		  $command = str_replace('LLLL',$_POST['owner'],$command);
		  $command = str_replace('DDDD',$_POST['species'],$command);
		  $command = str_replace('PPPP',$_POST['username'],$command);
		  echo "COMMAND:<br>" . $command . "<br><br>";
		  $result = $conn -> query($command);
		  
		  if ($result){
			echo "SUCCESS!";
		  }else{
			echo "FAILED, error: " . mysql_error();
		  }
		 
		
	  }

	?>

	  <h2>Add Pet</h2>
	  <form action='AddPet.php' method='POST'>
		<br> Name:
		<br><input type='text' name='name' />
		<br><br>Owner Name:
		<br><input type='text' name='owner' />
		<br><br>Species:
		<br><input type='text' name='species' />
		<br><br>username:
		<input type='text' name='username' />
		<br><br><input type='submit' /> Add Pet
	  </form>
	
	<h3><a href="home.php">Back to Menu</a></h3>
  </body>
  
</html>
