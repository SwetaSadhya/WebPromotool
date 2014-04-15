<?php
ini_set('max_execution_time', 600); //300 seconds = 5 minutes
//--------------------------------bsic configration---------------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/promo/WebPromotool/Admin/Library/init.inc.php');
/*

Written by Sweta Sadhya 2014
Modified by Wouter van Rij on 22 March 2013:
Excel Sheet Uploading of Product in Temp Table
Bifurcation of Product Data into Group Table
*/
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

/** Product Class */
include 'Product.php';

$inputFileName = './Library/ExcelData/masterProduct.xlsm';

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
$AA = 'AA';
$AB = 'AB';
$AC = 'AC';
$AD = 'AD';
$AE = 'AE';
$AF = 'AF';
$AF = 'AF';
$AG = 'AG';
$AH = 'AH';
$AI = 'AI';
$AJ = 'AJ';
$AK = 'AK';
$AL = 'AL';
$AM = 'AM';
$AN = 'AN';
$AO = 'AO';
$AP = 'AP';
$AQ = 'AQ';
$AR = 'AR';
$AS = 'AS';
$AT = 'AT';
$AU = 'AU';
$AV = 'AV';
$AW = 'AW';
$AX = 'AX';
$AY = 'AY';
$AZ = 'AZ';
$BA = 'BA';
$BB = 'BB';
$BC = 'BC';
$BD = 'BD';
$BE = 'BE';
$BF = 'BF';
$BF = 'BF';
$BG = 'BG';
$BH = 'BH';
$BI = 'BI';
$BJ = 'BJ';
$BK = 'BK';
$BL = 'BL';
$BM = 'BM';
$BN = 'BN';
$BO = 'BO';
$BP = 'BP';
$BQ = 'BQ';
$BR = 'BR';
$BS = 'BS';
$BT = 'BT';
$BU = 'BU';
$BV = 'BV';
$BW = 'BW';
$BX = 'BX';
$prd = array();
$prd_count = "";

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
$ProductID = $objPHPExcel->getActiveSheet()->getCell($A.$row)->getValue();
$countryID = $objPHPExcel->getActiveSheet()->getCell($B.$row)->getValue();
$prdProductClientCode = $objPHPExcel->getActiveSheet()->getCell($C.$row)->getValue();
$ProductName = $objPHPExcel->getActiveSheet()->getCell($D.$row)->getValue();
$prdCreatedOncell = $objPHPExcel->getActiveSheet()->getCell($E.$row)->getValue();
$prdCreatedOn = PHPExcel_Style_NumberFormat::toFormattedString($prdCreatedOncell, 'YYYY-MM-DD');
$prdGSTGroup = $objPHPExcel->getActiveSheet()->getCell($F.$row)->getValue();
$prdGroup1ID = $objPHPExcel->getActiveSheet()->getCell($G.$row)->getValue();
$prdGroup1ClientID = $objPHPExcel->getActiveSheet()->getCell($H.$row)->getValue();
$prdGroup1Desc = $objPHPExcel->getActiveSheet()->getCell($I.$row)->getValue();
$prdGroup2ID = $objPHPExcel->getActiveSheet()->getCell($J.$row)->getValue();
$prdGroup2ClientID = $objPHPExcel->getActiveSheet()->getCell($K.$row)->getValue();
$prdGroup2Desc = $objPHPExcel->getActiveSheet()->getCell($L.$row)->getValue();
$prdGroup3ID = $objPHPExcel->getActiveSheet()->getCell($M.$row)->getValue();
$prdGroup3ClientID = $objPHPExcel->getActiveSheet()->getCell($N.$row)->getValue();
$prdGroup3Desc = $objPHPExcel->getActiveSheet()->getCell($O.$row)->getValue();
$prdGroup4ID = $objPHPExcel->getActiveSheet()->getCell($P.$row)->getValue();
$prdGroup4ClientID = $objPHPExcel->getActiveSheet()->getCell($Q.$row)->getValue();
$prdGroup4Desc = $objPHPExcel->getActiveSheet()->getCell($R.$row)->getValue();
$prdGroup5ID = $objPHPExcel->getActiveSheet()->getCell($S.$row)->getValue();
$prdGroup5ClientID = $objPHPExcel->getActiveSheet()->getCell($T.$row)->getValue();
$prdGroup5Desc = $objPHPExcel->getActiveSheet()->getCell($U.$row)->getValue();
$prdGroup6ID = $objPHPExcel->getActiveSheet()->getCell($V.$row)->getValue();
$prdGroup6ClientID = $objPHPExcel->getActiveSheet()->getCell($W.$row)->getValue();
$prdGroup6Desc = $objPHPExcel->getActiveSheet()->getCell($X.$row)->getValue();
$prdGroup7ID = $objPHPExcel->getActiveSheet()->getCell($Y.$row)->getValue();
$prdGroup7ClientID = $objPHPExcel->getActiveSheet()->getCell($Z.$row)->getValue();
$prdGroup7Desc = $objPHPExcel->getActiveSheet()->getCell($AA.$row)->getValue();
$prdGroup8ID = $objPHPExcel->getActiveSheet()->getCell($AB.$row)->getValue();
$prdGroup8ClientID = $objPHPExcel->getActiveSheet()->getCell($AC.$row)->getValue();
$prdGroup8Desc = $objPHPExcel->getActiveSheet()->getCell($AD.$row)->getValue();
$prdGroup9ID = $objPHPExcel->getActiveSheet()->getCell($AE.$row)->getValue();
$prdGroup9ClientID = $objPHPExcel->getActiveSheet()->getCell($AF.$row)->getValue();
$prdGroup9Desc = $objPHPExcel->getActiveSheet()->getCell($AG.$row)->getValue();
$prdGroup10ID = $objPHPExcel->getActiveSheet()->getCell($AH.$row)->getValue();
$prdGroup10ClientID = $objPHPExcel->getActiveSheet()->getCell($AI.$row)->getValue();
$prdGroup10Desc = $objPHPExcel->getActiveSheet()->getCell($AJ.$row)->getValue();
$prdGroup11ID = $objPHPExcel->getActiveSheet()->getCell($AK.$row)->getValue();
$prdGroup11ClientID = $objPHPExcel->getActiveSheet()->getCell($AL.$row)->getValue();
$prdGroup11Desc = $objPHPExcel->getActiveSheet()->getCell($AM.$row)->getValue();
$prdGroup12ID = $objPHPExcel->getActiveSheet()->getCell($AN.$row)->getValue();
$prdGroup12ClientID = $objPHPExcel->getActiveSheet()->getCell($AO.$row)->getValue();
$prdGroup12Desc = $objPHPExcel->getActiveSheet()->getCell($AP.$row)->getValue();
$prdGroup13ID = $objPHPExcel->getActiveSheet()->getCell($AQ.$row)->getValue();
$prdGroup13ClientID = $objPHPExcel->getActiveSheet()->getCell($AR.$row)->getValue();
$prdGroup13Desc = $objPHPExcel->getActiveSheet()->getCell($AS.$row)->getValue();
$prdGroup14ID = $objPHPExcel->getActiveSheet()->getCell($AT.$row)->getValue();
$prdGroup14ClientID = $objPHPExcel->getActiveSheet()->getCell($AU.$row)->getValue();
$prdGroup14Desc = $objPHPExcel->getActiveSheet()->getCell($AV.$row)->getValue();
$prdGroup15ID = $objPHPExcel->getActiveSheet()->getCell($AW.$row)->getValue();
$prdGroup15ClientID = $objPHPExcel->getActiveSheet()->getCell($AX.$row)->getValue();
$prdGroup15Desc = $objPHPExcel->getActiveSheet()->getCell($AY.$row)->getValue();
$prdGroup16ID = $objPHPExcel->getActiveSheet()->getCell($AZ.$row)->getValue();
$prdGroup16ClientID = $objPHPExcel->getActiveSheet()->getCell($BA.$row)->getValue();
$prdGroup16Desc = $objPHPExcel->getActiveSheet()->getCell($BB.$row)->getValue();
$prdGroup17ID = $objPHPExcel->getActiveSheet()->getCell($BC.$row)->getValue();
$prdGroup17ClientID = $objPHPExcel->getActiveSheet()->getCell($BD.$row)->getValue();
$prdGroup17Desc = $objPHPExcel->getActiveSheet()->getCell($BE.$row)->getValue();
$prdGroup18ID = $objPHPExcel->getActiveSheet()->getCell($BF.$row)->getValue();
$prdGroup18ClientID = $objPHPExcel->getActiveSheet()->getCell($BG.$row)->getValue();
$prdGroup18Desc = $objPHPExcel->getActiveSheet()->getCell($BH.$row)->getValue();
$prdGroup19ID = $objPHPExcel->getActiveSheet()->getCell($BI.$row)->getValue();
$prdGroup19ClientID = $objPHPExcel->getActiveSheet()->getCell($BJ.$row)->getValue();
$prdGroup19Desc = $objPHPExcel->getActiveSheet()->getCell($BK.$row)->getValue();
$prdGroup20ID = $objPHPExcel->getActiveSheet()->getCell($BL.$row)->getValue();
$prdGroup20ClientID = $objPHPExcel->getActiveSheet()->getCell($BM.$row)->getValue();
$prdGroup20Desc = $objPHPExcel->getActiveSheet()->getCell($BN.$row)->getValue();
$prdGroup21ID = $objPHPExcel->getActiveSheet()->getCell($BO.$row)->getValue();
$prdGroup21ClientID = $objPHPExcel->getActiveSheet()->getCell($BP.$row)->getValue();
$prdGroup21Desc = $objPHPExcel->getActiveSheet()->getCell($BQ.$row)->getValue();
$prdNetWeight = $objPHPExcel->getActiveSheet()->getCell($BR.$row)->getValue();
$prdNetVolume = $objPHPExcel->getActiveSheet()->getCell($BS.$row)->getValue();
$prdGST = $objPHPExcel->getActiveSheet()->getCell($BT.$row)->getValue();
$prdParentCode = $objPHPExcel->getActiveSheet()->getCell($BU.$row)->getValue();
$prdParentCodeValidFrom = $objPHPExcel->getActiveSheet()->getCell($BV.$row)->getValue();
$prdParentCodeValidTo = $objPHPExcel->getActiveSheet()->getCell($BW.$row)->getValue();
$ImportLogID = $objPHPExcel->getActiveSheet()->getCell($BX.$row)->getValue();

//echo  $prdGroup17ClientID ."-------------------" . $prdGroup17Desc ."<br/>";
$prd[] = new Product($ProductID, $countryID, $prdProductClientCode, $ProductName, $prdCreatedOn, $prdGSTGroup, $prdGroup1ID, $prdGroup1ClientID, $prdGroup1Desc,$prdGroup2ID, $prdGroup2ClientID, $prdGroup2Desc,$prdGroup3ID, $prdGroup3ClientID, $prdGroup3Desc,$prdGroup4ID, $prdGroup4ClientID, $prdGroup4Desc,$prdGroup5ID, $prdGroup5ClientID, $prdGroup5Desc,$prdGroup6ID, $prdGroup6ClientID, $prdGroup6Desc,$prdGroup7ID, $prdGroup7ClientID, $prdGroup7Desc,$prdGroup8ID, $prdGroup8ClientID, $prdGroup8Desc,$prdGroup9ID, $prdGroup9ClientID, $prdGroup9Desc,$prdGroup10ID, $prdGroup10ClientID, $prdGroup10Desc,$prdGroup11ID, $prdGroup11ClientID, $prdGroup11Desc,$prdGroup12ID, $prdGroup12ClientID, $prdGroup12Desc,$prdGroup13ID, $prdGroup13ClientID, $prdGroup13Desc,$prdGroup14ID, $prdGroup14ClientID, $prdGroup14Desc,$prdGroup15ID, $prdGroup15ClientID, $prdGroup15Desc,$prdGroup16ID, $prdGroup16ClientID, $prdGroup16Desc,$prdGroup17ID, $prdGroup17ClientID, $prdGroup17Desc,$prdGroup18ID, $prdGroup18ClientID, $prdGroup18Desc,$prdGroup19ID, $prdGroup19ClientID, $prdGroup19Desc,$prdGroup20ID, $prdGroup20ClientID, $prdGroup20Desc, $prdGroup21ID, $prdGroup21ClientID, $prdGroup21Desc, $prdNetWeight , $prdNetVolume , $prdGST , $prdParentCode , $prdParentCodeValidFrom , $prdParentCodeValidTo , $ImportLogID);    
//---------------------------------------Cust Temp Table--------------------------------------------------
$prdTemQuery='INSERT INTO '.PRD_TEMP_TABLE.'(ProductID, countryID, prdProductClientCode, ProductName, prdCreatedOn, prdGSTGroup, prdGroup1ID, prdGroup1ClientID, prdGroup1Desc,prdGroup2ID, prdGroup2ClientID, prdGroup2Desc,prdGroup3ID, prdGroup3ClientID, prdGroup3Desc,prdGroup4ID, prdGroup4ClientID, prdGroup4Desc,prdGroup5ID, prdGroup5ClientID, prdGroup5Desc,prdGroup6ID, prdGroup6ClientID, prdGroup6Desc,prdGroup7ID, prdGroup7ClientID, prdGroup7Desc,prdGroup8ID, prdGroup8ClientID, prdGroup8Desc,prdGroup9ID, prdGroup9ClientID, prdGroup9Desc,prdGroup10ID, prdGroup10ClientID, prdGroup10Desc,prdGroup11ID, prdGroup11ClientID, prdGroup11Desc,prdGroup12ID, prdGroup12ClientID, prdGroup12Desc,prdGroup13ID, prdGroup13ClientID, prdGroup13Desc,prdGroup14ID, prdGroup14ClientID, prdGroup14Desc,prdGroup15ID, prdGroup15ClientID, prdGroup15Desc,prdGroup16ID, prdGroup16ClientID, prdGroup16Desc,prdGroup17ID, prdGroup17ClientID, prdGroup17Desc,prdGroup18ID, prdGroup18ClientID, prdGroup18Desc,prdGroup19ID, prdGroup19ClientID, prdGroup19Desc,prdGroup20ID, prdGroup20ClientID, prdGroup20Desc,prdGroup21ID, prdGroup21ClientID, prdGroup21Desc,prdNetWeight,prdNetVolume,prdGST,prdParentCode,prdParentCodeValidFrom,prdParentCodeValidTo,ImportLogID,isActive)VALUES
("'.$ProductID.'", "'.$countryID.'","'.$prdProductClientCode.'","'.$ProductName.'","'.$prdCreatedOn.'","'.$prdGSTGroup.'","'.$prdGroup1ID.'","'.$prdGroup1ClientID.'","'.$prdGroup1Desc.'","'.$prdGroup2ID.'","'.$prdGroup2ClientID.'","'.$prdGroup2Desc.'","'.$prdGroup3ID.'","'.$prdGroup3ClientID.'","'.$prdGroup3Desc.'","'.$prdGroup4ID.'","'.$prdGroup4ClientID.'","'.$prdGroup4Desc.'","'.$prdGroup5ID.'","'.$prdGroup5ClientID.'","'.$prdGroup5Desc.'","'.$prdGroup6ID.'","'.$prdGroup6ClientID.'","'.$prdGroup6Desc.'","'.$prdGroup7ID.'","'.$prdGroup7ClientID.'","'.$prdGroup7Desc.'","'.$prdGroup8ID.'","'.$prdGroup8ClientID.'","'.$prdGroup8Desc.'","'.$prdGroup9ID.'","'.$prdGroup9ClientID.'","'.$prdGroup9Desc.'","'.$prdGroup10ID.'","'.$prdGroup10ClientID.'","'.$prdGroup10Desc.'","'.$prdGroup11ID.'","'.$prdGroup11ClientID.'","'.$prdGroup11Desc.'","'.$prdGroup12ID.'","'.$prdGroup12ClientID.'","'.$prdGroup12Desc.'","'.$prdGroup13ID.'","'.$prdGroup13ClientID.'","'.$prdGroup13Desc.'","'.$prdGroup14ID.'","'.$prdGroup14ClientID.'","'.$prdGroup14Desc.'","'.$prdGroup15ID.'","'.$prdGroup15ClientID.'","'.$prdGroup15Desc.'","'.$prdGroup16ID.'","'.$prdGroup16ClientID.'","'.$prdGroup16Desc.'","'.$prdGroup17ID.'","'.$prdGroup17ClientID.'","'.$prdGroup17Desc.'","'.$prdGroup18ID.'","'.$prdGroup18ClientID.'","'.$prdGroup18Desc.'","'.$prdGroup19ID.'","'.$prdGroup19ClientID.'","'.$prdGroup19Desc.'","'.$prdGroup20ID.'","'.$prdGroup20ClientID.'","'.$prdGroup20Desc.'","'.$prdGroup21ID.'","'.$prdGroup21ClientID.'","'.$prdGroup21Desc.'","'.$prdNetWeight.'","'.$prdNetVolume.'","'.$prdGST.'","'.$prdParentCode.'","'.$prdParentCodeValidFrom.'","'.$prdParentCodeValidTo.'","'.$ImportLogID.'","1")';
//echo $prdTemQuery; 
$tbl->query($prdTemQuery);
}
//print_r($prd);
//count($prd);
}
$prd_count = count($prd);
if(!empty($prd))
{
//--------------------------------Group1----------------------------------------------
$tbl1=new Model;
$sql1="SELECT prdGroup1ID,countryID,prdGroup1ClientID,prdGroup1Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup1ClientID";
$res1 = $tbl1->find_query_all($sql1);
$count1=count($res1);
if($count1>0)
{						
 foreach($res1 as $row1){
		$tbl1->_table_name= PRD_G1_TABLE;
			if($row1->prdGroup1ClientID!==''){
			$g1Sql=" where countryID =? and prdGroup1ClientID = ? ";
			$tbl1->find($g1Sql, array($row1->countryID,$row1->prdGroup1ClientID));
			}else{
			$g1Sql=" where countryID =? and prdGroup1Desc = ?";
			$tbl1->find($g1Sql, array($row1->countryID,$row1->prdGroup1Desc));
			}
			$g1Count=$tbl1->_row_count;
			if($g1Count == 0){
			$g1Query="INSERT INTO ".PRD_G1_TABLE."(prdGroup1ID, countryID, prdGroup1ClientID, prdGroup1Desc)VALUES('".$row1->prdGroup1ID."', '".$row1->countryID."', '".$row1->prdGroup1ClientID."','".$row1->prdGroup1Desc."')";
			$tbl1->query($g1Query);	
			}
	}
}
//--------------------------------Group2----------------------------------------------
$tbl2=new Model;
$sql2="SELECT prdGroup2ID,countryID,prdGroup2ClientID,prdGroup2Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup2ClientID";
$res2 = $tbl2->find_query_all($sql2);
$count2=count($res2);
if($count2>0)
{						
 foreach($res2 as $row2){
		$tbl2->_table_name= PRD_G2_TABLE;
			if($row2->prdGroup2ClientID!==''){
			$g2Sql=" where countryID =? and prdGroup2ClientID = ? ";
			$tbl2->find($g2Sql, array($row2->countryID,$row2->prdGroup2ClientID));
			}else{
			$g2Sql=" where countryID =? and prdGroup2Desc = ?";
			$tbl2->find($g2Sql, array($row2->countryID,$row2->prdGroup2Desc));
			}
			$g2Count=$tbl2->_row_count;
			if($g2Count == 0){
			$g2Query="INSERT INTO ".PRD_G2_TABLE."(prdGroup2ID, countryID, prdGroup2ClientID, prdGroup2Desc)VALUES('".$row2->prdGroup2ID."', '".$row2->countryID."', '".$row2->prdGroup2ClientID."','".$row2->prdGroup2Desc."')";
			$tbl2->query($g2Query);	
			}
	}
}
//--------------------------------Group3----------------------------------------------
$tbl3=new Model;
$sql3="SELECT prdGroup3ID,countryID,prdGroup3ClientID,prdGroup3Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup3ClientID";
$res3 = $tbl3->find_query_all($sql3);
$count3=count($res3);
if($count3>0)
{						
 foreach($res3 as $row3){
		$tbl3->_table_name= PRD_G3_TABLE;
			if($row3->prdGroup3ClientID!==''){
			$g3Sql=" where countryID =? and prdGroup3ClientID = ? ";
			$tbl3->find($g3Sql, array($row3->countryID,$row3->prdGroup3ClientID));
			}else{
			$g3Sql=" where countryID =? and prdGroup3Desc = ?";
			$tbl3->find($g3Sql, array($row3->countryID,$row3->prdGroup3Desc));
			}
			$g3Count=$tbl3->_row_count;
			if($g3Count == 0){
			$g3Query="INSERT INTO ".PRD_G3_TABLE."(prdGroup3ID, countryID, prdGroup3ClientID, prdGroup3Desc)VALUES('".$row3->prdGroup3ID."', '".$row3->countryID."', '".$row3->prdGroup3ClientID."','".$row3->prdGroup3Desc."')";
			$tbl3->query($g3Query);	
			}
	}
}
//--------------------------------Group4----------------------------------------------
$tbl4=new Model;
$sql4="SELECT prdGroup4ID,countryID,prdGroup4ClientID,prdGroup4Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup4ClientID";
$res4 = $tbl4->find_query_all($sql4);
$count4=count($res4);
if($count4>0)
{						
 foreach($res4 as $row4){
		$tbl4->_table_name= PRD_G4_TABLE;
			if($row4->prdGroup4ClientID!==''){
			$g4Sql=" where countryID =? and prdGroup4ClientID = ? ";
			$tbl4->find($g4Sql, array($row4->countryID,$row4->prdGroup4ClientID));
			}else{
			$g4Sql=" where countryID =? and prdGroup4Desc = ?";
			$tbl4->find($g4Sql, array($row4->countryID,$row4->prdGroup4Desc));
			}
			$g4Count=$tbl4->_row_count;
			if($g4Count == 0){
			$g4Query="INSERT INTO ".PRD_G4_TABLE."(prdGroup4ID, countryID, prdGroup4ClientID, prdGroup4Desc)VALUES('".$row4->prdGroup4ID."', '".$row4->countryID."', '".$row4->prdGroup4ClientID."','".$row4->prdGroup4Desc."')";
			$tbl4->query($g4Query);	
			}
	}
}
//--------------------------------Group5----------------------------------------------
$tbl5=new Model;
$sql5="SELECT prdGroup5ID,countryID,prdGroup5ClientID,prdGroup5Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup5ClientID";
$res5 = $tbl5->find_query_all($sql5);
$count5=count($res5);
if($count5>0)
{						
 foreach($res5 as $row5){
		$tbl5->_table_name= PRD_G5_TABLE;
			if($row5->prdGroup5ClientID!==''){
			$g5Sql=" where countryID =? and prdGroup5ClientID = ? ";
			$tbl5->find($g5Sql, array($row5->countryID,$row5->prdGroup5ClientID));
			}else{
			$g5Sql=" where countryID =? and prdGroup5Desc = ?";
			$tbl5->find($g5Sql, array($row5->countryID,$row5->prdGroup5Desc));
			}
			$g5Count=$tbl5->_row_count;
			if($g5Count == 0){
			$g5Query="INSERT INTO ".PRD_G5_TABLE."(prdGroup5ID, countryID, prdGroup5ClientID, prdGroup5Desc)VALUES('".$row5->prdGroup5ID."', '".$row5->countryID."', '".$row5->prdGroup5ClientID."','".$row5->prdGroup5Desc."')";
			$tbl5->query($g5Query);	
			}
	}
}
//--------------------------------Group6----------------------------------------------
$tbl6=new Model;
$sql6="SELECT prdGroup6ID,countryID,prdGroup6ClientID,prdGroup6Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup6ClientID";
$res6 = $tbl6->find_query_all($sql6);
$count6=count($res6);
if($count6>0)
{						
 foreach($res6 as $row6){
		$tbl6->_table_name= PRD_G6_TABLE;
			if($row6->prdGroup6ClientID!==''){
			$g6Sql=" where countryID =? and prdGroup6ClientID = ? ";
			$tbl6->find($g6Sql, array($row6->countryID,$row6->prdGroup6ClientID));
			}else{
			$g6Sql=" where countryID =? and prdGroup6Desc = ?";
			$tbl6->find($g6Sql, array($row6->countryID,$row6->prdGroup6Desc));
			}
			$g6Count=$tbl6->_row_count;
			if($g6Count == 0){
			$g6Query="INSERT INTO ".PRD_G6_TABLE."(prdGroup6ID, countryID, prdGroup6ClientID, prdGroup6Desc)VALUES('".$row6->prdGroup6ID."', '".$row6->countryID."', '".$row6->prdGroup6ClientID."','".$row6->prdGroup6Desc."')";
			$tbl6->query($g6Query);	
			}
	}
}
//--------------------------------Group7----------------------------------------------
$tbl7=new Model;
$sql7="SELECT prdGroup7ID,countryID,prdGroup7ClientID,prdGroup7Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup7ClientID";
$res7 = $tbl7->find_query_all($sql7);
$count7=count($res7);
if($count7>0)
{						
 foreach($res7 as $row7){
		$tbl7->_table_name= PRD_G7_TABLE;
			if($row7->prdGroup7ClientID!==''){
			$g7Sql=" where countryID =? and prdGroup7ClientID = ? ";
			$tbl7->find($g7Sql, array($row7->countryID,$row7->prdGroup7ClientID));
			}else{
			$g7Sql=" where countryID =? and prdGroup7Desc = ?";
			$tbl7->find($g7Sql, array($row7->countryID,$row7->prdGroup7Desc));
			}
			$g7Count=$tbl7->_row_count;
			if($g7Count == 0){
			$g7Query="INSERT INTO ".PRD_G7_TABLE."(prdGroup7ID, countryID, prdGroup7ClientID, prdGroup7Desc)VALUES('".$row7->prdGroup7ID."', '".$row7->countryID."', '".$row7->prdGroup7ClientID."','".$row7->prdGroup7Desc."')";
			$tbl7->query($g7Query);	
			}
	}
}
//--------------------------------Group8----------------------------------------------
$tbl8=new Model;
$sql8="SELECT prdGroup8ID,countryID,prdGroup8ClientID,prdGroup8Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup8ClientID";
$res8 = $tbl8->find_query_all($sql8);
$count8=count($res8);
if($count8>0)
{						
 foreach($res8 as $row8){
		$tbl8->_table_name= PRD_G8_TABLE;
			if($row8->prdGroup8ClientID!==''){
			$g8Sql=" where countryID =? and prdGroup8ClientID = ? ";
			$tbl8->find($g8Sql, array($row8->countryID,$row8->prdGroup8ClientID));
			}else{
			$g8Sql=" where countryID =? and prdGroup8Desc = ?";
			$tbl8->find($g8Sql, array($row8->countryID,$row8->prdGroup8Desc));
			}
			$g8Count=$tbl8->_row_count;
			if($g8Count == 0){
			$g8Query="INSERT INTO ".PRD_G8_TABLE."(prdGroup8ID, countryID, prdGroup8ClientID, prdGroup8Desc)VALUES('".$row8->prdGroup8ID."', '".$row8->countryID."', '".$row8->prdGroup8ClientID."','".$row8->prdGroup8Desc."')";
			$tbl8->query($g8Query);	
			}
	}
}
//--------------------------------Group9----------------------------------------------
$tbl9=new Model;
$sql9="SELECT prdGroup9ID,countryID,prdGroup9ClientID,prdGroup9Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup9ClientID";
$res9 = $tbl9->find_query_all($sql9);
$count9=count($res9);
if($count9>0)
{						
 foreach($res9 as $row9){
		$tbl9->_table_name= PRD_G9_TABLE;
			if($row9->prdGroup9ClientID!==''){
			$g9Sql=" where countryID =? and prdGroup9ClientID = ? ";
			$tbl9->find($g9Sql, array($row9->countryID,$row9->prdGroup9ClientID));
			}else{
			$g9Sql=" where countryID =? and prdGroup9Desc = ?";
			$tbl9->find($g9Sql, array($row9->countryID,$row9->prdGroup9Desc));
			}
			$g9Count=$tbl9->_row_count;
			if($g9Count == 0){
			$g9Query="INSERT INTO ".PRD_G9_TABLE."(prdGroup9ID, countryID, prdGroup9ClientID, prdGroup9Desc)VALUES('".$row9->prdGroup9ID."', '".$row9->countryID."', '".$row9->prdGroup9ClientID."','".$row9->prdGroup9Desc."')";
			$tbl9->query($g9Query);	
			}
	}
}
//--------------------------------Group10----------------------------------------------
$tbl10=new Model;
$sql10="SELECT prdGroup10ID,countryID,prdGroup10ClientID,prdGroup10Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup10ClientID";
$res10 = $tbl10->find_query_all($sql10);
$count10=count($res10);
if($count10>0)
{						
 foreach($res10 as $row10){
		$tbl10->_table_name= PRD_G10_TABLE;
			if($row10->prdGroup10ClientID!==''){
			$g10Sql=" where countryID =? and prdGroup10ClientID = ? ";
			$tbl10->find($g10Sql, array($row10->countryID,$row10->prdGroup10ClientID));
			}else{
			$g10Sql=" where countryID =? and prdGroup10Desc = ?";
			$tbl10->find($g10Sql, array($row10->countryID,$row10->prdGroup10Desc));
			}
			$g10Count=$tbl10->_row_count;
			if($g10Count == 0){
			$g10Query="INSERT INTO ".PRD_G10_TABLE."(prdGroup10ID, countryID, prdGroup10ClientID, prdGroup10Desc)VALUES('".$row10->prdGroup10ID."', '".$row10->countryID."', '".$row10->prdGroup10ClientID."','".$row10->prdGroup10Desc."')";
			$tbl10->query($g10Query);	
			}
	}
}
//--------------------------------Group11----------------------------------------------
$tbl11=new Model;
$sql11="SELECT prdGroup11ID,countryID,prdGroup11ClientID,prdGroup11Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup11ClientID";
$res11 = $tbl11->find_query_all($sql11);
$count11=count($res11);
if($count11>0)
{						
 foreach($res11 as $row11){
		$tbl11->_table_name= PRD_G11_TABLE;
			if($row11->prdGroup11ClientID!==''){
			$g11Sql=" where countryID =? and prdGroup11ClientID = ? ";
			$tbl11->find($g11Sql, array($row11->countryID,$row11->prdGroup11ClientID));
			}else{
			$g11Sql=" where countryID =? and prdGroup11Desc = ?";
			$tbl11->find($g11Sql, array($row11->countryID,$row11->prdGroup11Desc));
			}
			$g11Count=$tbl11->_row_count;
			if($g11Count == 0){
			$g11Query="INSERT INTO ".PRD_G11_TABLE."(prdGroup11ID, countryID, prdGroup11ClientID, prdGroup11Desc)VALUES('".$row11->prdGroup11ID."', '".$row11->countryID."', '".$row11->prdGroup11ClientID."','".$row11->prdGroup11Desc."')";
			$tbl11->query($g11Query);	
			}
	}
}
//--------------------------------Group12----------------------------------------------
$tbl12=new Model;
$sql12="SELECT prdGroup12ID,countryID,prdGroup12ClientID,prdGroup12Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup12ClientID";
$res12 = $tbl12->find_query_all($sql12);
$count12=count($res12);
if($count12>0)
{						
 foreach($res12 as $row12){
		$tbl12->_table_name= PRD_G12_TABLE;
			if($row12->prdGroup12ClientID!==''){
			$g12Sql=" where countryID =? and prdGroup12ClientID = ? ";
			$tbl12->find($g12Sql, array($row12->countryID,$row12->prdGroup12ClientID));
			}else{
			$g12Sql=" where countryID =? and prdGroup12Desc = ?";
			$tbl12->find($g12Sql, array($row12->countryID,$row12->prdGroup12Desc));
			}
			$g12Count=$tbl12->_row_count;
			if($g12Count == 0){
			$g12Query="INSERT INTO ".PRD_G12_TABLE."(prdGroup12ID, countryID, prdGroup12ClientID, prdGroup12Desc)VALUES('".$row12->prdGroup12ID."', '".$row12->countryID."', '".$row12->prdGroup12ClientID."','".$row12->prdGroup12Desc."')";
			$tbl12->query($g12Query);	
			}
	}
}
//--------------------------------Group13----------------------------------------------
$tbl13=new Model;
$sql13="SELECT prdGroup13ID,countryID,prdGroup13ClientID,prdGroup13Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup13ClientID";
$res13 = $tbl13->find_query_all($sql13);
$count13=count($res13);
if($count13>0)
{						
 foreach($res13 as $row13){
		$tbl13->_table_name= PRD_G13_TABLE;
			if($row13->prdGroup13ClientID!==''){
			$g13Sql=" where countryID =? and prdGroup13ClientID = ? ";
			$tbl13->find($g13Sql, array($row13->countryID,$row13->prdGroup13ClientID));
			}else{
			$g13Sql=" where countryID =? and prdGroup13Desc = ?";
			$tbl13->find($g13Sql, array($row13->countryID,$row13->prdGroup13Desc));
			}
			$g13Count=$tbl13->_row_count;
			if($g13Count == 0){
			$g13Query="INSERT INTO ".PRD_G13_TABLE."(prdGroup13ID, countryID, prdGroup13ClientID, prdGroup13Desc)VALUES('".$row13->prdGroup13ID."', '".$row13->countryID."', '".$row13->prdGroup13ClientID."','".$row13->prdGroup13Desc."')";
			$tbl13->query($g13Query);	
			}
	}
}
//--------------------------------Group14----------------------------------------------
$tbl14=new Model;
$sql14="SELECT prdGroup14ID,countryID,prdGroup14ClientID,prdGroup14Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup14ClientID";
$res14 = $tbl14->find_query_all($sql14);
$count14=count($res14);
if($count14>0)
{						
 foreach($res14 as $row14){
		$tbl14->_table_name= PRD_G14_TABLE;
			if($row14->prdGroup14ClientID!==''){
			$g14Sql=" where countryID =? and prdGroup14ClientID = ? ";
			$tbl14->find($g14Sql, array($row14->countryID,$row14->prdGroup14ClientID));
			}else{
			$g14Sql=" where countryID =? and prdGroup14Desc = ?";
			$tbl14->find($g14Sql, array($row14->countryID,$row14->prdGroup14Desc));
			}
			$g14Count=$tbl14->_row_count;
			if($g14Count == 0){
			$g14Query="INSERT INTO ".PRD_G14_TABLE."(prdGroup14ID, countryID, prdGroup14ClientID, prdGroup14Desc)VALUES('".$row14->prdGroup14ID."', '".$row14->countryID."', '".$row14->prdGroup14ClientID."','".$row14->prdGroup14Desc."')";
			$tbl14->query($g14Query);	
			}
	}
}
//--------------------------------Group15----------------------------------------------
$tbl15=new Model;
$sql15="SELECT prdGroup15ID,countryID,prdGroup15ClientID,prdGroup15Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup15ClientID";
$res15 = $tbl15->find_query_all($sql15);
$count15=count($res15);
if($count15>0)
{						
 foreach($res15 as $row15){
		$tbl15->_table_name= PRD_G15_TABLE;
			if($row15->prdGroup15ClientID!==''){
			$g15Sql=" where countryID =? and prdGroup15ClientID = ? ";
			$tbl15->find($g15Sql, array($row15->countryID,$row15->prdGroup15ClientID));
			}else{
			$g15Sql=" where countryID =? and prdGroup15Desc = ?";
			$tbl15->find($g15Sql, array($row15->countryID,$row15->prdGroup15Desc));
			}
			$g15Count=$tbl15->_row_count;
			if($g15Count == 0){
			$g15Query="INSERT INTO ".PRD_G15_TABLE."(prdGroup15ID, countryID, prdGroup15ClientID, prdGroup15Desc)VALUES('".$row15->prdGroup15ID."', '".$row15->countryID."', '".$row15->prdGroup15ClientID."','".$row15->prdGroup15Desc."')";
			$tbl15->query($g15Query);	
			}
	}
}
//--------------------------------Group16----------------------------------------------
$tbl16=new Model;
$sql16="SELECT prdGroup16ID,countryID,prdGroup16ClientID,prdGroup16Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup16ClientID";
$res16 = $tbl16->find_query_all($sql16);
$count16=count($res16);
if($count16>0)
{						
 foreach($res16 as $row16){
		$tbl16->_table_name= PRD_G16_TABLE;
			if($row16->prdGroup16ClientID!==''){
			$g16Sql=" where countryID =? and prdGroup16ClientID = ? ";
			$tbl16->find($g16Sql, array($row16->countryID,$row16->prdGroup16ClientID));
			}else{
			$g16Sql=" where countryID =? and prdGroup16Desc = ?";
			$tbl16->find($g16Sql, array($row16->countryID,$row16->prdGroup16Desc));
			}
			$g16Count=$tbl16->_row_count;
			if($g16Count == 0){
			$g16Query="INSERT INTO ".PRD_G16_TABLE."(prdGroup16ID, countryID, prdGroup16ClientID, prdGroup16Desc)VALUES('".$row16->prdGroup16ID."', '".$row16->countryID."', '".$row16->prdGroup16ClientID."','".$row16->prdGroup16Desc."')";
			$tbl16->query($g16Query);	
			}
	}
}
//--------------------------------Group17----------------------------------------------
$tbl17=new Model;
$sql17="SELECT prdGroup17ID,countryID,prdGroup17ClientID,prdGroup17Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup17ClientID";
$res17 = $tbl17->find_query_all($sql17);
$count17=count($res17);
if($count17>0)
{						
 foreach($res17 as $row17){
		$tbl17->_table_name= PRD_G17_TABLE;
			if($row17->prdGroup17ClientID!==''){
			$g17Sql=" where countryID =? and prdGroup17ClientID = ? ";
			$tbl17->find($g17Sql, array($row17->countryID,$row17->prdGroup17ClientID));
			}else{
			$g17Sql=" where countryID =? and prdGroup17Desc = ?";
			$tbl17->find($g17Sql, array($row17->countryID,$row17->prdGroup17Desc));
			}
			$g17Count=$tbl17->_row_count;
			if($g17Count == 0){
			$g17Query="INSERT INTO ".PRD_G17_TABLE."(prdGroup17ID, countryID, prdGroup17ClientID, prdGroup17Desc)VALUES('".$row17->prdGroup17ID."', '".$row17->countryID."', '".$row17->prdGroup17ClientID."','".$row17->prdGroup17Desc."')";
			$tbl17->query($g17Query);	
			}
	}
}
//--------------------------------Group18----------------------------------------------
$tbl18=new Model;
$sql18="SELECT prdGroup18ID,countryID,prdGroup18ClientID,prdGroup18Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup18ClientID";
$res18 = $tbl18->find_query_all($sql18);
$count18=count($res18);
if($count18>0)
{						
 foreach($res18 as $row18){
		$tbl18->_table_name= PRD_G18_TABLE;
			if($row18->prdGroup18ClientID!==''){
			$g18Sql=" where countryID =? and prdGroup18ClientID = ? ";
			$tbl18->find($g18Sql, array($row18->countryID,$row18->prdGroup18ClientID));
			}else{
			$g18Sql=" where countryID =? and prdGroup18Desc = ?";
			$tbl18->find($g18Sql, array($row18->countryID,$row18->prdGroup18Desc));
			}
			$g18Count=$tbl18->_row_count;
			if($g18Count == 0){
			$g18Query="INSERT INTO ".PRD_G18_TABLE."(prdGroup18ID, countryID, prdGroup18ClientID, prdGroup18Desc)VALUES('".$row18->prdGroup18ID."', '".$row18->countryID."', '".$row18->prdGroup18ClientID."','".$row18->prdGroup18Desc."')";
			$tbl18->query($g18Query);	
			}
	}
}
//--------------------------------Group19----------------------------------------------
$tbl19=new Model;
$sql19="SELECT prdGroup19ID,countryID,prdGroup19ClientID,prdGroup19Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup19ClientID";
$res19 = $tbl19->find_query_all($sql19);
$count19=count($res19);
if($count19>0)
{						
 foreach($res19 as $row19){
		$tbl19->_table_name= PRD_G19_TABLE;
			if($row19->prdGroup19ClientID!==''){
			$g19Sql=" where countryID =? and prdGroup19ClientID = ? ";
			$tbl19->find($g19Sql, array($row19->countryID,$row19->prdGroup19ClientID));
			}else{
			$g19Sql=" where countryID =? and prdGroup19Desc = ?";
			$tbl19->find($g19Sql, array($row19->countryID,$row19->prdGroup19Desc));
			}
			$g19Count=$tbl19->_row_count;
			if($g19Count == 0){
			$g19Query="INSERT INTO ".PRD_G19_TABLE."(prdGroup19ID, countryID, prdGroup19ClientID, prdGroup19Desc)VALUES('".$row19->prdGroup19ID."', '".$row19->countryID."', '".$row19->prdGroup19ClientID."','".$row19->prdGroup19Desc."')";
			$tbl19->query($g19Query);	
			}
	}
}

//--------------------------------Group20----------------------------------------------
$tbl20=new Model;
$sql20="SELECT prdGroup20ID,countryID,prdGroup20ClientID,prdGroup20Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup20ClientID";
$res20 = $tbl20->find_query_all($sql20);
$count20=count($res20);
if($count20>0)
{						
 foreach($res20 as $row20){
		$tbl20->_table_name= PRD_G20_TABLE;
			if($row20->prdGroup20ClientID!==''){
			$g20Sql=" where countryID =? and prdGroup20ClientID = ? ";
			$tbl20->find($g20Sql, array($row20->countryID,$row20->prdGroup20ClientID));
			}else{
			$g20Sql=" where countryID =? and prdGroup20Desc = ?";
			$tbl20->find($g20Sql, array($row20->countryID,$row20->prdGroup20Desc));
			}
			$g20Count=$tbl20->_row_count;
			if($g20Count == 0){
			$g20Query="INSERT INTO ".PRD_G20_TABLE."(prdGroup20ID, countryID, prdGroup20ClientID, prdGroup20Desc)VALUES('".$row20->prdGroup20ID."', '".$row20->countryID."', '".$row20->prdGroup20ClientID."','".$row20->prdGroup20Desc."')";
			$tbl20->query($g20Query);	
			}
	}
}

//--------------------------------Group21----------------------------------------------
$tbl21=new Model;
$sql21="SELECT prdGroup21ID,countryID,prdGroup21ClientID,prdGroup21Desc FROM ".PRD_TEMP_TABLE." ORDER BY  prdGroup21ClientID";
$res21 = $tbl21->find_query_all($sql21);
$count21=count($res21);
if($count21>0)
{						
 foreach($res21 as $row21){
		$tbl21->_table_name= PRD_G21_TABLE;
			if($row21->prdGroup21ClientID!==''){
			$g21Sql=" where countryID =? and prdGroup21ClientID = ? ";
			$tbl21->find($g21Sql, array($row21->countryID,$row21->prdGroup21ClientID));
			}else{
			$g21Sql=" where countryID =? and prdGroup21Desc = ?";
			$tbl21->find($g21Sql, array($row21->countryID,$row21->prdGroup21Desc));
			}
			$g21Count=$tbl21->_row_count;
			if($g21Count == 0){
			$g21Query="INSERT INTO ".PRD_G21_TABLE."(prdGroup21ID, countryID, prdGroup21ClientID, prdGroup21Desc)VALUES('".$row21->prdGroup21ID."', '".$row21->countryID."', '".$row21->prdGroup21ClientID."','".$row21->prdGroup21Desc."')";
			$tbl21->query($g21Query);	
			}
	}
}
//------------------
echo "save";
}
?>

<body>
</html>
