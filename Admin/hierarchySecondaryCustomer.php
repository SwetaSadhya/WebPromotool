<?php
ini_set('max_execution_time', 600); //300 seconds = 5 minutes
//--------------------------------bsic configration---------------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/promo/WebPromotool/Admin/Library/init.inc.php');
//---------------------------------------Master Table----------------------------------------------------------
$_HierQuery = "SELECT s.secGroup1ID,g1.	secGroup1Desc,s.secGroup2ID,g2.secGroup2ClientID 
FROM ".SECCUST_MASTER_TABLE."  AS s 
INNER Join ".SECCUST_G1_TABLE." g1 ON g1.secGroup1ID = s.secGroup1ID
INNER Join ".SECCUST_G2_TABLE." g2 ON g2.secGroup2ID = s.secGroup2ID
GROUP BY secGroup1ID,secGroup2ID";
//echo $_HierQuery;
			$tbl_H = new Model;
            $res = $tbl_H->find_query_all($_HierQuery );
			if(count($res)>0)
			{
			foreach($res as $row)
				{
					$custHierQuery='INSERT INTO '.SECCUST_Hierarchy_TABLE.'(secCustomerHierarchyID, secGroup1ID, secGroup2ID, 	secGroup3ID, isActive)VALUES
					("", "'.$row->secGroup1ID.'","'.$row->secGroup2ID.'","'.$row->secGroup3ID.'","1")';
					echo $custMasterQuery;
					$tbl_H->query($custHierQuery);
                }
				echo 'Check Hierarchy Customer Table';
            }  

?>