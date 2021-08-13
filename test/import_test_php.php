<?php

$con=mysqli_connect('localhost','root','','myinvoice');

if(mysqli_connect_errno())
{
	echo 'Failed to connect to database'.mysqli_connect_error();
}

$uploadfile=$_FILES['uploadfile']['tmp_name'];

require 'libraries/phpexcel/PHPExcel.php';
require_once 'libraries/phpexcel/PHPExcel/IOFactory.php';

$objExcel=PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow=$worksheet->getHighestRow();

	for($row=0;$row<=$highestrow;$row++)
	{
		$hsn_name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		$hsn_active=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		$hsn_status=$worksheet->getCellByColumnAndRow(2,$row)->getValue();

		if($hsn_status!='')
		{
			$insertqry="INSERT INTO `hsncode`(`hsn_id`, `hsn_name`, `hsn_active`, `hsn_status`) VALUES (LPAD(FLOOR(RAND()* 999999.99), 6,'0'),'$hsn_name','$hsn_active', '$hsn_status')";
			$insertres=mysqli_query($con,$insertqry);
		}
	}
}
header('Location: import_test_html.php');
?>