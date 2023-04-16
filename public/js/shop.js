var app = angular.module('myapp', []);
app.controller('mycontroller', function($scope, $http) {
    $scope.q="";
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/sanphamhome/"
    }).success(function(response) {
        console.log(response);
        $scope.sanpham = response;
    });
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/loaisps/"
    }).success(function(response) {
        console.log(response);
        $scope.loaisanpham = response;
    });
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/slides"
    }).success(function(response) {
        console.log(response);
        $scope.slide = response;
    });
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

    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 16;
});
