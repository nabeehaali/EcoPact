<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="trackitems.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Blinker:200,300,400,600&amp;display=swap" rel="stylesheet">
</head>

<body>
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
</body>
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

 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>

