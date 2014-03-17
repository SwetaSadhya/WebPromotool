<?php

// db.inc.php
// connect to databse 


//-------- for Local Server-----------//
$sLocalHost=LOCALRHOST;
$sServerHost=SERVERHOST;
$sLocalUser = LOCALUSER;
$sLocalPassword = LOCALPASSWORD;
$sServerUser = SERVERUSER;
$sServerPassword = SERVERPASSWORD;
$sServerDatabaseName = SERVERDATABASE;
$sLocalDatabaseName = LOCALDATABASE;

$conn = @mysql_connect($sServerHost,$sServerUser,$sServerPassword);
if(!$conn) {
$conn = mysql_connect($sLocalHost,$sLocalUser,$sLocalPassword);
}
$con=  mysql_connect("localhost","root"); //On Local Server
$db=mysql_select_db($sServerDatabaseName);
if(!$db){
$db=mysql_select_db($sLocalDatabaseName);
}
//----------------------------------------//

 if($conn=="")
 {
	  trigger_error('Unable to connect to database: ' . mysql_error());
 }



?>
