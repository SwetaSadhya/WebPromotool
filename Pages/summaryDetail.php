<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("promotool",$con);

$data = file_get_contents("php://input");
$request = json_decode($data);

$promoID = $request->promoID;

$arrPromoDetail = array();

if(isset($promoID) && $promoID!=""){
	$query = "SELECT * FROM tblPromotionDetails WHERE PromotionID = '".$promoID."'";
	//echo $query;
	$result = mysql_query($query);
	$data = array();
	$x=0;
	while($row = mysql_fetch_array($result)){
	$data[$x]['detVolumeReq']= $row->detVolumeReq; 
	$data[$x]['detRebate']= $row->detRebate; 	
    $data[$x]['detPremiumMechanic']= $row->detPremiumMechanic;
	$data[$x]['detRebateLumpsum']= $row->detRebateLumpsum;
    $data[$x]['detPremiumcost']= $row->detPremiumcost;
	$data[$x]['detPremiumquantity']= $row->detPremiumquantity; 
	$data[$x]['detMailcost']= $row->detMailcost; 
	$data[$x]['detPOSMaterialcost']= $row->detPOSMaterialcost; 
    $x++;
	}
	print_r($data);
}
?>

