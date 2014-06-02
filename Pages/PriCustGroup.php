<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("promotool",$con);

$arr = array();
$arr2 = array();

	$query = "SELECT * FROM tblPrimaryCustGroup WHERE GroupSelection = '1' ";
	//echo $query;
	$result = mysql_query($query);
	$x=0;
	while($row = mysql_fetch_array($result)){
	//echo $row['prdGroup6ID']."++".$prmUnit;
	$data[$x]['countryID'] = $row['countryID'];
	$data[$x]['Group'] = $row['Group'];
	$data[$x]['GroupName'] = $row['GroupName'];
	//$arr = array('countryID' => $row['countryID'],'Group' => $row['Group'],'GroupName' => $row['GroupName']);
	$x++;
	}
	$json_data = json_encode($data);
	print_r($json_data);
	
?>

