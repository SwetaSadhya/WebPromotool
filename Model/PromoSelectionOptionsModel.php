<?php
/* 
Promotion Select Options class
Written by Sweta 10 December 2013
Class used to create Promotion Options objects.
*/

include_once("DbConnection.php");
include_once("PromoSelectionOptions.php");

class Model_PromoSelectionOptions extends Model_DbConnection {
	//Variables 
	Public $db;
	Public $con;
	Public $GpOpt;
	Public $Objective = array();
	Public $TypeOption = array();
	Public $UnitOption = array();
	Public $InitiatedOption = array();

	public function __construct(){	
	$db = new Model_DbConnection();
	$con = $db->connectToDatabase();
	}
	
	// get Obejective Selection
	public function getObejectiveSelection() {
	
	$query = "SELECT * FROM tblPromotionObjectiveSelection ORDER BY prmObjectiveID";
	//echo $query;
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
	$Obj = new Model_PromoSelection($row['prmObjectiveID'],$row['prmObjectiveDesc'],'','','','','');
	$Objective[] = $Obj;
	}
	return json_encode($Objective);
	
	}
	
	// get Type 
	public function getTypeOptions(){
	
	 $query_type = "SELECT * FROM tblPromotionType WHERE countryID ='102' ORDER BY promotiontypeID";
	 $result_type = mysql_query($query_type);
	 while($row_type = mysql_fetch_array($result_type)){
	 $TypOpt = new Model_PromoSelection('','',$row_type['promotiontypeID'],$row_type['ptyPromotionTypeName'],$row_type['ptyPromotionTypeParent'],'','');
	 $TypeOption[] = $TypOpt;
	 }
	  return json_encode($TypeOption);
	}

	// get Unit 
	public function getUnitOptions(){
	
	 $query_unit = "SELECT * FROM tblPromotionUnit ORDER BY prmUnitID";
	 $result_unit = mysql_query($query_unit);
	 while($row_unit = mysql_fetch_array($result_unit)){
	 $UntOpt = new Model_PromoSelection('','','','','',$row_unit['prmUnitID'],$row_unit['prmUnitDesc']);
	 $UnitOption[] = $UntOpt;
	 }
	  return json_encode($UnitOption);
	}
	
}			
?>