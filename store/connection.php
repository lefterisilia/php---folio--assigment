<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "lab7";
$articles = [];

// Establish a connection to the MySQL database
$conn = mysqli_connect($server, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

