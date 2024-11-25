<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="includes/assets/images/favicon.ico" type="image/x-icon">
    <title>Student LMS</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="includes/assets/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="includes/assets/css/style.css">
</head>

<body>
    <div class="d-md-flex">
        <!-- Sidebar -->
        <!-- Sidebar -->
        <nav class="sidebar bg-dark vh-100 px-2 py-4 text-white d-none d-md-flex flex-column justify-content-between"
            id="desktopSidebar">
            <!-- Top Section -->
            <div>
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="includes/assets/images/imbslogo.png" alt="Logo" class="img-fluid"
                        style="max-height: 60px;">
                </div>

                <hr>

                <!-- User Info -->
                <div class="text-center mb-4">
                    <img src="includes/assets/images/profile/<?php echo $_SESSION['profile_photo'] ?? 'default.jpg'; ?>"
                        alt="Profile Photo" class="rounded-circle" style="width: 80px; height: 80px;">
                    <p class="mt-2 poppins-light">Welcome, <span
                            class="poppins-regular"><?php echo $_SESSION['username'] ?? 'User'; ?>!</span></p>
                </div>

                <!-- Profile Buttons -->
                <div class="d-flex justify-content-evenly mb-4">
                    <button type="button" class="btn btn-outline-primary btn-sm"
                        onclick="window.location.href='edit_profile.php'">
                        Edit Profile <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-sm"
                        onclick="window.location.href='logout.php'">
                        Logout <i class="bi bi-box-arrow-right"></i>
                    </button>
                </div>

                <!-- Menu -->
                <div class="menu p-3">
                    <ul class="nav flex-column">
                        <hr class="m-0">
                        <li class="nav-item d-flex align-items-center px-3">
                            <i class="bi bi-house-door"></i> <a class="nav-link active link-light"
                                href="dashboard.php">Home</a>
                        </li>
                        <hr class="m-0">
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php">Manage Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">Manage Courses</a>
                        </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] == 'staff'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="students.php">Manage Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="attendance.php">Attendance</a>
                        </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] == 'instructor'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="assignments.php">Manage Assignments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">My Courses</a>
                        </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] == 'student'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="my_courses.php">My Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="results.php">My Results</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- Footer Section -->
            <div class="text-center copywrite poppins-light">
                <span>&copy; <?php echo date('Y'); ?> Student LMS. All rights reserved.</span>
                <br>
                <span id="currentDateTime"></span>
            </div>
        </nav>



        <!-- Mobile Sidebar (Collapsible) -->
        <nav class="navbar navbar-dark bg-dark d-md-none">
            <div class="container-fluid">
                <button class="navbar-toggler" id="mobileSidebarToggler" type="button" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="mobile-sidebar-overlay d-none" id="mobileSidebarOverlay">
            <div class="bg-dark text-white mobile-sidebar vh-100 d-flex flex-column justify-content-between"
                id="mobileSidebar">
                <div class="p-3">
                    <!-- Close Button -->
                    <button class="btn btn-link text-white position-absolute top-0 end-0 mt-2 me-2 border border-danger"
                        id="closeSidebarBtn">
                        <i class="bi bi-x-lg"></i>
                    </button>

                    <div class="text-center mb-4">
                        <img src="includes/assets/images/imbslogo.png" alt="Logo" class="img-fluid"
                            style="max-height: 60px;">
                    </div>
                    <hr>
                    <div class="text-center mb-4">
                        <img src="includes/assets/images/profile/<?php echo $_SESSION['profile_photo'] ?? 'default.jpg'; ?>"
                            alt="Profile Photo" class="rounded-circle" style="width: 80px; height: 80px;">
                        <p class="mt-2 poppins-light">Welcome, <span
                                class="poppins-regular"><?php echo $_SESSION['username'] ?? 'User'; ?>!</span> </p>
                    </div>
                    <ul class="nav flex-column">
                        <hr class="m-0">
                        <li class="nav-item d-flex align-items-center px-3">
                            <i class="bi bi-house-door"></i> <a class="nav-link active link-light"
                                href="dashboard.php">Home</a>
                        </li>
                        <hr class="m-0">
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php">Manage Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">Manage Courses</a>
                        </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] == 'staff'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="students.php">Manage Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="attendance.php">Attendance</a>
                        </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] == 'instructor'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="assignments.php">Manage Assignments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">My Courses</a>
                        </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] == 'student'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="my_courses.php">My Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="results.php">My Results</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="text-center copywrite poppins-light py-3">
                    <span>&copy; <?php echo date('Y'); ?> Student LMS. All rights reserved.</span>
                </div>
            </div>
        </div>




        <!-- Main Content -->
        <main class="flex-grow-1 p-3">