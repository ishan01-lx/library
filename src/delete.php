<?php
require 'config.php'; // Database connection

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: index.php?page=books");
    exit;
}
else {
    header("Location: index.php?page=books");
    exit;
}
?>