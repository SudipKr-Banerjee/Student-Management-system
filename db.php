<?php
$host = "localhost";
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$db = "student_management";

// Create connection
$conn = new mysqli($host, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>