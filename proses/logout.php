<?php 
	session_start();
	session_destroy();
	unset($_SESSION['user']);
	unset($_SESSION['kd_cs']);
	header('location:../user_login.php');
 ?>