var app = angular.module('myapp', []);
app.config(['$locationProvider', function($locationProvider){ 
    $locationProvider.html5Mode({
       enabled: true,
       requireBase: false
   });    
}]);
app.controller('mycontroller', function($scope, $http,$location) {
    var id = $location.url().split('=')[1]; 
    console.log(id);
    var api = 'http://127.0.0.1:8000/api/sanphams/';
    var loadData = function(){
        $http({
            Method: "GET",
            url: api+id,
        }).success(function(response) {
            console.log(response);
            $scope.sanpham = response;
        });
        $http({
            Method: "GET",
            url: api,
        }).success(function(response) {
            console.log(response);
            $scope.listsanpham = response;
        });
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/loaisps/"
        }).success(function(response) {
            console.log(response);
            $scope.loaisanpham = response;
        });
    }
    loadData();

    $scope.addToCart = function (sp) {
        let item = {};
        item.id = sp.id;
        item.name = sp.name;
        item.id_loai_sp = sp.id_loai_sp;
        item.id_ncc = sp.id_ncc;
        item.mota_sp = sp.mota_sp;
        item.unit_price = sp.unit_price;
        item.gia_km = sp.gia_km;
        item.so_luong = sp.so_luong;
        item.image = sp.image;
        item.don_vi_tinh = sp.don_vi_tinh;
        item.quantity = 1;
        var list;
        if (localStorage.getItem('cart') == null) {
            list = [item];
        } else {
            list = JSON.parse(localStorage.getItem('cart')) || [];
            let ok = true;
            for (let x of list) {
                if (x.id == item.id) {
                    x.quantity += 1;
                    ok = false;
                    break;
                }
            }
            if (ok) {
                list.push(item);
            }
        }
        localStorage.setItem('cart', JSON.stringify(list));
        alert("Đã thêm giở hàng thành công");
    }

    $scope.Tang = function (sp) {
        var index = $scope.cart.indexOf(sp);
        if (index >= 0) {
            $scope.cart[index].quantity += 1;
        }
        localStorage.setItem('cart', JSON.stringify($scope.cart));
    }

    $scope.Giam = function (sp) {
        var index = $scope.cart.indexOf(sp);
        if (index >= 0 && $scope.cart[index].quantity >= 2) {
            $scope.cart[index].quantity -= 1;
        }
        localStorage.setItem('cart', JSON.stringify($scope.cart));
    }
    $scope.LoadCart = function () {
        $scope.cart = JSON.parse(localStorage.getItem('cart'));
    }
    $scope.LoadCart();
});