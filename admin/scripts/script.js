(function ($) {
  var AdminModule = angular.module("adminModule", []);
  
  // Shop controller 
  AdminModule.controller("ShopForm", ["$scope", "$http", "$location", function ($scope, $http, $location) {
    $scope.image = {};
    $scope.image.items = [];
    $scope.image.uris = [];
    $scope.shop = {};
    
    $scope.addShop = function () {
      if ($scope.shopform.$valid) {
        $http({
          method: "POST",
          url: window.baseurl + "/api/shop/add",
          data: $.param($scope.shop),
          headers: {"Content-Type": "application/x-www-form-urlencoded"}
        })
        .success(function (data) {
          window.location = (window.baseurl + "/shop/index");
        });
      }
      else {
        alert("表单验证失败");
      }
    };
    
    $scope.showToggle = function (event) {
      var el = angular.element(event.target);
      el.siblings(".control-group").toggleClass("hideme");
    };
    
    $scope.removeUploadItem = function (event) {
      var el = angular.element(event.target);
      el.parent().remove();
      angular.element("input[name='shop_star_image']").val("");
    };
    
    // 初始化
    $scope.init = function () {
      var shop_id = angular.element("input[name='shop_id']").val();
      if (shop_id) {
        $http({
          method: "get",
          url: window.baseurl + "/api/shop/index",
          params: ({shop_id: shop_id}),
          contentType: false
        }).success(function (data) {
          if (typeof data["status"] != "undefined") {
            $scope.shop = data["data"];
            $scope.image.items = [{src: $scope.shop.shop_star_image}];
          }
        });
      }
    };
    
    // 事件绑定
    angular.element(document).ready(function () {
      // 百度地图
      var map = new BMap.Map("shop-map");
      map.enableDragging();
      map.centerAndZoom(new BMap.Point(121.48, 31.22), 15);  
      map.addControl(new BMap.ScaleControl());
      map.addControl(new BMap.NavigationControl()); 
      map.addEventListener("click", function(e){    
       var point = new BMap.Point(e.point.lat, e.point.lng);
       var marker = new BMap.Marker(point);
       map.addOverlay(marker);
       $scope.shop.lat = e.point.lat;
       $scope.shop.lng = e.point.lng;
       $scope.$digest();
      });
      
      // 文件上传事件
      angular.element("input[name='to_shop_image']").live("change", function () {
        var self = angular.element(this);
        var file = this.files[0];
        if (file) {
          var formdata = new FormData();
          var reader = new FileReader();
          reader.onloadend = function (e) {
            $scope.image.items = [{
              src: e.target.result
           }];
            $scope.$digest();
          };
          reader.readAsDataURL(file);
          
          // 上传文件
          formdata.append("media", file);
          $.ajax({
            url: window.baseurl + "/api/media/temp",
            type: "post",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (res) {
              if (typeof res["status"] != "undefined") {
                var uri = res["data"]["uri"];
                $scope.shop.shop_star_image = uri;
                $scope.$digest();
              }
              else {
                alert("未知错误");
              }
            }
          });
        }
        $scope.$digest();
      });
    });
  }]);

  // Shop Table 控制器
  AdminModule.controller("ShopTable", ["$scope", "$http", function ($scope, $http) {
      angular.element(".shop-table .table").DataTable({
        info: false,
        pageLength: 5,
        lengthChange: false,
      });
  }]);


  
})(jQuery);