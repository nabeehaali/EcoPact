<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
echo "				<div class=\"text-center\">
					<button type=\"button\" class=\"btn\" data-toggle=\"modal\" data-target=\"#exampleModalCenter2\" data-backdrop=\"false\" style=\"background-color: #71A306; color: white; border-radius: 50px\">
  					View Garden
					</button>
					</div>";
    echo " <div class=\"modal fade\" id=\"exampleModalCenter2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
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
<script>
$(document).ready(function(){
  $('[data-toggle=\"popover\"]').popover();   
});
</script>

";

?>
<div class="container">
  <h3>Popover Example</h3>
  
</div>



</body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="animsition.min.js"></script>
<script>
    $(document).ready(function() {
  $(".animsition-overlay").animsition({
    inClass: 'overlay-slide-in-right',
    outClass: 'overlay-slide-out-right',
    inDuration: 1500,
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
