<?php
  /* 
Product Select Options class
Written by Sweta 13 Feb 2014

Class used to create Product Options objects.
*/

include_once("Product.php");

class Model_ProductSelection extends Model_Product  {
	//Variables 

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
	public $prdGroup14ID;
	public $prdGroup14ClientID;
	public $prdGroup14Desc;
	public $prdGroup15ID;
	public $prdGroup15ClientID;
	public $prdGroup15Desc;
	public $prdParentCode;
	public $prtDayDate;
	public $CustomerID;
	public $TransProductID;
	

	public function __construct($ProductID,$countryID,$prdProductClientCode,$ProductName,$prdGroup4ID,$prdGroup4ClientID,$prdGroup4Desc,$prdGroup7ID,$prdGroup7ClientID,$prdGroup7Desc,$prdGroup9ID,$prdGroup9ClientID,$prdGroup9Desc,$prdGroup14ID,$prdGroup14ClientID,$prdGroup14Desc,$prdGroup15ID,$prdGroup15ClientID,$prdGroup15Desc,$prdParentCode,$prtDayDate,$CustomerID,$TransProductID) {	
		
	
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
		$this->prdGroup14ID = $prdGroup14ID;
		$this->prdGroup14ClientID = $prdGroup14ClientID;
		$this->prdGroup14Desc = $prdGroup14Desc;
		$this->prdGroup15ID = $prdGroup15ID;
		$this->prdGroup15ClientID = $prdGroup15ClientID;
		$this->prdGroup15Desc = $prdGroup15Desc;
		$this->prdParentCode = $prdParentCode;
		$this->prtDayDate = $prtDayDate;
		$this->CustomerID = $CustomerID;
		$this->TransProductID = $TransProductID;
	}
	


}
?>