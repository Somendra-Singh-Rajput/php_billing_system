<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$edituserName = $_POST['edituserName'];
	$editEmail 	  = $_POST['editEmail'];
	$editPassword = md5($_POST['editPassword']);
	$userid 	  = $_POST['userid'];
				
	$sql = "UPDATE users SET username = '$edituserName', email = '$editEmail', password = '$editPassword' WHERE user_id = $userid ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);

?>
 
