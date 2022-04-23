<?php
include("index.php");

if(isset($_POST['username'])){

	$query = "SELECT * FROM USER WHERE username='$username'";
	$results = $conn->query($query);
		
	if($results->num_rows !=  0){
	array_push($errors, "This username already exists");
	}
}
		

if(isset($_POST['email'])){
	$query = "SELECT * FROM USER WHERE email='$email '";
	$results = $conn->query($query);
		
	if($results->num_rows !=  0){
		array_push($errors, "This email already exists");
	}
}

?>