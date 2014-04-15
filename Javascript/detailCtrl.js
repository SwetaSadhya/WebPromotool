/**
Created By Sweta on 28 Jan 2014
To Fetch Promotion Detail data on 
New Promotion Page 
Detail Controller
 */
var detailControllers = angular.module('detailControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
detailControllers.controller('DetailCtrl', function($scope,$http) {	
$scope.selectedpromoObjective = 0;
$scope.selectedpromoStructure = 'select';
$scope.selectedpromoParent = 0;
$scope.selectedpromoType = 0;
$scope.selectedpromoUnit = 0;
$scope.selectedpromoBudgetOwner = 0;
$scope.promoProductType = "All";
$scope.promoProductValueText = "All";
$scope.selectedpromoPrdAll = 0;
$scope.selectedpromoPrdProductID = 0;
$scope.selectedpromoPrdBuildingBlock = 0;
$scope.selectedpromoPrdProductGroup = 0;
$scope.selectedpromoPrdBrand = 0;
$scope.selectedpromoTiers = 0;
$scope.pageName = "Partials/Discounts.html";
$(".datepicker").datepicker();
//---------------Display Type Text--------------//
$scope.changeValueText = function(){
var promoProductType = $("#promoProductType").val();
$scope.promoProductValueText = promoProductType;
if(promoProductType=='ProductID'){
 $scope.ALL = true;
 $scope.ProductID = true;
 $scope.BuildingBlock = false;
 $scope.ProductGroup = false;
 $scope.Brand = false;
}else if(promoProductType=='BuildingBlock'){
 $scope.ALL = true;
 $scope.BuildingBlock = true;
 $scope.ProductID = false;
 $scope.ProductGroup = false;
 $scope.Brand = false;
}else if(promoProductType=='ProductGroup'){
 $scope.ALL = true;
 $scope.ProductGroup = true;
 $scope.BuildingBlock = false;
 $scope.ProductID = false;
 $scope.Brand = false;
}else if(promoProductType=='Brand'){
 $scope.ALL = true;
 $scope.Brand = true;
 $scope.ProductGroup = false;
 $scope.BuildingBlock = false;
 $scope.ProductID = false;
}else{
$scope.ALL = false;
$scope.ProductID = false;
$scope.BuildingBlock = false;
$scope.ProductGroup = false;
$scope.Brand = false;
}
}
//--------------Structure On change-----------//
 $scope.changeStructure = function(){
 var promoStructure = $("#promoStructure").val();
	if(promoStructure == 0){
	 $scope.promoDetails = false;
	 $scope.TypeUnit = true;
	 $scope.Parent = false;
	 }else if(promoStructure == 2){
	 $scope.Parent = true;
	 $scope.promoDetails = true;
	 $scope.TypeUnit = false;
	 }else{
	 $scope.promoDetails = false;
	 $scope.TypeUnit = false;
	 $scope.Parent = false;
	 }
 }
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
//--------------Promo UnitData-----------//
  $http.get('./Pages/PromoBudgetOwner.php').success(function(BudgetOwnerData) {
 //alert(BudgetOwnerData);// Bind the data returned from web service to $scope
		$scope.BudgetOwner = BudgetOwnerData;
  });

 //---------------On change---------------//
 $scope.changeDiv = function(){
 var promoType = $("#promoType").val();
 var value = ''+promoType+'';
 var promoType = value.split(",");
 var promoMainType = promoType[1].trim();
 var promoTypeName = promoType[2].trim();
 if(promoMainType!=""){
  $scope.promoDetails = true;
  $scope.promoDetaildiv = true;
  $scope.pageName = 'Partials/'+promoMainType+'.html';
 }else{
  $scope.promoDetails = false;
  $scope.promoDetaildiv = false;
 }
 if(promoTypeName!=="" && promoTypeName == "Gondola"){
 $scope.displayGondola = true;
 }else{
 $scope.displayGondola = false;
 }
}
//------------------------KRIS----------------------------------//
$scope.Tires = function(){
$("#toSelProduct option").prop("selected","selected");
 var selPrdID = $("#toSelProduct").val();
 var selTiers = $("#promoTiers").val();
 var Total = selTiers * selPrdID.length;
 $scope.range = Total;
}
//--------------------Excluded Included Radio------------//
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
//--------------Summary For Discounts-----------//
$scope.summaryDiscount = function() {
alert($scope.promoID);
$http.post('./Pages/summaryDetail.php', {'promoID': $scope.promoID}).success(function(getData) {
			alert(getData);// Bind the data returned from web service to $scope
			$scope.inSide=getData;
	});
 }
//-------------------------------------------------------
});
