<?php
$servername = "istavrit.eng.ku.edu.tr:3306";
$username = "group9";
$password = "group9comp306";

$conn = new mysqli($servername, $username, $password,"group9");

if ($conn->connect_error)
  {
  die("Connection failed:" . $conn->connect_error);
  }
?>