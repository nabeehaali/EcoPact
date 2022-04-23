<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>EcoPact | Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css" />
    <link href="https://fonts.googleapis.com/css?family=Blinker:200,300,400,600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="center">
        <img src="Assets/watering_plants.png" class="image1">
    </div>


    <form class="form-1" action="register.php" method="post">
	<?php include('errors.php'); ?>
        <h1>REGISTER</h1>
        <br>
        <div class="tab">
            <label>Username</label><br>
            <input type="text" id="text" name="username" oninput="this.className = ''" value="<?php echo $username; ?>">
            <br><br>
            <label>E-mail</label>
            <br>
            <input type="text" id="text" name="email" oninput="this.className = ''" value="<?php echo $email; ?>">
        </div>

        <div class="tab">
            <label>Password</label><br>
            <input type="password" id="text" name="password_1" oninput="this.className = ''">
            <br><br>
            <label>Confirm Password</label>
            <br>
            <input type="password" id="text" name="password_2" oninput="this.className = ''">
        </div>

        <div class="tab">
        </div>


        <input type="hidden" name="data" value="">

        <div>
            <div style="float:left; margin-top: 10%;">
                <button type="button" class="btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>

            </div>
            <div style="float:right; margin-top: 10%;">
                <button type="submit-button" type="submit" class="btn-primary" id="nextBtn" name="reg_user" onclick="nextPrev(1)">Next</button>
            </div>
        </div>

        <div style="text-align:center;margin-top:30%;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>

    <!--   <div class="col-md-4">
        <img src="Assets/watering_plants.png" class="image1">
    </div>
    <div class="col-md-4">
        <form class="form-1" method="post" action="login.php">
            <?php include('errors.php'); ?>
            <h1>REGISTER</h1>
            <br>
            <div class="tab">
                <label>Username</label><br>
                <input type="text" name="username" oninput="this.className = ''">
                <br>
                <label>E-mail</label>
                <br>
                <input type="text" name="email" oninput="this.className = ''">
            </div>

            <div class="tab">
                <label>Password</label><br>
                <input type="password" id="p1" name="password_1" oninput="this.className = ''">
                <br>
                <label>Confirm Password</label>
                <br>
                <input type="password" id="p2" name="password_2" oninput="this.className = ''">
            </div>

            <div class="tab">
                <h3>Welcome to EcoPact,</h3>
            </div>

            <div class="center">
                <button class="btn btn-primary" type="button" name="login_user">CONTINUE</button>
            </div>
        </form>
    </div>

-->

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;

        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:

                document.getElementsByClassName("form-1").submit();
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
            
alert("hiiiiiiiiiii");

       document.getElementById("form-1").innerHTML = xhttp.responseText;
    }
};
xhttp.open("GET", "server.php", true);
xhttp.send();
            return false;


        }        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
            }
        }

	/*var p1 = document.getElementbyId("p1");
	var p2 = document.getElementbyId("p2");
	if (p1 != p2)
	{
		valid = false;
	}*/

        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script></html>
