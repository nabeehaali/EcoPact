<?php
	
	if (!isset($_SESSION)) {
		session_start(); 
	}	
	
	include "db_connection.php";	
	// variable declaration
	$username = "";
	$password ="";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	
	
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	// Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
		

	if(isset($_POST['finish'])){
		$username	= mysqli_real_escape_string($conn, $_POST['username']);
		$email		= mysqli_real_escape_string($conn, $_POST['email']);
		$password	= mysqli_real_escape_string($conn, $_POST['password']);	

		// check if username exists
		$query = "SELECT * FROM user WHERE username='$username'";
		$results = $conn->query($query);
		
		if($results->num_rows !=  0){
			array_push($errors, "This username already exists");
		}
		
		// check if email exists
		$query = "SELECT * FROM user WHERE email='$email '";
		$results = $conn->query($query);
		
		if($results->num_rows !=  0){
			array_push($errors, "This email already exists");
		}

//encrypt the password before saving in the database

	
			$query = "INSERT INTO user (username, email, pass, Points) 
					  VALUES('$username', '$email', '$password', 0)";
			$query2 = "INSERT INTO contributions (username, contribution, contribHome, contribTransit, contribFood, contribDate)
                                                    VALUES ('$username', 'Start', 0, 0, 0, 'GETDATE()' )";

		if($conn->query($query) === TRUE && $conn->query($query2) === TRUE ){
				header('location: ../../../Login/login.php');			}else{
				echo "Error: <br>" . $conn->error;
			}
	}
?>

<html>

<head>
    <title>EcoPact | Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css" />
    <link href="https://fonts.googleapis.com/css?family=Blinker:200,300,400,600&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        function validate() {
            var output = true;
            $(".signup-error").html('');
            if ($("#personal-field").css('display') != 'none') {
                if (!($("#username").val())) {
                    output = false;
                    $("#name-error").html("Username required!");

                }
                if (!($("#email").val())) {
                    output = false;
                    $("#email-error").html("Email required!");
                }
                if (!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                    $("#email-error").html("Invalid Email!");
                    output = false;
                }

            }

            if ($("#password-field").css('display') != 'none') {
                if (!($("#user-password").val())) {
                    output = false;
                    $("#password-error").html("Password required!");
                }
                if (!($("#confirm-password").val())) {
                    output = false;
                    $("#confirm-password-error").html("Confirm password required!");
                }
                if ($("#user-password").val() != $("#confirm-password").val()) {
                    output = false;
                    $("#confirm-password-error").html("Password not matched!");
                }
            }
            return output;
        }
        $(document).ready(function() {
            $("#next").click(function() {
                var output = validate();
                if (output) {
                    var current = $(".active");
                    var next = $(".active").next("li");
                    if (next.length > 0) {
                        $("#" + current.attr("id") + "-field").hide();
                        $("#" + next.attr("id") + "-field").show();
                        $("#back").show();
                        $("#finish").hide();
                        $(".active").removeClass("active");
                        next.addClass("active");
                        if ($(".active").attr("id") == $("li").last().attr("id")) {
                            $("#next").hide();
                            $("#finish").show();
                        }
                    }
                }
            });
            $("#back").click(function() {
                var current = $(".active");
                var prev = $(".active").prev("li");
                if (prev.length > 0) {
                    $("#" + current.attr("id") + "-field").hide();
                    $("#" + prev.attr("id") + "-field").show();
                    $("#next").show();
                    $("#finish").hide();
                    $(".active").removeClass("active");
                    prev.addClass("active");
                    if ($(".active").attr("id") == $("li").first().attr("id")) {
                        $("#back").hide();
                    }
                }
            });
        });
    </script>
</head>


<body>

    <div class="center">
        <img src="images/waterman.gif" class="image1">
    </div>

    <div class="message"><?php if(isset($message)) echo $message; ?></div>

    <form name="frmRegistration" class="form-1" method="post" onkeydown="return event.key != 'Enter';">

        <h1>REGISTER</h1>
        <div id="personal-field">
            <label>Name</label><span id="name-error" class="signup-error"></span>
            <div><input type="text" name="username" id="username" class="demoInputBox" /></div>
            <br>
            <label>Email</label><span id="email-error" class="signup-error"></span>
            <div><input type="text" name="email" id="email" class="demoInputBox" /></div>
        </div>
        <div id="password-field" style="display:none;">
            <label>Enter Password</label><span id="password-error" class="signup-error"></span>
            <div><input type="password" name="password" id="user-password" class="demoInputBox" /></div>
            <br>
            <label>Re-enter Password</label><span id="confirm-password-error" class="signup-error"></span>
            <div><input type="password" name="confirm-password" id="confirm-password" class="demoInputBox" /></div>
        </div>

        <ul id="signup-step">
            <li id="personal" class="active"></li>
            <li id="password"></li>
        </ul>
        <div>
            <input class="btn-primary" type="button" name="back" id="back" value="Back" style="display:none;">
            <input class="btn-primary" type="button" name="next" id="next" value="Next">
            <input class="btn-primary" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
        </div>
    </form>
</body>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script></html>
