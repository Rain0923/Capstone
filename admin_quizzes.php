<?php
// Sample quizzes data
$quizzes = [
    ['id' => 1, 'title' => 'Python Basics', 'category' => 'Python', 'difficulty' => 'Beginner', 'questions' => 10, 'attempts' => 45, 'status' => 'Active', 'created' => '2024-01-10'],
    ['id' => 2, 'title' => 'JavaScript', 'category' => 'JavaScript', 'difficulty' => 'Advanced', 'questions' => 15, 'attempts' => 32, 'status' => 'Active', 'created' => '2024-01-15'],
    ['id' => 3, 'title' => 'PHP', 'category' => 'PHP', 'difficulty' => 'Intermediate', 'questions' => 12, 'attempts' => 28, 'status' => 'Active', 'created' => '2024-01-20'],
    ['id' => 4, 'title' => 'C++', 'category' => 'C++', 'difficulty' => 'Beginner', 'questions' => 8, 'attempts' => 52, 'status' => 'Active', 'created' => '2024-02-01'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Management - CodeQuiz</title>
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
                    <h1 class="h2">Quiz Management</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addQuizModal">
                            <i class='bx bx-plus'></i> Create New Quiz
                        </button>
                    </div>
                </div>

                <!-- Quizzes Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">All Quizzes</h6>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control form-control-sm" placeholder="Search quizzes...">
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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Difficulty</th>
                                        <th>Questions</th>
                                        <th>Attempts</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($quizzes as $quiz): ?>
                                    <tr>
                                        <td><?php echo $quiz['id']; ?></td>
                                        <td>
                                            <a href="#" class="text-decoration-none">
                                                <?php echo htmlspecialchars($quiz['title']); ?>
                                            </a>
                                        </td>
                                        <td><?php echo htmlspecialchars($quiz['category']); ?></td>
                                        <td>
                                            <span class="badge bg-<?php 
                                                echo $quiz['difficulty'] === 'Beginner' ? 'success' : 
                                                    ($quiz['difficulty'] === 'Intermediate' ? 'warning' : 'danger'); 
                                            ?>">
                                                <?php echo $quiz['difficulty']; ?>
                                            </span>
                                        </td>
                                        <td><?php echo $quiz['questions']; ?></td>
                                        <td><?php echo $quiz['attempts']; ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo $quiz['status'] === 'Active' ? 'success' : 'secondary'; ?>">
                                                <?php echo $quiz['status']; ?>
                                            </span>
                                        </td>
                                        <td><?php echo date('M d, Y', strtotime($quiz['created'])); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class='bx bx-edit-alt'></i>
                                                </a>
                                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">View Questions</a></li>
                                                        <li><a class="dropdown-item" href="#">View Attempts</a></li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item text-<?php echo $quiz['status'] === 'Active' ? 'danger' : 'success'; ?>" href="#">
                                                            <?php echo $quiz['status'] === 'Active' ? 'Deactivate' : 'Activate'; ?>
                                                        </a></li>
                                                    </ul>
                                                </div>
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

    <!-- Add Quiz Modal -->
    <div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="addQuizModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuizModalLabel">Create New Quiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="quizTitle" class="form-label">Quiz Title</label>
                            <input type="text" class="form-control" id="quizTitle" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" required>
                                    <option value="">Select category</option>
                                    <option value="Python">Python</option>
                                    <option value="JavaScript">JavaScript</option>
                                    <option value="PHP">PHP</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="difficulty" class="form-label">Difficulty</label>
                                <select class="form-select" id="difficulty" required>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advanced">Advanced</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Create Quiz</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</body>
</html>
