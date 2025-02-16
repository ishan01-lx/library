<?php
    require 'config.php'; // Database connection
    
    $sql = "SELECT id as user_count FROM library";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $user_count = $row['user_count'];

    $sql = "SELECT COUNT(id) as user_count FROM library";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $user_count = $row['user_count'];
    } else {
        $user_count = 0; 
    }

// Query to count the number of teachers
    $sql2 = "SELECT COUNT(id) as teacher_count FROM teachers";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        $row2 = mysqli_fetch_assoc($result2);
        $teacher_count = $row2['teacher_count'];
    } else {
        $teacher_count = 0; 
    }

// Query to count the number of books
    $sql3 = "SELECT COUNT(id) as book_count FROM books";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3) {
        $row3 = mysqli_fetch_assoc($result3);
        $book_count = $row3['book_count'];
    } else {
        $book_count = 0; 
    }

    $sql4 = "SELECT COUNT(isbn) as issueBook_count FROM issuebook";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4) {
        $row4 = mysqli_fetch_assoc($result4);
        $issueBook_count = $row4['issueBook_count'];
    } else {
        $book_count = 0; 
    }

?>



<div class="flex">
    <div class="">
        <?php include 'teacher_navbar.php'; ?>
    </div>
    
    <div class="w-3/4 container mx-auto px-20">
    <div class="flex flex-col">
            <div class="">
                <div id="logo" class="flex justify-center items-center mt-5">
                        <a href="https://nss.edu.np"><img src="../images/logo.png" alt="logo" class="h-40">
                        </a>
                </div>
                <h1 class="text-4xl font-bold pt-8 pb-2 text-center">
                    NSS Library Management
                </h1>
                   
            </div>
            <div class="text-center">
                <h1 class="pb-2">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                <p></p>
            </div>
        </div>

        <div class="bg-white text-black px-20 container mx-auto">
    <div class="text-center">
        <h1 class="text-4xl font-bold py-14 text-blue-900">DASHBOARD</h1>
        <div class="flex justify-evenly">
            
        <a href="index.php?page=user">
            <div class="flex justify-between items-center mr-4 bg-red-700 p-5 text-white rounded-lg w-48 h-25">
                <div class="">
                <h2 class="text-2xl font-bold"><?php echo $user_count; ?></h2>
                <p>Students</p>
                </div>
                <i class="fa-solid fa-user text-4xl"></i>
            </div>
        </a>
            
        <a href="index.php?page=teacher">
            <div class="flex justify-between items-center mr-4 bg-green-700 p-5 text-white rounded-lg w-48 h-25">
                <div class="">
                <h2 class="text-2xl font-bold"><?php echo $teacher_count; ?></h2>
                <p>Admins</p>
                </div>
                <i class="fa-solid fa-user text-4xl"></i>
            </div>
        </a>
        
        <a href="index.php?page=books">
        <div class="flex justify-between items-center mr-4 bg-blue-700 p-5 text-white rounded-lg w-48 h-25">
                <div class="">
                <h2 class="text-2xl font-bold"><?php echo $book_count; ?></h2>
                <p>Books</p>
                </div>
                <i class="fa-solid fa-book"></i>
            </div>
        </a>
        
        </div>

        
    </div>
    <div class="flex flex-col justify-center text-center items-center my-10">
        <div class="flex justify-between items-center mr-4 bg-orange-900 p-5 text-white rounded-lg w-48 h-25">
                <div class="">
                <h2 class="text-2xl font-bold"><?php echo $issueBook_count; ?></h2>
                <p>Books Issued</p>
                </div>
            </div>
        </div>
</div>
    </div>
        
</div>


<div class="flex justify-center items-center mt-5 w-full">

</div>

