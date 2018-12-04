<?php

#include("config.php");
$host = "ilinkserver.cs.utep.edu";
$db = 'f18_team4';
$username = 'cs_adiaz47';
$password = 'Ad020908!';

$id = $_GET['id'];

// connect to the mysql server
$conn = new mysqli($host,$username,$password,$db);

if ($conn->connect_error){
    die("fail");
}
else {
    echo "<h1>List of Reports:</h1>";

    $sql = "SELECT Rid, Rkey, Rrequest_status, Raccess_hours, Rstart_date, Rend_date, Rkey_status, Rprofessor FROM request, faculty WHERE Faculty.Femail='" . $id ."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<strong>REQUEST NUMBER: " . $row['Rid'] . "</strong><br>";
            echo "<strong>Key: \t</strong>" . $row['Rkey'] . "<br>";
            echo "<strong>Request Status: \t</strong>" . $row['Rrequest_status'] . "<br>";
            echo "<strong>Access Hours: \t</strong>" . $row['Raccess_hours'] . "<br>";
            echo "<strong>Start Date: \t</strong>" . $row['Rstart_date'] . "<br>";
            echo "<strong>End Date: \t</strong>" . $row['Rend_date'] . "<br>";
            echo "<strong>Key Status: \t</strong>" . $row['Rkey_status'] . "<br>";
            echo "<strong>Professor: \t</strong>" . $row['Rprofessor'] . "<br>";
            echo "<strong>Student Email: \t</strong>" . $row['Student.Semail'] . "<br>";
            echo "<strong>Faculty Email: \t</strong>" . $row['Faculty.Femail'] . "<br>";
            echo "<strong>Admin Email: \t</strong>" . $row['admin.Aemail'] . "<br>";
            echo "<strong>Room Number: \t</strong>" . $row['Room.Room_number'];
            echo "<br><br><br>";
        }
    }
}