<?php


		//Create a database connection
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpassword = "";
		$dbname = "g00398295";

		$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
		
		//Test if connection occoured
		if(mysqli_connect_errno()){
			die("DB connection failed: " .
				mysqli_connect_error() .
					" (" . mysqli_connect_errno() . ")"
					);
		}

		// if (!$connection)
		// 	{
		// 		die('Could not connect: ' . mysqli_error());
		// 	}
			
		// 	$sql = "select * from Instruments where itemno = 1; ";
			
		// 	$result = mysqli_query($connection,$sql);
		// 	$row=mysqli_fetch_assoc($result);
			
		// 	echo "Pls work".$row['InstName'];
			
		// 	mysqli_close($connection);


			//get product from Database
		// function getData(){
		// 	$sql = "select * from $this->tablename";

		// 	$result = mysqli_query($this->con,$sql);
		// 	if(mysqli_num_rows($result) > 0){
		// 		return $result;
		// 	}

		

?>