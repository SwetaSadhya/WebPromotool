<?php
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
$customerID_Arr = array();
$cusGroup1ID_Arr = array();
$cusGroup5ID_Arr = array();
$cusGroup6ID_Arr = array();
$ProductID_Arr = array();


if(isset($data->channel)){
$channel = $data->channel;
}
if(isset($data->subchannel)){
$subchannel = $data->subchannel;
}
if(isset($data->region)){
$region = $data->region;
}
if(isset($data->customer)){
$customer = $data->customer;
}
if(isset($data->outlettype)){
$outlettype = $data->outlettype;
}
if(isset($data->seccustomer)){
$seccustomer = $data->seccustomer;
}
if(isset($data->cusGroup1ID)){
$cusGroup1ID = $data->cusGroup1ID;
$cusGroup1ID_Arr = $cusGroup1ID;
}
if(isset($data->cusGroup5ID)){
$cusGroup5ID = $data->cusGroup5ID;
$cusGroup5ID_Arr = $cusGroup5ID;
}
if(isset($data->cusGroup6ID)){
$cusGroup6ID = $data->cusGroup6ID;
$cusGroup6ID_Arr = $cusGroup6ID;
}
if(isset($data->customerID)){
$customerID = $data->customerID;
$customerID_Arr = $customerID;
}
if(isset($data->secondaryCustomerID)){
$secondaryCustomerID = $data->secondaryCustomerID;
}
if(isset($data->prdGroup7ID)){
$prdGroup7ID = $data->prdGroup7ID;
}
if(isset($data->prdGroup9ID)){
$prdGroup9ID = $data->prdGroup9ID;
}
if(isset($data->prdGroup4ID)){
$prdGroup4ID = $data->prdGroup4ID;
}
if(isset($data->prdGroup14ID)){
$prdGroup14ID = $data->prdGroup14ID;
}
if(isset($data->prdGroup15ID)){
$prdGroup15ID = $data->prdGroup15ID;
}
if(isset($data->ProductID)){
$ProductID = $data->ProductID;
$ProductID_Arr = $ProductID;
}
if(isset($data->prmObjectiveID)){
$prmObjectiveID = $data->prmObjectiveID;
}
if(isset($data->prmStructure)){
$prmStructure = $data->prmStructure;
}
if(isset($data->prmParentStructureID)){
$prmParentStructureID = $data->prmParentStructureID;
}
if(isset($data->prmTypeID)){
$prmTypeID = $data->prmTypeID;
}
if(isset($data->prmTypeParent)){
$prmTypeParent = $data->prmTypeParent;
}
if(isset($data->prmUnitID)){
$prmUnitID = $data->prmUnitID;
}
if(isset($data->prmBudgetOwnerID)){
$prmBudgetOwnerID = $data->prmBudgetOwnerID;
}
if(isset($data->prmCode)){
$prmCode = $data->prmCode;
}
if(isset($data->prmDesc)){
$prmDesc = $data->prmDesc;
}
if(isset($data->prmStartDate)){
$prmStartDate = $data->prmStartDate;
}
if(isset($data->prmEndDate)){
$prmEndDate = $data->prmEndDate;
}
if(isset($data->prmProductType)){
$prmProductType = $data->prmProductType;
}
if(isset($data->prmProductValue)){
$prmProductValue = $data->prmProductValue;
}
if(isset($data->prmVolReq)){
$prmVolReq = $data->prmVolReq;
}
if(isset($data->prmSelloutRebate)){
$prmSelloutRebate = $data->prmSelloutRebate;
}
if(isset($data->prmCusPoints)){
$prmCusPoints = $data->prmCusPoints;
}
if(isset($data->prmPreQty)){
$prmPreQty = $data->prmPreQty;
}
if(isset($data->prmSelloutRebateL)){
$prmSelloutRebateL = $data->prmSelloutRebateL;
}
if(isset($data->prmMailCost)){
$prmMailCost = $data->prmMailCost;
}
if(isset($data->prmMaterialCost)){
$prmMaterialCost = $data->prmMaterialCost;
}
if(isset($data->prmPremiumCost)){
$prmPremiumCost = $data->prmPremiumCost;
}
if(isset($data->prmPremiumQty)){
$prmPremiumQty = $data->prmPremiumQty;
}

if(isset($data->prmDisplayFee)){
$prmDisplayFee = $data->prmDisplayFee;
}
if(isset($data->prmDisplayNumber)){
$prmDisplayNumber = $data->prmDisplayNumber;
}
if(isset($data->prmPOSMaterialcost)){
$prmPOSMaterialcost = $data->prmPOSMaterialcost;
}
if(isset($data->prmNumberofFreeCTN)){
$prmNumberofFreeCTN = $data->prmNumberofFreeCTN;
}
if(isset($data->prmFreegoodsamount)){
$prmFreegoodsamount = $data->prmFreegoodsamount;
}
if(isset($data->prmFreegoodsunit)){
$prmFreegoodsunit = $data->prmFreegoodsunit;
}
if(isset($data->prdVolumesType)){
$prdVolumesType = $data->prdVolumesType;
}
if(isset($data->prmBaselineF)){
$prmBaselineF = $data->prmBaselineF;
}
if(isset($data->promoID)){
$promotionID = $data->promoID;
}

$prmActivity1="";
$prmAcitivity2="";
$prmSupport="";
$prmInvoice="";
$prmStatusID="";
$prmCostCenterID="";
$prmInitiationID="";
$total_rows = 0;

$submitDate = date('Y-m-d');

$startDate = new DateTime($prmStartDate);
$prmStartDate = $startDate->format('Y-m-d');

$endDate = new DateTime($prmEndDate);
$prmEndDate = $endDate->format('Y-m-d');


if($channel=="allchannel"){ $channel = 1;}else{$channel = 0;}
if($subchannel=="allchannel"){ $subchannel = 1;}else{$subchannel = 0;}
if($region=="allchannel"){ $region = 1;}else{$region = 0;}
if($customer=="allchannel"){ $customer = 1;}else{$customer = 0;}
if($outlettype=="allchannel"){ $outlettype = 1;}else{$outlettype = 0;}
if($seccustomer=="allchannel"){ $seccustomer = 1;}else{$seccustomer = 0;}



$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("promotool",$con);


if(isset($promotionID) && $promotionID!="" ){
$query_dt = "SELECT promotionID FROM tblPromotion WHERE promotionID = ".$promotionID.""; 
$result_dt = mysql_query($query_dt); 
$total_rows = mysql_num_rows($result_dt); 
}
//echo $total_rows;
if($total_rows==0){

$query = "INSERT INTO tblPromotion VALUES ('','','".$prmCode."','".$prmDesc."','".$prmTypeID."','".$prmStructure."','".$prmParentStructureID."','".$prmObjectiveID."','".$prmActivity1."','".$prmAcitivity2."','".$prmSupport."','".$prmInvoice."','".$prmStatusID."','".$prmUnitID."','".$prmBudgetOwnerID."','".$prmCostCenterID."','1','".$prmInitiationID."','".$prmStartDate."','".$prmEndDate."','','','','".$prdVolumesType."','','','".$submitDate."','')";	
$result = mysql_query($query,$con);
$promoID = mysql_insert_id();


if(isset($cusGroup1ID_Arr) && $cusGroup1ID_Arr!="" && $channel==0 ){
for($ch=0;$ch<count($cusGroup1ID_Arr);++$ch){
$selChannel = $cusGroup1ID_Arr[$ch];
$queryChannel = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','0','0','0','0','0','0','0','0','0','0','".$selChannel."','','','','','','','','','','','')";
//echo $queryChannel; exit;
$result = mysql_query($queryChannel,$con);
}}else{
$queryChannel = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','".$channel."','0','0','0','0','0','0','0','0','0','','','','','','','','','','','','')";
//echo $queryChannel; exit;
$result = mysql_query($queryChannel,$con);
}
if(isset($cusGroup5ID_Arr) && $cusGroup5ID_Arr!="" && $subchannel==0 ){
for($sb=0;$sb<count($cusGroup5ID_Arr);++$sb){
$selSubchannel = $cusGroup5ID_Arr[$sb];
$querySubChannel = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','0','0','0','0','0','0','0','0','0','0','','','','','".$selSubchannel."','','','','','','','')";
//echo $querySubChannel;
$result = mysql_query($querySubChannel,$con);
}}else{
$querySubChannel = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','0','0','0','0','".$subchannel."','0','0','0','0','0','','','','','','','','','','','','')";
//echo $querySubChannel;
$result = mysql_query($querySubChannel,$con);
}

if(isset($cusGroup6ID_Arr) && $cusGroup6ID_Arr!="" && $region==0 ){
for($r=0;$r<count($cusGroup6ID_Arr);++$r){
$selRegion = $cusGroup6ID_Arr[$r];
$queryRegion = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','0','0','0','0','0','0','0','0','0','0','','','','','','".$selRegion."','','','','','','')";
//echo $queryRegion;
$result = mysql_query($queryRegion,$con);
}}else{
$queryRegion = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','0','0','0','0','0','".$region."','0','0','0','0','','','','','','".$region."','','','','','','')";
//echo $queryRegion;
$result = mysql_query($queryRegion,$con);
}
if(isset($customerID_Arr) && $customerID_Arr!="" && $customer==0 ){
for($c=0;$c<count($customerID_Arr);++$c){
$selCustomer = $customerID_Arr[$c];
$queryCustomer = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','','','','','','','','','','','','','','','','','','".$selCustomer."','','','','')";
//echo $queryCustomer;
$result = mysql_query($queryCustomer,$con);
}}else{
$queryCustomer = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','','','','','','','','','','','','','','','','','','".$customer."','','','','')";
//echo $queryCustomer;
$result = mysql_query($queryCustomer,$con);
}

for($j=0;$j<count($ProductID_Arr);++$j){
$selProduct = $ProductID_Arr[$j];
$query3 = "INSERT INTO tblPromotionProductSelection VALUES ('','".$promoID."','','','','".$prdGroup4ID."','','','".$prdGroup7ID."','','".$prdGroup9ID."','','','','','".$prdGroup14ID."','".$prdGroup15ID."','','','','".$selProduct."')";	
$result = mysql_query($query3,$con);
}
If(trim($prmTypeParent) == 'Discounts'){ 
$query4 = "INSERT INTO tblPromotionDetails VALUES ('','".$promoID."','".$prmTypeID."','".$prmProductType."','".$prmProductValue."','','','','','','','','','".$prmVolReq."','','','','".$prmCusPoints."','".$prmPreQty."','".$prmPremiumCost."','".$prmPremiumQty."','','','','','','','','','','','','','','".$prmSelloutRebate."','','".$prmSelloutRebateL."','','','".$prmMailCost."','".$prmMaterialCost."')";	
$result = mysql_query($query4,$con);
}
If(trim($prmTypeParent) == 'Freegoods'){ 
$query4 = "INSERT INTO tblPromotionDetails VALUES ('','".$promoID."','".$prmTypeID."','','','','','','','','','','','".$prmVolReq."','','','','','','','','','','','','".$prmFreegoodsamount."','".$prmFreegoodsunit."','','','','','','','','','','','','','".$prmMailCost."','".$prmPOSMaterialcost."')";	
$result = mysql_query($query4,$con);
}
echo $promoID;
}else{
if(isset($promotionID) && isset($prmTypeID)){
$query_ct = "SELECT promotionID,PromotionTypeID FROM tblPromotion WHERE promotionID = ".$promotionID." and PromotionTypeID = ".$prmTypeID.""; 
//echo $query_ct;
$result_ct = mysql_query($query_ct); 
$rows_ct = mysql_num_rows($result_ct); 
//echo $rows_ct;
if($rows_ct==0){
$query_dr = "DELETE FROM tblPromotionDetails WHERE promotionID = ".$promotionID." ";	
//echo $query_dr;
$result = mysql_query($query_dr,$con);
}
}
$query4 = "INSERT INTO tblPromotionDetails VALUES ('','".$promotionID."','".$prmTypeID."','".$prmProductType."','".$prmProductValue."','','','','','','','','','".$prmVolReq."','','','','".$prmCusPoints."','".$prmPreQty."','".$prmPremiumCost."','".$prmPremiumQty."','','','','','','','','','','','','','','".$prmSelloutRebate."','','".$prmSelloutRebateL."','','','".$prmMailCost."','".$prmMaterialCost."')";	
$result = mysql_query($query4,$con);
$query_Up = "UPDATE tblPromotionDetails SET detRebateLumpsum = '".$prmSelloutRebateL."', detMailcost = '".$prmMailCost."', detPOSMaterialcost = '".$prmMaterialCost."', detPremiumcost = '".$prmPremiumCost."', detPremiumquantity = '".$prmPremiumQty."'   WHERE 	PromotionID= '".$promotionID."'";
$result = mysql_query($query_Up,$con);
echo $promotionID;
}


?>
