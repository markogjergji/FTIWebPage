<?php
$hostname     = "localhost"; 
$username     = "root";     
$password     = "";          
$databasename = "fti_database"; 


$conn = new mysqli($hostname, $username, $password, $databasename);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>

