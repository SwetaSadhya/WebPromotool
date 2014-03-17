<?php
// Hierarchy class
// Created by Sweta on 14 Feb 2014


class Model_Hierarchy {
	//Variables 
	public $productHierarchyID;
	public $prdID;
	public $ProductID;
	public $prdProductClientCode;
	public $ProductName;
	public $prdGroup4ID ;
	public $prdGroup4Desc ;
	public $prdGroup7ID;
	public $prdGroup7Desc ;
	public $prdGroup9ID;
	public $prdGroup9Desc ;


	
    public function __construct($productHierarchyID,$prdID,$ProductID,$prdProductClientCode,$ProductName,$prdGroup4ID,$prdGroup4Desc,$prdGroup7ID,$prdGroup7Desc,$prdGroup9ID,$prdGroup9Desc) {
		
		$this->productHierarchyID = $productHierarchyID;
		$this->prdID = $prdID;
		$this->ProductID = $ProductID;
		$this->prdProductClientCode = $prdProductClientCode;
		$this->ProductName = $ProductName;
		$this->prdGroup4ID = $prdGroup4ID;
		$this->prdGroup4Desc = $prdGroup4Desc;
		$this->prdGroup7ID = $prdGroup7ID;
		$this->prdGroup7Desc = $prdGroup7Desc;
		$this->prdGroup9ID = $prdGroup9ID;
		$this->prdGroup9Desc = $prdGroup9Desc;
   }

	
}
?>
