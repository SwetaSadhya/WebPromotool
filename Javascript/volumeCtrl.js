/**
Created By Sweta on 28 Jan 2014
To Fetch Promotion Detail data on 
New Promotion Page 
Detail Controller
 */
var volumeControllers = angular.module('volumeControllers', [])// Define new module for our application
//------------Contoller For Customer Tabs-------------------------//
volumeControllers.controller('VolumeCtrl', function($scope,$http) {	
$scope.selectedpromoProductVolume = 0;
//-------------------Baseline Volumes--------------------------//
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
	 var arrUnit = $("#promoUnit").val().split(',');
	 var prmUnit = arrUnit[0];
	 $scope.error = [];
     $scope.baseline = [];
	  $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
	  $http.post('./Pages/volume.php', {'prmUnit':prmUnit,'cusGroup5ID':cusGroup5ID,'cusGroup6ID':cusGroup6ID,'customerID': customerID,'ProductID': ProductID,'prmStartDate': prmStartDate,'prmEndDate': prmEndDate}).success(function(data) {
			if(data.baseline!='0'){
			$scope.baseline.push(data.baseline);
			$scope.prmBaselineF = $scope.baseline;
			$scope.prmBaselineM = $scope.baseline;
			$scope.prmBaselineL = $scope.baseline;
			}else{
			$scope.error.push(data.error);
			alert($scope.error)
			}
	});
	//---------------------12 Months Data---------------------//
	 alert("Less than twelve moth data available.");
	 
	this.Barchart();
}
//----------------------Plan Volumes-------------------//
$scope.PlanVol = function(){
			$scope.prmPlanF = $scope.prmBaselineF;
			$scope.prmPlanM = $scope.prmBaselineM;
			$scope.prmPlanL = $scope.prmBaselineL;

			this.Barchart();
			}

//-------------------Graph---------------------------------//	
//$scope.Barchart = function(){
var barChartData = {
			labels : ["P+1","P","P-1"],
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					data : [$scope.prmBaselineF,$scope.prmBaselineM,$scope.prmBaselineL]
				},
				{
					fillColor : "rgba(197,114,114,0.5)",
					strokeColor : "rgba(201,91,91,1)",
					data : [$scope.prmPlanF,$scope.prmPlanM,$scope.prmPlanL]
				},
				{
					fillColor : "rgba(93,186,133,0.5)",
					strokeColor : "rgba(74,174,117,1)",
					data : [$scope.prmActualF,$scope.prmActualM,$scope.prmActualL]
				}
			]
			
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
		
//}	
		






//-------------------------------------------------------
});
