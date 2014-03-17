/**
Created By Sweta on 28 Jan 2014
To Fetch Customer and Product data on 
New Promotion Page 
Promo Controller
 */
 var promo = angular.module('promo', [
 'customerControllers',
 'productControllers',
 'detailControllers',
 'ui.bootstrap'
 ])// Define new module for our application

   //------------Remove Duplicate filter---------------------------//
		promo.filter('unique', function() {
    return function(input, key) {
        var unique = {};
        var uniqueList = [];
        for(var i = 0; i < input.length; i++){
            if(typeof unique[input[i][key]] == "undefined"){
                unique[input[i][key]] = "";
                uniqueList.push(input[i]);
            }
        }
        return uniqueList; 
    };
});

//------------Tab Control--------------------------//
var TabsDemoCtrl = function ($scope) {        // Create new controller, that accepts two services $scope and $http	
  //------ Moving Data MultipleBox----------------//
 $scope.moveItems = function(sourceid, destinationid) {
	$("#"+sourceid+"  option:selected").appendTo("#"+destinationid);
			
 };
 //------ Moving Data MultipleBox----------------//
  $scope.moveAllItems = function(sourceid, destinationid) {	
   $("#"+sourceid+"  option").appendTo("#"+destinationid);
 };
 
//--------------------------------------
};
//-------------UI Button Controller----------------------
var FrmController = function ($scope,$http) { 
 $scope.CheckValue = function() {
 //alert("erwer");
 $("#toSelChannel option").prop("selected","selected");
 var SelCusChannel = $("#toSelChannel").val();
 $("#toSelSubChannel option").prop("selected","selected");
 var SelCusSubChannel = $("#toSelSubChannel").val();
 $("#toSelRegion option").prop("selected","selected");
 var SelCusRegion = $("#toSelRegion").val();
 $("#toSelCustomer option").prop("selected","selected");
 var SelCustomer = $("#toSelCustomer").val();
 var SelPrdBlock = $("#prdBlock").val();
 var SelPrdGroup = $("#prdGroup").val();
 var SelPrdBrand = $("#prdGroup").val();
 $("#toSelProduct option").prop("selected","selected");
 var SelProduct = $("#toSelProduct").val();
 var promoObjective = $("#promoObjective").val();
 var promoStructure = $("#promoStructure").val();
 var promoType = $("#promoType").val();
 var promoUnit = $("#promoUnit").val();
 var promoTitle = $("#promoTitle").val();
if(SelProduct == null){
	alert("Choose One Product");
 }else if(promoTitle == ""){
	alert("Title cannot be empty");
 }else{
 $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
 $http.post('./test.php', {'SelCusChannel': SelCusChannel,'SelCusSubChannel': SelCusSubChannel,'SelCusRegion': SelCusRegion,'SelCustomer': SelCustomer,'SelPrdBlock': SelPrdBlock,'SelPrdGroup': SelPrdGroup,'SelPrdBrand': SelPrdBrand,'SelProduct': SelProduct,'promoObjective': promoObjective,'promoStructure': promoStructure,'promoType': promoType,'promoUnit': promoUnit,'promoTitle': promoTitle}
                   ).success(function(data) {
					//alert(data);
					window.location = 'Index.html';
				  });
 }
//------------
 }
//-------------------
}
//---------------------Generic Function to call HTML pages------------//
// configure our routes
// promo.config(function($routeProvider) {
 // $routeProvider.
     // // route for the Customer page
			// when('/customer', {
				// templateUrl : './Partials/Customer.html',
				// controller  : 'CustomerListCtrl',
				// reloadOnSearch: false
			// }).
	// // route for the Product page
			// when('/product', {
				// templateUrl : './Partials/Product.html',
				// controller  : 'ProductListCtrl',
				// reloadOnSearch: false
			// }).
	// // route for the Detail page
			// when('/detail', {
				// templateUrl : './Partials/Detail.html',
				// controller  : 'DetailCtrl'
			// }).
			// otherwise({
        // redirectTo: '/customer'
      // });

	// });

