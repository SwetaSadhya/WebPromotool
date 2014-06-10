/**
Created By Sweta on 28 Jan 2014
To Fetch Product data on 
New Promotion Page 
Product Controller
 */
var productControllers = angular.module('productControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
productControllers.controller('ProductListCtrl', function($scope,$http) {
//----------Declaration----------------------//
$scope.prdSales = false;
$scope.prdFiltered = [];
$scope.SelProduct = [];
//--------------Product Detail Data-----------//
  // $http.get('./Pages/ProductListing.php').success(function(response) {
 // //alert(response);// Bind the data returned from web service to $scope
  // $scope.PrdOptionName = response;
  // });
//--------------Product Select Option Detail Data-----------//
  $http.get('./Pages/PritransProduct.php').success(function(response) {
 //alert(response);// Bind the data returned from web service to $scope
  $scope.prdData = response;
  $scope.PrdGroupOption4 = $scope.prdData;
  $scope.PrdGroupOption7 = $scope.prdData;
  $scope.PrdGroupOption9 = $scope.prdData;
  $scope.PrdGroupOption14 = $scope.prdData;
  $scope.PrdGroupOption15 = $scope.prdData;
  $scope.prdParentCode = $scope.prdData;
  $scope.AviProduct = $scope.prdData;
  });
//------ Moving Data MultipleBox----------------//
 $scope.moveProducts = function() {
 var products = $scope.prdData;
 if($scope.selectedAviProduct!= ""){
	 $.each(products, function (index, product){
	for(var i=0;i<$scope.selectedAviProduct.length;i++) {
	if (product.ProductID == $scope.selectedAviProduct[i])
	 {  $scope.SelProduct.push(product);}}});
 }
 };
//-------------------Product Pre Sales-----------------------------//
  $scope.prdPreSales = function(Product){
  if($scope.prdSales==true){
   $scope.customer = [];
   $scope.AviProduct = [];
   $("#SelCustomer option").prop("selected","selected"); 
   var selCustomerID = $("#SelCustomer").val();  
   var prdData = $scope.prdData;
   if(selCustomerID!= null){
   $.each(prdData, function (index, value){
	for(var i=0;i<selCustomerID.length;i++) {
	if (value.CustomerID == selCustomerID[i])
	 {  $scope.prdFiltered.push(value);}}});
	var filPrds = $scope.prdFiltered;
	}else{
	var filPrds = $scope.prdData;
	}
	var date = new Date(); date.setMonth(date.getMonth() - 3);
	var date_ago = date.getDate(); var month_ago = date.getMonth()+1; var year_ago = date.getFullYear();
	var monthAgo = "'"+year_ago + "-" + month_ago + "-" + date_ago+"'";
	var today = new Date(); var date_current = today.getDate(); var month_current = today.getMonth()+1; var year_current = today.getFullYear();
	var currentDate = "'"+year_current + "-" + month_current + "-" + date_current+"'";
	
	//var currentDate = '2013-10-31';//testing
	//var monthAgo = '2013-10-24';//testing
	
	if (filPrds && filPrds.length > 0)
	{ $.each(filPrds, function (index, Prd){
	if(Prd.prtDayDate!=null){
	var prdPrtDate = Prd.prtDayDate;
	if (prdPrtDate <= currentDate && prdPrtDate >= monthAgo)
	 { $scope.AviProduct.push(Prd);}}});
	 if($scope.AviProduct.length == 0){
		alert("No Sales Records for Three Months.");
	 }}
    }else{
	  $scope.AviProduct = $scope.prdData;
	 }
  }
//-------------------------------------------------------
});
