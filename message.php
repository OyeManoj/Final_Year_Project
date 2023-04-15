<?php
session_start();
$uid=$_SESSION['uid'];
$uname= $_SESSION['uname'];
$dp= $_SESSION['Dp'];
$receiver=$_GET['sid'];
include('connect.php');
 $sq="select * from stureg where sid='$uid'";
  $res = $con->query($sq);	
  $row = $res->fetch_assoc();
  
  $sq1="select * from stureg where sid='$receiver'";
  $res1 = $con->query($sq1);	
  $row1 = $res1->fetch_assoc();
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

<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="profile.php" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a></li>
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

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="#">Link 1</a></li>
    <li><a class="w3-padding-large" href="#">Link 2</a></li>
    <li><a class="w3-padding-large" href="#">Link 3</a></li>
    <li><a class="w3-padding-large" href="#">My Profile</a></li>
  </ul>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="images/<?php echo $row['image']?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?php echo $row['fname']?>&nbsp;<?php echo $row['mname'] ?>&nbsp;<?php echo $row['lname']?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $row['address']?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?php echo $row['date']?></p>
		 <p><i class="fa fa-mobile fa-fw w3-margin-right w3-text-theme"></i><?php echo $row['mob']?></p>
		 <p><i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i><?php echo $row['email']?></p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
	 
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
        
         <button onclick="myFunction('Demo2')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>Update Details</button>
       <div id="Demo2" class="w3-accordion-content w3-container">
		<form method='POST' enctype="multipart/form-data" >
            <table align='center' border='0' style='width:200px'>
			<tr>
			<td width='70px'><br><label>Email</label></td><td width='130px'><br><input type='text' name='uemail' value='<?php echo $row['email']?>'></td>
			</tr>
			<tr>
			<td width='70px'><br><label>Mobile</label></td><td width='130px'><br><input type='text' name='umob' value='<?php echo $row['mob']?>'></td>
			</tr>
			<tr>
			<td width='70px'><br><label>Address</label></td><td width='130px'><br><textarea rows='4' name='uaddress'><?php echo $row['address']?></textarea></td>
			</tr>
			<tr>
			<td width='70px'><br><label>Profile Picture</label></td><td width='130px'><br><input type="file" name="image"/>
			<input type='hidden' name='img' value="<?php echo $row['image']?>">
			</td>
			</tr>
			<tr >
			<td></td>
			  <td><br><input type="submit" class="w3-btn w3-theme" name='update' value='Update'>  
            </td>
            </tr>			
			</table>
			
          </div>
		  </div>  
		   </div>
		<br>
		
		
         <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
        <h6 class="w3-opacity">Post Your Status here..</h6>
              <input type='text' contenteditable="true" class="w3-border w3-padding" name='status' style='width:300px'>
              <br><br><button type="submit" class="w3-btn w3-theme" name='spost'><i class="fa fa-pencil"></i>Post</button>
			  <p><br></p>
	    </div>
        </div>
		
		<?php
         if(isset($_POST['spost']))
		 {
			 $status=$_POST['status'];
			 $sql="update stureg set status1='$status' where sid='$uid'";
				if(mysqli_query($con,$sql))
	        {
		        echo "<script>alert('Status updated succesfully');</script>";
	        }
	      else
	        {
		        echo"<script>alert('Try again')</script>";
	        }			 
		 }
          ?>
		
		
     
      <br>
      
      <!-- Interests 
      <div class="w3-card-2 w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>--> 
      
      <!-- Alert Box 
      <div class="w3-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-hover-text-grey w3-closebtn">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>-->
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding" >
              <h6 class="w3-opacity">Message</h6>
              <input type='text' contenteditable="true" class="w3-border w3-padding" name='msg' style='width:700px;height:70px'>
			 
			  <button type="submit" class="w3-btn w3-theme" name='message'><i class="fa fa-pencil"></i>Message</button>
			   
            </div>
          </div>
        </div>
      </div>
	    <div class='w3-container w3-card-2 w3-white w3-round w3-margin'>
		<div  class='w3-container w3-card-2  w3-round w3-margin' style='background-color:#435761;color:white;height:50px;width:95%'>
		<img src='images/<?php echo $row1['image']?>' class='w3-left w3-circle w3-margin-right' style='width:60px'>
		<h4><?php echo $row1['fname'] ?> <?php echo $row1['lname'] ?></h4>
		</div>
		<br>
	  <?php
	  if(isset($_POST['message']))
			 {
				 
				 $message=$_POST['msg'];
				  date_default_timezone_set('Asia/Kolkata');
 
              $myDate = date('Y-m-d');
              $time = date('H:i:s');
   
			$sl="Insert into message values (DEFAULT,'$uid','$receiver','$message','$myDate','$time')";
				if(mysqli_query($con,$sl))
	  {
		  
	  }
	  else
	  {
		  
	  }			  
			 }
 
	$se="select * from message where receiver in('$uid','$receiver') and sender in('$uid','$receiver') order by date desc,time desc ";
	// $se="select m.sender,m.receiver,m.message,m.date,m.time,s.fname,s.sid,s.lname,s.image from message m,stureg s where s.sid='m.receiver' and m.receiver='$uid' order by m.date desc,m.time desc";
	   $re=$con->query($se);
      if(mysqli_num_rows($re)== 0)
    {
	  echo "<p>No Chat Available</p>";
    }
  else
  {
         while($data=$re->fetch_assoc())
       {
		   $sender=$data['sender'];
		   $time=substr($data['time'], 0, -7);
	//
		if($uid == $sender)
		{
			
        echo "
		<table  align='center' border='0' width='60%'>
		<tr align='center'>
		<td style='color:grey;font-weight:bold;font-size:10px'>
		".$data['date']." ".$time."
		</td>
		</tr>
		<tr align='right'>
		<td>
		<label style='background-color:lightgrey;padding-left:10px;padding-right:10px;-webkit-border-radius: 10px;
-moz-border-radius: 10px;'>".$data['message']."</label>
<br><br>
		</td>
		</tr>
		</table>
		";
		}
		else
			{
        echo "
		<table align='center' border='0' width='60%'>
		<tr align='center'>
		<td style='color:grey;font-weight:bold;font-size:10px'>
		".$data['date']." ".$time."
		</td>
		</tr>
		<tr>
		<td>
		<label style='background-color:skyblue;padding-left:10px;padding-right:10px;-webkit-border-radius: 10px;
-moz-border-radius: 10px;'>".$data['message']."</label><br><br>
		</td>
		</tr>
		
		</table>
		";
		}
         echo" <div class='w3-row-padding' style='margin:0 -16px'>
		  ";
		  
		 
		  echo"
		 
       </div>
        ";	
		}
		} 

		?> 
		 
      </div>
      
      
      </div>
	
   
    <!-- End Middle Column -->

    
    <!-- Right Column -->
    <div class="w3-col m2">
      <!--<div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-btn w3-btn-block w3-theme-l4">Info</button></p>
        </div>
      </div>-->
      <br>
	   <div class='-card-2 w3-round w3-white w3-center'>
        <div class='w3-container'>
		<br>
          <p class="w3-btn-block w3-theme-l1 w3">Chat List</p><br>
	  <?php
	  $sql1="select * from stureg where sid != '$uid'";
      $res=$con->query($sql1);
      if(mysqli_num_rows($res)== 0)
    {
	  echo "<script>alert('No Data Found')</script>";
    }
  else
  {
         while($row=$res->fetch_assoc())
       {
             $sid=$row['sid'];
	 echo"
	 <table>
	 <tr>
	 <td>
          <img src='images/".$row['image']."' style='width:50px'>
		  </td>
		  <td>
          <a href='message.php?sid=".$sid."'><span>".$row['fname']." ".$row['lname']."</a></span><br><label style='font-size:10px'>".$row['status1']."</label>
		  </td>
		  <br>
		  </tr>
		  </table>
						
			 ";
			
  }
  }
      ?>			
	  <br>
	  </div>
      </div>
      <br>
      <!--<div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>-->
      <br>
      
      <!--<div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>-->
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
 
 



  <?php
  if(isset($_POST['update']))
		{
			$file=$_FILES['image']['tmp_name'];
					 echo $iname=$_FILES['image']['name'];
					  if(isset($iname))
					  {
					 if(!empty($iname))
					  {      
                      $location = 'images/';      
                     if(move_uploaded_file($file, $location.$iname))
					 {
                           
                     }
                    } 
					  }			
                else
					{
                    
                    }
		
		
		    		
			$uemail=$_POST['uemail'];
			//$image=$_POST['image'];
			$img=$iname;
            $image=$_POST['img'];
			$uaddress=$_POST['uaddress'];
			$umob=$_POST['umob'];
			
			
			$sel="update stureg set email='$uemail',image='$img',mob='$umob',address='$uaddress' where sid='$uid'";
			 if(mysqli_query($con,$sel))
            { 
	              echo "<script>alert(\"Updated Successfully\");</script>";
				  echo "<script>location.replace('profile.php');</script>";
            }
			else
			{
				echo "<script>alert(\"Update again\");</script>";
			}
			if(empty($img))
			{
				$sel="update stureg set email='$uemail',image='$image',mob='$umob',address='$uaddress' where sid='$uid'";
				$rel=$con->query($sel);
			
			}
		}
		
			
?>
		  </form>

<script>
// Accordion
function myFunction(Demo2) {
 document.getElementById('Demo2').style.display = "block";
  document.getElementById('Demo3').style.display = "none";
}
function myFunction1(Demo3) {
 document.getElementById('Demo3').style.display = "block";
 document.getElementById('Demo2').style.display = "none";
}
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>


</body>
</html> 
