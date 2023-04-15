<?php
session_start();
include('connect.php');


?>  
<html>
  <title>Intra-Student Faculty Communication System</title>

  <script src="jquery.validate.min.js"></script>
  <script src="jquery-1.8.3.min.js"></script>
<script>
$(function() {
  
    // Setup form validation on the #register-form element
    $("#myForm").validate({
    
        // Specify the validation rules
        rules: {
			tm:
			{
				required:true,
				minlength:0,
				maxlength:3,
				max:900,
				},
			grd:"required",
			prc: 
				{
					required:true,
				minlength:0,
				maxlength:5,
				max:100,
				step:0.01,
				},
		},
		 messages: {
			 tm:"<label style='color:red'>Enter Valid Total Marks!</label>",
			 grd:"<label style='color:red'>Enter Valid Total Marks!</label>",
			 prc:"<label style='color:red'>Enter Valid Percentage!</label>",
			 },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>

  
</script>
<?php
if($_SESSION['type']=="admin")
{
	include('adminmenu.php');
}

if($_SESSION['type']=="prin")
{
	include('prinmenu.php');
}

 ?>
	
 <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<form method='post' id='myForm'  novalidate="novalidate">
   
<div class="container" style='width:100%'>
<br><br><br><br>
  <ul class="nav nav-tabs">
    <li class='active'><a data-toggle="tab" href="#view">Student Details</a></li>
	
    <li><a data-toggle="tab" href="#delete">Delete Student</a></li>
	 
	 
  </ul>

  <div class="tab-content" style='width:100%'>
    <div id="view" class="tab-pane fade in active" style='width:100%'>
	<h4 >Student Details</h4>
	<br>
	 <table align='center'>
 <tr><td>
 <label>Search By Name</label><br>
 <input type='text' class="form-control" ID="search" name="search"><br>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 <input type='button' class='btn btn-danger'id='searchsub' name='searchsub' value='Search' onClick="names(search)"><br>
 <br><br></td></tr>
 </table>
 
 <?php
 if(!empty($_GET['vall']))
 {?>
 <div id="Marks">
 <table width='90%' border='0'>
<tr align='center'>
 <td width='10%'>
 <label class="control-label">Sem VII</label>
 </td>
 </td>
 <td width='20%'>
 <input type='number' class="form-control" ID="tm" name="tm" placeholder="Total Marks" style='width:85%'  required>
 </td>
 <td width='25%'>
 <select type='text' class="form-control" id="grd" name='grd' width='100%' required>
    <option value=''>Select Grade</option>
     <option value='FCD'>FCD</option>
    <option value='FC'>FC</option>
 <option value='SC'>SC</option> 
 </select>
 </td>
 <td width='25%'>
 <input type='text' class="form-control" ID="prc" name="prc" placeholder="Percentage" style='width:85%' pattern="[0-9.]{}" title="Please Enter Valid Percentage" required>
 </td>
 </tr>
 
 <tr><td colspan='4' align='center'><br/>
 <input type='submit' name='updst' value='Update Marks' class="btn btn-primary"/><br/><br/>
 </td></tr>
 </table>
 </div>
 <?php } 

if(isset($_POST['updst']))
{
	$sidd=$_GET['vall'];
	$tm=$_POST['tm'];
	$grd=$_POST['grd'];
	$prc=$_POST['prc'];
	$upd="Update stureg set total7='$tm',grade7='$grd',perc7='$prc' where sid='$sidd'";
	if(mysqli_query($con,$upd))
 {
	 echo "<script>alert('Updated Successfully')</script>" ;
	echo "<script>location.replace('student.php')</script>" ;
 }
 else
 {
	 
 }
}

 ?>
 
 <div id='first' style='width:100%'>
<table class="table table-hover" width='100%'>
<?php
  include("connect.php");
  $sel="select * from stureg";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  echo"
    <thead bgcolor='#424146' style='color:white'>
      <tr>
	   <th>Student Id</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
		<th>Department</th>
		
		<th>Email-Id</th>
		<th>Mobile No</th>
		<th>Address</th>
       <th>Action</th>
	   
      </tr>
    </thead>";
	while($data=mysqli_fetch_array($rel))
		  {
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr>
        <td>".$data['sid']."</td>
        <td>".$data['fname']."</td>
        <td>".$data['mname']."</td>
		<td>".$data['lname']."</td>
		<td>".$data['department']."</td>
		
		<td>".$data['email']."</td>
		<td>".$data['mob']."</td>
		<td>".$data['address']."</td>
		<td><!--<a href='DelStu.php?vald=".$data['sid']."'>Delete</a>-->
		 <a class='btn btn-primary' data-toggle='confirmation' href='ApproveStu.php?vald=".$data['sid']."'>Approve</a>
		</td>
		
      </tr>
      
    </tbody>";
		  }
  }
  ?>
  </table>
  </div>
  <div id='txtHint'></div>
  </div>
  <div id="delete" class="tab-pane fade">
  <h4>Student Details</h4>
 <p style='font-size:13px'>The Details of student can be deleted</p><br>
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
  include("connect.php");
  $sel="select * from stureg";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  echo"
    <thead bgcolor='#424146' style='color:white'>
      <tr>
	   <th>Id</th>
        <th>Firstname</th>
        <th>Middlename</th>
        <th>Lastname</th>
		<th>Department</th>
		
		<th>EmailId</th>
		<th>MobileNo</th>
		<th>Address</th>
		 <th>Action</th>
      </tr>
    </thead>";
	while($data=mysqli_fetch_array($rel))
		  {
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr>
        <td>".$data['sid']."</td>
        <td>".$data['fname']."</td>
        <td>".$data['mname']."</td>
		<td>".$data['lname']."</td>
		<td>".$data['department']."</td>
		
		<td>".$data['email']."</td>
		<td>".$data['mob']."</td>
		<td>".$data['address']."</td>
		<td><!--<a href='DelStu.php?vald=".$data['sid']."'>Delete</a>-->
		 <a class='btn btn-primary' data-toggle='confirmation' href='DelStu.php?vald=".$data['sid']."'>Delete</a>
		</td>
      </tr>
      
    </tbody>";
		  }
		  
  }
  ?>
  </table>
    </div>
  <div id='txtHint1'></div>
    </div>
  </div></div>
<br><br>
<br><br><br><br>
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

<script>
function names(search) {
  var xhttp;    
 /* if (cust == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }*/
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
		document.getElementById('first').style.display='none';
      document.getElementById("txtHint").innerHTML = xhttp.responseText;
    }
  };
  var name=document.getElementById("search").value;
  xhttp.open("GET", "stuname.php?name="+name, true);
  xhttp.send();
}

</script>

<script>
function names1(search1) {
  var xhttp;    
 /* if (cust == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }*/
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
		document.getElementById('second').style.display='none';
      document.getElementById("txtHint1").innerHTML = xhttp.responseText;
    }
  };
  var name=document.getElementById("search1").value;
  xhttp.open("GET", "stuname1.php?name="+name, true);
  xhttp.send();
}

</script>  
