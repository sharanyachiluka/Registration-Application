<html>
	<head>
	<title>Confirmation</title>
	<link rel="stylesheet" href="stylesheet.css"/>
	</head>

	<body>
	<form>

	<?php
	   session_start();

           if($_SESSION['AUTHORIZATION'] == true) {
		echo "<h2> Congratulations on successful registration....<br>Your perks will be sent to address mentioned</h2>";
	   }
	   else {
		echo "<h2>Unsuccessful Attempt. Please try again</h2>";
	   }
	?>

	</form>
	</body>
</html>