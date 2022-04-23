<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
    <title>EcoPact | Progress</title>
    <link rel="stylesheet" href="../main.css">
    </head>
  
<body class="overflow-hidden">

	<div id="carouselExampleCaptions" class="carousel slide">
  			   <ol class="carousel-indicators">
    			      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    			      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
  			   </ol>
  			 <div class="carousel-inner">
    			 <div class="carousel-item active">

			<?php

			session_start();
			$servername = "ugrad.bitdegree.ca";
			$server_username = "nabeehaali";
			$server_password = "kyxdCUg19v";
			$dbname = "nabeehaali";

			$conn = new mysqli($servername, $server_username, $server_password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT total FROM user_points WHERE id='1'";
			$result = $conn->query($sql);
		
			echo "<div class=\"container card-img-top\">
                            	<img src=\"../icon.png\" alt = \"Eco Pact\" width=\"30%\" height=\"30%\" class=\"mx-auto d-block mb-4 mt-4\" >
                              </div>";
		
			echo "<h3 class=\"text-center\">Progress</h3>";
		

		if ($result->num_rows > 0) {
    		// output data of each row
    		while($row = $result->fetch_assoc()) {
        		echo "<h6 class=\"text-center\">Score: " . $row["total"]. "</h6><br>";
			if ($row["total"] <= 300) {
				$lvl = 300;
				$min = 0;
				
			}
			elseif ($row["total"] <= 600 && $row["total"] > 300) {
				$lvl = 600;
				$min = 300;
				
			}
			elseif ($row["total"] <= 900 && $row["total"] > 600) {
				$lvl = 900;
				$min = 600;	
			}
			else {
				$lvl = 300;
				$min = 0;
			}
			$total = $row["total"];
			$final = (($row["total"]-$min)/($lvl-$min))*100;
			echo "<div class=\"text-center\"/>
				<div class=\"progress mx-auto\" style=\"width: 50%; height: 10px\">
  				   <div id=\"bar\" class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: $final%\" aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"125\"></div>
				</div>";
			if ($final < 33 && $lvl == 300) {
				echo "<img src=\"seed.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}
			elseif ($final < 66 && $lvl == 300) {
				echo "<br><br><br><br>";
				echo "<img src=\"sprout.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}
			elseif ($final <= 100 && $lvl == 300) {
				echo "<br><br><br>";
				echo "<img src=\"flower.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}
			elseif ($final < 33 && $lvl == 600) {
				echo "<br><br><br><br>";
				echo "<img src=\"seed2.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}
			elseif ($final < 66 && $lvl == 600) {
				echo "<br><br><br>";
				echo "<img src=\"sprout2.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}
			elseif ($final <= 100 && $lvl == 600) {
				echo "<br><br><br>";
				echo "<img src=\"flower2.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}
			elseif ($final < 33 && $lvl == 900) {
				echo "<br><br><br><br>";
				echo "<img src=\"seed3.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}
			elseif ($final < 66 && $lvl == 900) {
				echo "<br><br><br>";
				echo "<img src=\"sprout3.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}
			elseif ($final <= 100 && $lvl == 900) {
				echo "<br><br><br>";
				echo "<img src=\"flower4.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}
			else {
				echo "<br><br><br>";
				echo "<img src=\"flower4.png\" class=\"img-fluid\" id=\"plant\" alt=\"Responsive image\" />";
			}

			if ($final == 100 && $lvl == 300 || $final == 100 && $lvl == 600) {
					echo "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\">
  						Level Up
					      </button>";
			
					echo "<div class=\"modal fade\" id=\"exampleModalCenter\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  					<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    						<div class=\"modal-content\">
      					<div class=\"modal-header\">
        					<h5 class=\"modal-title\" id=\"exampleModalCenterTitle\">Good Job!</h5>
      					</div>
      					<div class=\"modal-body\">
						<h7>Your plant is ready to be part of your growing garden. We have given you 50 bonus points and a new seed to begin growing your next plant! Keep up the good work!</h7>
        			        </div>
      					<div class=\"modal-footer\">
						<form method=\"post\" action=\"progress2.php\">
						
						<!-- If we want a close button in popup -->
        					<!--<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>-->
        					
						<button type=\"submit\" class=\"btn btn-primary\" name=\"continue\" id=\"continue\">Continue</button>
						</form>
     					</div>
    				       </div>
  				      </div>
				     </div>";
			}
			elseif ($final == 100 && $lvl == 900) {
				echo "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\">
  						Level Up
					      </button>";
			
					echo "<div class=\"modal fade\" id=\"exampleModalCenter\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
  					<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    						<div class=\"modal-content\">
      					<div class=\"modal-header\">
        					<h5 class=\"modal-title\" id=\"exampleModalCenterTitle\">Congratulations!</h5>
      					</div>
      					<div class=\"modal-body\">
						<h7>All possible plants have been collected. Please earn more points to help save the environment. More plants to be added soon. Happy Tracking!</h7>
        			        </div>
      					<div class=\"modal-footer\">
						<form method=\"post\" action=\"progress2.php\">
						
						<!-- If we want a close button in popup -->
        					<!--<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>-->
        					
						<button type=\"submit\" class=\"btn btn-primary\" name=\"continue\" id=\"continue\">Continue</button>
						</form>
     					</div>
    				       </div>
  				      </div>
				     </div>";
			}
			if(isset($_POST['continue'])){
				header("Refresh:0");
			}
 
      		}
		} else {
    		echo "0 results";
		}
		
?> 

<div class="container">
  <div class="row">
    <div class="col text-center">
        <form method="post" action="progress2.php">
    		<button type="submit" name="passed" id="passed" class="btn btn-outline-success">Add 50</button>
	</form>
    </div>
  </div>
</div>
</div>
    <div class="carousel-item">
      <!-- PUT STATS STUFF HERE -->
    </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<?php

if(isset($_POST['passed'])){

    $allowed = mysqli_query($conn," UPDATE user_points SET total = total + 50 WHERE id = '1' ");

}
$conn->close();

?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
  </body>
</html>