<?php include('includes/header.php'); ?>

<div class="container">
    <h1>Edit Student</h1>

    <?php
    // Example: Retrieve student ID from URL and fetch data from the database
    $student_id = $_GET['id'];
// Database query here to fetch student data by ID...
?>

    <!-- Form to edit student data -->
    <form action="edit_student_action.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $student_id; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="John Doe" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="john@example.com" required>

        <button type="submit">Update Student</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>