<?php
// Promo class
// Created by Sweta on 28 January 2014


class Model_Promo {
	//Variables 
	public $promotionID;
	public $prmPromotionName;
	public $cusCustomerName ;
	public $cusCustomerClientCode ;
	public $cusGroup1Desc;


	
    public function __construct($promotionID,$prmPromotionName,$cusCustomerName,$cusCustomerClientCode,$cusGroup1Desc) {
		
		$this->promotionID = $promotionID;
		$this->prmPromotionName = $prmPromotionName;
		$this->cusCustomerName = $cusCustomerName;
		$this->cusCustomerClientCode = $cusCustomerClientCode;
		$this->cusGroup1Desc = $cusGroup1Desc;
   }

	
}
?>
