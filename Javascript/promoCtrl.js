/**
Created By Sweta on 28 Jan 2014
To Fetch Customer and Product data on 
New Promotion Page 
Promo Controller
 */

var promotionControllers = angular.module('promotionControllers', [])
//------------Contoller For Tabs-------------------------//
promotionControllers.controller('TabsDemoCtrl', function($scope,$http) {	
//-------------variables-----------------------------------//
$scope.imageSource = './Images/BudgetOverview.png';
$scope.NumPrd = 0;
//--------------Product Detail Data-----------//
$scope.SelprdID = function(PrdOptionName) {
//--------------Product By Values-------------//
$("#toSelProduct option").prop("selected","selected");
var selPrd = $("#toSelProduct").val();
	if(selPrd!=null){
		$http.post('./Pages/ProductGroup.php', {'prdID': selPrd}).success(function(selPrdID) {
			//alert(selPrdID);// Bind the data returned from web service to $scope
		$scope.NumPrd = selPrdID.length;
		$scope.promoPrdAll = selPrdID;
		$scope.promoPrdName = selPrdID;
		$scope.promoPrdProductID = selPrdID;
		$scope.promoPrdBuildingBlock = selPrdID;
		$scope.promoPrdProductGroup = selPrdID;
		$scope.promoPrdBrand = selPrdID;
		$scope.promoProductVolume = selPrdID;
	});
  }	
}
//-------------------------------------
});



