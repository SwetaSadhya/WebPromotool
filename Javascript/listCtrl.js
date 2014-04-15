var plugins = {};
function userController($scope,$http) {
    var self = this;
    $('body').layout({
        applyDemoStyles: true,
        center__onresize: function (x, ui) {
            // may be called EITHER from layout-pane.onresize OR tabs.show
            plugins.ngGridLayoutPlugin.updateGridLayout();
        }
    });
	$http.get('./promoRecords.php').success(function(data) {
	//alert(data);   // alert to show data
	//$scope.myData = [{"promotionID":"1","prmPromotionName":"promoTest","cusCustomerName":"101308,101321,101343","cusCustomerClientCode":"BAN CHUAN TRADING CO S\/B,CHOP HUP HUAT,KIM SENG HIN (MUAR) S\/B","cusGroup1Desc":"","cusGroup6Desc":""}] ;
	$scope.myData = data;
		largeLoad = function (){
	return data;
	}
    });	
	plugins.ngGridLayoutPlugin = new ngGridLayoutPlugin();
    $scope.mySelections = [];
    $scope.mySelections2 = [];
    //$scope.myData = [];
    $scope.filterOptions = {
        filterText: "",
        useExternalFilter: false,
    };
    $scope.totalServerItems = 0;
    $scope.pagingOptions = {
        pageSizes: [50,100, 250, 500, 1000], //page Sizes
        pageSize: 50, //Size of Paging data
        currentPage: 1 //what page they are currently on
    };
    self.getPagedDataAsync = function (pageSize, page, searchText) {
        setTimeout(function () {
            var data;
            if (searchText) {
                var ft = searchText.toLowerCase();
                data = largeLoad().filter(function (item) {
                    return JSON.stringify(item).toLowerCase().indexOf(ft) != -1;
                });
            } else {
                data = largeLoad();
            }
            var pagedData = data.slice((page - 1) * pageSize, page * pageSize);
            $scope.myData = pagedData;
            $scope.totalServerItems = data.length;
            if (!$scope.$$phase) {
                $scope.$apply();
            }
        }, 100);
    };
    $scope.$watch('pagingOptions', function () {
        self.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
    }, true);
    $scope.$watch('filterOptions', function () {
        self.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
    }, true);
    self.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
    $scope.gridOptions = {
		data: 'myData',
		jqueryUITheme: false,
		jqueryUIDraggable: false,
        selectedItems: $scope.mySelections,
        showSelectionCheckbox: false,
        multiSelect: true,
        showGroupPanel: false,
        showColumnMenu: false,
		showFilter: true,
        enableCellSelection: true,
        enableCellEditOnFocus: false,
		plugins: [plugins.ngGridLayoutPlugin],
        enablePaging: true,
        showFooter: true,
        totalServerItems: 'totalServerItems',
        filterOptions: $scope.filterOptions,
        pagingOptions: $scope.pagingOptions,
        columnDefs: [{ field: 'promotionID', displayName: 'PromoID' },
                     { field: 'prmPromotionName', displayName: 'PromoName'},
                     { field: 'cusCustomerName', displayName: 'CusName'},
                     { field: 'cusCustomerClientCode', displayName: 'CusCode'},
					 { field: 'cusGroup1Desc', displayName: 'Channel' }]
    };   
};