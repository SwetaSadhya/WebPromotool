<?php
/* 
Customer Select Options class
Written by Sweta 10 December 2013
Class used to create Customer Options objects.
*/

include_once("DbConnection.php");
include_once("Customer.php");
include_once("CustomerSelectionOptions.php");

class Model_CustomerSelectionOptions extends Model_DbConnection {
	//Variables 
	Public $db;
	Public $con;
	Public $Customers = array();
	Public $CusSelOpt1 = array();


	public function __construct(){	
	$db = new Model_DbConnection();
	$con = $db->connectToDatabase();
	}
	
	// get Customers
	public function getCustomers() {
	
	$query = "SELECT * FROM tblCustomer where isActive = '1' GROUP BY customerID";
	//echo $query;
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
	$Cust = new Model_Customer($row['customerID'],$row['countryID'],$row['cusCustomerClientCode'],$row['cusCustomerName'],$row['cusGroup1ID'],$row['cusGroup2ID'],$row['cusGroup3ID'],$row['cusGroup4ID'],$row['cusGroup5ID'],$row['cusGroup6ID'],$row['cusGroup7ID']);
	$Customers[] = $Cust;
	}
	return json_encode($Customers);
	
	}
	
	// get Customer Group 
	public function getGroupOption(){
	
	 $query_gp1 = "SELECT c.customerID,c.cusCustomerClientCode, c.cusCustomerName,c.countryID,c.cusGroup1ID,g1.cusGroup1ClientID,g1.cusGroup1Desc,c.cusGroup4ID,g4.cusGroup4ClientID,g4.cusGroup4Desc,c.cusGroup5ID,g5.cusGroup5ClientID,g5.cusGroup5Desc,c.cusGroup6ID,g6.cusGroup6ClientID,g6.cusGroup6Desc,c.cusGroup7ID,g7.cusGroup7ClientID,g7.cusGroup7Desc FROM tblCustomer AS c INNER Join tblCusGroup1 g1 ON g1.cusGroup1ID = c.cusGroup1ID 
	 INNER Join tblCusGroup4 g4 ON g4.cusGroup4ID = c.cusGroup4ID 
	 INNER Join tblCusGroup5 g5 ON g5.cusGroup5ID = c.cusGroup5ID 
	 INNER Join tblCusGroup6 g6 ON g6.cusGroup6ID = c.cusGroup6ID 
	 INNER Join tblCusGroup7 g7 ON g7.cusGroup7ID = c.cusGroup7ID 
	 GROUP BY c.customerID";
	 $result_gp1 = mysql_query($query_gp1);
	 while($row_gp1 = mysql_fetch_array($result_gp1)){
	 $GrpOpt1 = new Model_CustomerSelection($row_gp1['customerID'],$row_gp1['cusCustomerClientCode'],$row_gp1['cusCustomerName'],$row_gp1['countryID'],$row_gp1['cusGroup1ID'], $row_gp1['cusGroup1ClientID'],$row_gp1['cusGroup1Desc'],$row_gp1['cusGroup5ID'],$row_gp1['cusGroup5ClientID'],$row_gp1['cusGroup5Desc'],$row_gp1['cusGroup6ID'],$row_gp1['cusGroup6ClientID'],$row_gp1['cusGroup6Desc']);
	 $CusSelOpt1[] = $GrpOpt1;
	 }
	  return json_encode($CusSelOpt1);
	}	
	

}			
?>