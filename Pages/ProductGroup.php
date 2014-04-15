<?php
include_once("../Controller/ProductOptionCtrl.php");
$controller = new ProductController();
$data = file_get_contents("php://input");
$request = json_decode($data);
$prdID = "";
if(isset($request->prdID) )
{
$prdID = $request->prdID;
}
$controller->productGroupOption($prdID);
?>