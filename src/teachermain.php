<?php

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php?page=login');
    exit;
}

?>
   <?php 
    include('dashboard.php');
   ?>

    