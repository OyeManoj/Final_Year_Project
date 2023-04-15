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
 include('prinMenu.php');
 ?>
	
 <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<form method='post' id='myForm'  novalidate="novalidate">
   
<div class="container" style='width:100%'>
<br><br><br><br>
 

  <div class="tab-content" style='width:100%'>
    <div id="view" class="tab-pane fade in active" style='width:100%'>
	<h4 >Approve Post</h4>
	<p style='font-size:13px'>The principal can approve the posts from here!</p><br>
	
 

 
 <div id='first' style='width:100%'>
<table class="table table-hover" width='100%'>
<?php
  include("connect.php");
  $sel="select * from posts where status='' or status='N'";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  //$time=substr($data['time'], 0, -7);
	  echo"
    <thead bgcolor='#424146' style='color:white'>
      <tr>
	   <th>Post Id</th>
        <th>Name</th>
       
		<th>Post</th>
		<th>Date</th>
		<th>Time</th>
       <th>Action</th>
	   
      </tr>
    </thead>";
	while($data=mysqli_fetch_array($rel))
		  {
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr>
        <td>".$data['pid']."</td>
        <td>".$data['uname']."</td>
      
		<td>".$data['text']."</td>
		<td>".$data['date']."</td>
		<td>".$data['time']."</td>
		<td><!--<a href='DelStu.php?vald=".$data['pid']."'>Delete</a>-->
		 <a class='btn btn-primary' data-toggle='confirmation' href='ApproveP.php?vald=".$data['pid']."'>Approve</a>
		</td>
		
      </tr>
      
    </tbody>";
		  }
  }
  ?>
  </table>
  </div>
  </div></div></div>
  <br><br>
<br><br><br><br><br><br><br><br>
  <?php
	   include('footer.php');
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

