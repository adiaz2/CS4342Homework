<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
$id = $_GET['id'];

echo "
<h1>CS4342 Database Management Electronic Access - Web Interface</h1>
<h2>Admin Access </h2>
<p>Welcome to the Electronic Access Web Interface</p>
<br/>
<h2>Main Menu</h2>

";
echo "<br><a href=\"viewAdminRequests.php?id='" . $id . "'\">See Pending Access Requests</a>";
echo "<br><a href=\"../requests/requestForm.html\">Fill Out New Access Request Form</a>";
echo "<br><a href=\"../logins/logout.php\">Logout</a>";
?>
