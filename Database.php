<?php
$servicename = "github";
$username = "username";
$password = "password";

// Create connection
$conn = new mysql($servicename, $username, $password);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE mydb";
if ($conn->query($sql) === TRUE) {
   echo "create Database successfully";
} else {
   echo "Error" . $conn->error;
}

// Create table
$sql = "CREATE TABLE mytable (
id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(20) NOT NULL,
type VARCHAR(20) NOT NULL,
date_created TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
   echo "create Table successfully";
} else {
   echo "Error" . $conn->error;
}

// Insert preexisting values
$sql = "INSERT INTO mytable (name, type, date_created)
VALUES ('Aran', 'user', CURRENT_TIMESTAMP),
('Jelly', 'user', CURRENT_TIMESTAMP),
('Tabasa', 'admin', CURRENT_TIMESTAMP)";

if ($conn->query($sql) === TRUE) {
   echo "Preexisting values listed successfully";
} else {
   echo "Error" . $conn->error;
}

$conn->close();
?>
