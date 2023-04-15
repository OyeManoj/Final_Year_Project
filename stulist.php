<?php

include('connect.php');
?> 
<html>

  <script src="jquery.validate.min.js"></script>
  <script src="jquery/jquery-1.8.3.min.js"></script>
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


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style1.css">

 <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<form method='post' id='myForm'  novalidate="novalidate">
   <?php
 include('placementmenu.php');
 ?>
<div class="container">
<br>

  <div class="tab-content">
    <div id="view" class="tab-pane fade in active">
	<h2 align='center'>
  <u>Update Marks</u>
  </h2>
  <br> <br>
	 <table align='center'>
 <tr><td>
 <label>Search By Name</label><br>
 <input type='text' class="form-control" ID="search" name="search"><br>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 <input type='button' class='btn' id='searchsub' name='searchsub' value='Search' onClick="names(search)"><br>
 <br><br></td></tr>
 </table>
 
 <?php
 if(!empty($_GET['vall']))
 {
	 $vall=$_GET['vall'];
	 $sel="select * from stureg where sid='$vall'";
	 $res=$con->query($sel);
	 $row=mysqli_fetch_array($res);
	 ?>
 <div id="Marks">
 <table width='90%' border='0'>
 <tr align='center'>
 <td width='10%'>
 </td>
 <td width='20%'>
 <label>SSC%</label>
 </td>
 <td width='20%'>
 <label>HSC%</label>
 </td>
 <td width='20%'>
 <label>Graduation%</label>
 
 </tr>
<tr align='center'>
 <td width='10%'>
 <label class="control-label">Marks</label>
 </td>
 </td>
 <td width='20%'>
 <input type='number' class="form-control" name="ssc" value="<?php echo $row['ssc']?>" style='width:85%' pattern="[0-9.]{}" title="Please Enter Valid Percentage" required>
 </td>
 <td width='20%'>
 <input type='number' class="form-control" name="hsc" value="<?php echo $row['hsc']?>" style='width:85%' pattern="[0-9.]{}" title="Please Enter Valid Percentage" required>
 </td>
  <td width='20%'>
 <input type='number' class="form-control" name="graduation" value="<?php echo $row['graduation']?>" style='width:85%' pattern="[0-9.]{}" title="Please Enter Valid Percentage" required>
 </td>
 
 </tr>
 
 <tr><td colspan='5' align='center'><br/>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type='submit' name='updst' value='Update Marks' class="btn"/><br/><br/>
 </td></tr>
 </table>
 </div>
 <?php } 

if(isset($_POST['updst']))
{
	$sidd=$_GET['vall'];
	$ssc=$_POST['ssc'];
	$hsc=$_POST['hsc'];
	$graduation=$_POST['graduation'];
	$pg=$_POST['pg'];
	$upd="Update stureg set ssc='$ssc',hsc='$hsc',graduation='$graduation',pgraduation='$pg' where sid='$sidd'";
	if(mysqli_query($con,$upd))
 {
	 echo "<script>alert('Updated Successfully')</script>" ;
	echo "<script>location.replace('stulist.php')</script>" ;
 }
 else
 {
	 
 }
}

 ?>
 
 <div id='first'>
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
    <thead bgcolor='#3f3f3f' style='color:white;font-size:14px'>
      <tr >
	   <th>Id</th>
        <th>Firstname</th>
        <th>Middlename</th>
        <th>Lastname</th>
		<th>Department</th>
		<th>SSC%</th>
		<th>HSC%</th>
		<th>Graduation%</th>
	   <th>&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
      </tr>
    </thead>";
	while($data=mysqli_fetch_array($rel))
		  {
			  echo"
    <tbody bgcolor='#f6f6f6' style='font-size:13px'>
      <tr >
        <td>".$data['sid']."</td>
        <td>".$data['fname']."</td>
        <td>".$data['mname']."</td>
		<td>".$data['lname']."</td>
		<td>".$data['department']."</td>
		<td>".$data['ssc']."</td>
		<td>".$data['hsc']."</td>
		<td>&nbsp;&nbsp;&nbsp;".$data['graduation']."</td>
		<td>&nbsp;&nbsp;
		 <a href='stulist.php?vall=".$data['sid']."'>
		 <input type='button' name='upd' value='Update' class='btn' onClick='updStu()'></a>
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
	   //include('footer.php');
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
  xhttp.open("GET", "stunamee.php?name="+name, true);
  xhttp.send();
}

</script>

