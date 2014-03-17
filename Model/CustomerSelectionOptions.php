<?php
  /* 

Customer Select Options class
Written by Sweta 10 December 2013

Class used to create Customer Options objects.

*/

class Model_CustomerSelection  {
	//Variables 
	public $cusID;
	public $cusCustomerClientCode;
	public $cusCustomerName;
	public $countryID;
	public $cusGroup1ID;
	public $cusGroup1ClientID;
	public $cusGroup1Desc;
	public $cusGroup5ID;
	public $cusGroup5ClientID;
	public $cusGroup5Desc;
	public $cusGroup6ID;
	public $cusGroup6ClientID;
	public $cusGroup6Desc;
	

	public function __construct($cusID,$cusCustomerClientCode,$cusCustomerName,$countryID,$cusGroup1ID,$cusGroup1ClientID,$cusGroup1Desc,$cusGroup5ID,$cusGroup5ClientID,$cusGroup5Desc,$cusGroup6ID,$cusGroup6ClientID,$cusGroup6Desc) {	
		
		$this->cusID = $cusID;
		$this->cusCustomerClientCode = $cusCustomerClientCode;
		$this->cusCustomerName = $cusCustomerName;
		$this->countryID = $countryID;
		$this->cusGroup1ID = $cusGroup1ID;
		$this->cusGroup1ClientID = $cusGroup1ClientID;
		$this->cusGroup1Desc = $cusGroup1Desc;
		$this->cusGroup5ID = $cusGroup5ID;
		$this->cusGroup5ClientID = $cusGroup5ClientID;
		$this->cusGroup5Desc = $cusGroup5Desc;
		$this->cusGroup6ID = $cusGroup6ID;
		$this->cusGroup6ClientID = $cusGroup6ClientID;
		$this->cusGroup6Desc = $cusGroup6Desc;
	}
	


}
?>