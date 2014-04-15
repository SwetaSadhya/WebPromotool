/**
Created By Sweta on 28 Jan 2014
To Fetch Promotion Detail data on 
New Promotion Page 
Detail Controller
 */
var volumeControllers = angular.module('volumeControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
volumeControllers.controller('VolumeCtrl', function($scope,$http) {	
$scope.BaselineVol = function(){
	 $("#toSelChannel option").prop("selected","selected");
	 var cusGroup1ID = $("#toSelChannel").val();
	 $("#toSelSubChannel option").prop("selected","selected");
	 var cusGroup5ID = $("#toSelSubChannel").val();
	 $("#toSelRegion option").prop("selected","selected");
	 var cusGroup6ID = $("#toSelRegion").val();
	 $("#toSelCustomer option").prop("selected","selected");
	 var customerID = $("#toSelCustomer").val();
	 $("#toSelProduct option").prop("selected","selected");
	 var ProductID = $("#toSelProduct").val();
	 var prmStartDate = $("#promoStartDate").val();
	 var prmEndDate = $("#promoEndDate").val();
	 var prmUnit = $("#promoUnit").val();
	 
	  $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
	  $http.post('./Pages/volume.php', {'prmUnit':prmUnit,'cusGroup5ID':cusGroup5ID,'cusGroup6ID':cusGroup6ID,'customerID': customerID,'ProductID': ProductID,'prmStartDate': prmStartDate,'prmEndDate': prmEndDate}).success(function(baselineData) {
			//alert(baselineData);
			$scope.prmBaselineF = baselineData;
			$scope.prmBaselineM = baselineData;
			$scope.prmBaselineL = baselineData;
			$scope.prmPlanF = baselineData;
			$scope.prmPlanM = baselineData;
			$scope.prmPlanL = baselineData;
		});
}
var barChartData = {
			labels : ["P+1","P","P-1"],
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					data : [76613,76613,0]
				},
				{
					fillColor : "rgba(197,114,114,0.5)",
					strokeColor : "rgba(201,91,91,1)",
					data : [76613,76613,0]
				},
				{
					fillColor : "rgba(93,186,133,0.5)",
					strokeColor : "rgba(74,174,117,1)",
					data : [0,0,0]
				}
			]
			
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
//-------------------------------------------------------
});
