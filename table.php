<?php
     $servername='localhost';
	 $username='root';
	 $password='';
	 $dbname='Users';
	 $conn=mysqli_connect($servername,$username,$password,$dbname);
	 
	 if(!$conn)
	     {
			 echo"error in connecting".mysqli_error();
		 }
	else
		{
			$table="CREATE TABLE Myusers(
			        userid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			        fname TEXT NOT NULL,
					lname TEXT NOT NULL,
					gender TEXT NOT NULL,
					dob DATE NOT NULL,
					email VARCHAR(50) NOT NULL,
					password VARCHAR(15) NOT NULL)";
			   if(mysqli_query($conn,$table))
			   {
				  echo "Table created successfully";
			   }
			   else
			   {   
				 echo "error ceating database".mysqli_error($conn);
			   }
		}
?>