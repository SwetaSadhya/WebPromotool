<?php
include_once("../Controller/CustomerOptionCtrl.php");
$controller = new CustomerController();
$data = file_get_contents("php://input");
$request = json_decode($data);
$searchTxt = "";
if(isset($request->prdTxtSearch) )
{
$searchTxt = $request->prdTxtSearch;
}
$controller->customerListingOptions($searchTxt);
?>