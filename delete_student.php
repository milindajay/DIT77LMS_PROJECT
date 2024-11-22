<?php

// Get the student ID from the URL
$student_id = $_GET['id'];

// Perform the deletion operation here (e.g., database query to delete the student)
include('includes/db.php'); // Include your database connection file
$query = "DELETE FROM students WHERE id = $student_id";
mysqli_query($conn, $query);

// Redirect back to the student list page
header("Location: student.php");
exit();
