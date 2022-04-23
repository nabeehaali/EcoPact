<?php 
 
 session_start();
		    $servername = "ugrad.bitdegree.ca";
			$server_username = "andrewrholland";
			$server_password = "uUCDK0g8rR";
			$dbname = "andrewrholland";
 ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="stats.css">
    <title>Dashboard</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
  <h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

      <div class="item active">
        <img src="la.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
         <div id="dash">
        <table class="columns">
            <tr>
		<td>
                    <div id="Home_chart_div" style="width: 100%;"></div>
                </td>
	    </tr>
	    <tr>
		<td>
                    <div id="Transit_chart_div" style="width: 100%;"></div>
                </td>
	    </tr>
	    <tr>
                <td>
                    <div id="Anthony_chart_div" style="width: 100%;"></div>
                </td>
	    </tr>
	    <tr>
                <td>
                    <div id="pieLastchart" style="width: 100%;  visibility: visible;"></div>
                </td>
            </tr>
        </table>
    </div>
      </div>  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
   
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawLastChart);
        google.charts.setOnLoadCallback(drawAnthonyChart);
	google.charts.setOnLoadCallback(drawTransitChart);
	google.charts.setOnLoadCallback(drawHomeChart);

        function drawLastChart() {
            var data = google.visualization.arrayToDataTable([
                ['Contribution', 'Number'],
                <?php  

$conn = new mysqli($servername, $server_username, $server_password, $dbname);
$sql = 'SELECT contribution, count(*) as number FROM contributions GROUP BY contribution;';
$result = $conn->query($sql);


                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["contribution"]."', ".$row["number"]."],";  
                          }  
                          ?>
            ]);
            var options = {
                title: 'Total Contribution Chart',
pieSliceText: 'none',
                //is3D:true,   
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieLastchart'));
            chart.draw(data, options);
        }

        function drawAnthonyChart() {

        var data = google.visualization.arrayToDataTable([
                ['Date', 'Number'],
                <?php  

$conn = new mysqli($servername, $server_username, $server_password, $dbname);
$sql = 'SELECT contribDate, contribFood FROM contributions GROUP BY contribDate;';
$result = $conn->query($sql);


                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["contribDate"]."', ".$row["contribFood"]."],";  
                          }  
                          ?>
            ]);
            var options = {
                title: 'Food Contribution Chart',
                'width':500,
                     'height':250,
vAxis: {
      minValue: 0,
      title: 'Count',
      textStyle: {fontSize: 7}
    }
};
            var chart = new google.visualization.ColumnChart(document.getElementById('Anthony_chart_div'));

            chart.draw(data, options);
      }
function drawTransitChart() {

        var data = google.visualization.arrayToDataTable([
                ['Date', 'Number'],
                <?php  

$conn = new mysqli($servername, $server_username, $server_password, $dbname);
$sql = 'SELECT contribDate, contribTransit FROM contributions GROUP BY contribDate;';
$result = $conn->query($sql);


                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["contribDate"]."', ".$row["contribTransit"]."],";  
                          }  
                          ?>
            ]);
            var options = {
                title: 'Transit Contribution Chart',
                //is3D:true,   
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('Transit_chart_div'));
            chart.draw(data, options);
      }

function drawHomeChart() {

        var data = google.visualization.arrayToDataTable([
                ['Date', 'Number'],
                <?php  

$conn = new mysqli($servername, $server_username, $server_password, $dbname);
$sql = 'SELECT contribDate, contribHome FROM contributions GROUP BY contribDate;';
$result = $conn->query($sql);


                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["contribDate"]."', ".$row["contribHome"]."],";  
                          }  
                          ?>
            ]);
            var options = {
                title: 'Household Contribution Chart',
                //is3D:true,   
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('Home_chart_div'));
            chart.draw(data, options);
      }


    </script>


</html>
