<?php
include('placementMenu.php');
?>
<html>
<head>
  
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
<?php

include('connect.php');

$sql="select * from faculty where fid='1001'";
  $rel=$con->query($sel);
  
  if($row=mysqli_fetch_array($rel))
		  {
?>
<section class="mbr-footer mbr-section mbr-section-md-padding" id="contacts5-0" style="background-color: rgb(239, 239, 239); padding-top: 90px; padding-bottom: 90px;">


    
	<table border='1' align='center' width='80%'><tr><td width='50%'>
    <center>
            <div class="mbr-company col-xs-12 col-md-6 col-lg-3" style='border:1px solid black;width:80%;align:right'>

                <div class="mbr-company card">
                    <div><img src="assets/images/logo.png" class="card-img-top"></div>
                    <div class="card-block">
                        <p class="card-text">MY  PROFILE</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="list-group-icon"><span class="etl-icon icon-phone mbr-iconfont-company-contacts5"></span></span>
                            <span class="list-group-text">+1 (0) 000 0000 001 or +1 (0) 000 0000 002</span>
                        </li>
                        <li class="list-group-item">
                            <span class="list-group-icon"><span class="etl-icon icon-map-pin mbr-iconfont-company-contacts5"></span></span>
                            <span class="list-group-text"><?php echo $row['address']; ?></span>
                        </li>
                        <li class="list-group-item active">
                            <span class="list-group-icon"><span class="etl-icon icon-envelope mbr-iconfont-company-contacts5"></span></span>
                            <span class="list-group-text"><a href="mailto:support@mobirise.com">support@mobirise.com</a></span>
                        </li>
                    </ul>
                </div>

            </div>
			</td>
			
			<td width='50%'>
			<div class="mbr-footer-content col-xs-12 col-md-6 col-lg-3" style='border:1px solid black;width:100%'>
                <p><strong>Contacts</strong><br>Email: support@mobirise.com<br>Phone: +1 (0) 000 0000 001<br>Fax: +1 (0) 000 0000 002<br><br><br><strong>Address</strong><br>1234 Street Name<br>City, AA 99999</p>
            </div></td></tr></table>
            </center>
			<?php 
		  }
			?>
        
</section>


  <section class="engine"><a rel="external" href="https://mobirise.com">easy html site maker</a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/viewportChecker/jquery.viewportchecker.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  
  
  <input name="animation" type="hidden">
  </body>
</html>