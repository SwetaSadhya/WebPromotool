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
	$scope.myData = [{"promotionID":"2662","lstModified":"06-May-14","IOnumber":"Drafted","channel":"General Trade","type":"AMB","group":"KIDS","promoType":"Free goods(FOC)","status":"Draft","strtDate":"26-Jan-14","endDate":"08-May-14","creator":"Wouter"},
	{"promotionID":"2661","lstModified":"06-May-14","IOnumber":"Drafted","channel":"General Trade","type":"AMB","group":"KIDS","promoType":"Free goods(FOC)","status":"Draft","strtDate":"26-Jan-14","endDate":"08-May-14","creator":"Wouter"},
	{"promotionID":"2663","lstModified":"06-May-14","IOnumber":"Drafted","channel":"General Trade","type":"AMB","group":"KIDS","promoType":"Free goods(FOC)","status":"Draft","strtDate":"26-Jan-14","endDate":"08-May-14","creator":"Wouter"}] ;
	//$scope.myData = data;
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
		jqueryUITheme: true,
		jqueryUIDraggable: true,
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
        columnDefs: [{ field: 'lstModified', displayName: 'Last Modified' },
					 { field: 'promotionID', displayName: 'ID' },
					 { field: 'IOnumber', displayName: 'Promotion Code' },
                     { field: 'channel', displayName: 'Channel'},
                     { field: 'group', displayName: 'Building Block'},
					 { field: 'group', displayName: 'Region (BW)'},
					 { field: 'promoType', displayName: 'Promo Type'},
					 { field: 'status', displayName: 'Status'},
					 { field: 'strtDate', displayName: 'Start Date'},
					 { field: 'endDate', displayName: 'End Date'},
					 { field: 'creator', displayName: 'Creator' }]
    };   
};
