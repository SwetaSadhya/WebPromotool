/**
Created By Sweta on 28 Jan 2014
To Fetch Customer data on 
New Promotion Page 
Customer Controller
 */
var customerControllers = angular.module('customerControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
customerControllers.controller('CustomerListCtrl', function($scope,$http) {	
//------------Declare--------------------------//
$scope.custGroup = [];
$scope.custData = [];
//--------------------Controls-------------------//
 $http.get('./Pages/PriCustGroup.php').success(function(response) {
 //alert(response);// Bind the data returned from web service to $scope
   $scope.custGroup = response;
    for(var i=0;i<$scope.custGroup.length;i++){
	
	 if($scope.custGroup[i].Group == 'CusGroup1'){
		$scope.txtCusGroup1 = "Distributed Channel"
	    $scope.CusGroup1 = true; 
		}
	 if ($scope.custGroup[i].Group == 'CusGroup5'){
	    $scope.txtCusGroup5 = $scope.custGroup[i].GroupName;
		$scope.CusGroup5 = true; 
		}
	 if ($scope.custGroup[i].Group == 'CusGroup6'){
		$scope.txtCusGroup6 = $scope.custGroup[i].GroupName;
		$scope.CusGroup6 = true; 
		}
	}
  });
//--------------Customer Group Data-----------//
  $http.get('./Pages/CustomerGroup.php').success(function(response) {
 //alert(response);// Bind the data returned from web service to $scope
   $scope.custData = response;
  });
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
//---------------------Show and Hide Div-----------------//
 $scope.isShown = function(show) {
	if(show == 'cusGroup1'){
	 $scope.AviCusGroup1 = $scope.custData;
	 return show === $scope.cusGroup1;
	}else if(show == 'cusGroup5'){
	 $scope.AviCusGroup5 = $scope.custData;
	 return show === $scope.cusGroup5;
	}else if(show == 'cusGroup6'){
	 $scope.AviCusGroup6 = $scope.custData;
	 return show === $scope.cusGroup6;
	}else if(show == 'customer'){
	 $scope.AviCus = $scope.custData;
	 return show === $scope.customer;
	}else if(show == 'outlettype'){
	 return show === $scope.outlettype;
	}else if(show == 'seccustomer'){
	 return show === $scope.seccustomer;
	}else{
	 return false;
	}
};
//------ Moving Data MultipleBox----------------//
 $scope.moveCustomers = function(sourceid, destinationid) {
  $("#"+sourceid+"  option:selected").appendTo("#"+destinationid);
  $("#"+destinationid).prop("selected","selected");
  this.cusFiltering();
 };
  $scope.moveAllCustomers = function(sourceid, destinationid) {	
   $("#"+sourceid+"  option").appendTo("#"+destinationid);
   $("#"+destinationid).prop("selected","selected");
   this.cusFiltering();
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


//-------------------------------------------------------
});
