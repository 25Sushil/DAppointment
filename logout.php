<?php 
  session_start();

  session_unset();
  session_destroy();

  setcookie('remember_patient', '', time() - 3600);

  header('Location: login.php');
?>