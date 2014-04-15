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

$datetime1 = new DateTime($prmStartDate);
$datetime2 = new DateTime($prmEndDate);
$difference = $datetime1->diff($datetime2);
$dateDiff = $difference->d;


$Baseline = "";
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
	if($row['prdGroup6ID']== $prmUnit){
	$Qty1+= $row['prtQuantity'];
	}
	if($row['prdGroup6ID']!= $prmUnit){
	$query2 = "SELECT * FROM tblPrdGroup17 where prdGroup17ID=".$row['prdGroup6ID']."";//note: take prd id check in prd table gp17, get gp17 id frm prd table  check it in tbl prdgp17
	$result2 = mysql_query($query2);
	while($row2 = mysql_fetch_array($result2)){
	$prdGroup17ClientID = $row2['prdGroup17ClientID'];
	}
	$Qty2+= $row['prtQuantity'] * $row2['prdGroup17ClientID'];
	}
	}
	$totalQty = $Qty1 + $Qty2;
	$Baseline = ($totalQty/365)*$dateDiff;
	
	echo round($Baseline);
}
?>

