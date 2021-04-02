<?php 
	include_once 'db_conn.php';
	$result = mysqli_query($conn,"SELECT * FROM user ORDER BY Date DESC");
?>
<!DOCTYPE html>
<html>
 	<head>
 	<title>Admin Report</title>
	<link rel="stylesheet" href="stylesheet1.css"/>
	 </head>

	<body>
	<?php
	if (mysqli_num_rows($result) > 0) {
	?>
	<h2>Admin Report</h2>
	<table border="2">
  	
  	<tr>
   	<th>First Name</th>
   	<th>Last Name</th>
    	<th>Address1</th>
    	<th>Address2</th>
	<th>City</th>
	<th>State</th>
	<th>ZipCode</th>
	<th>Country</th>
	<th>Date</th>
  	</tr>

	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>

	<tr>
   	 <td><?php echo $row["FirstName"]; ?></td>
    	 <td><?php echo $row["LastName"]; ?></td>
   	 <td><?php echo $row["Address1"]; ?></td>
   	 <td><?php echo $row["Address2"]; ?></td>
	 <td><?php echo $row["City"]; ?></td>
	 <td><?php echo $row["State"]; ?></td>
	 <td><?php echo $row["Zip"]; ?></td>
	 <td><?php echo $row["Country"]; ?></td>
	 <td><?php echo $row["Date"]; ?></td>
	</tr>

	<?php
	$i++;
	}
	?>

	</table>
	</div>
	 <?php
	}
	else{
   		 echo "No result found";
	}
	?>
 	</body>
</html>



