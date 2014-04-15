<?php
/*

Written by Sweta Sadhya 2014
Upload PriTrans Table
*/
ini_set('max_execution_time', 3000); //300 seconds = 5 minutes
//--------------------------------bsic configration---------------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/promo/WebPromotool/Admin/Library/init.inc.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Promo Tool</title>

</head>
<body>
<?php

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../ExcelClasses/');

/** PHPExcel_IOFactory */
include './Library/ExcelClasses/PHPExcel/IOFactory.php';

/** Customer Class */
include 'Customer.php';

$inputFileName = './Library/ExcelData/priTrans.xlsm';

//----------------------------variable declartion--------------------------------------------

$tbl=new Model;

$A = 'A';
$B = 'B';
$C = 'C';
$D = 'D';
$E = 'E';
$F = 'F';

$cust = array();
$cust_count = "";

/**  Load $inputFileName to a PHPExcel Object  **/
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

/**  Use the PHPExcel object's getSheetCount() method to get a count of the number of WorkSheets in the WorkBook  */
$sheetCount = $objPHPExcel->getSheetCount();

/**  Use the PHPExcel object's getSheetNames() method to get an array listing the names/titles of the WorkSheets in the WorkBook  */
$sheetNames = $objPHPExcel->getSheetNames();

foreach($sheetNames as $sheetIndex => $sheetName) {

$objPHPExcel->setActiveSheetIndexByName($sheetName);
//$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
//var_dump($sheetData);
$objWorksheet = $objPHPExcel->getActiveSheet();
$highestRow = $objWorksheet->getHighestRow(); // highest row with data
for ($row = 2; $row <= $highestRow; ++$row) {
$prtDayDate = $objPHPExcel->getActiveSheet()->getCell($A.$row)->getValue();
$displayDate = PHPExcel_Style_NumberFormat::toFormattedString($prtDayDate, 'YYYY-MM-DD');
$CustomerID = $objPHPExcel->getActiveSheet()->getCell($B.$row)->getValue();
$ProductID = $objPHPExcel->getActiveSheet()->getCell($C.$row)->getValue();
$documentID = $objPHPExcel->getActiveSheet()->getCell($D.$row)->getValue();
$prtQuantity = $objPHPExcel->getActiveSheet()->getCell($E.$row)->getValue();
$prdGroup6ID = $objPHPExcel->getActiveSheet()->getCell($F.$row)->getValue();
//echo  $CustomerID ."-------------------" . $ProductID ."<br/>";
//---------------------------------------Cust Temp Table--------------------------------------------------
$TemQuery='INSERT INTO '.PRITRANS_TABLE.'(priTransID, prtDayDate, countryID, CustomerID, ProductID, documentID, prdGroup6ID, prtQuantity)VALUES
("", "'.$displayDate.'","102","'.$CustomerID.'","'.$ProductID.'","'.$documentID.'","'.$prdGroup6ID.'","'.$prtQuantity.'");';
//echo $TemQuery;
$tbl->query($TemQuery);

}
echo 'Save';
}


?>

<body>
</html>
