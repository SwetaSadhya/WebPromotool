/**
Created By Sweta on 28 Jan 2014
To Fetch Customer data on 
New Promotion Page 
Customer Controller
 */
var customerControllers = angular.module('customerControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
customerControllers.controller('CustomerListCtrl', function($scope,$http) {	

//--------------Customer Group Data-----------//
  $http.get('./Pages/CustomerGroup.php').success(function(custGroupData) {
 //alert(custGroupData);// Bind the data returned from web service to $scope	
  $scope.CusGroupOption1 = custGroupData;
  $scope.CusGroupOption5 = custGroupData;
  $scope.CusGroupOption6 = custGroupData;
  });
 //--------------Customer Group Data-----------//
  $http.get('./Pages/CustomerListing.php').success(function(custListData) {
 //alert(custListData);// Bind the data returned from web service to $scope	
  $scope.CusOptionName = custListData;
  });
 //------------Setting Groups w.r.t Group1-------//
$scope.changeGroupItems1 = function(CusGroupOption1){
			$("#toSelChannel option").prop("selected","selected");
			var selectedGroup1Values = $("#toSelChannel").val();
			$("#toSelSubChannel option").prop("selected","selected");
			var selectedGroup2Values = $("#toSelSubChannel").val();
			$("#toSelRegion option").prop("selected","selected");
			var selectedGroup3Values = $("#toSelRegion").val();
			//---------Selection Of GroupCombo Box--------// 
			$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
			$http.post('./Pages/CustomerHierarchyListing.php', {'data1': selectedGroup1Values,'data2': selectedGroup2Values,'data3': selectedGroup3Values}
                   ).success(function(cusHierarchyDesc1) {
				   if(cusHierarchyDesc1!=""){
					$scope.CusGroupOption5 = cusHierarchyDesc1;
					$scope.CusGroupOption6 = cusHierarchyDesc1;
					$scope.CusOptionName = cusHierarchyDesc1;
					}else{
					$scope.CusGroupOption5 = CusGroupOption1;
					$scope.CusGroupOption6 = CusGroupOption1;
					$scope.CusOptionName = CusGroupOption1;
					}
				  });
				
				
}  
//------------Setting Groups w.r.t Group2-------//
$scope.changeGroupItems2 = function(CusGroupOption5){
			$("#toSelChannel option").prop("selected","selected");
			var selectedGroup1Values = $("#toSelChannel").val();
			$("#toSelSubChannel option").prop("selected","selected");
			var selectedGroup2Values = $("#toSelSubChannel").val();
			$("#toSelRegion option").prop("selected","selected");
			var selectedGroup3Values = $("#toSelRegion").val();
			//---------Selection Of GroupCombo Box--------// 
			$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
			$http.post('./Pages/CustomerHierarchyListing.php', {'data1': selectedGroup1Values,'data2': selectedGroup2Values,'data3': selectedGroup3Values}
                   ).success(function(cusHierarchyDesc2) {
				   if(cusHierarchyDesc2!=""){
				   $scope.CusOptionName = cusHierarchyDesc2;
				   $scope.CusGroupOption6 = cusHierarchyDesc2;
				   }else{
				   $scope.result2= CusGroupOption5;
				   $scope.CusGroupOption6 = CusGroupOption5;
				   $scope.CusOptionName = CusGroupOption5;
				   }
				  });
}  
//------------Setting Groups w.r.t Group2-------//
$scope.changeGroupItems3 = function(CusGroupOption6){
			$("#toSelChannel option").prop("selected","selected");
			var selectedGroup1Values = $("#toSelChannel").val();
			$("#toSelSubChannel option").prop("selected","selected");
			var selectedGroup2Values = $("#toSelSubChannel").val();
			$("#toSelRegion option").prop("selected","selected");
			var selectedGroup3Values = $("#toSelRegion").val();
			//---------Selection Of GroupCombo Box--------// 
			$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
			$http.post('./Pages/CustomerHierarchyListing.php', {'data1': selectedGroup1Values,'data2': selectedGroup2Values,'data3': selectedGroup3Values}
                   ).success(function(cusHierarchyDesc3) {
				   if(cusHierarchyDesc3!=""){
					$scope.CusOptionName = cusHierarchyDesc3;
					}else{
					$scope.CusOptionName = CusGroupOption6;
					}
				  });
}
//-------------------------------------------------------
});
