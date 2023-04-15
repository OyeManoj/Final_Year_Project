<?php

include('placementMenu.php');
include('connect.php');

?>

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}

.image-upload > input
{
    display: none;
}

.image-upload img
{
    width: 80px;
    cursor: pointer;
}
</style>

<br/><br/><br/><br/>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <form runat="server" method='post' id='myForm' enctype="multipart/form-data" novalidate="novalidate">
<center>
<div class="container">
                         <br>
                <center>
									
                    <table border='1' class="container-visitor bg-grey text-center"  width='100%'>
                    <tr>
                       <td>
					   <div class="form-group">
                            <h4><u>ADD POST</u></h4>
                             <p align='center' style='font-size:13px'>
							 Your Posts will be send for approval!
                 </p>
				  
		                <table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>
                            <tr align='left'>
                               <td>
							   <input type="text" name="post" class='form-control' placeholder="Post here...."/>
							   <div class="image-upload">
								   <br>
								 <label for="file-input"><label style="font-size:12px">Photo</label><br>
									 <img src="images/camera.png" name='image' style="width:40px">
								  </label>
								  <input id="file-input" name="image" type="file">
								   </div>
							   </td></tr>
							  <tr align='left'><td>&nbsp;&nbsp; <input type='submit'  class='btn btn-primary' name='subm' value='POST' />
							   </td></tr>
							 </table>
							 
							 <br/><br/><br/>
							 <?php

									$sql="select * from posts where status='Approved' order by date desc,time desc ";
									$result = $con->query($sql);
							   
								while ($row = $result->fetch_assoc()) 
								{
									?>
						<table border='0' class="container-visitor bg-grey text-center" align='center' width='80%'>

                            <tr align='left'>
                               <td colspan='2'>	<hr style="border: 1px solid #e6e6e6">
									
									
									<p style='font-size:14px'><?php echo $row['uname']; ?></p>
								</td>
							</tr>

						<tr><td rowspan='2' width='20%'>
							<img src='images/<?php echo $row['Dp']; ?>' width='50px' height='50px'/>
						</td>
						
						<td width='80%'>
						<table><tr><td>
						<p style='font-size:14px'><?php echo $row['date']; ?> / <?php echo $row['time']; ?></p>
						</td></tr>
						
						<tr><td>
						<p style='font-size:14px'><?php echo $row['text']; ?></p>
						<?php
						$img=$row['picture'];
						if($img!='')
						{
							echo "<img src='images/".$row['picture']."'  width='100px' height='100px'>";
						}
						?>
						
						</td></tr>
						</table>
						
						</td>
						</tr>	
					
						</table>
						<?php
								}
								
								
								if(isset($_POST['subm']))
								{
											$file=$_FILES['image']['tmp_name'];
											 $iname=$_FILES['image']['name'];
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

									
									/*$sql="select pid from posts order by pid desc";
									$result = $con->query($sql);
							   
								if ($row = $result->fetch_assoc()) 
								{
									$pidd=$row['pid'];
									$pid=$pidd+1;
								}
								else
								{
									$pid="101";
								}*/
								$imgg=$_SESSION['fimage'];
									$fid=$_SESSION['fid'];
									$post=$_POST['post'];
									$fname=$_SESSION['fname'];
									$date=date("Y/m/d");
									$time=date("h:i:sa");
									
									$sql="Insert into posts(text,picture,date,time,uid,uname,Dp,status) values ('$post','$iname','$date','$time','$fid','$fname','$imgg','N')";
									
								if(mysqli_query($con,$sql))
								{
								  echo "<script>alert('Your Post is send for approval!');</script>";
								}
								}
								?>

</td></tr>
</table>

</center>
</form></body>