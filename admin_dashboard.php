<?php
// Sample data for demonstration
$stats = [
    'total_users' => 128,
    'total_quizzes' => 542,
    'avg_score' => 72.5,
    'active_users' => 87
];

$topUsers = [
    ['username' => 'admin', 'email' => 'admin@example.com', 'quizzes_taken' => 45, 'average_score' => 92.5, 'last_login' => date('Y-m-d H:i:s')],
    ['username' => 'johndoe', 'email' => 'john@example.com', 'quizzes_taken' => 38, 'average_score' => 88.2, 'last_login' => date('Y-m-d H:i:s', strtotime('-1 day'))],
    ['username' => 'janesmith', 'email' => 'jane@example.com', 'quizzes_taken' => 32, 'average_score' => 85.7, 'last_login' => date('Y-m-d H:i:s', strtotime('-2 days'))],
    ['username' => 'mikebrown', 'email' => 'mike@example.com', 'quizzes_taken' => 28, 'average_score' => 82.1, 'last_login' => date('Y-m-d H:i:s', strtotime('-3 days'))],
    ['username' => 'sarajohnson', 'email' => 'sara@example.com', 'quizzes_taken' => 25, 'average_score' => 79.8, 'last_login' => date('Y-m-d H:i:s', strtotime('-4 days'))]
];

$recentQuizzes = [
    ['quiz_title' => 'Python Basics', 'user_name' => 'johndoe', 'score' => 92, 'completed_at' => date('Y-m-d H:i:s')],
    ['quiz_title' => 'JavaScript Advanced', 'user_name' => 'janesmith', 'score' => 85, 'completed_at' => date('Y-m-d H:i:s', strtotime('-1 hour'))],
    ['quiz_title' => 'PHP OOP', 'user_name' => 'mikebrown', 'score' => 78, 'completed_at' => date('Y-m-d H:i:s', strtotime('-2 hours'))],
    ['quiz_title' => 'HTML5 & CSS3', 'user_name' => 'sarajohnson', 'score' => 95, 'completed_at' => date('Y-m-d H:i:s', strtotime('-3 hours'))],
    ['quiz_title' => 'Database Design', 'user_name' => 'alexwilson', 'score' => 88, 'completed_at' => date('Y-m-d H:i:s', strtotime('-1 day'))]
];

$recentActivities = [
    ['username' => 'johndoe', 'action' => 'Completed Python Basics quiz with 92%', 'created_at' => date('Y-m-d H:i:s')],
    ['username' => 'janesmith', 'action' => 'Started JavaScript Advanced quiz', 'created_at' => date('Y-m-d H:i:s', strtotime('-1 hour'))],
    ['username' => 'admin', 'action' => 'Added new questions to Database quiz', 'created_at' => date('Y-m-d H:i:s', strtotime('-2 hours'))],
    ['username' => 'mikebrown', 'action' => 'Updated profile information', 'created_at' => date('Y-m-d H:i:s', strtotime('-3 hours'))],
    ['username' => 'sarajohnson', 'action' => 'Achieved High Score in HTML5 & CSS3 quiz', 'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CodeQuiz</title>
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
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <i class='bx bxs-calendar'></i> This week
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card stat-card primary h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value"><?php echo number_format($stats['total_users']); ?></div>
                                        <div class="stat-label">Total Users</div>
                                    </div>
                                    <i class='bx bxs-user-check fs-1 text-primary'></i>
                                </div>
                            </div>
                            <a href="users.php" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card stat-card success h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value"><?php echo number_format($stats['total_quizzes']); ?></div>
                                        <div class="stat-label">Tasks Taken</div>
                                    </div>
                                    <i class='bx bxs-check-circle fs-1 text-success'></i>
                                </div>
                            </div>
                            <a href="reports.php" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card stat-card info h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value"><?php echo $stats['avg_score']; ?>%</div>
                                        <div class="stat-label">Avg. Score</div>
                                    </div>
                                    <i class='bx bx-line-chart fs-1 text-info'></i>
                                </div>
                            </div>
                            <a href="reports.php" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card stat-card warning h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value"><?php echo $stats['active_users']; ?></div>
                                        <div class="stat-label">Active Users (30d)</div>
                                    </div>
                                    <i class='bx bxs-group fs-1 text-warning'></i>
                                </div>
                            </div>
                            <a href="reports.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Top Users -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold">Top Users</h6>
                                <a href="users.php" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Quizzes</th>
                                                <th>Avg. Score</th>
                                                <th>Last Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($topUsers as $user): ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2">
                                                            <div class="avatar-sm bg-light rounded-circle">
                                                                <i class='bx bxs-user-circle fs-4 text-muted'></i>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="fw-semibold"><?php echo htmlspecialchars($user['username']); ?></div>
                                                            <small class="text-muted"><?php echo htmlspecialchars($user['email']); ?></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $user['quizzes_taken']; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $user['average_score']; ?>%;" 
                                                                aria-valuenow="<?php echo $user['average_score']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="text-nowrap"><?php echo number_format($user['average_score'], 1); ?>%</span>
                                                    </div>
                                                </td>
                                                <td><?php echo date('M d, Y', strtotime($user['last_login'])); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Quizzes -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold">Recent Quizzes</h6>
                                <a href="reports.php" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Quiz</th>
                                                <th>User</th>
                                                <th>Score</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($recentQuizzes as $quiz): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($quiz['quiz_title']); ?></td>
                                                <td><?php echo htmlspecialchars($quiz['user_name']); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php 
                                                        echo $quiz['score'] >= 80 ? 'success' : 
                                                            ($quiz['score'] >= 50 ? 'warning' : 'danger'); 
                                                    ?>">
                                                        <?php echo $quiz['score']; ?>%
                                                    </span>
                                                </td>
                                                <td><?php echo date('M d, H:i', strtotime($quiz['completed_at'])); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">Recent Activities</h6>
                        <a href="reports.php" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <?php foreach ($recentActivities as $activity): ?>
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1"><?php echo htmlspecialchars($activity['username']); ?></h6>
                                    <small class="text-muted"><?php echo date('M d, H:i', strtotime($activity['created_at'])); ?></small>
                                </div>
                                <p class="mb-1"><?php echo htmlspecialchars($activity['action']); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="index.js"></script>

</body>
</html>
