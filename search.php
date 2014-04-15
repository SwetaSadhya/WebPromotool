<?php
$con = new mysqli('localhost', 'root', 'Lexi@1967', 'promotool');
 
//select records
$query = "SELECT * FROM promo_custmaster";
            
//execute query     
$result = $con->query($query);
$data = array();
 
//fetch records and push to assoicative array
$x=0;
while($row = $result->fetch_object()){
    $data[$x]['custID']         = $row->custID;   
    $data[$x]['custCountryID'] = $row->custCountryID;
    $data[$x]['custCode']     = $row->custCode;
    $data[$x]['custName']    = $row->custName; 
    $x++;
}
//convert php array to json
$json_data = json_encode($data);
 
// output json data to screen, uncomment to display on screen
/* header('Content-type: application/json');
echo json_encode($json_data); */
 
// output json data to file
file_put_contents('customer.json', $json_data);
header( 'Location: http://localhost/website/show.php' ) ;
 ?>			
			
