<?php

              include('placementMenu.php');

       include('connect.php');

        // after admin login page accessible
           if(!isset($_POST['subm']))
        {
	
	?>
            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="style1.css">
  
            <script src="//code.jquery.com/jquery-1.9.1.js"></script>
            <script src="jquery.validate.min.js"></script>
            <link rel="shortcut icon" type="image/jpg" href="http://phptest.hostoise.com/images/fav.jpg" />
			
			
            <script>
  
               // When the browser is ready...
                $(function() {
  
              // Setup form validation on the #register-form element
                 $("#myForm").validate({
    
               // Specify the validation rules
                rules: {
				sel1: "required",
				des: "required",
				crit: 
				{
					required:true,
				minlength:2,
				maxlength:2,
				number: true	
				},
				dept: "required",
			    },
		
        
              // Specify the validation error messages
              messages: {
                          sel1:"<h5><label style='color:red'>Please enter Company!<label></h5>",
                          des:"<h5><label style='color:red'>Please enter Designation!<label></h5>",
			              crit:"<h5><label style='color:red'>Please enter valid Criteria!<label></h5>",
			              dept:"<h5><label style='color:red'>Please enter Department!<label></h5>",
                        },
        
                submitHandler: function(form) {
                form.submit();
                   }
                  });

                });
  
            </script>
  
  
            <script>
			//function for dropdown of designation on company selection
            function first()
        {
	            var xhttp;    
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
               if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {
                   document.getElementById("txtHint").innerHTML = xhttp.responseText;
                }
                };
               var id=document.getElementById("sel1").value;

              xhttp.open("GET", "criteria.php?comp="+id, true);
              xhttp.send();
        }

		//function for Displaying eligibility details on selection of designation
            function second()
        {
	           var xhttp;    
               xhttp = new XMLHttpRequest();
               xhttp.onreadystatechange = function() {
               if (xhttp.readyState == 4 && xhttp.status == 200) {
                 document.getElementById("txtHint2").innerHTML = xhttp.responseText;
            }
        };
  
              var jobid=document.getElementById("des").value;
              xhttp.open("GET", "criteria1.php?jobid="+jobid, true);
              xhttp.send();
        }
 
        // function for sending email to all eligible candidate
             function sendEmail()
        {
	            var xhttp;    
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) 
				    {
                     document.getElementById("txtHint1").innerHTML = xhttp.responseText;
                    }
                    };
                  var comp=document.getElementById("sel1").value;
                  var dept=document.getElementById("dept").value;
                  var crit=document.getElementById("crit").value;
                  var jobid=document.getElementById("des").value;
                  xhttp.open("GET", "eligibilityEmail.php?comp="+comp+"&dept="+dept+"&crit="+crit+"&jid="+jobid, true);
                  xhttp.send();
        }
            </script>
 
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <form runat="server" method='post' id='myForm'  novalidate="novalidate">
           
			
            <div class="container">
                         <br><br><br><br>
                <center>
                    <table border='1' class="container-visitor bg-grey text-center" height='400px' width='70%'>
                    <tr>
                       <td>
					   <div class="form-group">
                            <h4><u>CREATE LIST</u></h4>
                             <p align='center' style='font-size:13px'>
							 Create and download List of candidates
                 </p>
				  
		                <table border='0' class="container-visitor bg-grey text-center" align='center' width='40%'>
                            <tr align='left'>
                               <td><label>Department</label>
							   <br>	
			                    <select name='dept' class='form-control'>
									<option>--Select--</option>
									   <option value='BBA General'>BBA General</option>
                      <option value='BBA Information Science'>BBA Information Science</option>
                      <option value='BBA Business Analytics'>BBA Business Analytics</option> 
                      <option value='BBA Financial Markets'>BBA Financial Markets</option>
                      <option value='BBA Entreprenureship'>BBA Entreprenureship</option>
								</select> <br/>
					</td></tr>
					
					<tr align='left'>
                               <td><label>Criteria</label>
							   <br>	
			                    <input type='text' name='crit' class='form-control'/><br/>
					</td></tr>
					
						    <tr>
							<td>
							    <input type='submit'  class='btn btn-primary' name='subm' value='Create List' />
						      
						    </td>
						    </tr>
						
						</table>
						</td>
						</tr>
					</table>
                    </div>
                </div>
            </div><?php
}
// Connection 
//for creating list of all eligible candaidates for particular company
        if(isset($_POST['subm']))
    {			
			$dept=$_POST['dept'];			
			$crit=$_POST['crit'];

			$filename = $dept.".xls"; // File Name
			// Download file
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			$sql1="select fname,mname,lname,email,mob,address,dep,ssc,hsc,graduation,pgraduation,hbacklog,cbacklog from stureg where ssc >= '$crit' and hsc >= '$crit' and  graduation >= '$crit' and dep='$dept'";
			$result = $con->query($sql1);
           // Write data to file
			$flag = false;
			while ($row1 = $result->fetch_assoc()) 
			{
			if (!$flag) 
			{
             // display field/column names as first row
              echo implode("\t", array_keys($row1)) . "\r\n";
                $flag = true;
			}
             echo implode("\t", array_values($row1)) . "\r\n";
            }
    }
if(!isset($_POST['subm']))
{
	echo "<br><br><br><br><br>
</form>
</body>";
  include('footer.php');
	  
}
 
?>
