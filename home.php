<?php
	session_start();

	if(isset($_SESSION["loggedin"]))
		header("Location: index.php");
	
	include("conn.inc.php");
?>
<html>
	<head>
		<title> Home </title>
	</head>
	
	<body bgcolor="cyan">
	
		<center><h1><u> WELCOME </u></h1></center>
	
		<hr size="5" color="red">
		
		<div>
			<p align = "center"><font size = "4" color = "red">  
				Welcome to my webpage. Here you can browse recipes for various Indian dishes. Or you can read essays on interesting topics. Or learn some interesting facts.
				<br><span><font size = "5" color = "green"><b>Sign up</b></font></span> to read. If you already have an account then login to proceed.
			</p>
			<font face="Comic Sans MS" size="5">
				<div align="left"><a href="food/food.php">Get some food recipes</a></div>
				<div align="center"><a href="essay/essay.php">Read some essays</a></div>
				<div align="right"><a href="cons.php">Get some facts</a></div>
				<br>
			</font>
		</div>
		
		<div align="left"><h1><u>LOGIN</u></h1>
			<form name="login" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<b><font color="green" size="5">
					Enter your email address : <input type="text" size="20" name="email"><br><br>
					Enter your password : <input type="password" size="20" name="pass"><br><br>
					<input type="submit" value="LOGIN">
				</font></b>
			</form>
			
			<?php	
				if($_SERVER["REQUEST_METHOD"]=="POST")
				{
					$email = htmlspecialchars(trim($_POST["email"]));
					$pass = htmlspecialchars(trim($_POST["pass"]));
					
					if(empty($email) or empty($pass))
						echo "<font size='5'><b>Please fill all the fields</b></font>";
					else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
						echo "<font size='5'><b>Invalid email format</b></font>";
					else
					{	
						$sql = "SELECT * FROM myusers WHERE email = '$email'";
						$res = mysqli_query($conn, $sql);
						$record = mysqli_fetch_assoc($res);
						$conpass = $record['password'];
						
						if(mysqli_num_rows($res) == 0)
							echo "Username does not exist";
						else if(strcmp($pass, $conpass) == 0)
						{
							$_SESSION['loggedin'] = true;
							$_SESSION['userid'] = $record['userid'];
							header("Location: index.php"); 
						}
						else
							echo "<font size='5'><b>Incorrect username/password combination</b></font>";
					}
				}
				else if(isset($_GET['f']))
					echo "<font size='5'><b>You must login first</b></font>";
			?>
		</div>
		
		<div align="right"><font face="Comic Sans MS" size="15">Click here to <a href="reg.php">register</a></font></div>
		<hr size="5" color="red">
		<marquee><b>Developed by - <a href="mailto:uditagarwal02@rediff.com"> Udit Agarwal</a></b></marquee>
	</body>
</html>