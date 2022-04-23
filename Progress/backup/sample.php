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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(http://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
}
#load {
background-color: #000;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script>
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
  <title>EcoPact | Progress</title>
</head>
<body>
<div id="load" class="se-pre-con"></div>
<?php
echo "  	<div class=\"text-center\">
                				Level: 1
            				</div>

         				<div class=\"progress mx-auto\">
  				   			<div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: 100%\" aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"125\"></div>
					</div>
					<br>


					<div class=\"text-center\">
					<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter3\">
  					View Garden
					</button>
					</div>";
      					
			
echo "<div class=\"modal fade\" id=\"exampleModalCenter3\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  				<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    				<div class=\"modal-content\">
      					<div class=\"modal-header\">
        					<h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Your Garden</h5>
        					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          					<span aria-hidden=\"true\">&times;</span>
        					</button>
      					</div>
      				<div class=\"modal-body text-center\">
        				2 plants in your garden
					<img src=\"lvl1.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Barberton Daisy\" data-toggle=\"popover\" data-trigger=\"hover\" data-content=\"The Barberton daisy is an effective cleanser of the toxins formaldehyde, trichloroethylene, and benzene, found in a range of household materials from paints to synthetic fibres.\"/>

					<img src=\"lvl2.3.png\" class=\"img-fluid\" id=\"plant-modal\" alt=\"Responsive image\" href=\"#\" title=\"Header\" data-toggle=\"popover\" data-trigger=\"hover\" data-content=\"Some content\"/>
					
      				</div>
      				</div>
  				</div>
				</div>
			";

?>	
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

</body>
</html>