<?php
include_once("../Controller/SecCustomerOptionCtrl.php");
$controller = new SecCustomerController();
$data = file_get_contents("php://input");
$request = json_decode($data);
$SecCustSearch = "";
if(isset($request->txtSecCustSearch) )
{
$SecCustSearch = $request->txtSecCustSearch;
}
$controller->secCustomerSelectionOption($SecCustSearch);
?>