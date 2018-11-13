<?php

#include("config.php"); 
$host = "ilinkserver.cs.utep.edu";
$db = 'adiaz47';
$username = $_POST['username'];
$password = $_POST['password'];
// connect to the mysql server
$conn = new mysqli($host,$username,$password,$db);

if ($conn->connect_error){
    die("fail");
}
else{
setcookie("loggedin", "TRUE", time()+(3600 * 24));
setcookie("mysite_username", "$username");
echo "You are now logged in!"; 
echo "<a href=\"home.php\">Main Menu</a>";
}
?>
