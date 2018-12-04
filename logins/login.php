<?php

#include("config.php"); 
$host = "ilinkserver.cs.utep.edu";
$db = 'f18_team4';
$username = 'cs_adiaz47';
$password = 'Ad020908!';

$id = $_POST['username'];
$pwd = $_POST['password'];

// connect to the mysql server
$conn = new mysqli($host,$username,$password,$db);

if ($conn->connect_error){
    die("fail");
}
else{

    $sql = "SELECT pwd FROM  adminLogins WHERE id='" . $id . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            if ($pwd == $row["pwd"]) {
                setcookie("loggedin", "TRUE", time() + (3600 * 24));
                setcookie("mysite_username", "$username");
                echo "You are now logged in as admin!\n";
                echo "<a href=\"../admin/adminHome.php?id='" . $id . "'\">Main Menu</a>";
                return;
            }
        }
    }
    $sql = "SELECT pwd FROM  FacultyLogins WHERE id='" . $id . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            if ($pwd == $row["pwd"]) {
                setcookie("loggedin", "TRUE", time() + (3600 * 24));
                setcookie("mysite_username", "$username");
                echo "You are now logged in as faculty! \n";
                echo "<a href=\"../faculty/facultyHome.php?id='" . $id . "'\">Main Menu</a>";
                return;
            }
        }
    }
    else{
        $sql = "SELECT pwd FROM  StudentLogins WHERE id='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                if ($pwd == $row["pwd"]) {
                    setcookie("loggedin", "TRUE", time() + (3600 * 24));
                    setcookie("mysite_username", "$username");
                    echo "You are now logged in as a regular user!\n";
                    echo "<a href=\"../student/studentHome.php?id='" . $id . "'\">Main Menu</a>";
                    return;
                }
            }
        }
    }
    echo "Email/Password Combination ot Valid ";
    echo "<a href=\"login.html\">Click Here to Log In</a>";

}

?>
