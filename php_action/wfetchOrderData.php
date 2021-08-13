<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$valid = array('order' => array(), 'order_item' => array());

$sql = "SELECT worders.order_id, worders.order_date, worders.client_name, worders.client_contact, worders.sub_total, worders.vat, worders.total_amount, 
worders.discount, worders.grand_total, worders.paid, worders.due, worders.payment_type, worders.payment_status FROM worders WHERE worders.order_id = {$orderId}";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['order'] = $data;


$connect->close();

echo json_encode($valid);

?>