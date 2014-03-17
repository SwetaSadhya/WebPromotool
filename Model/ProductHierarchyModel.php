<?php
/* 
Product Select Options class
Written by Sweta 10 Feb 2014
Class used to create Product Options objects.
*/

include_once("DbConnection.php");
include_once("ProductHierarchy.php");

class Model_ProductHierarchy extends Model_DbConnection {
	//Variables 
	Public $db;
	Public $con;
	Public $condition = "";
	Public $Hierarchy = Array();
	Public $Hier = Array();
	Public $Arr = array();
	
	public function __construct(){	
	$db = new Model_DbConnection();
	$con = $db->connectToDatabase();
	}
	
	// get Group4
	public function getHierarchyGroup($pGroup4ID,$pGroup7ID,$pGroup9ID) {
	if(isset($pGroup4ID) && $pGroup4ID!=""){
	$condition =" and  h.prdGroup4ID = ".$pGroup4ID." ";
	}
	if(isset($pGroup7ID) && $pGroup7ID!=""){
	$condition =" and  h.prdGroup7ID = ".$pGroup7ID." ";
	}
	if(isset($pGroup9ID) && $pGroup9ID!=""){
	$condition =" and  h.prdGroup9ID = ".$pGroup9ID." ";
	}
	if(isset($condition) && $condition!="" )
		{
		$condition .=$condition;
		$query = "SELECT  h.productHierarchyID,p.prdID, p.ProductID, p.prdProductClientCode, p.ProductName, h.prdGroup4ID, g4.prdGroup4Desc, h.prdGroup7ID,g7.prdGroup7Desc, h.prdGroup9ID, g9.prdGroup9Desc
		FROM tblProductHierarchy AS h
		INNER JOIN tblProduct p ON p.prdGroup4ID = h.prdGroup4ID
		AND p.prdGroup7ID = h.prdGroup7ID
		AND p.prdGroup9ID = h.prdGroup9ID
		INNER JOIN tblPrdGroup4 g4 ON g4.prdGroup4ID = h.prdGroup4ID
		INNER JOIN tblPrdGroup7 g7 ON g7.prdGroup7ID = h.prdGroup7ID
		INNER JOIN tblPrdGroup9 g9 ON g9.prdGroup9ID = h.prdGroup9ID where p.isActive = '1' ".$condition."
		GROUP BY h.prdGroup4ID, h.prdGroup7ID, h.prdGroup9ID";
	//echo $query;	
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
	$Hier = new Model_Hierarchy($row['productHierarchyID'],$row['prdID'],$row['ProductID'],$row['prdProductClientCode'],$row['ProductName'],$row['prdGroup4ID'],$row['prdGroup4Desc'],$row['prdGroup7ID'],$row['prdGroup7Desc'],$row['prdGroup9ID'],$row['prdGroup9Desc']);
	$Hierarchy[] = $Hier ;
	}
	return json_encode($Hierarchy);
	}
}
   
   
 //------------------------------------
}			
?>