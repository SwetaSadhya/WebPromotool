 <?php
// Customer class
// Created by Sweta on 28 January 2014


class Model_SecCustomer {
	//Variables 
	public $secondaryCustomerID ;
	public $countryID ;
	public $secCustomerClientID ;
	public $secCustomerName;
	public $secSecondaryCustomerClientName;
	public $cusCustomerClientCode;
	public $secCustomerClientCode;
	public $secGroup1ID;
	public $secGroup1ClientID;
	public $secGroup1Desc;
	public $secGroup2ID; 
	public $secGroup2ClientID; 
	public $secGroup2Desc; 
	public $secGroup3ID;
	public $isActive; 

	
    public function __construct($secondaryCustomerID,$countryID,$secCustomerClientID,$secCustomerName,$secSecondaryCustomerClientName,$customerID,$cusCustomerClientCode,$secCustomerClientCode,$secGroup1ID,$secGroup1ClientID,$secGroup1Desc,$secGroup2ID,$secGroup2ClientID,$secGroup2Desc,$secGroup3ID,$isActive) {
		

		$this->secondaryCustomerID = $secondaryCustomerID;
		$this->countryID = $countryID;
		$this->secCustomerClientID = $secCustomerClientID;
		$this->secCustomerName = $secCustomerName;
		$this->secSecondaryCustomerClientName = $secSecondaryCustomerClientName;
		$this->customerID = $customerID;
		$this->cusCustomerClientCode = $cusCustomerClientCode;
		$this->secCustomerClientCode = $secCustomerClientCode;
		$this->secGroup1ID = $secGroup1ID;
		$this->secGroup1ClientID = $secGroup1ClientID;
		$this->secGroup1Desc = $secGroup1Desc;
		$this->secGroup2ID = $secGroup2ID;
		$this->secGroup2ClientID = $secGroup2ClientID;
		$this->secGroup2Desc = $secGroup2Desc;
		$this->secGroup3ID = $secGroup3ID;
		$this->isActive = $isActive;
   }

	
}
?>
