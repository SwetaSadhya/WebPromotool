<?php
$con = new mysqli('localhost', 'root', '', 'promotool');

$data = file_get_contents("php://input");
$request = json_decode($data);
$arrPromoDetail = array();

if(isset($request->promoID) && $request->promoID!=""){
$promoID = $request->promoID;

	$query = "SELECT * FROM tblPromotionDetails Where PromotionID = '".$promoID."' ";
	//echo $query;
	$result = $con->query($query);
	$data = array();
	$x=0;
	while($row = $result->fetch_object()){
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
	echo json_encode($data);
	}
?>

