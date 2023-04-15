<?php
include('placementMenu.php');
$fid=$_SESSION['fid'];


?>

<html lang="en">
<head>
  
  <title>Intra-Student Faculty Communication System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css"> 

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<form method='post'><br><br><br><br><br><br>
<table align='center' border='1' class="container-visitor bg-grey text-center" height='400px' width='50%'>
<tr><td>
<table align='center' >
  <tr>
  <td>
  <h2 align='center'>
  <u>Post Event</u>
  </h2>
  </td>
  </tr>
  
  <tr>
  <td>
  <br><br>
  <label class='text-left'>Content For Event</label><br>
  <textarea class='form-control' name='content' style="width:360px;height:100px" required></textarea><br>
  <center><input type='submit' class="btn pull-center" value="Post" name='sms' OnClick="Button1_Click" /></center>
  </td>
  </tr>
  </table>
  </td>
  
  </tr>
  </table>
  <?php
  include('connect.php');
if(isset($_POST['sms']))
{
	$event=$_POST['content'];
	 date_default_timezone_set('Asia/Kolkata');
              $myDate = date('Y-m-d');
              $time = date('H:i:s');
	$sql="Insert into event(fid,content,date,time) values ('','$fid','$event','$myDate','$time')";
						if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Posted Event Successfully');</script>";

     }
	 $mob=$_SESSION['fcont'];
	 $_my_clicksend_username = "poonam.yadav677";
							  $_my_clicksend_key = "DE9138B8-8FDD-5AD7-BB86-8ADBD4511CC3";
							  //You *MUST* define the 'to', 'message' and 'senderid'
							  $to        = $mob;
							  $message   = $event;
							  $senderid  = "XYZ";

							  $vars="method=http&username=$_my_clicksend_username&key=$_my_clicksend_key&to=+91" . $to ."&message=" . $message . "&senderid=" . $senderid;

								$ch = curl_init();
								curl_setopt($ch, CURLOPT_URL,"https://api.clicksend.com/http/v2/send.php?");
								curl_setopt($ch, CURLOPT_POST, 1);
								curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

								$headers = array();
								$headers[] = 'X-Api-Key: 36a22e282683360229af1bec628e83a8';
								$headers[] = 'X-Auth-Token: ac334741753dab383a59cc0c239e9a45';

								curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
								$server_output = curl_exec ($ch);

}
?>
<br><br>
</form>
</body>
</html>
<?php
//include('footer.php');
?>