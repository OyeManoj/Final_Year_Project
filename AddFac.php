<?php
session_start();
include('connect.php');

//check admin is logged in or not
 
?> 
<html>
    <title>Intra-Student Faculty Communication System</title>

  <script src="jquery.validate.min.js"></script>
 
   <script>
  
  // When the browser is ready...
  $(function() {
  
    $.validator.addMethod("password",function(value,element)
{
return this.optional(element) || /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i.test(value); 
},"Password must contain UpperCase, LowerCase, Number/SpecialChar and min 8 Chars");

    // Setup form validation with the help of control's Id
    $("#myForm").validate({
    
        // Specify the validation rules 
        rules: {
				fid:"required",
				sel1:"required",
				TextBox1:"required",
				 TextBox2:"required",
				 TextBox3:"required",
				 sel3:"required",
				 sel4:"required",
				 TextBox4: 
				{
                required: true,
                email: true
				},
				TextBox5:
				{
				required:true,
				minlength:10,
				maxlength:10,
				number: true
				},	
				address: "required",
				TextBox6 : {
                required: true,
				password:true
   
				},
			},
		
        
        // Specify the validation error messages
        messages: {
            fid:"<h5><label style='color:red'>Please enter Faculty Id<label></h5>",
			sel1:"<h5><label style='color:red'>Please enter title<label></h5>",
            TextBox1:"<h5><label style='color:red'>Please enter your first name!<label></h5>",
			TextBox2:"<h5><label style='color:red'>Please enter your middle name!<label></h5>",
			TextBox3:"<h5><label style='color:red'>Please enter your last name!<label></h5>",
            sel3:"<h5><label style='color:red'>Please enter Department!<label></h5>",
			sel4:"<h5><label style='color:red'>Please enter Designation!<label></h5>",
			TextBox4: "<h5><label style='color:red'>Please enter your valid email-id<label></h5>",
            TextBox5:"<h5><label style='color:red'>Please enter valid mobile no.<label></h5>",
			address:"<h5><label style='color:red'>Please enter valid address<label></h5>",
			TextBox6:"<h5><label style='color:red'>Password must contain UpperCase, LowerCase, Number/SpecialChar and min 8 Chars<label></h5>",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>

<script>
//search faculty ajax function
	function names(search) 
	{
		  var xhttp;    
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById('first').style.display='none';
			  document.getElementById("txtHint").innerHTML = xhttp.responseText;
			}
		  };
		  var name=document.getElementById("search").value;
		  xhttp.open("GET", "facname.php?name="+name, true);
		  xhttp.send();
	}
</script>
  

    <style>
  .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: white;
  .dropdown-menu li a
      color: blue !important;
  
}
 
  </style>
  
 <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<form method='post' id='myForm' enctype="multipart/form-data" novalidate="novalidate">
			 <?php
				if($_SESSION['type']=="admin")
{
	include('adminmenu.php');
}

if($_SESSION['type']=="prin")
{
	include('prinmenu.php');
}  //This is admin menu
			 ?>
<div class="container">
<br><br><br>
<?php
if(isset($_GET['vale']) == 0)
 {
?>
<br/>
<div id='sub'>
  <ul class="nav nav-tabs">
    <li class='active'><a data-toggle="tab" href="#home">Add Faculty</a></li>
    <li><a data-toggle="tab" href="#menu1">Manage Faculty</a></li>
	 <li><a data-toggle="tab" href="#menu2">Delete Faculty</a></li>
	 
  </ul>
</div>
 <?php } 
 else 
 { 
echo 
"<ul class='nav nav-tabs'>
    <li><a data-toggle='tab' href='#home'>Add Faculty</a></li>
    <li class='active'><a data-toggle='tab' href='#menu1'>Manage Faculty</a></li>
	 <li><a data-toggle='tab' href='#menu2'>Delete Faculty</a></li>
	 
  </ul>
  "; 
} 
?>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
	  <table border='1' class="container-visitor bg-grey text-center" height='500px' width='100%'>
  <tr>
  <td>
 <h4><u>Add New Faculty</u></h4>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
  <td><br><label class="control-label">Faculty Id</label><br>
      <input type='text' class="form-control" ID="fid" name="fid" style='width:50%'><br>
  </td>
  </tr>
  </table>
  
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
  <td><br><label class="control-label" align='left'>Profile Image</label><input type="file" name="fimg" required><br><br>
  </td>
  </tr>
  </table>
  
  
   <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
   <tr align='left'>
   <td colspan='2'>
   <label class="control-label">Faculty Name</label><br>   
   </td>
   </tr>
  <tr align='center'>
  <td width='10%'>
  
  <select type='text' class="form-control" id="sel1" name='sel1' width='20px'>
    <option value=''>Title</option>
    <option>Mr.</option>
    <option>Ms.</option>
  </select>
 
  </td>
  <td width='20%'>

   <input type='text' class="form-control" ID="TextBox1" name="TextBox1" style='width:90%' placeholder='First' >
  
  </td>
  <td width='20%'>
   <input type='text' class="form-control" ID="TextBox2" name="TextBox2" style='width:90%' placeholder='Middle' >
  </td>
  <td width='20%'>
   <input type='text' class="form-control"  ID="TextBox3" name="TextBox3" style='width:90%' placeholder='Surname'>
  </td>
  </tr>
  
 </table>
 
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
		  <tr align='left'>
		 <td width='50%'><br>
		 <label class="control-label" align='left'>Department</label><br>
		 <select type='text' class="form-control" id="sel3" name='sel3' width='100%' required>
				<option value=''>Select Department</option>
				<option value='Staff'>Staff</option>
				<option value='Placement Officer'>Placement Officer</option>
				<option value='Examination Cell'>Examination Cell</option> 
				 
		 </select>
		 </td>
		 <td width='30%'></td>
		 </tr>
 </table>
 
 
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
		 <tr align='left'>
		 <td width='50%'><br>
		 <label class="control-label" align='left'>Designation</label><br>
		 <select type='text' class="form-control" id="sel4" name='sel4' width='100%' required>
				<option value=''>Select Designation</option>
				<option value='Placement Officer'>Placement Officer</option>
				<option value='Faculty'>Faculty</option>
				<option value='Examination Cell'>Examination Cell</option>
		 </select>
		 </td>
		 <td width='30%'></td>
		 </tr>
 </table>
 

 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
		 <td width='70%'><br>
		 <label class="control-label" align='left'>Email-Id</label><br>
			<input type='text' class="form-control" ID="TextBox4" name="TextBox4" style='width:70%' placeholder='Email' required><br>
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
 
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='70%'>
 <label class="control-label" align='left'>Password</label><br>
    <input type='Password' class="form-control" ID="TextBox6" name="TextBox6" style='width:70%' placeholder='Enter password' ><br>
	
 </td>
 <td width='10%'></td>
 </tr>
 </table>
 
 <input type="submit" class="btn btn-primary" value='Submit' name='addfac'>
  <input type="reset" class="btn btn-danger" value='Reset'>
<br><br>
 </td></tr>
 </table>
  </div>
 
 <div id="menu1" class="tab-pane fade" >
 
 <h4>Faculty Details</h4>
 <p style='font-size:13px'>The Details of faculty members can edit</p><br>
 <table align='center'>
 <tr><td>
 <label>Search By Name</label><br>
 <input type='text' class="form-control" ID="search" name="search"><br>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 <input type='button' class='btn btn-danger'id='searchsub' name='searchsub' value='Search' onClick="names(search)"><br>
 <br><br></td></tr>
 </table>
 <div id='first' >
<table class="table table-hover">
<?php
  include("connect.php");    //this file contains connection string
  $sel="select * from faculty";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  { 
		//displaying faculty details in grid
	  echo"
			<thead bgcolor='#424146' style='color:white'>
			  <tr>
			   <th>FacultyId</th>
			   <th>Image</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Lastname</th>
				<th>Department</th>
				<th>Designation</th>
				<th>EmailId</th>
				<th>MobileNo</th>
				<th>Action</th>
			  </tr>
			</thead>";
	while($data=mysqli_fetch_array($rel))
		  {
			  echo"
						<tbody bgcolor='#f6f6f6'>
						  <tr>
							<td>".$data['fid']."</td>
							<td><img src='images/".$data['image']."' width='50px' height='50px'></td>
							<td>".$data['fname']."</td>
							<td>".$data['mname']."</td>
							<td>".$data['lname']."</td>
							<td>".$data['dep']."</td>
							<td>".$data['des']."</td>
							<td>".$data['email']."</td>
							<td>".$data['mob']."</td>
							<td><a class='btn btn-primary' href='AddFac.php?vale=".$data['fid']."'>Edit</a></td>
						  </tr>
						  
						</tbody>";
		  }
  }

  ?>
  </table>
  </div>
  <div id='txtHint'></div>
 </div>
  
  <div id="menu2" class="tab-pane fade">
  <h4>Faculty Details</h4>
 <p style='font-size:13px'>The Details of faculty members can delete</p><br>
<table align='center'>
 <tr><td>
 <label>Search By Name</label><br>
 <input type='text' class="form-control" ID="search1" name="search1"><br>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 <input type='button' class='btn btn-danger' id='searchsub1' name='searchsub1' value='Search' onClick="names1(search1)"><br>
 <br><br></td></tr>
 </table>
 <div id='second'>
 <table class="table table-hover">
<?php
  $sel="select * from faculty";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  //displaying faculty details in grid with delete option
	  echo"
			<thead bgcolor='#424146' style='color:white'>
						  <tr>
						   <th>FacultyId</th>
						   <th>Image</th>
							<th>Firstname</th>
							<th>Middlename</th>
							<th>Lastname</th>
							<th>Department</th>
							<th>Designation</th>
							<th>EmailId</th>
							<th>MobileNo</th>
							<th>Action</th>
							<th><br></th>
						  </tr>
			</thead>";
	while($data=mysqli_fetch_array($rel))
		  {
			  echo"
				<tbody bgcolor='#f6f6f6'>
					  <tr>
						<td>".$data['fid']."</td>
						<td><img src='images/".$data['image']."' width='50px' height='50px'></td>
						<td>".$data['fname']."</td>
						<td>".$data['mname']."</td>
						<td>".$data['lname']."</td>
						<td>".$data['dep']."</td>
						<td>".$data['des']."</td>
						<td>".$data['email']."</td>
						<td>".$data['mob']."</td>
						<td><!--<a href='DelFac.php?vald=".$data['fid']."'>Delete</a>-->
						 <a class='btn btn-primary' data-toggle='confirmation' href='DelFac.php?vald=".$data['fid']."'>Delete</a>
						</td>
						<td>
						</td>
					  </tr>     
				</tbody>";
		  }
  }
  ?>
  </table>
  </div>
 
  <div id='txtHint1'>
  <script>
  console.log('Bootstrap ' + $.fn.tooltip.Constructor.VERSION);
  console.log('Bootstrap Confirmation ' + $.fn.confirmation.Constructor.VERSION);

  $('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    container: 'div'
  });
 
  
</script></div>
  </div>
		
	
	<?php
	 if(isset($_GET['vale']) == 0)
		  {
			  
		  }	
	else
	{
		$fid=$_GET['vale'];
		$sel="select * from faculty where fid='$fid' ";
		$rel=$con->query($sel);
		if(mysqli_num_rows($rel)== 0)
		  {
			  echo "<script>alert('No data found');</script>";
		  }
  else
  {   
 while($data=mysqli_fetch_array($rel))
  {
	  $fid=$data['fid'];
	  $title=$data['title'];
	  $fname=$data['fname'];
	  $mname=$data['mname'];
	  $lname=$data['lname'];
	  $dep=$data['dep'];
	  $des=$data['des'];
	  $email=$data['email'];
	  $mob=$data['mob'];
  }
		echo"<script>document.getElementById('home').style.display='none'</script>";
	    echo"<script>document.getElementById('menu1').style.display='none'</script>";
	 echo"<script>document.getElementById('menu2').style.display='none'</script>";
		
	
	?>	
	<div id='menu4' style='display:none'>
	
	<table border='1' class="container-visitor bg-grey text-center" height='500px' width='100%'>
  <tr>
  <td>
  <a href='AddFac.php'><img src='images/cross.jpg' height='30px'  style='padding-left:1100px'></a>
   <h4><u>Edit Faculty Details</u></h4>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
  <td><label class="control-label">Faculty Id</label><br>
      <input type='text' class="form-control" ID="fid" name="efid" style='width:50%' value='<?php echo $fid ?>' readonly>
  </td>
  </tr>
  </table>
   <br>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='center'>
  <td width='10%'>
 
  <select type='text' class="form-control" id="sel1" name='etitle' width='20px' readonly>
    <option><?php echo $title ?></option>
  </select>
 
  </td>
  <td width='20%'>

   <input type='text' class="form-control" ID="TextBox1" name="efname" style='width:90%' value='<?php echo $fname ?>' readonly>
  
  </td>
  <td width='20%'>
   <input type='text' class="form-control" ID="TextBox2" name="emname" style='width:90%' value='<?php echo $mname ?>' readonly>
  </td>
  <td width='20%'>
   <input type='text' class="form-control"  ID="TextBox3" name="elname" style='width:90%' value='<?php echo $lname ?>' readonly>
  </td>
  </tr>
  
 </table>
   <br>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='40%'>
 <label class="control-label" align='left'>Department</label><br>
 <select type='text' class="form-control" id="edep" name='edep' width='70%'>
    <option value='<?php echo $dep ?>'><?php echo $dep ?></option>
	<option value=''>--Select--</option>
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
 <label class="control-label" align='left'>Designation</label><br>
 <select type='text' class="form-control" id="edes" name='edes' width='70%'>
    <option <?php echo $des ?>><?php echo $des ?></option>
	<option value=''>--Select--</option>
   <option value='Assistant Professor'>Assistant Professor</option>
    <option value='Associate Professor'>Associate Professor</option>
	  <option value='Head Of Department'>Head Of Department</option>

 </select>
 </td>
 <td width='30%'></td>
 </tr>
 </table>
   <br>
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='50%'>
 <label class="control-label" align='left'>EmailId</label><br>
    <input type='text' class="form-control" ID="eemail" name="eemail" style='width:69%' value='<?php echo $email ?>' pattern="^[_a-z0-9A-Z-]+(\.[_a-z0-9A-Z-]+)*@[a-z0-9A-Z-]+(\.[a-z0-9A-Z-]+)*(\.[a-zA-Z]{2,3})$" title="Please Enter valid email Address" required><br>
	
 </td>
 <td width='10%'></td>
 </tr>
 </table>
   <br>
 <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
  <tr align='left'>
 <td width='50%'>
 <label class="control-label" align='left'>Mobile Number</label><br>
    <input type='text' class="form-control" ID="emob" name="emob" style='width:69%' value='<?php echo $mob ?>' pattern="[0-9]{10}" title="Please Enter Valid Contact No" required><br>
	
 </td>
 <td width='10%'></td>
 </tr>
 </table>
   <br>
 <input type="submit" class="btn btn-primary" value='Submit' name='Edit'>
  <input type="reset" class="btn btn-danger" value='Reset'>
  <a href='AddFac.php'><button type="button" class="btn btn-primary">Cancel</button></a>
  <br><br>
 </td>
 </tr>
 </table>
 </div>
	<?php
	echo "<script>document.getElementById('menu4').style.display='block'</script>";
	}}
	if(isset($_POST['Edit']))
{
	
	//$efid=$_POST['efid'];
	$etitle=$_POST['etitle'];
	$efname=$_POST['efname'];
	$emname=$_POST['emname'];
	$elname=$_POST['elname'];
	$edep=$_POST['edep'];
	$edes=$_POST['edes'];
	$eemail=$_POST['eemail'];
	$emobno=$_POST['emob'];
	$sql="update faculty set title='$etitle' , fname='$efname', mname='$emname', lname='$elname',
                             dep='$edep' , des='$edes',email='$eemail' , mob='$emobno' where fid='$fid' "; 	
						if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Faculty Details Updated succesfully');</script>";
		   echo "<script>location.replace('AddFac.php?vale=".$data['fid']."'')</script>" ;
 
	  }
	  else
	  {
		  echo"<script>alert('Please try again')</script>";
	  }		
}
	?>
	
	
	
	
	
  </div>
</div>

  
  <?php
if(isset($_POST['addfac']))
{
	$file=$_FILES['fimg']['tmp_name'];
					 echo $iname=$_FILES['fimg']['name'];
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
	$image=$iname;
	$fid=$_POST['fid'];
	$title=$_POST['sel1'];
	$fname=$_POST['TextBox1'];
	$mname=$_POST['TextBox2'];
	$lname=$_POST['TextBox3'];
	$dep=$_POST['sel3'];
	$des=$_POST['sel4'];
	$email=$_POST['TextBox4'];
	$mobno=$_POST['TextBox5'];
	$address=$_POST['address'];
	$pass=$_POST['TextBox6'];
	$sql="Insert into faculty values ('$fid','$image','$title','$fname','$mname','$lname','$dep','$des','$email',
	                                  '$mobno','$address','$pass')";
		if(mysqli_query($con,$sql))
		{
		  echo "<script>alert('Faculty added succesfully');</script>";
			require("class.phpmailer.php");
			require 'PHPMailerAutoload.php';			
				$subject="Login Details";			
				$mail1=$email;
				$body="Hello ".$fname.",<br>
					   Your Login details are as follows<br>
					   Username: ".$fid."<br>
					   Password: ".$pass." ";

				$mail = new PHPMailer(); 

				$mail->IsSMTP(); // send via SMTP
										//IsSMTP(); // send via SMTP
										$mail->SMTPAuth = true; // turn on SMTP authentication
										$mail->Host = "ssl://smtp.gmail.com"; 
										$mail->Port=465;
										//$mail->Host="localhost";
										$mail->Username = "tesstmail18@gmail.com"; // SMTP username
										$mail->Password = "testmail"; // SMTP password
										$webmaster_email = "tesstmail18@gmail.com"; //Reply to this email ID
				$email=$mail1; // Recipients email ID
				$name=$fname; // Recipient's name
				$mail->From = $webmaster_email;
				$mail->FromName = "Campus Placemennt";
				$mail->AddAddress($email,$name);
				$mail->AddReplyTo($webmaster_email,"Campus Placemennt");
				$mail->WordWrap = 50; // set word wrap
				//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment
				//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
				$mail->IsHTML(true); // send as HTML
				$mail->Subject = $subject;
				$mail->Body = $body ; //HTML Body
				$mail->AltBody = ""; //Text Body
					if(!$mail->Send())
					{
					echo "Mailer Error: " . $mail->ErrorInfo;
					}
					else
					{
						echo "<script>alert('Username and password has been sent to faculty');</script>";
							 echo "<script>location.replace('AddFac.php')</script>" ;
					//echo "mail not sent";
					}
		
		}
}
?>
</form>
</body>
</html>
		<script src="../bower_components/jquery/dist/jquery.js"></script>
		<script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
		<script src="bootstrap-confirmation.js"></script>
	<script>
		  console.log('Bootstrap ' + $.fn.tooltip.Constructor.VERSION);
		  console.log('Bootstrap Confirmation ' + $.fn.confirmation.Constructor.VERSION);

		  $('[data-toggle=confirmation]').confirmation({
			rootSelector: '[data-toggle=confirmation]',
			container: 'body'
		  }); 
	</script> 
 
		<?php
			include('footer.php');

 
?>