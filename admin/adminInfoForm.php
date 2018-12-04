<?php
/**
 * Created by PhpStorm.
 * User: alejandrodiaz
 * Date: 11/13/18
 * Time: 7:56 AM
 */
$email = $_POST['email'];
$pwd = $_POST['password'];
$name = $_POST['name'];

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
    $dataToInsert = "'" . $email . "', " . "'" . $pwd . "', "  . "'" . $name . "'";
    $sql = "INSERT INTO admin (Aemail, Apassword, Aname) VALUES (" . $dataToInsert . ")";

    if($conn->query($sql) === TRUE){
        #create a login id for them
        $dataToInsert = "'" . $email . "', " . "'" . $pwd . "'";
        $sql = "INSERT INTO adminLogins (id, pwd) VALUES (" . $dataToInsert . ")";
        if($conn->query($sql) === TRUE){
            echo "Account Successfully Created! ";
            echo "<a href=\"../logins/login.html\">Click Here to Log In</a>";
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}