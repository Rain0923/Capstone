<?php
// Sample reports data
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
    ['username' => 'admin', 'action' => 'Generated quiz report', 'created_at' => date('Y-m-d H:i:s', strtotime('-2 hours'))],
    ['username' => 'mikebrown', 'action' => 'Downloaded certificate', 'created_at' => date('Y-m-d H:i:s', strtotime('-3 hours'))],
    ['username' => 'sarajohnson', 'action' => 'Achieved High Score in HTML5 & CSS3 quiz', 'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - CodeQuiz</title>
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
                    <h1 class="h2">Reports</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Print</button>
                        </div>
                    </div>
                </div>

                <!-- Recent Quizzes -->
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold">Recent Quiz Attempts</h6>
                                <a href="#" class="btn btn-sm btn-primary">View All</a>
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
                                                <td>@<?php echo htmlspecialchars($quiz['user_name']); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php 
                                                        echo $quiz['score'] >= 90 ? 'success' : 
                                                            ($quiz['score'] >= 70 ? 'primary' : 
                                                            ($quiz['score'] >= 50 ? 'warning' : 'danger')); 
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

                    <!-- Recent Activities -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold">Recent Activities</h6>
                                <a href="#" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <?php foreach ($recentActivities as $activity): ?>
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1"><?php echo htmlspecialchars($activity['action']); ?></h6>
                                            <small class="text-muted"><?php echo date('M d, H:i', strtotime($activity['created_at'])); ?></small>
                                        </div>
                                        <small class="text-muted">By @<?php echo htmlspecialchars($activity['username']); ?></small>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</body>
</html>
