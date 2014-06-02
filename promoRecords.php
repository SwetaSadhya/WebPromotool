<?php
include_once("promo_class.php");
$con = new mysqli('localhost', 'root', '', 'promotool');
$data = array();
$arr1 = array();
$arr2 = array();
//select records
//$query = "SELECT pro.promotionID, pro.prmPromotionName, pro.promotionTypeID FROM tblPromotion pro"; 
$query  = "SELECT 
prm.promotionID, 
prm.prmPromotionName, 
prm.isActive, 
tbl.custName,
tbl.custCode,
tbl.channelDesc
        
FROM 
tblPromotion AS prm

LEFT JOIN (SELECT 
 	prm.promotionID, 
 	IF(COUNT( DISTINCT cst.cusCustomerName)> 1, 'Multiple' , cst.cusCustomerName) AS custName, 
	IF(COUNT( DISTINCT cst.cusCustomerClientCode)> 1, 'Multiple', cst.cusCustomerClientCode) AS custCode, 
	IF(COUNT( DISTINCT cg1.cusGroup1Desc) > 1, 'Multiple', cg1.cusGroup1Desc) AS channelDesc
 FROM
 	tblPromotion AS prm, 
	tblPromotionCustomerSelection AS sel, 
	tblCustomer AS cst, 
	tblCusGroup1 AS cg1
 	

 WHERE 
    prm.promotionID = sel.promotionID AND
    cg1.cusGroup1ID = cst.cusGroup1ID AND
    IF(sel.pslSelAllCusGroup1 = 1, True, cst.cusGroup1ID = sel.cusGroup1ID) AND
    IF(sel.pslSelAllCusGroup2 = 1, True, cst.cusGroup2ID = sel.cusGroup2ID) AND
    IF(sel.pslSelAllCusGroup3 = 1, True, cst.cusGroup3ID = sel.cusGroup3ID) AND
    IF(sel.pslSelAllCusGroup4 = 1, True, cst.cusGroup4ID = sel.cusGroup4ID) AND
    IF(sel.pslSelAllCusGroup5 = 1, True, cst.cusGroup5ID = sel.cusGroup5ID) AND
    IF(sel.pslSelAllCusGroup6 = 1, True, cst.cusGroup6ID = sel.cusGroup6ID)
 GROUP BY 
 	prm.promotionID
) AS tbl ON tbl.promotionID = prm.promotionID

WHERE prm.isActive = '1'

GROUP BY 
prm.promotionID";
//echo $query;   
$result = $con->query($query); 
//fetch records and push to assoicative array
while($row = $result->fetch_object()){

	// $row->promotionID;
	// $row->prmPromotionName;
	
	// $query2 = "SELECT c.cusCustomerName,c.cusCustomerClientCode FROM tblCustomer c INNER JOIN tblPromotionCustomerSelection cus ON cus.customerID = c.cusID where cus.promotionID =".$row->promotionID;
	// $result2 = $con->query($query2); 
	// while($row2 = $result2->fetch_object()){
	// $arr3[]     = $row2->cusCustomerClientCode;
	// $arr4[]    = $row2->cusCustomerName;
	// }
	// $query3 = "SELECT g1.cusGroup1Desc FROM tblCusGroup1 g1 INNER JOIN tblPromotionCustomerSelection cus ON cus.cusGroup1ID = g1.cusGroup1ID where cus.promotionID =".$row->promotionID;
	// $result3 = $con->query($query3); 
	// while($row3 = $result3->fetch_object()){
	// $arr5[]  = $row3->cusGroup1Desc;
	// }
	// $query4 = "SELECT g6.cusGroup6Desc FROM tblCusGroup6 g6 INNER JOIN tblPromotionCustomerSelection cus ON cus.cusGroup6ID = g6.cusGroup6ID where cus.promotionID =".$row->promotionID;
	// $result4 = $con->query($query4);
	// while($row4 = $result4->fetch_object()){
	// $arr6[]    = $row4->cusGroup6Desc;
	// }
	
	$promo1[]	=	new Model_Promo($row->promotionID,$row->prmPromotionName,$row->custName,$row->custCode ,$row->channelDesc);
}


 $json_data = json_encode($promo1);
 print_r($json_data);

 


 ?>			
			
