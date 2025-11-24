<?php
// Sample settings data
$settings = [
    'site_title' => 'CodeQuiz',
    'admin_email' => 'admin@codequiz.com',
    'items_per_page' => 10,
    'maintenance_mode' => false,
    'registration_enabled' => true,
    'default_user_role' => 'User',
    'timezone' => 'Asia/Manila',
    'date_format' => 'F j, Y',
    'time_format' => 'g:i A'
];

// Available timezones
$timezones = [
    'Asia/Manila' => 'Manila (UTC+8)',
    'Asia/Tokyo' => 'Tokyo (UTC+9)',
    'Asia/Shanghai' => 'Shanghai (UTC+8)',
    'Asia/Singapore' => 'Singapore (UTC+8)',
    'UTC' => 'UTC (UTC+0)'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - CodeQuiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar d-print-none">
                <div class="d-flex flex-column p-3">
                    <a href="admin_dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Admin Panel</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="admin_dashboard.php" class="nav-link active">
                                <i class='bx bxs-dashboard'></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="admin_users.php" class="nav-link">
                                <i class='bx bxs-user-detail'></i> Users
                            </a>
                        </li>
                        <li>
                            <a href="admin_quizzes.php" class="nav-link">
                                <i class='bx bxs-book-content'></i> Quizzes
                            </a>
                        </li>
                        <li>
                            <a href="admin_reports.php" class="nav-link">
                                <i class='bx bxs-report'></i> Reports
                            </a>
                        </li>
                        <li>
                            <a href="admin_settings.php" class="nav-link">
                                <i class='bx bxs-cog'></i> Settings
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Settings</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-sm btn-primary" id="saveSettings">
                            <i class='bx bx-save me-1'></i> Save Changes
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <!-- General Settings -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold">General Settings</h6>
                            </div>
                            <div class="card-body">
                                <form id="generalSettings">
                                    <div class="mb-3">
                                        <label for="siteTitle" class="form-label">Site Title</label>
                                        <input type="text" class="form-control" id="siteTitle" value="<?php echo htmlspecialchars($settings['site_title']); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="adminEmail" class="form-label">Admin Email</label>
                                        <input type="email" class="form-control" id="adminEmail" value="<?php echo htmlspecialchars($settings['admin_email']); ?>">
                                        <div class="form-text">This address is used for admin purposes, like new user notifications.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="itemsPerPage" class="form-label">Items Per Page</label>
                                        <select class="form-select" id="itemsPerPage">
                                            <?php for ($i = 5; $i <= 50; $i += 5): ?>
                                                <option value="<?php echo $i; ?>" <?php echo $i == $settings['items_per_page'] ? 'selected' : ''; ?>>
                                                    <?php echo $i; ?> items
                                                </option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Registration</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="registrationEnabled" <?php echo $settings['registration_enabled'] ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="registrationEnabled">
                                                Allow new user registrations
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="defaultUserRole" class="form-label">Default User Role</label>
                                        <select class="form-select" id="defaultUserRole">
                                            <option value="User" <?php echo $settings['default_user_role'] === 'User' ? 'selected' : ''; ?>>User</option>
                                            <option value="Editor" <?php echo $settings['default_user_role'] === 'Editor' ? 'selected' : ''; ?>>Editor</option>
                                            <option value="Admin" <?php echo $settings['default_user_role'] === 'Admin' ? 'selected' : ''; ?>>Administrator</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Maintenance Mode -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold">Maintenance Mode</h6>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-warning">
                                    <i class='bx bx-info-circle'></i> When maintenance mode is enabled, only administrators can access the site.
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="maintenanceMode" <?php echo $settings['maintenance_mode'] ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="maintenanceMode">
                                        Enable Maintenance Mode
                                    </label>
                                </div>
                                <div class="mt-3" id="maintenanceMessageContainer" style="display: none;">
                                    <label for="maintenanceMessage" class="form-label">Maintenance Message</label>
                                    <textarea class="form-control" id="maintenanceMessage" rows="3" placeholder="We'll be back soon!"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- System Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold">System Information</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <span>PHP Version</span>
                                        <span class="badge bg-primary rounded-pill"><?php echo phpversion(); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <span>Server Software</span>
                                        <span class="text-end"><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'N/A'; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <span>Server Name</span>
                                        <span><?php echo $_SERVER['SERVER_NAME'] ?? 'localhost'; ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle maintenance message field
        document.getElementById('maintenanceMode').addEventListener('change', function() {
            document.getElementById('maintenanceMessageContainer').style.display = 
                this.checked ? 'block' : 'none';
        });

        // Trigger change event on page load if maintenance mode is enabled
        if (document.getElementById('maintenanceMode').checked) {
            document.getElementById('maintenanceMessageContainer').style.display = 'block';
        }

        // Save settings
        document.getElementById('saveSettings').addEventListener('click', function() {
            // In a real application, this would send an AJAX request to save the settings
            alert('Settings saved successfully!');
        });
    </script>
</body>
</html>
