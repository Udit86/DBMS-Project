<?php
	session_start();

	unset($_SESSION["loggedin"]);
	unset($_SESSION["userid"]);
	
	include("conn.inc.php");
?>

<html>
	<head>
		<title>HOME</title>
		<link rel="stylesheet" type="text/css" href="style.css"> 
		<link rel="icon" type="image/png" id="favicon" href="D:\sanket\ASP\project1\resources\close.png"/>
        <style>
			#logoutconfirm{visibility:hidden}
			#blurbox{visibility:hidden}
		</style>
	</head>
	<body>
		<h1 class="main_head">Welcome</h1>
		<div class="top_nav">
			<a href="home.asp" class="top_active">HOME</a>
			<?php
				if(!isset($_SESSION['loggedin'])){				
			?>
			<a href="register.asp" class="top_inactive">REGISTER</a>
			<?php
				}
			?>
			<a href="gallery.asp" class="top_inactive">GALLERY</a>
			<a href="work.asp" class="top_inactive">WORKSPACE</a>
			<a href="contact.asp" class="top_inactive">CONTACT US</a>
			<div class="side">
				<?php
					if(!isset($_SESSION['loggedin'])){				
				?>
					<a class="top_inactive" onClick="document.getElementById('logoutconfirm').style.visibility = 'visible' ;document.getElementById('blurbox').style.visibility = 'visible'">LOG OUT</a>
					<a href="settings.asp" class="top_inactive">SETTINGS</a>
				<?php
					}
				?>				
			</div>
		</div>
		<div class="nav">
			
		</div>
		<div class="content">
			<form name="login" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<center class="head_2">
					LOG IN
				</center>
				Username : <input type="text" value="" name="email" class="input"> <br><br>
				Password : <input type="password" value="" name="pass" class="input"> <br><br>
				<input type="submit" class="btn" value="Log In"><br><br>
				Don't have an id, click here to <a href="reg.php" class="sim_link">register.... </a>
				<br><br><Br>
				<?php
					if($_SERVER["REQUEST_METHOD"]=="POST")
					{
						$email = htmlspecialchars(trim($_POST["email"]));
						$pass = htmlspecialchars(trim($_POST["pass"]));
						
						if(empty($email) or empty($pass))
							echo "Please fill all the fields";
						else
						{	
							$sql = "SELECT * FROM myusers WHERE email = '$email'";
							$res = mysqli_query($conn, $sql);
							$record = mysqli_fetch_assoc($res);
							$conpass = $record['password'];
							
							if(strcmp($pass, $conpass) == 0)
							{
								$_SESSION['loggedin'] = true;
								$_SESSION['userid'] = $record['userid'];
								header("Location: index.php"); 
							}
							else
								echo "Incorrect username/password combination";
						}
					}
					else if(isset($_GET['f']))
						echo "You must login first";
				?>
			</form>
		</div>
        
        <div id="blurbox">
        </div>      
        
        <div id="logoutconfirm">
			<input type="image" src="resources/close.png" align="right" height="35" width="35" onClick="document.getElementById('logoutconfirm').style.visibility = 'hidden' ;document.getElementById('blurbox').style.visibility = 'hidden'">	<br><br>
			Are you sure you want to logout	?	<br><br>
			<form name="logout" action="logout.asp">
				<center>
					<input type ="submit" class="btn" value="Yes"> &nbsp;&nbsp;
					<input type="button" class="btn" value=" No " onClick="document.getElementById('logoutconfirm').style.visibility = 'hidden' ;document.getElementById('blurbox').style.visibility = 'hidden'">
				</center>
			</form>
        </div>
	</body>
</html>