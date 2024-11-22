<?php

// Enable debugging in development environment only
$debug = true;

// Replace with your own database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'StudentLMS';

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    if ($debug) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        die("Connection failed. Please contact support.");
    }
} else {
    if ($debug) {
        echo "Database connection successful!";
    }
}