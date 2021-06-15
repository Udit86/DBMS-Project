<?php
	session_start();
	unset($_SESSION['loggedin']);
	unset($_SESSION['userid']);
	header("Location: home.php");
?>