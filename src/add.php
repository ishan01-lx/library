<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $bookname = $_POST['bookname'];
    $author = $_POST['author'];
    $quantity = $_POST['quantity'];
    $ISBN = $_POST['ISBN'];

    $stmt = $conn->prepare("INSERT INTO books (bookname, author, quantity, ISBN) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $bookname, $author, $quantity, $ISBN);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header('Location: index.php?page=books');
    exit;
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
        <h1 class="text-4xl font-bold text-center pt-14">ADD BOOKS</h1>
        <div id="registerForm" class="text-black my-10 justify-start px-20">
            <form action="add.php" method="post">
                <label for="bookname">Book name:</label><br>
                <input type="text" id="bookname" name="bookname" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required autocomplete="off">
                <br>
                <label for="author">Author name:</label><br>
                <input type="text" id="author" name="author" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required>
                <br>
                <label for="quantity">Quantity:</label><br>
                <input type="number" id="quantity" name="quantity" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required>
                <br>
                <label for="ISBN">ISBN:</label><br>
                <input type="text" id="ISBN" name="ISBN" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-md" required>
                <br>
                <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Add Book</button>
            </form>
        </div>
    </div>
</div>