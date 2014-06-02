/**
Created By Sweta on 28 Jan 2014
To Fetch Promotion Detail data on 
New Promotion Page 
Detail Controller
 */
var detailControllers = angular.module('detailControllers', ['ui.bootstrap'])// Define new module for our application
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
$scope.selectedpromoTiers = 0;
$scope.InputPrd = 0;
$scope.selectedpromoPrdProductName = 0;
$scope.selectedpromoPrdProductID = 0;
$scope.selectedpromoPrdBuildingBlock = 0;
$scope.selectedpromoPrdProductGroup = 0;
$scope.selectedpromoPrdBrand = 0;
$scope.pageName = "";
$scope.volreq = 0;
$(".datepicker").datepicker();
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
		$scope.Unit = UnitData;
  });
//--------------Promo UnitData-----------//
  $http.get('./Pages/PromoBudgetOwner.php').success(function(BudgetOwnerData) {
 //alert(BudgetOwnerData);// Bind the data returned from web service to $scope
		$scope.BudgetOwner = BudgetOwnerData;
  });
//--------------Structure On change-----------//
 $scope.changeStructure = function(){
 var promoStructure = $("#promoStructure").val();
	if(promoStructure == 0){
	 $scope.promoDetails = false;
	 $scope.TypeUnit = true;
	 $scope.Parent = false;
	 $scope.selectedpromoType = 0;
	 }else if(promoStructure == 2){
	 $scope.Parent = true;
	 $scope.promoDetails = false;
	 $scope.TypeUnit = false;
	 $scope.selectedpromoType = 0;
	 }else{
	 $scope.promoDetails = false;
	 $scope.TypeUnit = false;
	 $scope.Parent = false;
	 $scope.selectedpromoType = 0;
	 }
 }
 //--------------- Div On change---------------//
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
//---------------Display Type Text Onchange--------------//
$scope.changeValueText = function(){
var promoProductType = $("#promoProductType").val();
$scope.promoProductValueText = promoProductType;
if(promoProductType=='ProductID'){
 $scope.ALL = true;
 $scope.ProductID = true;
 $scope.ProductName = false;
 $scope.BuildingBlock = false;
 $scope.ProductGroup = false;
 $scope.Brand = false;
 $scope.Summary = true;
}else if(promoProductType=='ProductName'){
 $scope.ALL = true;
 $scope.ProductName = true;
 $scope.BuildingBlock = false;
 $scope.ProductID = false;
 $scope.ProductGroup = false;
 $scope.Brand = false;
 $scope.Summary = true;
}else if(promoProductType=='BuildingBlock'){
 $scope.ALL = true;
 $scope.BuildingBlock = true;
 $scope.ProductID = false;
 $scope.ProductName = false;
 $scope.ProductGroup = false;
 $scope.Brand = false;
 $scope.Summary = true;
}else if(promoProductType=='ProductGroup'){
 $scope.ALL = true;
 $scope.ProductGroup = true;
 $scope.BuildingBlock = false;
 $scope.ProductName = false;
 $scope.ProductID = false;
 $scope.Brand = false;
 $scope.Summary = true;
}else if(promoProductType=='Brand'){
 $scope.ALL = true;
 $scope.Brand = true;
 $scope.ProductGroup = false;
 $scope.BuildingBlock = false;
 $scope.ProductID = false;
 $scope.ProductName = false;
 $scope.Summary = true;
}else{
$scope.ALL = false;
$scope.ProductID = false;
$scope.ProductName = false;
$scope.BuildingBlock = false;
$scope.ProductGroup = false;
$scope.Brand = false;
$scope.Summary = false;
}

}
//------------------------Onchange Unit Value----------------//
 $scope.prdUnitChange = function(){
  var promoUnit = $("#promoUnit").val().split(",");
  $scope.unit = promoUnit[1];
  if(promoUnit[1]=="CRT" || promoUnit[1]=="CTN" || promoUnit[1]=="EA" ){
  $("#radio_1").prop("checked", true); 
  }
}
//------------------------Onchange Vol Req Value----------------//
 $scope.VolReqChange = function(){
  var volreq = $("#promoVolReq").val();
  if(volreq != ""){
  $scope.volreq = volreq ;
  }else{
  $scope.volreq = 0 ;
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

//-------------------------------------------------------
});

//----------------------Model Window--------------------------//
var ModalDemoCtrl = function ($scope, $http, $modal, $log) {

//------------------------Onchange Product Value----------------//
 $scope.prdValueChange = function(){
 $scope.promoVolReq = "";
 $scope.promoSelloutRebate = "";
 $scope.promoPreQty = "";
}
//--------------Model Window-------------------------------------//
  $scope.open = function () {
    alert('dfsdf'+$scope.promoID);
	$http.post('./Pages/summaryDetail.php', {'promoID': $scope.promoID}).success(function(getSummaryDetail) {
	//alert(getSummaryDetail);// Bind the data returned from web service to $scope
	if(getSummaryDetail!="\r\n"){
	$scope.InputPrd = getSummaryDetail.length;
	$scope.Summary = getSummaryDetail;
	}
					
    var modalInstance = $modal.open({
	
      templateUrl: './Partials/SummaryModal.html',
      controller: ModalInstanceCtrl,
      resolve: {
        Summary: function () {
          return $scope.Summary;
        }
      }
    });

    modalInstance.result.then(function (selectedSummary) {
      $scope.selectedDetailList = selectedSummary;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
	});
  };
};

// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $modal service used above.

var ModalInstanceCtrl = function ($scope, $http, $modalInstance, Summary) {
  $scope.Summary = Summary;
  $scope.selectedDetailList = $scope.Summary;
  $scope.ok = function () {
    $modalInstance.close('ok');
  };

  //$scope.cancel = function () {
    //$modalInstance.dismiss('cancel');
  //};
//----------------------------------------------------------------------
};