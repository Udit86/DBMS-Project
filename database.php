<?php
     $servername='localhost';
	 $username='root';
	 $password='';
	 $conn=mysqli_connect($servername,$username,$password);
	 
	 if(!$conn)
	     {
			 echo"error in connecting".mysqli_error();
		 }
	else
		{
			$db="CREATE DATABASE Users";
			   if(mysqli_query($conn,$db))
			   {
				  echo "Database created successfully";
			   }
			   else
			   {   
				 echo "error ceating database".mysqli_error($conn);
			   }
		}
?>