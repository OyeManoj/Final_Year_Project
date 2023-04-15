<?php
session_start();
include('connect.php');


?>  
<html>

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
 <form method='post' enctype="multipart/form-data">
 <br><br> <br><br> <br><br>
 <div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
     
    </div>
    <div class="col-sm-8 text-left">
    
 <table border='1' class="container-visitor bg-grey text-center" height='400px' width='100%'>
  <tr>
  <td><div class="form-group">
  <h2 align='center'>&nbsp
  <u>Exam Details</u>
  </h2>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='40%'>
  <tr>
  <td width='20%'>  
  <select type='text' class="form-control" id="sel1" name='sel1' width='20px' required>
    <option value=''>Select Course</option>
    <option value='BBA General'>BBA General</option>
    <option value='BBA Information Science'>BBA Information Science</option>
 <option value='BBA Business Analytics'>BBA Business Analytics</option> 
  <option value='BBA Financial Markets'>BBA Financial Markets</option>
 <option value='BBA Entreprenureship'>BBA Entreprenureship</option>
  </select>
  <br>
  </td>
  </tr>
  
  <tr>
  <td width='20%'>  
  <select type='text' class="form-control" id="sel2" name='sel2' width='20px' required>
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
  <br>
  </td>
  </tr>
 <tr align='left'>
 <td width='70%'>
		<label class="control-label" align='left'>Timetable Image</label>
		<input type="file" name="image" required><br><br>
</td>
	</tr>
  
  <tr>
  <td width='20%'>  
  <input type='submit' class="btn btn-primary" id="sub" name='sub' value='submit'>
  </td>
  </tr>
  
  </table>
  
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
  if(isset($_POST['sub']))
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
                             echo 'uploaded';
                     }
                    } 
					  }			
                else
					{
                     echo 'please upload';
                    }
  $image=$iname;				
  $stream=$_POST['sel1'];
  $sem=$_POST['sel2'];
 
  $sql="Insert into timetable(stream,sem,image) values ('$stream','$sem','$image')";

  if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Timetable uploaded succesfully');</script>";
		   echo "<script>location.replace('timetable.php')</script>" ;
 
	  }
	  else
	  {
		  echo"<script>alert('Please Try Again')</script>";
	  }	
  }	  
   ?>
  </form>