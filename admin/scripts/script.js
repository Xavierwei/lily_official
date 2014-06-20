(function ($) {
  var AdminModule = angular.module("adminModule", []);
  
  // Shop controller 
  AdminModule.controller("ShopForm", ["$scope", "$http", function ($scope, $http) {
    $scope.addShop = function () {
      
    };
    $scope.showToggle = function (event) {
      var el = angular.element(event.target);
      el.siblings(".control-group").toggleClass("hideme");
    };
  }]);

  // Shop Table 控制器
  AdminModule.controller("ShopTable", ["$scope", "$http", function ($scope, $http) {
      angular.element(".shop-table .table").DataTable({
        info: false,
        pageLength: 5,
        lengthChange: false
      });
  }]);

  angular.element(document).ready(function () {
    var map = new BMap.Map("shop-map");
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 14);  
  });
  
})(jQuery);