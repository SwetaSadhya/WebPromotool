<?php
ini_set('max_execution_time', 600); //300 seconds = 5 minutes
//--------------------------------bsic configration---------------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/promo/Admin/Library/init.inc.php');
//---------------------------------------Master Table----------------------------------------------------------
$_MasterQuery = "SELECT t. * ,  g1.cusGroup1ID AS g1ID, g4.cusGroup4ID AS g4ID,  g5.cusGroup5ID AS g5ID,  g6.cusGroup6ID AS g6ID,  g7.cusGroup7ID AS g7ID
FROM ".CUST_TEMP_TABLE." AS t
LEFT JOIN ".CUST_G1_TABLE." g1 ON g1.cusGroup1ClientID = t.cusGroup1ClientID
AND g1.countryID = t.countryID
LEFT JOIN ".CUST_G4_TABLE." g4 ON g4.cusGroup4ClientID = t.cusGroup4ClientID
AND g4.countryID = t.countryID
LEFT JOIN ".CUST_G5_TABLE." g5 ON g5.cusGroup5ClientID = t.cusGroup5ClientID
AND g5.countryID = t.countryID
LEFT JOIN ".CUST_G6_TABLE." g6 ON g6.cusGroup6ClientID = t.cusGroup6ClientID
AND g6.countryID = t.countryID
LEFT JOIN ".CUST_G7_TABLE." g7 ON g7.cusGroup7ClientID = t.cusGroup7ClientID
AND g7.countryID = t.countryID
GROUP BY t.cusID";
echo $_MasterQuery;
			$tbl_M = new Model;
            $res = $tbl_M->find_query_all($_MasterQuery );
			if(count($res)>0)
			{
			foreach($res as $row)
				{
					$custMasterQuery='INSERT INTO '.CUST_MASTER_TABLE.'(cusID, customerID, countryID, cusCustomerClientCode, cusCustomerName, cusGroup1ID, cusGroup2ID, cusGroup3ID, cusGroup4ID, cusGroup5ID, cusGroup6ID, cusGroup7ID, isActive)VALUES
					("", "'.$row->customerID.'", "'.$row->countryID.'","'.$row->cusCustomerClientCode.'","'.$row->cusCustomerName.'","'.$row->g1ID.'","","","'.$row->g4ID.'","'.$row->g5ID.'","'.$row->g6ID.'","'.$row->g7ID.'","'.$row->isActive.'")';
					//echo $custMasterQuery;
					//$tbl_M->query($custMasterQuery);
                }
				echo 'Check Master Customer Table';
            }  

?>