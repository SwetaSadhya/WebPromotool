<?php
class Customer{
    private $custID;
    private $countryID;
    private $custCode;
	private $custName;
	private $custGroup1ID;
	private $custGroup1ClientID;
	private $custGroup1Desc;
	private $custGroup2ID;
	private $custGroup2ClientID;
	private $custGroup2Desc;
	private $custGroup3ID;
	private $custGroup3ClientID;
	private $custGroup3Desc;
	private $custGroup4ID;
	private $custGroup4ClientID;
	private $custGroup4Desc;
	private $custGroup5ID;
	private $custGroup5ClientID;
	private $custGroup5Desc; 
	private $custGroup6ID;
	private $custGroup6ClientID;
	private $custGroup6Desc; 
	private $custGroup7ID;
	private $custGroup7ClientID;
	private $custGroup7Desc; 
    public function __construct($custID, $countryID, $custCode, $custName, $custGroup1ID, $custGroup1ClientID, $custGroup1Desc, $custGroup2ID, $custGroup2ClientID, $custGroup2Desc, $custGroup3ID, $custGroup3ClientID ,$custGroup3Desc ,$custGroup4ID ,$custGroup4ClientID ,$custGroup4Desc ,$custGroup5ID ,$custGroup5ClientID ,$custGroup5Desc,$custGroup6ID ,$custGroup6ClientID ,$custGroup6Desc,,$custGroup7ID ,$custGroup7ClientID ,$custGroup7Desc) {
        $this->custID = $custID;
        $this->countryID = $countryID;
        $this->custCode = $custCode;
		$this->custName = $custName;
		$this->custGroup1ID = $custGroup1ID;
		$this->custGroup1ClientID = $custGroup1ClientID;
		$this->custGroup1Desc = $custGroup1Desc;
		$this->custGroup2ID = $custGroup2ID;
		$this->custGroup2ClientID = $custGroup2ClientID;
		$this->custGroup2Desc = $custGroup2Desc;
		$this->custGroup3ID = $custGroup3ID;
		$this->custGroup3ClientID = $custGroup3ClientID;
		$this->custGroup3Desc = $custGroup3Desc;
		$this->custGroup4ID = $custGroup4ID;
		$this->custGroup4ClientID = $custGroup4ClientID;
		$this->custGroup4Desc = $custGroup4Desc;
		$this->custGroup5ID = $custGroup5ID;
		$this->custGroup5ClientID = $custGroup5ClientID;
		$this->custGroup5Desc = $custGroup5Desc;
		$this->custGroup6ID = $custGroup6ID;
		$this->custGroup6ClientID = $custGroup6ClientID;
		$this->custGroup6Desc = $custGroup6Desc;
		$this->custGroup7ID = $custGroup7ID;
		$this->custGroup7ClientID = $custGroup7ClientID;
		$this->custGroup7Desc = $custGroup7Desc;
    }
     
    
}
?>
