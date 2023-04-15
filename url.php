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
  <u>Post Papers</u>
  </h2>
  </td>
  </tr>
  
  <tr>
  <td>
  <br><br>
  <label class='text-left'>Post URL</label><br>
  <input type="text" class='form-control' name='url' required><br>
  <center><input type='submit' class="btn pull-center" value="Post" name='post' OnClick="Button1_Click" /></center>
  </td>
  </tr>
  </table>
  </td>
  
  </tr>
  </table>
  <?php
  if(isset($_POST['post']))
  {
	 include('connect.php');
  $fid=$_SESSION['fid'];
  $url=$_POST['url'];
  
  $sql="Insert into papers values ('$fid','$url')";
								if(mysqli_query($con,$sql))
								{
								  echo "<script>alert('Your Post is send for approval!');</script>";
								} 
  }
  
  ?>