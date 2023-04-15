<?php
session_start();
?>
<head>
  
  <title>Intra-Student Faculty Communication System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css"> 

</head>

  
  <style>
 
  </style>
  
     <script>
	 function noCB()
	 {
		 var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("cb").innerHTML = xhttp.responseText;
    }
  };
  var un=document.getElementById("cbacklogs").value;

  xhttp.open("GET", "noCBPage.php?cb="+un, true);
  xhttp.send();
	 }
  </script>

  
  <script>
  function usernameExist()
  {
	  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("viUn").innerHTML = xhttp.responseText;
    }
  };
  var un=document.getElementById("TextBox22").value;

  xhttp.open("GET", "checkUsername.php?un="+un, true);
  xhttp.send();
  }
  </script>
  


 
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<form method="POST" enctype="multipart/form-data" action="">
<?php  if($_SESSION['type']=="admin")
{
	include('adminmenu.php');
}

if($_SESSION['type']=="prin")
{
	include('prinmenu.php');
} ?>
  <br/><br/><br/>
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
     
    </div>
    <div class="col-sm-8 text-left">
      <h1>Student Register</h1>
      <p>Registered Candidate can view submitted information and cannot edit make any changes in educational Details.<br>Education Information is for refference only.</p>
      <hr>
      
  <table border='1' class="container-visitor bg-grey text-center" height='500px' width='100%'>
  <tr>
  <td><div class="form-group">
  <h4 align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <u>Personal Details</u>
  </h4>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='center'>
  <td width='10%'>  
  <select type='text' class="form-control" id="sel1" name='sel1' width='20px' required>
    <option value=''>Title</option>
    <option value='Mr.'>Mr.</option>
    <option value='Ms.'>Ms.</option>
  </select>
  </td>
  <td width='20%'>

   <input type='text' class="form-control" ID="TextBox1" name="TextBox1" style='width:90%' placeholder='First' pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only"  required>
  
  </td>
  <td width='20%'>
   <input type='text' class="form-control" ID="TextBox2" name="TextBox2" style='width:90%' placeholder='Middle'  pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" required>
  </td>
  <td width='20%'>
   <input type='text' class="form-control"  ID="TextBox3" name="TextBox3" style='width:90%' placeholder='Surname'  pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only"  required>
  </td>
  </tr>
  <tr align='center'>
  <td colspan='4'>
   </td>
  </tr>
 </table>
 <br>
 <table border='0' class="container-visitor bg-grey text-center" align='center'  width='80%'>
  <tr align='left'>
 <td width='30%'> 
<div class="control-group">
                <label class="control-label">Date of Birth</label>
                <input type='text' class="form-control" ID="date" name="date" style='width:70%' required><br>
            </div>

</td>

<td width='30%'><!--<label class="control-label">Gender</label>
    <select type='text' class="form-control" id="sel2" width='100%'>
    <option>Select</option>
    <option>Male</option>
    <option>Female</option>
  </select>--></td>
  <td width='20%'></td>
</tr>

</table>
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='70%'>
 <label class="control-label" align='left'>Email-Id</label><br>
    <input type='text' class="form-control" ID="TextBox4" name="TextBox4" style='width:70%' placeholder='Email' pattern="^[_a-z0-9A-Z-]+(\.[_a-z0-9A-Z-]+)*@[a-z0-9A-Z-]+(\.[a-z0-9A-Z-]+)*(\.[a-zA-Z]{2,3})$" title="Please Enter valid email Address" required><br>
	
 </td>
 <td width='10%'></td>
 </tr>
 </table>
 
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='70%'>
 <label class="control-label" align='left'>Mobile Number</label><br>
    <input type='text' class="form-control" ID="TextBox5" name="TextBox5" style='width:70%' placeholder='Mobile' pattern="[0-9]{10}" title="Please Enter Valid Contact No" required><br>
	
 </td>
 <td width='10%'></td>
 </tr>
 <tr align='left'>
 <td width='70%'>
		<label class="control-label" align='left'>Profile Image</label><input type="file" name="image" required><br><br>
</td>
	</tr>
 </table>
 
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='50%'>
 <label class="control-label" align='left'>Address</label><br>
    <textarea class="form-control" rows="4"  id="address" name='address' required></textarea><br>
	
 </td>
 <td width='30%'></td>
 </tr>
 </table>
 <h4 align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <u>Educational Details</u>
  </h4>
  
  
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='50%'>
 <label class="control-label" align='left'>Course</label><br>
 <select type='text' class="form-control" id="sel3" name='sel3' width='100%' required>
    <option value=''>Select Course</option>
   <option value='BBA General'>BBA General</option>
    <option value='BBA Information Science'>BBA Information Science</option>
 <option value='BBA Business Analytics'>BBA Business Analytics</option> 
  <option value='BBA Financial Markets'>BBA Financial Markets</option>
 <option value='BBA Entreprenureship'>BBA Entreprenureship</option> 
 </select>
 </td>
 <td width='30%'></td>
 </tr>
 </table>
 
 <br>
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='40%'>
 <label class="control-label" align='left'>SSC Percentage</label><br>
    <input type='number' class="form-control" ID="TextBox6" name="TextBox6" style='width:70%' min='1' max='100' step='0.01' title="Please Enter Valid Percentage" required>
  <br>
 </td>
 <td width='40%'>
  <label class="control-label" align='left'>HSC Percentage</label><br>
  <input type='number' class="form-control" ID="TextBox7" name="TextBox7" style='width:70%'  min='1' max='100' step='0.01' title="Please Enter Valid Percentage" required> 
   <br>
 </td>
 </tr>
 

  <tr align='left'>
 <td width='40%'>
 <label class="control-label" align='left'>Graduation Percentage</label><br>
    <input type='number' class="form-control" ID="TextBox6" name="grad" style='width:70%' min='1' max='100' step='0.01' title="Please Enter Valid Percentage" required>
 </td>
 
 </tr>
 
 </table>
 

 
 <table class="container-visitor bg-grey text-center" align='center' width='80%'><tr align='center'>
   <tr align='left'><td width='50%'><br/>
 <label class="control-label">History of Backlogs</label><br/>
 
 <select type='text' class="form-control" id="hbacklogs" name='hbacklogs' style='width:61%' required>
    <option value=''>Select </option>
     <option value='Yes'>YES</option>
    <option value='No'>NO</option>
 </select>
 </td>
 
 </tr></table>
 <br>
  <table class="container-visitor bg-grey text-center" align='center' width='80%'><tr align='center'>
   <tr align='left'><td width='50%'>
 <label class="control-label">Current Backlogs</label><br/>
 
 <select type='text' class="form-control" id="cbacklogs" name='cbacklogs'onChange="noCB()" style='width:61%' required>
    <option value=''>Select </option>
     <option value='Yes'>YES</option>
    <option value='No'>NO</option>
 </select>
 </td>
 
 </tr></table>
 
 <table class="container-visitor bg-grey text-center" align='center' width='80%'><tr align='center'>
   <tr align='left'><td width='50%'>
 <div id="cb"></div>
 </td>
 
 </tr></table>
 
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='70%'><br>
 <label class="control-label" align='left'>Enter Username</label><br>
    <input type='text' class="form-control" ID="TextBox22" onkeyup="usernameExist()" name="TextBox22" style='width:70%' required><br><div id='viUn'></div>
	
 </td>
 <td width='10%'></td>
 </tr>
 </table>
 
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='70%'><br>
 <label class="control-label" align='left'>Enter Password</label><br>
    <input type='password' class="form-control" ID="TextBox23" name="TextBox23" style='width:70%' pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" Title="Password must be UpperCase, LowerCase, Number/SpecialChar and min 8 Chars" required><br>
		 </td>
 <td width='10%'></td>
 </tr>
 </table><br>
 <input type="submit" class="btn btn-primary" value='Submit' name='register'>
  <input type="reset" class="btn btn-primary" value='Reset'>
  <a href='Homepage.php'><button type="button" class="btn btn-primary">Cancel</button></a>
</td> 
</tr>
  </table>
  </div>
    </div>
    <div class="col-sm-2 sidenav">
     
      </div>
    </div>
  </div>


<?php
if(isset($_POST['register']))
{
	include('connect.php');
	
	 $file=$_FILES['image']['tmp_name'];
					 echo $iname=$_FILES['image']['name'];
					  if(isset($iname))
					  {
					 if(!empty($iname))
					  {      
                      $location = 'images/';      
                     if(move_uploaded_file($file, $location.$iname))
					 {
                             echo 'uploaded';
                     }
                    } 
					  }			
                else
					{
                     echo 'please upload';
                    }
	
	$title=$_POST['sel1'];
	$fname=$_POST['TextBox1'];
	$mname=$_POST['TextBox2'];
	$lname=$_POST['TextBox3'];
	$date= $_POST['date'];
	$email=$_POST['TextBox4'];
	$mobno=$_POST['TextBox5'];
	$image=$iname;
	$address=$_POST['address'];
	$dep=$_POST['sel3'];
	$ssc=$_POST['TextBox6'];
	$hsc=$_POST['TextBox7'];
	$grad=$_POST['grad'];
	$pgrad=$_POST['pg'];
	
	$hbl=$_POST['hbacklogs'];
	$cbl=$_POST['cbacklogs'];
	if($cbl=="Yes")
	{
		$cbl=$_POST['noCb'];
	}
	
	//$tm7=$_POST['TextBox20'];
	//$g7=$_POST['sel10'];
	//$p7=$_POST['TextBox21'];
	
	$user=$_POST['TextBox22'];
	$pass=$_POST['TextBox23'];
	

	
	 /*$var="select max(sid) as max from stureg";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);
       $sid = $row['max'] + 1;*/
	   if(isset($user))
	   {
		   $sq = "SELECT * FROM stureg where username='$user'";
		   $res=$con->query($sq);
		   if(mysqli_num_rows($res)>=1)
              {
	         echo "<script>alert('Username already exists...Try again')</script>";
             }
	  else
	   {
	   
	$sql="Insert into stureg(title,fname,mname,lname,date,email,mob,image,address,department,ssc,hsc,graduation,pgraduation,hbacklog,cbacklog,username,password,status,status1) values ('$title','$fname','$mname','$lname','$date','$email','$mobno','$image','$address','$dep','$ssc','$hsc','$grad','$pgrad','$hbl','$cbl','$user','$pass','NO','')";
								  
	
					if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Register succesfully');</script>";
		   echo "<script>location.replace('Homepage.php')</script>" ;
 
	  }
	  else
	  {
		  echo"<script>alert('Username Available')</script>";
	  }			  
	
}
	   }
}
?>

</form>

</body>
</html>


