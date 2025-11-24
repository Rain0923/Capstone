<!-- Sidebar -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky pt-3">
        <div class="text-center mb-4">
            <h4 class="text-white">CodeQuiz Admin</h4>
            <div class="text-muted small">Administrator</div>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_dashboard.php">
                    <i class='bx bxs-dashboard me-2'></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_users.php">
                    <i class='bx bxs-user me-2'></i>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white active" href="admin_quizzes.php">
                    <i class='bx bxs-quiz me-2'></i>
                    Quizzes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_reports.php">
                    <i class='bx bxs-report me-2'></i>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_settings.php">
                    <i class='bx bxs-cog me-2'></i>
                    Settings
                </a>
            </li>
        </ul>

        <div class="position-absolute bottom-0 start-0 p-3 w-100 bg-dark">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://via.placeholder.com/32" alt="Admin" width="32" height="32" class="rounded-circle me-2">
                    <strong>Admin User</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Activity Log</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
