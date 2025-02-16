<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $bookname = $_POST['bookname'];
    $isbn = $_POST['isbn'];
    $roll = $_POST['roll'];
    $issueDate = $_POST['issueDate'];

     // Check if the book exists in the books table
     $stmt = $conn->prepare("SELECT * FROM books WHERE bookname = ? AND ISBN = ?");
     $stmt->bind_param("ss", $bookname, $isbn);
     $stmt->execute();
     $result = $stmt->get_result();

     if ($result->num_rows > 0) {
        // Book exists, issue the book
        $stmt = $conn->prepare("INSERT INTO issuebook (bookname, isbn, roll, issueDate) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $bookname, $isbn, $roll, $issueDate);
        $stmt->execute();

        // Remove the book from the books table
        $stmt = $conn->prepare("DELETE FROM books WHERE bookname = ? AND ISBN = ?");
        $stmt->bind_param("ss", $bookname, $isbn);
        $stmt->execute();

        $stmt->close();
        $conn->close();

        header('Location: index.php?page=books');
        exit;
    } else {
        // Book does not exist, show an error message
        $error_message = "The book does not exist in the library.";
    }
}
?>
<div class="flex space-evenly">
    <div class="w-1/6">
        <?php include 'teacher_navbar.php'; ?>
    </div>
    <div class="mt-4">
                <a href="index.php?page=books" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Back</a>
    </div>
    <div class="w-3/4 left-0">
        <h1 class="text-4xl font-bold text-center pt-14">Issue BOOKS</h1>
        <div id="registerForm" class="text-black my-10 justify-start px-20">
            
        <?php if (isset($error_message)): ?>
                    <div class="bg-red-500 text-white p-4 rounded mb-4">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
            <form action="issueBooks.php" method="post">
                <label for="Book Name">Book name:</label><br>
                <input type="text" id="bookname" name="bookname" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required autocomplete="on">
                <br>
                <label for="isbn">ISBN</label><br>
                <input type="text" id="isbn" name="isbn" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required>
                <br>
                <label for="roll">Student Roll no.</label><br>
                <input type="number" id="roll" name="roll" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required>
                <br>
                <label for="issueDate">Issue Date</label><br>
                <input type="text" id="issueDate" name="issueDate" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required>
                <br>
                <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Issue</button>
            </form>
        </div>
    </div>
</div>