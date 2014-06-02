<?php
$con =  mysqli_connect('localhost', 'root', '', 'promotool');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// ini_set('display_errors',1); 
 // error_reporting(E_ALL); 
 
// //select records
// $query = "SELECT * FROM tblProduct limit 0,450";
            
// //execute query     
// $result = $con->query($query);
// $data = array();
 
// //fetch records and push to assoicative array
// $x=0;
// while($row = $result->fetch_object()){
    // $data[$x]['ProductID']         = $row->ProductID;   
    // $data[$x]['countryID'] = $row->countryID;
    // $data[$x]['prdProductClientCode']     = $row->prdProductClientCode;
    // $data[$x]['ProductName']    = $row->ProductName; 
    // $x++;
// }
// //convert php array to json
// $json_data = json_encode($data);

// echo $json_data;
// echo"<br><br>//////////////////////////";
 
// $query2 = "SELECT * FROM tblCustomer";
            
// //execute query     
// $result2 = $con->query($query2);
// $data2 = array();
 
// //fetch records and push to assoicative array
// $x2=0;
// while($row2 = $result2->fetch_object()){
    // $data2[$x2]['customerID']         = $row2->customerID;   
    // $data2[$x2]['countryID'] = $row2->countryID;
    // $data2[$x2]['cusCustomerClientCode']     = $row2->cusCustomerClientCode;
    // $data2[$x2]['cusCustomerName']    = $row2->cusCustomerName; 
    // $x2++;
// }
// //convert php array to json
// $json_data2 = json_encode($data2);
// echo $json_data2;

$query_ct = "SELECT promotionID,PromotionTypeID FROM tblPromotion "; 
//echo $query_ct;
$result_ct = mysqli_query($con,$query_ct); 
$rows_ct = mysqli_num_rows($result_ct); 
echo $rows_ct."dfsdf";
while($row_ct = mysqli_fetch_array($result_ct)){
 echo $row_ct['PromotionTypeID']."<br/>";
}
 ?>			
			
