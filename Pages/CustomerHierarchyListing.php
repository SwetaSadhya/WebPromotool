<?php
include_once("../Controller/CustomerHierarchyCtrl.php");
$controller = new CustomerHierarchyController();
$cGroup1ID = "";
$cGroup5ID = "";
$cGroup6ID = "";
$data = file_get_contents("php://input");
$request = json_decode($data);
if(isset($request->data1) )
{
$cGroup1ID = $request->data1;
}
if(isset($request->data2)){
$cGroup5ID = $request->data2;
}
if(isset($request->data3)){
$cGroup6ID = $request->data3;
}
$controller->customerHierarchyGroup1($cGroup1ID,$cGroup5ID,$cGroup6ID);
?>