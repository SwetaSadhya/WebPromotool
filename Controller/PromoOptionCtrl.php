<?php
/* 
Promo Objective Selection class
Written by Sweta 10 December 2013
Promo Objective Selection Controller Class
*/
include_once("../Model/PromoSelectionOptionsModel.php");
include_once("ViewCtrl.php");

class PromoSelectionOptionController extends Controller_ViewCtrl {

// define variables
  public $PromoObejectiveListing;
  public $PromoTypeListing;
  public $PromoUnitListing;
  public $PromoBudgetOwnerListing;

  
	   function __construct() {

	   }
   
     function promoObejectiveSelection(){ // objective Listing
	   $model = new Model_PromoSelectionOptions();
	   $PromoObejectiveListing = $model->getObejectiveSelection();
	   $this->loadView('PromoObjectiveSelection.php', $PromoObejectiveListing);
     }
	 
	 function promoTypeOption(){ // Type Listing
	   $model = new Model_PromoSelectionOptions();
	   $PromoTypeListing = $model->getTypeOptions();
	   $this->loadView('PromoType.php', $PromoTypeListing);
     }
	 
	 function promoUnitOption(){ // Unit Listing
	   $model = new Model_PromoSelectionOptions();
	   $PromoUnitListing = $model->getUnitOptions();
	   $this->loadView('PromoUnit.php', $PromoUnitListing);
     }
	 
	 function promoBudgetOwnerOption(){ // Budget Owner Listing
	   $model = new Model_PromoSelectionOptions();
	   $PromoBudgetOwnerListing = $model->getBudgetOwnerOptions();
	   $this->loadView('PromoBudgetOwner.php', $PromoBudgetOwnerListing);
     }

	 


}
?>