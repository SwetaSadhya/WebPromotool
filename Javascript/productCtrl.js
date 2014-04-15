/**
Created By Sweta on 28 Jan 2014
To Fetch Product data on 
New Promotion Page 
Product Controller
 */
var productControllers = angular.module('productControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
productControllers.controller('ProductListCtrl', function($scope,$http) {
$scope.list = "test";
//--------------Product Detail Data-----------//
  $http.get('./Pages/ProductListing.php').success(function(productListing) {
 //alert(productListing);// Bind the data returned from web service to $scope
  $scope.PrdOptionName = productListing;
  });
//--------------Product Select Option Detail Data-----------//
  $http.get('./Pages/ProductGroup.php').success(function(productGroup) {
 //alert(productGroup);// Bind the data returned from web service to $scope
  $scope.selectedPrdOptionBrand = "select";
  $scope.selectedPrdOptionBlock = "select";
  $scope.selectedPrdOptionGroup = "select";
  $scope.selectedPrdOptionFlavour = "select";
  $scope.selectedPrdOptionPackSize = "select";
  $scope.selectedPrdParentCode = "select";
  $scope.PrdGroupOption4 = productGroup;
  $scope.PrdGroupOption7 = productGroup;
  $scope.PrdGroupOption9 = productGroup;
  $scope.PrdGroupOption14 = productGroup;
  $scope.PrdGroupOption15 = productGroup;
  $scope.prdParentCode = productGroup;
  });		
//-------------------------------------------------------
});
