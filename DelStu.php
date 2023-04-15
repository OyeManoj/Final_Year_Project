<html>
<body>
<?php
 include("connect.php");
 $sid=$_GET['vald'];
 $sql="Delete from stureg where sid='$sid'";

 if(mysqli_query($con,$sql))
 {
	 echo "<script>alert('Deleted Successfully')</script>" ;
	echo "<script>location.replace('student.php')</script>" ;
 }
 else
 {
	 
 }
 ?>
 </body>
 </html>