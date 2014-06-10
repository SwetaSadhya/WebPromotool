/**
Created By Sweta on 28 Jan 2014
To Fetch Customer data on 
New Promotion Page 
Customer Controller
 */

var customerControllers = angular.module('customerControllers', [])// Define new module for our application

//------------Controller For Customer Tabs-------------------------//
customerControllers.controller('CustomerListCtrl', function($scope,$http) {	
//------------Declare--------------------------//
$scope.custGroup = [];
$scope.custData = [];
$scope.radioSelect = "true";
//Declare the aviGroups as a blank array
$scope.aviGroups = [];
$scope.selGroups = [];
$scope.test = [];
//--------------------Controls-------------------//
 $http.get('./Pages/PriCustGroup.php').success(function(response) {
    //alert(response);// Bind the data returned from web service to $scope
	$scope.custGroupList = response;
	//--------------Customer Group Data-----------// 
	$http.get('./Pages/CustomerGroup.php').success(function(response2) {
	//alert(response);// Bind the data returned from web service to $scope
	$scope.custData = response2;
	
	// Get all the values for the selected fieldName
	function getOptions(fieldName,fieldId) {
		var options = [];
		for (var i = 0 ; i < $scope.custData.length ; i++) {
			//alert('We got this far');
			var dataRow = $scope.custData[i];
			var option = {'value':'','id':''};
			option.value = dataRow[fieldName];
			option.id = dataRow[fieldId];
			options[i] = option;
		}
		return options;
	}
	
	for (var i = 0 ; i < $scope.custGroupList.length ; i++) {

		var aviGroup = {'name':'','descriptionFieldName':'','avlbOptions':[],'selGroups':[]};
		aviGroup.name = $scope.custGroupList[i].cstCustGroupClientName;
		aviGroup.descriptionFieldName = $scope.custGroupList[i].cstFieldName;
		aviGroup.descriptionFieldID = $scope.custGroupList[i].cstFieldID;
		aviGroup.avlbOptions = getOptions($scope.custGroupList[i].cstFieldName,$scope.custGroupList[i].cstFieldID);
		aviGroup.selGroups = []; //This should load from server when loading a promotion, but should be empty for a new promotion, for now leave empty
		$scope.aviGroups[i] = aviGroup; // Add the group to the array
		};
	
	});
	
});

//------ Moving Data MultipleBox----------------//
 $scope.moveCustomers = function(itemsToMove, selAviGroup) { 
 //For each group in available groups
	 angular.forEach(selAviGroup.avlbOptions, function (value, key){
	  var index = selAviGroup.avlbOptions.indexOf(value);
	   selAviGroup.avlbOptions.splice(index , 1);
		//loop through all items to move
	    for(var i = 0; i < itemsToMove.length; i++) {
			if(value.id == itemsToMove[i]){
			 selAviGroup.selGroups.push(value); 
			 }
		   }
	 });
  
};
	
$scope.moveAllCustomers = function(sourceid, destinationid) {	
   $("#"+sourceid+"  option").appendTo("#"+destinationid);
   $("#"+destinationid).prop("selected","selected");
 };
//----------------------Filtering-----------------------------//   
   $scope.cusFiltering = function() {
	  $("#SelGroup1 option").prop("selected","selected");
	  var cusSelGroup1 = $("#SelGroup1").val();
	  $("#SelGroup5 option").prop("selected","selected");
	  var cusSelGroup5 = $("#SelGroup5").val();
	  $("#SelGroup6 option").prop("selected","selected");
	  var cusSelGroup6 = $("#SelGroup6").val();
	  $scope.SelGroup1 = cusSelGroup1;
	  $scope.SelGroup5 = cusSelGroup5;
	  $scope.SelGroup6 = cusSelGroup6;
	}
//-------------------All Checked ---------------------------//
	$scope.allValue = function() {
		 if($scope.cusGroup1=="allcusGroup1"){
		 $("#SelGroup1 option").appendTo("#AviGroup1");
		 $scope.SelGroup1 = 0;
		 $scope.SelGroup5 = 0;
		 $scope.SelGroup6 = 0;
		 }
		 if($scope.cusGroup5=="allcusGroup5"){
		 $("#SelGroup5 option").appendTo("#AviGroup5");
		 $scope.SelGroup5 = 0;
		 $scope.SelGroup6 = 0;
		 }
		 if($scope.cusGroup6=="allcusGroup6"){
		 $("#SelGroup6 option").appendTo("#AviGroup6");
		 $scope.SelGroup6 = 0;
		 }
	};
 
//--------------Customer Data---------------//
  // $http.get('./Pages/CustomerListing.php').success(function(custListData) {
 // //alert(custListData);// Bind the data returned from web service to $scope	
  // $scope.CusOptionName = custListData;
  // });
//--------------SecondaryCustomer Group Data-----------//
  // $http.get('./Pages/SecCustomerListingOpt.php').success(function(secCustListData) {
 // //alert(secCustListData);// Bind the data returned from web service to $scope	
  // $scope.SecCusGroupOption1 = secCustListData;
  // $scope.SecCusOptionName = secCustListData;
  // });

//-------------------------------------------------------
});
