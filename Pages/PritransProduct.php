<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("promotool",$con);

$arr = array();
$arr2 = array();

	$query = "SELECT DISTINCT p.ProductID, p.countryID, p.prdProductClientCode, p.ProductName, p.isActive, p.prdParentCode, g4.prdGroup4ID, g4.prdGroup4ClientID, g4.prdGroup4Desc, g7.prdGroup7ID, g7.prdGroup7ClientID, g7.prdGroup7Desc, g9.prdGroup9ID, g9.prdGroup9ClientID, g9.prdGroup9Desc, g14.prdGroup14ID, g14.prdGroup14ClientID, g14.prdGroup14Desc, g15.prdGroup15ID, g15.prdGroup15ClientID, g15.prdGroup15Desc
FROM tblProduct AS p
INNER JOIN tblPrdGroup4 g4 ON g4.prdGroup4ID = p.prdGroup4ID
INNER JOIN tblPrdGroup7 g7 ON g7.prdGroup7ID = p.prdGroup7ID
INNER JOIN tblPrdGroup9 g9 ON g9.prdGroup9ID = p.prdGroup9ID
INNER JOIN tblPrdGroup14 g14 ON g14.prdGroup14ID = p.prdGroup14ID
INNER JOIN tblPrdGroup15 g15 ON g15.prdGroup15ID = p.prdGroup15ID
WHERE isActive =  '1' ";
	//echo $query;
	$result = mysql_query($query);
	$x=0;
	while($row = mysql_fetch_array($result)){
	//echo $row['prdGroup6ID']."++".$prmUnit;
	 $query2="SELECT * FROM  tblPriTrans WHERE ProductID = ".$row['ProductID'];
	 $result2 = mysql_query($query2);
	 $y=0;
	 while($row2 = mysql_fetch_array($result2)){
	$data[$y]['prtDayDate'] = $row2['prtDayDate'];
	$data[$y]['CustomerID'] = $row2['CustomerID'];
	$y++;
	}
	$data[$x]['ProductID'] = $row['ProductID'];
	$data[$x]['prdProductClientCode'] = $row['prdProductClientCode'];
	$data[$x]['ProductName'] = $row['ProductName'];
	$data[$x]['prdGroup7ID'] = $row['prdGroup7ID'];
	$data[$x]['prdGroup7ClientID'] = $row['prdGroup7ClientID'];
	$data[$x]['prdGroup7Desc'] = $row['prdGroup7Desc'];
	$data[$x]['prdGroup9ID'] = $row['prdGroup9ID'];
	$data[$x]['prdGroup9ClientID'] = $row['prdGroup9ClientID'];
	$data[$x]['prdGroup9Desc'] = $row['prdGroup9Desc'];
	$data[$x]['prdGroup4ID'] = $row['prdGroup4ID'];
	$data[$x]['prdGroup4ClientID'] = $row['prdGroup4ClientID'];
	$data[$x]['prdGroup4Desc'] = $row['prdGroup4Desc'];
	$data[$x]['prdGroup14ID'] = $row['prdGroup14ID'];
	$data[$x]['prdGroup14ClientID'] = $row['prdGroup14ClientID'];
	$data[$x]['prdGroup14Desc'] = $row['prdGroup14Desc'];
	$data[$x]['prdGroup15ID'] = $row['prdGroup15ID'];
	$data[$x]['prdGroup15ClientID'] = $row['prdGroup15ClientID'];
	$data[$x]['prdGroup15Desc'] = $row['prdGroup15Desc'];
	$data[$x]['prdParentCode'] = $row['prdParentCode'];
	$x++;
	}
	$jsn = json_encode($data);
    print_r($jsn);
	
?>

