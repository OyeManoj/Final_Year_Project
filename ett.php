<?php
session_start();
$uid=$_SESSION['uid'];
$uname= $_SESSION['uname'];
$dp= $_SESSION['Dp'];
include('connect.php');
 $sq="select * from stureg where sid='$uid'";
  $res = $con->query($sq);	
  $row = $res->fetch_assoc();
?>


<html>
<title>Intra-Student Faculty Communication System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}

.image-upload > input
{
    display: none;
}

.image-upload img
{
    width: 80px;
    cursor: pointer;
}
</style>

<body class="w3-theme-l5">
<form method='post'>
<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li class="w3-hide-small w3-dropdown-hover"><a href="profile.php" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a>
  
<li class="w3-hide-small w3-dropdown-hover"><a href="profile.php?vs=y" class="w3-padding-large w3-theme-d4"> View Selection</a>
  
  <li class="w3-hide-small w3-dropdown-hover"><a href="edate.php" class="w3-padding-large w3-theme-d4">Exam Date</a>
  </li>
   <li class="w3-hide-small w3-dropdown-hover"><a href="ett.php" class="w3-padding-large w3-theme-d4">Exam Timetable</a>
  </li>
  <!--<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a></li>
  --><li class="w3-hide-small w3-dropdown-hover">
    <a href="#" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bell"></i>
	<span class="w3-badge w3-right w3-small w3-red">
	<?php
	$date=date('Y-m-d');
	$no="select count(date) as number from notification where date='$date'";
	$num=$con->query($no);
	$rows=$num->fetch_assoc();
	echo $rows['number'];
	?>
	</span></a>     
<div class="w3-dropdown-content w3-white w3-card-4" style='font-size:13px; height:200px;
    overflow-y: scroll;'>
	<?php
       $not="Select * from notification order by date desc,time desc";
       $nt=$con->query($not);
	     while($dt=$nt->fetch_assoc())
       { 
           
		   $nid=$dt['nid'];
		    $dmsg=$dt['msg'];
		   $msg= substr($dmsg,0,50);
		   echo"
		   <a href='notify.php?nid=".$nid."'>".$msg."<br>".$dt['date']."<br>".$dt['time']."</a>";
	   }
?>
    </div>
  </li>
  <li class="w3-hide-small w3-right"><a href="Logout.php" class="w3-padding-large w3-hover-white" title="My Account">Logout</a></li>
 </ul>
</div>
<br><br><br><br>
<center>
 <div class="w3-card-2 w3-round w3-white w3-center" style="width:60%">
    <div class="w3-container">
    <h3 class="w3-opacity">Exam Timetable</h3>
    <select type='text'  class="w3-border w3-padding" name='stream' style='width:300px'>
	<option value=''>Select Course</option>
    <option value='BBA General'>BBA General</option>
    <option value='BBA Information Science'>BBA Information Science</option>
    <option value='BBA Business Analytics'>BBA Business Analytics</option>
	<option value='BBA Financial Markets'>BBA Financial Markets</option>
	<option value='BBA Entreprenureship'>BBA Entreprenureship</option>
	</select>
    <br><br>
	
	<select type='text'  class="w3-border w3-padding" name='sem' style='width:300px'>
	<option value=''>Select Sem</option>
    <option value='SemI'>SemI</option>
    <option value='SemII'>SemII</option>
	<option value='SemIII'>SemIII</option>
	<option value='SemIV'>SemIV</option>
	<option value='SemV'>SemV</option>
	<option value='SemVI'>SemVI</option>
	<option value='SemVII'>SemVII</option>
	<option value='SemVIII'>SemVIII</option>
	</select>
	<br><br>
	<button type="submit" class="w3-btn w3-theme" name='ett'><i class="fa fa-pencil"></i>Exam Timetable</button>
			  <p><br></p>
			  
			  
	<?php
	if(isset($_POST['ett']))
	{
		$stream=$_POST['stream'];
		$sem=$_POST['sem'];
		
		$sel="select * from timetable where stream='$stream' and sem='$sem'";
		$rel=$con->query($sel);
        $data=mysqli_fetch_array($rel);
		$image=$data['image'];
		if(empty($image))
		{
			echo "<input type='text' class='w3-border w3-padding' name='date' style='width:300px' value='Not Declared'><br><br>";
		}
		else
		{	
		echo
		"
		<div width='60%'>
		<img src='images/".$image."' width='80%'>
		</div><br><br>";
	    }
	}
    ?>	
	    </div>
        </div>
</center>
</form>