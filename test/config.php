<?php
$siteurl = "http://localhost/training/quizz";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "quiz";

$order = "";
$cart = array();
$total = 0;

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>