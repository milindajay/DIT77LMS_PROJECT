<?php include('includes/header.php'); ?>

<div class="container">
    <h1>Welcome to the Student Management System</h1>

    <!-- Button to create a new student -->
    <a href="create_student.php"><button>Create New Student</button></a>

    <h2>Student List</h2>

    <!-- Search Bar for students -->
    <input type="text" id="search" placeholder="Search for a student..." />

    <!-- Table to display student data -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Example: Fetch student data from the database
            include('includes/db.php');
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);

// Check if students exist and display them
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>
                            <a href='edit_student.php?id=" . $row['id'] . "'><button>Edit</button></a>
                            <a href='delete_student.php?id=" . $row['id'] . "'><button>Delete</button></a>
                          </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No students found</td></tr>";
}
?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>