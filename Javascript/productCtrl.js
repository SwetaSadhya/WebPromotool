/**
Created By Sweta on 28 Jan 2014
To Fetch Product data on 
New Promotion Page 
Product Controller
 */
var productControllers = angular.module('productControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
productControllers.controller('ProductListCtrl', function($scope,$http) {	
//--------------Product Detail Data-----------//
  $http.get('./Pages/ProductGroup.php').success(function(productListing) {
 //alert(productListing);// Bind the data returned from web service to $scope
  $scope.PrdOptionName = productListing;
  });
//--------------Product Select Option Detail Data-----------//
  $http.get('./Pages/ProductGroup.php').success(function(productGroup) {
 //alert(productGroup);// Bind the data returned from web service to $scope
  $scope.selectedPrdOptionBrand = '0';
  $scope.selectedPrdOptionBlock = '0';
  $scope.selectedPrdOptionGroup = '0';
  $scope.PrdGroupOption4 = productGroup;
  $scope.PrdGroupOption7 = productGroup;
  $scope.PrdGroupOption9 = productGroup;
  });		
//------------Setting ProductGroups w.r.t ProductGroup1-------//
$scope.changePrdGroupItems1 = function(PrdGroupOption7){
$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
			//---------Selection Of GroupCombo Box--------// 
			$http.post('./Pages/ProductHierarchyListing.php', {'data7': $scope.selectedPrdOptionBlock,'data9': $scope.selectedPrdOptionGroup,'data4': $scope.selectedPrdOptionBrand}
                   ).success(function(prdHierarchyDesc1) {
				   if(prdHierarchyDesc1!=""){
					$scope.PrdGroupOption9 = prdHierarchyDesc1;
					$scope.PrdGroupOption4 = prdHierarchyDesc1;
					$scope.PrdOptionName = prdHierarchyDesc1;
					}else{
					$scope.PrdGroupOption9 = PrdGroupOption7;
					$scope.PrdGroupOption4 = PrdGroupOption7;
					$scope.PrdOptionName = PrdGroupOption7;
					}
				 });

}  
//------------Setting ProductGroups w.r.t ProductGroup2-------//
$scope.changePrdGroupItems2 = function(PrdOption9){
			//---------Selection Of GroupCombo Box--------// 
			$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
			$http.post('./Pages/ProductHierarchyListing.php', {'data7': $scope.selectedPrdOptionBlock,'data9': $scope.selectedPrdOptionGroup,'data4': $scope.selectedPrdOptionBrand}
                   ).success(function(prdHierarchyDesc2) {
				   if(prdHierarchyDesc2!=""){
				   $scope.PrdGroupOption4 = prdHierarchyDesc2;
				   $scope.PrdOptionName = prdHierarchyDesc2;
				   }else{
				   $scope.PrdGroupOption4 = PrdOption9;
				   $scope.PrdOptionName = PrdOption9;
				   }	
				  });
}  
//------------Setting ProductGroups w.r.t ProductGroup2-------//
$scope.changePrdGroupItems3 = function(PrdPrdOption4){
			//---------Selection Of GroupCombo Box--------// 
			$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
			$http.post('./Pages/ProductHierarchyListing.php', {'data7': $scope.selectedPrdOptionBlock,'data9': $scope.selectedPrdOptionGroup,'data4': $scope.selectedPrdOptionBrand}
                   ).success(function(prdHierarchyDesc3) {
				    if(prdHierarchyDesc3!=""){
					$scope.PrdOptionName = prdHierarchyDesc3;
					}else{
					$scope.PrdOptionName = PrdPrdOption4;
					}
				  });
} 
//-------------------------------------------------------
});
