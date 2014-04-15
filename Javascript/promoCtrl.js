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
 'volumeControllers',
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

//-----------------Filter-------------------------------//
promo.filter('filterMultiple',['$filter',function ($filter) {
	return function (items, keyObj) {
		var filterObj = {
							data:items,
							filteredData:[],
							applyFilter : function(obj,key){
								var fData = [];
								if(this.filteredData.length == 0)
									this.filteredData = this.data;
								if(obj){
									var fObj = {};
									if(angular.isString(obj)){
										fObj[key] = obj;
										fData = fData.concat($filter('filter')(this.filteredData,fObj));
									}else if(angular.isArray(obj)){
										if(obj.length > 0){	
											for(var i=0;i<obj.length;i++){
												if(angular.isString(obj[i])){
													fObj[key] = obj[i];
													fData = fData.concat($filter('filter')(this.filteredData,fObj));	
												}
											}
											
										}										
									}									
									if(fData.length > 0){
										this.filteredData = fData;
									}
								}
							}
				};

		if(keyObj){
			angular.forEach(keyObj,function(obj,key){
				filterObj.applyFilter(obj,key);
			});			
		}
		
		return filterObj.filteredData;
	}
}]);

//-----------------------------Range---------------------------------------//
promo.filter('makeRange', function() {
        return function(input) {
            var lowBound, highBound;
            switch (input.length) {
            case 1:
                lowBound = 0;
                highBound = parseInt(input[0]) - 1;
                break;
            case 2:
                lowBound = parseInt(input[0]);
                highBound = parseInt(input[1]);
                break;
            default:
                return input;
            }
            var result = [];
            for (var i = lowBound; i <= highBound; i++)
                result.push(i);
            return result;
        };
    });
//------------Tab Control--------------------------//
var TabsDemoCtrl = function ($scope,$http) {        // Create new controller, that accepts two services $scope and $http	
 $scope.imageSource = './Images/BudgetOverview.png';
 //------ Moving Data MultipleBox----------------//
 $scope.moveItems = function(sourceid, destinationid) {
	$("#"+sourceid+"  option:selected").appendTo("#"+destinationid);
 };
 //------ Moving Data MultipleBox----------------//
  $scope.moveAllItems = function(sourceid, destinationid) {	
   $("#"+sourceid+"  option").appendTo("#"+destinationid);
 };
//--------------Product Detail Data-----------//
$scope.SelprdID = function(PrdOptionName) {
//--------------Product Detail Data-----------//
$("#toSelProduct option").prop("selected","selected");
 var selPrd = $("#toSelProduct").val();
	if(selPrd!=null){
		$http.post('./Pages/ProductGroup.php', {'prdID': selPrd}).success(function(selPrdID) {
			//alert(selPrdID);// Bind the data returned from web service to $scope
		$scope.count = selPrdID.length;
		$scope.promoPrdAll = selPrdID;
		$scope.promoPrdProductID = selPrdID;
		$scope.promoPrdBuildingBlock = selPrdID;
		$scope.promoPrdProductGroup = selPrdID;
		$scope.promoPrdBrand = selPrdID;
		$scope.promoProductVolume = selPrdID;
	});
  }	
 }

//--------------------------------------
};

//-------------UI Button Controller----------------------
 var FrmController = function ($scope,$http) { 
	 $scope.checkSubmit = function ()
	 {
	 //-------------------Customer Tab---------------------//
	  var channel = $("#channel:checked").val();
	  var subchannel = $("#subchannel:checked").val();
	  var region = $("#region:checked").val();
	  var customer = $("#customer:checked").val();
	  var outlettype = $("#outlettype:checked").val();
	  var seccustomer = $("#seccustomer:checked").val();
		 $("#toSelChannel option").prop("selected","selected");
		 var cusGroup1ID = $("#toSelChannel").val();
		 $("#toSelSubChannel option").prop("selected","selected");
		 var cusGroup5ID = $("#toSelSubChannel").val();
		 $("#toSelRegion option").prop("selected","selected");
		 var cusGroup6ID = $("#toSelRegion").val();
		 $("#toSelCustomer option").prop("selected","selected");
		 var customerID = $("#toSelCustomer").val();
		 $("#toSelOutletType option").prop("selected","selected");
		 var secGroup1ID = $("#toSelOutletType").val();
		 $("#toSelsecCustomer option").prop("selected","selected");
		 var secondaryCustomerID = $("#toSelsecCustomer").val();
		//-----------------------Product Tab-------------//
		var prdGroup7ID = $("#prdBlock").val();
		var prdGroup9ID = $("#prdGroup").val();
		var prdGroup4ID = $("#prdBrand").val();
		var prdGroup14ID = $("#prdFlavour").val();
		var prdGroup15ID = $("#prdPackSize").val();
		$("#toSelProduct option").prop("selected","selected");
		var ProductID = $("#toSelProduct").val();
		
		//----------------------Details-----------------------------//
		var prmCode = $("#promoCode").val();
		var prmObjectiveID = $("#prmObjective").val();
		var prmStructure = $("#promoStructure").val();
		var prmParentStructureID = $("#promoParentStructure").val();
		var prmTypeID = $("#promoType").val();
		var	arr = prmTypeID.split(',');
		var prmTypeParent = arr[1];
		var prmUnitID = $("#promoUnit").val();
		var prmBudgetOwnerID = $("#promoBudgetOwner").val();
		var prmDesc = $("#promoDesc").val();
		var prmStartDate = $("#promoStartDate").val();
		var prmEndDate = $("#promoEndDate").val();
		
		//------------------Promotion Type-------------------------//
		var promoID = "";
		var promoID = $("#promoID").val();
		alert(promoID);
		var prmProductType = $("#promoProductType").val();
		if(prmProductType!=""){
		var prmProductValue = $("#promoPrd"+prmProductType).val();
		}
		var prmVolReq = $("#promoVolReq").val();
		var prmSelloutRebate = $("#promoSelloutRebate").val();
		var prmCusPoints = $("#promoCusPoints").val();
		var prmPreQty = $("#promoPreQty").val();
		var prmSelloutRebateL = $("#promoSelloutRebateL").val();
		var prmMailCost = $("#promoMailCost").val();
		var prmMaterialCost = $("#promoMaterialCost").val();
		var prmPremiumCost = $("#promoPremiumCost").val();
		var prmPremiumQty = $("#promoPremiumQty").val();
		//-------------------------Volume-----------------------//
		var prdVolumesType = $("#prdVolumesType:checked").val();
		var prmBaselineF = $("#prmBaselineF").val();
		//------------Validate-------------------------------------//
		if(channel=="channel" && cusGroup1ID==null){
	    alert("Channel Not Selected");
	    }else if(subchannel=="subchannel" && cusGroup5ID==null){
		alert("SubChannel Not Selected");
		}else if(region=="region" && cusGroup6ID==null){
		alert("Region Not Selected");
		}else if(customer=="customer" && customerID==null){
		alert("Customer Not Selected");
		}else if(outlettype=="outlettype" && secGroup1ID==null){
		alert("Outlet Type Not Selected");
		}else if(seccustomer=="seccustomer" && secondaryCustomerID==null){
		alert("Outlet Not Selected");
		}else if(ProductID==null){
		alert('Select Product');
		}else if(prmCode==""){
		alert('Enter Promo Code');
		}else{ 
		$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
		$http.post('./Pages/insert.php', {'seccustomer':seccustomer,'outlettype':outlettype,'customer':customer,'region': region,'subchannel':subchannel,'channel':channel,'cusGroup1ID': cusGroup1ID,'cusGroup5ID': cusGroup5ID,'cusGroup6ID': cusGroup6ID,'customerID': customerID,'secondaryCustomerID': secondaryCustomerID,
		'prdGroup7ID': prdGroup7ID,'prdGroup9ID': prdGroup9ID,'prdGroup4ID': prdGroup4ID,'prdGroup14ID': prdGroup14ID,'prdGroup15ID': prdGroup15ID,'ProductID': ProductID,
		'prmObjectiveID': prmObjectiveID,'prmStructure': prmStructure,'prmParentStructureID': prmParentStructureID,'prmTypeID': prmTypeID,'prmTypeParent' : prmTypeParent,
		'prmUnitID': prmUnitID,'prmBudgetOwnerID': prmBudgetOwnerID,'prmCode': prmCode,'prmDesc':prmDesc,'prmStartDate':prmStartDate,'prmEndDate':prmEndDate,
		'prmProductType': prmProductType,'prmProductValue': prmProductValue,'prmVolReq': prmVolReq,'promoID':promoID,
		'prmSelloutRebate': prmSelloutRebate,'prmSelloutRebateL': prmSelloutRebateL,
		'prmCusPoints': prmCusPoints,'prmPreQty': prmPreQty,'prmSelloutRebateL': prmSelloutRebateL,'prmMailCost': prmMailCost,'prmMaterialCost': prmMaterialCost,'prmPremiumCost':prmPremiumCost,'prmPremiumQty':prmPremiumQty,
		'prdVolumesType': prdVolumesType,'prmBaselineF': prmBaselineF}).success(function(data) {
			alert(data);
			$scope.promoID = data;
		});
		}
		
//-------------------
}
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

