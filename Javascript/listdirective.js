/**
Directive to buit the layout
*/
var listView = angular.module('listView',['ngGrid','ui.bootstrap']);

//---------------Layout----------------------------//
// listView.directive('layoutContainer', function() {
    // return {        
        
        // link: function(scope, elm, attrs) {
            // var layout = elm.layout({ applyDefaultStyles: true });

            // scope.layout  = layout;
            
            // scope.$watch(attrs.layout, function() {
                    // scope.layout.sizePane('west', 300);
					// scope.layout.hide('east');
                    // scope.layout.show('south');
                    // scope.layout.sizePane('north', 120);               
            // });                
        // }
    // };
// });
//-----------------MultipleFilter-------------------------------//
listView.filter('filterMultiple',['$filter',function ($filter) {
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
