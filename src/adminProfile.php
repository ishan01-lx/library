<?php
require 'config.php'; // Database connection

$username = $_SESSION['username'];
$stmt = $conn->prepare('SELECT * FROM teachers WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();


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
                <a href="index.php?page=teachermain" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Back</a>
        </div>
        <h1 class="text-4xl font-bold pt-8 pb-2 text-center text-blue-900">Profile</h1>
        <div class="flex justify-start w-full my-10">
        <div class="bg-white p-8 rounded shadow-lg w-full">
            <h2 class="text-2xl font-bold mb-4">Admin Information</h2>
            <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['fullName']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <div class="mt-4">
                <a href="index.php?page=teacherRegister" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Edit Profile</a>
            </div>
        </div>
        
    </div>