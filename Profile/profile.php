<?php
ob_start();
?>

<!DOCTYPE html>

<html>

<head>
    <title>EcoPact | Profile</title>
    <link rel="icon" type="image/png" href="Assets/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Blinker:200,300,400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="profile.css" />

    <header role="banner">
        <img class="logo" src="Assets/icon_logo-04.png">
    </header>
</head>


<body>
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
        
            $user_query = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
            
            $result = mysqli_query($conn,$user_query);
            $row = mysqli_fetch_array($result);

    echo "<div  id=\"container profile\" >
        <div class=\"row\">
            <div class=\"col-md-4\">
                <img src= ". $row['profilePic'] ." alt=\"Avatar\" class=\"avatar\">
               	<h3 class=\"name\">Hello,<br> ". $_SESSION['username'] ."!</h3>
	
            </div>
        </div>
    </div>";

     echo"<div id=\"accordion\">
        <div class=\"card\">
            <div class=\"card-header\" id=\"headingOne\" data-toggle=\"collapse\" data-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
                <img src=\"Assets/icons-03.png\" class=\"icon\">
                <a class=\"navbar-brand\" data-toggle=\"collapse\" data-target=\"#collapsibleNavbar\" href=\"#\">Account</a>
            </div>
            <div id=\"collapseOne\" class=\"collapse show\" aria-labelledby=\"headingOne\" data-parent=\"#accordion\">
                <div class=\"card-body\">
                    <ul class=\"navbar-nav\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"#\" data-toggle=\"modal\" data-target=\"#changePicModal\" data-backdrop=\"false\" >Change Profile Photo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	


        <div class=\"card\">
            <div class=\"card-header\" id=\"headingTwo\" data-toggle=\"collapse\" data-target=\"#collapseTwo\" aria-expanded=\"true\" aria-controls=\"collapseTwo\">
                <img src=\"Assets/icons-04.png\" class=\"icon\">
                <a class=\"navbar-brand\" data-toggle=\"collapse\" data-target=\"#collapsibleNavbar\" href=\"#\">Settings</a>
            </div>
            <div id=\"collapseTwo\" class=\"collapse show\" aria-labelledby=\"headingTwo\" data-parent=\"#accordion\">
                <div class=\"card-body\" >
                    <ul class=\"navbar-nav\">
                        <li class=\"nav-item\" data-toggle=\"modal\" data-target=\"#deleteModal\">
                            <a class=\"nav-link\" href=\"#\">Delete Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"card-header\" id=\"headingThree\" data-toggle=\"collapse\" data-target=\"#collapseThree\" aria-expanded=\"true\" aria-controls=\"collapseThree\">
                <img src=\"Assets/icons-05.png\" class=\"icon\">
                <a class=\"navbar-brand\" href=\"about.php\">About</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"card-header\" data-toggle=\"modal\" data-target=\"#exampleModal\" id=\"headingFour\">
                <img src=\"Assets/icons-06.png\" class=\"icon\">
                <a class=\"navbar-brand\" data-toggle=\"collapse\" data-target=\"#collapsibleNavbar\" href=\"#\">Logout</a>
            </div>

        </div>
    </div>";

echo "
<div id=\"footer\" class=\"text-center\">
    <div class=\"container\">
        <div class=\"row\"></div>
        <div class=\"row\">
            <div class=\"col\" id=\"leftborder\" onclick=\"prog()\">
                <img src=\"Assets/ecology-07.png\" class=\"baricon\">
                <p>Progress</p>
            </div>
            <div class=\"col\" id=\"border\" onclick=\"track()\">
                <img src=\"Assets/ecology-08.png\" class=\"baricon\">
                <p>Track</p>
            </div>
            <div class=\"col\" id=\"rightborder\" onclick=\"prof()\">
                <img src=\"Assets/ecology-09.png\" class=\"baricon\">
                <p>Profile</p>
            </div>
        </div>
    </div>
</div>
";

echo"<div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
 <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Are you sure you want to log out?</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">
        Are you sure you want to log out?
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">No</button>
        <a href=\"logout.php\">Yes</a>
      </div>
    </div>
  </div>
</div> ";

echo
"
    <div class=\"modal fade\" id=\"deleteModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">    <div class=\"modal-content\">
        <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"exampleModalLabel\">Delete Account?</h5>
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
            </button>
        </div>
        <div class=\"modal-body\">
            Are you sure you want to delete your account? All progress will be lost.
        </div>
            <form action = \"\" method=\"GET\" >
                <div class=\"modal-footer\">
                    <button  class=\"btn btn-secondary\" data-dismiss=\"modal\">No</button>
                    <button type=\"submit\" name=\"submitDelete\" href=\"signOutMessage.php\">Yes</button>
                </div> 
            </form>
        </div>
    </div>
    </div>
";

echo
"
    <div class=\"modal fade\" id=\"changePicModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">    <div class=\"modal-content\">
        <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"exampleModalLabel\">Change Profile Picture</h5>
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
            </button>
        </div>
        <form action=\"\" method=\"POST\" enctype =\"multipart/form-data\">
            <div class=\"modal-body\">
                    Available file types: .PNG .JPG .JPEG <br />
                    <input type=\"file\" name=\"image\">
                
            </div>
            
                <div class=\"modal-footer\">
                    <button  class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                    <button type=\"submit\" name=\"submitPic\" href=\"\">Change</button>
                </div> 
                
            </div>
        </form>
    </div>
    </div>
";

    if(isset($_GET['submitDelete'])) { // Code to delete the account
        $query = "DELETE contributions FROM contributions WHERE contributions.username = '".$_SESSION['username']."' ;";
        $query .= "DELETE user FROM user WHERE user.username = '".$_SESSION['username']."' ;";

        if (mysqli_multi_query($conn, $query)) {
            echo "Account deleted";
        }else {
            echo "Error, connection wasn't made";
        }
    }


    if(isset($_POST['submitPic'])){ // Code to upload new profile pic

        $errors = array();
        $allowed_formats = array('png','jpg','jpeg');

        $file_name = $_FILES['image']['name'];
        $file_format = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        if(in_array($file_format, $allowed_formats)=== false){
            $errors[] = 'This file extension is not available';
        }

        if($file_size > 2097152){
            $errors[] = 'File must be under 2 Megabytes';
        }

        if(empty($errors)){
            move_uploaded_file($file_tmp, 'Assets/'.$file_name);
            $image_up = 'Assets/'.$file_name;

            $query2 = "UPDATE user SET profilePic ='".$image_up."' WHERE username='". $_SESSION['username'] ."'";
            if (mysqli_query($conn,$query2)){
                header('location: profile.php');
		ob_end_flush();
            }else {
                foreach($errors as $error){
                    echo $error, "<br />";
                }
            }

        }
    }




} else {
	header('location: logout.php');
	
}

?>



</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    $(".collapse").collapse()

    $('#myCollapsible').collapse({
  toggle: false
})

function logout() {
  $.get("logout.php");
  return false;
}

function prog() {
  window.location.assign("../Progress/progress3.php")
}

function track() {
  window.location.assign("../Tracking/Tracking.html")
}

function prof() {
  window.location.assign("../Profile/profile.php")
}


</script>


</html>
