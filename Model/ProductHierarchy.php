<?php
// Hierarchy class
// Created by Sweta on 14 Feb 2014


class Model_Hierarchy {
	//Variables 
	public $productHierarchyID;
	public $ProductID;
	public $prdProductClientCode;
	public $ProductName;
	public $prdGroup4ID ;
	public $prdGroup4Desc ;
	public $prdGroup7ID;
	public $prdGroup7Desc ;
	public $prdGroup9ID;
	public $prdGroup9Desc ;
	public $prdGroup14ID;
	public $prdGroup14Desc ;
	public $prdGroup15ID;
	public $prdGroup15Desc ;

	
    public function __construct($productHierarchyID,$ProductID,$prdProductClientCode,$ProductName,$prdGroup4ID,$prdGroup4Desc,$prdGroup7ID,$prdGroup7Desc,$prdGroup9ID,$prdGroup9Desc,$prdGroup14ID,$prdGroup14Desc,$prdGroup15ID,$prdGroup15Desc) {
		
		$this->productHierarchyID = $productHierarchyID;
		$this->ProductID = $ProductID;
		$this->prdProductClientCode = $prdProductClientCode;
		$this->ProductName = $ProductName;
		$this->prdGroup4ID = $prdGroup4ID;
		$this->prdGroup4Desc = $prdGroup4Desc;
		$this->prdGroup7ID = $prdGroup7ID;
		$this->prdGroup7Desc = $prdGroup7Desc;
		$this->prdGroup9ID = $prdGroup9ID;
		$this->prdGroup9Desc = $prdGroup9Desc;
		$this->prdGroup14ID = $prdGroup14ID;
		$this->prdGroup14Desc = $prdGroup14Desc;
		$this->prdGroup15ID = $prdGroup15ID;
		$this->prdGroup15Desc = $prdGroup15Desc;
   }

	
}
?>
