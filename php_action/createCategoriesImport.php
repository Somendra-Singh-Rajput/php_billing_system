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
		$categories_name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		$categories_active=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		$categories_status=$worksheet->getCellByColumnAndRow(2,$row)->getValue();

		if($categories_status!='')
		{
			$insertqry="INSERT INTO `categories`(`categories_name`, `categories_active`, `categories_status`) VALUES ('$categories_name','$categories_active', '$categories_status')";
			$insertres=mysqli_query($connect,$insertqry);
			
			$message = '<label class="text-success">Categories excel file imported successfully.</label>';
		}
		else
		{
			$message = '<label class="text-danger">An error occurred.</label>';
		}
	}
}
header('Location: ../importbrand.php');
?>