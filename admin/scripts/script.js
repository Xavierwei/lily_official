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
        lengthChange: false
      });
  }]);


  // Lookbook 控制器
  AdminModule.controller("LookbookForm", ["$scope", "$http", "$location", function ($scope, $http, $location) {
      $scope.media = {};
      $scope.media.look_book_image = [];
      
      $scope.lookbook = {};
      $scope.lookbook.look_book_image = [];
      // 初始化
      $scope.init = function () {
        // 加载lookbook 对象
        var cid = angular.element("input[name='cid']").val();
        $http({
          method: "get",
          params: {id: cid},
          url: window.baseurl + "/api/lookbook/index"
        })
        .success(function (res) {
          if (typeof res["status"] != 'undefined' && res["status"] == 0 ){ 
            var data = res["data"];
            $scope.lookbook = data;
            $.each( $scope.lookbook.look_book_image, function (i, val) {
              $scope.media.look_book_image.push(val);
            });
          }
          else {
            alert("未知错误");
          }
        });
        
        // 绑定图片上传事件
        angular.element("input[type='file']").live("change", function(event) {
          var el = angular.element(event.target);
          var file = el[0].files[0];
          var fileReader = new FileReader();
          fileReader.onloadend = function (e) {
            $scope.media.look_book_image.push(e.target.result);
            $scope.$digest();
          };
          fileReader.readAsDataURL(file);
          
          // 上传
          var formdata = new FormData();
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
                $scope.lookbook.look_book_image.push(uri);
                $scope.$digest();
              }
              else {
                alert("未知错误");
              }
            }
          });
          
        });
      };
      
      // 提交按钮
      $scope.submitLookbook = function (event) {
        if ($scope.lookbookform.$valid) {
          $http({
            method: "POST",
            url: window.baseurl + "/api/lookbook/add",
            data: $.param($scope.lookbook),
            headers: {"Content-Type": "application/x-www-form-urlencoded"}
          })
          .success(function (data) {
            console.log(data);
          });
        }
        else {
          alert("验证失败");
        }
      };
  }]);
  
  // lookbook table
  AdminModule.controller("LookbookTable", ["$scope", "$http", function ($scope, $http) {
      $scope.init = function () {
        angular.element(".table-content .table").DataTable({
          info: false,
          pageLength: 5,
          lengthChange: false
        });
      };
  }]);
  
})(jQuery);