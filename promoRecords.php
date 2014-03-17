<?php
include_once("promo_class.php");
$con = new mysqli('localhost', 'root', '', 'tbl_promotool');
$data = array();
$arr1 = array();
$arr2 = array();
//select records
$query = "SELECT pro.promotionID, pro.prmPromotionName, pro.promotionTypeID FROM tblPromotion pro"; 
//echo $query;   
$result = $con->query($query); 
//fetch records and push to assoicative array
while($row = $result->fetch_object()){

	$arr1[] = $row->promotionID;
	$arr2[] = $row->prmPromotionName;
	
	$query2 = "SELECT c.cusCustomerName,c.cusCustomerClientCode FROM tblCustomer c INNER JOIN tblPromotionCustomerSelection cus ON cus.customerID = c.cusID where cus.promotionID =".$row->promotionID;
	$result2 = $con->query($query2); 
	while($row2 = $result2->fetch_object()){
	$arr3[]     = $row2->cusCustomerClientCode;
	$arr4[]    = $row2->cusCustomerName;
	}
	$query3 = "SELECT g1.cusGroup1Desc FROM tblCusGroup1 g1 INNER JOIN tblPromotionCustomerSelection cus ON cus.cusGroup1ID = g1.cusGroup1ID where cus.promotionID =".$row->promotionID;
	$result3 = $con->query($query3); 
	while($row3 = $result3->fetch_object()){
	$arr5[]  = $row3->cusGroup1Desc;
	}
	$query4 = "SELECT g6.cusGroup6Desc FROM tblCusGroup6 g6 INNER JOIN tblPromotionCustomerSelection cus ON cus.cusGroup6ID = g6.cusGroup6ID where cus.promotionID =".$row->promotionID;
	$result4 = $con->query($query4);
	while($row4 = $result4->fetch_object()){
	$arr6[]    = $row4->cusGroup6Desc;
	}
	$promo1[]	=	new Model_Promo($row->promotionID,$row->prmPromotionName,implode(",",$arr4),implode(",",$arr3),implode(",",$arr5),implode(",",$arr6));
}


 $json_data = json_encode($promo1);
 print_r($json_data);

 
 
 //----------------------Testing-------------------------------//
     // $data[$x]['promotionID']         = $row->promotionID;   
    // $data[$x]['prmPromotionName'] = $row->prmPromotionName;
    // $data[$x]['promotionTypeID']     = $row->promotionTypeID;
	// $data[$x]['customerID']    		 = $row->customerID;
	// $data[$x]['cusCustomerClientCode']   = $row->cusCustomerClientCode;
	// $data[$x]['cusCustomerName']     = $row->cusCustomerName;
	 //$arr1 = $row->cusCustomerClientCode.",";
	 //$arr2 = $row->cusCustomerName.",";
	// $query2 = "SELECT cusCustomerName,cusCustomerClientCode FROM tblCustomer where cusID = ".$row->customerID." ";
	// $result2 = $con->query($query2); 
	// while($row2 = $result2->fetch_object()){
	// $arr1[]     = $row2->cusCustomerClientCode;
	// $arr2[]    = $row2->cusCustomerName;
	 // //$data[$x]['cusCustomerClientCode']   = $row->cusCustomerClientCode;
	 // //$data[$x]['cusCustomerName']     = $row->cusCustomerName;
	// }
	// $query3 = "SELECT cusGroup1Desc FROM tblCusGroup1 where cusGroup1ID = ".$row->cusGroup1ID." ";
	// $result3 = $con->query($query3); 
	// while($row3 = $result3->fetch_object()){
	// $data[$x]['cusGroup1Desc']     = $row3->cusGroup1Desc;
	// }
	// $query4 = "SELECT cusGroup6Desc FROM tblCusGroup6 where cusGroup6ID  = ".$row->cusGroup6ID." ";
	// $result4 = $con->query($query4);
	// while($row4 = $result4->fetch_object()){
	// $data[$x]['cusGroup6Desc']     = $row4->cusGroup6Desc;
	// }

 ?>			
			
