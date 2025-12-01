<?php
// DATABASE CONFIG
$host = "localhost";
$user = "root";
$pass = "";
$db   = "gamification_db";

// CONNECT TO MYSQL
$conn = new mysqli($host, $user, $pass);

// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CREATE DATABASE IF NOT EXISTS
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if ($conn->query($sql) === TRUE) {
    echo "Database created or already exists.<br>";
} else {
    die("Database creation failed: " . $conn->error);
}

// SELECT THE DATABASE
$conn->select_db($db);

echo "Using database: $db<br><br>";


// ================================
// 1. REGISTER TABLE
// ================================
$table1 = "
CREATE TABLE IF NOT EXISTS register (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($table1);
echo "Table: register ✔<br>";


// ================================
// 2. QUIZ QUESTIONS TABLE
// ================================
$table2 = "
CREATE TABLE IF NOT EXISTS quiz_questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    choice_a VARCHAR(255) NOT NULL,
    choice_b VARCHAR(255) NOT NULL,
    choice_c VARCHAR(255) NOT NULL,
    choice_d VARCHAR(255) NOT NULL,
    correct_answer VARCHAR(10) NOT NULL,
    difficulty VARCHAR(50),
    level INT DEFAULT 1
)";
$conn->query($table2);
echo "Table: quiz_questions ✔<br>";


// ================================
// 3. DEBUGGING QUESTIONS TABLE
// ================================
$table3 = "
CREATE TABLE IF NOT EXISTS debugging_questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code_snippet TEXT NOT NULL,
    hint TEXT,
    correct_code TEXT NOT NULL,
    difficulty VARCHAR(50),
    level INT DEFAULT 1
)";
$conn->query($table3);
echo "Table: debugging_questions ✔<br>";


// ================================
// 4. ACHIEVEMENTS TABLE
// ================================
$table4 = "
CREATE TABLE IF NOT EXISTS achievements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(255),
    requirement VARCHAR(255),
    icon VARCHAR(255)
)";
$conn->query($table4);
echo "Table: achievements ✔<br>";


// ================================
// 5. USER ACHIEVEMENTS TABLE
// ================================
$table5 = "
CREATE TABLE IF NOT EXISTS user_achievements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    achievement_id INT NOT NULL,
    unlocked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES register(id),
    FOREIGN KEY (achievement_id) REFERENCES achievements(id)
)";
$conn->query($table5);
echo "Table: user_achievements ✔<br>";


// ================================
// 6. LEADERBOARD TABLE
// ================================
$table6 = "
CREATE TABLE IF NOT EXISTS leaderboard (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    score INT DEFAULT 0,
    game_mode VARCHAR(50),
    difficulty VARCHAR(50),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES register(id)
)";
$conn->query($table6);
echo "Table: leaderboard ✔<br>";


echo "<br><strong>All tables created successfully!</strong> 🚀";

?>
