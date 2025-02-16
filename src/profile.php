<?php
require 'config.php'; // Database connection

$username = $_SESSION['username'];
$stmt = $conn->prepare('SELECT * FROM library WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$rollNbr = $user['rollNbr'];
$stmt = $conn->prepare('SELECT COUNT(*) as issue_count FROM issuebook WHERE roll = ?');
$stmt->bind_param('i', $rollNbr);
$stmt->execute();
$result = $stmt->get_result();
$issue = $result->fetch_assoc();
$issue_count = $issue['issue_count'];

?>

<div class="container mx-auto px-20">
        <div class="flex justify-center items-center mt-5">
            <a href="https://nss.edu.np"><img src="../images/logo.png" alt="logo" class="h-40"></a>
        </div>
      
        <h1 class="text-4xl font-bold pt-8 pb-2 text-center">
                    NSS Library Management
        </h1>
        <div class="text-center">
            <h1 class="pb-2">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p></p>
        </div>
        
        <div class="mt-4">
            <a href="index.php?page=main" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Back</a>
        </div>
        <h1 class="text-4xl font-bold pt-8 pb-2 text-center text-blue-900">Profile</h1>
        <div class="flex justify-evenly">
        <div class="bg-white p-8 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-4">User Information</h2>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['fullName']); ?></p>
            <p><strong>Class:</strong> <?php echo htmlspecialchars($user['class']); ?></p>
            <p><strong>Roll No.:</strong> <?php echo htmlspecialchars($user['rollNbr']); ?></p>
            <div class="mt-4">
                <a href="index.php?page=editProfile" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Edit Profile</a>
            </div>
        </div>
        <div class="w-20"></div>
        <a href="index.php?page=user">
            <div class="flex justify-between items-center mr-4 bg-blue-700 p-5 text-white rounded-lg w-48 h-25">
                <div class="">
                <p>Books issued</p>
                <h2 class="text-2xl font-bold"><?php echo $issue_count; ?></h2>
                
                </div>
                <i class="fa-solid fa-book text-4xl"></i>
            </div>
        </a>
        
        </div>
        
    </div>