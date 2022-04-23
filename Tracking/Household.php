<?php
ob_start();
?>
<?php
				session_start();
                             $servername = "ugrad.bitdegree.ca";
                             $username = "andrewrholland";
                             $password = "uUCDK0g8rR";
                             $dbname = "andrewrholland";
                             
                             // Create connection
                             $conn = mysqli_connect($servername, $username, $password, $dbname);
                             if (!$conn) {
                                 die("Connection failed: " . mysqli_connect_error() );
                             }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="trackitems.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Blinker:200,300,400,600&amp;display=swap" rel="stylesheet">
    <header role="banner">
        <img class="logo" src="Assets/icon_logo-04.png">
    </header>
<style>
	@media only screen and (min-width: 993px) {
   
    .btn-secondary {
	width: 30%;
    }

}
</style>

</head>

<body>

    <div class="container-fluid">

        <div class="row">
            <div id="container">
                <div class="row">
                    <div class="col">
                        <img src="Assets/house.png" class="headimg">
                        <h3>HOUSEHOLD</h3>
                    </div>
                </div>
            </div>

            <div class="col-1">
            </div>
            <div class="col-10" id="accordion">


                <form action="" method="post">

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio1" value="50" name="options">
                                <label class="custom-control-label" for="customRadio1">Recycle/Compost</label>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio2" value="50" name="options">
                                <label class="custom-control-label" for="customRadio2">Used Clothes</label>
                            </div>

                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="button" class="custom-control-input" id="customRadio3" name="options">
                                <label class="custom-control-label" for="customRadio3" data-toggle="collapse" data-target="#collapsibleNavbar">Showering</label>
                            </div>
                        </div>
                        <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="customRadio4" value="25" name="options">
                                            <label id="label" class="custom-control-label" for="customRadio4">15+ minutes</label>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="customRadio5" value="50" name="options">
                                            <label id="label" class="custom-control-label" for="customRadio5">10-15 minutes</label>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="customRadio6" value="100" name="options">
                                            <label id="label" class="custom-control-label" for="customRadio6">5 minutes</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
<button type="button" class="btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
  Collect Points
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Congratulations!</h5>
      </div>
      <div class="modal-body text-center">
        You have just earned some points!
      </div>
      <div class="modal-footer">
        <button type="submit" name="close" class="btn btn-dark">Close</button>
        <button type="submit" name="submit" class="btn btn-success">View Progress</button>
      </div>
    </div>
  </div>
</div>		
                </form>






                <div class="col-1">
                </div>



</body>

<?php
				if (isset($_SESSION["username"])){
				
                             $sql = "SELECT * FROM user INNER JOIN contributions ON user.username = contributions.username ORDER BY contributions.contribID DESC;";
                             // $sql .= "SELECT * FROM contributions where username = 1;";

                             $result = mysqli_query($conn,$sql);
                             
                             $rs = mysqli_fetch_array($result);
                             

                             $Points = $rs['Points'];
                             $Home = "SELECT contribHome FROM contributions WHERE username='".$_SESSION["username"]."'";
                             $Transit = $rs['contribTransit'];
                             $Food = $rs['contribFood'];
                         
                             if (isset($_POST['submit'])){
                                if (isset($_POST['options'])){
                                    $val = $_POST['options'];

                                    $newVal = $Points + $val;
                                    $newCount = $Home  + 1;
                                    $date = date("Y-m-d");
                                    $contrib = 'Household';

                                    $sql2 = "UPDATE user SET Points = $newVal WHERE username = '".$_SESSION["username"]."';
                                            INSERT INTO contributions (username, contribution, contribHome, contribTransit, contribFood, contribDate)
                                            VALUES ('".$_SESSION["username"]."', '$contrib', $newCount, $Transit, $Food, '$date' );";
                                    
                                    if (mysqli_multi_query($conn, $sql2)) {
                                        header('location: ../Progress/progressredirect.php');
						ob_end_flush();
                                    }else {
                                        echo "Error, connection wasn't made";
                                    }
                                }else{
                                    echo "Please make a submission";
                                }
                            }
                            if (isset($_POST['close'])){
                                        if (isset($_POST['options'])){
                                            $val = $_POST['options'];
                                            $newVal = $Points + $val;
                                            $newCount = $Food  + 1;
                                            $date = date("Y-m-d");
                                            $contrib = 'Food';
					    				
                                            $sql2 = "UPDATE user SET Points = $newVal WHERE username='".$_SESSION["username"]."';
                                                    INSERT INTO contributions (username, contribution, contribHome, contribTransit, contribFood, contribDate)
                                                    VALUES ('".$_SESSION["username"]."', '$contrib', $Home, $Transit, $newCount, '$date' );";

                                            if (mysqli_multi_query($conn, $sql2)) {
                                                header('location: Household.php');
						ob_end_flush();
                                            }else {
                                                echo "Error, connection wasn't made";
                                            }
                                        }else{
                                            echo "Please make a submission";
                                        }
                                    }
}else {
header('location: ../Profile/logout.php');
	
}

                            ?>

<div id="footer" class="text-center">
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="col" id="leftborder" onclick="prog()">
                <img src="Assets/ecology-07.png" class="baricon">
                <p>Progress</p>
            </div>
            <div class="col" id="border" onclick="track()">
                <img src="Assets/ecology-08.png" class="baricon">
                <p>Track</p>
            </div>
            <div class="col" id="rightborder" onclick="prof()">
                <img src="Assets/ecology-09.png" class="baricon">
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

<script>
    $(".collapse").collapse()

    $('#myCollapsible').collapse({
        toggle: false
    })
</script>


    <script>
        $().button('toggle')
        $().button('dispose')
    </script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>
