<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

  $productName 	 = $_POST['productName'];
  $quantity 	 = $_POST['quantity'];
  $rate 		 = $_POST['rate'];
  $wrate 		 = $_POST['wrate'];
  $brandName 	 = $_POST['brandName'];
  $categoryName  = $_POST['categoryName'];
  $productStatus = $_POST['productStatus'];

				$sql = "INSERT INTO product (product_name, hsn_id, categories_id, quantity, rate, wrate, active, status) 
				VALUES ('$productName', '$brandName', '$categoryName', '$quantity', '$rate', '$wrate', '$productStatus', 1)";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}
	
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);

?>