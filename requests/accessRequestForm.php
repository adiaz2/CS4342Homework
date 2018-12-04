<?php
/**
 * Created by PhpStorm.
 * User: alejandrodiaz
 * Date: 11/13/18
 * Time: 7:56 AM
 */

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


#include("config.php");
$host = "ilinkserver.cs.utep.edu";
$db = 'f18_team4';
$username = 'cs_adiaz47';
$password = 'Ad020908!';

// connect to the mysql server
$conn = new mysqli($host,$username,$password,$db);

if ($conn->connect_error){
    die("fail");
}
else {
    $sql = "SELECT * FROM student WHERE Student.Semail='" . $email . "'";
    $result = mysqli_query($conn, $sql);
    if (!(mysqli_num_rows($result) > 0)) {
        echo "Student Email Not Found ";
        echo "<a href=\"../student/studentForm.html\">Create New Student</a>";
        return;
    }

    $sql = "SELECT * FROM admin WHERE Admin.Aemail='" . $adminEmail . "'";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    if (!(mysqli_num_rows($result) > 0)) {
        echo "Admin Email Not Found ";
        echo "<a href=\"../admin/adminForm.html\">Create New Admin</a>";
        return;
    }
    $sql = "SELECT * FROM faculty WHERE Faculty.Femail='" . $facultyEmail . "'";
    $result = mysqli_query($conn, $sql);
    if (!(mysqli_num_rows($result) > 0)) {
        echo "Faculty Email Not Found ";
        echo "<a href=\"../faculty/facultyForm.html\">Create New Faculty</a>";
        return;
    }
    $sql = "SELECT * FROM room WHERE Room.Room_number='" . $roomNumber . "'";
    $result = mysqli_query($conn, $sql);
    if (!(mysqli_num_rows($result) > 0)) {
        $sql = "INSERT INTO room VALUES ('" . $roomNumber . "')";
        if($conn->query($sql) === TRUE){
            echo "Room Number: " . $roomNumber . " Has Been Created";
        }
    }

    $dataToInsert = "'" . $id . "', " . "'" . $key . "', " . "'" . $request_status . "', "
        . "'" . $start_date . "', ". "'" . $end_date . "', " . "'" . $key_status . "', " . "'" . $professor . "', "
        . "'" . $email . "', ". "'" . $facultyEmail . "', ". "'" . $adminEmail . "', ". "'" . $roomNumber . "'";

    $sql = "INSERT INTO request VALUES (" . $dataToInsert . ")";
    echo "<br>$sql";
    if($conn->query($sql) === TRUE){
        echo "Form successfully added!";
        echo "<a href=\"../logins/login.html\">Click Here to Return to Main Menu</a>";
    }
    else {
        echo "Error: " .  "<br>" . $conn->error;
    }

}