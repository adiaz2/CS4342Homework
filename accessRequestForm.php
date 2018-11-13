<?php
/**
 * Created by PhpStorm.
 * User: alejandrodiaz
 * Date: 11/13/18
 * Time: 7:56 AM
 */
echo 'hello';
$id = rand(10000, 99999);
$key = $_POST['keyStatus'];
$request_status = 'Pending';
$access_hours = $_POST['hoursOfAccess'];
$start_date = $_POST['startDate'];
$end_date = $_POST['endDate'];
$key_status = 'Pending';
$professor = $_POST['professorName'];
$email = $_POST['email'];
$facultyEmail = $_POST['facultyEmail'];
$adminEmail = $_POST['adminEmail'];
$roomNumber = $_POST['roomNumber'];

echo $email . "\n" . $id . "\n" . $key . "\n" . $request_status . "\n" . $access_hours . "\n" . $start_date . "\n"
    . $end_date . "\n" . $key_status . "\n" . $professor . "\n" . $email . "\n" . $facultyEmail . "\n"
    . $adminEmail . "\n" . $roomNumber . "\n";

#include("config.php");
$host = "ilinkserver.cs.utep.edu";
$db = 'adiaz47';
$username = 'cs_adiaz47';
$password = 'Ad020908!';

// connect to the mysql server
$conn = new mysqli($host,$username,$password,$db);

if ($conn->connect_error){
    die("fail");
}
else {
    $dataToInsert = "'" . $id . "', " . "'" . $key . "', " . "'" . $request_status . "', " . "'" . $access_hours . "', "
        . "'" . $start_date . "', ". "'" . $end_date . "', ". "'" . $key_status . "', " . "'" . $professor . "'"
        . "'" . $email . "', ". "'" . $facultyEmail . "', ". "'" . $adminEmail . "', ". "'" . $roomNumber . "'";
    $sql = "INSERT INTO request (Rid, Rkey, Rrequest_status, Raccess_hours, Rstart_date, Rend_date, Rkey_status, 
Rprofessor, Semail, Femail, Aemail, Room_number) VALUES (" . $dataToInsert . ")";

    if($conn->query($sql) === TRUE){
        echo "Form successfully added!";
        echo "<a href=\"studentHome.php\">Click Here to Return to Main Menu</a>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}