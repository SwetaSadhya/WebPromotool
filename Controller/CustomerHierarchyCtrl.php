<?php
/* 
Customer Hierarchy Class
Written by Sweta 10 Feb 2014
Customer Hierarchy Controller Class
*/
include_once("../Model/CustomerHierarchyModel.php");
include_once("ViewCtrl.php");
class CustomerHierarchyController extends Controller_ViewCtrl {

// define variables
  public $CustHierarchyData1;
  public $CustHierarchyData2;
  public $CustHierarchyData3;
   
	   function __construct() {

	   }
	 //Group 1 Hierarchy-list
     function customerHierarchyGroup1($cGroup1ID,$cGroup5ID,$cGroup6ID){
	   $model = new Model_CustomerHierarchy();
	   $CustHierarchyData1 = $model->getHierarchyGrop1($cGroup1ID,$cGroup5ID,$cGroup6ID);
	   $this->loadView('CustomerHierarchy.php', $CustHierarchyData1);
     }
	
	  
}
?>