<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="library_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
   echo "";
}

?>

