/**
Created By Sweta on 28 Jan 2014
To Fetch Promotion Detail data on 
New Promotion Page 
Detail Controller
 */
var detailControllers = angular.module('detailControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
detailControllers.controller('DetailCtrl', function($scope,$http) {	
$scope.promoStructure = 1;
$scope.promoTypeID = "All";
$scope.promoValueText = "All";
$(".datepicker").datepicker();
$scope.changeValueText = function(){
var promoTypeID = $("#promoTypeID").val();
$scope.promoValueText = promoTypeID;
}
//--------------Product Detail Data-----------//
  $http.get('./Pages/ProductGroup.php').success(function(productListingforType) {
 //alert(productListingforType);// Bind the data returned from web service to $scope
  $scope.selectedPrdProductType = 0;
  $scope.PrdProductValue = productListingforType;
  });
//--------------Promo Objective Data-----------//
  $http.get('./Pages/PromoObjectiveSelection.php').success(function(ObjectiveData) {
 //alert(ObjectiveData);// Bind the data returned from web service to $scope
		$scope.Objective = ObjectiveData;
  });
//--------------Promo Type Data-----------//
  $http.get('./Pages/PromoTypes.php').success(function(TypeData) {
 //alert(TypeData);// Bind the data returned from web service to $scope
		$scope.Type = TypeData;
  });
//--------------Promo UnitData-----------//
  $http.get('./Pages/PromoUnits.php').success(function(UnitData) {
 //alert(TypeData);// Bind the data returned from web service to $scope
		$scope.Unit = UnitData;
  });
 //---------------Onchange---------------//
 $scope.changeDiv = function(){
 var value = ''+$scope.promoType+'';
 var promoType = value.split(",");
 var promoMainType = promoType[1].trim();
 var promoTypeName = promoType[2].trim();
 //alert(promoTypeName);
 if(promoMainType == 'Display'){
 $scope.Display = true;
 $scope.Discounts = true;
 $scope.Freegoods = false;
 $scope.Lumpsum = false;
 $scope.MixnMatch = false;
 $scope.MixnMatchFOC = false;
 $scope.promoTypeParent = promoTypeName;
 $scope.Stepdiscount = false;
 $scope.StepdiscountFOC =false;
 $scope.FFS = false;
 $scope.KRIS = false;
 }else if(promoMainType =='Lumpsum'){
 $scope.Lumpsum = true;
 $scope.Discounts = true;
 $scope.Freegoods = false;
 $scope.Display = false;
 $scope.MixnMatch = false;
 $scope.MixnMatchFOC = false;
 $scope.Stepdiscount = false;
 $scope.StepdiscountFOC =false
 $scope.FFS = false;
 $scope.KRIS = false;
 }else if(promoMainType =='MixnMatch'){
 $scope.MixnMatch = true;
 $scope.Discounts = true;
 $scope.Freegoods = false;
 $scope.Display = false;
 $scope.Lumpsum = false;
 $scope.MixnMatchFOC = false;
 $scope.Stepdiscount = false;
 $scope.StepdiscountFOC =false;
 $scope.FFS = false;
 $scope.KRIS = false;
 }else if(promoMainType =='Freegoods'){
 $scope.Freegoods = true;
 $scope.Discounts = true;
 $scope.Display = false;
 $scope.Lumpsum = false;
 $scope.MixnMatch = false;
 $scope.MixnMatchFOC = false;
 $scope.Stepdiscount = false;
 $scope.StepdiscountFOC =false;
 $scope.KRIS = false;
 $scope.FFS = false;
 }else if(promoMainType =='MixnMatchFOC'){
 $scope.MixnMatchFOC = true;
 $scope.Discounts = true;
 $scope.Display = false;
 $scope.Lumpsum = false;
 $scope.MixnMatch = false;
 $scope.Freegoods = false;
 $scope.Stepdiscount = false;
 $scope.StepdiscountFOC =false;
 $scope.FFS = false;
 $scope.KRIS = false;
 }else if(promoMainType =='Stepdiscount'){
 $scope.Stepdiscount = true;
 $scope.Discounts = true;
 $scope.Display = false;
 $scope.Lumpsum = false;
 $scope.MixnMatch = false;
 $scope.Freegoods = false;
 $scope.MixnMatchFOC =false;
 $scope.StepdiscountFOC =false;
 $scope.FFS = false;
 $scope.KRIS = false;
 }else if(promoMainType =='StepdiscountFOC'){
 $scope.StepdiscountFOC = true;
 $scope.Discounts = true;
 $scope.Display = false;
 $scope.Lumpsum = false;
 $scope.MixnMatch = false;
 $scope.Freegoods = false;
 $scope.MixnMatchFOC =false;
 $scope.Stepdiscount = false;
 $scope.FFS = false;
 $scope.KRIS = false;
 }else if(promoMainType =='FFS'){
 $scope.FFS = true;
 $scope.Discounts = true;
 $scope.Display = false;
 $scope.Lumpsum = false;
 $scope.MixnMatch = false;
 $scope.Freegoods = false;
 $scope.MixnMatchFOC =false;
 $scope.Stepdiscount = false;
 $scope.StepdiscountFOC = false;
 $scope.KRIS = false;
 }else if(promoMainType =='KRIS'){
 $scope.KRIS = true;
 $scope.Discounts = true;
 $scope.Display = false;
 $scope.Lumpsum = false;
 $scope.MixnMatch = false;
 $scope.Freegoods = false;
 $scope.MixnMatchFOC =false;
 $scope.Stepdiscount = false;
 $scope.StepdiscountFOC = false;
 $scope.FFS = false;
 }else{
  $scope.Discounts = false;
  $scope.Lumpsum = false;
  $scope.Display = false;
  $scope.Freegoods = false;
  $scope.MixnMatch = false;
  $scope.MixnMatchFOC = false;
  $scope.Stepdiscount = false;
  $scope.StepdiscountFOC =false;
  $scope.FFS = false;
  $scope.KRIS = false;
 }
}
 $scope.SelProduct = function(){
 $("#toExProduct option").prop("selected","selected");
 var toExProduct = $("#toExProduct").val();
 $("#toInlProduct option").prop("selected","selected");
 var toInlProduct = $("#toInlProduct").val();
 if(toInlProduct==''+toExProduct+''){
 alert("Cannot Select Same Product");
 $("#toInlProduct option:selected").appendTo("#frmInlProduct");
 }
 }
//-------------------------------------------------------
});
