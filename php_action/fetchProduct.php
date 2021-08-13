<?php 	

require_once 'core.php';

$sql = "SELECT product.product_id, product.product_name, product.hsn_id,
 		product.categories_id, product.quantity, product.rate,product.wrate, product.active, product.status,product.createDate, 
 		hsncode.hsn_name, categories.categories_name FROM product 
		INNER JOIN hsncode ON product.hsn_id = hsncode.hsn_id 
		INNER JOIN categories ON product.categories_id = categories.categories_id  
		WHERE product.status = 1 AND product.quantity>0";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$productId = $row[0];
 	// active 
 	if($row[7] == 1) {
 		// activate member
 		$active = "<label class='label label-success'>Available</label>";
 	} else {
 		// deactivate member
 		$active = "<label class='label label-danger'>Not Available</label>";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

	$brand = $row[10];
	$category = $row[11];

 	$output['data'][] = array( 		
 
 		// product Id
 		$row[0],
		// product name		
 		$row[1], 		 	
 		// brand
 		$brand,
 		// category 		
 		$category,
		// rate
 		$row[4],
		// wrate
 		$row[5],
 		// quantity 
 		$row[6], 
 		// active
 		$active,
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);