<?php 	

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "myinvoice";
$store_url = "http://localhost/projects/artlife/";
// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>