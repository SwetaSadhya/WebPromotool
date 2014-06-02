/**
Created By Sweta on 28 Jan 2014
To Fetch Promotion Detail data on 
New Promotion Page 
Detail Controller
 */
var formControllers = angular.module('formControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
formControllers.controller('FormCtrl', function($scope,$http) {	
	 $scope.checkSubmit = function ()
	 {
	 //-------------------Customer Tab---------------------//
	  var channel = $("#channel:checked").val();
	  var subchannel = $("#subchannel:checked").val();
	  var region = $("#region:checked").val();
	  var customer = $("#customer:checked").val();
	  var outlettype = $("#outlettype:checked").val();
	  var seccustomer = $("#seccustomer:checked").val();
		 $("#SelChannel option").prop("selected","selected");
		 var cusGroup1ID = $("#SelChannel").val();
		 $("#SelSubChannel option").prop("selected","selected");
		 var cusGroup5ID = $("#SelSubChannel").val();
		 $("#SelRegion option").prop("selected","selected");
		 var cusGroup6ID = $("#SelRegion").val();
		 $("#SelCustomer option").prop("selected","selected");
		 var customerID = $("#SelCustomer").val();
		 $("#toSelOutletType option").prop("selected","selected");
		 var secGroup1ID = $("#toSelOutletType").val();
		 $("#toSelsecCustomer option").prop("selected","selected");
		 var secondaryCustomerID = $("#toSelsecCustomer").val();
		//-----------------------Product Tab-------------//
		var prdGroup7ID = $("#prdBlock").val();
		var prdGroup9ID = $("#prdGroup").val();
		var prdGroup4ID = $("#prdBrand").val();
		var prdGroup14ID = $("#prdFlavour").val();
		var prdGroup15ID = $("#prdPackSize").val();
		$("#toSelProduct option").prop("selected","selected");
		var ProductID = $("#toSelProduct").val();
		
		//----------------------Details-----------------------------//
		var prmCode = $("#promoCode").val();
		var prmObjectiveID = $("#prmObjective").val();
		var prmStructure = $("#promoStructure").val();
		var prmParentStructureID = $("#promoParentStructure").val();
		var	arrType = $("#promoType").val().split(',');
		var prmTypeID = arrType[0];
		var prmTypeParent = arrType[1];
		var arrUnitID = $("#promoUnit").val().split(',');
		var prmUnitID = arrUnitID[0];
		var prmBudgetOwnerID = $("#promoBudgetOwner").val();
		var prmDesc = $("#promoDesc").val();
		var prmStartDate = $("#promoStartDate").val();
		var prmEndDate = $("#promoEndDate").val();
		
		//------------------Promotion Type-------------------------//
		var promoID = "";
		var promoID = $("#promoID").val();
		alert(promoID);
		var prmProductType = $("#promoProductType").val();
		if(prmProductType!=""){
		var prmProductValue = $("#promoPrd"+prmProductType).val();
		}
		var prmVolReq = $("#promoVolReq").val();
		var prmSelloutRebate = $("#promoSelloutRebate").val();
		var prmCusPoints = $("#promoCusPoints").val();
		var prmPreQty = $("#promoPreQty").val();
		var prmSelloutRebateL = $("#promoSelloutRebateL").val();
		var prmMailCost = $("#promoMailCost").val();
		var prmMaterialCost = $("#promoMaterialCost").val();
		var prmPremiumCost = $("#promoPremiumCost").val();
		var prmPremiumQty = $("#promoPremiumQty").val();
		
		var prmDisplayFee = $("#promoDisplayFee").val();
		var prmDisplayNumber = $("#promoDisplayNumber").val();
		var prmPOSMaterialcost = $("#promoPOSMaterialcost").val();
		var prmNumberofFreeCTN = $("#promoNumberofFreeCTN").val();
	
		var prmFreegoodsamount = $("#promoFreegoodsamount").val();
		var prmFreegoodsunit = $("#promoFreegoodsunit").val();
		
		//-------------------------Volume-----------------------//
		var prdVolumesType = $("#prdVolumesType:checked").val();
		var prmBaselineF = $("#prmBaselineF").val();
		//------------Validate-------------------------------------//
		if(channel=="channel" && cusGroup1ID==null){
	    alert("Channel Not Selected");
	    }else if(subchannel=="subchannel" && cusGroup5ID==null){
		alert("SubChannel Not Selected");
		}else if(region=="region" && cusGroup6ID==null){
		alert("Region Not Selected");
		}else if(customer=="customer" && customerID==null){
		alert("Customer Not Selected");
		}else if(outlettype=="outlettype" && secGroup1ID==null){
		alert("Outlet Type Not Selected");
		}else if(seccustomer=="seccustomer" && secondaryCustomerID==null){
		alert("Outlet Not Selected");
		}else if(ProductID==null){
		alert('Select One Product');
		}else if(prmCode==""){
		alert('Enter Promo Code');
		}else{ 
		$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
		$http.post('./Pages/insert.php', {'seccustomer':seccustomer,'outlettype':outlettype,'customer':customer,'region': region,'subchannel':subchannel,'channel':channel,'cusGroup1ID': cusGroup1ID,'cusGroup5ID': cusGroup5ID,'cusGroup6ID': cusGroup6ID,'customerID': customerID,'secondaryCustomerID': secondaryCustomerID,
		'prdGroup7ID': prdGroup7ID,'prdGroup9ID': prdGroup9ID,'prdGroup4ID': prdGroup4ID,'prdGroup14ID': prdGroup14ID,'prdGroup15ID': prdGroup15ID,'ProductID': ProductID,
		'prmObjectiveID': prmObjectiveID,'prmStructure': prmStructure,'prmParentStructureID': prmParentStructureID,'prmTypeID': prmTypeID,'prmTypeParent' : prmTypeParent,
		'prmUnitID': prmUnitID,'prmBudgetOwnerID': prmBudgetOwnerID,'prmCode': prmCode,'prmDesc':prmDesc,'prmStartDate':prmStartDate,'prmEndDate':prmEndDate,
		'prmProductType': prmProductType,'prmProductValue': prmProductValue,'prmVolReq': prmVolReq,'promoID':promoID,
		'prmSelloutRebate': prmSelloutRebate,'prmSelloutRebateL': prmSelloutRebateL,'prmCusPoints': prmCusPoints,'prmPreQty': prmPreQty,'prmSelloutRebateL': prmSelloutRebateL,'prmMailCost': prmMailCost,'prmMaterialCost': prmMaterialCost,'prmPremiumCost':prmPremiumCost,'prmPremiumQty':prmPremiumQty,
		'prmDisplayFee': prmDisplayFee,'prmDisplayNumber': prmDisplayNumber,'prmPOSMaterialcost': prmPOSMaterialcost,'prmNumberofFreeCTN': prmNumberofFreeCTN,'prmFreegoodsamount': prmFreegoodsamount,'prmFreegoodsunit': prmFreegoodsunit,
		'prdVolumesType': prdVolumesType,'prmBaselineF': prmBaselineF}).success(function(data) {
			alert(data);
			$scope.promoID = data;
		});
		}	
//-------------------
}

//-------------------------------------------------------
});
