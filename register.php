<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "loginquiz"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if email or username already exists
$check = $conn->prepare("SELECT * FROM register WHERE email = ? OR username = ?");
$check->bind_param("ss", $email, $username);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    header("Location: login.html?error=exists&tab=register");
    exit();
} else {
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO register (fname, lname, username, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fname, $lname, $username, $email, $password);

    if ($stmt->execute()) {
        // Redirect to login with success message
        header("Location: login.html?success=true");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
