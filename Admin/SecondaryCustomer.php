<?php
class SecCustomer{
    private $secondaryCustomerID;
    private $countryID;
    private $secCustomerClientID;
	private $secCustomerName;
	private $secSecondaryCustomerClientName;
	private $customerID;
	private $cusCustomerClientCode;
	private $secCustomerClientCode;
	private $secGroup1ID;
	private $secGroup1Desc;
	private $secGroup2ID;
	private $secGroup2ClientID;
	
    public function __construct($secondaryCustomerID, $countryID, $secCustomerClientID, $secCustomerName, $secSecondaryCustomerClientName, $customerID, $cusCustomerClientCode, $secCustomerClientCode, $secGroup1ID, $secGroup1Desc, $secGroup2ID ,$secGroup2ClientID) {
        $this->secondaryCustomerID = $secondaryCustomerID;
        $this->countryID = $countryID;
        $this->secCustomerClientID = $secCustomerClientID;
		$this->secCustomerName = $secCustomerName;
		$this->secSecondaryCustomerClientName = $secSecondaryCustomerClientName;
		$this->customerID = $customerID;
		$this->cusCustomerClientCode = $cusCustomerClientCode;
		$this->secCustomerClientCode = $secCustomerClientCode;
		$this->secGroup1ID = $secGroup1ID;
		$this->secGroup1Desc = $secGroup1Desc;
		$this->secGroup2ID = $secGroup2ID;
		$this->secGroup2ClientID = $secGroup2ClientID;
		
    }
     
    
}
?>
