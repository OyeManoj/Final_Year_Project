<?php
session_start();
include('connect.php');
$fid = $_GET['vald'];
	  
      $delete = "delete from faculty where fid='$fid'";
      
      if(mysqli_query($con, $delete))
      {		
		echo "<script>alert('Faculty deleted successfully');</script>";
		echo "<script>window.location.href='AddFac.php'</script>";		   
      } 
      else
      {
        echo "<script>alert('Error while deleting');</script>";
      }





















 
?> 