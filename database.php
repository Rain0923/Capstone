<?php
// Database configuration
$host = 'localhost';
$dbname = 'codequiz';
$username = 'root';
$password = '';

try {
    // Create PDO instance with MySQL connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Create tables for gamification features
try {
    // Create achievements table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS achievements (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT,
            achievement_name VARCHAR(100),
            achievement_type VARCHAR(50),
            unlock_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )
    ");

    // Create game_stats table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS game_stats (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT,
            game_mode VARCHAR(50),
            language VARCHAR(50),
            difficulty VARCHAR(50),
            score INT,
            total_questions INT,
            correct_answers INT,
            time_taken INT,
            streak INT,
            date_played TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )
    ");

    // Create debugging_levels table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS debugging_levels (
            id INT PRIMARY KEY AUTO_INCREMENT,
            level_number INT,
            difficulty VARCHAR(50),
            language VARCHAR(50),
            question_count INT,
            time_limit INT,
            bug_count INT
        )
    ");

    // Create debugging_questions table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS debugging_questions (
            id INT PRIMARY KEY AUTO_INCREMENT,
            level_id INT,
            question_text TEXT,
            correct_answer TEXT,
            error_type VARCHAR(50),
            FOREIGN KEY (level_id) REFERENCES debugging_levels(id)
        )
    ");
} catch(PDOException $e) {
    die("Error creating tables: " . $e->getMessage());
}
?>
