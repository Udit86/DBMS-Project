<?php
	session_start();
	
	if(!isset($_SESSION["loggedin"]))
		header("Location: home.php?f=1");
	
	include("conn.inc.php");
	
	$userid = $_SESSION['userid'];
	$sql = "SELECT * FROM myusers WHERE userid = '$userid'";
	$res = mysqli_query($conn, $sql);
	
	$record = mysqli_fetch_assoc($res);
?>

<html>
	<head>
		<title> Welcome </title>
	</head>
	
	<body bgcolor="pink">
		<center>
			<h2> Welcome </h2>
			<h1> <?php echo $record['fname']." ".$record['lname']; ?> </h1>
		</center>
			<div align="right">
				<a href="logout.php" ><font size = "5"><b>Log out</b></font></a>
			</div>
			<div>
				<font face="Comic Sans MS" size="4">
					<div align="left"><a href="food/food.php">Get some food recipes</a></div>
					<div align="center"><a href="essay/essay.php">Read some essays</a></div>
					<div align="right"><a href="cons.php">Get some facts</a></div>
					<br>
					<img src="food/resources/food.jpg" height="250" width="350" align = "left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<img src="essay/resources/essay0.jpg" height="250" width="350" align = "center">
					<img src="resources/facts.jpg" height="250" width="350" align = "right">
				</font>
			</div>
		<hr size="5" color="red">
		<marquee><b>Developed by - <a href="mailto:uditagarwal02@rediff.com"> Udit Agarwal</a></b></marquee>
	</body>
</html>