<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("promotool",$con);

$arr = array();
$arr2 = array();

	$query = "SELECT * FROM tblCusSelTab WHERE 	countryID = '102' AND cstOrder <>0 Order By cstOrder ";
	//echo $query;
	$result = mysql_query($query);
	$x=0;
	while($row = mysql_fetch_array($result)){
	//echo $row['prdGroup6ID']."++".$prmUnit;
	$data[$x]['countryID'] = $row['countryID'];
	$data[$x]['cstFieldName'] = $row['cstFieldName'];
	$data[$x]['cstFieldID'] = $row['cstFieldID'];
	$data[$x]['cstCustGroupClientName'] = $row['cstCustGroupClientName'];
	//$arr = array('countryID' => $row['countryID'],'Group' => $row['Group'],'GroupName' => $row['GroupName']);
	$x++;
	}
	$json_data = json_encode($data);
	print_r($json_data);
	
?>

