<?php
	
	if (!isset($_SESSION)) {
		session_start(); 
	}	
	
	include "db_connection.php";	
	// variable declaration
	$username = "";
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
		$query = "SELECT * FROM USER WHERE username='$username'";
		$results = $conn->query($query);
		
		if($results->num_rows !=  0){
			array_push($errors, "This username already exists");
		}
		
		// check if email exists
		$query = "SELECT * FROM USER WHERE email='$email '";
		$results = $conn->query($query);
		
		if($results->num_rows !=  0){
			array_push($errors, "This email already exists");
		}

$password = md5($password);//encrypt the password before saving in the database

	
			$query = "INSERT INTO USER (username, email, password) 
					  VALUES('$username', '$email', '$password')";

		if($conn->query($query) === TRUE){
				echo "You are registered successfully<br>";
			}else{
				echo "Error: <br>" . $conn->error;
			}
	}
?>
<html>

<head>
    <title>Register</title>
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
    <div class="message"><?php if(isset($message)) echo $message; ?></div>
    <ul id="signup-step">
        <li id="personal" class="active">Personal Detail</li>
        <li id="password">Password</li>
    </ul>
    <form name="frmRegistration" class="form-1" method="post">

        <h1>REGISTER</h1>
        <div id="personal-field">
            <label>Name</label><span id="name-error" class="signup-error"></span>
            <div><input type="text" name="username" id="username" class="demoInputBox" /></div>
            <label>Email</label><span id="email-error" class="signup-error"></span>
            <div><input type="text" name="email" id="email" class="demoInputBox" /></div>
        </div>
        <div id="password-field" style="display:none;">
            <label>Enter Password</label><span id="password-error" class="signup-error"></span>
            <div><input type="password" name="password" id="user-password" class="demoInputBox" /></div>
            <label>Re-enter Password</label><span id="confirm-password-error" class="signup-error"></span>
            <div><input type="password" name="confirm-password" id="confirm-password" class="demoInputBox" /></div>
        </div>

        <div>
            <input class="btn-primary" type="button" name="back" id="back" value="Back" style="display:none;">
            <input class="btn-primary" type="button" name="next" id="next" value="Next">
            <input class="btn-primary" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
        </div>
    </form>
</body>
</html>
