<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css">
  
  <script src="jquery.validate.min.js"></script>
<body>
<?php
  include("connect.php");
   //$name=$_GET['name'];
  $sel="select * from faculty where fname like '%c%'";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  echo"
	  <table class='table table-hover'>
    <thead bgcolor='#C9A6D8'>
      <tr>
	   <th>FacultyId</th>
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
</body>
<script src="../bower_components/jquery/dist/jquery.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="bootstrap-confirmation.js"></script>
   </body>
 <script>
  console.log('Bootstrap ' + $.fn.tooltip.Constructor.VERSION);
  console.log('Bootstrap Confirmation ' + $.fn.confirmation.Constructor.VERSION);

  $('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    container: 'body'
  });
 
  
</script>
 <script id='runscript'>
  console.log('Bootstrap ' + $.fn.tooltip.Constructor.VERSION);
  console.log('Bootstrap Confirmation ' + $.fn.confirmation.Constructor.VERSION);

  $('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    container: 'body'
  });
 
  
</script>