<!doctype html>
<html ng-app="plunker">
  <head>
   <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="./Styles/bootstrap/bootstrap.css" />
	<link href="./Styles/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="./Styles/grid/grid.css" />
	<link rel="stylesheet" type="text/css" href="./Styles/bootstrap/bootstrap-responsive.min.css" />
	<link rel="stylesheet" type="text/css" href="./Styles/assets/styles.css" />
	<link rel="stylesheet" type="text/css" href="./Styles/assets/datepicker.css" />
	<!-- Jquery & Angular  Files -->
    <script type="text/javascript" src="./Library/jquery/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="./Library/jquery/jquery-ui-1.9.1.custom.min.js"></script> 
    <script type="text/javascript" src="./Library/jquery/jquery.layout-latest.min.js"></script>  
    <script type="text/javascript" src="./Library/angular/angular.js"></script>
	<script type="text/javascript" src="./Library/bootstrap/bootstrap-tab.js"></script>
	<script type="text/javascript" src="./Library/bootstrap/bootstrap-datepicker.js"></script>
	<!-- Grid Files -->
	<script type="text/javascript" src="./Library/grid/plugins/ng-grid-layout.js"></script> 
    <script type="text/javascript" src="./Library/grid/build/ng-grid.debug.js"></script>
	<script type="text/javascript" src="./Library/barchart/barchart.js"></script>
    <script type="text/javascript" src="./Javascript/listCtrl.js"></script> 
	<script type="text/javascript" src="./Javascript/customerCtrl.js"></script> 
	<script type="text/javascript" src="./Javascript/productCtrl.js"></script> 
	<script type="text/javascript" src="./Javascript/detailCtrl.js"></script>
	<script type="text/javascript" src="./Javascript/volumeCtrl.js"></script> 	
    <script type="text/javascript" src="./Javascript/promoCtrl.js"></script>
	<script src="example.js"></script>
  </head>
  <body>

<div ng-controller="ModalDemoCtrl">
    <script type="text/ng-template" id="123.html">
        <div class = "modal-header">
            <h3>Promotion Details</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" ng-click="ok()">OK</button>
            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        </div>
    </script>

    <button class="btn btn-default" ng-click="open()">Open me!</button>
    <div ng-show="selected">Selection from a modal: {{ selected }}</div>
</div>
<?php

?>
  </body>
</html>