<?php
session_start();
$ftype=$_SESSION['ftype'];
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css"> 

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">ISFCS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
	  <?php
	  if($ftype=="Staff")
	  {
		  echo "<li><a href='url.php'>POST PAPERS</a></li>
		  <li><a href='sms.php'>POST EVENT</a></li>	
		  <li><a href='Logout.php'>LOGOUT</a></li>";
	  }
	  else
		  if($ftype=="Placement Officer")
		  {
			  echo "<li><a href='notification.php'>SEND NOTIFICATION</a></li>
			  <li><a href='Selection.php'>POST SELECTION</a></li>
        <li><a href='ViewProfile.php'>VIEW PROFILE</a></li>
        <li><a href='AddPost.php'>ADD POST</a></li>
		 <li><a href='Logout.php'>LOGOUT</a></li>";
		  }
		  else
		  {
			 echo "<li><a href='stulist.php'>UPDATE MARKS</a></li>
	  <li><a href='CreateList.php'>CREATE LIST</a></li>
        <li><a href='Logout.php'>LOGOUT</a></li>";
		  }
	  ?>
	  
		
      </ul>
    </div>
  </div>
</nav>