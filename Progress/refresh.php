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
if(isset($_POST['continue'])){
    $allowed = " UPDATE user SET Points = Points + 25 WHERE username='".$_SESSION['username']."'";
    $result = $conn->query($allowed);
}
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <meta http-equiv="refresh" content="10;url='progress3.php'" />
        <link rel="icon" type="image/png" href="../Profile/Assets/favicon.png">

    <style>
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
}
        body {
            
            font-family: 'Blinker', sans-serif;
        }
	.page1 {
		background-color: #A1C357;
		height: 100vh;
		display: flex;
		justify-content:center;
		align-items: center;
		color: white;
		width: 100%;
		flex-direction: column;
		position: absolute;
	}
         .statement {
            color: white;
            text-decoration: none;
	    margin-top: 50px;

        }
        #loading {
            color: white;
	    top: 50%;
	    transform: translate(0%, 50%);
        }
    </style>
</head>

<body>
    <div class="page1">
    <div class="statement text-center"><h1>Planting a new seed...</h1></div>
    <br><br>
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <br><br>
    <div id="loading" class="text-center"></div>
    <script>
        function onReady(callback) {
            setTimeout(function() {
                // Do something after 1 second 
                document.getElementById('loading').innerHTML = "If you use a low-flow showerhead, you can save 15 gallons of water during a 10-minute shower!!";
            }, 0);
            setTimeout(function() {
                // Do something after 1 second 
                document.getElementById('loading').innerHTML = "Buses emit only 10% as many hydrocarbons per passenger mile as a single-occupant auto :)";
            }, 2500);

            setTimeout(function() {
                // Do something after 1 second 
                document.getElementById('loading').innerHTML = "If we recycled all newspapers, we could save over 250 million trees each and every year!!";
            }, 5000);

            setTimeout(function() {
                // Do something after 1 second 
                document.getElementById('loading').innerHTML = "Producing protein from chickens requires three times as much land as producing protein from soybeans!";
            }, 7500);


            var intervalID = window.setInterval(checkReady, 10000);

            function checkReady() {
                if (document.getElementsByTagName('body')[0] !== undefined) {
                    window.clearInterval(intervalID);
                    callback.call(this);
                }
            }
        }

        function show(id, value) {
            document.getElementById(id).style.display = value ? 'block' : 'none';
        }

        onReady(function() {
            show('page', true);
            show('loading', false);
        });

    </script>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
