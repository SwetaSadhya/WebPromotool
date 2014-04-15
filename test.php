<?php
$data = json_decode(file_get_contents("php://input"));
//$request = json_decode($data);
$SelCusChannel = $data->SelCusChannel;
$SelCusSubChannel = $data->SelCusSubChannel;
$SelCusRegion = $data->SelCusRegion;
$SelCustomer = $data->SelCustomer;
$SelPrdBlock = $data->SelPrdBlock;
$SelPrdGroup = $data->SelPrdGroup;
$SelPrdBrand = $data->SelPrdBrand;
$SelProduct = $data->SelProduct;
$promoObjective = $data->promoObjective;
$promoStructure = $data->promoStructure;
$promoType = $data->promoType;
$promoUnit = $data->promoUnit;
$promoTitle = $data->promoTitle;
print_r($data );
$ArrCus = array();
$ArrSelCusChannel = array();
$ArrSelCusSubChannel = array();
$ArrSelCusRegion = array();
$ArrPrd = array();
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("promotool",$con);

$query = "INSERT INTO tblPromotion VALUES ('','','".$promoTitle."','','".$promoType."','','','".$promoObjective."','','','".$promoUnit."','','','1','','','','','','','','','','','','','')";	
//$result = mysql_query($query,$con);
$promoID = mysql_insert_id();
 
$ArrCus = $SelCustomer;
$comma_Customer = implode(",", array_values($ArrCus));
$ArrSelCusChannel = $SelCusChannel;
$ArrChannel = implode(",",array_values($ArrSelCusChannel));
$ArrSelCusSubChannel = $SelCusSubChannel;
$ArrSubChannel = implode(",",array_values($ArrSelCusSubChannel));
$ArrSelCusRegion = $SelCusRegion;
$ArrRegion = implode(",",array_values($ArrSelCusRegion));
for($ch=0;$ch<count($ArrSelCusChannel);++$ch){
$channel = $ArrSelCusChannel[$ch];
$queryChannel = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','','','','','','','','','','','".$channel."','','','','','','','','','','','','')";
//echo $queryChannel;
$result = mysql_query($queryChannel,$con);
}
for($sb=0;$sb<count($ArrSelCusSubChannel);++$sb){
$subchannel = $ArrSelCusSubChannel[$sb];
$querySubChannel = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','','','','','','','','','','','','','','','".$subchannel."','','','','','','','','')";
//echo $querySubChannel;
//$result = mysql_query($querySubChannel,$con);
}
for($r=0;$r<count($ArrSelCusRegion);++$r){
$region = $ArrSelCusRegion[$r];
$queryRegion = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','','','','','','','','','','','','','','','','".$region."','','','','','','','')";
//echo $queryRegion;
//$result = mysql_query($queryRegion,$con);
}
for($c=0;$c<count($ArrCus);++$c){
$customer = $ArrCus[$c];
$queryCustomer = "INSERT INTO tblPromotionCustomerSelection VALUES ('','".$promoID."','','','','','','','','','','','','','','','','','','".$customer."','','','','','')";
//echo $queryCustomer;
//$result = mysql_query($queryCustomer,$con);
}
$ArrPrd = $SelProduct; 
for($j=0;$j<count($ArrPrd);++$j){
$Product = $ArrPrd[$j];
$query3 = "INSERT INTO tblPromotionProductSelection VALUES ('','".$promoID."','','','','".$SelPrdBrand."','','','".$SelPrdBlock."','','".$SelPrdGroup."','','','','','','','','','','".$Product."')";	
//$result = mysql_query($query3,$con);
}

//echo "Promotion is been Saved";
?>