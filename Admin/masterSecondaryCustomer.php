<?php
ini_set('max_execution_time', 3000); //300 seconds = 5 minutes
//--------------------------------bsic configration---------------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/promo/WebPromotool/Admin/Library/init.inc.php');
//---------------------------------------Master Table----------------------------------------------------------
$_MasterQuery = "SELECT t. * ,  g1.secGroup1ID ,g1.secGroup1ClientID,g1.secGroup1Desc, g2.secGroup2ID,  g2.secGroup2ClientID,g2.secGroup2Desc                                                                                                                      
FROM ".SECCUST_TEMP_TABLE." AS t
INNER JOIN ".SECCUST_G1_TABLE." g1 ON g1.secGroup1ID = t.secGroup1ID
AND g1.countryID = t.countryID
INNER JOIN ".SECCUST_G2_TABLE." g2 ON g2.secGroup2ID = t.secGroup2ID
AND g2.countryID = t.countryID
GROUP BY t.secondaryCustomerID";
//echo $_MasterQuery;
			$tbl_M = new Model;
            $res = $tbl_M->find_query_all($_MasterQuery );
			if(count($res)>0)
			{
			foreach($res as $row)
				{
					$custMasterQuery='INSERT INTO '.SECCUST_MASTER_TABLE.'(secondaryCustomerID, countryID, 	secCustomerClientID, secCustomerName, secSecondaryCustomerClientName, customerID, 	cusCustomerClientCode, secCustomerClientCode, secGroup1ID, secGroup2ID, secGroup3ID, isActive)VALUES
					("'.$row->secondaryCustomerID.'", "'.$row->countryID.'","'.$row->secCustomerClientID.'","'.$row->secCustomerName.'","'.$row->secSecondaryCustomerClientName.'","'.$row->customerID.'","'.$row->cusCustomerClientCode.'","'.$row->secCustomerClientCode.'","'.$row->secGroup1ID.'","'.$row->secGroup2ID.'","","'.$row->isActive.'")';
					//echo $custMasterQuery;
					$tbl_M->query($custMasterQuery);
                }
				echo 'Check Master Customer Table';
            }  

?>