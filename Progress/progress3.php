<?php
session_start();
			$servername = "ugrad.bitdegree.ca";
			$server_username = "andrewrholland";
			$server_password = "uUCDK0g8rR";
			$dbname = "andrewrholland";

			$conn = new mysqli($servername, $server_username, $server_password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			}

?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>EcoPact | Progress</title>
    <link href="https://fonts.googleapis.com/css?family=Blinker:200,300,400,600&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="animsition.min.css" />
    <link rel="icon" type="image/png" href="../Profile/Assets/favicon.png">
    <link rel="stylesheet" href="main.css">
<style>
/* width */
::-webkit-scrollbar {
    width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #FFFFFF;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: white;
    background: #7AAF67;
}
</style>
</head>

<body>
    <div class="container card-img-top">
        <img src="icon.png" alt="Eco Pact" width="15%" height="15%" class="mx-auto d-block mb-4 mt-4 img-fluid">
    </div>


                <script src="lottie.js"></script>


                <div id="lottie"></div>
		<div class="main">
                <?php
			 
			$sql = "SELECT Points FROM user WHERE username='".$_SESSION['username']."'";
			$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    		// output data of each row
    		while($row = $result->fetch_assoc()) {
        		echo "<br><h6 class=\"text-center\" style=\"color: #71A306; font-weight: 600;\">Score: " . $row["Points"]. "</h6>";
			if ($row["Points"] <= 300) {
				$lvl = 300;
				$min = 0;
				$mylevel = 1;
			}
			elseif ($row["Points"] <= 600 && $row["Points"] > 300) {
				$lvl = 600;
				$min = 300;
				$mylevel = 2;
			}
			elseif ($row["Points"] <= 900 && $row["Points"] > 600) {
				$lvl = 900;
				$min = 600;
				$mylevel = 3;	
			}
			elseif ($row["Points"] <= 1200 && $row["Points"] > 900) {
				$lvl = 1200;
				$min = 900;
				$mylevel = 4;
			}
			elseif ($row["Points"] <= 1500 && $row["Points"] > 1200) {
				$lvl = 1500;
				$min = 1200;
				$mylevel = 5;
			}
			else {
				$lvl = 1500;
				$min = 1200;
				$mylevel = 6;
			}
			$total = $row["Points"];
			$final = (($row["Points"]-$min)/($lvl-$min))*100;
			echo "  	<div class=\"text-center\">
                				Level: " . $mylevel. "
            				</div>

         				<div class=\"rod progress mx-auto\" style=\"width: 25%; height: 10px;\">
  				   			<div id=\"bar\" class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: $final%\" aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"125\"></div>
					</div>
					<br>

					<div class=\"text-center\">
					<button type=\"button\" class=\"btn\" data-toggle=\"modal\" data-target=\"#exampleModalCenter2\" data-backdrop=\"false\" style=\"background-color: #71A306; color: white; border-radius: 50px\">
  					View Garden
					</button>
					</div>";
			if ($final == 100 && $lvl == 300 || $final == 100 && $lvl == 600 || $final == 100 && $lvl == 900 || $final == 100 && $lvl == 1200) {
					echo "<br><div class=\"text-center\"><button type=\"button\" class=\"btn\" style=\"background-color: #F8E473; color: white; border-radius: 50px;\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\" data-backdrop=\"false\">
  						Level Up
					      </button></div>";
			
					echo "<div class=\"modal fade\" id=\"exampleModalCenter\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  					<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    						<div class=\"modal-content\">
      					<div class=\"modal-header text-white\" style=\"background-color: #F8E473;\">
        					<h5 class=\"modal-title w-100 text-center\" id=\"exampleModalCenterTitle\">Good Job!</h5>
      					</div>
      					<div class=\"modal-body\">
						<h7>Your plant is ready to be part of your growing garden. We have given you 25 bonus points and a new seed to begin growing your next plant! Keep up the good work!</h7>
        			        </div>
      					<div class=\"modal-footer\">
						<form method=\"post\" action=\"refresh.php\">
						
						<!-- If we want a close button in popup -->
        					<!--<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>-->
        					
						<button type=\"submit\" class=\"btn btn-light\" style=\"background-color: #F8E473; color: white;\" name=\"continue\" id=\"continue\">Continue</button>
						</form>						
     					</div>
    				       </div>
  				      </div>
				     </div>";
			}
			elseif ($final == 100 && $lvl == 1500) {
					echo "<br><div class=\"text-center\"><button type=\"button\" class=\"btn\" style=\"background-color: #F8E473; color: white;\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\" data-backdrop=\"false\">
  						Congrats!
					      </button></div>";
			
					echo "<div class=\"modal fade\" id=\"exampleModalCenter\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  					<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    						<div class=\"modal-content\">
      					<div class=\"modal-header text-white\" style=\"background-color: #F8E473;\">
        					<h5 class=\"modal-title w-100 text-center\" id=\"exampleModalCenterTitle\">Congratulations!</h5>
      					</div>
      					<div class=\"modal-body\">
						<h7>All possible plants have been collected. Please earn more points to help save the environment. More plants to be added soon. Happy Tracking!</h7>
        			        </div>
      					<div class=\"modal-footer\">
						<form method=\"post\" action=\"progress3.php\">
						
						<!-- If we want a close button in popup -->
        					<!--<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>-->
        					
						<button type=\"submit\" class=\"btn btn-light\" style=\"background-color: #F8E473; color: white;\" name=\"continue\" id=\"continue\">Continue</button>
						</form>
     					</div>
    				       </div>
  				      </div>
				     </div>";
			}
    			/*GARDEN STATEMENTS*/  					
			if ($mylevel == 1) {
			echo "
			<div class=\"modal fade\" id=\"exampleModalCenter2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  				<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    				<div class=\"modal-content\">
      					<div class=\"modal-header text-white\" style=\"background-color: #99cc66;\">
        					<h5 class=\"modal-title w-100 text-center\" id=\"exampleModalLongTitle\">Your Garden</h5>
        					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          					<span aria-hidden=\"true\">&times;</span>
        					</button>
      					</div>
      				<div class=\"modal-body text-center\">
        				There are no plants in your garden yet
      				</div>
      				</div>
  				</div>
				</div>
			";
			}
			elseif ($mylevel == 2) {
			echo "<div class=\"modal fade\" id=\"exampleModalCenter2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  				<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    				<div class=\"modal-content\">
      					<div class=\"modal-header text-white\" style=\"background-color: #99cc66;\">
        					<h5 class=\"modal-title w-100 text-center\" id=\"exampleModalLongTitle\">Your Garden</h5>
        					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          					<span aria-hidden=\"true\">&times;</span>
        					</button>
      					</div>
      				<div class=\"modal-body text-center\">
        				There is currently 1 plant in your garden
					<br><img src=\"lvl1.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" data-toggle=\"popover\" title=\"Barberton Daisy\" data-trigger=\"click\" data-placement=\"top\" data-content=\"The Barberton daisy is an effective cleanser of the toxins formaldehyde, trichloroethylene, and benzene, found in a range of household materials from paints to synthetic fibres.\"/>
      					
				</div>
      				</div>
  				</div>
				</div>
			";
			}
			elseif ($mylevel == 3) {
			echo "<div class=\"modal fade\" id=\"exampleModalCenter2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  				<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    				<div class=\"modal-content\">
      					<div class=\"modal-header text-white\" style=\"background-color: #99cc66;\">
        					<h5 class=\"modal-title w-100 text-center\" id=\"exampleModalLongTitle\">Your Garden</h5>
        					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          					<span aria-hidden=\"true\">&times;</span>
        					</button>
      					</div>
      				<div class=\"modal-body text-center\">
        				There are currently 2 plants in your garden
					<br>
					<img src=\"lvl1.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" data-toggle=\"popover\" title=\"Barberton Daisy\" data-trigger=\"click\" data-placement=\"top\" data-content=\"The Barberton daisy is an effective cleanser of the toxins formaldehyde, trichloroethylene, and benzene, found in a range of household materials from paints to synthetic fibres.\"/>
					<img src=\"lvl2.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" data-toggle=\"popover\" title=\"Sansevieria\" data-trigger=\"click\" data-placement=\"bottom\" data-content=\"With this plant in your bedroom, you're in for a great night's sleep. This yellow-tipped succulent releases oxygen at night, helping you to breathe better while sleeping.\"/>
      				</div>
      				</div>
  				</div>
				</div>
			";
			}
			elseif ($mylevel == 4) {
			echo "<div class=\"modal fade\" id=\"exampleModalCenter2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  				<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    				<div class=\"modal-content\">
      					<div class=\"modal-header text-white\" style=\"background-color: #99cc66;\">
        					<h5 class=\"modal-title w-100 text-center\" id=\"exampleModalLongTitle\">Your Garden</h5>
        					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          					<span aria-hidden=\"true\">&times;</span>
        					</button>
      					</div>
      				<div class=\"modal-body text-center\">
        				There are currently 3 plants in your garden
					<br>
					<img src=\"lvl1.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Barberton Daisy\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"top\" data-content=\"The Barberton daisy is an effective cleanser of the toxins formaldehyde, trichloroethylene, and benzene, found in a range of household materials from paints to synthetic fibres.\"/>
					<img src=\"lvl2.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Sansevieria\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"bottom\" data-content=\"With this plant in your bedroom, you're in for a great night's sleep. This yellow-tipped succulent releases oxygen at night, helping you to breathe better while sleeping.\"/>
					<img src=\"lvl3.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Weeping Fig\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"top\" data-content=\"Weeping figs can help to tackle levels of formaldehyde, xylene, and toluene.\"/>
      				</div>
      				</div>
  				</div>
				</div>
			";
			}
			elseif ($mylevel == 5) {
			echo "<div class=\"modal fade\" id=\"exampleModalCenter2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  				<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    				<div class=\"modal-content\">
      					<div class=\"modal-header text-white\" style=\"background-color: #99cc66;\">
        					<h5 class=\"modal-title w-100 text-center\" id=\"exampleModalLongTitle\">Your Garden</h5>
        					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          					<span aria-hidden=\"true\">&times;</span>
        					</button>
      					</div>
      				<div class=\"modal-body text-center\">
        				There are currently 4 plants in your garden
					<br>
					<img src=\"lvl1.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Barberton Daisy\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"top\" data-content=\"The Barberton daisy is an effective cleanser of the toxins formaldehyde, trichloroethylene, and benzene, found in a range of household materials from paints to synthetic fibres.\"/>
					<img src=\"lvl2.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Sansevieria\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"bottom\" data-content=\"With this plant in your bedroom, you're in for a great night's sleep. This yellow-tipped succulent releases oxygen at night, helping you to breathe better while sleeping.\"/>					
					<img src=\"lvl3.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Weeping Fig\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"top\" data-content=\"Weeping figs can help to tackle levels of formaldehyde, xylene, and toluene.\"/>
					<img src=\"lvl4.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Chinese Evergreens\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"bottom\" data-content=\"This tropical plant is proven to be an effective cleanser of formaldehyde and benzene, found in detergents and cosmetics.\"/>
      				</div>
      				</div>
  				</div>
				</div>
			";
			}
			else {
			echo "<div class=\"modal fade\" id=\"exampleModalCenter2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  				<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    				<div class=\"modal-content\">
      					<div class=\"modal-header text-white\" style=\"background-color: #99cc66;\">
        					<h5 class=\"modal-title w-100 text-center\" id=\"exampleModalLongTitle\">Your Garden</h5>
        					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          					<span aria-hidden=\"true\">&times;</span>
        					</button>
      					</div>
      				<div class=\"modal-body text-center\">
        				All plants are currently in your garden
					<br>
					<img src=\"lvl1.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Barberton Daisy\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"top\" data-content=\"The Barberton daisy is an effective cleanser of the toxins formaldehyde, trichloroethylene, and benzene, found in a range of household materials from paints to synthetic fibres.\"/>
					<img src=\"lvl2.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Sansevieria\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"bottom\" data-content=\"With this plant in your bedroom, you're in for a great night's sleep. This yellow-tipped succulent releases oxygen at night, helping you to breathe better while sleeping.\"/>
					<br>
					<img src=\"lvl3.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Weeping Fig\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"top\" data-content=\"Weeping figs can help to tackle levels of formaldehyde, xylene, and toluene.\"/>
					<img src=\"lvl4.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Chinese Evergreens\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"bottom\" data-content=\"This tropical plant is proven to be an effective cleanser of formaldehyde and benzene, found in detergents and cosmetics.\"/>
					<img src=\"lvl5.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Kenaf\" data-toggle=\"popover\" data-trigger=\"click\" data-placement=\"top\" data-content=\"Kenaf plants can remove toxic elements, such as heavy metals from the soil.\"/>
      				</div>
      				</div>
  				</div>
				</div>
			";
			}

			/*LEVEL SYSTEM*/
			if ($final < 33 && $lvl == 300) {
				echo "<img src=\"lvl1.1.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 66 && $lvl == 300) {
				echo "<img src=\"lvl1.2.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 100 && $lvl == 300) {
				echo "<img src=\"lvl1.3.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final == 100 && $lvl == 300) {
				echo "<img src=\"lvl1.3.png\" class=\"img-fluid\" id=\"plant-sm\" alt=\"Responsive image\" />";
			}
			elseif ($final < 33 && $lvl == 600) {
				echo "<img src=\"lvl2.1.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 66 && $lvl == 600) {
				echo "<img src=\"lvl2.2.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 100 && $lvl == 600) {
				echo "<img src=\"lvl2.3.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final == 100 && $lvl == 600) {
				echo "<img src=\"lvl2.3.png\" class=\"img-fluid\" id=\"plant-sm\" alt=\"Responsive image\" />";
			}
			elseif ($final < 33 && $lvl == 900) {
				echo "<img src=\"lvl3.1.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 66 && $lvl == 900) {
				echo "<img src=\"lvl3.2.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 100 && $lvl == 900) {
				echo "<img src=\"lvl3.3.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final == 100 && $lvl == 900) {
				echo "<img src=\"lvl3.3.png\" class=\"img-fluid\" id=\"plant-sm\" alt=\"Responsive image\" />";
			}
			elseif ($final < 33 && $lvl == 1200) {
				echo "<img src=\"lvl4.1.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 66 && $lvl == 1200) {
				echo "<img src=\"lvl4.2.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 100 && $lvl == 1200) {
				echo "<img src=\"lvl4.3.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final == 100 && $lvl == 1200) {
				echo "<img src=\"lvl4.3.png\" class=\"img-fluid\" id=\"plant-sm\" alt=\"Responsive image\" />";
			}
			elseif ($final < 33 && $lvl == 1500) {
				echo "<img src=\"lvl5.1.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 66 && $lvl == 1500) {
				echo "<img src=\"lvl5.2.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final < 100 && $lvl == 1500) {
				echo "<img src=\"lvl5.3.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			elseif ($final == 100 && $lvl == 1500) {
				echo "<img src=\"lvl5.3.png\" class=\"img-fluid\" id=\"plant-sm\" alt=\"Responsive image\" />";
			}
			else {
				echo "<img src=\"lvl5.3.png\" class=\"img-fluid\" id=\"plant-m\" alt=\"Responsive image\" />";
			}
			 
      		}
		} else {
    		header('location: ../Profile/logout.php');
		}		
?>
</div>
                <script src="animation.js"></script>
<br><br><br>
<div class="animsition-overlay text-center" data-animsition-overlay="true">
	  <a href="statspage.php" class="animsition-link"><i class="fas fa-angle-right"></i></a>
        </div>


<div id="footer" class="text-center">
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="col" id="leftborder" onclick="prog()">
                <img src="images/ecology-07.png" class="baricon">
                <p>Progress</p>
            </div>
            <div class="col" id="border" onclick="track()">
                <img src="images/ecology-08.png" class="baricon">
                <p>Track</p>
            </div>
            <div class="col" id="rightborder" onclick="prof()">
                <img src="images/ecology-09.png" class="baricon">
                <p>Profile</p>
            </div>
        </div>
    </div>
</div>
<script>
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


    <?php

if(isset($_POST['passed'])){

    $allowed = mysqli_query($conn," UPDATE user SET Points = Points + 10 WHERE UserID = 1; ");
    $result = $conn->query($allowed);

}
if(isset($_POST['continue'])){
    $allowed = mysqli_query($conn," UPDATE user SET Points = Points + 10 WHERE username='".$_SESSION['username']."'");
    $result = $conn->query($allowed);
}

$conn->close();

?>

<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});
</script>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript">
        var jQuery_3_3_1 = $.noConflict(true);
        </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
        var jQuery_1_11_0 = $.noConflict(true);
        </script>
<script src="animsition.min.js"></script>
<script>
    $(document).ready(function() {
  $(".animsition-overlay").animsition({
    inClass: 'overlay-slide-in-right',
    outClass: 'overlay-slide-out-right',
    inDuration: 0,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : true,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });
});
</script>

</html>
