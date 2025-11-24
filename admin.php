<?php
session_start();

// Database connection
$host = "localhost";
$dbname = "codequiz";
$db_username = "root";
$db_password = "";

// Hardcoded admin credentials (for demo purposes only)
$admin_username = "admin";
$admin_password = "admin123"; // In a real application, this should be hashed

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle admin login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check credentials (in a real app, verify against hashed password in database)
    if ($username === $admin_username && $password === $admin_password) {
        // Set session variables
        $_SESSION['user_id'] = 1; // Admin user ID
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        
        // Redirect to admin home
        header('Location: adminhome.php');
        exit();
    } else {
        // Invalid credentials, redirect back to login with error
        header('Location: login.html?error=admin');
        exit();
    }
}

// Check if user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: adminhome.html');
    exit();
}

// Get dashboard statistics
function getDashboardStats() {
    global $pdo;
    
    $stats = [];
    
    // Total users
    $stmt = $pdo->query("SELECT COUNT(*) as total_users FROM users");
    $stats['total_users'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_users'];
    
    // Total quizzes taken
    $stmt = $pdo->query("SELECT COUNT(*) as total_quizzes FROM quiz_attempts");
    $stats['total_quizzes'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_quizzes'];
    
    // Average score
    $stmt = $pdo->query("SELECT AVG(score) as avg_score FROM quiz_attempts");
    $stats['avg_score'] = number_format($stmt->fetch(PDO::FETCH_ASSOC)['avg_score'] ?? 0, 2);
    
    // Active users (logged in last 30 days)
    $stmt = $pdo->prepare("SELECT COUNT(*) as active_users FROM users WHERE last_login >= DATE_SUB(NOW(), INTERVAL 30 DAY)");
    $stmt->execute();
    $stats['active_users'] = $stmt->fetch(PDO::FETCH_ASSOC)['active_users'];
    
    return $stats;
}

// Get recent activities
function getRecentActivities($limit = 10) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT u.username, a.action, a.created_at 
        FROM user_activities a
        JOIN users u ON a.user_id = u.id
        ORDER BY a.created_at DESC 
        LIMIT ?
    ");
    $stmt->execute([$limit]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Admin Functions
function getQuizStats($quiz_id) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT 
            COUNT(*) as total_attempts,
            AVG(score) as average_score,
            MAX(score) as highest_score,
            MIN(created_at) as first_attempt,
            MAX(created_at) as last_attempt
        FROM quiz_attempts 
        WHERE quiz_id = ?
        GROUP BY quiz_id
    ");
    $stmt->execute([$quiz_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getTopUsers($limit = 10) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT 
            u.id,
            u.username, 
            u.email, 
            u.created_at as join_date,
            u.last_login,
            COUNT(a.id) as quizzes_taken, 
            AVG(a.score) as average_score,
            MAX(a.score) as highest_score,
            COUNT(DISTINCT a.quiz_id) as unique_quizzes
        FROM users u
        LEFT JOIN quiz_attempts a ON u.id = a.user_id
        GROUP BY u.id
        HAVING quizzes_taken > 0
        ORDER BY average_score DESC, quizzes_taken DESC
        LIMIT ?
    ");
    $stmt->execute([$limit]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getRecentQuizzes($limit = 5) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT 
            q.title as quiz_title,
            u.username as user_name,
            a.score,
            a.completed_at
        FROM quiz_attempts a
        JOIN quizzes q ON a.quiz_id = q.id
        JOIN users u ON a.user_id = u.id
        ORDER BY a.completed_at DESC
        LIMIT ?
    ");
    $stmt->execute([$limit]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserProgress($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT q.title, qa.score, qa.timestamp
        FROM quiz_attempts qa
        JOIN quizzes q ON qa.quiz_id = q.id
        WHERE qa.user_id = ?
        ORDER BY qa.timestamp DESC
    ");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Handle admin actions
if (isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'quiz-stats':
            $quiz_id = $_GET['quiz_id'];
            $stats = getQuizStats($quiz_id);
            echo json_encode($stats);
            exit;
            
        case 'top-users':
            $users = getTopUsers();
            echo json_encode($users);
            exit;
            
        case 'user-progress':
            $user_id = $_GET['user_id'];
            $progress = getUserProgress($user_id);
            echo json_encode($progress);
            exit;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>CodeQuiz Champions</title>
</head>

<body>

    <div class="dashboard"> 
        <div class="logo"> 
            <img src="hacker.gif" class="pic"> 
            <a href="adminhome.php"> <span class="logo-text"> QuizzardCode </a> </span>
        </div>
        <div class="nav-links">
            <a href="aquiz.php"><i class="bi bi-suit-heart"></i> Quizzes</a>
            <a href="aleaderboard.php"><i class="bi bi-trophy"></i> Leaderboard</a>
            <a href="admin.php"> <i class="bi bi-people"></i></i>  Admin</a>
            <a href="index.php">  Logout</a>
        </div>
    </div>

    <div class="picture">
        <img src="admin.png" alt="" srcset="">
    </div>

<script src="index.js"></script>
</body>
</html>
