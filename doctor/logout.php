<?php 
	session_start();

	session_unset();
	session_destroy();
  
	setcookie('remember_doctor', '', time() - 3600); // Delete cookie

	// redirecting the user to the login page
	header('Location: ../doctor/login.php? action=logout');
 ?>