<?php
// PromoObjectiveSelection class
// Created by Sweta on 28 January 2014


class Model_PromoSelection {
	//Variables 
	public $prmObjectiveID ;
	public $prmObjectiveDesc ;
	public $promotiontypeID ;
	public $ptyPromotionTypeName;
	public $ptyPromotionTypeParent;
	public $prmUnitID;
	public $prmUnitDesc;


	
    public function __construct($prmObjectiveID,$prmObjectiveDesc,$promotiontypeID,$ptyPromotionTypeName,$ptyPromotionTypeParent,$prmUnitID,$prmUnitDesc) {
		

		$this->prmObjectiveID = $prmObjectiveID;
		$this->prmObjectiveDesc = $prmObjectiveDesc;
		$this->promotiontypeID = $promotiontypeID;
		$this->ptyPromotionTypeName = $ptyPromotionTypeName;
		$this->ptyPromotionTypeParent = $ptyPromotionTypeParent;
		$this->prmUnitID = $prmUnitID;
		$this->prmUnitDesc = $prmUnitDesc;
   }

	
}
?>
