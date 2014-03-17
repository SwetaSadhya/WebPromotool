<?php
// Hierarchy class
// Created by Sweta on 10 Feb 2014


class Model_Hierarchy {
	//Variables 
	public $customerHierarchyID	;
	public $cusID;
	public $cusCustomerClientCode;
	public $cusCustomerName;
	public $cusGroup1ID ;
	public $cusGroup1Desc ;
	public $cusGroup5ID;
	public $cusGroup5Desc ;
	public $cusGroup6ID;
	public $cusGroup6Desc ;


	
    public function __construct($customerHierarchyID,$cusID,$cusCustomerClientCode,$cusCustomerName,$cusGroup1ID,$cusGroup1Desc,$cusGroup5ID,$cusGroup5Desc,$cusGroup6ID,$cusGroup6Desc) {
		
		$this->customerHierarchyID = $customerHierarchyID;
		$this->cusID = $cusID;
		$this->cusCustomerClientCode = $cusCustomerClientCode;
		$this->cusCustomerName = $cusCustomerName;
		$this->cusGroup1ID = $cusGroup1ID;
		$this->cusGroup1Desc = $cusGroup1Desc;
		$this->cusGroup5ID = $cusGroup5ID;
		$this->cusGroup5Desc = $cusGroup5Desc;
		$this->cusGroup6ID = $cusGroup6ID;
		$this->cusGroup6Desc = $cusGroup6Desc;
   }

	
}
?>
