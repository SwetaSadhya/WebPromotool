<?php
/* 
SecCustomer Select Options class
Written by Sweta 25 March 2013
SecCustomer Selection Option Controller Class
*/
include_once("../Model/SecCustomerSelectionOptionsModel.php");
include_once("ViewCtrl.php");

class SecCustomerController extends Controller_ViewCtrl {

// define variables
  public $SecCusSelectionOptions;

	   function __construct() {

	   }
	 
	 function secCustomerSelectionOption(){ // Group Listing
	   $model = new Model_SecCustomerSelectionOptions();
	   $SecCusSelectionOptions = $model->getSecondrayCustomerOption();
	   $this->loadView('SecCustomerListOptions.php', $SecCusSelectionOptions);
     }
	 


}
?>