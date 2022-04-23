<?php 
	if (!isset($_SESSION)) {
		session_start(); 
	}	
	
	include "server_connection.php";
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	$_SESSION['permissions'] = "";


	// connect to database
	
	
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	// Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
		

	
	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		
		//$username = '"' .$username .'"' 
		//$password = " \'$password\' ";
		//echo $password;

		if (empty($username)) {array_push($errors, "Username is required");}
		if (empty($password)) {array_push($errors, "Password is required");}

		if (count($errors) == 0) {
			
			
			$query = "SELECT * FROM user WHERE username = '$username' AND pass = '$password' ";
			$results = $conn->query($query);
			//$results = mysqli_query($conn,$query);
			echo "$results->num_rows";
			if($results->num_rows == 1){  
				
				while($row = $results->fetch_assoc()) {
					$_SESSION['permissions'] = $row["permissions"];
				}

				$_SESSION['username'] = $username;
				//$_SESSION['success'] = "You are now logged in";
				header('location: ../Progress/progressredirect.php');
			}else {
				array_push($errors, "Wrong username/password combination");
				
			}
		}
	}
	$conn->close();
?>