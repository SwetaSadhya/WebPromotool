<?php
/* Product
Created by Sweta on 13 Feb 2014
*/

class Model_Product {
	//Variables 
	public $prdID;
	public $ProductID ;
	public $countryID ;
	public $prdProductClientCode ;
	public $ProductName;
	public $prdCreatedOn;
	public $prdGST;
	public $prdNetWeight;
	public $prdNetVolume;
	public $prdGroup1ID;
	public $prdGroup2ID;
	public $prdGroup3ID; 
	public $prdGroup4ID;
	public $prdGroup5ID; 
	public $prdGroup6ID; 
	public $prdGroup7ID; 
	public $prdGroup8ID; 
	public $prdGroup9ID; 
	public $prdGroup10ID; 
	public $prdGroup11ID; 
	public $prdGroup12ID; 
	public $prdGroup13ID; 
	public $prdGroup14ID; 
	public $prdGroup15ID; 
	public $prdGroup16ID; 
	public $prdGroup17ID; 
	public $prdGroup18ID; 
	public $isActive; 

	
    public function __construct($prdID,$ProductID,$countryID,$prdProductClientCode,$ProductName,$prdCreatedOn,$prdGST,$prdNetWeight,$prdNetVolume,$prdGroup1ID,$prdGroup2ID,$prdGroup3ID,$prdGroup4ID,$prdGroup5ID,$prdGroup6ID,$prdGroup7ID,$prdGroup8ID,$prdGroup9ID,$prdGroup10ID,$prdGroup11ID,$prdGroup12ID,$prdGroup13ID,$prdGroup14ID,$prdGroup15ID,$prdGroup16ID,$prdGroup17ID,$prdGroup18ID,$isActive) {
	
		$this->prdID = $prdID;
		$this->ProductID = $ProductID;
		$this->countryID = $countryID;
		$this->prdProductClientCode = $prdProductClientCode;
		$this->ProductName = $ProductName;
		$this->prdCreatedOn = $prdCreatedOn;
		$this->prdGST = $prdGST;
		$this->prdNetWeight = $prdNetWeight;
		$this->prdNetVolume = $prdNetVolume;
		$this->prdGroup1ID = $prdGroup1ID;
		$this->prdGroup2ID = $prdGroup2ID;
		$this->prdGroup3ID = $prdGroup3ID;
		$this->prdGroup4ID = $prdGroup4ID;
		$this->prdGroup5ID = $prdGroup5ID;
		$this->prdGroup6ID = $prdGroup6ID;
		$this->prdGroup7ID = $prdGroup7ID;
		$this->prdGroup8ID = $prdGroup8ID;
		$this->prdGroup9ID = $prdGroup9ID;
		$this->prdGroup10ID = $prdGroup10ID;
		$this->prdGroup11ID = $prdGroup11ID;
		$this->prdGroup12ID = $prdGroup12ID;
		$this->prdGroup13ID = $prdGroup13ID;
		$this->prdGroup14ID = $prdGroup14ID;
		$this->prdGroup15ID = $prdGroup15ID;
		$this->prdGroup16ID = $prdGroup16ID;
		$this->prdGroup17ID = $prdGroup17ID;
		$this->prdGroup18ID = $prdGroup18ID;
		$this->isActive = $isActive;
		
   }
   



}
?>
