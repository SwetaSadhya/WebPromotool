<?php
// application global configuration constants.
//------------------------
// intialize environment
session_name("sitename");
session_start();
set_magic_quotes_runtime(0);
//error_reporting(0);
//----------------class files---------------------------
// init.inc.php
// per-request initialization, 
// bring in global functions and support libs
require_once('constant.php');
require_once('app.class.php');
require_once('model.class.php');
//--------------global classes-------------------------
$app= new App;
$db=new Model;
//--------------------------------------------------------------
// strip slashes
if (get_magic_quotes_gpc()) {
  $app->clean_array($_GET);
  $app->clean_array($_POST);
  $app->clean_array($_SERVER);
}
// trim surrounding whitespace on all request parameters
// re-create $_REQUEST with just GET, POST (no cookies)
$_REQUEST = array_merge($_GET, $_POST);

//$app->initialized = true;
?>
