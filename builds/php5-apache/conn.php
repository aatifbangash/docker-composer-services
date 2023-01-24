<?php
$servername = "172.29.34.54:3307";
$username = "root";
$password = "R00ttt";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
