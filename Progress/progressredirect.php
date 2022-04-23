<?php
		session_start();
		$servername = "ugrad.bitdegree.ca";
		$server_username = "andrewrholland";
		$server_password = "uUCDK0g8rR";
		$dbname = "andrewrholland";
	
	    if (isset($_SESSION["username"])){
			// Create connection
			$conn = new mysqli($servername, $server_username, $server_password, $dbname);

			// Check connection
			if ($conn->connect_error){
				die("Connection failed: " . $conn->connect_error);
			}
	   header('location: ../Progress/progress3.php');
} else {
	header('location: ../Profile/logout.php');
	
}
?>