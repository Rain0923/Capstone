<?php
// Start session at the beginning of the script
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gamification_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data and sanitize
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    // Basic validation
    if (empty($email) || empty($password)) {
        header("Location: login.php?error=emptyfields");
        exit();
    }

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Email not found
        header("Location: login.php?error=email");
        exit();
    }

    $user = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
        
        // Regenerate session ID for security
        session_regenerate_id(true);
        
        // Redirect to dashboard
        header("Location: index.php");
        exit();
    } else {
        // Incorrect password
        header("Location: login.php?error=password");
        exit();
    }
    
    $stmt->close();
    $conn->close();
} else {
    // If someone tries to access this page directly without submitting the form
    header("Location: login.php");
    exit();
}
?>
