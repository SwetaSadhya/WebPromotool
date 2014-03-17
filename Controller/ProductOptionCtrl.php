<?php
/* 
Product Select Options class
Written by Sweta 14 Feb 2014
Product Selection Option Controller Class
*/
include_once("../Model/ProductSelectionOptionsModel.php");
include_once("ViewCtrl.php");
class ProductController extends Controller_ViewCtrl {

// define variables
    public $PrdListingOptions;
	public $PrdSelectionOptions;

   
   
	   function __construct() {

	   }
//----------------Product Selection--------------------
   
     function productListingOptions(){
	   $model = new Model_ProductSelectionOptions();
	   $PrdListingOptions = $model->getProduct();
	   $this->loadView('ProductListOptions.php', $PrdListingOptions);
     }
	 
	 function productGroupOption(){
	   $model = new Model_ProductSelectionOptions();
	   $PrdSelectionOptions = $model->getGroupOption();
	   $this->loadView('ProductSelectionOptions.php', $PrdSelectionOptions);
     }
	 


}
?>