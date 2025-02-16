<?php
session_start();
require 'config.php'; // Database connection

// Check if username and password are set
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header('Location: index.php?showLogin=true&error=missing_credentials');
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

// Check for students
$stmt = $conn->prepare("SELECT * FROM library WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {

        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'student';

        // Redirect to the main library interface for students
        header('Location: index.php?page=main');
        exit;
    } else {
        // Invalid password
        header('Location: index.php?showLogin=true&error=invalid_credentials');
        exit;
    }
} else {
    // Check for teachers
    $stmt = $conn->prepare("SELECT * FROM teachers WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
        
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'teacher';

            header('Location: index.php?page=teachermain');
            exit;
        } else {
        
            header('Location: index.php?showLogin=true&error=invalid_credentials');
            exit;
        }
    } else {
        // Username not found
        header('Location: index.php?showLogin=true&error=invalid_credentials');
        exit;
    }
}
?>