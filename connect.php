<?php
$con = mysql_connect('localhost', 'root', 'Lexi@1967');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }else{
  echo"test";
  }
$db_selected = mysql_select_db("promotool",$con);

?>