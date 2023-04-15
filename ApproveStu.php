<html>
<body>
<?php
 include("connect.php");
 $sid=$_GET['vald'];
 $sql="update stureg set status='Approved' where sid='$sid'";

 if(mysqli_query($con,$sql))
 {
	 echo "<script>alert('Approved Successfully')</script>" ;
	echo "<script>location.replace('student.php')</script>" ;
 }
 else
 {
	 
 }
 ?>
 </body>
 </html>