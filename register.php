<html lang="en">
<head>
	<link rel="stylesheet" href="stylesheet.css"/>
	<meta charset="UTF-8">
	<title> User Registration </title>
	
	<script>

	// Defining a function to display error message
	function printError(elemId, hintMsg) {
   	  document.getElementById(elemId).innerHTML = hintMsg;
	}

	// Defining a function to validate form 
	function validateForm() {
   	  // Retrieving the values of form elements 
   	  var fname = document.registerForm.FirstName.value;
   	  var lname = document.registerForm.LastName.value;
   	  var add1 = document.registerForm.Address1.value;
   	  var add2 = document.registerForm.Address2.value;
  	  var city = document.registerForm.City.value;
  	  var state = document.registerForm.State.value;
   	  var zip = document.registerForm.Zip.value;
   	  var country = document.registerForm.Country.value;
    
    
	  // Defining error variables with a default value
    		var fnameErr = lnameErr = add1Err =  cityErr = stateErr = zipErr = countryErr = true;
	        var add2Err =false;
    
  	  // Validate first name
   	  if(fname == "") {
      		  printError("fnameErr", "Please enter your First Name");
    	  } else {
      		   var regex = /^[a-zA-Z\s]+$/;                
     	           if(regex.test(fname) === false) {
                  	printError("fnameErr", "Please enter a valid First name");
         	   } else {
           	   printError("fnameErr", "");
          	   fnameErr = false;
         	  }
   	  }

    
   	 // Validate last name
  	  if(lname == "") {
      		  printError("lnameErr", "Please enter your Last Name");
    	  } else {
        	   var regex = /^[a-zA-Z\s]+$/;                
        	   if(regex.test(lname) === false) {
              	 	printError("lnameErr", "Please enter a valid Last name");
                   } else {
            	  	printError("lnameErr", "");
                   	lnameErr = false;
        	  }
          }
    
          // Validate Address1
          if(add1 == "") {
       		 printError("add1Err", "Please enter your Address");
          } else {
       		 printError("add1Err", "");
        	 add1Err = false;
          }
  
	  // Validate city
          if(city == "") {
        	printError("cityErr", "Please enter your City");
          } else {
       		 printError("cityErr", "");
       		 cityErr = false;
          }
	
	  // Validate state
          if(state == "") {
       		 printError("stateErr", "Please enter your State");
          } else {
          	 printError("stateErr", "");
       		 stateErr = false;
          }
   
	  // Validate zip
    	  if(zip == "") {
      		  printError("zipErr", "Please enter your zip code");
   	   } else {
      		  var regex = /^[0-9]{5}(?:-[0-9]{4})?$/;                
        	  if(regex.test(zip) === false) {
            		printError("zipErr", "Please enter a valid zip code");
      		  } else {
          	        printError("zipErr", "");
           		zipErr = false;
        	  }
    	   }
    
   
  	   // Validate country
   	   if(country == "Select") {
        	printError("countryErr", "Please select your country");
   	   } else {
       		 printError("countryErr", "");
        	 countryErr = false;
           }
  	  
    
    	  // Prevent the form from being submitted if there are any errors
    	  if((fnameErr || lnameErr || add1Err || add2Err || cityErr || stateErr || zipErr || countryErr) == true) {
       		return false;
    	  } 
       };

	</script>
	
		
</head>

<body>
    <?php
	require 'db_conn.php';
	require 'serverside_validation.php';
	   if( ($fnameErr && $lnameErr && $add1Err && $cityErr && $stateErr && $zipErr && $countryErr ) === true){

		$duplicate=mysqli_query($conn,"select * from user where FirstName='$fname' and LastName='$lname'");
		if(mysqli_num_rows($duplicate)>0)
		{
			$userMsgErr="User Already Exsists";
		}
		else 
		{
		    $userMsgErr=" ";
			$sql="insert into user (FirstName,LastName,Address1,Address2,City,State,Zip,Country) values ('$fname','$lname','$address1','$address2','$city','$state','$zip','$country')";
		
			if($conn->query($sql) === TRUE) 
			{
                		$_SESSION['AUTHORIZATION']=true;
				header('location:confirmation.php');
				exit();
			}
		
	       		 else 
			{
   				header('location:confirmation.php');
				exit();
			}
		}
	}
	?>
	
	<br>
	<h1 style="text-align: center;font-family: serif;font-style: italic;"> Welcome! Register for exciting perks </h1>
	<form name="registerForm" onsubmit="return validateForm();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		
		<p><div class="error">* Required Fields</div></p>

		 <p>First Name: <span class="error">*</span> <input type="text"  name="FirstName" />
			<div class="error" id="fnameErr"><?php echo $fnameMsgErr; ?></div></p>
		 
		 <p>Last Name:<span class="error">*</span> <input type="text"  name="LastName"/> 
			<div class="error" id="lnameErr"><?php echo $lnameMsgErr; ?></div></p>
		
		 <p>Address1:<span class="error">*</span> <input type="text"  name="Address1" />
			<div class="error" id="add1Err"><?php echo $add1MsgErr; ?></div></p>
		
		<p>Address2: <input type="text"  name="Address2" />
			<div class="error" id="add2Err"></div></p>
		
		<p> City:<span class="error">*</span> <input type="text" name="City" />
			<div class="error" id="cityErr"><?php echo $cityMsgErr; ?></div></p>
		
		<p> State:<span class="error">*</span> <input type="text" name="State" />
			<div class="error" id="stateErr"><?php echo $stateMsgErr; ?></div></p>
		
		<p> Zip:<span class="error">*</span> <input type="text" name="Zip"/>
			<div class="error" id="zipErr"><?php echo $zipMsgErr; ?></div></p>
		
		<p> Country: <span class="error">*</span><select name="Country"> 
				<option>Select</option>
				<option>USA</option>
			     </select>
			<div class="error" id="countryErr"><?php echo $countryMsgErr; ?></div></p>
		

		<div class="row">
		<input type="submit" name="signup" value="Sign Up">
		<div class="error" id="userErr"><?php echo $userMsgErr; ?></div>
		</div>
	
	
	</form>
		
</body>

</html>
