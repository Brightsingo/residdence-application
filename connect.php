<?php
// Database credentials
$servername = "localhost"; // Change this to your database server address
$username = "root"; // Leave this empty if no username is set
$password = ""; // Leave this empty if no password is set
$dbname = "SINGO"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>