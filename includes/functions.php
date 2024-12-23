<?php

// Function to get all students from the database
function getAllStudents($conn)
{
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Function to get a single student by ID
function getStudentById($conn, $id)
{
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}


// Function to generate a random 6-digit student number
function generateStudentNumber($conn)
{
    $studentNumber = rand(100000, 999999);

    // Check if the generated student number already exists
    $sql = "SELECT * FROM students WHERE student_number = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $studentNumber);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // If the student number exists, generate a new one recursively
    if (mysqli_num_rows($result) > 0) {
        return generateStudentNumber($conn);
    }

    return $studentNumber;
}

// Function to validate NIC
function validateNIC($nic)
{
    $nic = strtoupper($nic); // Convert to uppercase
    if (preg_match('/^(\d{9}[VX]|\d{12})$/', $nic)) {
        return true;
    }
    return false;
}

// Function to extract DOB from NIC
function extractDOBFromNIC($nic)
{
    $nic = strtoupper($nic);
    if (preg_match('/^(\d{9}[VX])$/', $nic)) { // Old NIC format
        $year = substr($nic, 0, 2);
        $year = $year < 50 ? "20" . $year : "19" . $year; // Assume 20th century for years below 50
        $day = substr($nic, 2, 3);
        $dob = DateTime::createFromFormat('Yz', $year . $day);
        return $dob->format('Y-m-d');
    } elseif (preg_match('/^(\d{12})$/', $nic)) { // New NIC format
        $year = substr($nic, 0, 4);
        $day = substr($nic, 4, 3);
        $dob = DateTime::createFromFormat('Yz', $year . $day);
        return $dob->format('Y-m-d');
    }
    return false;
}

// Function to validate phone number
function validatePhoneNumber($phoneNumber)
{
    if (preg_match('/^07\d{8}$/', $phoneNumber)) {
        return true;
    }
    return false;
}

// Function to check for duplicate email, phone number, or NIC
function checkDuplicate($conn, $email, $phoneNumber, $nic)
{
    $sql = "SELECT * FROM students WHERE email = ? OR phone_number = ? OR nic = ?"; // Changed student_number to nic
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $email, $phoneNumber, $nic);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        return true; // Duplicate found
    }
    return false; // No duplicates
}

// Function to create a new student (updated)
function createStudent($conn, $name, $email, $phone_number, $address, $course, $password, $nic)
{
    // Validate NIC
    if (!validateNIC($nic)) {
        return "Invalid NIC format.";
    }

    // Validate phone number
    if (!validatePhoneNumber($phone_number)) {
        return "Invalid phone number format.";
    }

    // Check for duplicates
    if (checkDuplicate($conn, $email, $phone_number, $nic)) {
        return "Duplicate email, phone number, or NIC found.";
    }

    // Generate student number
    $studentNumber = generateStudentNumber($conn);

    // Extract DOB from NIC
    $dob = extractDOBFromNIC($nic);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (student_number, name, email, phone_number, address, course, password, nic, dob) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issssssss", $studentNumber, $name, $email, $phone_number, $address, $course, $hashedPassword, $nic, $dob);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return "Error creating student: " . mysqli_error($conn);
    }
}


// Function to update an existing student
function updateStudent($conn, $id, $student_number, $name, $email, $phone_number, $address, $course)
{
    $sql = "UPDATE students SET student_number = ?, name = ?, email = ?, phone_number = ?, address = ?, course = ? 
            WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $student_number, $name, $email, $phone_number, $address, $course, $id);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a student
function deleteStudent($conn, $id)
{
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}