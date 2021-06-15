<?php
	session_start();
?>

<html>
	<head><title>Food</title>
	</head>
	
	<body bgcolor="pink">
		<div style = "float:left; width:15%;">
			<image src="resources\cook2.jpg">
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
			<img src="resources\cook.jpg" align = "right">
		</div>
		<br>
		 <marquee><font size="15" face="Monotype Corsiva" color="blue"><u>We have recipes for your favourite indian vegetarian cuisines</u></font></marquee>
		 <p align = "left"><font color="purple" size="5"><u><i>
			Click on the recipe you want to read 
		</i></u></font></p>
		 
		 <div style = "float:left;">
			<b><font size="5"><ul>
			<li><a href="food.php?f=1">Achappam</a>
			<li><a href="food.php?f=2">Adaku Pathiri (Layered rice and egg) </a>
			<li><a href="food.php?f=3">Akki Roti</a>
			<li><a href="food.php?f=4">Aloo Amritsari</a>
			<li><a href="food.php?f=5">Aloo Chokha</a>
			<li><a href="food.php?f=6">Aloo Chutney Wala</a>
			<li><a href="../cons.php">Aloo Jeera (Potato and Cumin) </a>
			<li><a href="../cons.php">Aloo ka Stuffed Paratha</a>
			<li><a href="../cons.php">Aloo gravy</a>
			<li><a href="../cons.php">Appam</a>
			<li><a href="../cons.php">Apple Kheer</a>
			<li><a href="../cons.php">Arisa Pitha</a>
			<li><a href="../cons.php">Arsa(Dessert)</a>
			<li><a href="../cons.php">Assado de Leitoa (Roast Pigling) </a>
			<li><a href="../cons.php">Assam Laksa Stock </a>
			<li><a href="../cons.php"> Avial (Semi-dry, Mix Vegetable) </a>
			<li><a href="../cons.php">Apple Rabri </a>
			</ul> 
			</font></b>
		</div>
		<div style = "float:right; background-color:green; text-align:center; width:65%; margin-top:30px;">
			<?php
				if(!isset($_GET['f']))
					echo '<img src="resources\food4.jpg" height="300" width="600" align = "center">';
				else
				{					
					if(!isset($_SESSION["loggedin"]))
					header("Location: ../home.php?f=1");
				
					$f = $_GET['f'].".txt";
					$file = fopen($f, "r");
					
					echo "<h1><u><font color='cyan'>".fgets($file)."</font></u></h1>";
					echo "<font size='5' color='orange'>";
					while(!feof($file))
						echo fgetc($file);
					
					fclose($file);
				}
			?>
		</div>
		
		
		<marquee><b>Developed by - <a href="mailto:uditagarwal02@rediff.com"> Udit Agarwal</a></b></marquee>
	</body>
</html>