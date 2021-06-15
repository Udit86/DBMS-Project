<?php
	session_start();
	
	include("conn.inc.php");
	
	if(isset($_SESSION['loggedin']))
		header("Location: index.php");
?>
<html>
	<head>
		<title>Registration</title>
	</head>
	
	<body bgcolor="cyan">
		<a href="home.php" style="font-size:25"><-- Back</a>
		<center>
		<font color="red" face="Comic Sans MS"><h1><u>REGISTRATION FORM</u></h1></font>
		
		<form name="reg" method="post" action="<?php echo$_SERVER['PHP_SELF']; ?>">
		<b><font color="green" size="5">
			First name :<input type="text" name="fname" size="20" value = ""><br><br>
			Last name :<input type="text" name="lname" size="20" value = ""><br><br>
			Gender :<br>     
			Male<input type="radio" name="gen" value="male" checked>&nbsp&nbsp
			Female<input type="radio" name="gen" value="female">&nbsp&nbsp
			Others<input type="radio" name="gen" value="others"><br><br>
			Date of birth :<input type="date" name="dob" size="20" value = ""><br><br>
			Enter your username :<input type="text" name="email" size="20" value = ""><br><br>
			Enter your password :<input type="password" name="pass" size="20" value = ""><br><br>
			Confim password :<input type="password" name="conpass" size="20" value = ""><br><br>
		</b></font>
		<input type="reset" value="Reset the form">&nbsp&nbsp
		<input type="submit">
		</form>
		</center>
<?php	
	$flag = 0;
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		
		$fname = htmlspecialchars(trim($_POST["fname"]));
		$lname = htmlspecialchars(trim($_POST['lname']));
		$gen = htmlspecialchars(trim($_POST['gen']));
		$dob = htmlspecialchars(trim($_POST['dob']));
		$email = htmlspecialchars(trim($_POST['email']));
		$pass = htmlspecialchars(trim($_POST['pass']));
		$conpass = htmlspecialchars(trim($_POST['conpass']));	
		
		$sql = "SELECT email FROM myusers WHERE email = '$email'";
		$res = mysqli_query($conn, $sql);
		if(mysqli_num_rows($res) > 0)
			$flag = 1;
		
		if(empty($_POST["fname"]) or empty($_POST['lname']) or empty($_POST['dob']) or empty($_POST['email']) or empty($_POST['pass']) or empty($_POST['conpass']))
			echo "<font size='5'><b>Please fill all the fields</b></font>";
		else if(!preg_match("/^[a-zA-Z]*$/", $fname))
			echo "<font size='5'><b>Only letters and whitespaces are allowed</b></font>";
		else if(!preg_match("/^[a-zA-Z]*$/", $lname))
			echo "<font size='5'><b>Only letters and whitespaces are allowed</b></font>";
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			echo "<font size='5'><b>Invalid email format</b></font>";
		else if($flag == 1)
			echo "<font size='5'><b>Username already exists</b></font>";
		else if(strcmp($pass, $conpass) != 0)
			echo "<font size='5'><b>Password and confirm password do not match</b></font>";
		else
		{	
			$upload="INSERT INTO myusers (fname,lname,gender,dob,email,password) 
					VALUES('{$_POST['fname']}','{$_POST['lname']}','{$_POST['gen']}','{$_POST['dob']}','{$_POST['email']}','{$_POST['pass']}')";		
   
			if(mysqli_query($conn,$upload))
			{
				$sql = "SELECT * FROM myusers WHERE email = '$email'";
				$res = mysqli_query($conn, $sql);
				$record = mysqli_fetch_assoc($res);
				
				$_SESSION['loggedin'] = true;
				$_SESSION['userid'] = $record['userid'];
				header("Location: index.php");
			}
			else
				echo "error ceating database".mysqli_error($conn);
		}
	}
?>
		<hr size="5" color="red">
		<marquee><b>Developed by - <a href="mailto:uditagarwal02@rediff.com"> Udit Agarwal</a></b></marquee>
	</body>
</html>