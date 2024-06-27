<?php
    session_start();
    $email = $_SESSION["username"];
    
    if (!isset($email)) {
        header("Location: ../admin/login.php"); // redirect to login page if username is not set
        exit;
    }
?>