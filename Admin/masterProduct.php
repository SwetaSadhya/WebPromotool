<?php
ini_set('max_execution_time', 600); //300 seconds = 5 minutes
//--------------------------------bsic configration---------------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/promo/WebPromotool/Admin/Library/init.inc.php');
//---------------------------------------Master Table----------------------------------------------------------
$_MasterQuery = "SELECT t.* ,  g1.prdGroup1ID AS g1ID, g2.prdGroup2ID AS g2ID, g3.prdGroup3ID AS g3ID, g4.prdGroup4ID AS g4ID, g5.prdGroup5ID AS g5ID, g6.prdGroup6ID AS g6ID, g7.prdGroup7ID AS g7ID, g8.prdGroup8ID AS g8ID, g9.prdGroup9ID AS g9ID, g10.prdGroup10ID AS g10ID, g11.prdGroup11ID AS g11ID, g12.prdGroup12ID AS g12ID, g13.prdGroup13ID AS g13ID, g14.prdGroup14ID AS g14ID, g15.prdGroup15ID AS g15ID, g16.prdGroup16ID AS g16ID, g17.prdGroup17ID AS g17ID, g18.prdGroup18ID AS g18ID, g19.prdGroup19ID AS g19ID, g20.prdGroup20ID AS g20ID, g21.prdGroup21ID AS g21ID
FROM ".PRD_TEMP_TABLE." AS t
LEFT JOIN ".PRD_G1_TABLE." g1 ON g1.prdGroup1ClientID = t.prdGroup1ClientID
AND g1.countryID = t.countryID
LEFT JOIN ".PRD_G2_TABLE." g2 ON g2.prdGroup2ClientID = t.prdGroup2ClientID
AND g2.countryID = t.countryID
LEFT JOIN ".PRD_G3_TABLE." g3 ON g3.prdGroup3ClientID = t.prdGroup3ClientID
AND g3.countryID = t.countryID
LEFT JOIN ".PRD_G4_TABLE." g4 ON g4.prdGroup4ClientID = t.prdGroup4ClientID
AND g4.countryID = t.countryID
LEFT JOIN ".PRD_G5_TABLE." g5 ON g5.prdGroup5ClientID = t.prdGroup5ClientID
AND g5.countryID = t.countryID
LEFT JOIN ".PRD_G6_TABLE." g6 ON g6.prdGroup6ClientID = t.prdGroup6ClientID
AND g6.countryID = t.countryID
LEFT JOIN ".PRD_G7_TABLE." g7 ON g7.prdGroup7ClientID = t.prdGroup7ClientID
AND g7.countryID = t.countryID
LEFT JOIN ".PRD_G8_TABLE." g8 ON g8.prdGroup8ClientID = t.prdGroup8ClientID
AND g8.countryID = t.countryID
LEFT JOIN ".PRD_G9_TABLE." g9 ON g9.prdGroup9ClientID = t.prdGroup9ClientID
AND g9.countryID = t.countryID
LEFT JOIN ".PRD_G10_TABLE." g10 ON g10.prdGroup10ClientID = t.prdGroup10ClientID
AND g10.countryID = t.countryID
LEFT JOIN ".PRD_G11_TABLE." g11 ON g11.prdGroup11ClientID = t.prdGroup11ClientID
AND g11.countryID = t.countryID
LEFT JOIN ".PRD_G12_TABLE." g12 ON g12.prdGroup12ClientID = t.prdGroup12ClientID
AND g12.countryID = t.countryID
LEFT JOIN ".PRD_G13_TABLE." g13 ON g13.prdGroup13ClientID = t.prdGroup13ClientID
AND g13.countryID = t.countryID
LEFT JOIN ".PRD_G14_TABLE." g14 ON g14.prdGroup14ClientID = t.prdGroup14ClientID
AND g14.countryID = t.countryID
LEFT JOIN ".PRD_G15_TABLE." g15 ON g15.prdGroup15ClientID = t.prdGroup15ClientID
AND g15.countryID = t.countryID
LEFT JOIN ".PRD_G16_TABLE." g16 ON g16.prdGroup16ClientID = t.prdGroup16ClientID
AND g16.countryID = t.countryID
LEFT JOIN ".PRD_G17_TABLE." g17 ON g17.prdGroup17ClientID = t.prdGroup17ClientID
AND g17.countryID = t.countryID
LEFT JOIN ".PRD_G18_TABLE." g18 ON g18.prdGroup18ClientID = t.prdGroup18ClientID
AND g18.countryID = t.countryID
LEFT JOIN ".PRD_G19_TABLE." g19 ON g19.prdGroup19ClientID = t.prdGroup19ClientID
AND g19.countryID = t.countryID
LEFT JOIN ".PRD_G20_TABLE." g20 ON g20.prdGroup20ClientID = t.prdGroup20ClientID
AND g20.countryID = t.countryID
LEFT JOIN ".PRD_G21_TABLE." g21 ON g21.prdGroup21ClientID = t.prdGroup21ClientID
AND g21.countryID = t.countryID
GROUP BY t.ProductID";
//echo $_MasterQuery;
			$tbl_M = new Model;
            $res = $tbl_M->find_query_all($_MasterQuery );
			if(count($res)>0)
			{
			foreach($res as $row)
				{
					$prdMasterQuery='INSERT INTO '.PRD_MASTER_TABLE.'(ProductID, countryID,prdProductClientCode,ProductName,prdCreatedOn,prdGSTGroup,prdGroup1ID,prdGroup2ID,prdGroup3ID,prdGroup4ID,prdGroup5ID,prdGroup6ID,prdGroup7ID,prdGroup8ID,prdGroup9ID,prdGroup10ID,prdGroup11ID,prdGroup12ID,prdGroup13ID,prdGroup14ID,prdGroup15ID,prdGroup16ID,prdGroup17ID,prdGroup18ID,prdGroup19ID,prdGroup20ID,prdGroup21ID,prdNetWeight,prdNetVolume,prdGST,prdParentCode,prdParentCodeValidFrom,	prdParentCodeValidTo,importLogID,isActive)VALUES
					("'.$row->ProductID.'","'.$row->countryID.'","'.$row->prdProductClientCode.'","'.$row->ProductName.'","'.$row->prdCreatedOn.'","'.$row->prdGSTGroup.'","'.$row->g1ID.'","'.$row->g2ID.'","'.$row->g3ID.'","'.$row->g4ID.'","'.$row->g5ID.'","'.$row->g6ID.'","'.$row->g7ID.'","'.$row->g8ID.'","'.$row->g9ID.'","'.$row->g10ID.'","'.$row->g11ID.'","'.$row->g12ID.'","'.$row->g13ID.'","'.$row->g14ID.'","'.$row->g15ID.'","'.$row->g16ID.'","'.$row->g17ID.'","'.$row->g18ID.'","'.$row->g19ID.'","'.$row->g20ID.'","'.$row->g21ID.'","'.$row->prdNetWeight.'","'.$row->prdNetVolume.'","'.$row->prdGST.'","'.$row->prdParentCode.'","'.$row->prdParentCodeValidFrom.'","'.$row->prdParentCodeValidTo.'","'.$row->importLogID.'","'.$row->isActive.'")';
					//echo $prdMasterQuery;
					$tbl_M->query($prdMasterQuery);
                }
				echo 'Check Master Product Table';
            }  

?>