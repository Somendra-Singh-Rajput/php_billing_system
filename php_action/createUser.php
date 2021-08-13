<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$userName 		= $_POST['userName'];
	$upassword 		= md5($_POST['upassword']);
	$uemail 		= $_POST['uemail'];
	
				/*$pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
				
				if(preg_match($pattern, $upassword)){
				echo "Password strength is OK";
				} else {
				echo "Password is not strong enough";
				}	*/			
								
				$sql = "INSERT INTO users (username, password,email) VALUES ('$userName', '$upassword' , '$uemail')";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}
				// /else			
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 ?>
