 <?php
// Customer class
// Created by Sweta on 28 January 2014


class Model_Customer {
	//Variables 
	public $customerID ;
	public $countryID ;
	public $cusCustomerClientCode ;
	public $cusCustomerName;
	public $cusGroup1ID;
	public $cusGroup2ID;
	public $cusGroup3ID;
	public $cusGroup4ID;
	public $cusGroup5ID; 
	public $cusGroup6ID;
	public $cusGroup7ID; 

	
    public function __construct($customerID,$countryID,$cusCustomerClientCode,$cusCustomerName,$cusGroup1ID,$cusGroup2ID,$cusGroup3ID,$cusGroup4ID,$cusGroup5ID,$cusGroup6ID,$cusGroup7ID) {
		

		$this->customerID = $customerID;
		$this->countryID = $countryID;
		$this->cusCustomerClientCode = $cusCustomerClientCode;
		$this->cusCustomerName = $cusCustomerName;
		$this->cusGroup1ID = $cusGroup1ID;
		$this->cusGroup2ID = $cusGroup2ID;
		$this->cusGroup3ID = $cusGroup3ID;
		$this->cusGroup4ID = $cusGroup4ID;
		$this->cusGroup5ID = $cusGroup5ID;
		$this->cusGroup6ID = $cusGroup6ID;
		$this->cusGroup7ID = $cusGroup7ID;
   }

	
}
?>
