<?php  
	session_start();
	session_destroy();

	header('location: login_v1/index.php')
?>