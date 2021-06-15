<?php
	session_start();
	
	if(!isset($_SESSION["loggedin"]))
		header("Location: home.php?f=1");
?>

<html>
	<head><title>Construction</title></head>
	<body bgcolor="green">
		<center>
			<h1> The Site is under construction </h1>
			<embed src="resources\cons.gif" height="300" width="300"><br><br><br>
			<b><a href="index.php" style="font-size:25; color:yellow;">Return to home page</a>&nbsp&nbsp&nbsp&nbsp
			<a href="logout.php" style="font-size:25; color:yellow;">Log out</a></b>
		</center>
	</body>
</html>