<?php
include_once("../Controller/ProductOptionCtrl.php");
$controller = new ProductController();
$data = file_get_contents("php://input");
$request = json_decode($data);
$prdsearchTxt = "";
if(isset($request->prdTxtSearch) )
{
$prdsearchTxt = $request->prdTxtSearch;
}
$controller->productListingOptions($prdsearchTxt);
?>