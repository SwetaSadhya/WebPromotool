<?php
  /* 
Product Select Options class
Written by Sweta 13 Feb 2014

Class used to create Product Options objects.
*/

include_once("Product.php");

class Model_ProductSelection extends Model_Product  {
	//Variables 
	public $prdID;
	public $ProductID ;
	public $countryID ;
	public $prdProductClientCode ;
	public $ProductName;
	public $prdGroup4ID;
	public $prdGroup4ClientID;
	public $prdGroup4Desc;
	public $prdGroup7ID;
	public $prdGroup7ClientID;
	public $prdGroup7Desc;
	public $prdGroup9ID;
	public $prdGroup9ClientID;
	public $prdGroup9Desc;
	

	public function __construct($prdID,$ProductID,$countryID,$prdProductClientCode,$ProductName,$prdGroup4ID,$prdGroup4ClientID,$prdGroup4Desc,$prdGroup7ID,$prdGroup7ClientID,$prdGroup7Desc,$prdGroup9ID,$prdGroup9ClientID,$prdGroup9Desc) {	
		
		$this->prdID = $prdID;
		$this->ProductID = $ProductID;
		$this->countryID = $countryID;
		$this->prdProductClientCode = $prdProductClientCode;
		$this->ProductName = $ProductName;
		$this->prdGroup4ID = $prdGroup4ID;
		$this->prdGroup4ClientID = $prdGroup4ClientID;
		$this->prdGroup4Desc = $prdGroup4Desc;
		$this->prdGroup7ID = $prdGroup7ID;
		$this->prdGroup7ClientID = $prdGroup7ClientID;
		$this->prdGroup7Desc = $prdGroup7Desc;
		$this->prdGroup9ID = $prdGroup9ID;
		$this->prdGroup9ClientID = $prdGroup9ClientID;
		$this->prdGroup9Desc = $prdGroup9Desc;
	}
	


}
?>