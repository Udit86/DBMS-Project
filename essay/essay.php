<?php
	session_start();
?>
<html>
	<head><title>Essays</title>
	</head>
	
	<body bgcolor="pink">
		<div style = "float:left; width:15%;">
			<image src="resources\essay3.png">
		</div>
		
		<div style = "float:center; text-align:center; left:340px; width:50%; position:absolute; color:yellow;">
			<h1><u>WELCOME TO ... MY PAGE !!!</u></h1>
			<?php
				if(isset($_SESSION['loggedin']))
				{
					echo "<a href='../logout.php' style = 'font-size:25;'>Log out</a><br><br>";
					echo "<a href='../index.php' style = 'font-size:25;'>Return to home page</a>";
				}
			?>
			
		</div>
		
		<div style = "float:right; width:25%;">
			<img src="resources\essay3.png" align = "right">
		</div>
		<br>
		<marquee><font size="15" face="Monotype Corsiva" color="blue"><u>We have essays for you on some interesting topics</u></font></marquee>
		<p align="left"><font color="purple" size="5"><u><i>
		Click on the topic you want to read 
		</i></u></font></p>
		
		 <div style = "float:left; font-size:20;">
			<b><font size="5"><ul>
			<li><a href="essay.php?f=1">Relevance of Socialism</a>
			<li><a href="essay.php?f=2">Ban on smoking </a>
			<li><a href="essay.php?f=3">MNREGA</a>
			<li><a href="essay.php?f=4">Economic Development</a>
			<li><a href="essay.php?f=5">Terrorism</a>
			<li><a href="essay.php?f=6">Polce reforms</a>
			<li><a href="essay.php?f=7">CCE </a>
			<li><a href="essay.php?f=8">Relevance of Planning Commission</a>
			<li><a href="essay.php?f=9">Communal Violence</a>
			<li><a href="essay.php?f=10">FDI in Defence</a>
			<li><a href="essay.php?f=11">Media Activism</a>
			<li><a href="essay.php?f=12">BIMSTEC</a>
			<li><a href="essay.php?f=13">Infiltration and illegal migration</a>
			<li><a href="../cons.php">Corruption </a>
			<li><a href="../cons.php">AFSPA </a>
			</ul> 
			</font></b>
		</div>
		<div style = "float:right; background-color:green; text-align:center; width:65%; margin-top:30px;">
			<?php
				if(!isset($_GET['f']))
					echo '<img src="resources\essay1.jpg" height="300" width="600" align = "center">';
				else
				{
					if(!isset($_SESSION["loggedin"]))
						header("Location: ../home.php?f=1");
					
					$f = $_GET['f'].".txt";
					$file = fopen($f, "r");
					
					echo "<h1><u><font color='cyan'>".fgets($file)."</font></u></h1>";
					echo "<font size='4' color='orange'>";
					while(!feof($file))
						echo fgetc($file);
					
					fclose($file);
				}
			?>
		</div><br><br>
		
		<marquee><b>Developed by - <a href="mailto:uditagarwal02@rediff.com"> Udit Agarwal</a></b></marquee>
	</body>
</html>