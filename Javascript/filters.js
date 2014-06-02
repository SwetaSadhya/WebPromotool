/**
Created By Sweta on 28 Jan 2014
To Fetch Customer and Product data on 
New Promotion Page 
Promo Controller
 */
 var Filters = angular.module('promoFilters', [])// Define new module for our application

 //------------Remove Duplicate filter---------------------------//
		Filters.filter('unique', function() {
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

//-----------------MultipleFilter-------------------------------//
Filters.filter('filterMultiple',['$filter',function ($filter) {
return function (items, keyObj) {
    var filterObj = {
        data:items,
        filteredData:[],
        applyFilter : function(obj,key){
            var fData = [];
            if (this.filteredData.length == 0)
                this.filteredData = this.data;
            if (obj){
                var fObj = {};
                if (!angular.isArray(obj)){
                    fObj[key] = obj;
                    fData = fData.concat($filter('filter')(this.filteredData,fObj));
                } else if (angular.isArray(obj)){
                    if (obj.length > 0){
                        for (var i=0;i<obj.length;i++){
                            if (angular.isDefined(obj[i])){
                                fObj[key] = obj[i];
                                fData = fData.concat($filter('filter')(this.filteredData,fObj));    
                            }
                        }

                    }
                }
                if (fData.length > 0){
                    this.filteredData = fData;
                }
            }
        }
    };
    if (keyObj){
        angular.forEach(keyObj,function(obj,key){
            filterObj.applyFilter(obj,key);
        });
    }
    return filterObj.filteredData;
}
}]);

//-----------------------------Range---------------------------------------//
Filters.filter('makeRange', function() {
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
//---------------------dateFilter-------------------//

