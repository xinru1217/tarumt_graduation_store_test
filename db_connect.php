<?php
// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database credentials
$host = 'tarumt-graduation-store-db.c9se42ke4jn9.us-east-1.rds.amazonaws.com';
$port = 3306;
$dbname = 'tgsdb';
$username = 'admin';
$password = 'tarumt#admin#1234';

try {
    // Create a new mysqli connection
    $conn = new mysqli($host, $username, $password, $dbname, $port);
    
    // Check if the connection was successful
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    
} catch (Exception $e) {
    // Catch and display any exceptions
    die("Error: " . $e->getMessage());
}
?>
