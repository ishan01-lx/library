<?php
require 'config.php';
?>

<div class="flex">
    <div class="">
        <?php include 'teacher_navbar.php'; ?>
    </div>
        <div class="w-3/4 container mx-auto px-20">
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
            <div class="mt-4">
                <a href="index.php?page=teachermain" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Back</a>
            </div>
            <div class="text-center my-10">
                <h1 class="text-blue-500 text-3xl">STUDENTS DETAILS</h1>
            </div>
            <div class="">
            <a href="index.php?page=register">
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded">ADD Student</button>
            </a>
            </div>
            <div id="studentDetails" class="mt-4">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Full Name</th>
                            <th class="py-2 px-4 border-b">Class</th>
                            <th class="py-2 px-4 border-b">Roll no.</th>
                            <th class="py-2 px-4 border-b">Username</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody" class="text-center">
                    
                    <?php
                        require'config.php'; // Database connection

                        $sql = "SELECT * FROM library";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td class="py-2 px-4 border-b">' . $row['id'] . '</td>';
                                echo '<td class="py-2 px-4 border-b">' . $row['fullName'] . '</td>';
                                echo '<td class="py-2 px-4 border-b">' . $row['class'] . '</td>';
                                echo '<td class="py-2 px-4 border-b">' . $row['rollNbr'] . '</td>';
                                echo '<td class="py-2 px-4 border-b">' . $row['username'] . '</td>';
                                echo '<td class="py-2 px-4 border-b">';
                                echo '<a href="index.php?page=register&id=' . $row['id'] . '" class="text-blue-500 hover:text-blue-700">Update</a> | ';
                                echo '<a href="deleteUser.php?id=' . $row['id'] . '" class="text-red-500 hover:text-red-700" onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5" class="text-center py-4">Add students</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
    </div>
            </div>
        </div>