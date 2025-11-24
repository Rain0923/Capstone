<?php
// Sample users data
$users = [
    ['id' => 1, 'username' => 'admin', 'email' => 'admin@example.com', 'role' => 'Admin', 'status' => 'Active', 'joined' => '2024-01-15', 'last_login' => date('Y-m-d H:i:s')],
    ['id' => 2, 'username' => 'johndoe', 'email' => 'john@example.com', 'role' => 'User', 'status' => 'Active', 'joined' => '2024-02-20', 'last_login' => date('Y-m-d H:i:s', strtotime('-1 day'))],
    ['id' => 3, 'username' => 'janesmith', 'email' => 'jane@example.com', 'role' => 'User', 'status' => 'Active', 'joined' => '2024-02-25', 'last_login' => date('Y-m-d H:i:s', strtotime('-2 days'))],
    ['id' => 4, 'username' => 'mikebrown', 'email' => 'mike@example.com', 'role' => 'User', 'status' => 'Inactive', 'joined' => '2024-03-10', 'last_login' => date('Y-m-d H:i:s', strtotime('-30 days'))],
    ['id' => 5, 'username' => 'sarajohnson', 'email' => 'sara@example.com', 'role' => 'User', 'status' => 'Active', 'joined' => '2024-03-15', 'last_login' => date('Y-m-d H:i:s', strtotime('-3 days'))],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - CodeQuiz</title>
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
                    <h1 class="h2">User Management</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class='bx bx-plus'></i> Add New User
                        </button>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">All Users</h6>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control form-control-sm" placeholder="Search users...">
                            <button class="btn btn-outline-secondary btn-sm" type="button">
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Joined</th>
                                        <th>Last Login</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $user['id']; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <div class="avatar-sm bg-light rounded-circle">
                                                        <i class='bx bxs-user-circle fs-4 text-muted'></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold"><?php echo htmlspecialchars($user['username']); ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo $user['role'] === 'Admin' ? 'primary' : 'secondary'; ?>">
                                                <?php echo $user['role']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-<?php echo $user['status'] === 'Active' ? 'success' : 'secondary'; ?>">
                                                <?php echo $user['status']; ?>
                                            </span>
                                        </td>
                                        <td><?php echo date('M d, Y', strtotime($user['joined'])); ?></td>
                                        <td><?php echo date('M d, Y', strtotime($user['last_login'])); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class='bx bx-edit-alt'></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" required>
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add User</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</body>
</html>
