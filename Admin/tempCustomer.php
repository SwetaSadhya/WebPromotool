<?php
/*

Written by Sweta Sadhya 2014
Excel Sheet Uploading of Customer in Temp Table
Bifurcation of Customer Data into Group Table
*/
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
//--------------------------------bsic configration---------------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/promo/Admin/Library/init.inc.php');
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

$inputFileName = './Library/ExcelData/masterCustomer.xlsm';

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
$M = 'M';
$N = 'N';
$O = 'O';
$P = 'P';
$Q = 'Q';
$R = 'R';
$S = 'S';
$T = 'T';
$U = 'U';
$V = 'V';
$W = 'W';
$X = 'X';
$Y = 'Y';
$Z = 'Z';
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
$customerID = $objPHPExcel->getActiveSheet()->getCell($A.$row)->getValue();
$countryID = $objPHPExcel->getActiveSheet()->getCell($B.$row)->getValue();
$cusCustomerClientCode = $objPHPExcel->getActiveSheet()->getCell($C.$row)->getValue();
$cusCustomerName = $objPHPExcel->getActiveSheet()->getCell($D.$row)->getValue();
$cusGroup1ID = $objPHPExcel->getActiveSheet()->getCell($E.$row)->getValue();
$cusGroup1ClientID = $objPHPExcel->getActiveSheet()->getCell($F.$row)->getValue();
$cusGroup1Desc = $objPHPExcel->getActiveSheet()->getCell($G.$row)->getValue();
$cusGroup2ID = $objPHPExcel->getActiveSheet()->getCell($H.$row)->getValue();
$cusGroup2ClientID = $objPHPExcel->getActiveSheet()->getCell($I.$row)->getValue();
$cusGroup2Desc = $objPHPExcel->getActiveSheet()->getCell($J.$row)->getValue();
$cusGroup3ID = $objPHPExcel->getActiveSheet()->getCell($K.$row)->getValue();
$cusGroup3ClientID = $objPHPExcel->getActiveSheet()->getCell($L.$row)->getValue();
$cusGroup3Desc = $objPHPExcel->getActiveSheet()->getCell($M.$row)->getValue();
$cusGroup4ID = $objPHPExcel->getActiveSheet()->getCell($N.$row)->getValue();
$cusGroup4ClientID = $objPHPExcel->getActiveSheet()->getCell($O.$row)->getValue();
$cusGroup4Desc = $objPHPExcel->getActiveSheet()->getCell($P.$row)->getValue();
$cusGroup5ID = $objPHPExcel->getActiveSheet()->getCell($Q.$row)->getValue();
$cusGroup5ClientID = $objPHPExcel->getActiveSheet()->getCell($R.$row)->getValue();
$cusGroup5Desc = $objPHPExcel->getActiveSheet()->getCell($S.$row)->getValue();
$cusGroup6ID = $objPHPExcel->getActiveSheet()->getCell($T.$row)->getValue();
$cusGroup6ClientID = $objPHPExcel->getActiveSheet()->getCell($U.$row)->getValue();
$cusGroup6Desc = $objPHPExcel->getActiveSheet()->getCell($V.$row)->getValue();
$cusGroup7ID = $objPHPExcel->getActiveSheet()->getCell($W.$row)->getValue();
$cusGroup7ClientID = $objPHPExcel->getActiveSheet()->getCell($X.$row)->getValue();
$cusGroup7Desc = $objPHPExcel->getActiveSheet()->getCell($Y.$row)->getValue();
$createdOn = $objPHPExcel->getActiveSheet()->getCell($Z.$row)->getValue();
//echo  $custGroup3ClientID ."-------------------" . $custGroup3Desc ."<br/>";
$cust[] = new Customer($customerID, $countryID, $cusCustomerClientCode, $cusCustomerName, $cusGroup1ID, $cusGroup1ClientID, $cusGroup1Desc, $cusGroup2ID, $cusGroup2ClientID, $cusGroup2Desc, $cusGroup3ID, $cusGroup3ClientID ,$cusGroup3Desc , $cusGroup4ID,$cusGroup4ClientID ,$cusGroup4Desc , $cusGroup5ID ,$cusGroup5ClientID , $cusGroup5Desc, $cusGroup6ID, $cusGroup6ClientID, $cusGroup6Desc, $cusGroup7ID, $cusGroup7ClientID, $cusGroup7Desc, $createdOn);    
//---------------------------------------Cust Temp Table--------------------------------------------------
$custTemQuery='INSERT INTO '.CUST_TEMP_TABLE.'(customerID, countryID, cusCustomerClientCode, cusCustomerName, cusGroup1ID, cusGroup1ClientID, cusGroup1Desc, cusGroup2ID, cusGroup2ClientID, cusGroup2Desc, cusGroup3ID,cusGroup3ClientID ,cusGroup3Desc ,cusGroup4ID,cusGroup4ClientID ,cusGroup4Desc , cusGroup5ID ,cusGroup5ClientID , cusGroup5Desc, cusGroup6ID, cusGroup6ClientID, cusGroup6Desc, cusGroup7ID, cusGroup7ClientID, cusGroup7Desc, createdOn, isActive)VALUES
("'.$customerID.'", "'.$countryID.'","'.$cusCustomerClientCode.'","'.$cusCustomerName.'","'.$cusGroup1ID.'","'.$cusGroup1ClientID.'","'.$cusGroup1Desc.'","'.$cusGroup2ID.'","'.$cusGroup2ClientID.'","'.$cusGroup2Desc.'","'.$cusGroup3ID.'","'.$cusGroup3ClientID.'","'.$cusGroup3Desc.'","'.$cusGroup4ID.'","'.$cusGroup4ClientID.'","'.$cusGroup4Desc.'","'.$cusGroup5ID.'","'.$cusGroup5ClientID.'","'.$cusGroup5Desc.'","'.$cusGroup6ID.'","'.$cusGroup6ClientID.'","'.$cusGroup6Desc.'","'.$cusGroup7ID.'","'.$cusGroup7ClientID.'","'.$cusGroup7Desc.'","'.$createdOn.'","1")';
//echo $custTemQuery;
$tbl->query($custTemQuery);
}
//print_r($cust);
//count($cust);
}
$cust_count = count($cust);
if(!empty($cust_count))
{

//--------------------------------Country----------------------------------------------
$tbl_c=new Model;
$sql_c="SELECT Distinct countryID FROM ".CUST_TEMP_TABLE." ORDER BY  cusGroup1ClientID";
$res_c = $tbl_c->find_query_all($sql_c);
$count_c=count($res_c);
if($count_c>0)
{						
 foreach($res_c as $row_c){
			$Query_c="INSERT INTO ".CUST_COUNTRY_TABLE."(countryID,ctyCountryDescription,ctyCurrency,isActive)VALUES('".$row_c->countryID."', 'Malaysia','RM','1')";
			$tbl_c->query($Query_c);	
			
	}
}
//--------------------------------Group1----------------------------------------------
$tbl1=new Model;
$sql1="SELECT countryID,cusGroup1ClientID,cusGroup1Desc FROM ".CUST_TEMP_TABLE." ORDER BY  cusGroup1ClientID";
$res1 = $tbl1->find_query_all($sql1);
$count1=count($res1);
if($count1>0)
{						
 foreach($res1 as $row1){
		$tbl1->_table_name= CUST_G1_TABLE;
			if($row1->cusGroup1ClientID!==''){
			$g1Sql=" where countryID =? and cusGroup1ClientID = ? ";
			$tbl1->find($g1Sql, array($row1->countryID,$row1->cusGroup1ClientID));
			}else{
			$g1Sql=" where countryID =? and cusGroup1Desc = ?";
			$tbl1->find($g1Sql, array($row1->countryID,$row1->cusGroup1Desc));
			}
			$g1Count=$tbl1->_row_count;
			if($g1Count == 0){
			$g1Query="INSERT INTO ".CUST_G1_TABLE."(cusGroup1ID, countryID, cusGroup1ClientID, cusGroup1Desc)VALUES('', '".$row1->countryID."', '".$row1->cusGroup1ClientID."','".$row1->cusGroup1Desc."')";
			$tbl1->query($g1Query);	
			}
	}
}
//---------------------------------------Group2--------------------------------------------------
$tbl2=new Model;
$sql2="SELECT countryID,cusGroup2ClientID,cusGroup2Desc FROM ".CUST_TEMP_TABLE." ORDER BY  cusGroup2ClientID";
$res2 = $tbl2->find_query_all($sql2);
$count2=count($res2);
if($count2>0)
{						
 foreach($res2 as $row2){
		$tbl2->_table_name= CUST_G2_TABLE;
		if($row2->cusGroup2ClientID!==''){
		$g2Sql=" where countryID =? and cusGroup2ClientID = ?";
		$tbl2->find($g2Sql, array($row2->countryID,$row2->cusGroup2ClientID));
		}else{
		$g2Sql=" where countryID =? and cusGroup2ClientID = ?";
		$tbl2->find($g2Sql, array($row2->countryID,$row2->cusGroup2Desc));
		}
		$g2Count=$tbl2->_row_count;
		if($g2Count == 0){
		//$g2Query="INSERT INTO ".CUST_G2_TABLE."(cusGroup2ID, countryID, cusGroup2ClientID, cusGroup2Desc)VALUES('', '".$row2->countryID."', '".$row2->cusGroup2ClientID."','".$row2->cusGroup2Desc."')";
		//$tbl2->query($g2Query);
		}
	}
}
//---------------------------------------Group3--------------------------------------------------
$tbl3=new Model;
$sql3="SELECT countryID,cusGroup3ClientID,cusGroup3Desc FROM ".CUST_TEMP_TABLE." ORDER BY  cusGroup3ClientID";
$res3 = $tbl3->find_query_all($sql3);
$count3=count($res3);
if($count3>0)
{						
		foreach($res3 as $row3){
		$tbl3->_table_name= CUST_G3_TABLE;
				if($row3->cusGroup3ClientID!==''){
				$g3Sql=" where countryID =? and cusGroup3ClientID = ?";
				$tbl3->find($g3Sql, array($row3->countryID,$row3->cusGroup3ClientID));
				}else{
				$g3Sql=" where countryID =? and cusGroup3Desc = ?";
				$tbl3->find($g3Sql, array($row3->countryID,$row3->cusGroup3Desc));
				}
				$g3Count=$tbl3->_row_count;
				if($g3Count == 0){
				//$g3Query="INSERT INTO ".CUST_G3_TABLE."(cusGroup3ID, countryID, cusGroup3ClientID, cusGroup3Desc)VALUES('', '".$row3->countryID."', '".$row3->cusGroup3ClientID."','".$row3->cusGroup3Desc."')";
				//$tbl3->query($g3Query);	
				}
		}
}
//---------------------------------------Group4--------------------------------------------------
$tbl4=new Model;
$sql4="SELECT countryID,cusGroup4ClientID,cusGroup4Desc FROM ".CUST_TEMP_TABLE." ORDER BY  cusGroup4ClientID";
$res4 = $tbl4->find_query_all($sql4);
$count4=count($res4);
if($count4>0)
{						
		foreach($res4 as $row4){
		$tbl4->_table_name= CUST_G4_TABLE;
				if($row4->cusGroup4ClientID!==''){
				$g4Sql=" where countryID =? and cusGroup4ClientID = ?";
				$tbl4->find($g4Sql, array($row4->countryID,$row4->cusGroup4ClientID));
				}else{
				$g4Sql=" where countryID =? and cusGroup4Desc = ?";
				$tbl4->find($g4Sql, array($row4->countryID,$row4->cusGroup4Desc));
				}
				$g4Count=$tbl4->_row_count;
				if($g4Count == 0){
				$g4Query="INSERT INTO ".CUST_G4_TABLE."(cusGroup4ID, countryID, cusGroup4ClientID, cusGroup4Desc)VALUES('', '".$row4->countryID."', '".$row4->cusGroup4ClientID."','".$row4->cusGroup4Desc."')";
				$tbl4->query($g4Query);	
				}
		}
}
//---------------------------------------Group5--------------------------------------------------
$tbl5=new Model;
$sql5="SELECT countryID,cusGroup5ClientID,cusGroup5Desc FROM ".CUST_TEMP_TABLE." ORDER BY  cusGroup5ClientID";
$res5 = $tbl5->find_query_all($sql5);
$count5=count($res5);
if($count5>0)
{						
		foreach($res5 as $row5){
		$tbl5->_table_name= CUST_G5_TABLE;
				if($row5->cusGroup5ClientID!==''){
				$g5Sql=" where countryID =? and cusGroup5ClientID = ?";
				$tbl5->find($g5Sql, array($row5->countryID,$row5->cusGroup5ClientID));
				}else{
				$g5Sql=" where countryID =? and cusGroup5Desc = ?";
				$tbl5->find($g5Sql, array($row5->countryID,$row5->cusGroup5Desc));
				}
				$g5Count=$tbl5->_row_count;
				if($g5Count == 0){
				$g5Query="INSERT INTO ".CUST_G5_TABLE."(cusGroup5ID, countryID, cusGroup5ClientID, cusGroup5Desc)VALUES('', '".$row5->countryID."', '".$row5->cusGroup5ClientID."','".$row5->cusGroup5Desc."')";
				$tbl5->query($g5Query);	
				}
		}
}
//---------------------------------------Group6--------------------------------------------------
$tbl6=new Model;
$sql6="SELECT countryID,cusGroup6ClientID,cusGroup6Desc FROM ".CUST_TEMP_TABLE." ORDER BY  cusGroup6ClientID";
$res6 = $tbl6->find_query_all($sql6);
$count6=count($res6);
if($count6>0)
{						
		foreach($res6 as $row6){
		$tbl6->_table_name= CUST_G6_TABLE;
				if($row6->cusGroup6ClientID!==''){
				$g6Sql=" where countryID =? and cusGroup6ClientID = ?";
				$tbl6->find($g6Sql, array($row6->countryID,$row6->cusGroup6ClientID));
				}else{
				$g6Sql=" where countryID =? and cusGroup6Desc = ?";
				$tbl6->find($g6Sql, array($row6->countryID,$row6->cusGroup6Desc));
				}
				$g6Count=$tbl6->_row_count;
				if($g6Count == 0){
				$g6Query="INSERT INTO ".CUST_G6_TABLE."(cusGroup6ID, countryID, cusGroup6ClientID, cusGroup6Desc)VALUES('', '".$row6->countryID."', '".$row6->cusGroup6ClientID."','".$row6->cusGroup6Desc."')";
				$tbl6->query($g6Query);	
				}
		}
}
//---------------------------------------Group7--------------------------------------------------
$tbl7=new Model;
$sql7="SELECT countryID,cusGroup7ClientID,cusGroup7Desc FROM ".CUST_TEMP_TABLE." ORDER BY  cusGroup7ClientID";
$res7 = $tbl7->find_query_all($sql7);
$count7=count($res7);
if($count7>0)
{						
		foreach($res7 as $row7){
		$tbl7->_table_name= CUST_G7_TABLE;
				if($row7->cusGroup7ClientID!==''){
				$g7Sql=" where countryID =? and cusGroup7ClientID = ?";
				$tbl7->find($g7Sql, array($row7->countryID,$row7->cusGroup7ClientID));
				}else{
				$g7Sql=" where countryID =? and cusGroup7Desc = ?";
				$tbl7->find($g7Sql, array($row7->countryID,$row7->cusGroup7Desc));
				}
				$g7Count=$tbl7->_row_count;
				if($g7Count == 0){
				$g7Query="INSERT INTO ".CUST_G7_TABLE."(cusGroup7ID, countryID, cusGroup7ClientID, cusGroup7Desc)VALUES('', '".$row7->countryID."', '".$row7->cusGroup7ClientID."','".$row7->cusGroup7Desc."')";
				$tbl7->query($g7Query);	
				}
		}
}
echo 'Save';
}


?>

<body>
</html>
