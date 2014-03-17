<!DOCTYPE html>
<html ng-app="myapp">

<head>
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="./Styles/bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./Styles/grid/grid.css" />
	<link rel="stylesheet" type="text/css" href="./Styles/bootstrap/bootstrap.min.css" />
	<!-- Jquery & Angular  Files -->
    <script type="text/javascript" src="./Library/jquery/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="./Library/jquery/jquery-ui-1.9.1.custom.min.js"></script> 
    <script type="text/javascript" src="./Library/jquery/jquery.layout-latest.min.js"></script>  
    <script type="text/javascript" src="./Library/angular/angular.js"></script>
	<script type="text/javascript" src="./Library/bootstrap/bootstrap-tab.js"></script>
	<!-- Grid Files -->
	<script type="text/javascript" src="./Library/grid/plugins/ng-grid-layout.js"></script> 
    <script type="text/javascript" src="./Library/grid/build/ng-grid.debug.js"></script>
    <script type="text/javascript" src="./Javascript/listCtrl.js"></script> 
	<script type="text/javascript" src="./Javascript/customerCtrl.js"></script> 
	<script type="text/javascript" src="./Javascript/productCtrl.js"></script> 
	<script type="text/javascript" src="./Javascript/detailCtrl.js"></script> 
    <script type="text/javascript" src="./Javascript/promoCtrl.js"></script>
  <script src="//angular-ui.github.io/ui-router/release/angular-ui-router.js"></script> 
</head>

<body class="container">
  <div class="navbar">
    <div class="navbar-inner">This is test
      <ul class="nav">sdfdsfsdfdsfdsdfsdfdfdsfd
        <li><a ui-sref="route1">Route 1</a></li>
        <li><a ui-sref="route2">Route 2</a></li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="span12">
      <div class="well" ui-view></div>        
    </div>
  </div>         
  


  
  <!-- App Script -->
  <script>
    var myapp = angular.module('myapp', ["ui.router"])
    myapp.config(function($stateProvider, $urlRouterProvider){
      //gjhagdjahsgdj//
      // For any unmatched url, send to /route1
      $urlRouterProvider.otherwise("/")
      
      $stateProvider
        .state('route1', {
            url: "",
            templateUrl: "Partials/Customer.html",
			controller  : 'CustomerListCtrl',
			
        })
          
        .state('route2', {
            url: "",
            templateUrl: "Partials/Product.html",
			controller  : 'ProductListCtrl',
			
        })
         
    })

  </script>

</body>

</html>