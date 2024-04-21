
<?php
// Database configuration
$servername = "localhost"; // Change this to your database host
$username = "helper"; // Change this to your database username
$password = "feelBetter"; // Change this to your database password
$dbname = "doctorWho"; // Change this to your database name

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}