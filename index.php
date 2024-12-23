<?php

session_start();
include('includes/db.php');
include('includes/auth.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticateUser($conn, $username, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
        include('templates/login.html');
    }
} else {
    include('templates/login.html');
}