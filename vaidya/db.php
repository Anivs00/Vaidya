<?php



$host = "localhost"; // Replace with your MySQL server hostname
$user = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "vaidya"; // Replace with your MySQL database name


$db = mysqli_connect($host, $user, $password, $database);

if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
  
}


?>