<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("promotool",$con);

$data = file_get_contents("php://input");
$request = json_decode($data);


$customerID = $request->customerID;
$ProductID = $request->ProductID;
$prmStartDate = $request->prmStartDate;
$prmEndDate = $request->prmEndDate;
$prmUnit = $request->prmUnit;

$startDate = new DateTime($prmStartDate);
$prmStartDate = $startDate->format('Y-m-d');

$endDate = new DateTime($prmEndDate);
$prmEndDate = $endDate->format('Y-m-d');

$date = new DateTime($prmStartDate);
$yearAgo = $date->modify('-1 year')->format('Y-m-d');

$timestamp_start = strtotime($prmStartDate);
$timestamp_end = strtotime($prmEndDate);
$difference = abs($timestamp_end - $timestamp_start);
$dateDiff = floor($difference/(60*60*24));


$Baseline = 0;
$totalQty = ""; 
$Qty1 = "";
$Qty2 = "";
$Arr1 = array();
$Arr2 = array();
$condition1 = "";
$condition2 = "";


if(isset($ProductID) && $ProductID!=""){
$Arr2 = $ProductID;
$comma_ProductID = implode(",", $Arr2);
$condition1 =" AND ProductID in (".$comma_ProductID.") ";
}

if(isset($customerID) && $customerID!=""){
$Arr1 = $customerID;
$comma_customerID = implode(",", $Arr1);
$condition2 =" AND CustomerID in (".$comma_customerID.")";
}

$condition =$condition1.$condition2;


if(isset($condition) && $condition!="" )
	{
	$query = "SELECT CustomerID,ProductID,prtDayDate,prtQuantity,prdGroup6ID FROM tblPriTrans where prtDayDate BETWEEN '".$yearAgo."' AND '".$prmStartDate."' ".$condition." ";
	//echo $query;
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
	//echo $row['prdGroup6ID']."++".$prmUnit;
	if($row['prdGroup6ID']== $prmUnit){
	$Qty1+= $row['prtQuantity'];
	}else{
	$query2 = "SELECT p.ProductID, p.prdGroup17ID, g17.prdGroup17ClientID FROM tblProduct p
	INNER JOIN tblPrdGroup17 g17 ON p.prdGroup17ID = g17.prdGroup17ID where p.ProductID = ".$row['ProductID']."";
	$result2 = mysql_query($query2);
	while($row2 = mysql_fetch_array($result2)){
	$prdGroup17ClientID = $row2['prdGroup17ClientID'];
	$Qty2+= $row['prtQuantity'] * $prdGroup17ClientID;
	}
	}
	}
	$totalQty = $Qty1 + $Qty2;
	$Baseline = ($totalQty/365) * $dateDiff;
	if(isset($Baseline) && $Baseline!=0)
	{
	$arr = array('baseline' => round($Baseline), 'error' => '');
	$jsn = json_encode($arr);
    print_r($jsn);
	}else if($dateDiff == 0){
	$arr = array('baseline' => '0', 'error' => 'Start Date and End Date can not be same.' );
	$jsn = json_encode($arr);
    print_r($jsn);
	}else{
	$arr = array('baseline' => '0', 'error' => 'No records between '.$prmStartDate.' to '.$yearAgo);
	$jsn = json_encode($arr);
    print_r($jsn);
	}
	
}
?>

