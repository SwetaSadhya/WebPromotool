<?php
ini_set('max_execution_time', 600); //300 seconds = 5 minutes
//--------------------------------bsic configration---------------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/promo/WebPromotool/Admin/Library/init.inc.php');
//---------------------------------------Master Table----------------------------------------------------------
$_HierQuery = "SELECT c.cusGroup1ID,g1.cusGroup1Desc,c.cusGroup4ID,g4.cusGroup4Desc,c.cusGroup5ID,g5.cusGroup5Desc,c.cusGroup6ID,g6.cusGroup6Desc,c.cusGroup7ID,g7.cusGroup7Desc 
FROM ".CUST_MASTER_TABLE."  AS c 
INNER Join ".CUST_G1_TABLE." g1 ON g1.cusGroup1ID = c.cusGroup1ID
INNER Join ".CUST_G4_TABLE." g4 ON g4.cusGroup4ID = c.cusGroup4ID
INNER Join ".CUST_G5_TABLE." g5 ON g5.cusGroup5ID = c.cusGroup5ID
INNER Join ".CUST_G6_TABLE." g6 ON g6.cusGroup6ID = c.cusGroup6ID
INNER Join ".CUST_G7_TABLE." g7 ON g7.cusGroup7ID = c.cusGroup7ID
GROUP BY cusGroup1ID,cusGroup4ID,cusGroup5ID,cusGroup6ID,cusGroup7ID";
echo $_HierQuery;
			$tbl_H = new Model;
            $res = $tbl_H->find_query_all($_HierQuery );
			if(count($res)>0)
			{
			foreach($res as $row)
				{
					$custHierQuery='INSERT INTO '.CUST_Hierarchy_TABLE.'(customerHierarchyID, cusGroup1ID, cusGroup2ID, cusGroup3ID, cusGroup4ID, cusGroup5ID, cusGroup6ID, cusGroup7ID, secGroup1ID, secGroup2ID, secGroup3ID, isActive)VALUES
					("", "'.$row->cusGroup1ID.'","","","'.$row->cusGroup4ID.'","'.$row->cusGroup5ID.'","'.$row->cusGroup6ID.'","'.$row->cusGroup7ID.'","","","","1")';
					//echo $custMasterQuery;
					$tbl_H->query($custHierQuery);
                }
				echo 'Check Hierarchy Customer Table';
            }  

?>