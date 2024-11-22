<?php include('includes/header.php'); ?>

<div class="container">
    <h1>Create New Student</h1>

    <!-- Form for creating a new student -->
    <form action="create_student_action.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <button type="submit">Create Student</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>