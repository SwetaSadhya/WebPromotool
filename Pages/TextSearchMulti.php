<?php
$data = file_get_contents("php://input");
$request = json_decode($data);
if(isset($request->txtSearch) )
{
$searchTxt = $request->txtSearch;
print_r($searchTxt);
}

?>