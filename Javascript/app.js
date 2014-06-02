/**
Created By Sweta on 28 Jan 2014
To Fetch Customer and Product data on 
New Promotion Page 
Promo Controller
 */
 var promo = angular.module('promo', [
 'promoFilters',
 'promotionControllers',
 'customerControllers',
 'productControllers',
 'detailControllers',
 'volumeControllers',
 'formControllers',
 'ui.bootstrap'
 ])// Define new module for our application

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