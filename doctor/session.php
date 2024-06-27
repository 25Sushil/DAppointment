<?php
    session_start();
    $email = $_SESSION["username_doctor"];
    
    if (!isset($email)) {
        header("Location: ../doctor/login.php"); // redirect to login page if username is not set
        exit;
    }
?>