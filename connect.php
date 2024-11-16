<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default password is empty in XAMPP
$database = "dbmsassignment";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn){
    die("Connection failed: " . $conn->connect_error);
}

