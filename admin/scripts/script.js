(function ($) {
  var AdminModule = angular.module("adminModule", []);
  
  // Shop controller 
  AdminModule.controller("ShopForm", ["$scope", "$http", function ($scope, $http) {
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    $http.defaults.transformRequest = function(data){
        if (data === undefined) {
            return data;
        }
        return $.param(data);
    };
    
    $scope.addShop = function () {
      
    };
  }]);
  
})(jQuery);