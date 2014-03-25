<?php
/*

Written by Sweta Sadhya 2014
Excel Sheet Uploading of Secondary Customer in Temp Table
Bifurcation of Secondary Customer Data into Group Table
*/
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
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

/** SecCustomer Class */
include 'SecondaryCustomer.php';

$inputFileName = './Library/ExcelData/masterSecondaryCustomer.xlsm';

//----------------------------variable declartion--------------------------------------------

$tbl=new Model;

$A = 'A';
$B = 'B';
$C = 'C';
$D = 'D';
$E = 'E';
$F = 'F';
$G = 'G';
$H = 'H';
$I = 'I';
$J = 'J';
$K = 'K';
$L = 'L';
$Seccust = array();
$Seccust_count = "";

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
$secondaryCustomerID = $objPHPExcel->getActiveSheet()->getCell($A.$row)->getValue();
$countryID = $objPHPExcel->getActiveSheet()->getCell($B.$row)->getValue();
$secCustomerClientID = $objPHPExcel->getActiveSheet()->getCell($C.$row)->getValue();
$secCustomerName = $objPHPExcel->getActiveSheet()->getCell($D.$row)->getValue();
$secSecondaryCustomerClientName = $objPHPExcel->getActiveSheet()->getCell($E.$row)->getValue();
$customerID = $objPHPExcel->getActiveSheet()->getCell($F.$row)->getValue();
$cusCustomerClientCode = $objPHPExcel->getActiveSheet()->getCell($G.$row)->getValue();
$secCustomerClientCode = $objPHPExcel->getActiveSheet()->getCell($H.$row)->getValue();
$secGroup1ID = $objPHPExcel->getActiveSheet()->getCell($I.$row)->getValue();
$secGroup1Desc = $objPHPExcel->getActiveSheet()->getCell($J.$row)->getValue();
$secGroup2ID = $objPHPExcel->getActiveSheet()->getCell($K.$row)->getValue();
$secGroup2ClientID = $objPHPExcel->getActiveSheet()->getCell($L.$row)->getValue();
$secGroup1ClientID="";
$secGroup2Desc="";
//echo  $secondaryCustomerID ."-------------------" ."<br/>";
$Seccust[] = new SecCustomer($secondaryCustomerID, $countryID, $secCustomerClientID, $secCustomerName, $secSecondaryCustomerClientName, $customerID, $cusCustomerClientCode, $secCustomerClientCode, $secGroup1ID, $secGroup1ClientID, $secGroup1Desc, $secGroup2ID ,$secGroup2ClientID ,$secGroup2Desc);    
//---------------------------------------Cust Temp Table--------------------------------------------------
$SeccustTemQuery='INSERT INTO '.SECCUST_TEMP_TABLE.'(secondaryCustomerID, countryID, secCustomerClientID, secCustomerName, secSecondaryCustomerClientName, customerID, cusCustomerClientCode, secCustomerClientCode, secGroup1ID, secGroup1ClientID, secGroup1Desc, secGroup2ID ,secGroup2ClientID ,secGroup2Desc, isActive)VALUES
('.$secondaryCustomerID.', "'.$countryID.'","'.$secCustomerClientID.'","'.$secCustomerName.'","'.$secSecondaryCustomerClientName.'","'.$customerID.'","'.$cusCustomerClientCode.'","'.$secCustomerClientCode.'","'.$secGroup1ID.'","'.$secGroup1ClientID.'","'.$secGroup1Desc.'","'.$secGroup2ID.'","'.$secGroup2ClientID.'","'.$secGroup2Desc.'","1")';
//echo $SeccustTemQuery;
$tbl->query($SeccustTemQuery);
}
//print_r($Seccust);
//count($Seccust);
}
$Seccust_count = count($Seccust);
if(!empty($Seccust_count))
{

//--------------------------------Group1----------------------------------------------
$tbl1=new Model;
$sql1="SELECT countryID,secGroup1ID,secGroup1ClientID,secGroup1Desc FROM ".SECCUST_TEMP_TABLE." ORDER BY  secGroup1ID";
$res1 = $tbl1->find_query_all($sql1);
$count1=count($res1);
if($count1>0)
{						
 foreach($res1 as $row1){
		$tbl1->_table_name= SECCUST_G1_TABLE;
			$g1Sql=" where countryID =? and secGroup1ID = ? ";
			$tbl1->find($g1Sql, array($row1->countryID,$row1->secGroup1ID));
			$g1Count=$tbl1->_row_count;
			if($g1Count == 0){
			$g1Query="INSERT INTO ".SECCUST_G1_TABLE."(secGroup1ID, countryID, secGroup1ClientID, secGroup1Desc)VALUES('".$row1->secGroup1ID."', '".$row1->countryID."', '".$row1->secGroup1ClientID."','".$row1->secGroup1Desc."')";
			//echo $g1Query;
			$tbl1->query($g1Query);	
			}
	}
}

//---------------------------------------Group2--------------------------------------------------
$tbl2=new Model;
$sql2="SELECT countryID,secGroup2ID,secGroup2ClientID,secGroup2Desc FROM ".SECCUST_TEMP_TABLE." ORDER BY  secGroup2ID";
$res2 = $tbl2->find_query_all($sql2);
$count2=count($res2);
if($count2>0)
{						
 foreach($res2 as $row2){
		$tbl2->_table_name= SECCUST_G2_TABLE;
		$g2Sql=" where countryID =? and secGroup2ID = ?";
		$tbl2->find($g2Sql, array($row2->countryID,$row2->secGroup2ID));
		$g2Count=$tbl2->_row_count;
		if($g2Count == 0){
		$g2Query="INSERT INTO ".SECCUST_G2_TABLE."(secGroup2ID, countryID, 	secGroup2ClientID, secGroup2Desc)VALUES('".$row2->secGroup2ID."', '".$row2->countryID."', '".$row2->secGroup2ClientID."','".$row2->secGroup2Desc."')";
		$tbl2->query($g2Query);
		}
	}
}

echo 'Save';
}


?>

<body>
</html>
