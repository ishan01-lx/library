<?php
require 'config.php'; // Database connection

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();
}
else {
    header("Location: index.php?page=main");
    exit;
}

?>

    <div class="container mx-auto px-20">
        <div class="flex justify-center items-center mt-5">
            <a href="https://nss.edu.np"><img src="../images/logo.png" alt="logo" class="h-40"></a>
        </div>
        <h1 class="text-4xl font-bold pt-8 pb-2 text-center">Book Details</h1>
        <div class="bg-white p-8 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-4">Book Information</h2>
            <p><strong>ID:</strong> <?php echo htmlspecialchars($book['id']); ?></p>
            <p><strong>Book Name:</strong> <?php echo htmlspecialchars($book['bookname']); ?></p>
            <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
            <p><strong>Quantity:</strong> <?php echo htmlspecialchars($book['quantity']); ?></p>
            <p><strong>ISBN:</strong> <?php echo htmlspecialchars($book['ISBN']); ?></p>
            <div class="mt-4">
                <a href="index.php?page=main" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Back to List</a>
            </div>

            
        </div>
    </div>