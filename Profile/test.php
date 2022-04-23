<!DOCTYPE html>
<head>
<style>
.logo {
    left: 50%;
    top: 3%;
    transform: translate(-50%, 0%);
    position: fixed;
    z-index: 5;
}

.avatar {
    vertical-align: middle;
    width: 150px;
    height: 150px;
    left: 5%;
    top: 20%;
    position: fixed;
    border-radius: 50%;
    z-index: -5;
}

h3 {
    text-align: left;
    left: 35%;
    top: 21%;
    transform: translate(0%, 0%);
    position: fixed;
    font-family: 'Blinker', sans-serif;
    font-size: 200%;
    font-weight: 600;
    color: #71A306;
}

#accordion {
    margin-top: 65%;

    margin-left: 10%;
    margin-right: 10%;
    background-color: white;
}

.card {
    border: none;
    border-radius: 0%;
}

.navbar-expand-sm {
    top: 37%;
    width: 100%;
    font-family: 'Blinker', sans-serif;
    font-size: 110%;
    position: fixed;
    color: #FFFFFF;


}

.navbar-expand-md {
    top: 35%;
    width: 80%;
    font-family: 'Blinker', sans-serif;
    font-size: 100%;
    position: fixed;
    color: #FFFFFF;
    margin-left: 10%;
    margin-right: 10%;


}

.navbar-expand-md:hover {
    background-color: #F8F8F8;
}


.nav-item {
    font-family: 'Blinker', sans-serif;
    font-weight: 100;
    margin-left: 10%;
}


.navbar-brand {
    color: #71A306;
    margin-top: 5%;
    margin-bottom: 5%;
    font-size: 130%;
    font-weight: 300;
    text-align: left;
    margin-right: 40%;


}

.navbar-brand:hover {
    color: #71A306;
}

.icon {
    width: 7%;
    margin-right: 10%;
}

.baricon {
    width: 15%;
    border: none;
}

.link {
    color: #71A306;
    font-weight: 300;
}

.link:hover {
    background: #c3c3c3;

}

.nav-link {
    color: #71A306;

}

.nav-link:hover {
    color: #B9D11A !important;
}

.card-header {
    background-color: transparent;
    margin-left: 5%;
    margin-right: 5%;

}

#headingOne,
#headingTwo,
#headingThree {
    border-bottom: 0.25 solid #71A306;
}

#headingFour {
    border: none;
}

#footer {
    background-color: #81B16C;
    position: fixed;
    bottom: 0px;
    left: 0px;
    right: 0px;

    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
    height: auto;
    margin-bottom: 0px;
}

.btn-block {
    background-color: transparent;
    border: none;
    font-size: 12px;
    text-transform: ;
    width: 100%;
    font-family: 'Blinker', sans-serif;
    font-weight: 300;
    border-radius: 0;
    text-transform: uppercase;
}



.btn-block:hover {
    background-color: transparent;
}

.col {
    height: auto;
    border: none;
    padding-top: 15px;
    padding-bottom: 15px;

}

.col:hover {
    background-color: #56A082;
}

#border {
    border-right: 0.5px solid #ffffff;
    border-radius: 0px;
    
}

#rightborder {
    border-top-right-radius: 50px;
}

#leftborder {
    border-right: 0.5px solid #ffffff;
    border-top-left-radius: 50px;
}

/* RESPONSIVE */

@media only screen and (max-width: 576px) {
    .logo {
        width: 14%;
    }

    .avatar {
        width: 100px;
        height: 100px;
        margin-left: 5%;
    }

    h3 {
        margin-left: 5%;
        left: 37%;
    }

}


@media only screen and (min-width: 577px) and (max-width: 768px) {}

@media only screen and (min-width: 769px) and (max-width: 992px) {}


@media only screen and (min-width: 993px) {}

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
<div id="footer" class="text-center">
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="col-sm" id="leftborder">
                <img src="Assets/ecology-07.png" class="baricon">
                <a class="btn btn-success btn-block" role="button" href="progress3.php">Progress</a>
            </div>
            <div class="col-sm" id="border">
                <img src="Assets/ecology-08.png" class="baricon">
                <a class="btn btn-success btn-block" role="button" href="../Tracking/Tracking.html">Track</a>
            </div>
            <div class="col-sm" id="rightborder">
                <img src="Assets/ecology-09.png" class="baricon">
                <a class="btn btn-success btn-block" role="button" href="../Profile/profile.php">Profile</a>
            </div>
        </div>
    </div>
</div></body>
</html>