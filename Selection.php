<?php
      include('connect.php');

      
		// after admin login page accessible
?>      
         <html>
           <title>Intra-Student Faculty Communication System</title>
         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="style1.css">
         <link rel="shortcut icon" type="image/jpg" href="http://phptest.hostoise.com/images/fav.jpg" />
		 
		 <!--Function for designation dropdown on company name selection-->
        <script>
           function first(sel1)
		{
            var xhttp;    
 
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (xhttp.readyState == 4 && xhttp.status == 200) {
             document.getElementById("txtHint").innerHTML = xhttp.responseText;
        }
        };
            var id=document.getElementById("sel1").value;
            xhttp.open("GET", "jobsList1.php?q="+id, true);
            xhttp.send();
        }

        </script>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="jquery.validate.min.js"></script>

        <script>
  
         // When the browser is ready...
          $(function() {
  
         // Setup form validation on the #register-form element
            $("#myForm").validate({
    
         // Specify the validation rules
              rules: {
 
                     sel1: "required",

                 job:{
                      required:true,
                   },  
	         selstu: {
                required: true,
                number: true
                },
               },
  
        
        // Specify the validation error messages
                messages: {
            
                               sel1:"<h5 style='color:red'>Please select Company</h5>",
                               job:"<h5 style='color:red'>Please select Designation</h5>",
                          selstu:"<h5 style='color:red'>Please enter number of student selected</h5>",

                         },
        
            submitHandler: function(form) {
            form.submit();
               }
            });

            });
  
        </script>
  
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" style="margin:0px">
        <form method='post' id='myForm'  novalidate="novalidate">
        <?php
           include('placementMenu.php');
        ?>
		
		<!-- admin post the no.of selected candidate for particular company with this-->
		
            <div class="container">
                    <br><br><br><br><br><br/><br/>
                <center>
                <table border='1' class="container-visitor bg-grey text-center" height='300px' width='60%'>
                    <tr>
                    <td>
					  <div class="form-group">
                        <h4 align='center'>
                        <u>Post Selected Student Details</u>
                        </h4>
                        <p align='center' style='font-size:13px'>Post candidates id selected for job offer for respective company.</p><br>
                  
				        <table border='0' class="container-visitor bg-grey text-center" align='center' width='40%'>
                            <tr align='left'>
                            <td>
	
                                        <label for='fname'>Company Name</label><br/>
			                           <input type='text' name='sel1' id='sel1' class='form-control' placeholder='Company Name'>
						                  
						    </td>
						    </tr>
								        <tr align='left'>
										<td><br>
										   <label for='fname'>Designation</label><br/>
			                           <input type='text' name='job' id='job' class='form-control' placeholder='Designation'>
						                </td>
										</tr>
										
										<tr align='left'>
										<td><br>
										<label for='stuno'>Selected Students</label><br/>
					  <input type='text' class='form-control' ID='TextBox1' name='selstu' style='width:100%' placeholder='Enter Number'>
					  </td></tr>
					  
						                <tr>
						                <td><br/>
						                    <input type='submit' name='subm' class='btn btn-primary' value='Post' />
										</td>
						                </tr>
						
				
						</table>
                   
             
			        </td>
			        </tr>
			    </table>
			    </center>
	
	                     </div>
	</div>
	</div>
	<?php
	// On submit click the selection details insert int database
	if(isset($_POST['subm']))
			{
				$jid=$_POST['sel1'];
				$designation=$_POST['job'];
				$stuno=$_POST['selstu'];
				$date= date('Y-m-d');
				
				$upd="insert into selection values('$jid','$designation','$stuno','$date')";
				if(mysqli_query($con,$upd))
				{
					echo "<script>alert('Selected Student details Posted succesfully')</script>";
					echo "<script>window.location.href='Selection.php';</script>";
				}
				else
				{
					echo "<script>alert('Please Try again')</script>";
				}
			}
			
			?>
			<br><br>
	    </form>
	</body>
	</html>

   <br><br><br><br><br><br>
   <?php
   	   include('footer.php');
	   ?>