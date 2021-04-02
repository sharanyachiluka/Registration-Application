<?php
   session_start();
   $dbservername = "localhost";
   $dbusername = "root";
   $dbpassword = "bitnami";
   $dbname="my_db";
   // Create connection
   $conn = mysqli_connect($dbservername, $dbusername, $dbpassword,$dbname);
   // Check connection
   if (!$conn) {
    echo "Unsuccessful Connection";
    die("Connection failed: " . mysqli_connect_error());
   }
?>