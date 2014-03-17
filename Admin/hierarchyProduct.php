<?php
ini_set('max_execution_time', 600); //300 seconds = 5 minutes
//--------------------------------bsic configration---------------------------------
include_once($_SERVER['DOCUMENT_ROOT'].'/promo/Admin/Library/init.inc.php');
//---------------------------------------Master Table----------------------------------------------------------
$_HierQuery = "SELECT c.prdGroup1ID,g1.prdGroup1Desc,c.prdGroup2ID,g2.prdGroup2Desc,c.prdGroup3ID,g3.prdGroup3Desc,c.prdGroup4ID,g4.prdGroup4Desc,c.prdGroup5ID,g5.prdGroup5Desc,c.prdGroup6ID,g6.prdGroup6Desc,c.prdGroup7ID,g7.prdGroup7Desc,c.prdGroup8ID,g8.prdGroup8Desc ,c.prdGroup9ID,g9.prdGroup9Desc ,c.prdGroup10ID,g10.prdGroup10Desc,c.prdGroup11ID,g11.prdGroup11Desc,c.prdGroup12ID,g12.prdGroup12Desc,c.prdGroup13ID,g13.prdGroup13Desc,c.prdGroup14ID,g14.prdGroup14Desc,c.prdGroup15ID,g15.prdGroup15Desc,c.prdGroup16ID,g16.prdGroup16Desc,c.prdGroup17ID,g17.prdGroup17Desc,c.prdGroup18ID,g18.prdGroup18Desc   
FROM ".PRD_MASTER_TABLE."  AS c 
INNER Join ".PRD_G1_TABLE." g1 ON g1.prdGroup1ID = c.prdGroup1ID
INNER Join ".PRD_G2_TABLE." g2 ON g2.prdGroup2ID = c.prdGroup2ID
INNER Join ".PRD_G3_TABLE." g3 ON g3.prdGroup3ID = c.prdGroup3ID
INNER Join ".PRD_G4_TABLE." g4 ON g4.prdGroup4ID = c.prdGroup4ID
INNER Join ".PRD_G5_TABLE." g5 ON g5.prdGroup5ID = c.prdGroup5ID
INNER Join ".PRD_G6_TABLE." g6 ON g6.prdGroup6ID = c.prdGroup6ID
INNER Join ".PRD_G7_TABLE." g7 ON g7.prdGroup7ID = c.prdGroup7ID
INNER Join ".PRD_G8_TABLE." g8 ON g8.prdGroup8ID = c.prdGroup8ID
INNER Join ".PRD_G9_TABLE." g9 ON g9.prdGroup9ID = c.prdGroup9ID
INNER Join ".PRD_G10_TABLE." g10 ON g10.prdGroup10ID = c.prdGroup10ID
INNER Join ".PRD_G11_TABLE." g11 ON g11.prdGroup11ID = c.prdGroup11ID
INNER Join ".PRD_G12_TABLE." g12 ON g12.prdGroup12ID = c.prdGroup12ID
INNER Join ".PRD_G13_TABLE." g13 ON g13.prdGroup13ID = c.prdGroup13ID
INNER Join ".PRD_G14_TABLE." g14 ON g14.prdGroup14ID = c.prdGroup14ID
INNER Join ".PRD_G15_TABLE." g15 ON g15.prdGroup15ID = c.prdGroup15ID
INNER Join ".PRD_G16_TABLE." g16 ON g16.prdGroup16ID = c.prdGroup16ID
INNER Join ".PRD_G17_TABLE." g17 ON g17.prdGroup17ID = c.prdGroup17ID
INNER Join ".PRD_G18_TABLE." g18 ON g18.prdGroup18ID = c.prdGroup18ID
GROUP BY prdGroup1ID,prdGroup4ID,prdGroup5ID,prdGroup6ID,prdGroup7ID,prdGroup8ID,prdGroup9ID,prdGroup10ID,prdGroup11ID,prdGroup12ID,prdGroup13ID,prdGroup14ID,prdGroup15ID,prdGroup16ID,prdGroup17ID,prdGroup18ID";
//echo $_HierQuery;
			$tbl_H = new Model;
            $res = $tbl_H->find_query_all($_HierQuery );
			if(count($res)>0)
			{
			foreach($res as $row)
				{
					$prdHierQuery='INSERT INTO '.PRD_Hierarchy_TABLE.'(productHierarchyID, prdGroup1ID, prdGroup2ID, prdGroup3ID, 	prdGroup4ID, prdGroup5ID, prdGroup6ID, prdGroup7ID, prdGroup8ID, prdGroup9ID, prdGroup10ID,prdGroup11ID,prdGroup12ID,prdGroup13ID,prdGroup14ID,prdGroup15ID,prdGroup16ID,prdGroup17ID,prdGroup18ID,isActive)VALUES
					("", "'.$row->prdGroup1ID.'","'.$row->prdGroup2ID.'","'.$row->prdGroup3ID.'","'.$row->prdGroup4ID.'","'.$row->prdGroup5ID.'","'.$row->prdGroup6ID.'","'.$row->prdGroup7ID.'","'.$row->prdGroup8ID.'","'.$row->prdGroup9ID.'","'.$row->prdGroup10ID.'","'.$row->prdGroup11ID.'","'.$row->prdGroup12ID.'","'.$row->prdGroup13ID.'","'.$row->prdGroup14ID.'","'.$row->prdGroup15ID.'","'.$row->prdGroup16ID.'","'.$row->prdGroup17ID.'","'.$row->prdGroup18ID.'","1")';
					//echo $prdHierQuery;
					$tbl_H->query($prdHierQuery);
                }
				echo 'Check Master Product Hierarchy Table';
            }  

?>