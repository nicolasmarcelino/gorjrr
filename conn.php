<?php
$configContent = file_get_contents('../config/dbconfig.json');
$config = json_decode($configContent, true);

$conn = new mysqli($config['server'], $config['user'], $config['password'], $config['database']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>