<?php include('includes/header.php'); ?>

<div class="container">
    <h1>Manage Students</h1>

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
            <!-- Example row -->
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>
                    <!-- Edit Button (could open a modal for editing) -->
                    <button onclick="editStudent(1)">Edit</button>
                    <!-- Delete Button (could redirect to delete script) -->
                    <button onclick="deleteStudent(1)">Delete</button>
                </td>
            </tr>
            <!-- Additional rows will go here -->
        </tbody>
    </table>

    <!-- Add Student Button -->
    <a href="create_student.php"><button>Create New Student</button></a>
</div>

<?php include('includes/footer.php'); ?>