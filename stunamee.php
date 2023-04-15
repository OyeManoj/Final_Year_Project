
 <?php
 include('connect.php');
   $name=$_GET['name'];
  $srch="select * from stureg where fname like '%$name%'";
  $rel1=$con->query($srch);
  if(mysqli_num_rows($rel1)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  
	  echo " <table class='table table-hover'>
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
		<th>PG%</th>
	   <th>&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
      </tr>
    </thead>";
	while($data=mysqli_fetch_array($rel1))
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
		<td>".$data['pgraduation']."</td>
		<td>&nbsp;&nbsp;<!--<a href='DelStu.php?vald=".$data['sid']."'>Update</a>-->
		 <a href='stulist.php?vall=".$data['sid']."'>
		 <input type='button' name='upd' value='Update' class='btn btn-primary' onClick='updStu()'></a>
		</td>
		
      </tr>
      
    </tbody>";
		  }
  }
 
  ?>
  </table>