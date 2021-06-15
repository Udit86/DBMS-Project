<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'Users';
	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if(!$conn)
	{
		echo "Error in connecting database : ".mysqli_error();
	}
?>