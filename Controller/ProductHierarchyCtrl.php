<?php
/* 
Product Hierarchy Class
Written by Sweta 10 Feb 2014
Product Hierarchy Controller Class
*/
include_once("../Model/ProductHierarchyModel.php");
include_once("ViewCtrl.php");
class ProductHierarchyController extends Controller_ViewCtrl {

// define variables
  public $PrdHierarchyData;

   
	   function __construct() {

	   }
	 //Group 1 Hierarchy-list
     function productHierarchyGroup($pGroup4ID,$pGroup7ID,$pGroup9ID){
	   $model = new Model_ProductHierarchy();
	   $PrdHierarchyData = $model->getHierarchyGroup($pGroup4ID,$pGroup7ID,$pGroup9ID);
	   $this->loadView('ProductHierarchy.php', $PrdHierarchyData);
     }
	 
}
?>