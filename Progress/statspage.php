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
    <link rel="icon" type="image/png" href="../Profile/Assets/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>EcoPact | Stats</title>
    <link rel="stylesheet" href="main2.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="animsition.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Blinker:200,300,400,600&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawLastChart);
        google.charts.setOnLoadCallback(drawAnthonyChart);
        
        function drawLastChart() {
            var data = google.visualization.arrayToDataTable([
                ['Contribution', 'Number'],
                <?php  

$conn = new mysqli($servername, $server_username, $server_password, $dbname);
$sql = 'SELECT contribution, count(*) as number FROM contributions WHERE username="'.$_SESSION['username'].'" AND NOT contribution="Start" GROUP BY contribution;';
$result = $conn->query($sql);


                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["contribution"]."', ".$row["number"]."],";  
                          }  
                          ?>
            ]);
            var options = {
                pieSliceText: 'none',
                title: 'Total Contribution Chart',
                colors: ['#9dc183', '#679267', '#3f704d']   
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieLastchart'));
            chart.draw(data, options);
        }

	$(window).resize(function(){
	drawLastChart();
	});

        function drawAnthonyChart() {

            var data = google.visualization.arrayToDataTable([
                ['Date', 'Number'],
                <?php  

$conn = new mysqli($servername, $server_username, $server_password, $dbname);
$sql = 'SELECT contribDate,  (SUM(contribFood) + SUM(contribTransit) + SUM(contribHome))/2 as Total FROM contributions WHERE username="'.$_SESSION['username'].'" AND NOT contribDate="0000-00-00" GROUP BY contribDate;';
$result = $conn->query($sql);


                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["contribDate"]."', ".$row["Total"]."],";  
                          }  
                          ?>
            ]);
            var options = {
                title: 'Daily Contribution Chart',
		colors: ['#9dc183'],
                vAxis: {
                    minValue: 0,
                    title: 'Number of Contributions',
                    textStyle: {
                        fontSize: 7
                    }
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('Anthony_chart_div'));
            chart.draw(data, options);
        }

        $(window).resize(function(){
	drawAnthonyChart();
	});

    </script>
<style>
a {
color: #99cc66;
}
</style>
</head>

<body>
  <div class="container card-img-top">
        <img src="icon.png" alt="Eco Pact" width="15%" height="15%" class="mx-auto d-block mb-4 mt-4 img-fluid">
    </div>

<h3 style="color: #71A306; text-align: center; font-weight: 600;">YOUR STATS</h3>

<br>
                    <table style="margin-left:auto;margin-right:auto;">
                        <tr>
                            <td>
                                <div id="pieLastchart" style="width: 100%"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div id="Anthony_chart_div" style="width: 100%"></div>
                            </td>
                        </tr>
		</table>
<div class="animsition-overlay text-center" data-animsition-overlay="true">       
<a href="progress3.php" class="animsition-link"><i class="fas fa-angle-left"></i></a>	  
</div>
<br><br><br><br>

<div id="footer" class="text-center">
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="col" id="leftborder">
                <img src="images/ecology-07.png" class="baricon">
                <a class="btn btn-success btn-block" role="button" href="progressredirect.php">Progress</a>
            </div>
            <div class="col" id="border">
                <img src="images/ecology-08.png" class="baricon">
                <a class="btn btn-success btn-block" role="button" href="../Tracking/Tracking.html">Track</a>
            </div>
            <div class="col" id="rightborder">
                <img src="images/ecology-09.png" class="baricon">
                <a class="btn btn-success btn-block" role="button" href="../Profile/profile.php">Profile</a>
            </div>
        </div>
    </div>
</div>

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
