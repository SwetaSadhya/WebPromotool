<?php
/* 
Product Select Options class
Written by Sweta 14 Feb 2014
Class used to create Product Options objects.
*/

include_once("DbConnection.php");
include_once("Product.php");
include_once("ProductSelectionOptions.php");

class Model_ProductSelectionOptions extends Model_DbConnection {
	//Variables 
	Public $db;
	Public $con;
	Public $GpOpt;
	Public $Products = array();
	Public $PrdSelOpt1 = array();
	Public $PrdDetail = array();
	Public $PrdGroupDetail = array();
	Public $Return = array();

	public function __construct(){	
	$db = new Model_DbConnection();
	$con = $db->connectToDatabase();
	}
	
	// get Products
	public function getProduct() {
	
	$query = "SELECT * FROM tblProduct ORDER BY prdID";

	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
	$Prd = new Model_Product($row['prdID'],$row['ProductID'],$row['countryID'],$row['prdProductClientCode'],$row['ProductName'],$row['prdCreatedOn'],$row['prdGST'],$row['prdNetWeight'],$row['prdNetVolume'],$row['prdGroup1ID'],$row['prdGroup2ID'],$row['prdGroup3ID'],$row['prdGroup4ID'],$row['prdGroup5ID'],$row['prdGroup6ID'],$row['prdGroup7ID'],$row['prdGroup8ID'],$row['prdGroup9ID'],$row['prdGroup10ID'],$row['prdGroup11ID'],$row['prdGroup12ID'],$row['prdGroup13ID'],$row['prdGroup14ID'],$row['prdGroup15ID'],$row['prdGroup16ID'],$row['prdGroup17ID'],$row['prdGroup18ID'],$row['isActive']);
	$Products[] = $Prd;
	}
	return json_encode($Products);
	
	}
	
	// get Product Group 
	public function getGroupOption(){
	
	$query_gp = "SELECT p.prdID, p.ProductID,p.countryID,p.prdProductClientCode,p.ProductName,p.isActive, g4.prdGroup4ID , g4.prdGroup4ClientID , g4.prdGroup4Desc , g7.prdGroup7ID , g7.prdGroup7ClientID, g7.prdGroup7Desc , g9.prdGroup9ID, g9.prdGroup9ClientID, g9.prdGroup9Desc  FROM tblProduct AS p 
	INNER JOIN tblPrdGroup4 g4 ON g4.prdGroup4ID = p.prdGroup4ID  
	INNER JOIN tblPrdGroup7 g7 ON g7.prdGroup7ID = p.prdGroup7ID 
	INNER JOIN tblPrdGroup9 g9 ON g9.prdGroup9ID = p.prdGroup9ID ORDER BY p.prdID";
	$result_gp = mysql_query($query_gp);
	 while($row_gp = mysql_fetch_array($result_gp)){
	 if($row_gp['prdGroup4ID']!="1" && $row_gp['prdGroup7ID']!="1" && $row_gp['prdGroup9ID']!="1"){
	 $GrpOpt = new Model_ProductSelection($row_gp['prdID'],$row_gp['ProductID'],$row_gp['countryID'],$row_gp['prdProductClientCode'],$row_gp['ProductName'],$row_gp['prdGroup4ID'],$row_gp['prdGroup4ClientID'],$row_gp['prdGroup4Desc'],$row_gp['prdGroup7ID'],$row_gp['prdGroup7ClientID'],$row_gp['prdGroup7Desc'],$row_gp['prdGroup9ID'],$row_gp['prdGroup9ClientID'],$row_gp['prdGroup9Desc']);
	 $PrdSelOpt[] = $GrpOpt;
		}
	 }
	   return json_encode($PrdSelOpt);
	 }	
	

}			
?>