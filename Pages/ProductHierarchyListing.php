<?php
include_once("../Controller/ProductHierarchyCtrl.php");
$controller = new ProductHierarchyController();
$pGroup7ID = "";
$pGroup4ID = "";
$pGroup9ID = "";
$data = file_get_contents("php://input");
$request = json_decode($data);
if(isset($request->data4) && $request->data4!='0' )
{
$pGroup4ID = $request->data4;
}
if(isset($request->data7) && $request->data7!='0'){
$pGroup7ID = $request->data7;
}
if(isset($request->data9) && $request->data9!='0'){
$pGroup9ID = $request->data9;
}
$controller->productHierarchyGroup($pGroup4ID,$pGroup7ID,$pGroup9ID);



?>