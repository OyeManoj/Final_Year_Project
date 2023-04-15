<?php

include('placementMenu.php');
include('connect.php');

?>
<br/><br/><br/><br/>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <form runat="server" method='post' id='myForm'  novalidate="novalidate">
<center>
<div class="container">
                         <br>
                <center>
									
                    <table border='1' class="container-visitor bg-grey text-center"  width='100%'>
                    <tr>
                       <td>
					   <div class="form-group">
                            <h4><u>Send Notification</u></h4>
                             <p align='center' style='font-size:13px'>
							 You can send notifications regarding placements!
                 </p>
				  <br><br>
		                <table border='0' class="container-visitor bg-grey text-center" align='center' width='60%'>
                            <tr align='left'>
                               <td>
							   <label>Notification Message</label>
							   <textarea rows="7" cols="40" name='msg' class='form-control' placeholder="Post Message here...."></textarea>						   
							   </td></tr>
							   
							    <tr><td><br><input type='submit'  class='btn btn-primary' name='subm' value='SEND'/>
							   </td>
							   </tr>
</table>

<?php
if(isset($_POST['subm']))
{
include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
$msg=$_POST['msg'];
$date=date('Y-m-d');
$time=date("h:i:sa");
$sql="insert into notification(msg,date,time) values('$msg','$date','$time')";
	
						if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Notification submitted succesfully');</script>";
		 
	  }
	  else
	  {
		  echo"<script>alert('Please try again')</script>";
	  }	
}
?>
</center>
</form></body>