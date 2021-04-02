 <?php

	$fnameErr=$lnameErr=$add1Err=$cityErr=$stateErr=$zipErr=$countryErr=false;
	$fnameMsgErr=$lnameMsgErr=$add1MsgErr=$cityMsgErr=$stateMsgErr=$zipMsgErr=$countryMsgErr="";		

	if(isset($_POST['signup']))
	{
		
		$fname=test_input($_POST['FirstName']);
		$lname=test_input($_POST['LastName']);
		$address1=test_input($_POST['Address1']);
		$address2=test_input($_POST['Address2']);
		$city=test_input($_POST['City']);
		$state=test_input($_POST['State']);
		$zip=test_input($_POST['Zip']);
		$country=test_input($_POST['Country']);

		if(empty($fname)) {
			$fnameMsgErr="Please enter your First Name";
			$fnameErr=false;
		}
		else {
			$fnameErr=true;
		}

		if(empty($lname)) {
			$lnameMsgErr="Please enter your Last Name";
			$lnameErr=false;
		}
		else {
			$lnameErr=true;
		}

		if(empty($address1)) {
			$add1MsgErr="Please enter your Address";
			$add1Err=false;
		}
		else {
			$add1Err=true;
		}


		if(empty($city)) {
			$cityMsgErr="Please enter your City";
			$cityErr=false;
		}
		else {
			$cityErr=true;
		}

		if(empty($state)) {
			$stateMsgErr="Please enter your State";
			$stateErr=false;
		}
		else {
			$stateErr=true;
		}

		if(empty($zip)) {
			$zipMsgErr="Please enter your Zip Code";
			$zipErr=false;
		}
		elseif(!preg_match("/^[0-9]{5}(-[0-9]{4})?$/" ,$zip)){
			$zipMsgErr="Please enter valid Zip Code";
			$zipErr=false;
		}
		else {
			$zipErr=true;
		}

		if($country=='Select') {
			$countryMsgErr="Please select your Country";
			$countryErr=false;
		}
		else {
			$countryErr=true;
		}
	}

	function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
       	}
?>