<?php
/* 
Customer Select Options class
Written by Sweta 10 December 2013
Customer Selection Option Controller Class
*/
include_once("../Model/CustomerSelectionOptionsModel.php");
include_once("ViewCtrl.php");

class CustomerController extends Controller_ViewCtrl {

// define variables
  public $CustListingOptions;
  public $CusSelectionOptions;

	   function __construct() {

	   }
   
     function customerListingOptions(){ // Customer Listing
	   $model = new Model_CustomerSelectionOptions();
	   $CustListingOptions = $model->getCustomers();
	   $this->loadView('CustomerListOptions.php', $CustListingOptions);
     }
	 
	 function customerSelectionOption(){ // Group Listing
	   $model = new Model_CustomerSelectionOptions();
	   $CusSelectionOptions = $model->getGroupOption();
	   $this->loadView('CustomerSelectionOptions.php', $CusSelectionOptions);
     }
	 


}
?>