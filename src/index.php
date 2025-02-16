<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSS | LIBRARY MANAGEMENT SYSTEM</title>

    <link href="output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
            opacity: 1;
            transition: opacity 2s ease-in-out;
        }
        .dropdown-menu {
            display: none;
            opacity: 0;
            transition: opacity 2s ease-in-out;
        }
    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('login')) {
                if (urlParams.get('login') === 'success') {
                    alert('You are successfully logged in!');
                }
            } else if (urlParams.has('error')) {
                if (urlParams.get('error') === 'missing_credentials') {
                    alert('Error: Missing credentials.');
                } else if (urlParams.get('error') === 'invalid_credentials') {
                    alert('Error: Invalid credentials.');
                }
            }
        });
    </script>
</head>
<body>

<!-- creating navbar -->
    <nav class="flex justify-between items-center bg-white shadow-md px-20 py-4 ">  

        <div id="nav-logo" >
            <a href="https://nss.edu.np"><img src="../images/logo.png" alt="navbar-logo" class="h-20"></a>
        </div>

        <div id="nav-info" class="md:flex md:items-center  hidden text-black ">
            <div id="nav-location" class="hover:text-blue-800">
                <a href="https://www.google.com/maps/place/NIST+College/@27.7180679,85.3141769,19.15z/data=!4m10!1m2!2m1!1snss+lainchaur!3m6!1s0x39eb191d53a21efd:0x17ba7ba15a30338b!8m2!3d27.7183592!4d85.3155994!15sCg1uc3MgbGFpbmNoYXVykgEXaGlnaGVyX3NlY29uZGFyeV9zY2hvb2zgAQA!16s%2Fg%2F1v42d64p?authuser=0&entry=ttu&g_ep=EgoyMDI1MDExNS4wIKXMDSoASAFQAw%3D%3D" class="flex items-center" class="hover:text-blue-800"><i class="fa-solid fa-location-dot px-2"></i>
                    <p class="">Lainchaur, Kathmandu</p></a>
            </div>

            <div class="nav-mail mx-6 flex items-center" class="hover:text-blue-800">
                <a href="#" class="hover:text-blue-800 flex items-center">
                <i class="fa-regular fa-envelope-open px-2"></i>
                <p> info@nss.edu.np</p
                </a>
                
            </div>
            <div class="nav-phone flex items-center" class="hover:text-blue-800">
                <a href="#" class="hover:text-blue-800 flex items-center">
                <i class="fa-solid fa-phone px-2 "></i>
                <p>+977 (1) 4523706 / 4522050 / 4529035 / 4528724</p>
                </a>
                
            </div>
        </div>
    </nav>

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    
    
    if ($page === 'main' ||  $page === 'profile') {
        include 'main-navbar.php';
    } 
    elseif ($page === 'add' || $page === 'update' || $page === 'delete' || $page === 'deleteUser' || $page === 'bookdetail' || $page === 'issueBook' || $page === 'adminProfile' || $page === 'dashboard' || $page === 'admin' || $page === 'user' || $page === 'books' || $page === 'teachermain' || $page === 'requestBook') {
        include 'teachermain_navbar.php';
    }
    else{
        ?>
         <div id="second-navbar fixed w-full">
        <div id="max-width" class="px-20 m-auto flex justify-evenly py-4">
            <div id="mainHead" class="text-center">
            <a href="#" class="text-black text-xl font-bold">
             Library <span class="text-blue-400 text-2xl">Management</span>
            </a>
            </div>

             <ul class="sm:flex hidden">
                <li><a href="index.php?page=home" class="mr-5 hover:text-blue-400">Home</a></li>
                <li><a href="index.php?page=about" class="mr-5 hover:text-blue-400">About Us</a></li>
                <li><a href="index.php?page=contact" class="mr-5 hover:text-blue-400">Contact</a></li>
                <li class="relative dropdown">
                    <a href="#" class="mr-5 hover:text-blue-400">Register</a>
                    <div class="dropdown-menu absolute hidden bg-white shadow-lg rounded mt-2">
                        <a href="index.php?page=register" class="block px-4 py-2 hover:bg-gray-200"> Student</a>
                        <hr>
                        <a href="index.php?page=teacherRegister" class="block px-4 py-2 hover:bg-gray-200">Admin</a>
                    </div>
                </li>
            </ul>
            
            <div id="loginButton">
                <a href="index.php?page=login" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded">Login</a>
            </div>
        </div>
    </div>
        <?php
    }
    ?>

    <div class="py-8">
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    if ($page === 'home') {
        include 'home.php';
    }
    else if ($page === 'about') {
        include 'about.php';
    }
    else if ($page === 'contact') {
        include 'contact.php';
    }
    else if ($page === 'login') {
        include 'login.php';
    }
    else if ($page === 'register') {
        include 'register.php';
    }
    else if ($page === 'teacherRegister') {
        include 'teacherRegister.php';
    }
    else if ($page === 'main') {
        include 'main.php';
    }
    else if ($page === 'teachermain') {
        include 'teachermain.php';
    }
    else if ($page === 'options') {
        include 'options.php';
    }
    else if ($page === 'books') {
        include 'books.php';
    }
    else if ($page === 'dashboard') {
        include 'dashboard.php';
    }
    else if ($page === 'admin') {
        include 'admin.php';
    }
    else if ($page === 'user') {
        include 'user.php';
    }
    else if ($page === 'add') {
        include 'add.php';
    }
    else if ($page === 'update') {
        include 'update.php';
    }
    else if ($page === 'delete') {
        include 'delete.php';
    }
    else if ($page === 'deleteUser') {
        include 'deleteUser.php';
    }
    else if ($page === 'profile') {
        include 'profile.php';
    }
    else if ($page === 'bookdetail') {
        include 'bookDetails.php';
    }
    else if ($page === 'issueBook') {
        include 'issueBooks.php';
    }
    else if ($page === 'adminProfile') {
        include 'adminProfile.php';
    }
    else {
        echo "<p>Page not found.</p>";
    }
    ?>
</div>
        
<?php include 'footer.php'; ?>
</body>
</html>