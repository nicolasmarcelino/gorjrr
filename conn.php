<?php
$server = "localhost";
$user = "root";       // Default username for XAMPP is 'root'
$password = "";           // Default password for XAMPP is empty
$db = "test";

// Create connection
$conn = new mysqli($server, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>