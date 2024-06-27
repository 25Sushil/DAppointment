<?php 
	session_start();

	session_unset();
	session_destroy();

	setcookie('remember_me', '', time() - 3600); 

	header('Location: ../admin/login.php?action=logout');
 ?>