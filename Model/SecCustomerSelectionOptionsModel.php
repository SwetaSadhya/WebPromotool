<?php
/* 
Customer Select Options class
Written by Sweta 10 December 2013
Class used to create Customer Options objects.
*/

include_once("DbConnection.php");
include_once("SecCustomer.php");


class Model_SecCustomerSelectionOptions extends Model_DbConnection {
	//Variables 
	Public $db;
	Public $con;
	Public $GpOpt;
	Public $condition = "";
	Public $SecCustomers = array();


	public function __construct(){	
	$db = new Model_DbConnection();
	$con = $db->connectToDatabase();
	}
	
	
	// get Customer Group 
	public function getSecondrayCustomerOption(){

	$query = "SELECT s.* ,g1.secGroup1ID,g1.secGroup1ClientID,g1.secGroup1Desc,g2.secGroup2ID,g2.secGroup2ClientID,g2.secGroup2Desc
	 FROM tblSecondaryCustomer AS s 
	 INNER Join tblSecGroup1 g1 ON g1.secGroup1ID = s.secGroup1ID  and g1.countryID = s.countryID 
	 INNER Join tblSecGroup2 g2 ON g2.secGroup2ID = s.secGroup2ID and g1.countryID = s.countryID 
	 where s.isActive = '1' GROUP BY s.secondaryCustomerID";

	 $result = mysql_query($query);
	 while($row = mysql_fetch_array($result)){
	 $GrpOpt = new Model_SecCustomer($row['secondaryCustomerID'],$row['countryID'],$row['secCustomerClientID'],$row['secCustomerName'],$row['secSecondaryCustomerClientName'], $row['customerID'],$row['cusCustomerClientCode'],$row['secCustomerClientCode'],$row['secGroup1ID'],$row['secGroup1ClientID'],$row['secGroup1Desc'],$row['secGroup2ID'],$row['secGroup2ClientID'],$row['secGroup2Desc'],$row['secGroup3ID'],$row['isActive']);
	 $SecCustomers[] = $GrpOpt;
	 }
	  return json_encode($SecCustomers);
	}	
	

}			
?>