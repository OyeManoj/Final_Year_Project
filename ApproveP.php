<html>
<body>
<?php
 include("connect.php");
 $pid=$_GET['vald'];
 $sql="update posts set status='Approved' where pid='$pid'";

 if(mysqli_query($con,$sql))
 {
	 echo "<script>alert('Approved Successfully')</script>" ;
	echo "<script>location.replace('ApprovePost.php')</script>" ;
 }
 else
 {
	 
 }
 ?>
 </body>
 </html>