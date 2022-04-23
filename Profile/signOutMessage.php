<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:700&display=swap" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
	<title>DELETED</title>
	<style>
	<?php include 'logout.css'; ?>

   
	</style>

</head>
<body>
<?php
session_start();
session_destroy();
echo '<h1>Your account has been deleted. <a href="../Login/multi-step-form/code/createaccount.php">Create Account</a></h1>';
?>
</body>
</html>