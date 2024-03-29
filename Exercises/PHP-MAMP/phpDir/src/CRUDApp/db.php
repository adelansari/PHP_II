<?php
$servername = "db";
$dbUsername = "root";
$dbPassword = "lionPass";
$dbname = "loginapp";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
