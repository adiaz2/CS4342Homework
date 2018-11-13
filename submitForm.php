<?php
/**
 * Created by PhpStorm.
 * User: alejandrodiaz
 * Date: 11/13/18
 * Time: 7:56 AM
 */
echo 'hello';
$email = $_POST['email'];
$password = $_POST['password'];
$groupTags = $_POST['groupTags'];
$studentID = $_POST['studentID'];
$name = $_POST['name'];
$gradDate = $_POST['graduation date'];

echo $email . "\n" . $password . "\n" . $groupTags . "\n" . $studentID . "\n" . $name . "\n" . $gradDate . "\n";

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
    $dataToInsert = "'" . $email . "', " . "'" . $password . "', " . "'" . $groupTags . "', " . "'" . $studentID . "', " . "'" . $name . "', " . "'" . $gradDate . "'";
    $sql = "INSERT INTO student (Semail, Spassword, Sgroup_tags, Sstu_id, Sname, Sgraduation_date) VALUES (" . $dataToInsert . ")";

    if($conn->query($sql) === TRUE){
        echo "Form successfully added!";
        echo "<a href=\"home.php\">Click Here to Fill Request Form</a>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
