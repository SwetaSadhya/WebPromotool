<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("promotool",$con);

$query = "SELECT * FROM tblBuildingBlock";
	//echo $query;
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
	echo "sdfsdf".$row['detPremiumMechanic'];
	$arr = array('promotiontypeID' => $row['promotiontypeID'], 'detVolumeReq' => $row['detVolumeReq'] , 'detTradediscount' => $row['detTradediscount'] , 'detCustomerpoints' => $row['detCustomerpoints'] , 'detRebate' => $row['detRebate'] , 'detRebateLumpsum' => $row['detRebateLumpsum'] , 'detRebatepercentage' => $row['detRebatepercentage'] , 'detDisplayfee' => $row['detDisplayfee'] , 'detDisplayNumber' => $row['detDisplayNumber'] , 'detNumberofFreeCTNs' => $row['detNumberofFreeCTNs'] , 'detPremiumMechanic' => $row['detPremiumMechanic'] , 'detPremiumquantity' => $row['detPremiumquantity'] , 'detPremiumcost' => $row['detPremiumcost'] , 'detMailcost' => $row['detMailcost'] , 'detPOSMaterialcost' => $row['detPOSMaterialcost']);
	$jsn = json_encode($arr);
    print_r($jsn);
	}

?>

