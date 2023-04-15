<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Intra-Student Faculty Communication System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="style1.css"> 

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<form method='post'>


	<?php
	include('homeMenu.php');
	include("connect.php");
	 
	if(isset($_POST['adminlogin']))
	{
		 $uname=$_POST['auname'];
		   $pass=$_POST['apass'];
		   if(empty($uname)||empty($pass))
			   {
				   echo "<script>alert('Please Fill id and Password');</script>";
			   }
			   else
			   {
	   $sel="select * from admin where id='$uname' and pwd='$pass'";
	   $result=$con->query($sel);
			
			if($row=mysqli_fetch_array($result))				
		   {
					$_SESSION['aid']=$row['id'];
					$aid= $_SESSION['aid'];
					$_SESSION['type']="admin";
					echo "<script>window.location.href='AddFac.php'</script>";  
			}
			else
			{
				echo "<script>alert('Invalid Username or Password');</script>";
	      	}
   }
		
	}
	
	if(isset($_POST['prinlogin']))
	{
		 $pname=$_POST['pname'];
		   $ppass=$_POST['ppass'];
		   if(empty($pname)||empty($ppass))
			   {
				   echo "<script>alert('Pleasee Fill Username and Password');</script>";
			   }
			   else
			   {
	   $sel="select * from principal where id='$pname' and pass='$ppass'";
	   $result=$con->query($sel);
			
			if($row=mysqli_fetch_array($result))				
		   {
					$_SESSION['prid']=$row['prid'];
					$prid= $_SESSION['prid'];
					$_SESSION['type']="prin" ;
					echo "<script>window.location.href='ApprovePost.php'</script>";  
			}
			else
			{
				echo "<script>alert('Invalid Username or Password');</script>";
	      	}
   }
		
	}
	
		if(isset($_POST['stulogin']))
	{
		 $uname=$_POST['uname'];
		   $pass=$_POST['pass'];
		   if(empty($uname)||empty($pass))
			   {
				   echo "<script>alert('Please Fill Username and Password');</script>";
			   }
			   else
			   {
	   $sel="select * from stureg where username='$uname' and password='$pass'";
	   $result=$con->query($sel);
			
			if($row=mysqli_fetch_array($result))				
		   {
					$_SESSION['uid']=$row['sid'];
					$uid= $_SESSION['uid'];
					
					$_SESSION['Dp']=$row['image'];
					$dp= $_SESSION['Dp'];
					
					$_SESSION['uname']=$row['fname']." ".$row['lname'];
					$uname= $_SESSION['uname'];
				 
					echo "<script>window.location.href='profile.php'</script>";  
			}
			else
			{
				echo "<script>alert('Invalid Username or Password');</script>";
	      	}
   }
		
	}
	
	if(isset($_POST['faclogin']))
	{
		 $uname=$_POST['fname'];
		   $pass=$_POST['fpass'];
		   if(empty($uname)||empty($pass))
			   {
				   echo "<script>alert('Please Fill Username and Password');</script>";
			   }
			   else
			   {
	   $sel="select * from faculty where fid='$uname' and password='$pass'";
	   $result=$con->query($sel);
			
			if($row=mysqli_fetch_array($result))				
		   {
					$_SESSION['fid']=$row['fid'];
					$fid= $_SESSION['fid'];
					
					$_SESSION['fimage']=$row['image'];
					$_SESSION['fcont']=$row['mob'];
					
					$_SESSION['fname']=$row['fname']." ".$row['mname']." ".$row['lname'];
					$fname= $_SESSION['fname'];	
					$_SESSION['ftype']=$row['des'];
					$ft=$_SESSION['ftype'];
					echo "<script>window.location.href='CreateList.php'</script>";  
			}
			else
			{
				echo "<script>alert('Invalid Username or Password');</script>";
	      	}
   }
		
	}
	?>
<div class="container-fluid bg-1 text-center" style='height:450px'>
<br><br><br><br>
  <img src="images/banner.gif" class="img-responsive margin" style="display:inline;height:300px"   width="550" >
<h4>Intra-Student Faculty Communication System</h4><br><br>
  </div>

<!-- Container (The Band Section) -->
<div id="about" class="container text-center">
  <h3>ABOUT</h3>
  <p><em>Intra-Student Faculty Communication System</em></p>
  <p>You are at the right place! Here you can fill all your communication gaps for getting information about campus placement !!!</p>
  <br>
 
</div>

<!-- Container (TOUR Section) -->
<div id="user" class="bg-1">
  <div class="container">
    <h3 class="text-center">STUDENT LOGIN</h3>
    <p class="text-center">Registered User Login into the system<br> for getting updates about campus placement.</p>
<center> 
 <div class="row text-left" style='width:40%'>      
	  <label class='text-left'>Username</label><br>
      <input type='text' class='form-control' placeholder="Enter username" name='uname'><br>
      <label for="lname">Password</label>
      <input type='password' class='form-control' placeholder="Enter password" name='pass'><br><br>
      <input type='submit' class="btn pull" value="Login" name='stulogin' OnClick="Button1_Click" />
      <input type='reset' class="btn pull" value="Reset"  />
</div>
   </center> 
    
  </div>
  
  
</div>

<!-- Container (Contact Section) -->
<div id="prin" class="container">
  <h3 class="text-center">PRINCIPAL LOGIN</h3>
  <p class="text-center">Principal can Login into the system<br> for performing various important task.</p>
<center> 
 <div class="row text-left" style='width:40%'>      
	  <label class='text-left'>Username</label><br>
      <input type='text' class='form-control' placeholder="Enter username" name='pname'><br>
      <label for="lname">Password</label>
      <input type='password' class='form-control' placeholder="Enter password" name='ppass'><br><br>
      <input type='submit' class="btn pull" value="Login" name='prinlogin'/>
      <input type='reset' class="btn pull" value="Reset"  />
</div>
   </center>    
  </div>
  
  <!-- Faculty/Staff section -->
  <div id="fac" class="bg-1">
  <div class="container">
    <h3 class="text-center">STAFF / PLACEMENT OFFICER LOGIN</h3>
    <p class="text-center">Registered staff/placement officer can login</p>
<center> 
 <div class="row text-left" style='width:40%'>      
	  <label class='text-left'>Username</label><br>
      <input type='text' class='form-control' placeholder="Enter username" name='fname'><br>
      <label for="lname">Password</label>
      <input type='password' class='form-control' placeholder="Enter password" name='fpass'><br><br>
      <input type='submit' class="btn pull" value="Login" name='faclogin'/>
      <input type='reset' class="btn pull" value="Reset"  />
</div>
   </center>    
  </div>    
</div>
  
  
  <div id="admin" class="container">
  <h3 class="text-center">ADMIN LOGIN</h3>
  <p class="text-center">Admin can Login into the system<br> for performing various important task.</p>
<center> 
 <div class="row text-left" style='width:40%'>      
	  <label class='text-left'>Username</label><br>
      <input type='text' class='form-control' placeholder="Enter username" name='auname'><br>
      <label for="lname">Password</label>
      <input type='password' class='form-control' placeholder="Enter password" name='apass'><br><br>
      <input type='submit' class="btn pull" value="Login" name='adminlogin' OnClick="Button1_Click" />
      <input type='reset' class="btn pull" value="Reset"  />
</div>
   </center> 
    
  </div>

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p><a href="#" data-toggle="tooltip" title="">Intra-Student Faculty Communication System</a></p> 
</footer>

</form>
</body>
</html>
