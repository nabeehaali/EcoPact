<!DOCTYPE html>
<html>

<head>
    <title>EcoPact | Welcome</title>

    <link rel="icon" type="image/png" href="Assets/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="about.css" />
    <link href="https://fonts.googleapis.com/css?family=Blinker:200,300,400,600&display=swap" rel="stylesheet">

    <header role="banner">
        <img class="logo img-fluid" src="Assets/icon_logo-04.png">
    </header>
<style>
.table {
    margin-top: 300px;
    border: none;
    width: 60%;
    left: 50%;
    transform: translate(-50%, 0%);
    position: fixed;

}
@media only screen and (max-width: 576px) {
.table {
   margin-top: 300px;
    border: none;
    width: 50%;
    left: 50%;
    transform: translate(-50%, 0%);
    position: fixed;
}

}

@media only screen and (min-width: 993px) {
  
.table {
    margin-top: 300px;
    border: none;
    width: 35%;
    left: 50%;
    transform: translate(-50%, 30%);
    position: fixed;

}



}</style>
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
         
echo "
    <div id=\"container\" id=\"profile\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                <h3>MEET OUR TEAM</h3>
                <h5>We are a group of students from Carleton University. Our goal is to help combat environmental issues by focusing on the individual.</h5>
            </div>
        </div>
    </div>


    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <table class=\"table table-image\">
                    <thead>

                    </thead>
                    <tbody>
                        <tr>
                            <th scope=\"row\"></th>
                            <td class=\"w-25\">
                                <img src=\"Assets/Nabeeha.png\" class=\"img-fluid img-thumbnail\" alt=\"Nabeeha\">

                            </td>
                            <td class=\"w-25\">
                                <img src=\"Assets/Onyinye.png\" class=\"img-fluid img-thumbnail\" alt=\"Onyinye\">
                            </td>
                            <td class=\"w-25\">
                                <img src=\"Assets/Simone.png\" class=\"img-fluid img-thumbnail\" alt=\"Simone\">
                            </td>
                            <th scope=\"row\"></th>
                        </tr>
                        <tr>
                            <th scope=\"row\"></th>
                            <td>Nabeeha</td>
                            <td>Onyinye</td>
                            <td>Simone</td>
                        </tr>
                        <tr>
                            <td> </td>
                        </tr>
                        <tr>
                            <td> </td>
                        </tr>
                        <tr>
                            <th scope=\"row\"></th>
                            <td class=\"w-25\">
                                <img src=\"Assets/Damla.png\" class=\"img-fluid img-thumbnail\" alt=\"Damla\">
                            </td>
                            <td class=\"w-25\">
                                <img src=\"Assets/Amy.png\" class=\"img-fluid img-thumbnail\" alt=\"Amy\">
                            </td>
                            <td class=\"w-25\">
                                <img src=\"Assets/Andrew.png\" class=\"img-fluid img-thumbnail\" alt=\"Andrew\">
                            </td>
                            <th scope=\"row\"></th>
                        </tr>
                        <tr>
                            <th scope=\"row\"></th>
                            <td>Damla</td>
                            <td>Amy</td>
                            <td>Andrew</td>
                        </tr>
                        <tr>
                            <td> </td>
                        </tr>
                        <tr>
                            <td> </td>
                        </tr>
                        <tr>
                            <th scope=\"row\"></th>
                            <td class=\"w-25\">
                                <img src=\"Assets/Khaled.png\" class=\"img-fluid img-thumbnail\" alt=\"Khaled\">
                            </td>
                            <td class=\"w-25\">
                                <img src=\"Assets/Minhye.png\" class=\"img-fluid img-thumbnail\" alt=\"Minhye\">
                            </td>
                            <td class=\"w-25\">
                                <img src=\"Assets/Dana.png\" class=\"img-fluid img-thumbnail\" alt=\"Dana\">
                            </td>
                            <th scope=\"row\"></th>
                        </tr>
                        <tr>
                            <th scope=\"row\"></th>
                            <td>Khaled</td>
                            <td>Minhye</td>
                            <td>Dana</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>";

echo"<div id=\"footer\" class=\"text-center\">
    <div class=\"container\">
        <div class=\"row\"></div>
        <div class=\"row\">
            <div class=\"col\" onclick=\"prog()\" id=\"leftborder\">
                <img src=\"Assets/ecology-07.png\" class=\"baricon\">
                <p>Progress</p>
            </div>
            <div class=\"col\" onclick=\"track()\"  id=\"border\">
                <img src=\"Assets/ecology-08.png\" class=\"baricon\">
                <p>Track</p>
            </div>
            <div class=\"col\" onclick=\"prof()\"  id=\"rightborder\">
             	<img src=\"Assets/ecology-09.png\" class=\"baricon\">
       		<p>Profile</p>
       	    </div>
        </div>
    </div>
</div>";
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

</script></html>
