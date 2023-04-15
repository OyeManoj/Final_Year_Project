
 <?php
 include('connect.php');
   $name=$_GET['name'];
  $srch="select * from faculty where fname like '%$name%'";
  $rel1=$con->query($srch);
  if(mysqli_num_rows($rel1)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  
	  echo"
	  <table class='table table-hover'>
    <thead bgcolor='#424146'>
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
      </tr>
    </thead>";
	while($data1=mysqli_fetch_array($rel1))
		  {
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr>
        <td>".$data1['fid']."</td>
        <td>".$data1['fname']."</td>
        <td>".$data1['mname']."</td>
		<td>".$data1['lname']."</td>
		<td>".$data1['dep']."</td>
		<td>".$data1['des']."</td>
		<td>".$data1['email']."</td>
		<td>".$data1['mob']."</td>
		<td><a class='btn btn-primary' href='AddFac.php?vale=".$data1['fid']."'>Edit</a></td>
      </tr>
      
    </tbody>";
		  }
  }
 
  ?>
  </table>