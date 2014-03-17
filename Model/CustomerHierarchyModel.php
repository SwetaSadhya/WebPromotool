<?php
/* 
Customer Select Options class
Written by Sweta 10 December 2013
Class used to create Customer Options objects.
*/

include_once("DbConnection.php");
include_once("CustomerHierarchy.php");

class Model_CustomerHierarchy extends Model_DbConnection {
	//Variables 
	Public $db;
	Public $con;
	Public $condition = "";
	Public $condition1 = "";
	Public $condition2 = "";
	Public $condition3 = "";
	Public $Hierarchy1 = Array();
	Public $Hierarchy2 = Array();
	Public $Hierarchy3 = Array();
	Public $Hier1 = Array();
	Public $Hier2 = Array();
	Public $Hier3 = Array();
	Public $Arr1 = array();
	Public $Arr2 = array();
	Public $Arr3 = array();
	
	public function __construct(){	
	$db = new Model_DbConnection();
	$con = $db->connectToDatabase();
	}
	
	// get Group1
	public function getHierarchyGrop1($cGroup1ID,$cGroup5ID,$cGroup6ID) {
	
	if(isset($cGroup1ID) && $cGroup1ID!=""){
	$Arr1 = $cGroup1ID;
	$comma_cGroup1ID = implode(",", $Arr1);
	$condition =" and  h.cusGroup1ID in (".$comma_cGroup1ID.") ";
	}
	if(isset($cGroup5ID) && $cGroup5ID!=""){
	$Arr2 = $cGroup5ID;
	$comma_cGroup5ID = implode(",", $Arr2);
	$condition =" and  h.cusGroup5ID in (".$comma_cGroup5ID.") ";
	}
	if(isset($cGroup6ID) && $cGroup6ID!=""){
	$Arr3 = $cGroup6ID;
	$comma_cGroup6ID = implode(",", $Arr3);
	$condition3 =" and  h.cusGroup6ID in (".$comma_cGroup6ID.") ";
	}
	if(isset($condition) && $condition!="" )
	{
		$condition .=$condition;
		$query1 = "SELECT  h.customerHierarchyID, c.cusID, c.cusCustomerClientCode, c.cusCustomerName, h.cusGroup1ID, g1.cusGroup1Desc, h.cusGroup5ID,g5.cusGroup5Desc, h.cusGroup6ID, g6.cusGroup6Desc
		FROM tblCustomerHierarchy AS h
		INNER JOIN tblCustomer c ON c.cusGroup1ID = h.cusGroup1ID
		AND c.cusGroup5ID = h.cusGroup5ID
		AND c.cusGroup6ID = h.cusGroup6ID
		INNER JOIN tblCusGroup1 g1 ON g1.cusGroup1ID = h.cusGroup1ID
		INNER JOIN tblCusGroup5 g5 ON g5.cusGroup5ID = h.cusGroup5ID
		INNER JOIN tblCusGroup6 g6 ON g6.cusGroup6ID = h.cusGroup6ID where c.isActive = '1' ".$condition."
		GROUP BY h.cusGroup1ID, h.cusGroup5ID, h.cusGroup6ID";
	//echo $query1;	
	$result1 = mysql_query($query1);
	while($row1 = mysql_fetch_array($result1)){
	$Hier1 = new Model_Hierarchy($row1['customerHierarchyID'],$row1['cusID'],$row1['cusCustomerClientCode'],$row1['cusCustomerName'],$row1['cusGroup1ID'],$row1['cusGroup1Desc'],$row1['cusGroup5ID'],$row1['cusGroup5Desc'],$row1['cusGroup6ID'],$row1['cusGroup6Desc']);
	$Hierarchy1[] = $Hier1 ;
	}
	return json_encode($Hierarchy1);
	}
  }

	// // get Group2
	// public function getHierarchyGrop2($cGroup5ID) {
	// if(isset($cGroup5ID) && $cGroup5ID!=""){
	// $Arr2 = $cGroup5ID;
	// $comma_cGroup5ID = implode(",", $Arr2);
	// $condition2 =" and  h.cusGroup5ID in (".$comma_cGroup5ID.") ";
	// $query2 = "SELECT  h.customerHierarchyID, c.cusID, c.cusCustomerClientCode, c.cusCustomerName, h.cusGroup1ID, g1.cusGroup1Desc, h.cusGroup5ID,g5.cusGroup5Desc, h.cusGroup6ID, g6.cusGroup6Desc
		// FROM tblCustomerHierarchy AS h
		// INNER JOIN tblCustomer c ON c.cusGroup1ID = h.cusGroup1ID
		// AND c.cusGroup5ID = h.cusGroup5ID
		// AND c.cusGroup6ID = h.cusGroup6ID
		// INNER JOIN tblCusGroup1 g1 ON g1.cusGroup1ID = h.cusGroup1ID
		// INNER JOIN tblCusGroup5 g5 ON g5.cusGroup5ID = h.cusGroup5ID
		// INNER JOIN tblCusGroup6 g6 ON g6.cusGroup6ID = h.cusGroup6ID where c.isActive = '1' ".$condition2."
		// GROUP BY h.cusGroup1ID, h.cusGroup5ID, h.cusGroup6ID";

	// //echo $query2;	
	// $result2 = mysql_query($query2);
	// while($row2 = mysql_fetch_array($result2)){
	// $Hier2 = new Model_Hierarchy($row2['customerHierarchyID'],$row2['cusID'],$row2['cusCustomerClientCode'],$row2['cusCustomerName'],$row2['cusGroup1ID'],$row2['cusGroup1Desc'],$row2['cusGroup5ID'],$row2['cusGroup5Desc'],$row2['cusGroup6ID'],$row2['cusGroup6Desc']);
	// $Hierarchy2[] = $Hier2 ;
	// }
	// return json_encode($Hierarchy2);
	// }
   // }
   
   // // get Group3
	// public function getHierarchyGrop3($cGroup6ID) {
	// if(isset($cGroup6ID) && $cGroup6ID!=""){
	// $Arr3 = $cGroup6ID;
	// $comma_cGroup6ID = implode(",", $Arr3);
	// $condition3 =" and  h.cusGroup6ID in (".$comma_cGroup6ID.") ";
	// $query3 = "SELECT  h.customerHierarchyID, c.cusID, c.cusCustomerClientCode, c.cusCustomerName, h.cusGroup1ID, g1.cusGroup1Desc, h.cusGroup5ID,g5.cusGroup5Desc, h.cusGroup6ID, g6.cusGroup6Desc
		// FROM tblCustomerHierarchy AS h
		// INNER JOIN tblCustomer c ON c.cusGroup1ID = h.cusGroup1ID
		// AND c.cusGroup5ID = h.cusGroup5ID
		// AND c.cusGroup6ID = h.cusGroup6ID
		// INNER JOIN tblCusGroup1 g1 ON g1.cusGroup1ID = h.cusGroup1ID
		// INNER JOIN tblCusGroup5 g5 ON g5.cusGroup5ID = h.cusGroup5ID
		// INNER JOIN tblCusGroup6 g6 ON g6.cusGroup6ID = h.cusGroup6ID where c.isActive = '1' ".$condition2."
		// GROUP BY h.cusGroup1ID, h.cusGroup5ID, h.cusGroup6ID";

	// //echo $query3;	
	// $result3 = mysql_query($query3);
	// while($row3 = mysql_fetch_array($result3)){
	// $Hier3 = new Model_Hierarchy($row3['customerHierarchyID'],$row3['cusID'],$row3['cusCustomerClientCode'],$row3['cusCustomerName'],$row3['cusGroup1ID'],$row3['cusGroup1Desc'],$row3['cusGroup5ID'],$row3['cusGroup5Desc'],$row3['cusGroup6ID'],$row3['cusGroup6Desc']);
	// $Hierarchy3[] = $Hier3 ;
	// }
	// return json_encode($Hierarchy3);
	// }
   // }
   
   
 //------------------------------------
}			
?>