<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("SELECT * FROM teachers WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header('Location: index.php?page=teacherRegister&error=username_taken');
        exit;
    } else {
        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO teachers (fullName, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullName, $email, $username, $password);
        $stmt->execute();

        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to the main library interface
        header('Location: index.php?page=main');
        exit;
    }
}
?>


<h1 class="text-4xl font-bold text-center pt-14">Register your account</h1>
<div id="registerForm" class="text-black my-10 justify-start px-20">
    <form action="teacherRegister.php" method="post">
        <label for="fullName">Full name:</label><br>
        <input type="text" id="fullName" name="fullName" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required autocomplete="off">
        <br>
        
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required autocomplete="off">
        <br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required>
        <input type="checkbox" onclick="toggle()">Show password
        <br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required>
        <br>
        <br>
        <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded">Sign up</button>
    </form>
    <div class="mt-11">
        <p class="mb-3">Already have an account? </p>
        <a href="index.php?page=login" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded">Login</a>
    </div>
</div>

<script src="toggle.js"></script>