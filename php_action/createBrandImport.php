<?php

require 'core.php';

$uploadfile=$_FILES['uploadfile']['tmp_name'];

require '../libraries/phpexcel/PHPExcel.php';
require_once '../libraries/phpexcel/PHPExcel/IOFactory.php';

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
			$insertqry="INSERT INTO `hsncode`(`hsn_name`, `hsn_active`, `hsn_status`) VALUES ('$hsn_name','$hsn_active', '$hsn_status')";
			$insertres=mysqli_query($connect,$insertqry);
			
			$message = '<label class="text-success">HSN Code excel file imported successfully.</label>';
		}else
		{
			$message = '<label class="text-danger">An error occurred.</label>';
		}
	}
}
header('Location: ./importbrand.php');
?>