<?php
// PromoObjectiveSelection class
// Created by Sweta on 28 January 2014


class Model_PromoSelection {
	//Variables 
	public $prmObjID ;
	public $prmObjectiveID ;
	public $prmObjectiveDesc ;
	public $prmtypeID ;
	public $promotiontypeID ;
	public $ptyPromotionTypeName;
	public $ptyPromotionTypeParent;
	public $prmUNID;
	public $prmUnitID;
	public $prmUnitDesc;


	
    public function __construct($prmObjID ,$prmObjectiveID,$prmObjectiveDesc,$prmtypeID,$promotiontypeID,$ptyPromotionTypeName,$ptyPromotionTypeParent,$prmUNID,$prmUnitID,$prmUnitDesc) {
		
		$this->prmObjID = $prmObjID;
		$this->prmObjectiveID = $prmObjectiveID;
		$this->prmObjectiveDesc = $prmObjectiveDesc;
		$this->prmtypeID = $prmtypeID;
		$this->promotiontypeID = $promotiontypeID;
		$this->ptyPromotionTypeName = $ptyPromotionTypeName;
		$this->ptyPromotionTypeParent = $ptyPromotionTypeParent;
		$this->prmUNID = $prmUNID;
		$this->prmUnitID = $prmUnitID;
		$this->prmUnitDesc = $prmUnitDesc;
   }

	
}
?>
