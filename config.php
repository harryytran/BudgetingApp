<?php
$servername = "localhost";
$username = "harry";
$password = "your_password"; // Ensure this is the correct password
$dbname = "budgeting_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
