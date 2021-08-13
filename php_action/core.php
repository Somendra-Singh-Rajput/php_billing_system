<?php 

session_start();

require_once 'db_connect.php';

//echo "<pre>"; print_r($_SESSION); die('Somendra');

if(!$_SESSION['username']) {
	header('location:'.$store_url);	
} 
?>